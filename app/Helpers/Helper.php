<?php
namespace App\Helpers;

class Helper{
    
    public static function variabel_nilai($nilai)
    {        
        if ($nilai > 85) {
            return 'A';
        } elseif ($nilai >= 80 && $nilai < 85) {
            return 'A-';
        } elseif ($nilai >= 75 && $nilai < 80) {
            return 'B+';
        } elseif ($nilai >= 70 && $nilai < 76) {
            return 'B';
        } elseif ($nilai >= 65 && $nilai < 70) {
            return 'B-';
        } elseif ($nilai >= 60 && $nilai < 65) {
            return 'C+';
        } elseif ($nilai >= 55 && $nilai < 60) {
            return 'C';
        } elseif ($nilai >= 40 && $nilai < 55) {
            return 'D';
        } else {
            return 'E';
        }
    }

    public static function bobot_nilai($nilai)
    {        
        if ($nilai > 85) {
            return 4;
        } elseif ($nilai >= 80 && $nilai < 85) {
            return 3.7;
        } elseif ($nilai >= 75 && $nilai < 80) {
            return 3.3;
        } elseif ($nilai >= 70 && $nilai < 76) {
            return 3;
        } elseif ($nilai >= 65 && $nilai < 70) {
            return 2.7;
        } elseif ($nilai >= 60 && $nilai < 65) {
            return 2.4;
        } elseif ($nilai >= 55 && $nilai < 60) {
            return 2;
        } elseif ($nilai >= 40 && $nilai < 55) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function lulus($nilai)
    {        
        if($nilai>=60){
            return 'Lulus';
        }
        else{
            return 'Tidak Lulus';
        }
    }
}
