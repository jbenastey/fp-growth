<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class DataSheetImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return Data
     */


    public function model(array $row)
    {
        return new Data([
            'data_fakultas'     => $row['Fakultas'],
            'data_jurusan'      => $row['Jurusan'],
            'data_semester'     => $row['Semester'],
            'data_jk'           => $row['Jenis Kelamin'],
            'data_sjkp'         => $row['Solusi Jadwal Kuliah Padat'],
            'data_mp'           => $row['Makanan Pokok'],
            'data_mr'           => $row['Makanan Ringan'],
            'data_mi'           => $row['Mie Instan'],
            'data_ff'           => $row['Fast Food / Makanan siap saji'],
            'data_mps'          => $row['Makanan Pedas'],
            'data_mk'           => $row['Minuman Berkafein / Kopi'],
            'data_ms'           => $row['Minuman Bersoda'],
            'data_jg'           => $row['Jajanan / Gorengan'],
        ]);
    }
}
