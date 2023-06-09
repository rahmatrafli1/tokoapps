<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Barang extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required', ['required' => 'Nama Barang Wajib diisi!']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', ['required' => 'Keterangan Wajib diisi!']);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required', ['required' => 'Kategori Wajib diisi!']);
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric', ['required' => 'Harga Wajib diisi!', 'numeric' => 'Harga Wajib diisi angka!']);
		$this->form_validation->set_rules('stok', 'Stok', 'required', ['required' => 'Stok Wajib diisi!']);
		$this->form_validation->set_rules('gambar', '', 'callback_file_check');

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
			$config['max_size']     = 2048;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo $this->upload->display_errors();
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
			$this->session->set_flashdata('success', 'ditambah!');
			redirect('admin/data_barang');
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required', ['required' => 'Nama Barang Wajib diisi!']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required', ['required' => 'Keterangan Wajib diisi!']);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required', ['required' => 'Kategori Wajib diisi!']);
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric', ['required' => 'Harga Wajib diisi!', 'numeric' => 'Harga Wajib diisi angka!']);
		$this->form_validation->set_rules('stok', 'Stok', 'required', ['required' => 'Stok Wajib diisi!']);
		$this->form_validation->set_rules('gambar', '', 'callback_photo_check');

		if ($this->form_validation->run() == FALSE) {
			$where = ['id_brg' => $id];
			$data['barang'] = $this->Model_barang->edit_barang($where, 'tb_barang')->result();

			$data['title'] = 'Edit Barang';
			$this->load->view('admin/edit_barang', $data);
		} else {
			$id_brg		= $this->input->post('id_brg');
			$nama_brg 	= $this->input->post('nama_brg');
			$keterangan = $this->input->post('keterangan');
			$kategori 	= $this->input->post('kategori');
			$harga 		= $this->input->post('harga');
			$stok 		= $this->input->post('stok');
			$gambar 	= $_FILES['gambar']['name'];

			if ($gambar == null) {
				$cek_foto = $this->db->get_where('tb_barang', ['id_brg' => $id_brg])->row();
				$gambar = $cek_foto->gambar;
			} else if ($gambar != null) {
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['max_size']     = 2048;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo $this->upload->display_errors();
				} else {
					$cek_foto = $this->db->get_where('tb_barang', ['id_brg' => $id_brg])->row();
					if ($cek_foto->gambar) {
						unlink('uploads/' . $cek_foto->gambar);
					}
					$gambar = $this->upload->data('file_name');
				}
			}

			$data = [
				'nama_brg' 		=> $nama_brg,
				'keterangan' 	=> $keterangan,
				'kategori'		=> $kategori,
				'harga'			=> $harga,
				'stok'			=> $stok,
				'gambar'		=> $gambar
			];

			$where = ['id_brg' => $id_brg];

			$this->Model_barang->update_data($where, $data, 'tb_barang');
			$this->session->set_flashdata('success', 'diubah!');
			redirect('admin/data_barang');
		}
	}

	public function hapus($id)
	{
		$cek_foto = $this->db->get_where('tb_barang', ['id_brg' => $id])->row();
		if ($cek_foto->gambar) {
			unlink('uploads/' . $cek_foto->gambar);
		}
		$where = ['id_brg' => $id];
		$this->Model_barang->hapus_data($where, 'tb_barang');
		$this->session->set_flashdata('success', 'dihapus!');
		redirect('admin/data_barang');
	}

	public function detail($id)
	{
		$detail = $this->Model_barang->get_detail($id);
		$data['title'] = 'Detail Data Barang';
		$data['detail'] = $detail;
		$this->load->view('admin/detail_barang', $data);
	}

	public function file_check()
	{
		$allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/jpg', 'image/png');

		$mime = get_mime_by_extension($_FILES['gambar']['name']);
		if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != null) {
			if (!in_array($mime, $allowed_mime_type_arr)) {
				$this->form_validation->set_message('file_check', 'File ini hanya berformat gif/jpg/jpeg/png!');
				return false;
			} else {
				return true;
			}
		} else {
			$this->form_validation->set_message('file_check', 'Gambar ini harus diisi!');
			return false;
		}
	}

	public function photo_check()
	{
		$allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/jpg', 'image/png');

		$mime = get_mime_by_extension($_FILES['gambar']['name']);
		if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != null) {
			if (!in_array($mime, $allowed_mime_type_arr)) {
				$this->form_validation->set_message('photo_check', 'Gambar ini hanya berformat gif/jpg/jpeg/png!');
				return false;
			} else {
				return true;
			}
		}
	}
}
