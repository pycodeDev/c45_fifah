<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use PHPExcel;
use PHPExcel_IOFactory;
use App\Models\CrudModel;

class Data extends BaseController
{
	protected $crud;
	public function __construct()
	{
		$this->crud = new CrudModel();
	}

	public function index()
	{
		$data['title'] = "Data Pendonor";
		$data['data'] = $this->crud->read_all_data("tb_data");

		return view("Content/Data", $data);
	}

	public function edit()
	{
		$id = $this->request->getPost('id');
		$data = $this->crud->select_1_cond("tb_data", "nomor_trx", $id);
		return json_encode($data);
	}

	public function p_edit()
	{
		$data = $this->request->getPost();

		$id = $data['id'];

		$a['nomor_trx'] = $data['nomor_trx'];
		$a['tanggal_jam'] = $data['tanggal'];
		$a['instansi'] = $data['instansi'];
		$a['nama'] = $data['nama'];
		$a['jk'] = $data['jk'];
		$a['umur'] = $data['umur'];
		$a['golongan'] = $data['gol'];
		$a['job'] = $data['job'];
		$a['status'] = $data['status'];
		$a['jumlah'] = $data['jml'];

		if ($this->crud->update_data_input('tb_data', $a, 'id', $id)) {
			session()->set("flash", TRUE);
			session()->set("sign", 'success');
			session()->set("msg", "Berhasil Ubah Data");
			// session()->set("s_u_data", "Berhasil Ubah Data");
			return redirect()->to('/data');
		} else {
			session()->set("flash", TRUE);
			session()->set("sign", 'error');
			session()->set("msg", "Gagal Ubah Data");
			// session()->set('f_u', "Gagal Ubah Data");
			return redirect()->to("/data");
		}
	}

	public function p_del()
	{
		if ($this->crud->delete_truncate("tb_data")) {
			session()->set("flash", TRUE);
			session()->set("sign", 'success');
			session()->set("msg", "Berhasil Hapus Data");
			// session()->set("s_d_data", "Berhasil Hapus Data");
			return redirect()->to('/data');
		}else {
			session()->set("flash", TRUE);
			session()->set("sign", 'error');
			session()->set("msg", "Gagal Hapus Data");
			// session()->set("f_d_data", "Gagal Hapus Data");
			return redirect()->to('/data');
		}
	}

	public function p_upload()
	{
		$file = $this->request->getFile('file');
		if ($file) {
			$excelReader = new PHPExcel();
			// mengambil lokasi temp file
			$fileLoc = $file->getTempName();
			// baca file
			$objPHPExcel = PHPExcel_IOFactory::load($fileLoc);
			// ambil sheet yang aktif
			$sheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true, true, true, true, true, true, true, true, true);

			foreach ($sheet as $data => $value) {
				if ($data==1) {
					continue;
				}
				
				$nomor_trx = $value['B'];
				$tanggal_jam = $value['C'];
				$instansi = $value['D'];
				$nama_pendonor = $value['E'];
				$jenis_kelamin = $value['F'];
				$umur = $value['G'];
				$gol = $value['H'];
				$pekerjaan = $value['I'];
				$status_pendonor = $value['J'];
				$jumlah_donor = $value['K'];
				$rekome = $value['L'];

				$this->crud->save_data("tb_data", array(
					"nomor_trx" => $nomor_trx,
					"tanggal_jam" => $tanggal_jam,
					"instansi" => $instansi,
					"nama" => $nama_pendonor,
					"jk" => $jenis_kelamin,
					"umur" => $umur,
					"golongan" => $gol,
					"job" => $pekerjaan,
					"status" => $status_pendonor,
					"jumlah" => $jumlah_donor,
					"rekomendasi" => $rekome
				));
			}

			session()->set("flash", TRUE);
			session()->set("sign", 'success');
			session()->set("msg", "Berhasil Menyimpan Data");
			// session()->set("s_data", "Berhasil Menyimpan Data");
			return redirect()->to('/data');
		}else {
			session()->set("flash", TRUE);
			session()->set("sign", 'error');
			session()->set("msg", "Data Tidak Ada");
			// session()->set("f_data", "Data Tidak Ada");
			return redirect()->to('/data');
		}
	}
}
