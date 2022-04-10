function toastNotif(icon, judul, pesan, headColor, headTextColor) {
	return `<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
		<div class="toast-header ${headColor} ${headTextColor}">
			<i class="fas ${icon} mr-2"></i>
			<strong class="mr-auto">${judul}</strong>
			<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="toast-body">
			${pesan}
		</div>
	</div>`
}

$(document).ready(() => {
	const tanggalToggle = $('#ubah_tanggal')
	tanggalToggle.on('change',(e) => {
		console.log(tanggalToggle.val())
	})
})

