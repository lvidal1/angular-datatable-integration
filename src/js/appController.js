// Defining scope of event init
(function(w) {
    w(window.jQuery, window, document);
}(function($, window, document) {
	// When DOM is ready
    $(function() {
        // Add functions after resources have been loaded.
        app.init();
    });
}));