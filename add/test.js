$(document).ready(function() {
    $('[data-toggle="popover"]').popover();

    $('.pop').popover().click(function() {
        //traduccion();
        setTimeout(function() {
            $('.pop').popover('hide');
        }, 2000);
    });
    $('.pop-lg').popover().click(function() {
        //traduccion();
        setTimeout(function() {
            $('.pop-lg').popover('hide');
        }, 3000);
    });
});