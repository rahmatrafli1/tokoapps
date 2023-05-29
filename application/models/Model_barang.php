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

	public function edit_barang($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
