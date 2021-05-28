<?php

class Model_alternatif extends CI_Model
{

    // Menampilkan data
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    // Tambah data
    public function tambah_alternatif($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // edit data
    public function edit_alternatif($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // Update data
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // hapus data
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function get_last_id($field, $tabel)
	{
		$this->db->select_max($field);
		return $this->db->get($tabel)->row_array();
	}

    public function find($field, $kode, $table)
    {
        $result = $this->db->where($field, $kode)
            ->limit(1)
            ->get($table);

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_alternatif($kode)
    {
        $result = $this->db->where('kode', $kode)->get('tb_alternatif');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_alternatif');
        $this->db->like('nama', $keyword);
        return $this->db->get()->result();
    }

}
