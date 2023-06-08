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

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('/');
	}

	public function pembayaran()
	{
		$data['title'] = 'Pembayaran';
		$this->load->view('pembayaran', $data);
	}

	public function proses_pesanan()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama Lengkap anda Wajib diisi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Lengkap anda Wajib diisi!']);
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric', ['required' => 'Nomor Telepon anda Wajib diisi!', 'numeric' => 'Nomor Telepon anda harus berupa angka!']);
		$this->form_validation->set_rules('jasa', 'Jasa', 'required', ['required' => 'Jasa Pengiriman Wajib diisi!']);
		$this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required', ['required' => 'Metode Pembayaran Wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Pembayaran';
			return $this->load->view('pembayaran', $data);
		} else {
			$this->cart->destroy();
			$data['title'] = 'Pesanan';
			return $this->load->view('pesanan', $data);
		}
	}
}
