<!-- Begin Page Content -->
<div class="container">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<a href="javascript:void(0)" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#generate_laporan"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
	</div>

	<!-- Content Row -->
	<div class="row">


		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Laporan Masuk</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $report_delay ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
								Laporan Ditolak</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $report_reject ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laporan Selesai
							</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $report_valid ?></div>
								</div>
								<!-- <div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div> -->
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-12 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Laporan Masuk</h6>
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
					<table id="laporan_masuk" class="table table-bordered">
						<thead>
							<tr>
								<th>Tanggal Kegiatan</th>
								<th>Nama Kegiatan</th>
								<th>Deskripsi Kegiatan</th>
								<th>Pelapor</th>
								<th>Aksi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>


	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<form class="modal fade" id="generate_laporan" tabindex="-1" aria-hidden="true" action="#">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Generate Laporan Karyawan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="today" checked="true">
						<label class="form-check-label small" for="today">Generate Laporan Hari Ini</label>
					</div>
					<div class="row">
						<div class="form-group col">
							<label>Dari</label>
							<input id="tgl_dari" name="tgl_dari" class="form-control" placeholder="Nama Lengkap" type="date" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d', strtotime('today')) ?>" disabled="true">
						</div>
						<div class="form-group col">
							<label>Sampai</label>
							<input id="tgl_sampai" name="tgl_sampai" class="form-control" placeholder="Email" type="date" value="<?= date('Y-m-d', strtotime('tomorrow')) ?>" disabled="true">
						</div>
					</div>

				</div>
				<div class="row col">
					<div class="form-group">
						<label>Status Laporan</label>
						<div class="d-flex">
							<div class="form-group form-check  mr-4">
								<input type="checkbox" class="form-check-input" id="all_stat" checked="true">
								<label class="form-check-label small" for="all_stat">Semua Status</label>
							</div>
							<div class="form-group form-check  mr-4">
								<input type="checkbox" class="form-check-input " id="accepted_stat" checked="true">
								<label class="form-check-label small" for="accepted_stat">Diterima</label>
							</div>
							<div class="form-group form-check  mr-4">
								<input type="checkbox" class="form-check-input " id="reject_stat" checked="true">
								<label class="form-check-label small" for="reject_stat">Ditolak</label>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="row justify-content-center">
					<a href="javascript:void(0)" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#generate_laporan"><i class="fas fa-eye fa-sm text-white-50"></i> Pratinjau Data</a>
				</div> -->
				<hr>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Kegiatan</th>
							<th>Deskripsi</th>
							<th>Pelapor</th>
							<th>Status</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="modal-footer justify-content-center">
				<button onclick="alert('Masih dalam tahap pengembangan')" class="btn btn-success shadow-sm">Download Data</button>
			</div>
		</div>
	</div>
</form>
