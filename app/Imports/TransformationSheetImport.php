<?php

namespace App\Imports;

use App\Models\Transformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class TransformationSheetImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return Transformation
     */
    public function model(array $row)
    {
        return new Transformation([
            'tf_data_fakultas'     => $row['Fakultas'],
            'tf_data_jurusan'      => $row['Jurusan'],
            'tf_data_semester'     => $row['Semester'],
            'tf_data_jk'           => $row['Jenis Kelamin'],
            'tf_data_sjkp'         => $row['Solusi Jadwal Kuliah Padat'],
            'tf_data_mp'           => $row['Makanan Pokok'],
            'tf_data_mr'           => $row['Makanan Ringan'],
            'tf_data_mi'           => $row['Mie Instan'],
            'tf_data_ff'           => $row['Fast Food / Makanan siap saji'],
            'tf_data_mps'          => $row['Makanan Pedas'],
            'tf_data_mk'           => $row['Minuman Berkafein / Kopi'],
            'tf_data_ms'           => $row['Minuman Bersoda'],
            'tf_data_jg'           => $row['Jajanan / Gorengan'],
        ]);
    }
}
