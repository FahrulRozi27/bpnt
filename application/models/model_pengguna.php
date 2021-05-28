<?php

    class model_pengguna extends CI_Model
    {
        public function tampil_data()
        {
            return $this->db->get('tb_user');
        }

        public function tambah_pengguna($data,$table)
        {
            $this->db->insert($table,$data);
        }
    }