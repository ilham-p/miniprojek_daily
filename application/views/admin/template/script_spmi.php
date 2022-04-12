<script>
	const tabelLaporanMasuk = $("#laporan_masuk").DataTable({
		ajax: '<?= base_url('admin/laporan_masuk') ?>',
		lengthChange: false,
		columnDefs: [{
			targets: 4,
			data: null,
			className: 'text-center',
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
			url: '<?= base_url('admin/laporan_acc/accept/') ?>',
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
			url: '<?= base_url('admin/laporan_acc/reject/') ?>',
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
	tglDari = $('#tgl_dari')
	tglSampai = $('#tgl_sampai')
	toggleTgl = $('#today[type="checkbox"]')

	$(document).ready(function() {
		toggleTgl.on('change', function() {
			if(!toggleTgl.is(":checked")) {
				console.log(true)
				tglDari.attr('disabled', false)
				tglSampai.attr('disabled', false)
			} else {
				console.log(false)
				tglDari.attr('disabled', true)
				tglSampai.attr('disabled', true)
			}
		})
	})
</script>
