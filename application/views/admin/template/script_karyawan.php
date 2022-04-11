<script>
	$(document).ready(function() {
		resetDateTime(tglInput)
	});
	const tanggalToggle = $('#ubah_tanggal[type="checkbox"]');
	const tglInput = $('#tgl_kegiatan_pick');

	$(tanggalToggle).on('change', () => {
		if ($('#ubah_tanggal').is(":checked")) {
			tglInput.attr('readonly', false);
		} else {
			tglInput.attr('readonly', true);
		}
	})
</script>

<script>
	// Ambil Jobdesk berdasar jabatan
	// $(jabatan).on('change', function(e) {
	// 	let _curJabatan = jabatan.val();
	// 	if (_curJabatan != 0) {
	// 		$.ajax({
	// 			url: '<?= base_url('admin/jabatan_jobdesk/') ?>' + _curJabatan,
	// 			success: function(x) {
	// 				let data = JSON.parse(x);
	// 				// console.log(data[0]);
	// 				let items = '';
	// 				data.forEach(x => {
	// 					// console.log(x)
	// 					items += `<option value="${x.kodejobdesk}">${x.namajobdesk}</option>`
	// 					$(jobdesk).attr('disabled', false)
	// 				})
	// 				$(jobdesk).html(items)
	// 			}
	// 		})
	// 	} else {
	// 		$(jobdesk).html('');
	// 		$(jobdesk).attr('disabled', true)
	// 	}
	// })
</script>


<script>
	const _tglKegiatan = $('input[name="tgl_kegiatan"]')
	const _namaKegiatan = $('input[name="nama_kegiatan"]')
	const _detailKegiatan = $('textarea[name="detail_kegiatan"]')
	const _form = $('#input_laporan')

	$(_form).submit((e) => {
		e.preventDefault();

		// Ambil value
		// verifikasi value
		if (_tglKegiatan.val() && _namaKegiatan.val() && _detailKegiatan.val() != '') {
			$.ajax({
				url: '',
				data: {
					tglKegiatan: _tglKegiatan.val(),
					namaKegiatan: _namaKegiatan.val(),
					detailKegiatan: _detailKegiatan.val()
				},
				type: 'json',
				method: 'POST',
				success: () => {
					console.log(new Date(_tglKegiatan.val()), _namaKegiatan.val(), _detailKegiatan.val())
					$('#toast-container').html(toastNotif('fa-check', 'Karyawan Berhasil Disimpan!', 'Data yang anda input sudah berhasil disimpan', 'bg-success', 'text-white'))
					$('.toast').toast('show');


					_namaKegiatan.val('')
					_detailKegiatan.val('')
				}
			})
		} else {
			alert('Harap periksa kembali form anda!')
		}
	})
</script>
