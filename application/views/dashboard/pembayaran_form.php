<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Modal -->
<div class="modal fade" id="d_pembayaran" tabindex="-1" role="dialog" aria-labelledby="a_pembayaran" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="a_guru">Tambah Data Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url("pembayaran/add") ?>" method="post">
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
                        <label>Jumlah Pembayaran</label>
                        <input type="number" name="pby_spp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pemabayaran</label>
                        <input type="date" name="pby_tgl" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>