<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use EnzoMC\PhpFPGrowth\FPGrowth;

class PerhitunganController extends Controller
{
    //
    public function index(){
        $data = ['hasil' => DB::table('hasil')->get()];
        return view('perhitungan.index',$data);
    }

    public function hitung(Request $request){
        $minSupport = $request->input('support');
        $minConfidence = $request->input('confidence');

        $transformasi = DB::table('transformasi')
            ->get();
        $items = [];
        foreach ($transformasi as $value) {
            array_push($items,$value->tf_data_fakultas);
            array_push($items,$value->tf_data_jurusan);
            array_push($items,$value->tf_data_semester);
            array_push($items,$value->tf_data_jk);
            array_push($items,$value->tf_data_sjkp);
            array_push($items,$value->tf_data_mp);
            array_push($items,$value->tf_data_mr);
            array_push($items,$value->tf_data_mi);
            array_push($items,$value->tf_data_ff);
            array_push($items,$value->tf_data_mps);
            array_push($items,$value->tf_data_mk);
            array_push($items,$value->tf_data_ms);
            array_push($items,$value->tf_data_jg);
        }

        $item = [];
        $frekuensi = [];
        $support = [];
        foreach (array_unique($items) as $value) {
            array_push($item,$value);
            $frekuensi[$value] = 0;
            foreach ($transformasi as $value2) {
                if ($value == $value2->tf_data_fakultas) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_jurusan) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_semester) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_jk) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_sjkp) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_mp) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_mr) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_mi) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_ff) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_mps) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_mk) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_ms) {
                    $frekuensi[$value]++;
                }
                if ($value == $value2->tf_data_jg) {
                    $frekuensi[$value]++;
                }
            }
            $support[$value] = $frekuensi[$value] / count($transformasi);

        }

        $itemAlls = [];
        foreach ($item as $value) {
            array_push($itemAlls, [
                'item' => $value,
                'frekuensi' => $frekuensi[$value],
                'support' => $support[$value],
            ]);
        }

        $itemAlls = collect($itemAlls)->sortBy('support')->reverse()->toArray();

        $itemAll = [];
        foreach ($itemAlls as $value) {
            if ($value['support'] >= ($minSupport*0.01)){
                array_push($itemAll, [
                    'item' => $value['item'],
                    'frekuensi' => $value['frekuensi'],
                    'support' => $value['support'],
                ]);
            }
        }

        $pindai = [];
        foreach ($transformasi as $key=>$value){
            $pindai[$key] = [];
            foreach ($itemAll as $value2) {
                if ($value->tf_data_fakultas == $value2['item']){
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_jurusan) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_semester) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_jk) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_sjkp) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_mp) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_mr) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_mi) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_ff) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_mps) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_mk) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_ms) {
                    array_push($pindai[$key],$value2['item']);
                }
                if ($value2['item'] == $value->tf_data_jg) {
                    array_push($pindai[$key],$value2['item']);
                }
            }
        }

//        dd($itemAll);
        $support = ($minSupport*count($transformasi))/100;
        $confidence = $minConfidence*0.01;
        $fpGrowth = new FPGrowth($support,$confidence);
        
        $fpGrowth->run($pindai);
        $patterns = $fpGrowth->getPatterns();
        $rules = $fpGrowth->getRules();

        $hasilRule = [];
        $hasilSupport = [];
        $hasilConfidence = [];
        $hasilNc = [];
        $hasilBc = [];
        $hasilLr = [];
        $hasilInterpretrasi = [];
        $simpan = [];
        foreach ($rules as $key=>$value) {
            array_push($hasilRule,"$key ==> $value[0]");
            array_push($hasilConfidence,$value[1]);
            foreach ($patterns as $key2=>$value2) {
                if ($key == $key2){
                    array_push($hasilSupport,$value2/count($transformasi));
                    array_push($hasilBc,$value2/count($transformasi));
                    array_push($hasilNc,$value2);
                    array_push($hasilLr,$value[1]/($value2/count($transformasi)));
                }
            }
        }

//        echo "<pre>";
        foreach ($hasilRule as $key=>$value){
            $hasil = "Jika mahasiswa ";

            $string = explode('==>',trim($value));
            $awals = $string[0];
            $akhirs = $string[1];

            $awal = explode(',',trim($awals));
            if (count($awal) == 1){
                $hasil .= $this->getNamaItem($awal[0]);
            } else {
                foreach ($awal as $key2 => $value2){
                    if ($key2 == 0){
                        $hasil .= $this->getNamaItem($value2);
                    } else {
                        $hasil .= " dan ".$this->getNamaItem($value2);
                    }
                }
            }

            $hasil .= " maka mahasiswa tersebut ";

            $akhir = explode(',',trim($akhirs));
            if (count($akhir) == 1){
                $hasil .= $this->getNamaItem($akhir[0]);
            } else {
                foreach ($akhir as $key2 => $value2){
                    if ($key2 == 0){
                        $hasil .= $this->getNamaItem($value2);
                    } else {
                        $hasil .= " dan ".$this->getNamaItem($value2);
                    }
                }
            }

            array_push($hasilInterpretrasi,$hasil);

            array_push($simpan,[
                'hasil_rule' => $value,
                'hasil_interpretasi' => $hasil,
                'hasil_support' => $hasilSupport[$key],
                'hasil_confidence' => $hasilConfidence[$key],
                'hasil_nc' => $hasilNc[$key],
                'hasil_bc' => $hasilBc[$key],
                'hasil_lift_ratio' => $hasilLr[$key],
            ]);
        }
//        var_dump($patterns);
//        var_dump($hasilRule);
//        var_dump($hasilSupport);
//        var_dump($hasilConfidence);
//        var_dump($hasilNc);
//        var_dump($hasilBc);
//        var_dump($hasilLr);
//        var_dump($simpan);
        DB::table('hasil')->truncate();
        DB::table('hasil')->insert($simpan);
//        var_dump($hasilInterpretrasi);
//        print_r ($confidence);
//        echo "</pre>";
        return redirect('perhitungan');
    }

    function getNamaItem($kode){
        $hasil = DB::table('atribut')->where('atribut_kode','=',$kode)
            ->first();
        return "$hasil->atribut_kolom $hasil->atribut_item";
    }

//    public function hitung(Request $request){
//        $minSupport = $request->input('support');
//        $minConfidence = $request->input('confidence');
//
//
//
//        $transformasi = DB::table('transformasi')
//            ->get();
//        $items = [];
//        foreach ($transformasi as $value) {
//            array_push($items,$value->tf_data_fakultas);
//            array_push($items,$value->tf_data_jurusan);
//            array_push($items,$value->tf_data_semester);
//            array_push($items,$value->tf_data_jk);
//            array_push($items,$value->tf_data_sjkp);
//            array_push($items,$value->tf_data_mp);
//            array_push($items,$value->tf_data_mr);
//            array_push($items,$value->tf_data_mi);
//            array_push($items,$value->tf_data_ff);
//            array_push($items,$value->tf_data_mps);
//            array_push($items,$value->tf_data_mk);
//            array_push($items,$value->tf_data_ms);
//            array_push($items,$value->tf_data_jg);
//        }
//
//        $item = [];
//        $frekuensi = [];
//        $support = [];
//        foreach (array_unique($items) as $value) {
//            array_push($item,$value);
//            $frekuensi[$value] = 0;
//            foreach ($transformasi as $value2) {
//                if ($value == $value2->tf_data_fakultas) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_jurusan) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_semester) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_jk) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_sjkp) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_mp) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_mr) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_mi) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_ff) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_mps) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_mk) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_ms) {
//                    $frekuensi[$value]++;
//                }
//                if ($value == $value2->tf_data_jg) {
//                    $frekuensi[$value]++;
//                }
//            }
//            $support[$value] = $frekuensi[$value] / count($transformasi);
//
//        }
//
//        dd($item);
//    }
}
