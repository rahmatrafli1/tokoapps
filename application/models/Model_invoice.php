<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_invoice extends CI_Model
{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');

		$invoice = [
			'nama' => $nama,
			'alamat' => $alamat,
			'tgl_pesan' => date('Y-m-d H:i:s'),
			'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y')))
		];

		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();

		$keranjang = $this->cart->contents();

		foreach ($keranjang as $ker) {
			$data = [
				'id_invoice' => $id_invoice,
				'id_brg' => $ker['id'],
				'nama_brg' => $ker['name'],
				'jumlah' => $ker['qty'],
				'harga' => $ker['price'],
				'jasa' => $this->input->post('jasa'),
				'pembayaran' => $this->input->post('pembayaran')
			];
			$this->db->insert('tb_pesanan', $data);
		}

		return true;
	}

	public function tampil_data()
	{
		$result = $this->db->get('tb_invoice');

		if ($result->num_rows >= 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function ambil_id_invoice($id_invoice)
	{
		$result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');

		if ($result->num_rows >= 0) {
			return $result->row();
		} else {
			return false;
		}
	}

	public function ambil_id_pesanan($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');

		if ($result->num_rows >= 0) {
			return $result->result();
		} else {
			return false;
		}
	}
}
