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
	const jobdesk = $('select[name="jobdesk_kegiatan"');
	$.ajax({
		url: '<?= base_url('admin/jabatan_jobdesk/') . $this->session->user['jabatan'] ?>',
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
				url: '<?= base_url('admin/input_laporan_karyawan')?>',
				data: {
					tglKegiatan: _tglKegiatan.val(),
					namaKegiatan: _namaKegiatan.val(),
					detailKegiatan: _detailKegiatan.val()
				},
				method: 'POST',
				success: () => {
					console.log(new Date(_tglKegiatan.val()), _namaKegiatan.val(), _detailKegiatan.val())
					$('#toast-container').html(toastNotif('fa-check', 'Laporan Berhasil Diajukan!', 'Data yang anda input sudah berhasil disimpan', 'bg-success', 'text-white'))
					$('.toast').toast('show');


					_namaKegiatan.val('')
					_detailKegiatan.val('')
					laporanKaryawan.ajax.reload()
				}
			})
		} else {
			alert('Harap periksa kembali form anda!')
		}
	})
</script>

<script>
	var groupColumn = 2;
	const laporanKaryawan = $("#laporan_karyawan").DataTable({
		ajax: '<?= base_url('admin/laporan_karyawan/'). $this->session->user['id'] ?>',
		lengthChange: false,
		displayLength: 10,
		order: [
			[0, 'desc']
		],
		columnDefs: [{
				targets: groupColumn,
				data: null,
				render: function(data, type, row, meta) {
					switch (data[groupColumn]) {
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
			},
			// {
			// 	"visible": false,
			// 	"targets": groupColumn
			// },
		],
		// drawCallback: function(settings) {
		// 	var api = this.api();
		// 	var rows = api.rows({
		// 		page: 'current'
		// 	}).nodes();
		// 	var last = null;

		// 	api.column(groupColumn, {
		// 		page: 'current'
		// 	}).data().each(function(group, i) {
		// 		if (last !== group) {
		// 			$(rows).eq(i).before(
		// 				'<tr class="group"><td colspan="5">' + group + '</td></tr>'
		// 			);

		// 			last = group;
		// 		}
		// 	});
		// }
	});
</script>
