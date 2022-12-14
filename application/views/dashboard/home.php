<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row">
	<div class="col-xl-9">
		<div class="card mb-4">
			<div class="card-header"><i class="fas fa-users mr-2"></i>Jumlah Siswa & Guru</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-4 col-6">
						<div class="small-box bg-primary">
							<div class="inner">
								<br>
								<h3>&nbsp;&nbsp;<?= $guru; ?></h3>
							</div>
							<div class="icon">
								<i class="ion ion-person"></i>
							</div>
							<a class="small-box-footer">Guru</a>
						</div>
					</div>
					<div class="col-lg-4 col-6">
						<div class="small-box bg-danger">
							<div class="inner">
								<br>
								<h3>&nbsp;&nbsp;<?= $siswa; ?></h3>
							</div>
							<div class="icon">
								<i class="ion ion-person"></i>
							</div>
							<a class="small-box-footer">Siswa</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3">
		<div class="card mb-4">
			<div class="card-header"><i class="fas fa-user mr-2"></i>Pengguna</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-11 col-6">
						<div class="small-box bg-warning">
							<div class="inner">
								<br>
								<h3>&nbsp;&nbsp;<?= $user; ?></h3>
							</div>
							<div class="icon">
								<i class="ion ion-person"></i>
							</div>
							<a class="small-box-footer">Pengguna</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-flex p-0">
				<!-- <h3 class="card-title p-3">Sistem Nomor Surat BAPPEDA</h3> -->
				<ul class="nav nav-pills ml-auto p-2">
					<li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Profil</a></li>
					<!-- <li class="nav-item"><a class="nav-link" href="#petunjuk" data-toggle="tab">Petunjuk Penggunaan</a></li> -->
					<li class="nav-item"><a class="nav-link" href="#kontak" data-toggle="tab">Kontak</a></li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane active" id="profil">
						Selamat datang di Sistem Pendaftaran Ripza Edukasi Komputer. Sistem ini dibuat agar proses pendaftaran
						yang ada pada tempat kursus ini lebih terstruktur dan informatif.
					</div>

					<!-- <div class="tab-pane" id="petunjuk">
						Langkah - langkah pengambilan nomor surat : </br>
						- Klik &nbsp;&nbsp;<div class="nav-icon fas fa-book-open"></div> Data Nomor Surat </br>
						- Selanjutnya klik &nbsp;&nbsp; <a class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a> </br>
						- Isi semua form yang telah tersedia dengan rules yang sudah ditetapkan lalu klik &nbsp; <a class="btn btn-success btn-sm">Simpan</a> &nbsp; untuk menyimpan data
						dan klik &nbsp; <a class="btn btn-primary btn-sm">Batal</a> untuk kembali ke tabel Nomor Surat. </br>
						- Klik &nbsp; <a class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a> &nbsp; untuk melihat nomor surat dan formatnya. </br>
						- Klik &nbsp; <a class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a> &nbsp; untuk edit nomor surat dan formatnya. </br>
					</div> -->

					<div class="tab-pane" id="kontak">
						Kontak person : </br>
						<i class="fas fa-phone"></i> &nbsp; +62888888888888 (Admin)
					</div>
				</div>
			</div>
		</div>
	</div>
</div>