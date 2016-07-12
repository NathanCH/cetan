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