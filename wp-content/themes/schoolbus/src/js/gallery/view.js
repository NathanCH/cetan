(function(window, $) {

	var View = {
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
			var $caption = $('.Gallery__caption');

			return $caption.length ? $caption : $('<div />', { class: 'Gallery__caption' });
		},
		closeButton: function() {
			var $closeButton = $('.Gallery__close-button');

			return $closeButton.length ? $closeButton : $('<span />', {
				class: 'Gallery__close-button',
				text: 'Close'
			});
		},
		placeholder: function() {
			var $placeholder = $('.Gallery__placeholder');

			return $placeholder.length ? $placeholder : $('<div />', {
				class: 'Gallery__placeholder'
			}).append([
				this.prevButton(),
				this.nextButton()
			]);
		},
		prevButton: function() {
			var $prevButton = $('.Gallery__control--left');

			return $prevButton.length ? $prevButton : $('<div />', {
				class: 'Gallery__control Gallery__control--left'
			});
		},
		nextButton: function() {
			var $nextButton = $('.Gallery__control--right');

			return $nextButton.length ? $nextButton : $('<div />', {
				class: 'Gallery__control Gallery__control--right'
			});
		},
		photo: function() {
			var $photo = $('.Gallery__image');

			return $photo.length ? $photo : $('<img />', {
				class: 'Gallery__image'
			});
		},
		setPhoto: function(photo) {
			this.placeholder().append(this.photo());
			this.caption().text(photo.caption);

			this.photo().attr('src', photo.src);
		}
	};

	window.app = window.app || {};
	window.app.View = View;

})(window, jQuery);