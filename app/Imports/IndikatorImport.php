<?php

namespace App\Imports;

use App\Models\Indikator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IndikatorImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        //dd($row['kode']);
        return new Indikator([
            'standard_id' => $row['standard_id'],
            'kode' => $row['kode'],
            'indikator' => $row['indikator'],
            'rujukan_paps' => $row['rujukan_paps'],
            'rujukan_papt' => $row['rujukan_papt'],
            'dokumen' => $row['dokumen'],
            'audity' => $row['audity'],
            'pemangku_kepentingan' => $row['pemangku_kepentingan'],
            'active' => $row['active'],
        ]);
    }

}