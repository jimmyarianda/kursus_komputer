<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Pembayaran</a></li>
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
                <div class="card-header">Tambah Data Pembayaran &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#d_pembayaran">
                        <i class="fas fa-plus"></i>Tambah Data
                    </button>
                    &nbsp;&nbsp;&nbsp;<a class="btn btn-warning btn-sm" href="<?= site_url('pembayaran/pdf'); ?>"><i class="fas fa-print"></i>Eksport PDF</a>
                </div>
                <!-- load modal tambah data siswa -->
                <?php $this->load->view('dashboard/pembayaran_form') ?>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tpembayaran" class="table table-bordered table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>id</th>
                                    <th>Nama Siswa</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Tanggal Pembayaran</th>
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
                            function editConfirm(id, id_siswa, swa_nama, pby_spp, pby_tgl) {
                                $("#isiKontenEditPembayaran").html(inputFormEditPembayaran(swa_nama, pby_spp, pby_tgl));
                                $("#idPembayaran").val(id);
                                $("#idSiswa").val(id_siswa);

                                $('#editModalPembayaran').modal();
                            }
                            //View Modal edit
                            function inputFormEditPembayaran(swa_nama, pby_spp, pby_tgl) {
                                var html = `<input type="hidden" id="idPembayaran" name="hidden_id_pembayaran">
                                            <input type="hidden" id="idSiswa" name="hidden_id_siswa">
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" name="swa_nama" class="form-control" placeholder="Inputkan Nama" value="${swa_nama}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Pembayaran</label>
                                                <input type="number" name="pby_spp" class="form-control" value="${pby_spp}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Pembayaran</label>
                                                <input type="date" name="pby_tgl" class="form-control" value="${pby_tgl}" required>
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