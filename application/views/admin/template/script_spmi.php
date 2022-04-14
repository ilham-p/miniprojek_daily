<script>
	const tabelLaporanMasuk = $("#laporan_masuk").DataTable({
		ajax: '<?= base_url('api/laporan/status/1') ?>',
		lengthChange: false,
		columnDefs: [{
			targets: 4,
			data: null,
			width: '100px',
			className: 'text-center align-middle',
			render: function(data, type, row, meta) {
				return `<a href="javascript:void(0)" class="acc_btn fa-stack fa-1x text-success" data-id="${data[4]}" style="flex-shrink: 0;"><i class="fas fa-circle fa-stack-2x"></i> <i class="fas fa-check fa-stack-1x fa-inverse" style="--fa-inverse:var(--fa-navy);"></i></a> 
				<a href="javascript:void(0)" class="reject_btn fa-stack text-danger fa-1x" data-id="${data[4]}" style="flex-shrink: 0;"><i class="fas fa-circle fa-stack-2x"></i> <i class="fas fa-ban fa-stack-1x fa-inverse" style="--fa-inverse:var(--fa-navy);"></i></a>`;

				// <a href="javascript:void(0)" class="fa-stack fa-1x" style="flex-shrink: 0;"><i class="fas fa-circle fa-stack-2x"></i> <i class="fas fa-check fa-stack-1x fa-inverse" style="--fa-inverse:var(--fa-navy);"></i></a>
			}
		}]
	});

	$('#laporan_masuk tbody').on('click', '.acc_btn', function() {
		const data = $(this).data('id')
		$.ajax({
			// Acc Laporan
			url: '<?= base_url('api/laporan/confirm/accept') ?>',
			method: 'POST',
			data: {
				id: data
			},
			success: function(e) {
				$('#toast-container').html(toastNotif('fa-check', `Laporan Disetujui!`, `Data laporan <i><b>${data}</b></i> telah anda setujui.`, 'bg-success', 'text-white'))
				$('.toast').toast('show');
				tabelLaporanMasuk.ajax.reload()
			}
		})
	});


	$('#laporan_masuk tbody').on('click', '.reject_btn', function() {
		const data = $(this).data('id')
		$.ajax({
			// Acc Laporan
			url: '<?= base_url('api/laporan/confirm/reject/') ?>',
			method: 'POST',
			data: {
				id: data
			},
			success: function(e) {
				$('#toast-container').html(toastNotif('fa-check', `Laporan Tidak Disetujui!`, `Data laporan <i><b>${data}</b></i> tidak anda setujui.`, 'bg-danger', 'text-white'))
				$('.toast').toast('show');
				tabelLaporanMasuk.ajax.reload()
			}
		})
	});
</script>


<script>
	const generateForm = $('#generate_laporan')
	const tbPreview = $('#data_preview')
	tglIni = $('#hari_ini')
	tglDari = $('#tgl_dari')
	tglSampai = $('#tgl_sampai')
	toggleTgl = $('#hari_ini[type="checkbox"]')
	accepted = $('#accepted_stat[type="checkbox"]')
	rejected = $('#reject_stat[type="checkbox"]')


	$(document).ready(function() {
		toggleTgl.on('change', function() {
			if (!toggleTgl.is(":checked")) {
				console.log(true)
				tglDari.attr('disabled', false)
				tglSampai.attr('disabled', false)
			} else {
				console.log(false)
				tglDari.attr('disabled', true)
				tglSampai.attr('disabled', true)
			}
		})
		tglDari.on('change', function() {
			var date = new Date(tglDari.val());
			date.setDate(date.getDate() + 1);

			tglSampai.attr("min", date.toISOString().split('T')[0])
		})

		tglSampai.on('change', function() {
			var date = new Date(tglSampai.val());
			date.setDate(date.getDate() - 1);
			tglDari.attr("max", date.toISOString().split('T')[0])
		})




		// generateForm.submit((e) => {
		// 	e.preventDefault()

		// 	$.ajax({
		// 		url: '<?= base_url('api/laporan/export') ?>',
		// 		method: 'GET',
		// 		data: {
		// 			hariIni: toggleTgl.val(),
		// 			tgl_dari: tglDari.val(),
		// 			tgl_sampai: tglSampai.val(),
		// 			acceptedStat: accepted.val(),
		// 			rejectedStat: rejected.val()

		// 		},
		// 		success: function(e) {
		// 			e = JSON.parse(e)
		// 			console.log(e)
		// 		}
		// 	})
		// })

	})
</script>
