$(document).ready(function(){
    var $set = $('.set-tasks');
    var $due = $('.due-tasks');
    var $complete = $('.complete-tasks');
    var $setButton = $('.set-selector');
    var $dueButton = $('.due-selector');
    var $completeButton = $('.complete-selector');
    $set.addClass("hidden");
    $complete.addClass("hidden");
    $($setButton).click(function() {
        $due.removeClass("visible").addClass("hidden");
        $complete.removeClass("visible").addClass("hidden");
        $set.removeClass("hidden").addClass("visible");
        $setButton.css('z-index', 997);
        $completeButton.css('z-index', 996);
        $dueButton.css('z-index', 995);
        $('html, body').animate({ scrollTop: 0 }, 'fast');

    });
    $($dueButton).click(function() {
        $set.removeClass("visible").addClass("hidden");
        $complete.removeClass("visible").addClass("hidden");
        $due.removeClass("hidden").addClass("visible");
        $dueButton.css('z-index', 997);
        $completeButton.css('z-index', 996);
        $setButton.css('z-index', 995);
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    });
    $($completeButton).click(function() {
        $set.removeClass("visible").addClass("hidden");
        $due.removeClass("visible").addClass("hidden");
        $complete.removeClass("hidden").addClass("visible");
        $completeButton.css('z-index', 997);
        $dueButton.css('z-index', 996);
        $setButton.css('z-index', 995);
        $('html, body').animate({ scrollTop: 0 }, 'fast');
    });
});