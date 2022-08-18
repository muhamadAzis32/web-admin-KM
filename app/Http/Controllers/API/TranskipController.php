<?php

namespace App\Http\Controllers\API;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AksesKelas;
use App\Models\EnrollMataKuliah;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TranskipController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dataenroll = EnrollMataKuliah::join('mata_kuliah', 'mata_kuliah.id', '=', 'enroll_mata_kuliah.mata_kuliah_id')
            ->select('enroll_mata_kuliah.semester', DB::raw('SUM(mata_kuliah.sks) as jumlahsks'), DB::raw('SUM(enroll_mata_kuliah.nilai_akhir*mata_kuliah.sks) as nilai'))
            ->groupBy('semester')->where('enroll_mata_kuliah.user_id', $user->id)->get();

        $totalips = 0;
        $totalsemester = 0;
        $data = null;   
        foreach ($dataenroll as $item) {
            $tahun = EnrollMataKuliah::select(DB::raw('YEAR(created_at) year'))->where('semester', $item->semester)->first();

            $bil = $item->semester;

            if ($bil % 2 == 0) {
                $ajaran = "Genap";
            } else {
                $ajaran = "Gasal";
            }

            $ips = (int)($item->nilai / $item->jumlahsks) / 25;

            $totalips = $totalips + $ips;

            $tahunajaran = 'KHS ' . $ajaran . ' ' . $tahun['year'];
            $data[] = [
                'sks' => (int)$item->jumlahsks,
                'ips' => $ips,
                'semester' => $item->semester,
                'tahun_ajaran' => $tahunajaran,
            ];
        }

        if ($dataenroll->max('semester') != NULL)
            $dipk = $totalips / $dataenroll->max('semester');
        else {
            $dipk = null;
        }

        $transkip = [
            'IPK' => $dipk,
            'dosen_pembimbing' => '',
            'transkip' => $data,
        ];

        return response()->json([
            "error" => false,
            "message" => "Success",
            "data" => $transkip
        ], 200);
    }

    public function transkipSemester($semester)
    {
        $user = Auth::user();
        $transkipsemester = EnrollMataKuliah::select('mata_kuliah.sks', 'akses_kelas.user_id', 'mata_kuliah.id as matkul_id', 'mata_kuliah.kode', 'mata_kuliah.judul', 'enroll_mata_kuliah.semester', 'enroll_mata_kuliah.nilai_akhir')
            ->join('mata_kuliah', 'mata_kuliah.id', '=', 'enroll_mata_kuliah.mata_kuliah_id')->join('akses_kelas', 'akses_kelas.mata_kuliah_id', '=', 'mata_kuliah.id')
            ->where('enroll_mata_kuliah.user_id', $user->id)
            ->where('enroll_mata_kuliah.semester', $semester)->get();

        $transkip = EnrollMataKuliah::join('mata_kuliah', 'mata_kuliah.id', '=', 'enroll_mata_kuliah.mata_kuliah_id')
            ->select('enroll_mata_kuliah.semester', DB::raw('SUM(mata_kuliah.sks) as jumlahsks'), DB::raw('SUM(enroll_mata_kuliah.nilai_akhir*mata_kuliah.sks) as nilai'))
            ->groupBy('semester')->where('enroll_mata_kuliah.user_id', $user->id)->get();


        $totalnilai = 0;
        $data = null;
        foreach ($transkipsemester as $item) {
            $dosen = AksesKelas::select('users.name')
                ->join('users', 'users.id', '=', 'akses_kelas.user_id')
                ->where('akses_kelas.mata_kuliah_id', $item->matkul_id)->first();
            $nilai = Helper::variabel_nilai($item->nilai_akhir);
            $var1 = $item->nilai_akhir * $item->sks;
            $totalnilai = $totalnilai + $var1;

            $data[] = [
                'kode' => $item->kode,
                'mata_kuliah' => $item->judul,
                'sks' => $item->sks,
                'nilai' => $nilai,
                'dosen' => $dosen->name,
            ];
        }



        $IPK = 0;
        foreach ($transkip as $item) {
            $a = (int)($item->nilai / $item->jumlahsks) / 25;
            $IPK = $IPK + $a;
        }

        if ($transkipsemester->sum('sks') != null) {
            $ips = (int)($totalnilai / $transkipsemester->sum('sks')) / 25;
        } else {
            $ips = null;
        }

        $totalsemester = $transkip->count('semester');
        if ($totalsemester != null) {
            $ipkakhir = $IPK / $totalsemester;
        } else {
            $ipkakhir = null;
        }

        $hasil = [
            'totalsks' => (int)$transkip->SUM('jumlahsks'),
            'IPS' => $ips,
            'IPK' => $ipkakhir,
            'detail' => $data,
        ];

        return response()->json([
            "error" => false,
            "message" => "Success",
            "data" => $hasil
        ], 200);
    }
}
