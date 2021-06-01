<?php

class Data_alternatif extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = "Kelola Alternatif";
        $data['alternatif'] = $this->model_alternatif->tampil_data('tb_alternatif')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/data_alternatif', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {

        $kode  = $this->model_alternatif->get_last_id('kode', 'tb_alternatif');
        /* var_dump($kode); 
        die; */
        if ($kode) {
            $nilai_kode = substr($kode['kode'], 1);
            $kode = (int) $nilai_kode;
            $kode = $kode + 1;
            $kode_otomatis = "A" . str_pad($kode, 0, "0", STR_PAD_LEFT);
        } else {
            $kode_otomatis = "A1";
        }
        $nik        = $this->input->post('nik');
        $nama       = $this->input->post('nama');
        $jk         = $this->input->post('jk');
        $alamat     = $this->input->post('alamat');

        $foto      = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Foto Gagal di Upload!";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'kode'      => $kode_otomatis,
            'nik'       => $nik,
            'nama'      => $nama,
            'jk'        => $jk,
            'alamat'    => $alamat,
            'foto'      => $foto
        );

        $this->model_alternatif->tambah_alternatif($data, 'tb_alternatif');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Alternatif <strong> berhasil </strong> ditambahkan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>');
        redirect('admin/data_alternatif/index');
    }

    public function edit($kode)
    {
        $where = array('kode' => $kode);
        $data['alternatif'] = $this->model_alternatif->edit_alternatif($where, 'tb_alternatif')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/edit_alternatif', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $kode       = $this->input->post('kode');
        $nik        = $this->input->post('nik');
        $nama       = $this->input->post('nama');
        $jk         = $this->input->post('jk');
        $alamat     = $this->input->post('alamat');

        $data = array(
            'kode'      => $kode,
            'nik'       => $nik,
            'nama'      => $nama,
            'jk'        => $jk,
            'alamat'    => $alamat,
        );

        $where = array(
            'kode' => $kode
        );

        $this->model_alternatif->update_data($where, $data, 'tb_alternatif');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Alternatif <strong> berhasil </strong> diubah.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>');
        redirect('admin/data_alternatif/index');
    }

    public function hapus($kode)
    {
        $where = array('kode' => $kode);
        $this->model_alternatif->hapus_data($where, 'tb_alternatif');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Data Alternatif <strong> berhasil </strong> dihapus.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>');
        redirect('admin/data_alternatif/index');
    }

    public function detail($kode)
    {
        $data['alternatif'] = $this->model_alternatif->detail_alternatif($kode);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/detail_alternatif', $data);
        $this->load->view('templates/footer');
    }
}
