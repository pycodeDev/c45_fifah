<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$data['title'] = "Sistem Klasifikasi Pendonor";
		return view('Content/Dashboard', $data);
	}
	
	public function about()
	{
		$data['title'] = "Tentang System";
		return view('Content/About', $data);
	}
}
