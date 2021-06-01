<?php

class DataHandle extends CI_Model
{

	function getAll($tabel)
	{
		return $this->db->get($tabel);
	}
	function getAllOrder($field, $tabel, $format)
	{
		$this->db->order_by($field, $format);
		return $this->db->get($tabel);
	}

	function getAllWhere($tabel, $field, $where)
	{
		$this->db->select($field);
		$this->db->from($tabel);
		$this->db->where($where);
		return $this->db->get();
	}

	function get_like($tabel1, $field, $field2, $value, $where, $order)
	{
		$this->db->select($field);
		$this->db->from($tabel1);
		$this->db->where($where);
		$this->db->like($field2, $value, 'after');
		$this->db->order_by($order);
		return $this->db->get();
	}

	function get($tabel, $where = [])
	{
		return $this->db->get_where($tabel, $where);
	}

	function getOrderWhere($tabel, $where = [], $order, $format)
	{
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->where($where);
		$this->db->order_by($order, $format);
		return $this->db->get();
	}

	function sum($tabel, $field)
	{
		$this->db->select_sum($field);
		return $this->db->get($tabel)->result();
	}

	function insert($tabel, $insert)
	{
		$this->db->insert($tabel, $insert);
		return $this->db->affected_rows();
	}

	function count($tabel, $field, $value)
	{
		$this->db->like($field, $value, 'after');
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}

	function edit($tabel, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($tabel, $data);
		return $this->db->affected_rows();
	}

	function delete($tabel, $where)
	{
		$this->db->delete($tabel, $where);
		return $this->db->affected_rows();
	}

	function get_last_id($field, $tabel)
	{
		$this->db->select_max($field);
		return $this->db->get($tabel)->row_array();
	}

	function other_query($query)
	{
		return $this->db->query($query);
	}
	function insert_batch($tabel, $data)
	{
		$this->db->insert_batch($tabel, $data);
		return $this->db->affected_rows();
	}
	public function where_in($table, $arr_condition, $field, $where_in)
	{
		if (!is_null($arr_condition)) {
			$this->db->where($arr_condition);
		}
		$this->db->where_in($field, $where_in);
		return $this->db->get($table);
	}
}
