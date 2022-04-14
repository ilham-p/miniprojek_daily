<!DOCTYPE html>
<html>
<?php date_default_timezone_set('Asia/Jakarta'); ?>

<head>
	<title>Export</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Dashboard | Daily Report App</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<div class="row">

			<div class="col-6 ">
				<table>
					<tr>
						<td><i class="fas fa-chart-pie mr-3" style="font-size: 40px;"></i></td>
						<td>
							<h3 class="mb-0">Daily Report App</h3>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-6">
				<table class="table table-borderless table-sm">
					<tr class="m-0">
						<td>Dirilis oleh </td>
						<td class="px-3">:</td>
						<td><?= $this->session->user['nama'] ?></td>
					</tr>
					<tr class="m-0">
						<td>Dirilis pada</td>
						<td class="px-3">:</td>
						<td><?= date("l, d F Y - H:i:s") ?></td>
					</tr>
				</table>
			</div>

		</div>
		<div class="row">

			<table class="table table-bordered" id="res">
				<thead class="bg-dark text-white">
					<tr>
						<th>#</th>
						<th>Nama Kegiatan</th>
						<th>Deskripsi</th>
						<th>Pelapor</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>

					<?php $x = 1;
					foreach ($data as $d) : ?>
						<tr>
							<td><?= $x++ ?></td>
							<td><?= $d->kegiatan ?></td>
							<td><?= $d->deskripsi ?></td>
							<td><?= $d->nama ?></td>
							<td>
								<?php
								switch ($d->status) {
									case 2:
										echo "Diterima";
										break;
									case 3:
										echo "Ditolak";
										break;
								}
								?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

		</div>
	</div>
	<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

	<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/moment@^2"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script>
	<script src="<?= base_url('assets/js/main.js') ?>"></script>

	<script>
		$('#res').DataTable({
			searching: false,
			pageLength: -1,
			lengthChange: false,
			pagination: false,
			paging: false,

			bPaginate: false,
			bLengthChange: false,
			bFilter: true,
			bInfo: false,
			columnDefs: [{
					targets: 3,
					width: '120px'
				},
				{
					targets: '_all',
					className: 'align-items-center'
				}
			]
		})
	</script>

</body>

</html>
