(function(window, $) {

	var View = {
		gallery: null,
		photo: null,
		createGallery: function() {
			return this.container().append([
				this.caption(),
				this.closeButton(),
				this.placeholder(),
				this.prevButton(),
				this.nextButton()
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
			});
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
		loader: function() {
			var $loader = $('.Gallery__loader');

			return $loader.length ? $loader : $('<div />', {
				class: 'Gallery__loader fa fa-spinner fa-pulse'
			});
		},
		setPhoto: function(photo) {
			var self = this;
			$.ajax({
				type: 'GET',
				url: photo.src,
				cache: true,
				xhr: function() {
					var xhr = new window.XMLHttpRequest();

					xhr.responseType = 'arraybuffer';

					xhr.addEventListener('load', function(e){
					    var arrayBufferView = new Uint8Array( e.target.response );
					    var blob = new Blob( [ arrayBufferView ], { type: "image/jpeg" } );
					    var urlCreator = window.URL || window.webkitURL;
					    var imageUrl = urlCreator.createObjectURL( blob );
					    
					    self.loader().remove();
					    self.placeholder().append(self.photo());
					    self.caption().text(photo.caption);
					    self.photo().attr('src', imageUrl);
					});

					return xhr;
				},
				beforeSend: function() {
					self.photo().remove();
					self.placeholder().append(self.loader());
				}
			});
		}
	};

	window.app = window.app || {};
	window.app.View = View;

})(window, jQuery);