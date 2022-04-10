<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Contributed by <a href="https://github.com/ilham-p/" target="_blank">Ilham</a> & <a href="https://github.com/lemonsprite/" target="_blank">Noor</a> &copy; <a href="https://github.com/ilham-p/miniprojek_daily/" target="_blank">Daily Report</a> <?= date('Y') ?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@^2"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script>
<script>
	const tabelLaporan = $("#laporan_bulan").DataTable({
		ajax: '<?= base_url('admin/laporan') ?>',
		lengthChange: false,
		columnDefs: [{
			targets: 3,
			data: null,
			render: function(data, type, row, meta) {
				switch (data[3]) {
					case '1':
						return 'Tertunda';
						break;
					case '2':
						return 'Diterima';
						break;
					case '3':
						return 'Ditolak';
						break;
				}
			}
		}]
	});
</script>

<script>
	const tabelKaryawan = $("#karyawan_list").DataTable({
		ajax: "<?= base_url('admin/karyawan') ?>",
		lengthChange: false,
	});
</script>
<script>
	const stats_bulan = $("#statistik_bulan");


	const diterima = []

	const _diterima = $.ajax({
		url: '<?= base_url('admin/stats_chart/2') ?>',
		method: 'post',
		success: (e) => {
			e = JSON.parse(e);
			res = [];
			for (let x in e) {
				diterima.push(e[x]);
			}
		}
	});
	const _ditunda = $.ajax({
		url: '<?= base_url('admin/stats_chart/1') ?>',
		method: 'post',
		success: (e) => {
			e = JSON.parse(e);
			res = [];
			for (let x in e) {
				diterima.push(e[x]);
			}
		}
	});

	const _ditolak = $.ajax({
		url: '<?= base_url('admin/stats_chart/3') ?>',
		method: 'post',
		success: (e) => {
			e = JSON.parse(e);
			res = [];
			for (let x in e) {
				diterima.push(e[x]);
			}
		}
	})
	$.when(_diterima, _ditolak, _ditunda).done((x1, x2, x3) => {

		$res1 = JSON.parse(x1[0])
		$res2 = JSON.parse(x2[0])
		$res3 = JSON.parse(x3[0])


		const myChart = new Chart(stats_bulan, {
			type: "bar",
			data: {
				datasets: [{
						label: "Diterima",
						data: $res1,
						borderColor: '#85e085',
						borderWidth: 2,
						tension: 0.2,
						order: 0,
						spanGaps: true,
					},
					{
						label: "Ditolak",
						data: $res2,
						borderColor: '#ff66a3',
						borderWidth: 2,
						tension: 0.2,
						order: 1,
						spanGaps: true,
					}, {
						label: "Tertunda",
						data: $res3,
						borderColor: '#ffff66',
						borderWidth: 2,
						tension: 0.2,
						order: 2,
						spanGaps: true,
					}
				],
			},
			options: {

				scales: {
					y: {
						beginAtZero: true,
					},
					x: {
						type: "time",
						time: {
							unit: 'day',
						}

					},
				},
			},
		});
	})
</script>

</body>

</html>
