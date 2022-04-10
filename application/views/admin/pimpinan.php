<!-- Begin Page Content -->
<div class="container">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-xl-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Ini aktivitas laporan karyawan anda, Pimpinan!</h6>
				</div>
				<div class="card-body">
					<canvas id="statistik_bulan" class="w-full h-full"></canvas>
				</div>
			</div>
		</div>
		<div class="col-xl-4">
			<div class=" mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
									Laporan Diterima</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($report_valid) ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-check-circle fa-2x text-success"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class=" mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									Laporan Tertunda</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($report_delay) ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class=" mb-4">
				<div class="card border-left-danger shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
									Laporan Ditolak</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($report_reject) ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-times-circle fa-2x text-danger"></i>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-8 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Laporan Bulan ini</h6>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
							<div class="dropdown-header">Dropdown Header:</div>
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<!-- Tabel -->
					<table id="laporan_bulan" class="table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Tanggal Kegiatan</th>
								<th>Nama Kegiatan</th>
								<th>Pelapor</th>
								<th>Status</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Jabatan</h6>

				</div>
				<!-- Card Body -->
				<div class="card-body" style="height:200px; overflow: auto;">

					<?php foreach ($jabatan as $j) : ?>
						<div class="w-100 bg-gray-200 py-2 px-3 rounded d-flex justify-content-between align-items-center mb-2">
							<span><?= $j->namajabatan ?></span>

						</div>
					<?php endforeach; ?>
				</div>
				<div class="card-footer text-center"></div>
			</div>

			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Jobdesk</h6>
					<a type="button" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#jobdesk_add" href="javascript:void(0)"><i class="fas fa-plus-circle fa-sm text-white-50"></i></a>
				</div>
				<!-- Card Body -->
				<div class="card-body" style="height:200px; overflow: auto;">
					<?php foreach ($jobdesk as $j) : ?>
						<div class="w-100 bg-gray-200 py-2 px-3 rounded d-flex justify-content-between align-items-center mb-2">
							<span><?= $j->namajobdesk ?></span>
							<span class="fa-stack fa-1x" style="flex-shrink: 0;"><i class="fas fa-circle fa-stack-2x"></i> <i class="fas fa-trash-alt fa-stack-1x fa-inverse" style="--fa-inverse:var(--fa-navy);"></i></span>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="card-footer text-center"></div>
			</div>



		</div>
	</div>

	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List Karyawan</h6>
					<a href="javascript:void(0)" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#inputModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Karyawan</a>
					<!-- <a type="button" class="align-items-center" data-toggle="modal" data-target="#jobdesk_add" href="javascript:void(0)"><i class="fas fa-plus"></i></a> -->
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<!-- Tabel -->
					<table id="karyawan_list" class="table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Jabatan</th>
								<th>Jobdesk</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ingin keluar?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Apakah anda yakin ingin keluar?</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Ya, keluar.</a>
			</div>
		</div>
	</div>
</div>
<form>
	<div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Input Laporan Baru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Kegiatan</label>
						<input name="kegiatan" class="form-control" placeholder="cth: Pengerjaan Input Data Siswa">
					</div>
					<div class="form-group">
						<label>Detail Kegiatan</label>
						<textarea name="deskripsi" class="form-control" style="resize: none;" rows="5" placeholder="cth: Menginput data siswa kelas X"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
					<button type="button" class="btn btn-primary">Kirim Laporan</button>
				</div>
			</div>
		</div>
	</div>
</form>
<form class="modal fade" id="jobdesk_add" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Input Laporan Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nama Kegiatan</label>
					<input name="nama_jd" class="form-control" placeholder="cth: Observasi">
				</div>
				<div class="form-group">
					<label>Detail Kegiatan</label>
					<textarea name="keterangan_jd" class="form-control" style="resize: none;" rows="5" placeholder="cth: Jobdesk ini mengerjakan pekerjaan dengan mesin"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
				<button type="button" class="btn btn-primary">Kirim Laporan</button>
			</div>
		</div>
	</div>
</form>
