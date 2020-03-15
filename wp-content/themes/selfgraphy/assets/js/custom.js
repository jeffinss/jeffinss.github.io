jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/
    
    var loader              = $('#loader');
    var loader_container    = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');
    var service_slider = $('#services .section-content');
    var partners_logo = $('.logo-slider');

/*------------------------------------------------
           PRELOADER
------------------------------------------------*/

   loader_container.delay(1000).fadeOut();
   loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    $('#sidr-left-top-button').sidr({
        name: 'sidr-left-top',
        timing: 'ease-in-out',
        speed: 500,
        side: 'right',
        source: '.left'
    });

    $('#primary-menu .menu-item-has-children > a > svg').click(function(event) {
        event.preventDefault();
        $(this).parent().find('.sub-menu').first().slideToggle();
    })

    menu_toggle.click(function() {
        $(this).toggleClass('active');
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#site-navigation').removeClass('menu-open');
            $('#primary-menu').slideUp();
            $('.menu-overlay').removeClass('active');
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('#masthead').addClass('nav-shrink');
        } 
        else {
            $('#masthead').removeClass('nav-shrink');
        }
    });

/*------------------------------------------------
            SKILLS
------------------------------------------------*/

$('.skill-innerbox').each( function() {
    var skill_value = $(this).attr( 'skill-value' );
    $(this).css({ 'width' : skill_value });
});

/*------------------------------------------------
            SLICK SLIDER
------------------------------------------------*/

service_slider.slick({
    responsive: [
        {
            breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
        {
            breakpoint: 567,
                settings: {
                slidesToShow: 1
            }
        }
    ]
});

partners_logo.slick({
    responsive: [
        {
        breakpoint: 1200,
            settings: {
                slidesToShow: 4
            }
        },
        {
        breakpoint: 1024,
            settings: {
                slidesToShow: 3
            }
        },
        {
        breakpoint: 767,
            settings: {
                slidesToShow: 2         
            }
        },
        {
        breakpoint: 567,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

/*------------------------------------------------
                PHOTO GALLERY
------------------------------------------------*/

    $('.grid').imagesLoaded( function() {
        $('.grid').isotope({
            itemSelector: '.grid-item'
        });
    });

    var $container = $('.grid');
                
    $('nav.portfolio-filter ul a').on('click', function() {
        var selector = $(this).attr('data-filter');
        $container.isotope({ filter: selector });
        $('nav.portfolio-filter ul li').removeClass('active');
        $(this).parent().addClass('active');
        return false;
    });

    isotope = function () {
        $container.isotope({
            resizable: true,
            itemSelector: '.grid-item',
            layoutMode : 'masonry',
            gutter: 0
        });
    };
    isotope();

/*------------------------------------------------
                MAGNIFIC POPUP
------------------------------------------------*/

    $('.gallery-popup').magnificPopup( {
        delegate:'.popup', type:'image', tLoading:'Loading image #%curr%...', 
        gallery: {
            enabled: true, navigateByImgClick: true, preload: [0, 1]
        }
        , image: {
            tError:'<a href="%url%">The image #%curr%</a> could not be loaded.', titleSrc:function(item) {
                return item.el.attr('title');
            }
        }
    });

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});