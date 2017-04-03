
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app'
// });


(function(window, jQuery) {
	$("#btn-truncate").click(function(event) {
		event.preventDefault();
		if (confirm("Are you sure that you want to truncate the table?")) {
			console.log("Hello! You need to code here.");
			$("#frm-truncate").submit();
		}
	});

	$("#item-show button#item-btn-delete").click(function(event) {
		event.preventDefault();
		if (confirm("Are you sure that you want to delete this saved product?")) {
			$("form#delete-form").submit();
		}
	});

	$("#welcome-page .right-sidebar li.post").click(function(event) {
		event.preventDefault();
		var $postEl = $(this),
			$selectedPostTitle = $("#welcome-page #selected-post h3.title"),
			$selectedPostImage = $("#welcome-page #selected-post img.post-image"),
			$selectedPostBody = $("#welcome-page #selected-post div.post-body");

		$selectedPostTitle.text($postEl.find(".post-title").text());
		$selectedPostImage[0].src = $postEl.attr('data-img-url');
		$selectedPostBody.children().remove();
		$selectedPostBody.append($($postEl.attr("data-body")));
	});
})(window, $);