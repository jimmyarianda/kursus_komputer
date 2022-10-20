<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?= site_url('pembayaran'); ?>">Pembayaran</a></li>
    <li class="breadcrumb-item active">Laporan Pembayaran</li>
</ol>

<div class="card card-default">
    <!-- card-header -->
    <div class="card-header">Laporan Pembayaran
        &nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-sm" href="<?= site_url('pembayaran'); ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="<?= site_url("laporan/print_data") ?>" method="post">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl2" class="form-control" required>
                    </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-warning" type="submit"><i class="fas fa-print">Print</i> </button>&nbsp;
        </div>
        </form>
    </div>