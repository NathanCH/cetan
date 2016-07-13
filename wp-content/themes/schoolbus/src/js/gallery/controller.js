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