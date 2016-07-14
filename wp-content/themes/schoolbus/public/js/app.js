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
(function(window, $) {

	'use strict';

	function Gallery(selector, photos) {
		this.view = app.View;
		this.controller = app.Controller;

		this.photo = app.Photo;
		this.photo.add(photos);

		this.view.attachGallery(selector);
		this.view.setPhoto(
			this.photo.current()
		);

		this.controller.bindEvents(this.view, this.photo);
	}

	window.Gallery = window.Gallery || Gallery;

})(window, jQuery);
(function(window, $) {

	var Controller = {
		bindEvents: function(view, photo) {
			view.nextButton().on('click', function() {
				view.setPhoto(
					photo.next()
				);
			})

			view.prevButton().on('click', function() {
				view.setPhoto(
					photo.prev()
				);
			});

			view.closeButton().on('click', function() {
				$(view.gallery).remove();
			});
		}
	}

	window.app = window.app || {};
	window.app.Controller = Controller;

})(window, jQuery);
(function(window, $) {

	var Photo = {
		index: 0,
		photoList: [],
		add: function(photos) {
			this.photoList = this.photoList.concat(photos);
		},
		current: function(){
			return this.photoList[this.index];
		},
		next: function() {
			return this.increment().current();
		},
		prev: function() {
			return this.decrement().current();
		},
		increment: function() {
			this.index++

			if(this.index >= this.photoList.length) {
				this.index = 0;
			}

			return this;
		},
		decrement: function() {
			this.index--

			if(this.index < 0) {
				this.index = this.photoList.length - 1;
			}

			return this;
		}
	}

	window.app = window.app || {};
	window.app.Photo = Photo;

})(window, jQuery);
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
/**
 * Tiny jQuery pub/sub.
 * https://github.com/cowboy/jquery-tiny-pubsub
 */
var object = $({});

$.subscribe = function() {
	object.on.apply(object, arguments);
}

$.unsubscribe = function() {
	object.off.apply(object, arguments);
}

$.publish = function() {
	object.trigger.apply(object, arguments);
}
