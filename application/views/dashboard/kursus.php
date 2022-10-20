<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Kursus</a></li>
</ol>

<?php if ($this->session->flashdata('success')) : ?>
    <div id="successMessage" class="alert alert-success" role="alert">
        <i class="fas fa-check"></i>&nbsp;<?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- DataTables -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Tambah Data Kursus &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#d_kursus">
                        <i class="fas fa-plus"></i>Tambah Data
                    </button>
                </div>
                <!-- load modal tambah data siswa -->
                <?php $this->load->view('dashboard/kursus_form') ?>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tkursus" class="table table-bordered table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>id</th>
                                    <th>Nama Guru</th>
                                    <th>Nama Siswa</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <script>
                            function deleteConfirm(url) {
                                $('#btn-delete').attr('href', url);
                                $('#deleteModal').modal();
                            }
                            //Penampung edit dari controller
                            function editConfirm(id, id_guru, gru_nama, id_siswa, swa_nama, krs_tgl_masuk, krs_tgl_selesai) {
                                $("#isiKontenEditKursus").html(inputFormEditKursus(gru_nama, swa_nama, krs_tgl_masuk, krs_tgl_selesai));
                                $("#idKursus").val(id);
                                $("#idGuru").val(id_guru);
                                $("#idSiswa").val(id_siswa);

                                $('#editModalKursus').modal();
                            }
                            //View Modal edit
                            function inputFormEditKursus(gru_nama, swa_nama, krs_tgl_masuk, krs_tgl_selesai) {
                                var html = `<input type="hidden" id="idKursus" name="hidden_id_kursus">
                                            <input type="hidden" id="idGuru" name="hidden_id_guru">
                                            <input type="hidden" id="idSiswa" name="hidden_id_siswa">
                                            <div class="form-group">
                                                <label>Nama Guru</label>
                                                <input type="text" name="gru_nama" class="form-control" placeholder="Inputkan Nama" value="${gru_nama}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" name="swa_nama" class="form-control" placeholder="Inputkan Nama" value="${swa_nama}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Masuk</label>
                                                <input type="date" name="krs_tgl_masuk" class="form-control" value="${krs_tgl_masuk}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Selesai</label>
                                                <input type="date" name="krs_tgl_selesai" class="form-control" value="${krs_tgl_selesai}" required>
                                            </div>`;
                                return html;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>