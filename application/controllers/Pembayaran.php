<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    private static $_table = 'view_pembayaran';
    private static $_primaryKey = 'pby_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembayaran_model');
        $this->auth->restrict();
    }

    public function index()
    {
        $data['title'] = 'Data Pembayaran - SIDKO';

        $data['siswa'] = $this->pembayaran_model->get_siswa();
        $data['content'] = 'dashboard/pembayaran';
        $this->load->view('dashboard/index', $data);
    }

    public function get_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables_ssp');

            $columns = array(
                array('db' => 'pby_id', 'dt' => 'pby_id'),
                array('db' => 'id_siswa', 'dt' => 'id_siswa'),
                array('db' => 'swa_nama', 'dt' => 'swa_nama'),
                array('db' => 'pby_spp', 'dt' => 'pby_spp'),
                array('db' => 'pby_tgl', 'dt' => 'pby_tgl'),
                array(
                    'db' => 'pby_id',
                    'dt' => 'action',
                    'formatter' => function ($id, $row) {
                        $id_siswa = $row[1];
                        $swa_nama = $row[2];
                        $pby_spp = $row[3];
                        $pby_tgl = $row[4];
                        return '<a onclick="editConfirm(' . $id . ', ' . $id_siswa . ', ' . "'" . $swa_nama . "'" . ', ' . "'" . $pby_spp . "'" . ', ' . "'" . $pby_tgl . "'" . ')" href="javascript:void(0);" class="btn btn-success btn-sm mb-1"><i class="fas fa-edit"></i></a>
                                <a onclick="deleteConfirm(' . "'" . site_url('pembayaran/delete/' . $id) . "'" . ')" href="#!" class="btn btn-danger btn-sm mb-1"><i class="fas fa-trash"></i></a>';
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
            $pby_spp = $this->input->post('pby_spp', TRUE);
            $pby_tgl = $this->input->post('pby_tgl', TRUE);

            $data = [
                'id_siswa' => $swa_nama,
                'pby_spp' => $pby_spp,
                'pby_tgl' => $pby_tgl,
            ];


            $this->pembayaran_model->insert($data);
            $this->session->set_flashdata('success', 'Pembayaran berhasil ditambahkan.');
            redirect('pembayaran');
        } else {
            redirect('pembayaran');
        }
    }

    public function edit()
    {
        $id_pembayaran = $this->input->post('hidden_id_pembayaran', TRUE);
        $id_siswa = $this->input->post('hidden_id_siswa', TRUE);

        if (isset($_POST['simpan'])) {
            $data = [
                'id_siswa' => $id_siswa,
                'pby_spp' => $this->input->post('pby_spp', TRUE),
                'pby_tgl' => $this->input->post('pby_tgl', TRUE)
            ];

            $this->pembayaran_model->update($data, $id_pembayaran);
            $this->session->set_flashdata('success', 'Pembayaran berhasil diperbarui.');
            redirect('pembayaran');
        } else {
            redirect('pembayaran');
        }
    }

    public function delete($id = NULL)
    {
        $this->pembayaran_model->delete($id);
        $this->session->set_flashdata('success', 'Pembayaran berhasil dihapus.');
        redirect('pembayaran');
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $id = $this->uri->segment(3);
        $where = "pby_id = $id";
        $data['pembayaran'] = $this->pembayaran_model->get_data_pembayaran($where);
        // var_dump($data['surat']);
        // die();
        $this->load->view('dashboard/laporan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('laporan_pembayaran.pdf', array('Attachment' => 0));
    }
}
