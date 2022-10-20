<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Modal -->
<div class="modal fade" id="d_siswa" tabindex="-1" role="dialog" aria-labelledby="a_siswa" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="a_guru">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url("siswa/add") ?>" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="swa_nama" class="form-control" placeholder="Inputkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control select2" style="width: 100%;" name="swa_jekel" id="swa_jekel" required>
                            <option>Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="swa_alamat" class="form-control" placeholder="Inputkan Jenis Alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Umur</label>
                        <input type="number" name="swa_umur" class="form-control" placeholder="Inputkan Jenis Umur" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="swa_nope" class="form-control" placeholder="Inputkan Nomor HP" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>