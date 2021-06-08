<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'transformasi';

    protected $fillable = [
        'tf_data_fakultas',
        'tf_data_jurusan',
        'tf_data_semester',
        'tf_data_jk',
        'tf_data_sjkp',
        'tf_data_mp',
        'tf_data_mr',
        'tf_data_mi',
        'tf_data_ff',
        'tf_data_mps',
        'tf_data_mk',
        'tf_data_ms',
        'tf_data_jg',
    ];
}
