// ========================================================================= //
//  // FancyBox CONFIG
// ========================================================================= //
$(document).ready(function() {

    let fancybox = $("[data-fancybox]");
    if (fancybox.length) {
        fancybox.fancybox({
            buttons: ["close"],
            loop: true,
            clickContent: false,
            beforeClose: function () {
                $('.carousel-caption-text').css('display', 'none');
            }
        });
    }

// ========================================================================= //
//  // RESPONSIVE MENU
// ========================================================================= //

    $('.responsive').on('click', function () {
        $('.nav-menu').slideToggle();
    });
});

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

