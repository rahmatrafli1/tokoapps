<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_barang extends CI_Model
{
	public function tampil_data()
	{
		return $this->db->get('tb_barang');
	}

	public function tambah_barang($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function tampil_data_batas($limit, $start)
	{
		return $this->db->get('tb_barang', $limit, $start)->result();
	}

	public function countAllBarang()
	{
		return $this->db->get('tb_barang')->num_rows();
	}
}
