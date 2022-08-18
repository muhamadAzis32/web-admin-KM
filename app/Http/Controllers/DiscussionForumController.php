<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscussionForum;
use App\Models\DiscussionReply;
use App\Models\DiscussionReply2;
use App\Models\DiscussionLike;
use App\Models\DiscussionLike2;
use App\Models\DiscussionLike3;
use App\Models\AksesKelas;
use App\Models\Leaderboard;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class DiscussionForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }

    public function index()
    {
        $discussionForum = DiscussionForum::latest()->get();
        $mata_kuliah = MataKuliah::get();
        return view('admin.discussionForum.index', compact('discussionForum', 'mata_kuliah'));
    }


    public function create()
    {

        return view('admin.DiscussionForum.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'user_id' => 'required',
            'mata_kuliah_id' => 'required'
        ]);
        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/images/" . $file_name;
            $request->gambar->storeAs('public/images', $file_name);
        } else {
            $txt = null;
        }

        DiscussionForum::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'user_id' => $request->user_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'gambar' => $txt,
        ]);
        
        return redirect()->route('discussion-forum')
            ->with('success', 'Diskusi Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $DiscussionForums = DiscussionForum::where('id', $id)->first();
        return view('admin.DiscussionForum.show', compact('DiscussionForum'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit($id)
    {
        $DiscussionForum = DiscussionForum::find($id);

        return view('admin.DiscussionForum.edit', compact('DiscussionForum'));
    }

    public function dosenUpdate(Request $request, $id)
    {
        $DiscussionForum = DiscussionForum::findOrFail($id);
        $DiscussionForum->judul = $request->judul;
        $DiscussionForum->isi = $request->isi;

        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/images/" . $file_name;
            $request->gambar->storeAs('public/images', $file_name);
            $DiscussionForum->gambar = $txt;
        } else {
            $txt = null;
        }

        $DiscussionForum->save();

        return redirect()->back()
            ->with('edit', 'DiscussionForum Berhasil Diedit');
    }

    public function komenUpdate(Request $request, $id)
    {
        $komen = DiscussionReply::findOrFail($id);
        $komen->isi = $request->isi;

        $komen->save();

        return redirect()->route('discussion-forum')
            ->with('edit', 'Komentar Berhasil Diedit');
    }

    public function destroy($id)
    {
        DiscussionForum::where('id', $id)->delete();
        //notify()->success('Iklan berhasil dihapus');
        return redirect()->route('discussionForum.index')->with('delete', 'Discussion Forum Berhasil Dihapus');
    }

    public function destroydosen($id)
    {
        DiscussionForum::where('id', $id)->delete();
        //notify()->success('Iklan berhasil dihapus');
        return redirect()->route('discussion-forum')->with('delete', 'Discussion Forum Berhasil Dihapus');
    }

    public function hapusKomen($id)
    {
        DiscussionReply::where('id', $id)->delete();

        $leaderboard = Leaderboard::find(Auth::user()->id);
        Leaderboard::where('id', Auth::user()->id)->update(
            [
                'nilai' => $leaderboard->nilai - 1,
            ]
        );
        return redirect()->route('discussion-forum')->with('delete', 'Komentar Berhasil Dihapus');
    }

    public function dosenindex()
    {
        $post = DiscussionForum::latest()->get();
        $reply = DiscussionReply::all();
        $reply2 = DiscussionReply2::all();
        $totalKomen = DiscussionReply::has('discussion')->get();
        $totalKomen2 = DiscussionReply2::has('discussion_reply')->get();
        $like = DiscussionLike::all();
        $totalLike = DiscussionLike::has('discussion')->get();
        $totalLike2 = DiscussionLike2::has('discussion_reply')->get();
        $totalLike3 = DiscussionLike3::has('discussion_reply')->get();
        $mata_kuliah = MataKuliah::get();
        $leaderboard = Leaderboard::all();
        return view('dosen.discussionForum.index', compact('leaderboard', 'post', 'reply', 'totalKomen', 'like', 'totalLike', 'totalLike2', 'totalLike3', 'reply2', 'totalKomen2', 'mata_kuliah'));
    }

    public function tambahKomen(Request $request)
    {
        $request->validate([
            // 'discussion_id' => 'required',
            // 'isi' => 'required',
        ]);
        DiscussionReply::create([
            'discussion_id' => $request->discussion_id,
            'isi' => $request->isi,
            'user_id' => Auth::user()->id,
            'username' => Auth::user()->name,
        ]);

        // $getuser_id = DiscussionForum::find($request->discussion_id);
        $leaderboard = Leaderboard::find(Auth::user()->id);

        $kata = str_word_count($request->isi);
        // dd($kata);
        if ($kata > 9) {
            if ($leaderboard != NULL) {
                Leaderboard::where('id', Auth::user()->id)->update(
                    [
                        'user_id' => Auth::user()->id,
                        'tipe' => 'Like',
                        'nilai' => $leaderboard->nilai + 1,
                    ]
                );
            } else {
                Leaderboard::updateOrInsert(
                    [
                        'id' => Auth::user()->id,
                        'user_id' => Auth::user()->id,
                        'tipe' => 'Like',
                        'nilai' => 1,
                    ]
                );
            }
        };

        return back()
            ->with('success', 'Diskusi Berhasil Ditambahkan');
    }
    public function tambahreplyKomen(Request $request)
    {
        $request->validate([
            // 'discussion_id' => 'required',
            // 'isi' => 'required',
        ]);
        DiscussionReply2::create([
            'discussion_reply_id' => $request->reply_id,
            'isi' => $request->isi,
            'user_id' => Auth::user()->id,
            'username' => Auth::user()->name,
        ]);

        $leaderboard = Leaderboard::find(Auth::user()->id);

        $kata = str_word_count($request->isi);
        if ($kata > 9) {
            if ($leaderboard != NULL) {
                Leaderboard::where('id', Auth::user()->id)->update(
                    [
                        'user_id' => Auth::user()->id,
                        'tipe' => 'Like',
                        'nilai' => $leaderboard->nilai + 1,
                    ]
                );
            } else {
                Leaderboard::updateOrInsert(
                    [
                        'id' => Auth::user()->id,
                        'user_id' => Auth::user()->id,
                        'tipe' => 'Like',
                        'nilai' => 1,
                    ]
                );
            }
        };

        return back()
            ->with('success', 'Diskusi Berhasil Ditambahkan');
    }
    public function tambahLike(Request $request)
    {
        // $request->validate([
        //     'discussion_id' => 'required',
        //     'isi' => 'required',
        // ]);
        $like = DiscussionLike::where('user_id', Auth::user()->id)->where('discussion_id', $request->discussion_id)->first();
        $getuser_id = DiscussionForum::find($request->discussion_id);
        $leaderboard = Leaderboard::find($getuser_id->user_id);
        // dd($leaderboard);

        if ($like != NULL) {
            DiscussionLike::where('user_id', Auth::user()->id)->where('discussion_id', $request->discussion_id)->delete();

            if (Auth::user()->role == 'dosen') {
                Leaderboard::where('id', $getuser_id->user_id)->update(
                    [
                        'user_id' => $getuser_id->user_id,
                        'tipe' => 'Like',
                        'nilai' => $leaderboard->nilai - 5,
                    ]
                );
            } else {
                Leaderboard::where('id', $getuser_id->user_id)->update(
                    [
                        'user_id' => $getuser_id->user_id,
                        'tipe' => 'Like',
                        'nilai' => $leaderboard->nilai - 1,
                    ]
                );
            };

            return back()
                ->with('success', 'Unlike');
        } else {
            DiscussionLike::create([
                'discussion_id' => $request->discussion_id,
                'isLike' => True,
                'user_id' => Auth::user()->id,
            ]);

            if (Auth::user()->role == 'dosen') {
                //  dd($getuser_id);
                if ($leaderboard != NULL) {
                    Leaderboard::where('id', $getuser_id->user_id)->update(
                        [
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => $leaderboard->nilai + 5,
                        ]
                    );
                } else {
                    Leaderboard::updateOrInsert(
                        [
                            'id' => $getuser_id->user_id,
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => 5,
                        ]
                    );
                }
            } else {
                if ($leaderboard != NULL) {
                    Leaderboard::where('id', $getuser_id->user_id)->update(
                        [
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => $leaderboard->nilai + 1,
                        ]
                    );
                } else {
                    Leaderboard::updateOrInsert(
                        [
                            'id' => $getuser_id->user_id,
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => 1,
                        ]
                    );
                }
            };

            return back()
                ->with('success', 'Like');
        }
    }
    public function tambahlikeKomen(Request $request)
    {
        $like = DiscussionLike2::where('user_id', Auth::user()->id)->where('discussion_reply_id', $request->reply_id)->first();
        $getuser_id = DiscussionReply::find($request->reply_id);
        $leaderboard = Leaderboard::find($getuser_id->user_id);

        if ($like != NULL) {
            DiscussionLike2::where('user_id', Auth::user()->id)->where('discussion_reply_id', $request->reply_id)->delete();
            if (Auth::user()->role == 'dosen') {
                Leaderboard::where('id', $getuser_id->user_id)->update(
                    [
                        'user_id' => $getuser_id->user_id,
                        'tipe' => 'Like',
                        'nilai' => $leaderboard->nilai - 5,
                    ]
                );
            } else {
                Leaderboard::where('id', $getuser_id->user_id)->update(
                    [
                        'user_id' => $getuser_id->user_id,
                        'tipe' => 'Like',
                        'nilai' => $leaderboard->nilai - 1,
                    ]
                );
            };
            return back()
                ->with('success', 'Unlike');
        } else {
            DiscussionLike2::create([
                'discussion_reply_id' => $request->reply_id,
                'isLike' => True,
                'user_id' => Auth::user()->id,
            ]);

            if (Auth::user()->role == 'dosen') {
                //  dd($getuser_id);
                if ($leaderboard != NULL) {
                    Leaderboard::where('id', $getuser_id->user_id)->update(
                        [
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => $leaderboard->nilai + 5,
                        ]
                    );
                } else {
                    Leaderboard::updateOrInsert(
                        [
                            'id' => $getuser_id->user_id,
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => 5,
                        ]
                    );
                }
            } else {
                if ($leaderboard != NULL) {
                    Leaderboard::where('id', $getuser_id->user_id)->update(
                        [
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => $leaderboard->nilai + 1,
                        ]
                    );
                } else {
                    Leaderboard::updateOrInsert(
                        [
                            'id' => $getuser_id->user_id,
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => 1,
                        ]
                    );
                }
            };

            return back()
                ->with('success', 'Like');
        }
    }
    public function tambahlikeKomen2(Request $request)
    {
        $like = DiscussionLike3::where('user_id', Auth::user()->id)->where('discussion_reply_id', $request->reply_id)->first();
        $getuser_id = DiscussionReply2::find($request->reply_id);
        // dd($getuser_id);
        $leaderboard = Leaderboard::find($getuser_id->user_id);

        if ($like != NULL) {
            DiscussionLike3::where('user_id', Auth::user()->id)->where('discussion_reply_id', $request->reply_id)->delete();

            if (Auth::user()->role == 'dosen') {
                Leaderboard::where('id', $getuser_id->user_id)->update(
                    [
                        'user_id' => $getuser_id->user_id,
                        'tipe' => 'Like',
                        'nilai' => $leaderboard->nilai - 5,
                    ]
                );
            } else {
                Leaderboard::where('id', $getuser_id->user_id)->update(
                    [
                        'user_id' => $getuser_id->user_id,
                        'tipe' => 'Like',
                        'nilai' => $leaderboard->nilai - 1,
                    ]
                );
            };

            return back()
                ->with('success', 'Unlike');
        } else {
            DiscussionLike3::create([
                'discussion_reply_id' => $request->reply_id,
                'isLike' => True,
                'user_id' => Auth::user()->id,
            ]);
            if (Auth::user()->role == 'dosen') {
                //  dd($getuser_id);
                if ($leaderboard != NULL) {
                    Leaderboard::where('id', $getuser_id->user_id)->update(
                        [
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => $leaderboard->nilai + 5,
                        ]
                    );
                } else {
                    Leaderboard::updateOrInsert(
                        [
                            'id' => $getuser_id->user_id,
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => 5,
                        ]
                    );
                }
            } else {
                if ($leaderboard != NULL) {
                    Leaderboard::where('id', $getuser_id->user_id)->update(
                        [
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => $leaderboard->nilai + 1,
                        ]
                    );
                } else {
                    Leaderboard::updateOrInsert(
                        [
                            'id' => $getuser_id->user_id,
                            'user_id' => $getuser_id->user_id,
                            'tipe' => 'Like',
                            'nilai' => 1,
                        ]
                    );
                }
            };
            return back()
                ->with('success', 'Like');
        }
    }
}
