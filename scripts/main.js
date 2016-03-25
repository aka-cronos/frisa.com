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
    $unslider.toggleClass('is-fixed');
  });

  // Fix subNav on scroll
  $(window).on('scroll', function () {
    var $subNav = $('#products-SubNav');
    $subNav.toggleClass('is-scrolled', $(window).scrollTop() > 0);
  });

  // Change logo image with scroll in nav
  $(window).scroll(function(){
    var $mainHeader = $('.mainHeader');
    $mainHeader.toggleClass('is-scrolled', $(window).scrollTop() > 0);
  });

  // Open/close products-SubNav
  $('.products-SubNav').click(function () {
    $('.products-SubNav').toggleClass('is-active');
  });
});