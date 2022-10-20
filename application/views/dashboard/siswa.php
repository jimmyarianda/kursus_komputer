<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item">Siswa</a></li>
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
                <div class="card-header">Tambah Data Siswa &nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#d_siswa">
                        <i class="fas fa-plus"></i>Tambah Data
                    </button>
                </div>
                <!-- load modal tambah data siswa -->
                <?php $this->load->view('dashboard/siswa_form') ?>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tsiswa" class="table table-bordered table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>id</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Umur</th>
                                    <th>Nomor HP</th>
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
                            function editConfirm(id, swa_nama, swa_jekel, swa_alamat, swa_umur, swa_nope) {
                                $("#isiKontenEditSiswa").html(inputFormEditSiswa(swa_nama, swa_jekel, swa_alamat, swa_umur, swa_nope));
                                $("#idSiswa").val(id);

                                $('#editModalSiswa').modal();
                            }
                            //View Modal edit
                            function inputFormEditSiswa(swa_nama, swa_jekel, swa_alamat, swa_umur, swa_nope) {
                                var html = `<input type="hidden" id="idSiswa" name="hidden_id_siswa">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="swa_nama" class="form-control" placeholder="Inputkan Nama" value="${swa_nama}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control select2" style="width: 100%;" name="swa_jekel" required>
                                                    <option value="laki-laki">Laki-Laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="swa_alamat" class="form-control" placeholder="Inputkan Alamat" value="${swa_alamat}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Umur</label>
                                                <input type="text" name="swa_umur" class="form-control" placeholder="Inputkan Umur" value="${swa_umur}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor HP</label>
                                                <input type="number" name="swa_nope" class="form-control" placeholder="Inputkan Nomor" value="${swa_nope}" required>
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