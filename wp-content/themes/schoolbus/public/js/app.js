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
(function($) {

	'use strict';

	function Gallery(selector) {
		this.ui = app.UserInterface;

		var photo = {
			src: 'http://placehold.it/500x350'
		};

		this.ui.attachGallery(selector);
		this.ui.setPhoto(photo);

		console.log(this.ui.gallery);
	}

	$(document).ready(function() {
		new Gallery('body');
	});

})(jQuery);
(function(window, $) {

	var UserInterface = {
		gallery: null,
		photo: null,
		createGallery: function() {
			return this.container().append([
				this.caption(),
				this.closeButton(),
				this.placeholder()
			]);
		},
		attachGallery: function(selector) {
			this.gallery = this.gallery || this.createGallery();

			$(selector).append(this.gallery);
		},
		container: function() {
			return $('<div />', {
				class: 'Gallery'
			});
		},
		caption: function(){
			return $('<div />', {
				class: 'Gallery__caption',
				text: 'The Bernie-or-Busters are still at it.'
			});
		},
		closeButton: function() {
			return $('<span />', {
				class: 'Gallery__close-button',
				text: 'Close'
			});
		},
		placeholder: function() {
			return $('<div />', {
				class: 'Gallery__placeholder'
			}).append([
				this.prevButton(),
				this.nextButton()
			]);
		},
		prevButton: function() {
			return $('<div />', {
				class: 'Gallery__control Gallery__control--left'
			});
		},
		nextButton: function() {
			return $('<div />', {
				class: 'Gallery__control Gallery__control--right'
			});
		},
		setPhoto: function(photo) {
			this.photo = this.photo || $('<img />');
			
			var placeholder = this.gallery.find('.Gallery__placeholder');
			var image = this.photo.attr("src", photo.src);

			placeholder.append(image);
		}
	};

	window.app = window.app || {};
	window.app.UserInterface = UserInterface;

})(window, jQuery);