var zoom = document.documentElement.clientWidth;
$(window).resize(function () {
    var zoomNew = document.documentElement.clientWidth;
    if (zoom != zoomNew) {
		
        zoom = zoomNew;
    }
});