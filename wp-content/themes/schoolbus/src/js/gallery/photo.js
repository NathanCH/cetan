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