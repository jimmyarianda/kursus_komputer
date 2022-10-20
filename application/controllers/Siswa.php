<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    private static $_table = 'siswa';
    private static $_primaryKey = 'swa_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
        $this->auth->restrict();
    }

    public function index()
    {
        $data['title'] = 'Data Siswa - SIDKO';

        $data['content'] = 'dashboard/siswa';
        $this->load->view('dashboard/index', $data);
    }

    public function get_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables_ssp');

            $columns = array(
                array('db' => 'swa_id', 'dt' => 'swa_id'),
                array('db' => 'swa_nama', 'dt' => 'swa_nama'),
                array('db' => 'swa_jekel', 'dt' => 'swa_jekel'),
                array('db' => 'swa_alamat', 'dt' => 'swa_alamat'),
                array('db' => 'swa_umur', 'dt' => 'swa_umur'),
                array('db' => 'swa_nope', 'dt' => 'swa_nope'),
                array(
                    'db' => 'swa_id',
                    'dt' => 'action',
                    'formatter' => function ($id, $row) {
                        $swa_nama = $row[1];
                        $swa_jekel = $row[2];
                        $swa_alamat = $row[3];
                        $swa_umur = $row[4];
                        $swa_nope = $row[5];
                        return '<a onclick="editConfirm('. $id . ', ' . "'" . $swa_nama . "'" . ', ' . "'" . $swa_jekel . "'" . ', ' . "'" . $swa_alamat . "'" . ', ' . "'" . $swa_umur . "'" . ', ' . "'" . $swa_nope . "'" . ')" href="javascript:void(0);" class="btn btn-success btn-sm mb-1"><i class="fas fa-edit"></i></a>
                                <a onclick="deleteConfirm(' . "'" . site_url('siswa/delete/' . $id) . "'" . ')" href="#!" class="btn btn-danger btn-sm mb-1"><i class="fas fa-trash"></i></a>';
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

            $swa_nama = $this->input->post('swa_nama', TRUE);
            $swa_jekel = $this->input->post('swa_jekel', TRUE);
            $swa_alamat = $this->input->post('swa_alamat', TRUE);
            $swa_umur = $this->input->post('swa_umur', TRUE);
            $swa_nope = $this->input->post('swa_nope', TRUE);
            
            $data = [
                'swa_nama' => $swa_nama,
                'swa_jekel' => $swa_jekel,
                'swa_alamat' => $swa_alamat,
                'swa_umur' => $swa_umur,
                'swa_nope' => $swa_nope,
            ];
            

            $this->siswa_model->insert($data);
            $this->session->set_flashdata('success', 'Siswa berhasil ditambahkan.');
            redirect('siswa');
        } else {
            $data['title'] = 'Tambah Siswa - SIDKO';
            $data['form_title'] = 'Tambah Siswa';
            $data['content'] = 'dashboard/siswa_form';
            $this->load->view('dashboard/index', $data);
        }
    }

    public function edit()
    {
        $id_siswa = $this->input->post('hidden_id_siswa', TRUE);

        if (isset($_POST['simpan'])) {
            $data = [
                'swa_nama' => $this->input->post('swa_nama', TRUE),
                'swa_jekel' => $this->input->post('swa_jekel', TRUE),
                'swa_alamat' => $this->input->post('swa_alamat', TRUE),
                'swa_umur' => $this->input->post('swa_umur', TRUE),
                'swa_nope' => $this->input->post('swa_nope', TRUE)
            ];

            $this->siswa_model->update($data, $id_siswa);
            $this->session->set_flashdata('success', 'Siswa berhasil diperbarui.');
            redirect('siswa');
        } else {
            redirect('siswa');
        }
    }

    public function delete($id = NULL)
    {
        $this->siswa_model->delete($id);
        $this->session->set_flashdata('success', 'Siswa berhasil dihapus.');
        redirect('siswa');
    }
}
