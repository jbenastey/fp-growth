<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Transformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['atribut'] = DB::table('atribut')->get();
        return view('atribut.index',$data);
    }

    public function loadAtribut(){
        $data = Data::all();
        $transform = Transformation::all();

        DB::table('atribut')->truncate();

        $item = [
            'Fakultas' => [],
            'Jurusan' => [],
            'Semester' => [],
            'Jenis Kelamin' => [],
            'Solusi Jadwal Kuliah Padat' => [],
            'Makanan Pokok' => [],
            'Makanan Ringan' => [],
            'Mie Instan' => [],
            'Fast Food' => [],
            'Makanan Pedas' => [],
            'Minuman Berkafein / Kopi' => [],
            'Minuman Bersoda' => [],
            'Jajanan / Gorengan' => []
        ];
        $kode = [
            'Fakultas' => [],
            'Jurusan' => [],
            'Semester' => [],
            'Jenis Kelamin' => [],
            'Solusi Jadwal Kuliah Padat' => [],
            'Makanan Pokok' => [],
            'Makanan Ringan' => [],
            'Mie Instan' => [],
            'Fast Food' => [],
            'Makanan Pedas' => [],
            'Minuman Berkafein / Kopi' => [],
            'Minuman Bersoda' => [],
            'Jajanan / Gorengan' => []
        ];

        foreach ($data as $key => $value) {
            array_push($item['Fakultas'],trim(strtolower($value->data_fakultas)));
            array_push($item['Jurusan'],trim(strtolower($value->data_jurusan)));
            array_push($item['Semester'],trim(strtolower($value->data_semester)));
            array_push($item['Jenis Kelamin'],trim(strtolower($value->data_jk)));
            array_push($item['Solusi Jadwal Kuliah Padat'],trim(strtolower($value->data_sjkp)));
            array_push($item['Makanan Pokok'],trim(strtolower($value->data_mp)));
            array_push($item['Makanan Ringan'],trim(strtolower($value->data_mr)));
            array_push($item['Mie Instan'],trim(strtolower($value->data_mi)));
            array_push($item['Fast Food'],trim(strtolower($value->data_ff)));
            array_push($item['Makanan Pedas'],trim(strtolower($value->data_mps)));
            array_push($item['Minuman Berkafein / Kopi'],trim(strtolower($value->data_mk)));
            array_push($item['Minuman Bersoda'],trim(strtolower($value->data_ms)));
            array_push($item['Jajanan / Gorengan'],trim(strtolower($value->data_jg)));

            array_push($kode['Fakultas'],trim($transform[$key]->tf_data_fakultas));
            array_push($kode['Jurusan'],trim($transform[$key]->tf_data_jurusan));
            array_push($kode['Semester'],trim($transform[$key]->tf_data_semester));
            array_push($kode['Jenis Kelamin'],trim($transform[$key]->tf_data_jk));
            array_push($kode['Solusi Jadwal Kuliah Padat'],trim($transform[$key]->tf_data_sjkp));
            array_push($kode['Makanan Pokok'],trim($transform[$key]->tf_data_mp));
            array_push($kode['Makanan Ringan'],trim($transform[$key]->tf_data_mr));
            array_push($kode['Mie Instan'],trim($transform[$key]->tf_data_mi));
            array_push($kode['Fast Food'],trim($transform[$key]->tf_data_ff));
            array_push($kode['Makanan Pedas'],trim($transform[$key]->tf_data_mps));
            array_push($kode['Minuman Berkafein / Kopi'],trim($transform[$key]->tf_data_mk));
            array_push($kode['Minuman Bersoda'],trim($transform[$key]->tf_data_ms));
            array_push($kode['Jajanan / Gorengan'],trim($transform[$key]->tf_data_jg));
        }


        foreach (array_unique($item['Fakultas']) as $key => $value) {
            $insert = [
                'atribut_kolom' => 'Fakultas',
                'atribut_kode' => array_unique($kode['Fakultas'])[$key],
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Jurusan']) as $key => $value) {
            $insert = [
                'atribut_kolom' => 'Jurusan',
                'atribut_kode' => array_unique($kode['Jurusan'])[$key],
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Semester']) as $key => $value) {
            $insert = [
                'atribut_kolom' => 'Semester',
                'atribut_kode' => array_unique($kode['Semester'])[$key],
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Jenis Kelamin']) as $key => $value) {
            $insert = [
                'atribut_kolom' => 'Jenis Kelamin',
                'atribut_kode' => array_unique($kode['Jenis Kelamin'])[$key],
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Solusi Jadwal Kuliah Padat']) as $key => $value) {
            $insert = [
                'atribut_kolom' => 'Solusi Jadwal Kuliah Padat',
                'atribut_kode' => array_unique($kode['Solusi Jadwal Kuliah Padat'])[$key],
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Makanan Pokok']) as $key => $value) {
            $insert = [
                'atribut_kolom' => 'Makanan Pokok',
                'atribut_kode' => array_unique($kode['Makanan Pokok'])[$key],
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Makanan Ringan']) as $key => $value) {
            $insert = [
                'atribut_kolom' => 'Makanan Ringan',
                'atribut_kode' => array_unique($kode['Makanan Ringan'])[$key],
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Mie Instan']) as $key => $value) {
            $k = null;
            if ($value == 'tidak pernah'){
                $k = 'MI1';
            } elseif ($value == 'kadang - kadang' || $value == '1 x/minggu') {
                $k = 'MI2';
            } elseif ($value == '2-3 x/minggu' || $value == '4-5 x/minggu') {
                $k = 'MI3';
            } elseif ($value == 'setiap hari') {
                $k = 'MI4';
            }
            $insert = [
                'atribut_kolom' => 'Mie Instan',
                'atribut_kode' => $k,
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Fast Food']) as $key => $value) {
            $k = null;
            if ($value == 'tidak pernah'){
                $k = 'FF1';
            } elseif ($value == 'kadang - kadang' || $value == '1 x/minggu') {
                $k = 'FF2';
            } elseif ($value == '2-3 x/minggu' || $value == '4-5 x/minggu') {
                $k = 'FF3';
            } elseif ($value == 'setiap hari') {
                $k = 'FF4';
            }
            $insert = [
                'atribut_kolom' => 'Fast Food',
                'atribut_kode' => $k,
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Makanan Pedas']) as $key => $value) {
            $k = null;
            if ($value == 'tidak pernah'){
                $k = 'MP1';
            } elseif ($value == 'kadang - kadang' || $value == '1 x/minggu') {
                $k = 'MP2';
            } elseif ($value == '2-3 x/minggu' || $value == '4-5 x/minggu') {
                $k = 'MP3';
            } elseif ($value == 'setiap hari') {
                $k = 'MP4';
            }
            $insert = [
                'atribut_kolom' => 'Makanan Pedas',
                'atribut_kode' => $k,
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Minuman Berkafein / Kopi']) as $key => $value) {
            $k = null;
            if ($value == 'tidak pernah'){
                $k = 'K1';
            } elseif ($value == 'kadang - kadang' || $value == '1 x/minggu') {
                $k = 'K2';
            } elseif ($value == '2-3 x/minggu' || $value == '4-5 x/minggu') {
                $k = 'K3';
            } elseif ($value == 'setiap hari') {
                $k = 'K4';
            }
            $insert = [
                'atribut_kolom' => 'Minuman Berkafein / Kopi',
                'atribut_kode' => $k,
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Minuman Bersoda']) as $key => $value) {
            $k = null;
            if ($value == 'tidak pernah'){
                $k = 'MB1';
            } elseif ($value == 'kadang - kadang' || $value == '1 x/minggu') {
                $k = 'MB2';
            } elseif ($value == '2-3 x/minggu' || $value == '4-5 x/minggu') {
                $k = 'MB3';
            } elseif ($value == 'setiap hari') {
                $k = 'MB4';
            }
            $insert = [
                'atribut_kolom' => 'Minuman Bersoda',
                'atribut_kode' => $k,
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }
        foreach (array_unique($item['Jajanan / Gorengan']) as $key => $value) {
            $k = null;
            if ($value == 'tidak pernah'){
                $k = 'JG1';
            } elseif ($value == 'kadang - kadang' || $value == '1 x/minggu') {
                $k = 'JG2';
            } elseif ($value == '2-3 x/minggu' || $value == '4-5 x/minggu') {
                $k = 'JG3';
            } elseif ($value == 'setiap hari') {
                $k = 'JG4';
            }
            $insert = [
                'atribut_kolom' => 'Jajanan / Gorengan',
                'atribut_kode' => $k,
                'atribut_item' => $value
            ];
            DB::table('atribut')->insert($insert);
        }

        return back();
    }
}
