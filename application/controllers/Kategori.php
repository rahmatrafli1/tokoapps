<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function elektronik()
	{
		$data['elektronik'] = $this->Model_kategori->data_elektronik()->result();
		$data['title'] = 'Kategori Elektronik';
		$this->load->view('elektonik', $data);
	}

	public function pakaian_pria()
	{
		$data['pakaian_pria'] = $this->Model_kategori->data_pakaian_pria()->result();
		$data['title'] = 'Kategori Pakaian Pria';
		$this->load->view('pakaian_pria', $data);
	}

	public function pakaian_wanita()
	{
		$data['pakaian_wanita'] = $this->Model_kategori->data_pakaian_wanita()->result();
		$data['title'] = 'Kategori Pakaian Wanita';
		$this->load->view('pakaian_wanita', $data);
	}

	public function pakaian_anak()
	{
		$data['pakaian_anak'] = $this->Model_kategori->data_pakaian_anak()->result();
		$data['title'] = 'Kategori Pakaian Anak-anak';
		$this->load->view('pakaian_anak', $data);
	}

	public function peralatan_olahraga()
	{
		$data['peralatan_olahraga'] = $this->Model_kategori->data_peralatan_olahraga()->result();
		$data['title'] = 'Kategori Peralatan Olahraga';
		$this->load->view('peralatan_olahraga', $data);
	}
}
