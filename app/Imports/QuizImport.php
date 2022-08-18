<?php

namespace App\Imports;

use App\Models\AssignmentPilganSoal;
use App\Models\AssignmentPilgan;
use App\Models\MataKuliah;
use App\Models\Question;
use App\Models\Quiz;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class QuizImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $quiz_id;

    public function __construct(string $quiz_id)
    {
    $this->quiz_id = $quiz_id;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Question([
            'no' => $row[0],
            'soal' => $row[1],
            'opsi_a' => $row[2],
            'opsi_b' => $row[3],
            'opsi_c' => $row[4],
            'opsi_d' => $row[5],
            'opsi_e' => $row[6],
            'jawaban' => $row[7],
            'penjelasan' => $row[8],
            'quiz_id' => $this->quiz_id,
        ]);
    }
}
