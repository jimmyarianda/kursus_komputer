<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
	
	private static $_table = 'pembayaran';
    private static $_pk = 'pby_id';
    
    // public function is_exist($where)
	// {
	// 	return $this->db->where($where)->get(self::$_table)->row_array();
	// }

	public function get_pembayaran($where)
	{
		$query = $this->db
			->select('siswa.swa_nama, pembayaran.pby_spp, pembayaran.pby_tgl')
			->from(self::$_table)
			->join('siswa', 'siswa.swa_id = pembayaran.id_siswa', 'inner')
			->where($where)
			->get();

		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return NULL;
		}
	}

	// public function get_data_pembayaran($where)
	// {
	// 	$query = $this->db
	// 		->select('siswa.swa_nama, pembayaran.pby_spp, pembayaran.pby_tgl')
	// 		->from(self::$_table)
	// 		->join('siswa', 'siswa.swa_id = pembayaran.id_siswa', 'inner')
	// 		->where($where)
	// 		->get();

	// 	if ($query->num_rows() > 0) {
	// 		return $query->row_array();
	// 	} else {
	// 		return NULL;
	// 	}
	// }

	public function get_data_pembayaran()
	{
		return $this->db->get('view_pembayaran')->result_array();
	}

	public function get_siswa()
	{
		return $this->db->get('siswa')->result_array();
	}

	public function insert($data)
	{
		return $this->db->insert(self::$_table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->set($data)->where(self::$_pk, $id)->update(self::$_table);
	}

	public function delete($id)
	{
		return $this->db->delete(self::$_table, array('pby_id' => $id));
	}
}