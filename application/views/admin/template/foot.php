<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Your Website 2021</span>
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
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script src="<?= base_url('assets/js/chart.js') ?>"></script>
<script>
	$.ajax({
		url: "<?= base_url('admin/laporan') ?>",
		method: 'get',
		success: (e) => {
			console.log();
			$("#laporan_bulan").DataTable({

				data: JSON.parse(e),
				columnDefs: [{
					targets: 3,
					data: null,
					render: function(data, type, row, meta) {
						switch(data[3]) {
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
		}
	});
</script>
</body>

</html>
