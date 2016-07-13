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