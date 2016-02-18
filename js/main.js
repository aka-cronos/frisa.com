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
    nav: true,
    arrows: {
      prev: '<a class="unslider-arrow prev"><img src="/img/arrow-left.png" alt="" /></a>',
      next: '<a class="unslider-arrow next"><img src="/img/arrow-right.png" alt="" /></a>'
    }
  });
  $('.detail').click(function () {
    var $currentElement = $(this);
    
    if ($currentElement.hasClass('is-open')) {
      $currentElement.removeClass('is-open');
    } else {
      $('.detail').removeClass('is-open');
      $currentElement.addClass('is-open');
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