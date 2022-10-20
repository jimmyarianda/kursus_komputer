<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Guru</a></li>
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
                <div class="card-header">Tambah Data Guru &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#d_guru">
                        <i class="fas fa-plus"></i>Tambah Data
                    </button>
                </div>
                <!-- load modal tambah data guru -->
                <?php $this->load->view('dashboard/guru_form') ?>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tguru" class="table table-bordered table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>id</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nope</th>
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
                            function editConfirm(id, gru_nama, gru_alamat, gru_nope) {
                                $("#isiKontenEditGuru").html(inputFormEditGuru(gru_nama, gru_alamat, gru_nope));
                                $("#idGuru").val(id);

                                $('#editModalGuru').modal();
                            }
                            //View Modal edit
                            function inputFormEditGuru(gru_nama, gru_alamat, gru_nope) {
                                var html = `<input type="hidden" id="idGuru" name="hidden_id_guru">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="gru_nama" class="form-control" placeholder="Inputkan Nama" value="${gru_nama}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="gru_alamat" class="form-control" placeholder="Inputkan Alamat" value="${gru_alamat}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor HP</label>
                                                <input type="number" name="gru_nope" class="form-control" placeholder="Inputkan Nomor" value="${gru_nope}" required>
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