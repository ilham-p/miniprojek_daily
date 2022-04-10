<!-- Begin Page Content -->
<div class="container">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<!-- <a href="javascript:void(0)" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#inputModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Buat Laporan</a> -->
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-xl-7">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Jobdesk Penelitian</h6>
				</div>
				<div class="card-body">
					<table id="laporan_karyawan" class="table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Tanggal Kegiatan</th>
								<th>Nama Kegiatan</th>
								<th>Status</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		<div class="col-xl-5">
			<div class=" mb-4">
				<div class="card shadow mb-4">
					<div class="card-header bg-success text-white">
						<h6 class="m-0 font-weight-bold">Input Laporan</h6>
					</div>
					<div class="card-body">
						<form id="input_laporan" method="POST">
							<div class="form-group">
								<label>Waktu Kegiatan</label>
								<input name="nama_kegiatan" class="form-control" type="datetime-local">
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="ubah_tanggal">
									<label class="form-check-label small" for="ubah_tanggal">Ubah Tanggal</label>
								</div>

							</div>

							<div class="form-group">
								<label>Nama Kegiatan</label>
								<input name="nama_kegiatan" class="form-control">
							</div>
							<div class="form-group">
								<label>Detail Kegiatan</label>
								<textarea name="detail_kegiatan" class="form-control" style="resize: none;" rows="5" placeholder="cth: Kegiatan ini mengerjakan pekerjaan dengan mesin"></textarea>
							</div>

							<button type="submit" class="btn btn-dark btn-block">Kirim Laporan</button>
						</form>
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

					Tabel Log laporan per Bulan
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
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
					<div class="chart-pie pt-4 pb-2">
						<canvas id="myPieChart"></canvas>
					</div>
					<div class="mt-4 text-center small">
						<span class="mr-2">
							<i class="fas fa-circle text-primary"></i> Direct
						</span>
						<span class="mr-2">
							<i class="fas fa-circle text-success"></i> Social
						</span>
						<span class="mr-2">
							<i class="fas fa-circle text-info"></i> Referral
						</span>
					</div>
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
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="login.html">Logout</a>
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
						<input name="kegiatan" class="form-control">
					</div>
					<div class="form-group">
						<label>Detail Kegiatan</label>
						<textarea name="deskripsi" class="form-control" style="resize: none;" rows="5"></textarea>
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
