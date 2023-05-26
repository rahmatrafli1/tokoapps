<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Barang extends CI_Controller
{
	public function index()
	{
		$data['barang'] = $this->Model_barang->tampil_data()->result();
		$data['title'] = 'Data Barang';
		$this->load->view('admin/data_barang', $data);
	}
}
