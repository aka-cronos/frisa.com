 
     
$(window).scroll(function () {
    if ($(".nav-bar").offset().top > 50) {
      document.getElementById("logotipoCambio").style.marginTop = "25px";
       document.getElementById("logotipoCambio").src = "images/logo-b.png";
      $(".nav-bar").addClass("navmin");
      $(".menuSuperior").addClass("navmin2");
        document.getElementById("menu-2").style.height = "40px";
        document.getElementById("menu-3").style.height = "40px";
         document.getElementById("menu-4").style.height = "40px";
        document.getElementById("menu-5").style.height = "40px";
         document.getElementById("menu-6").style.height = "40px";
       
        
         document.getElementById("menu-2-2").style.height = "36px";
        document.getElementById("menu-3-3").style.height = "36px";
        document.getElementById("menu-4-4").style.height = "36px";
        document.getElementById("menu-5-5").style.height = "36px";
        document.getElementById("menu-6-6").style.height = "36px";
    } else {
         document.getElementById("logotipoCambio").style.marginTop = "0px";
        document.getElementById("logotipoCambio").src = "images/logotipo.png";
        $(".nav-bar").removeClass("navmin");
        $(".menuSuperior").removeClass("navmin2");
       
        document.getElementById("menu-2").style.height = "58px";
        document.getElementById("menu-3").style.height = "58px";
        document.getElementById("menu-4").style.height = "58px";
        document.getElementById("menu-5").style.height = "58px";
        document.getElementById("menu-6").style.height = "58px";
        document.getElementById("menu-2-2").style.height = "54px";
        document.getElementById("menu-3-3").style.height = "54px";
        document.getElementById("menu-4-4").style.height = "54px";
        document.getElementById("menu-5-5").style.height = "54px";
        document.getElementById("menu-6-6").style.height = "54px";
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
