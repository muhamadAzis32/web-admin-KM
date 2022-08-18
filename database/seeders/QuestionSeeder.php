<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'id' => 1,
            'no' => 1,
            'soal' => "Pada karakteristik bisnis UMKM menurut Bank Dunia, UMKM dikelompokkan dalam tiga jenis, yaitu:",
            'opsi_a' => "Usaha Mikro, Usaha Kecil, Usaha Besar",
            'opsi_b' => "Usaha Mikro, Usaha Menengah, Usaha Besar",
            'opsi_c' => "Usaha Ritel, Usaha Menengah, Usaha Besar",
            'opsi_d' => "Usaha Mikro, Usaha Kecil, Usaha Menengah",
            'opsi_e' => "Usaha Kecil, Usaha Ritel, Usahsa Bear",
            'jawaban' => 4,
            'penjelasan' => "Isi penjelasan",
            'quiz_id' => 1
        ]);

        Question::create([
            'id' => 2,
            'no' => 2,
            'soal' => "Di bawah ini yang tidak termasuk karakteristik jenis Usaha Mikro, yaitu:",
            'opsi_a' => "Jenis barang/komoditi tidak selalu tetap, sewaktu-waktu dapat berganti",
            'opsi_b' => "Belum melakukan administrasi keuangan yang sederhana sekalipun",
            'opsi_c' => "Sumber daya manusia sudah memiliki pengalaman dalam wirausaha.",
            'opsi_d' => "Tingkat pendidikan rata-rata relatif sangat rendah.",
            'opsi_e' => "Umumnya tidak memiliki izin usaha atau persyaratan legalitas lainnya termasuk NPWP",
            'jawaban' => 3,
            'penjelasan' => "Isi penjelasan",
            'quiz_id' => 1
        ]);
        
        Question::create([
            'id' => 3,
            'no' => 3,
            'soal' => "Pada jenis Usaha Kecil terdapat beberapa karakteristik. Di bawah ini manakah yang termasuk ke dalam karakteristik Usaha Kecil?",
            'opsi_a' => "Tempat usahanya tidak selalu menetap; sewaktu-waktu dapat pindah tempat.",
            'opsi_b' => "Jenis barang/komoditi yang diusahakan sudah tetap dan tidak berubah.",
            'opsi_c' => "Tidak memisahkan keuangan keluarga dengan keuangan usaha.",
            'opsi_d' => "Sudah menerapkan sistem akuntansi secara teratur yang memudahkan untuk auditing dan penilaian.",
            'opsi_e' => "Manajemen Profesional dan Modern.",
            'jawaban' => 2,
            'penjelasan' => "Isi penjelasan",
            'quiz_id' => 1
        ]);
        
        Question::create([
            'id' => 4,
            'no' => 4,
            'soal' => "Perhatikan pernyataan berikut!
            1) Memiliki manajemen dan organisasi yang baik, serta pembagian tugas yang jelas.
            2) Sudah menerapkan sistem akuntansi secara teratur yang memudahkan untuk auditing dan penilaian.
            3) Umumnya belum akses kepada perbankan, namun sebagian sudah akses ke lembaga keuangan non bank.
            4) Sumber daya manusia sudah memiliki pengalaman dalam wirausaha.
            5) Sudah memiliki sumber daya manusia yang terlatih dan terdidik.
            Dari pernyataan di atas, manakah yang termasuk ke dalam karakteristik jenis Usaha Menengah?",
            'opsi_a' => "1,2,3",
            'opsi_b' => "2,3,5",
            'opsi_c' => "3,4,5",
            'opsi_d' => "1,2,4",
            'opsi_e' => "1,2,5",
            'jawaban' => 5,
            'penjelasan' => "Isi penjelasan",
            'quiz_id' => 1
        ]);

        Question::create([
            'id' => 5,
            'no' => 5,
            'soal' => "Berapakah jumlah karyawan pada karakteristik jenis Usaha Besar?",
            'opsi_a' => "100-200 orang",
            'opsi_b' => "50-100 orang",
            'opsi_c' => "100-999 orang",
            'opsi_d' => "> 1000 orang",
            'opsi_e' => "< 999 orang",
            'jawaban' => 4,
            'penjelasan' => "Isi penjelasan",
            'quiz_id' => 1
        ]);
    }
}
