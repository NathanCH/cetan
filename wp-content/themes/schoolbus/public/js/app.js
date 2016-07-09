(function($) {
	$('.Menu__toggle').on('click', function() {
		$(this).parent('.Menu').toggleClass('Menu--open');
		$('body').toggleClass('Body--noscroll');
	});

	$('.Form .Button').on('click', function(e) {
		e.preventDefault();

		var $self = $(this);
		var $response = $('<span />', {
			text: 'Message recieved, thanks!',
			style: 'display:none'
		});
		var data = {
			action: 'send_mail',
			data: $('form').serialize()
		};

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			method: 'POST',
			data: data,
			beforeSend: function() {
				$self.attr('disabled', 'disabled');
				$self.attr('value', 'Wait')
			},
			success: function(response) {
				$self.after($response);
				$response.show(300);
			}
		});
	});
})(jQuery);