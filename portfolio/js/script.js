// event on click link
$('.page-scroll').on('click', function(e){
    
    // get href value
    var target = $(this).attr('href');

    // catch element
    var elementTarget = $(target);

    // move scroll
    $('html,body').animate({
        scrollTop: elementTarget.offset().top - 50
    }, 1000, 'easeInOutExpo');

    // disable default event
    e.preventDefault();
    
});

// paralax effect

// about
$(window).on('load', function() {
    $('.pLeft').addClass('pShow');
    $('.pRight').addClass('pShow');
});

$(window).scroll(function(){
    var wScroll = $(this).scrollTop();

    // jumbotron 
    $('.jumbotron img').css({
        'transform' : 'translate(0px,' + wScroll/4 + '%)'
    });

    $('.jumbotron h1').css({
        'transform' : 'translate(0px,' + wScroll/2 + '%)'
    });

    $('.jumbotron p').css({
        'transform' : 'translate(0px,' + wScroll/1.2 + '%)'
    });

    // portfolio
    if( wScroll > $('.portfolio').offset().top - 250 ) {
        $('.portfolio .thumbnail').each(function(i) {
            setTimeout(function(){
                $('.portfolio .thumbnail').eq(i).addClass('show');
            }, 300 * i);
        });
    }

});