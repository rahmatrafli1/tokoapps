<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{
	public function data_elektronik()
	{
		return $this->db->get_where('tb_barang', ['kategori' => 'Elektronik']);
	}

	public function data_pakaian_pria()
	{
		return $this->db->get_where('tb_barang', ['kategori' => 'Pakaian Pria']);
	}

	public function data_pakaian_wanita()
	{
		return $this->db->get_where('tb_barang', ['kategori' => 'Pakaian Wanita']);
	}

	public function data_pakaian_anak()
	{
		return $this->db->get_where('tb_barang', ['kategori' => 'Pakaian Anak-anak']);
	}

	public function data_peralatan_olahraga()
	{
		return $this->db->get_where('tb_barang', ['kategori' => 'Peralatan Olahraga']);
	}
}
