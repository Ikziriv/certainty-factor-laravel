<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Analisis;
use App\BobotNilai;
use App\Gejala;
use App\GejalaSolusi;

class DiagnoseController extends Controller
{
	public function process_one(Request $request)
	{
		$data = $request->all();
	    $idv = $data['idv'];
	    $bobot = $data['bobot'];
		$rows = [];
		foreach($bobot as $key => $input) {
		array_push($rows, [
		  'bobot' => isset($bobot[$key]) ? $bobot[$key] : '', 
		  'id' => isset($idv[$key]) ? $idv[$key] : '' 
		]);
		}
		$obj = [];
		foreach($rows as $key => $v) {
		$gesol = GejalaSolusi::where('gejala_id', $v['id'])->get()->toArray();
			foreach($gesol as $key => $g) {
				array_push($obj, [
				  'cf' => $g['nilai'] * $v['bobot'] 
				]);
			}
		}
		// Hitung
		$arg = [];
        $cftotal_temp = 0;
        $cf = 0;
        $cflama = 0;
        // dd($obj);
		foreach($obj as $key => $o) {
			if (($o['cf'] >= 0) && ($o['cf'] * $cflama >= 0)) {
                $cflama = $cflama + ($o['cf'] * (1 - $cflama));
				array_push($arg, [
				  'hasil' => $cflama
				]);
             }
			if ($o['cf'] * $cflama < 0) {
				$cflama = ($cflama + $o['cf']) / (1 - Math . Min(Math . abs($cflama), Math . abs($o['cf'])));
				array_push($arg, [
				  'hasil' => $cflama
				]);
			}
			if (($o['cf'] < 0) && ($o['cf'] * $cflama >= 0)) {
				$cflama = $cflama + ($o['cf'] * (1 + $cflama));
				array_push($arg, [
				  'hasil' => $cflama
				]);
			}
		}
		$hasil_f = end($arg);

    	return view('diagnose.first_one', compact('rows', 'obj', 'hasil_f'));
	}

	public function process_two(Request $request)
	{
	    $idv = $request['idv'];
		$gejala = implode(",", $idv);
	    $bn = $request['bobot'];
		$bobot = implode(",", $bn);

		$rows = [];
		foreach($bn as $key => $input) {
		array_push($rows, [
		  'bobot' => isset($bn[$key]) ? $bn[$key] : '', 
		  'id' => isset($idv[$key]) ? $idv[$key] : '' 
		]);
		}
		// dd($rows);
		//hitung
		$list_solusi = GejalaSolusi::whereIn('gejala_id', array($gejala))->orderBy('solusi_id')->get();
		$solusi = [];
		$i=0;
		foreach($list_solusi as $value){
			$list_gejala = GejalaSolusi::where('solusi_id', $value->solusi_id)->distinct()->get();
			if($gejala!=null) {
				$list_gejala = GejalaSolusi::where('solusi_id', $value->solusi_id)
								->whereIn('gejala_id', array($gejala))
								->orderBy('gejala_id')
								->distinct()
								->get();
			}
			$combineCF=0;
			$CFBefore=0;
			$j=0;
			foreach($list_gejala as $value2){
				$j++;
				if($j==1) {
					$combineCF=$value2->nilai;
				}
				else {
				$combineCF =$combineCF + ($value2->nilai * (1 - $combineCF));
					// dd($combineCF);
				}
			}
			if($combineCF>=0.5)
			{
				$solusi[$i]=array('kode'=>$value->solusi->kode_solusi,
									'nama'=>$value->solusi->nama,
									'kepercayaan'=>$combineCF*100);
				$i++;
			}
		}
		$data_list_solusi = $solusi;

		// dd($data_list_gejala);
    	return view('diagnose.first_two', compact('rows', 'data_list_solusi'));
	}

	public function process_three(Request $request)
	{
		$data = $request->all();
	    $idv = $data['idv'];
		$gejala = implode(",", $idv);
        $request->session()->put('gejala_id_grup', $gejala);
	    $bobot = $data['bobot'];

		$rows = [];
        $analisis = Analisis::all()->last();
        if($analisis == null) {
            $init = 'ALS'; $val = '1001';
            $sku_code = $init.$val;
			foreach($bobot as $key => $input) {
			array_push($rows, [
			  'kode_analisis' => $sku_code, 
			  'nama' => $data['nama'], 
			  'plat_nomer' => $data['plat_nomer'], 
			  'bobot' => isset($bobot[$key]) ? $bobot[$key] : '', 
			  'gejala_id' => isset($idv[$key]) ? $idv[$key] : '',
			  'created_at' => date("Y-m-d H:i:s")
			]);
			}
        	$request->session()->put('kode_analisis', $sku_code);
        } else {
            $key= $analisis->kode_analisis;
            $pattern = "/(\d+)/";
            $array = preg_split($pattern, $key, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $inisial = $array[0];
            $code = $array[1] += 1;
            $sku_code = $inisial.$code;
			foreach($bobot as $key => $input) {
			array_push($rows, [
			  'kode_analisis' => $sku_code, 
			  'nama' => $data['nama'], 
			  'plat_nomer' => $data['plat_nomer'], 
			  'bobot' => isset($bobot[$key]) ? $bobot[$key] : '', 
			  'gejala_id' => isset($idv[$key]) ? $idv[$key] : '',
			  'created_at' => date("Y-m-d H:i:s")
			]);
			}
        	$request->session()->put('kode_analisis', $sku_code);
        }
		// dd($rows);
		Analisis::insert($rows);
    	return view('diagnose.first_three', compact('rows'));

	}

	public function anal_process_one(Request $request)
	{
		$kode_analisis = $request->kode_analisis;
		$gejala_id = $request->gejala_id;
		$solusi_id = implode(",", $request->solusi_id);
		$gesol = GejalaSolusi::whereIn('gejala_id', [$solusi_id])->get();
		dd($solusi_id);
	}
}
