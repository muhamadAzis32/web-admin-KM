<?php

namespace App\Http\Controllers;
use App\Models\Administration;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\ComparisonMethodDoesNotExistException;

class AdministrasiController extends Controller
{
    public function index()
    {
        $admin = Administration::all();
        return view('admin.administrasi.index', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Administration::find($id);
        return view('admin.administrasi.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Administration::findOrFail($id);
        $admin->update([
            'isVerified' => true
            ]);
        $user = User::where('id', $admin->user_id);
        $user->update([
            'role' => 'mahasiswa'
        ]);
        return redirect()->route('administrasi.index')
        ->with('success', 'Data telah diverifikasi');
    }

    public function destroy($id)
    {
        Administration::where('id', $id)->delete();
        return redirect()->route('administrasi.index')
        ->with('delete', 'Data berhasil dihapus!');
    }
}
