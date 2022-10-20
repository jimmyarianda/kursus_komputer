<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Modal -->
<div class="modal fade" id="d_guru" tabindex="-1" role="dialog" aria-labelledby="a_guru" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="a_guru">Tambah Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url("guru/add") ?>" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="gru_nama" class="form-control" placeholder="Inputkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="gru_alamat" class="form-control" placeholder="Inputkan Alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" name="gru_nope" class="form-control" placeholder="Inputkan Nomor" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>