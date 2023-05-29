<?php 
class Pendaftaran_model extends CI_Model
{
	public function jenistransaksi()
	{
		return $this->db->get('t_jenis_pendaftaran')->result_array();
	}

	public function data_jenjang($id)
	{
		return $this->db->get_where('t_jenis_pendaftaran', ['kd_jenis_pendaftaran' => $id])->row_array();
	}


} 