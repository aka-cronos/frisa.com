$(document).ready(function() {
  // Main Slider in home
  $('.fullSlider').unslider({
    autoplay: true,
    infinite: true,
    delay: 6000,
    nav: true,
    arrows: {
      prev: '<a class="unslider-arrow prev"><img src="/img/arrow-left.png" alt="" /></a>',
      next: '<a class="unslider-arrow next"><img src="/img/arrow-right.png" alt="" /></a>'
    }
  });

  // Section Slider
  $('.slider').unslider({
    autoplay: true,
    infinite: true,
    nav: false,
    arrows: {
      prev: '<a class="unslider-arrow prev"><img src="/img/arrow-left.png" alt="" /></a>',
      next: '<a class="unslider-arrow next"><img src="/img/arrow-right.png" alt="" /></a>'
    }
  });

  // Open and close details
  $('.detail').click(function () {
    if ($(this).hasClass('is-open')) {
      $(this)
        .removeClass('is-open')
        .find('span')
        .hide('1000');
    } else {
      $('.detail')
        .removeClass('is-open')
        .find('span')
        .hide('1000');
      $(this)
        .addClass('is-open')
        .find('span')
        .show('1000')
        .css( 'display', 'block');      
    }
  });

  // Open and close sectionGallery
  $('#gallery-open, #gallery-close').click(function() {
    var $unslider = $('.unslider');
    $unslider.toggleClass('isFixed');
  });

  // Fix subNav on scroll
  $(window).on('scroll', function () {
    var $subNav = $('#products-SubNav');
    $subNav.toggleClass('isFixed', $(window).scrollTop() > 99);
  });

  // Change logo image with scroll in nav
  $(window).scroll(function(){
    var $mainHeader = $('.mainHeader');
    $mainHeader.toggleClass('isScrolled', $(window).scrollTop() > 0);
  });
});