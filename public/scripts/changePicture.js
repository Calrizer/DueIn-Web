$(document).ready(function(){
    var $view = $('.edit-bg');
    var $open = $('.picture-trigger');
    var $close = $('.close-trigger');
    $view.addClass("hidden");
    $($open).click(function() {
        $view.fadeIn(200);
        $view.removeClass("hidden").addClass("visible");
    });
    $($close).click(function() {
        $view.fadeOut(200);
    });
    $($view).click(function() {
        $view.fadeOut(200);
    });
});