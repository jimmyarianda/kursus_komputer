<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kursus extends CI_Controller
{
    private static $_table = 'view_kursus';
    private static $_primaryKey = 'krs_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kursus_model');
        $this->auth->restrict();
    }

    public function index()
    {
        $data['title'] = 'Data Kursus - SIDKO';

        $data['guru'] = $this->kursus_model->get_guru();
        $data['siswa'] = $this->kursus_model->get_siswa();
        $data['content'] = 'dashboard/kursus';
        $this->load->view('dashboard/index', $data);
    }

    public function get_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables_ssp');

            $columns = array(
                array('db' => 'krs_id', 'dt' => 'krs_id'),
                array('db' => 'id_guru', 'dt' => 'id_guru'),
                array('db' => 'gru_nama', 'dt' => 'gru_nama'),
                array('db' => 'id_siswa', 'dt' => 'id_siswa'),
                array('db' => 'swa_nama', 'dt' => 'swa_nama'),
                array('db' => 'krs_tgl_masuk', 'dt' => 'krs_tgl_masuk'),
                array('db' => 'krs_tgl_selesai', 'dt' => 'krs_tgl_selesai'),
                array(
                    'db' => 'krs_id',
                    'dt' => 'action',
                    'formatter' => function ($id, $row) {
                        $id_guru = $row[1];
                        $gru_nama = $row[2];
                        $id_siswa = $row[3];
                        $swa_nama = $row[4];
                        $krs_tgl_masuk = $row[5];
                        $krs_tgl_selesai = $row[6];
                        return '<a onclick="editConfirm(' . $id . ', ' . $id_guru . ', ' . "'" . $gru_nama . "'" . ', ' . $id_siswa . ', ' . "'" . $swa_nama . "'" . ', ' . "'" . $krs_tgl_masuk . "'" . ', ' . "'" . $krs_tgl_selesai . "'" . ')" href="javascript:void(0);" class="btn btn-success btn-sm mb-1"><i class="fas fa-edit"></i></a>
                                <a onclick="deleteConfirm(' . "'" . site_url('kursus/delete/' . $id) . "'" . ')" href="#!" class="btn btn-danger btn-sm mb-1"><i class="fas fa-trash"></i></a>';
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

            // $data['guru'] = $this->kursus_model->get_guru();
            // $data['siswa'] = $this->kursus_model->get_siswa();

            $gru_nama = $this->input->post('gru_nama', TRUE);
            $swa_nama = $this->input->post('swa_nama', TRUE);
            $krs_tgl_masuk = $this->input->post('krs_tgl_masuk', TRUE);
            $krs_tgl_selesai = $this->input->post('krs_tgl_selesai', TRUE);

            $data = [
                'id_guru' => $gru_nama,
                'id_siswa' => $swa_nama,
                'krs_tgl_masuk' => $krs_tgl_masuk,
                'krs_tgl_selesai' => $krs_tgl_selesai,
            ];


            $this->kursus_model->insert($data);
            $this->session->set_flashdata('success', 'Kursus berhasil ditambahkan.');
            redirect('kursus');
        } else {
            redirect('kursus');
        }
    }

    public function edit()
    {
        $id_kursus = $this->input->post('hidden_id_kursus', TRUE);
        $id_guru = $this->input->post('hidden_id_guru', TRUE);
        $id_siswa = $this->input->post('hidden_id_kursus', TRUE);

        if (isset($_POST['simpan'])) {
            $data = [
                'id_guru' => $id_guru,
                'id_siswa' => $id_siswa,
                'krs_tgl_masuk' => $this->input->post('krs_tgl_masuk', TRUE),
                'krs_tgl_selesai' => $this->input->post('krs_tgl_selesai', TRUE)
            ];

            $this->kursus_model->update($data, $id_kursus);
            $this->session->set_flashdata('success', 'Kursus berhasil diperbarui.');
            redirect('kursus');
        } else {
            redirect('kursus');
        }
    }

    public function delete($id = NULL)
    {
        $this->kursus_model->delete($id);
        $this->session->set_flashdata('success', 'Kursus berhasil dihapus.');
        redirect('kursus');
    }
}
