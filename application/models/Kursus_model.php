<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kursus_model extends CI_Model
{
	
	private static $_table = 'kursus';
    private static $_pk = 'krs_id';
    
    // public function is_exist($where)
	// {
	// 	return $this->db->where($where)->get(self::$_table)->row_array();
	// }

	public function get_kursus($where)
	{
		$query = $this->db
			->select('guru.gru_nama, siswa.swa_nama, kursus.krs_tgl_masuk, kursus.krs_tgl_selesai')
			->from(self::$_table)
			->join('guru', 'guru.gru_id = kursus.id_guru', 'inner')
			->join('siswa', 'siswa.swa_id = kursus.id_siswa', 'inner')
			->where($where)
			->get();

		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return NULL;
		}
	}

	public function get_guru()
	{
		return $this->db->get('guru')->result_array();
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
		return $this->db->delete(self::$_table, array('krs_id' => $id));
	}
}