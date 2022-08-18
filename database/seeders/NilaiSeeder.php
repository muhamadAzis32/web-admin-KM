<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Exam;
use Illuminate\Database\Seeder;
use App\Models\Nilai;
use App\Models\NilaiQuiz;
use App\Models\Quiz;
use App\Models\UserAssignment;
use App\Models\UserExam;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Quiz::create([
            'id' => 1,
            'judul' => 'Quiz 1',
            'deskripsi' => 'yayayayayayay',
            'mata_kuliah_id' => 1,
            'pertemuan_id' => 1,
        ]);

        Exam::create([
            'id' => 1,
            'judul' => 'Exam 1',
            'deskripsi' => 'yayayayayayay',
            'mata_kuliah_id' => 1,
            'jenis' => 'uts',
            'deadline' => '2022-01-21',
        ]);

        Assignment::create([
            'id' => 1,
            'judul' => 'Assignment 1',
            'deskripsi' => 'yayayaya',
            'pertemuan_id' => 1,
            'user_id' => 1,
            'mata_kuliah_id' => 1,
            'deadline' => '2022-01-12'
        ]);

        Nilai::create([
            'id' => '1',
            'grade' => 'A',
            'nilai' => 90,
            'uas' => 70,
            'uts' => 80,
            'assignment' => 90,
            'quiz' => 90,
            'uas' => 80,
            'user_id' => 6,
            'mata_kuliah_id' => 1
        ]);  

        Nilai::create([
            'id' => '2',
            'grade' => 'A',
            'nilai' => 80,
            'uas' => 70,
            'uts' => 80,
            'assignment' => 90,
            'quiz' => 90,
            'uas' => 80,
            'user_id' => 5,
            'mata_kuliah_id' => 1
        ]);

        Nilai::create([
            'id' => '3',
            'grade' => 'C',
            'nilai' => 65,
            'uas' => 70,
            'uts' => 80,
            'assignment' => 90,
            'quiz' => 90,
            'uas' => 80,
            'user_id' => 6,
            'mata_kuliah_id' => 1
        ]);

        UserAssignment::create([
            'id' => 1,
            'assignment' => 'pdf.pdf',
            'grade' => 80,
            'user_id' => 6,
            'mata_kuliah_id' => 1,
            'assignment_id' => 1
        ]);

        UserAssignment::create([
            'id' => 2,
            'assignment' => 'pdf.pdf',
            'grade' => 90,
            'user_id' => 5,
            'mata_kuliah_id' => 1,
            'assignment_id' => 1
        ]);

        UserAssignment::create([
            'id' => 3,
            'assignment' => 'pdf.pdf',
            'grade' => 65,
            'user_id' => 4,
            'mata_kuliah_id' => 1,
            'assignment_id' => 1
        ]);

        UserExam::create([
            'id' => 1,
            'exam' => '1',
            'grade' => 65,
            'user_id' => 4,
            'tipe' => 'uts',
            'mata_kuliah_id' => 1,
            'exam_id'=> 1
        ]);

        UserExam::create([
            'id' => 2,
            'exam' => '1',
            'grade' => 70,
            'user_id' => 5,
            'tipe' => 'uts',
            'mata_kuliah_id' => 1,
            'exam_id'=> 1
        ]);

        UserExam::create([
            'id' => 3,
            'exam' => '1',
            'grade' => 80,
            'user_id' => 6,
            'tipe' => 'uts',
            'mata_kuliah_id' => 1,
            'exam_id'=> 1
        ]);

        UserExam::create([
            'id' => 4,
            'exam' => '1',
            'grade' => 80,
            'user_id' => 6,
            'tipe' => 'uas',
            'mata_kuliah_id' => 1,
            'exam_id'=> 1
        ]);
        
        UserExam::create([
            'id' => 5,
            'exam' => '1',
            'grade' => 80,
            'user_id' => 5,
            'tipe' => 'uas',
            'mata_kuliah_id' => 1,
            'exam_id'=> 1
        ]);

        UserExam::create([
            'id' => 6,
            'exam' => '1',
            'grade' => 90,
            'user_id' => 4,
            'tipe' => 'uas',
            'mata_kuliah_id' => 1,
            'exam_id'=> 1
        ]);

        NilaiQuiz::create([
            'id' => 1,
            'grade' => 80,
            'user_id' => 6,
            'mata_kuliah_id' => 1,
            'quiz_id' => 1,
        ]);

        NilaiQuiz::create([
            'id' => 2,
            'grade' => 80,
            'user_id' => 4,
            'mata_kuliah_id' => 1,
            'quiz_id' => 1,
        ]);

        NilaiQuiz::create([
            'id' => 3,
            'grade' => 80,
            'user_id' => 5,
            'mata_kuliah_id' => 1,
            'quiz_id' => 1,
        ]);

    }
}
