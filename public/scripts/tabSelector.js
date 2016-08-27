$(document).ready(function(){
    var $set = $('.set-tasks');
    var $due = $('.due-tasks');
    var $setButton = $('.set-selector');
    var $dueButton = $('.due-selector');
    $set.addClass("hidden");
    $($setButton).click(function() {
        $due.removeClass("visible").addClass("hidden");
        $set.removeClass("hidden").addClass("visible");
        $setButton.css('z-index', 997);
        $dueButton.css('z-index', 996);
        $('html, body').animate({ scrollTop: 0 }, 'fast');

    });
    $($dueButton).click(function() {
        $set.removeClass("visible").addClass("hidden");
        $due.removeClass("hidden").addClass("visible");
        $dueButton.css('z-index', 997);
        $setButton.css('z-index', 996);
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    });
});