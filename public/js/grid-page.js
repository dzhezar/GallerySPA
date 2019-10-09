$(document).ready(function() {

  'use strict';

  $('#carousel').fadeIn();
  $('#main-nav').fadeIn();
  $('#footer').fadeIn();

  // ========================================================================= //
  //  // RESPONSIVE GRID ITEMS
  // ========================================================================= //

  makeGrid();
  $(window).bind('resize', function () {
    makeGrid();
  });
  if (window.screen.width < 769) {
        $('.grid-item').on('click', function () {
            $(this).children('.grid-item-caption-text').css('display', 'block');
          });
  }

  // ========================================================================= //
  //  // INITIALIZE GRID
  // ========================================================================= //

  jQueryBridget( 'masonry', Masonry, $ );

  $('.grid').masonry({
    itemSelector: '.grid-item',
    horizontalOrder: true
  });

});

function makeGrid() {
  $('.img').each(function () {
    let width = $(this).width();
    let height = $(this).height();
    $(this).parent('a').children('.caption').css('width',width).css('height',height);
    $(this).parent('a').children('.caption').children('.caption-text').css('width',width).css('height',height);
  });
}
//
// function img() {
//   $('.img').each(function () {
//     let width = this.width;
//     let height = this.height;
//     if ($(window).width() < 1025 && $(window).width() > 515) {
//       $(this).parent().parent().css('width',width*450/height).css('flex-grow',width*300/height);
//     }
//     else {
//       $(this).parent().parent().css('width', width * 500 / height).css('flex-grow', width * 300 / height);
//     }
//   });
// }
// function item() {
//   $('.portfolio-item').each(function () {
//     let width = $(this).width();
//     let height = $(this).height();
//     $(this).children('a').children('.caption').css('width',width).css('height',height);
//     $(this).children('a').children('.caption').children('.caption-text').css('width',width).css('height',height);
//   });
// }



