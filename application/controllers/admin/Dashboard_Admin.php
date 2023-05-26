<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Admin extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard Admin';
		$this->load->view('admin/dashboard', $data);
	}
}
