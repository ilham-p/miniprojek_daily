<!-- Begin Page Content -->
<div class="container">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<!-- <a href="javascript:void(0)" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#inputModal"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Buat Laporan</a> -->
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-xl-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Laporan Anda</h6>
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
		<div class="col-xl-4">
			<div class=" mb-4">
				<div class="card shadow mb-4">
					<div class="card-header bg-success text-white">
						<h6 class="m-0 font-weight-bold">Input Laporan</h6>
					</div>
					<div class="card-body">
						<form id="input_laporan" method="POST">
							<div class="form-group">
								<label>Waktu Kegiatan</label>
								<input name="tgl_kegiatan" class="form-control" type="datetime-local" id="tgl_kegiatan_pick" readonly="true">
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="ubah_tanggal">
									<label class="form-check-label small" for="ubah_tanggal">Ubah Waktu</label>
								</div>

							</div>

							<div class="form-group">
								<label>Jobdesk</label>
								<select name="jobdesk_kegiatan" class="form-control"></select>
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



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
