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
	</div>`;
}


function resetDateTime(selector) {
	let now = new Date()
	now.setMinutes(now.getMinutes() - now.getTimezoneOffset())
	$(selector).val(now.toJSON().slice(0, 19));
}
