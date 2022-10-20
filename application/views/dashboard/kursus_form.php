<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Modal -->
<div class="modal fade" id="d_kursus" tabindex="-1" role="dialog" aria-labelledby="a_kursus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="a_guru">Tambah Data Kursus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url("kursus/add") ?>" method="post">
                    <div class="form-group">
                        <label>Nama Guru</label>
                        <select class="form-control select2" style="width: 100%;" name="gru_nama" required>
                            <option value="" selected="selected">Nama Guru</option>
                            <?php foreach ($guru as $row) { ?>
                                <option value="<?= $row['gru_id']; ?>"><?= $row['gru_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <select class="form-control select2" style="width: 100%;" name="swa_nama" required>
                            <option value="" selected="selected">Nama Siswa</option>
                            <?php foreach ($siswa as $row) { ?>
                                <option value="<?= $row['swa_id']; ?>"><?= $row['swa_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="krs_tgl_masuk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="krs_tgl_selesai" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>