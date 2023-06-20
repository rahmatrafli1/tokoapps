<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username anda Wajib diisi!']);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]', ['required' => 'Password anda Wajib diisi!', 'min_length' => 'Password anda terlalu pendek!']);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Login";
            $this->load->view('login', $data);
        } else {
            $auth = $this->Model_auth->cek_login();

            if ($auth == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf, username atau password anda salah! silahkan coba lagi!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/Dashboard_Admin');
                        break;
                    case 2:
                        redirect('/');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil keluar akun</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('auth/login');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', ['required' => 'Nama anda Wajib diisi!']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username anda Wajib diisi!']);
        $this->form_validation->set_rules('password1', 'Password1', 'required|min_length[5]|matches[password2]', ['required' => 'Password anda Wajib diisi!', 'min_length' => 'Password anda terlalu pendek!', 'matches' => 'Password anda tidak cocok!']);
        $this->form_validation->set_rules('password2', 'Password2', 'required|min_length[5]', ['required' => 'Konfirmasi Password anda Wajib diisi!', 'min_length' => 'Konfirmasi Password anda terlalu pendek!']);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Register";
            $this->load->view('register', $data);
        } else {
            $data = [
                'id' => '',
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password1'),
                'gambar' => 'undraw_profile.svg',
                'role_id' => 2
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Akun anda berhasil terdaftar. Silahkan masuk akun anda.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }
}
