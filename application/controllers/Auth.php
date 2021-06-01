<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataHandle', 'dataHandle');
	}
	public function index()
	{
		if ($this->session->username) {
			redirect(base_url() . 'admin/dashboard');
		}

		$data['judul'] = 'BPNT Kedungwaringin';
		$this->load->view('login/login', $data);
	}

	function cek_login()
	{
		$username   = $this->input->post('nama_pengguna', TRUE);
		$password   = $this->input->post('katasandi', TRUE);
		$tabel      = "tb_user";
		$user       = $this->dataHandle->get($tabel, ['username' => $username]);
		$res = [];
		// cek user
		if ($user->num_rows() > 0) {
			$data = $user->row_array();
			// cek password
			if (password_verify($password, $data['password'])) {
				// cek role
				if ($data['role_id'] == 1) {
					$this->session->set_userdata(['username' => $data['username']]);
					$this->session->set_userdata(['nama' => $data['nama_lengkap']]);
					$this->session->set_userdata(['foto' => $data['foto']]);
					$this->session->set_userdata(['role' => $data['role_id']]);
					$res['status'] = 1;
					$res['url'] = 'admin/Dashboard';
					$res['msg'] = 'Data ditemukan : ' . $data['nama_lengkap'];
				} else {
					$res['status'] = 0;
					$res['msg'] = 'Harap cek kembali username dan password';
				}
			} else {
				$res['status'] = 0;
				$res['msg'] = 'Harap cek kembali username dan password';
			}
		} else {
			$res['status'] = 0;
			$res['msg'] = 'Harap cek kembali username dan password';
		}

		echo json_encode($res);
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('role');
		redirect('Auth');
	}
}
