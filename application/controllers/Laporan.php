<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    // private static $_table = 'view_barang';
    // private static $_primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaran_model');
        $this->auth->restrict();
    }

    public function index()
    {
        $data['title'] = 'Pembayaran - SIDKO';

        $data['content'] = 'dashboard/laporan_form';
        $this->load->view('dashboard/index', $data);
    }

    // public function print_data()
    // {
    //     // $id = $this->uri->segment(3);
    //     // $where = "barang.id = $id";
    //     $tgl = $this->input->post('tgl', TRUE);
    //     $tgl2 = $this->input->post('tgl2', TRUE);
    //     $data['pembayaran'] = $this->pembayaran_model->get_pembayaran($tgl, $tgl2);

    //     // $data['title'] = 'LAPORAN BARANG DESA RIAK SIABUN';
    //     $this->load->view('dashboard/laporan', $data);
    // }
}
