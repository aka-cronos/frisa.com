$(document).ready(function() {
  $('.slider').unslider({
    autoplay: true,
    infinite: true,
    nav: false,
    arrows: {
      prev: '<a class="unslider-arrow prev"><img src="/img/arrow-left.png" alt="" /></a>',
      next: '<a class="unslider-arrow next"><img src="/img/arrow-right.png" alt="" /></a>'
    }
  });

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
 
  $('.detail').click(function () {    
    if ($(this).hasClass('is-open')) {
      $(this).removeClass('is-open');
      $(this).find('span').hide("1000");
    } else {
      $('.detail').removeClass('is-open');
      $('.detail').find('span').hide("1000");
      $(this).addClass('is-open');
      $(this).find('span').show("1000").css( "display", "block");      
    }
  });

  $('#gallery-open, #gallery-close').click(function() {
    var $unslider = $('.unslider');
    var $sectionSlider = $('.sectionSlider');

    $unslider.toggleClass('isFixed');
    $sectionSlider.css('z-index', '15');
  });

  $('#gallery-close').click(function() {
    var $sectionSlider = $('.sectionSlider');

    $sectionSlider.css('z-index', '5');
  });
});