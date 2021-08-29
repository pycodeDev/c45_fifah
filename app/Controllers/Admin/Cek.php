<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CrudModel;

class Cek extends BaseController
{

	public function __construct()
	{
		$this->crud = new CrudModel();
	}

	public function index()
	{
		$data['title'] = "Cek Potensi Pendonor";
		return view("Content/Cek", $data);
	}

	public function tes()
	{
		$data = $this->request->getPost();

		$hasil = $this->crud->persiapan();
		$pjg = count($hasil);
		$i = 1;
		$c=[];
		$hasil1['pendonor_tdk_tetap'] =[];
		$hasil1['pendonor_tetap'] =[];
		$hasil1['hasil_rekom'] = [];
		$hasil1['atribut'] = [];

		foreach ($hasil as $key => $value) {
			$atr = "hasil ke$i";
			$node = "node$i";
			$atr1 = $hasil[$atr][$node]['atribut'];
			array_push($c, $hasil[$atr][$node]['atribut']);

			// foreach ($hasil[$atr][$node] as $key => $value) {
			$ttp = count($hasil[$atr][$node]['tetap']);
			$tdk = count($hasil[$atr][$node]['tdk_tetap']);
			if ($tdk < 2) {
				$str = $hasil[$atr][$node]['tdk_tetap'][0];
				// echo json_encode($hasil1);exit;
				array_push($hasil1['pendonor_tdk_tetap'], "<b>Jika</b> $atr1 <i>$str</i> <b>Maka</b> dia <b><i>Tidak Pendonor Tetap</i></b>");
			}else {
				$a = 1;
				$aaa=array();
				foreach ($hasil[$atr][$node]['tdk_tetap'] as $key => $value) {
					// $str = $hasil[$atr][$node]['tdk_tetap'];
					if ($a == 1) {
						array_push($aaa, "<b>Jika</b> $atr1 terdiri dari <i>$value</i> ,");
					}elseif ($a > 1 and $a < $tdk) {
						array_push($aaa, "<i>$value</i> ,");
					} else {
						array_push($aaa, "<i>$value</i> <b>Maka</b> dia <b><i>Tidak Pendonor Tetap</i></b>");
					} 
					$a++;
				}
				$b = implode("", $aaa);
				array_push($hasil1['pendonor_tdk_tetap'], $b);
			}
			
			if ($ttp < 2) {
				$str = $hasil[$atr][$node]['tetap'][0];
				array_push($hasil1['pendonor_tetap'], "<b>Jika</b> $atr1 <i>$str</i> <b>Maka</b> dia <b><i>Pendonor Tetap</i></b>");
			}else {
				$a = 1;
				$aaa = array();
				foreach ($hasil[$atr][$node]['tetap'] as $key => $value) {
					if ($a == 1) {
						array_push($aaa, "<b>Jika</b> rentang $atr1 terdiri dari <i>$value</i> ,");
					}elseif ($a > 1 and $a < $ttp) {
						array_push($aaa, "<i>$value</i> ,");
					} else {
						array_push($aaa, "<i>$value</i> <b>Maka</b> dia <b><i>Pendonor Tetap</i></b>");
					} 
					$a++;
				}
				$b = implode("", $aaa);
				array_push($hasil1['pendonor_tetap'], $b);
			}
			
			// }

			$i++;
		}
		$ii = 1;
		foreach ($c as $key) {
			$atr = "hasil ke$ii";
			$node = "node$ii";

			if ($key == "umur") {
				foreach ($hasil[$atr][$node]['tdk_tetap'] as $key1) {
					$aaa = explode("-",$key1);
					$g = abs((int) $data[$key]);
					$gg = abs((int) $aaa[0]);
					$ggg = abs((int) $aaa[1]);
					if ($g >= $gg and $g <= $ggg) {
						array_push($hasil1['hasil_rekom'], "<b>Tidak Menjadi Rekomendasi Pendonor Tetap</b>");
	
						if ($data[$key] == "tni") {
							$hhh = "TNI";
						}elseif ($data[$key] == "peg_swasta") {
							$hhh = "peg. swasta";
						}elseif ($data[$key] == "peg_negri") {
							$hhh = "peg. negeri";
						}elseif ($data[$key] == "lain") {
							$hhh = "Lain-Lainnya";
						}else {
							$hhh = $key1;
						}
	
						array_push($hasil1['atribut'], mb_convert_case($hhh, MB_CASE_TITLE, "UTF-8"));
						break;
					}
				}
			}else {
				foreach ($hasil[$atr][$node]['tdk_tetap'] as $key1) {
					if ($data[$key] == $key1 ) {
						array_push($hasil1['hasil_rekom'], "<b>Tidak Menjadi Rekomendasi Pendonor Tetap</b>");
	
						if ($data[$key] == "tni") {
							$hhh = "TNI";
						}elseif ($data[$key] == "peg_swasta") {
							$hhh = "peg. swasta";
						}elseif ($data[$key] == "peg_negri") {
							$hhh = "peg. negeri";
						}elseif ($data[$key] == "lain") {
							$hhh = "Lain-Lainnya";
						}else {
							$hhh = $key1;
						}
	
						array_push($hasil1['atribut'], mb_convert_case($hhh, MB_CASE_TITLE, "UTF-8"));
						break;
					}
				}
			}

			$ii++;
		}
		if (count($hasil1['hasil_rekom']) == 0) {
			array_push($hasil1['hasil_rekom'], "<b>Menjadi Rekomendasi Pendonor Tetap</b>");
		}

		$data_save = array(
			"jk" => $data['jk'],
			"umur" => $data['umur'],
			"job" => $data['job'],
			"status" => $data['status'],
			"keputusan" => $hasil1['hasil_rekom'][0]
		);
		
		$this->crud->save_data("tb_cek_potensi", $data_save);

		echo json_encode($hasil1);
	}
}
