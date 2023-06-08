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
		$redirect_page = $this->input->post('redirect_page');
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
		);

		$this->cart->insert($data);
		redirect($redirect_page);
	}

	public function lihat_keranjang()
	{
		$data['title'] = 'Lihat Keranjang';
		$this->load->view('lihat_keranjang', $data);
	}
}
