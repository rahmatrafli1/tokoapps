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

	public function tambah_aksi()
	{
		$this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required', ['required' => 'Nama Barang Wajib diisi!']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', ['required' => 'Keterangan Wajib diisi!']);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required', ['required' => 'Kategori Wajib diisi!']);
		$this->form_validation->set_rules('harga', 'Harga', 'required', ['required' => 'Harga Wajib diisi!']);
		$this->form_validation->set_rules('stok', 'Stok', 'required', ['required' => 'Stok Wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$data['barang'] = $this->Model_barang->tampil_data()->result();
			$data['title'] = 'Data Barang';
			$this->load->view('admin/data_barang', $data);
		} else {
			$nama_brg 	= $this->input->post('nama_brg');
			$keterangan = $this->input->post('keterangan');
			$kategori 	= $this->input->post('kategori');
			$harga 		= $this->input->post('harga');
			$stok 		= $this->input->post('stok');
			$gambar 	= $_FILES['gambar']['name'];

			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']     = '2048';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "gambar gagal di upload silahkan coba lagi.";
			} else {
				$gambar = $this->upload->data('file_name');
			}


			$data = [
				'nama_brg' 		=> $nama_brg,
				'keterangan' 	=> $keterangan,
				'kategori' 		=> $kategori,
				'harga' 		=> $harga,
				'stok' 			=> $stok,
				'gambar'		=> $gambar
			];

			$this->Model_barang->tambah_barang($data, 'tb_barang');
			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
			redirect('admin/data_barang');
		}
	}
}
