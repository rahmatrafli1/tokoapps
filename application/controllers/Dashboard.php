<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != 2) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda harus masuk terlebih dahulu!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
			redirect('auth/login');
		}
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
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
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
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama Lengkap anda Wajib diisi!']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Lengkap anda Wajib diisi!']);
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric|max_length[13]', ['required' => 'Nomor Telepon anda Wajib diisi!', 'numeric' => 'Nomor Telepon anda harus berupa angka!', 'max_length' => 'Maksimum 13 Karakter!']);
		$this->form_validation->set_rules('jasa', 'Jasa', 'required', ['required' => 'Jasa Pengiriman Wajib diisi!']);
		$this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required', ['required' => 'Metode Pembayaran Wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Pembayaran';
			return $this->load->view('pembayaran', $data);
		} else {
			$is_process = $this->Model_invoice->index();
			if ($is_process) {
				$this->cart->destroy();
				$data['title'] = 'Pesanan';
				return $this->load->view('pesanan', $data);
			} else {
				echo "Pesanan anda gagal diproses";
			}
		}
	}

	public function detail($id_brg)
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['barang'] = $this->Model_barang->get_detail($id_brg);
		$data['title'] = 'Detail Barang';
		return $this->load->view('detail_barang', $data);
	}
}
