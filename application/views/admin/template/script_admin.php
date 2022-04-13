<script>
	$('.toast').toast();
	const tabelLaporan = $("#laporan_bulan").DataTable({
		ajax: '<?= base_url('api/laporan/all') ?>',
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
		ajax: "<?= base_url('api/karyawan') ?>",
		lengthChange: false,
		method: 'GET'
	});
</script>
<script>
	const stats_bulan = $("#statistik_bulan");


	const diterima = []

	const _diterima = $.ajax({
		url: '<?= base_url('api/laporan/activity/2') ?>',
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
		url: '<?= base_url('api/laporan/activity/1') ?>',
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
		url: '<?= base_url('api/laporan/activity/3') ?>',
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

<script>
	const nama = $('input[name="nama_karyawan"]')
	const email = $('input[name="email_karyawan"]')
	const jabatan = $('select[name="jabatan_karyawan"]')
	const jobdesk = $('select[name="jobdesk_karyawan"]')
	const bio = $('textarea[name="bio_karyawan"]')

	$(jabatan).on('change', function(e) {
		let _curJabatan = jabatan.val();
		if (_curJabatan != 0) {
			$.ajax({
				url: '<?= base_url('api/jabatan_jobdesk/') ?>' + _curJabatan,
				success: function(x) {
					let data = JSON.parse(x);
					// console.log(data[0]);
					let items = '';
					data.forEach(x => {
						// console.log(x)
						items += `<option value="${x.kodejobdesk}">${x.namajobdesk}</option>`
						$(jobdesk).attr('disabled', false)
					})
					$(jobdesk).html(items)
				}
			})
		} else {
			$(jobdesk).html('');
			$(jobdesk).attr('disabled', true)
		}
	})

	$('#karyawan_add').submit((e) => {
		e.preventDefault();

		// Ambil value
		// verifikasi value
		if (jabatan.val() && nama.val() && email.val() && jobdesk.val() != '') {
			$.ajax({
				url: '<?= base_url('api/karyawan') ?>',
				method: 'POST',
				data: {
					nama: nama.val(),
					email: email.val(),
					jabatan: jabatan.val(),
					jobdesk: jobdesk.val(),
					bio: bio.val()
				},
				type: 'json',
				method: 'POST',
				success: () => {
					$('#toast-container').html(toastNotif('fa-check','Karyawan Berhasil Disimpan!', 'Data yang anda input sudah berhasil disimpan', 'bg-success', 'text-white'))
					$('.toast').toast('show');
					$('#karyawan_add')[0].reset();
					$('#karyawan_add').modal('toggle');
					tabelKaryawan.ajax.reload()
				}
			})
		} else {
			alert('Harap periksa kembali form anda!')
		}

		// submit
	})
</script>
