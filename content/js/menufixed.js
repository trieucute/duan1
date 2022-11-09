$(document).ready(function(){
    $(window).scroll(function(){
        if($(window).scrollTop() - $("#header_sections").position().top < 0){
            $('#container-fluid').css({'position':'relative'});
        }else{
            $('#container-fluid').css({'position':'fixed'});
        }
    });
});

$(document).ready(function(){
    $('.navbar-nav nar-link').click(function(){
         $('.navbar-nav nar-link.active').removeClass('active').addClass('ac-tive');
         $(this).addClass('active').removeClass('ac-tive');
     });
});