<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Barang extends CI_Controller
{
	public function index()
	{
		// pagination 
		$config['base_url'] = 'http://localhost/tokoapps/admin/data_barang/index';
		$config['total_rows'] = $this->Model_barang->countAllBarang();
		$config['per_page'] = 5;

		// styling pagination
		$config['full_tag_open'] = '<nav><ul class="pagination pagination-lg justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'Awal';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Akhir';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		// inisialisasi pagination
		$this->pagination->initialize($config);


		$data['start'] = $this->uri->segment(4);
		$data['barang'] = $this->Model_barang->tampil_data_batas($config['per_page'], $data['start']);
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
			// pagination 
			$config['base_url'] = 'http://localhost/tokoapps/admin/data_barang/index';
			$config['total_rows'] = $this->Model_barang->countAllBarang();
			$config['per_page'] = 5;

			// styling pagination
			$config['full_tag_open'] = '<nav><ul class="pagination pagination-lg justify-content-center">';
			$config['full_tag_close'] = '</ul></nav>';

			$config['first_link'] = 'Awal';
			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = 'Akhir';
			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = '&raquo;';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = '&laquo;';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';

			$config['attributes'] = array('class' => 'page-link');

			// inisialisasi pagination
			$this->pagination->initialize($config);


			$data['start'] = $this->uri->segment(4);
			$data['barang'] = $this->Model_barang->tampil_data_batas($config['per_page'], $data['start']);
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