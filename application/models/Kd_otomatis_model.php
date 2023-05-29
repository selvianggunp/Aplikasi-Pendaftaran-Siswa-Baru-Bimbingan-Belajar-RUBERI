<?php 
Class Kd_otomatis_model Extends CI_Model
{
	
	public function kode_otomatis_siswa($table = null, $field = null)
	{
			//kode otomatis siswa
			$this->db->select_max($field);
			return $this->db->get($table)->row_array()[$field];
	}


	public function kode_otomatis($table = null, $field = null)
	{
			//kode otomatis user
			$this->db->select_max($field);
			return $this->db->get($table)->row_array()[$field];
	}

	
	public function kode_otomatis_trd($table = null, $field = null)
	{
			//kode otomatis transaksi pendaftaran
			$this->db->select_max($field);
			return $this->db->get($table)->row_array()[$field];
	}

	public function kode_otomatis_trs($table = null, $field = null)
	{
			//kode otomatis transaksi spp
			$this->db->select_max($field);
			return $this->db->get($table)->row_array()[$field];
	}



}