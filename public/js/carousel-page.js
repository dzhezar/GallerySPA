$(document).ready(function() {

    // ========================================================================= //
    //  // CAROUSEL KEYBOARD CONTROL
    // ========================================================================= //
    $(document).keydown(function (e) {
        if (e.keyCode === 37) {
            e.preventDefault();
            $(".carousel-control-prev").click();
        }
        if (e.keyCode === 39) {
            e.preventDefault();
            $(".carousel-control-next").click();
        }
    });

    $('.control').on('click', function () {
        setTimeout(counter, 100);
        counter();
    });
});

// ========================================================================= //
//  // COUNTER FUNC
// ========================================================================= //
function counter() {
    let target =  $('.carousel-item.active');
    let count = target[0].dataset.count;
    let total = $('.carousel-item').length;
    $('#counter').text(`${count} / ${total}`);
}