<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
	public function index()
	{
		$data['invoice'] = $this->Model_invoice->tampil_data();
		$data['title'] = "Invoice";
		$this->load->view('admin/invoice', $data);
	}
}
