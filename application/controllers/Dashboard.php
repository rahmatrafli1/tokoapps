<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data['barang'] = $this->Model_barang->tampil_data()->result();
		$data['title'] = "Dashboard";
		$this->load->view('dashboard', $data);
	}

	public function tambah_keranjang()
	{
		echo "comming soon!";
	}
}
