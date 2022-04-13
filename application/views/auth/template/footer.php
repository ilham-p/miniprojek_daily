<div id="toast-container" class="position-fixed top-0 right-0 p-3" style="z-index: 10000; right: 0; top: 0;">
	<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/main.js') ?>"></script>

	<script>
		const userMail = $('input[name="email"]');
		const userPass = $('input[name="password"]');
		$('#login').submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: '<?= base_url('api/login') ?>',
				method: 'POST',
				data: {
					email: userMail.val(),
					password: userPass.val()
				},
				success: function(e) {
					e = JSON.parse(e)
					console.log(e)
					if (e.status) {
						$('#toast-container').html(toastNotif('fa-check', 'Autentikasi berhasil!', e.message, 'bg-success', 'text-white'))
						$('.toast').toast('show');
						setTimeout(function() {
							window.location.href = "<?= base_url('admin') ?>";
						}, 2000);
					} else {
						$('#toast-container').html('')
						if (typeof e.message === "object") {
							for (var key in e.message) {

								if (e.message.hasOwnProperty(key)) {
									$('#toast-container').append(toastNotif('fa-times', 'Autentikasi user gagal!', e.message[key], 'bg-danger', 'text-white'))
									$('.toast').toast('show');
								}
							}
						} else {

							$('#toast-container').append(toastNotif('fa-times', 'Autentikasi user gagal!', e.message, 'bg-danger', 'text-white'))
							$('.toast').toast('show');
						}

					}
				}
			})

		})
	</script>
	</body>

	</html>
