<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim', ['required' => 'email tidak boleh kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->proses_login();
        }
	}

	private function proses_login()
	{
		$email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $user = $this->db->get_where('auth', ['email' => $email])->row_array();
        $cekpass = $this->db->get_where('auth', array('password' => $password));


        //jika usernya terdaftar
        if ($email == $user['email']) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'id' => $user['id'],
					'email' => $user['email'],
					'picture' => $user['picture'],
				];
				$this->session->set_userdata($data);
				redirect('admin');
			} else {
				$this->session->set_flashdata('passwordsalah', true);
				redirect('auth');
			}
        } else {
            $this->session->set_flashdata('emailsalah', true);
            redirect('auth');
        }
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('picture');
        $this->session->set_flashdata('logout', true);
        redirect('Auth');
	}
}

