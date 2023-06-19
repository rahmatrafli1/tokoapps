<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role_id') != 1) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Selain admin, dilarang masuk. Anda harus masuk terlebih dahulu sebagai admin!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard Admin';
		$this->load->view('admin/dashboard', $data);
	}
}
