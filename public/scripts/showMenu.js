$(document).ready(function(){
    var $bar = $('.menuwrapper');
    $bar.hide();
    $bar.addClass("hidden");
    $('.activate').click(function() {

        if ($bar.hasClass("hidden")) {

            $bar.slideDown(200);
            $bar.removeClass("hidden").addClass("visible");


        } else {
            $bar.slideUp(200);
            $bar.removeClass("visible").addClass("hidden");
        }
    });
});