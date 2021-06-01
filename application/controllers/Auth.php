<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		echo password_hash('1', PASSWORD_DEFAULT);
		die;
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
			if ($data['status'] == 1) {
				if (password_verify($password, $data['password'])) {
					if ($data['role'] == 4) {
						$this->session->set_userdata(['id' => $data['id']]);
						$this->session->set_userdata(['username' => $data['username']]);
						$this->session->set_userdata(['nama' => $data['nama']]);
						$this->session->set_userdata(['role' => $data['role']]);
						$res['status'] = 1;
						$res['url'] = 'dashboard';
						$res['msg'] = 'Data ditemukan : ' . $data['nama'];
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
				$res['msg'] = 'Akun dinonaktifkan. Silahkan hubungi admin DINSOS';
			}
		} else {
			$res['status'] = 0;
			$res['msg'] = 'Harap cek kembali username dan password';
		}

		echo json_encode($res);
	}
}
