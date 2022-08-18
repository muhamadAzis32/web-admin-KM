<?php

namespace App\Http\Controllers;
use App\Models\KontenVideo;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Kategori;
use Illuminate\Support\Facades\View;
use App\Models\Akses;
use App\Models\AksesKelas;

class KontenVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        View::share('AksesKelas', AksesKelas::all());
    }
    
    public function index()
    {
        
        $kontenVideo = KontenVideo::all();
        $judul = MataKuliah::get();
        return view('admin.kontenVideo.index',['judul'=>$judul], compact('kontenVideo','judul'));
    }

    public function create()
    {
        $kelas = MataKuliah::all();
        $kategori = Kategori::all();
        return view('admin.kontenVideo.tambah',compact('kelas','kategori'));
    }

    /**
     * Get Youtube video ID from URL
     *
     * @param string $url
     * @return mixed Youtube video ID or FALSE if not found
     */
    public function getYoutubeIdFromUrl($url)
    {
        $parts = parse_url($url);
        if (isset($parts['query'])) {
            parse_str($parts['query'], $qs);
            if (isset($qs['v'])) {
                return $qs['v'];
            } else if (isset($qs['vi'])) {
                return $qs['vi'];
            }
        }
        if (isset($parts['path'])) {
            $path = explode('/', trim($parts['path'], '/'));
            return $path[count($path) - 1];
        }
        return false;
    }

    public function getYoutubeDuration($vid) {
        //$vid - YouTube video ID. F.e. LWn28sKDWXo
        $YOUR_KEY = env('GOOGLE_KEY');
        $videoDetails = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$vid."&part=contentDetails,statistics&key=$YOUR_KEY");
        $VidDuration = json_decode($videoDetails, true);
        foreach ($VidDuration['items'] as $vidTime)
        {
          $VidDuration= $vidTime['contentDetails']['duration'];
        }
        $pattern='/PT(\d+)M(\d+)S/';
        preg_match($pattern,$VidDuration,$matches);
        $seconds=$matches[1]*60+$matches[2];
        return $seconds;
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
            'mata_kuliah_id' => 'required',
            'kategori_id' => 'required',
        ]);
        $clean_link = $this->getYoutubeIdFromUrl($request->link);
        KontenVideo::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link' => $clean_link,
            'durasi' => $this->getYoutubeDuration($clean_link),
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'kategori_id' => $request->kategori_id,
        ]);
        //notify()->success('Konten Video berhasil ditambahkan!');
        return redirect()->route('mataKuliah.show', $request->mata_kuliah_id)
            ->with('success', 'Konten Video Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kontenVideos = KontenVideo::where('id', $id)->first();
        return view('admin.kontenVideo.show', compact('kontenVideo'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $kontenVideo = KontenVideo::find($id);
        $matakuliah = MataKuliah::all();
        $kategori = Kategori::all();
        return view('admin.kontenVideo.edit', compact('kontenVideo','matakuliah','kategori'));
    }

    public function update(Request $request, $id)
    {
        $clean_link = $this->getYoutubeIdFromUrl($request->link);
        $kontenVideo = KontenVideo::findOrFail($id);
        $kontenVideo->judul = $request->judul;
        $kontenVideo->deskripsi = $request->deskripsi;
        $kontenVideo->link = $clean_link;
        $kontenVideo->durasi = $this->getYoutubeDuration($clean_link);
        $kontenVideo->mata_kuliah_id = $request->mata_kuliah_id;
        $kontenVideo->kategori_id = $request->kategori_id;
        $kontenVideo->save();
        //notify()->success('Konten Video berhasil diedit!');
        return redirect()->route('kontenVideo.index')
        ->with('edit', 'Konten Video Berhasil Diedit');
    }

    public function destroy($id)
    {
        KontenVideo::where('id', $id)->delete();
        //notify()->success('Konten Video berhasil dihapus!');
        return redirect()->route('kontenVideo.index')
            ->with('delete', 'Konten Video Berhasil Dihapus');
    }
}