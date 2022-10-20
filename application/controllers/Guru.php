<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    private static $_table = 'guru';
    private static $_primaryKey = 'gru_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
        $this->auth->restrict();
    }

    public function index()
    {
        $data['title'] = 'Data Guru - SIDKO';

        $data['content'] = 'dashboard/guru';
        $this->load->view('dashboard/index', $data);
    }

    public function get_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables_ssp');

            $columns = array(
                array('db' => 'gru_id', 'dt' => 'gru_id'),
                array('db' => 'gru_nama', 'dt' => 'gru_nama'),
                array('db' => 'gru_alamat', 'dt' => 'gru_alamat'),
                array('db' => 'gru_nope', 'dt' => 'gru_nope'),
                array(
                    'db' => 'gru_id',
                    'dt' => 'action',
                    'formatter' => function ($id, $row) {
                        $gru_nama = $row[1];
                        $gru_alamat = $row[2];
                        $gru_nope = $row[3];

                        return '<a onclick="editConfirm('. $id . ', ' . "'" . $gru_nama . "'" . ', ' . "'" . $gru_alamat . "'" . ', ' . "'" . $gru_nope . "'" . ')" href="javascript:void(0);" class="btn btn-success btn-sm mb-1"><i class="fas fa-edit"></i></a>
                                <a onclick="deleteConfirm(' . "'" . site_url('guru/delete/' . $id) . "'" . ')" href="#!" class="btn btn-danger btn-sm mb-1"><i class="fas fa-trash"></i></a>';
                    }
                )
            );

            $sql_details = [
                'user' => $this->db->username,
                'pass' => $this->db->password,
                'db' => $this->db->database,
                'host' => $this->db->hostname
            ];

            echo json_encode(
                Datatables_ssp::simple($_GET, $sql_details, self::$_table, self::$_primaryKey, $columns)
            );
        }
    }

    public function add()
    {
        if (isset($_POST['simpan'])) {

            $gru_nama = $this->input->post('gru_nama', TRUE);
            $gru_alamat = $this->input->post('gru_alamat', TRUE);
            $gru_nope = $this->input->post('gru_nope', TRUE);

            $data = [
                'gru_nama' => $gru_nama,
                'gru_alamat' => $gru_alamat,
                'gru_nope' => $gru_nope,
            ];


            $this->guru_model->insert($data);
            $this->session->set_flashdata('success', 'Data Guru berhasil ditambahkan.');
            redirect('guru');
        } else {
            $data['title'] = 'Tambah Data Guru - SIDKO';
        }
    }

    public function edit()
    {
        // $id = $this->uri->segment(3);
        // $where = "gru_id = $id";
        // $data['guru'] = $this->guru_model->get_guru($where);
        $id_guru = $this->input->post('hidden_id_guru', TRUE);

        if (isset($_POST['simpan'])) {
            $data = [
                'gru_nama' => $this->input->post('gru_nama', TRUE),
                'gru_alamat' => $this->input->post('gru_alamat', TRUE),
                'gru_nope' => $this->input->post('gru_nope', TRUE),
            ];

            $this->guru_model->update($data, $id_guru);
            $this->session->set_flashdata('success', 'Data Guru berhasil diperbarui.');
            redirect('guru');
        } else {
            // $data['title'] = 'Edit Satuan Barang - SIDKO';
            // $data['form_title'] = 'Edit Satuan Barang';
            // $data['content'] = 'dashboard/satuan_edit_form';
            // $data['action'] = site_url(uri_string()); // Mengambil URL yang aktif
            // $this->load->view('dashboard/index', $data);

            redirect('guru');
        }
    }

    public function delete($id = NULL)
    {
        $this->guru_model->delete($id);
        $this->session->set_flashdata('success', 'Data Guru berhasil dihapus.');
        redirect('guru');
    }
}
