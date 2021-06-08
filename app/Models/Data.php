<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'data';

    protected $fillable = [
        'data_fakultas',
        'data_jurusan',
        'data_semester',
        'data_jk',
        'data_sjkp',
        'data_mp',
        'data_mr',
        'data_mi',
        'data_ff',
        'data_mps',
        'data_mk',
        'data_ms',
        'data_jg',
    ];
}
