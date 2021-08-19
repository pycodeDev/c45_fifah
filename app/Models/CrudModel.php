<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
	public function save_data($table, $data)
	{
		return $this->db->table($table)->insert($data);
	}

	public function read_all_data($table)
	{
		return $this->db->table($table)->get()->getResultArray();
	}

	public function select_1_cond($table, $param = "id", $id = 1)
	{
		return $this->db->table($table)->where([$param => $id])->get()->getResultArray();
	}

	public function update_data_input($table, $data, $param, $id)
	{
		return $this->db->table($table)->update($data, [$param => $id]);
	}

	public function delete_truncate($table)
	{
		return $this->db->table($table)->truncate();
	}

	public function solo_query($query)
	{
		return $this->db->query($query)->getResultArray();
	}

	public function persiapan()
	{
		$a = true;
		$node = 1;
		$hasil_hilang = array();
		$atr_ilang = array();
		
		$debug = array();

		// while ($a == true) {
		while ($node < 4) {
			$out = array();
			$data['total'] = array();
			$data['total']['jk']['pria'] = 0;
			$data['total']['jk']['wanita'] = 0;
			$data['total']['status']['ulang'] = 0;
			$data['total']['status']['baru'] = 0;

			$data['total']['job']['pelajar'] = 0;
			$data['total']['job']['mahasiswa'] = 0;
			$data['total']['job']['peg_swasta'] = 0;
			$data['total']['job']['peg_negri'] = 0;
			$data['total']['job']['wiraswasta'] = 0;
			$data['total']['job']['tni'] = 0;
			$data['total']['job']['polri'] = 0;
			$data['total']['job']['buruh'] = 0;
			$data['total']['job']['dokter'] = 0;
			$data['total']['job']['lain'] = 0;

			$data['total']['umur']['17-24'] = 0;
			$data['total']['umur']['25-31'] = 0;
			$data['total']['umur']['32-38'] = 0;
			$data['total']['umur']['39-45'] = 0;
			$data['total']['umur']['46-52'] = 0;
			$data['total']['umur']['53-59'] = 0;
			
			$data['tetap'] = array();
			$data['tetap']['jk']['pria'] = 0;
			$data['tetap']['jk']['wanita'] = 0;
			$data['tetap']['status']['ulang'] = 0;
			$data['tetap']['status']['baru'] = 0;

			$data['tetap']['job']['pelajar'] = 0;
			$data['tetap']['job']['mahasiswa'] = 0;
			$data['tetap']['job']['peg_swasta'] = 0;
			$data['tetap']['job']['peg_negri'] = 0;
			$data['tetap']['job']['wiraswasta'] = 0;
			$data['tetap']['job']['tni'] = 0;
			$data['tetap']['job']['polri'] = 0;
			$data['tetap']['job']['buruh'] = 0;
			$data['tetap']['job']['dokter'] = 0;
			$data['tetap']['job']['lain'] = 0;

			$data['tetap']['umur']['17-24'] = 0;
			$data['tetap']['umur']['25-31'] = 0;
			$data['tetap']['umur']['32-38'] = 0;
			$data['tetap']['umur']['39-45'] = 0;
			$data['tetap']['umur']['46-52'] = 0;
			$data['tetap']['umur']['53-59'] = 0;
			
			$data['tdk_tetap'] = array();
			$data['tdk_tetap']['jk']['pria'] = 0;
			$data['tdk_tetap']['jk']['wanita'] = 0;
			$data['tdk_tetap']['status']['ulang'] = 0;
			$data['tdk_tetap']['status']['baru'] = 0;

			$data['tdk_tetap']['job']['pelajar'] = 0;
			$data['tdk_tetap']['job']['mahasiswa'] = 0;
			$data['tdk_tetap']['job']['peg_swasta'] = 0;
			$data['tdk_tetap']['job']['peg_negri'] = 0;
			$data['tdk_tetap']['job']['wiraswasta'] = 0;
			$data['tdk_tetap']['job']['tni'] = 0;
			$data['tdk_tetap']['job']['polri'] = 0;
			$data['tdk_tetap']['job']['buruh'] = 0;
			$data['tdk_tetap']['job']['dokter'] = 0;
			$data['tdk_tetap']['job']['lain'] = 0;

			$data['tdk_tetap']['umur']['17-24'] = 0;
			$data['tdk_tetap']['umur']['25-31'] = 0;
			$data['tdk_tetap']['umur']['32-38'] = 0;
			$data['tdk_tetap']['umur']['39-45'] = 0;
			$data['tdk_tetap']['umur']['46-52'] = 0;
			$data['tdk_tetap']['umur']['53-59'] = 0;

			if ($node == 1) {
				$train = $this->read_all_data("tb_data");
				$tetap = $this->select_1_cond("tb_data", "rekomendasi", "Pendonor Tetap");
				$tidak_tetap = $this->select_1_cond("tb_data", "rekomendasi", "Tidak Pendonor Tetap");

				$data['total_data'] = count($train);
				$data['pendonor_tetap'] = count($tetap);
				$data['pendonor_tidak_tetap'] = count($tidak_tetap);

				foreach ($train as $val) {
					if (isset($data['total']['jk']) and count($data['total']['jk']) > 1) {
						if ($val['jk'] == "Pria") {
							$data['total']['jk']['pria'] = $data['total']['jk']['pria'] + 1;
						}elseif ($val['jk'] == "Wanita") {
							$data['total']['jk']['wanita'] = $data['total']['jk']['wanita'] + 1;
						}
					}
					
					if (isset($data['total']['status']) and count($data['total']['status']) > 1) {
						if ($val['status'] == "Ulang") {
							$data['total']['status']['ulang'] = $data['total']['status']['ulang'] + 1;
						}elseif ($val['status'] == "Baru") {
							$data['total']['status']['baru'] = $data['total']['status']['baru'] + 1;
						}
					}
		
					if (isset($data['total']['job']) and count($data['total']['job']) > 1) {
						if ($val['job'] == "Pelajar") {
							$data['total']['job']['pelajar'] = $data['total']['job']['pelajar'] + 1;
						}elseif ($val['job'] == "Mahasiswa") {
							$data['total']['job']['mahasiswa'] = $data['total']['job']['mahasiswa'] + 1;
						}elseif ($val['job'] == "Peg. Swasta") {
							$data['total']['job']['peg_swasta'] = $data['total']['job']['peg_swasta'] + 1;
						}elseif ($val['job'] == "Peg. Negeri") {
							$data['total']['job']['peg_negri'] = $data['total']['job']['peg_negri'] + 1;
						}elseif ($val['job'] == "Wiraswasta") {
							$data['total']['job']['wiraswasta'] = $data['total']['job']['wiraswasta'] + 1;
						}elseif ($val['job'] == "Tni") {
							$data['total']['job']['tni'] = $data['total']['job']['tni'] + 1;
						}elseif ($val['job'] == "Polri") {
							$data['total']['job']['polri'] = $data['total']['job']['polri'] + 1;
						}elseif ($val['job'] == "Buruh") {
							$data['total']['job']['buruh'] = $data['total']['job']['buruh'] + 1;
						}elseif ($val['job'] == "Lain-Lainnya") {
							$data['total']['job']['lain'] = $data['total']['job']['lain'] + 1;
						}elseif ($val['job'] == "Dokter") {
							$data['total']['job']['dokter'] = $data['total']['job']['dokter'] + 1;
						}
					}
		
					if (isset($data['total']['umur']) and count($data['total']['umur']) > 1) {
						if ($val['umur'] >= 17 and $val['umur'] <= 24) {
							$data['total']['umur']['17-24'] = $data['total']['umur']['17-24'] + 1;
						}elseif ($val['umur'] >= 25 and $val['umur'] <= 31) {
							$data['total']['umur']['25-31'] = $data['total']['umur']['25-31'] + 1;
						}elseif ($val['umur'] >= 32 and $val['umur'] <= 38) {
							$data['total']['umur']['32-38'] = $data['total']['umur']['32-38'] + 1;
						}elseif ($val['umur'] >= 39 and $val['umur'] <= 45) {
							$data['total']['umur']['39-45'] = $data['total']['umur']['39-45'] + 1;
						}elseif ($val['umur'] >= 46 and $val['umur'] <= 52) {
							$data['total']['umur']['46-52'] = $data['total']['umur']['46-52'] + 1;
						}elseif ($val['umur'] >= 53 and $val['umur'] <= 59) {
							$data['total']['umur']['53-59'] = $data['total']['umur']['53-59'] + 1;
						}
					}
				}
		
				foreach ($tetap as $vall) {
					if (isset($data['tetap']['jk']) and count($data['tetap']['jk']) > 1) {
						if ($vall['jk'] == "Pria") {
							$data['tetap']['jk']['pria'] = $data['tetap']['jk']['pria'] + 1;
						}elseif ($vall['jk'] == "Wanita") {
							$data['tetap']['jk']['wanita'] = $data['tetap']['jk']['wanita'] + 1;
						}
					}
					
					if (isset($data['tetap']['status']) and count($data['tetap']['status']) > 1) {
						if ($vall['status'] == "Ulang") {
							$data['tetap']['status']['ulang'] = $data['tetap']['status']['ulang'] + 1;
						}elseif ($vall['status'] == "Baru") {
							$data['tetap']['status']['baru'] = $data['tetap']['status']['baru'] + 1;
						}
					}
		
					if (isset($data['tetap']['job']) and count($data['tetap']['job']) > 1) {
						if ($vall['job'] == "Pelajar") {
							$data['tetap']['job']['pelajar'] = $data['tetap']['job']['pelajar'] + 1;
						}elseif ($vall['job'] == "Mahasiswa") {
							$data['tetap']['job']['mahasiswa'] = $data['tetap']['job']['mahasiswa'] + 1;
						}elseif ($vall['job'] == "Peg. Swasta") {
							$data['tetap']['job']['peg_swasta'] = $data['tetap']['job']['peg_swasta'] + 1;
						}elseif ($vall['job'] == "Peg. Negeri") {
							$data['tetap']['job']['peg_negri'] = $data['tetap']['job']['peg_negri'] + 1;
						}elseif ($vall['job'] == "Wiraswasta") {
							$data['tetap']['job']['wiraswasta'] = $data['tetap']['job']['wiraswasta'] + 1;
						}elseif ($vall['job'] == "Tni") {
							$data['tetap']['job']['tni'] = $data['tetap']['job']['tni'] + 1;
						}elseif ($vall['job'] == "Polri") {
							$data['tetap']['job']['polri'] = $data['tetap']['job']['polri'] + 1;
						}elseif ($vall['job'] == "Buruh") {
							$data['tetap']['job']['buruh'] = $data['tetap']['job']['buruh'] + 1;
						}elseif ($vall['job'] == "Lain-Lainnya") {
							$data['tetap']['job']['lain'] = $data['tetap']['job']['lain'] + 1;
						}elseif ($vall['job'] == "Dokter") {
							$data['tetap']['job']['dokter'] = $data['tetap']['job']['dokter'] + 1;
						}
					}
		
					if (isset($data['tetap']['umur']) and count($data['tetap']['umur']) > 1) {
						if ($vall['umur'] >= 17 and $vall['umur'] <= 24) {
							$data['tetap']['umur']['17-24'] = $data['tetap']['umur']['17-24'] + 1;
						}elseif ($vall['umur'] >= 25 and $vall['umur'] <= 31) {
							$data['tetap']['umur']['25-31'] = $data['tetap']['umur']['25-31'] + 1;
						}elseif ($vall['umur'] >= 32 and $vall['umur'] <= 38) {
							$data['tetap']['umur']['32-38'] = $data['tetap']['umur']['32-38'] + 1;
						}elseif ($vall['umur'] >= 39 and $vall['umur'] <= 45) {
							$data['tetap']['umur']['39-45'] = $data['tetap']['umur']['39-45'] + 1;
						}elseif ($vall['umur'] >= 46 and $vall['umur'] <= 52) {
							$data['tetap']['umur']['46-52'] = $data['tetap']['umur']['46-52'] + 1;
						}elseif ($vall['umur'] >= 53 and $vall['umur'] <= 59) {
							$data['tetap']['umur']['53-59'] = $data['tetap']['umur']['53-59'] + 1;
						}
					}
				}
		
				foreach ($tidak_tetap as $valll) {
					if (isset($data['tdk_tetap']['jk']) and count($data['tdk_tetap']['jk']) > 1) {
						if ($valll['jk'] == "Pria") {
							$data['tdk_tetap']['jk']['pria'] = $data['tdk_tetap']['jk']['pria'] + 1;
						}elseif ($valll['jk'] == "Wanita") {
							$data['tdk_tetap']['jk']['wanita'] = $data['tdk_tetap']['jk']['wanita'] + 1;
						}
					}
					
					if (isset($data['tdk_tetap']['status']) and count($data['tdk_tetap']['status']) > 1) {
						if ($valll['status'] == "Ulang") {
							$data['tdk_tetap']['status']['ulang'] = $data['tdk_tetap']['status']['ulang'] + 1;
						}elseif ($valll['status'] == "Baru") {
							$data['tdk_tetap']['status']['baru'] = $data['tdk_tetap']['status']['baru'] + 1;
						}
					}
		
					if (isset($data['tdk_tetap']['job']) and count($data['tdk_tetap']['job']) > 1) {
						if ($valll['job'] == "Pelajar") {
							$data['tdk_tetap']['job']['pelajar'] = $data['tdk_tetap']['job']['pelajar'] + 1;
						}elseif ($valll['job'] == "Mahasiswa") {
							$data['tdk_tetap']['job']['mahasiswa'] = $data['tdk_tetap']['job']['mahasiswa'] + 1;
						}elseif ($valll['job'] == "Peg. Swasta") {
							$data['tdk_tetap']['job']['peg_swasta'] = $data['tdk_tetap']['job']['peg_swasta'] + 1;
						}elseif ($valll['job'] == "Peg. Negeri") {
							$data['tdk_tetap']['job']['peg_negri'] = $data['tdk_tetap']['job']['peg_negri'] + 1;
						}elseif ($valll['job'] == "Wiraswasta") {
							$data['tdk_tetap']['job']['wiraswasta'] = $data['tdk_tetap']['job']['wiraswasta'] + 1;
						}elseif ($valll['job'] == "Tni") {
							$data['tdk_tetap']['job']['tni'] = $data['tdk_tetap']['job']['tni'] + 1;
						}elseif ($valll['job'] == "Polri") {
							$data['tdk_tetap']['job']['polri'] = $data['tdk_tetap']['job']['polri'] + 1;
						}elseif ($valll['job'] == "Buruh") {
							$data['tdk_tetap']['job']['buruh'] = $data['tdk_tetap']['job']['buruh'] + 1;
						}elseif ($valll['job'] == "Lain-Lainnya") {
							$data['tdk_tetap']['job']['lain'] = $data['tdk_tetap']['job']['lain'] + 1;
						}elseif ($valll['job'] == "Dokter") {
							$data['tdk_tetap']['job']['dokter'] = $data['tdk_tetap']['job']['dokter'] + 1;
						}
					}
		
					if (isset($data['tdk_tetap']['umur']) and count($data['tdk_tetap']['umur']) > 1) {
						if ($valll['umur'] >= 17 and $valll['umur'] <= 24) {
							$data['tdk_tetap']['umur']['17-24'] = $data['tdk_tetap']['umur']['17-24'] + 1;
						}elseif ($valll['umur'] >= 25 and $valll['umur'] <= 31) {
							$data['tdk_tetap']['umur']['25-31'] = $data['tdk_tetap']['umur']['25-31'] + 1;
						}elseif ($valll['umur'] >= 32 and $valll['umur'] <= 38) {
							$data['tdk_tetap']['umur']['32-38'] = $data['tdk_tetap']['umur']['32-38'] + 1;
						}elseif ($valll['umur'] >= 39 and $valll['umur'] <= 45) {
							$data['tdk_tetap']['umur']['39-45'] = $data['tdk_tetap']['umur']['39-45'] + 1;
						}elseif ($valll['umur'] >= 46 and $valll['umur'] <= 52) {
							$data['tdk_tetap']['umur']['46-52'] = $data['tdk_tetap']['umur']['46-52'] + 1;
						}elseif ($valll['umur'] >= 53 and $valll['umur'] <= 59) {
							$data['tdk_tetap']['umur']['53-59'] = $data['tdk_tetap']['umur']['53-59'] + 1;
						}
					}
				}
		
				$entropy = $this->entropy($data);
				$gain = $this->gain($entropy, $data);
				$atr = $gain['instruksi']['atribut'];
				if (isset($gain['instruksi']['buang'])) {
					$atr_buang = $gain['instruksi']['buang'];
					foreach ($atr_buang as $k) {
						array_push($atr_ilang, $k);
					}
				}
				// hasil dari node
				$aa = "hasil ke".$node; 
				$arr_name = "node".$node; 

				$out[$arr_name]['atribut'] = $atr;
				foreach ($data['total'][$atr] as $key => $value) {
					$b['tes'] = 1;
					foreach ($atr_ilang as $val) {
						// echo "$key - $val<br/>";
						if ($key == $val) {
							$b['tes'] = 1;
							break;
						}else {
							$b['tes'] = $b['tes'] + 1;
						}
					}
					if ($b['tes'] > 1) {
						$out[$arr_name]['tetap'][] = $key;
					}else {
						$out[$arr_name]['tdk_tetap'][] = $key;
					}
				}

				// dd($out);
				// penghilangan beberapa atribut di pencarian mysql
				if (count($atr_buang) > 0) {
					foreach ($atr_buang as $buang) {
						if ($buang == "peg_swasta") {
							$buang = "Peg. Swasta";
							$hasil_hilang[] = "$atr NOT LIKE '%$buang%'";
						}elseif ($buang == "peg_negri") {
							$buang = "Peg. Negeri";
							$hasil_hilang[] = "$atr NOT LIKE '%$buang%'";
						}elseif ($buang == "lain") {
							$buang = "Lain-Lainnya";
							$hasil_hilang[] = "$atr NOT LIKE '%$buang%'";
						}elseif ($buang == "17-24") {
							$hasil_hilang[] = "$atr BETWEEN 17 AND 24";
						}elseif ($buang == "25-31") {
							$hasil_hilang[] = "$atr BETWEEN 25 AND 31";
						}elseif ($buang == "32-38") {
							$hasil_hilang[] = "$atr BETWEEN 32 AND 38";
						}elseif ($buang == "39-45") {
							$hasil_hilang[] = "$atr BETWEEN 39 AND 45";
						}elseif ($buang == "46-52") {
							$hasil_hilang[] = "$atr BETWEEN 46 AND 52";
						}elseif ($buang == "53-59") {
							$hasil_hilang[] = "$atr BETWEEN 53 AND 59";
						}else {
							$hasil_hilang[] = "$atr NOT LIKE '%$buang%'";
						}
					}
				}
		
				// penghilangan array 
				// foreach ($atr_buang as $buang1) {
				// 	unset($data['total'][$atr][$buang1]);
				// 	unset($data['tetap'][$atr][$buang1]);
				// 	unset($data['tdk_tetap'][$atr][$buang1]);
				// }
		
				if (count($data['total']) == 0) {
					$a = false;
				}

				// $debug[$aa]['entropy'] = $entropy;
				// $debug[$aa]['gain'] = $gain;
				// $debug[$aa]['data'] = $out;
				$debug[$aa] = $out;
			}else {
				$where = implode(" and ", $hasil_hilang);
				$train = $this->solo_query("select * from tb_data where $where");
				$tetap = $this->solo_query("select * from tb_data where rekomendasi='Pendonor Tetap' and ($where)");
				$tidak_tetap = $this->solo_query("select * from tb_data where rekomendasi='Tidak Pendonor Tetap' and ($where)");

				// echo json_encode("select * from tb_data where rekomendasi='Tidak Pendonor Tetap' and ($where)");exit;

				$data['total_data'] = count($train);
				$data['pendonor_tetap'] = count($tetap);
				$data['pendonor_tidak_tetap'] = count($tidak_tetap);

				foreach ($train as $val) {
					$jkt = count(array_keys($data['total']['jk'])) - count(array_intersect(array_keys($data['total']['jk']), $atr_ilang));
					if ($jkt >= 2) {
						if ($val['jk'] == "Pria") {
							$data['total']['jk']['pria'] = $data['total']['jk']['pria'] + 1;
						}elseif ($val['jk'] == "Wanita") {
							$data['total']['jk']['wanita'] = $data['total']['jk']['wanita'] + 1;
						}
					}
					
					$stat = count(array_keys($data['total']['status'])) - count(array_intersect(array_keys($data['total']['status']), $atr_ilang));
					if ($stat >= 2) {
						if ($val['status'] == "Ulang") {
							$data['total']['status']['ulang'] = $data['total']['status']['ulang'] + 1;
						}elseif ($val['status'] == "Baru") {
							$data['total']['status']['baru'] = $data['total']['status']['baru'] + 1;
						}
					}
					
					$jobt = count(array_keys($data['total']['job'])) - count(array_intersect(array_keys($data['total']['job']), $atr_ilang));
					if ($jobt >= 2) {
						if ($val['job'] == "Pelajar") {
							$data['total']['job']['pelajar'] = $data['total']['job']['pelajar'] + 1;
						}elseif ($val['job'] == "Mahasiswa") {
							$data['total']['job']['mahasiswa'] = $data['total']['job']['mahasiswa'] + 1;
						}elseif ($val['job'] == "Peg. Swasta") {
							$data['total']['job']['peg_swasta'] = $data['total']['job']['peg_swasta'] + 1;
						}elseif ($val['job'] == "Peg. Negeri") {
							$data['total']['job']['peg_negri'] = $data['total']['job']['peg_negri'] + 1;
						}elseif ($val['job'] == "Wiraswasta") {
							$data['total']['job']['wiraswasta'] = $data['total']['job']['wiraswasta'] + 1;
						}elseif ($val['job'] == "Tni") {
							$data['total']['job']['tni'] = $data['total']['job']['tni'] + 1;
						}elseif ($val['job'] == "Polri") {
							$data['total']['job']['polri'] = $data['total']['job']['polri'] + 1;
						}elseif ($val['job'] == "Buruh") {
							$data['total']['job']['buruh'] = $data['total']['job']['buruh'] + 1;
						}elseif ($val['job'] == "Lain-Lainnya") {
							$data['total']['job']['lain'] = $data['total']['job']['lain'] + 1;
						}elseif ($val['job'] == "Dokter") {
							$data['total']['job']['dokter'] = $data['total']['job']['dokter'] + 1;
						}
					}
					
					$umurt = count(array_keys($data['total']['umur'])) - count(array_intersect(array_keys($data['total']['umur']), $atr_ilang));
					if ($umurt >= 2) {
						if ($val['umur'] >= 17 and $val['umur'] <= 24) {
							$data['total']['umur']['17-24'] = $data['total']['umur']['17-24'] + 1;
						}elseif ($val['umur'] >= 25 and $val['umur'] <= 31) {
							$data['total']['umur']['25-31'] = $data['total']['umur']['25-31'] + 1;
						}elseif ($val['umur'] >= 32 and $val['umur'] <= 38) {
							$data['total']['umur']['32-38'] = $data['total']['umur']['32-38'] + 1;
						}elseif ($val['umur'] >= 39 and $val['umur'] <= 45) {
							$data['total']['umur']['39-45'] = $data['total']['umur']['39-45'] + 1;
						}elseif ($val['umur'] >= 46 and $val['umur'] <= 52) {
							$data['total']['umur']['46-52'] = $data['total']['umur']['46-52'] + 1;
						}elseif ($val['umur'] >= 53 and $val['umur'] <= 59) {
							$data['total']['umur']['53-59'] = $data['total']['umur']['53-59'] + 1;
						}
					}
				}
				
				foreach ($tetap as $vall) {
					$jktt = count(array_keys($data['tetap']['jk'])) - count(array_intersect(array_keys($data['tetap']['jk']), $atr_ilang));
					if ($jktt >= 2) {
						if ($vall['jk'] == "Pria") {
							$data['tetap']['jk']['pria'] = $data['tetap']['jk']['pria'] + 1;
						}elseif ($vall['jk'] == "Wanita") {
							$data['tetap']['jk']['wanita'] = $data['tetap']['jk']['wanita'] + 1;
						}
					}
					
					$statt = count(array_keys($data['tetap']['status'])) - count(array_intersect(array_keys($data['tetap']['status']), $atr_ilang));
					if ($statt >= 2) {
						if ($vall['status'] == "Ulang") {
							$data['tetap']['status']['ulang'] = $data['tetap']['status']['ulang'] + 1;
						}elseif ($vall['status'] == "Baru") {
							$data['tetap']['status']['baru'] = $data['tetap']['status']['baru'] + 1;
						}
					}
					
					$jobtt = count(array_keys($data['tetap']['job'])) - count(array_intersect(array_keys($data['tetap']['job']), $atr_ilang));
					if ($jobtt >= 2) {
						if ($vall['job'] == "Pelajar") {
							$data['tetap']['job']['pelajar'] = $data['tetap']['job']['pelajar'] + 1;
						}elseif ($vall['job'] == "Mahasiswa") {
							$data['tetap']['job']['mahasiswa'] = $data['tetap']['job']['mahasiswa'] + 1;
						}elseif ($vall['job'] == "Peg. Swasta") {
							$data['tetap']['job']['peg_swasta'] = $data['tetap']['job']['peg_swasta'] + 1;
						}elseif ($vall['job'] == "Peg. Negeri") {
							$data['tetap']['job']['peg_negri'] = $data['tetap']['job']['peg_negri'] + 1;
						}elseif ($vall['job'] == "Wiraswasta") {
							$data['tetap']['job']['wiraswasta'] = $data['tetap']['job']['wiraswasta'] + 1;
						}elseif ($vall['job'] == "Tni") {
							$data['tetap']['job']['tni'] = $data['tetap']['job']['tni'] + 1;
						}elseif ($vall['job'] == "Polri") {
							$data['tetap']['job']['polri'] = $data['tetap']['job']['polri'] + 1;
						}elseif ($vall['job'] == "Buruh") {
							$data['tetap']['job']['buruh'] = $data['tetap']['job']['buruh'] + 1;
						}elseif ($vall['job'] == "Lain-Lainnya") {
							$data['tetap']['job']['lain'] = $data['tetap']['job']['lain'] + 1;
						}elseif ($vall['job'] == "Dokter") {
							$data['tetap']['job']['dokter'] = $data['tetap']['job']['dokter'] + 1;
						}
					}
					
					$umurtt = count(array_keys($data['tetap']['umur'])) - count(array_intersect(array_keys($data['tetap']['umur']), $atr_ilang));
					if ($umurtt >= 2) {
						if ($vall['umur'] >= 17 and $vall['umur'] <= 24) {
							$data['tetap']['umur']['17-24'] = $data['tetap']['umur']['17-24'] + 1;
						}elseif ($vall['umur'] >= 25 and $vall['umur'] <= 31) {
							$data['tetap']['umur']['25-31'] = $data['tetap']['umur']['25-31'] + 1;
						}elseif ($vall['umur'] >= 32 and $vall['umur'] <= 38) {
							$data['tetap']['umur']['32-38'] = $data['tetap']['umur']['32-38'] + 1;
						}elseif ($vall['umur'] >= 39 and $vall['umur'] <= 45) {
							$data['tetap']['umur']['39-45'] = $data['tetap']['umur']['39-45'] + 1;
						}elseif ($vall['umur'] >= 46 and $vall['umur'] <= 52) {
							$data['tetap']['umur']['46-52'] = $data['tetap']['umur']['46-52'] + 1;
						}elseif ($vall['umur'] >= 53 and $vall['umur'] <= 59) {
							$data['tetap']['umur']['53-59'] = $data['tetap']['umur']['53-59'] + 1;
						}
					}
				}
		
				foreach ($tidak_tetap as $valll) {
					$jkttt = count(array_keys($data['tdk_tetap']['jk'])) - count(array_intersect(array_keys($data['tdk_tetap']['jk']), $atr_ilang));
					if ($jkttt >= 2) {
						if ($valll['jk'] == "Pria") {
							$data['tdk_tetap']['jk']['pria'] = $data['tdk_tetap']['jk']['pria'] + 1;
						}elseif ($valll['jk'] == "Wanita") {
							$data['tdk_tetap']['jk']['wanita'] = $data['tdk_tetap']['jk']['wanita'] + 1;
						}
					}
					
					$stattt = count(array_keys($data['tdk_tetap']['status'])) - count(array_intersect(array_keys($data['tdk_tetap']['status']), $atr_ilang));
					if ($stattt >= 2) {
						if ($valll['status'] == "Ulang") {
							$data['tdk_tetap']['status']['ulang'] = $data['tdk_tetap']['status']['ulang'] + 1;
						}elseif ($valll['status'] == "Baru") {
							$data['tdk_tetap']['status']['baru'] = $data['tdk_tetap']['status']['baru'] + 1;
						}
					}
					
					$jobttt = count(array_keys($data['tdk_tetap']['job'])) - count(array_intersect(array_keys($data['tdk_tetap']['job']), $atr_ilang));
					if ($jobttt >= 2) {
						if ($valll['job'] == "Pelajar") {
							$data['tdk_tetap']['job']['pelajar'] = $data['tdk_tetap']['job']['pelajar'] + 1;
						}elseif ($valll['job'] == "Mahasiswa") {
							$data['tdk_tetap']['job']['mahasiswa'] = $data['tdk_tetap']['job']['mahasiswa'] + 1;
						}elseif ($valll['job'] == "Peg. Swasta") {
							$data['tdk_tetap']['job']['peg_swasta'] = $data['tdk_tetap']['job']['peg_swasta'] + 1;
						}elseif ($valll['job'] == "Peg. Negeri") {
							$data['tdk_tetap']['job']['peg_negri'] = $data['tdk_tetap']['job']['peg_negri'] + 1;
						}elseif ($valll['job'] == "Wiraswasta") {
							$data['tdk_tetap']['job']['wiraswasta'] = $data['tdk_tetap']['job']['wiraswasta'] + 1;
						}elseif ($valll['job'] == "Tni") {
							$data['tdk_tetap']['job']['tni'] = $data['tdk_tetap']['job']['tni'] + 1;
						}elseif ($valll['job'] == "Polri") {
							$data['tdk_tetap']['job']['polri'] = $data['tdk_tetap']['job']['polri'] + 1;
						}elseif ($valll['job'] == "Buruh") {
							$data['tdk_tetap']['job']['buruh'] = $data['tdk_tetap']['job']['buruh'] + 1;
						}elseif ($valll['job'] == "Lain-Lainnya") {
							$data['tdk_tetap']['job']['lain'] = $data['tdk_tetap']['job']['lain'] + 1;
						}elseif ($valll['job'] == "Dokter") {
							$data['tdk_tetap']['job']['dokter'] = $data['tdk_tetap']['job']['dokter'] + 1;
						}
					}
					
					$umurttt = count(array_keys($data['tdk_tetap']['umur'])) - count(array_intersect(array_keys($data['tdk_tetap']['umur']), $atr_ilang));
					if ($umurttt >= 2) {
						if ($valll['umur'] >= 17 and $valll['umur'] <= 24) {
							$data['tdk_tetap']['umur']['17-24'] = $data['tdk_tetap']['umur']['17-24'] + 1;
						}elseif ($valll['umur'] >= 25 and $valll['umur'] <= 31) {
							$data['tdk_tetap']['umur']['25-31'] = $data['tdk_tetap']['umur']['25-31'] + 1;
						}elseif ($valll['umur'] >= 32 and $valll['umur'] <= 38) {
							$data['tdk_tetap']['umur']['32-38'] = $data['tdk_tetap']['umur']['32-38'] + 1;
						}elseif ($valll['umur'] >= 39 and $valll['umur'] <= 45) {
							$data['tdk_tetap']['umur']['39-45'] = $data['tdk_tetap']['umur']['39-45'] + 1;
						}elseif ($valll['umur'] >= 46 and $valll['umur'] <= 52) {
							$data['tdk_tetap']['umur']['46-52'] = $data['tdk_tetap']['umur']['46-52'] + 1;
						}elseif ($valll['umur'] >= 53 and $valll['umur'] <= 59) {
							$data['tdk_tetap']['umur']['53-59'] = $data['tdk_tetap']['umur']['53-59'] + 1;
						}
					}
				}

				foreach ($atr_ilang as $kk) {
					if (isset($data['total']['job'][$kk])) {
						unset($data['total']['job'][$kk]);
						unset($data['tetap']['job'][$kk]);
						unset($data['tdk_tetap']['job'][$kk]);
					}elseif (isset($data['total']['umur'][$kk])) {
						unset($data['total']['umur'][$kk]);
						unset($data['tetap']['umur'][$kk]);
						unset($data['tdk_tetap']['umur'][$kk]);
					}elseif (isset($data['total']['status'][$kk])) {
						unset($data['total']['status']);
						unset($data['tetap']['status']);
						unset($data['tdk_tetap']['status']);
						// unset($data['total']['status'][$kk]);
						// unset($data['tetap']['status'][$kk]);
						// unset($data['tdk_tetap']['status'][$kk]);
					}elseif (isset($data['total']['jk'][$kk])) {
						unset($data['total']['jk']);
						unset($data['tetap']['jk']);
						unset($data['tdk_tetap']['jk']);
						// unset($data['total']['jk'][$kk]);
						// unset($data['tetap']['jk'][$kk]);
						// unset($data['tdk_tetap']['jk'][$kk]);
					}
				}
				// echo json_encode($data);exit;
				$entropy = $this->entropy($data);
				$gain = $this->gain($entropy, $data);
				$atr = $gain['instruksi']['atribut'];
				if (isset($gain['instruksi']['buang'])) {
					$atr_buang = $gain['instruksi']['buang'];
					foreach ($atr_buang as $k) {
						array_push($atr_ilang, $k);
					}
				}
				// hasil dari node
				$aa = "hasil ke".$node; 
				$arr_name = "node".$node;
				
				$out[$arr_name]['atribut'] = $atr;
				foreach ($data['total'][$atr] as $key => $value) {
					$b['tes'] = 1;
					foreach ($atr_ilang as $val) {
						// echo "$key - $val<br/>";
						if ($key == $val) {
							$b['tes'] = 1;
							break;
						}else {
							$b['tes'] = $b['tes'] + 1;
						}
					}
					if ($b['tes'] > 1) {
						$out[$arr_name]['tetap'][] = $key;
					}else {
						$out[$arr_name]['tdk_tetap'][] = $key;
					}
				}
		
				// penghilangan beberapa atribut di pencarian mysql
				if (count($atr_buang) > 0) {
					foreach ($atr_buang as $buang) {
						if ($buang == "peg_swasta") {
							$buang = "Peg. Swasta";
							$hasil_hilang[] = "$atr NOT LIKE '%$buang%'";
						}elseif ($buang == "peg_negri") {
							$buang = "Peg. Negeri";
							$hasil_hilang[] = "$atr NOT LIKE '%$buang%'";
						}elseif ($buang == "lain") {
							$buang = "Lain-Lainnya";
							$hasil_hilang[] = "$atr NOT LIKE '%$buang%'";
						}elseif ($buang == "17-24") {
							$hasil_hilang[] = "$atr BETWEEN 17 AND 24";
						}elseif ($buang == "25-31") {
							$hasil_hilang[] = "$atr BETWEEN 25 AND 31";
						}elseif ($buang == "32-38") {
							$hasil_hilang[] = "$atr BETWEEN 32 AND 38";
						}elseif ($buang == "39-45") {
							$hasil_hilang[] = "$atr BETWEEN 39 AND 45";
						}elseif ($buang == "46-52") {
							$hasil_hilang[] = "$atr BETWEEN 46 AND 52";
						}elseif ($buang == "53-59") {
							$hasil_hilang[] = "$atr BETWEEN 53 AND 59";
						}else {
							$hasil_hilang[] = "$atr NOT LIKE '%$buang%'";
						}
					}
				}
		
				// penghilangan array 
				// foreach ($atr_buang as $buang1) {
				// 	unset($data['total'][$atr][$buang1]);
				// 	unset($data['tetap'][$atr][$buang1]);
				// 	unset($data['tdk_tetap'][$atr][$buang1]);
				// }
		
				if (count($data['total']) == 0) {
					$a = false;
				}

				// $debug[$aa]['entropy'] = $entropy;
				// $debug[$aa]['gain'] = $gain;
				// $debug[$aa]['data'] = $out;
				$debug[$aa] = $out;
			}
			$node++;
		}

		return $debug;
	}

	public function entropy($data)
	{
		$tet = ($data['pendonor_tetap'] != 0) ? $data['pendonor_tetap'] : 0;
		$tot = ($data['total_data'] != 0) ? $data['total_data'] : 0;
		$tdk = ($data['pendonor_tidak_tetap'] != 0) ? $data['pendonor_tidak_tetap'] : 0;
		// echo "((-($tet)/$tot)*log($tet/$tot, 2)+((-($tdk)/$tot)*log($tdk/$tot, 2)))<br/>";
		// echo ((-(27)/50)*log(27/50, 2)+((-(23)/50)*log(23/50, 2)));exit;
		$entropy['total'] = ((-($tet)/$tot)*log($tet/$tot, 2)+((-($tdk)/$tot)*log($tdk/$tot, 2)));
		$a = array_keys($data['total']);
		$i = 0;
		foreach ($a as $atr) {
			$val = array_keys($data['total'][$atr]);
			foreach ($val as $key) {
				$tet = ($data['tetap'][$atr][$key] != 0) ? $data['tetap'][$atr][$key] : 0;
				$tot = ($data['total'][$atr][$key] != 0) ? $data['total'][$atr][$key] : 0;
				$tdk = ($data['tdk_tetap'][$atr][$key] != 0) ? $data['tdk_tetap'][$atr][$key] : 0;

				if ($tot != 0 && $tet != 0 && $tdk != 0) {
					$entropy[$atr][$key] = ((-($tet)/$tot)*log($tet/$tot,2)+((-($tdk)/$tot)*log($tdk/$tot,2)));
				}else {
					$entropy[$atr][$key] = 0;
				}
			}
		}
		return $entropy;
	}

	public function gain($ent, $data)
	{
		$a = array_keys($data['total']);
		$hasil['instruksi']['max'] = 0;
		foreach ($a as $atr) {
			$val = array_keys($data['total'][$atr]);
			$i = 1;
			$piece = 0;
			foreach ($val as $key) {
				if ($i == 1) {
					$piece = (($data['total'][$atr][$key]/$data['total_data'])*$ent[$atr][$key]);
					$piece = ($ent['total']) - $piece;
				}else {
					$piece = $piece - (($data['total'][$atr][$key]/$data['total_data'])*$ent[$atr][$key]);
				}

				$i++;
			}

			$hasil[$atr] = $piece;
			if ($hasil[$atr] > $hasil['instruksi']['max']) {
				$hasil['instruksi']['max'] = $hasil[$atr];
				$hasil['instruksi']['atribut'] = $atr;

			}
			
		}
		$dibuang = array_keys($ent[$hasil['instruksi']['atribut']]);
		foreach ($dibuang as $tess) {
			if ($ent[$hasil['instruksi']['atribut']][$tess] == 0) {
				$hasil['instruksi']['buang'][] = $tess;
			}
		}

		return $hasil;
	}
}
