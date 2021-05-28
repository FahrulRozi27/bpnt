<?php

    class Data_pengguna extends CI_Controller
    {
        public function index()
        {
            $data['pengguna'] = $this->model_pengguna->tampil_data()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/data_pengguna', $data);
            $this->load->view('templates/footer');
        }

        public function tambah_aksi()
        {
            $nik            = $this->input->post('nik');
            $nama_lengkap   = $this->input->post('nama_lengkap');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $email          = $this->input->post('email');
            $no_hp          = $this->input->post('no_hp');
            $jabatan        = $this->input->post('jabatan');
            $foto           = $_FILES['foto']['name'];
            if ($foto = '') {} else
            {
                $config ['upload_path'] = './uploads';
                $config ['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('foto')) 
                {
                    echo "Foto Gagal diUpload";
                } else {
                    $foto=$this->upload->data('file_name');
                }
            }
            $password        = $this->input->post('password');
            $role_id         = $this->input->post('status');

            $data = array (
                'nik'           => $nik,
                'nama_lengkap'  => $nama_lengkap,
                'jenis_kelamin' => $jenis_kelamin,
                'email'         => $email,
                'no_hp'         => $no_hp,
                'jabatan'       => $jabatan,
                'foto'          => $foto,
                'password'      => $password,
                'role_id'       => $role_id
            );

            $this->model_pengguna->tambah_pengguna($data, 'tb_user');
            redirect('admin/data_pengguna/index');
        }
    }