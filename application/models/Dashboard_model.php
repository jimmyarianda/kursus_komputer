<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model 
{

	private static $_table = 'kursus';

	public function get_guru()
	{
		return $this->db->get('guru')->result_array();
	}

	public function get_user()
	{
		return $this->db->get('user')->result_array();
	}

	public function get_siswa()
	{
		return $this->db->get('siswa')->result_array();
	}

	// public function masuk($mas)
	// {
	// 	return $this->db->where($mas)->get(self::$_table)->result();
	// }

	// public function keluar($kel)
	// {
	// 	return $this->db->where($kel)->get(self::$_table)->result();
	// }
}	
