<?php

    class kriteria extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
        }

        public function index()
        {
            $data['title'] = "Kelola Kriteria";
            $data['kriteria'] = $this->model_alternatif->tampil_data('tb_kriteria')->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/kriteria', $data);
            $this->load->view('templates/footer');
        }

        public function tambah_aksi()
        {
        $kode  = $this->model_alternatif->get_last_id('kode', 'tb_kriteria');
        /* var_dump($kode); 
        die; */
        if ($kode) 
        {
            $nilai_kode = substr($kode['kode'], 1);
            $kode = (int) $nilai_kode;
            $kode = $kode + 1;
            $kode_otomatis = "K" . str_pad($kode, 0, "0", STR_PAD_LEFT);
        } else {
            $kode_otomatis = "K1";
        }
        $kriteria      = $this->input->post('kriteria');
        $status        = $this->input->post('status');
        $bobot         = $this->input->post('bobot');

        $data = array(
            'kode'       => $kode_otomatis,
            'kriteria'   => $kriteria,
            'status'     => $status,
            'bobot'      => $bobot
        );

        $this->model_alternatif->tambah_alternatif($data, 'tb_kriteria');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Kriteria <strong> berhasil </strong> ditambahkan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>');
        redirect('admin/kriteria/index');
    }

    public function edit($kode)
    {
        $where = array('kode' => $kode);
        $data['kriteria'] = $this->model_alternatif->edit_alternatif($where, 'tb_kriteria')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/edit_kriteria', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $kode           = $this->input->post('kode');
        $kriteria       = $this->input->post('kriteria');
        $status         = $this->input->post('status');
        $bobot          = $this->input->post('bobot');

        $data = array(
            'kode'      => $kode,
            'kriteria'  => $kriteria,
            'status'    => $status,
            'bobot'     => $bobot
        );

        $where = array(
            'kode' => $kode
        );

        $this->model_alternatif->update_data($where, $data, 'tb_kriteria');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Kriteria <strong> berhasil </strong> diubah.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>');
        redirect('admin/kriteria/index');
    }

    public function hapus($kode)
    {
        $where = array('kode' => $kode);
        $this->model_alternatif->hapus_data($where, 'tb_kriteria');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Data Kriteria <strong> berhasil </strong> dihapus.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>');
        redirect('admin/kriteria/index');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['kriteria'] = $this->model_alternatif->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/kriteria', $data);
        $this->load->view('templates/footer');
    }
    }

?>