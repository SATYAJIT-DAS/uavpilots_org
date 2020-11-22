ScrollReveal().reveal('.slider');
ScrollReveal().reveal('.card-boxs');
ScrollReveal().reveal('.offer', { delay: 250,easing: 'cubic-bezier(.05,.8,.85,.07)'});


$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });
});
