<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
        $this->auth->restrict();
        $this->auth->not_admin();
	}

	public function index()
	{
		// Total Guru
        $data['guru'] = count($this->dashboard_model->get_guru());

        // Barang Masuk
        $data['siswa'] = count($this->dashboard_model->get_siswa());

        // Data User
        $data['user'] = count($this->dashboard_model->get_user());

		$data['title'] = 'Dashboard - Kursus';
        $data['content'] = 'dashboard/home';
        $this->load->view('dashboard/index', $data);
	}
}