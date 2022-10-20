<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if ($this->session->userdata('usr_level') === 'Admin') { ?>
<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah Anda yakin ingin menghapus data ini?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit data guru-->
<div class="modal fade" id="editModalGuru" tabindex="-1" role="dialog" aria-labelledby="a_guru" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="a_guru">Tambah Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url("guru/edit") ?>" method="post">
                    <div id="isiKontenEditGuru"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit data siswa-->
<div class="modal fade" id="editModalSiswa" tabindex="-1" role="dialog" aria-labelledby="a_siswa" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="a_guru">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url("siswa/edit") ?>" method="post">
                    <div id="isiKontenEditSiswa"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit data kursus-->
<div class="modal fade" id="editModalKursus" tabindex="-1" role="dialog" aria-labelledby="a_kursus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="a_kursus">Tambah Data Kursus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url("kursus/edit") ?>" method="post">
                    <div id="isiKontenEditKursus"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit data pembayaran-->
<div class="modal fade" id="editModalPembayaran" tabindex="-1" role="dialog" aria-labelledby="a_pembayaran" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="a_pembayaran">Tambah Data Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url("pembayaran/edit") ?>" method="post">
                    <div id="isiKontenEditPembayaran"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
