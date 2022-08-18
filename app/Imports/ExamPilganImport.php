<?php

namespace App\Imports;
use App\Models\ExamQuestion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ExamPilganImport implements ToModel, WithStartRow
{

        /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $exam_pilgan_id;

    public function __construct(string $exam_pilgan_id)
    {
    $this->exam_pilgan_id = $exam_pilgan_id;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new ExamQuestion([
            'no' => $row[0],
            'soal' => $row[1],
            'opsi_a' => $row[2],
            'opsi_b' => $row[3],
            'opsi_c' => $row[4],
            'opsi_d' => $row[5],
            'opsi_e' => $row[6],
            'jawaban' => $row[7],
            'penjelasan' => $row[8],
            'exam_pilgan_id' => $this->exam_pilgan_id,
        ]);
    }
}
