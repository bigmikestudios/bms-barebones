// JavaScript Document

// preload plugin
jQuery.fn.preload = function() {
    this.each(function(){
        jQuery('<img/>')[0].src = this;
    });
}

jQuery(function ($) {	
	$(document).ready(function() {

        /* SWIPEBOX ========================== */
        $( '.swipebox' ).swipebox();

        /* MARKA ICON ========================== */
        var m = new Marka('#open_close');
        m.set('bars').color('#000000').size(40);

        /* MMENU STUFF ========================== */
        $("#mmenu")
            .mmenu({ classNames: { selected: "current-menu-item" } } )
            .on("opening.mm", function() { mmenu_opening();  } )
            .on("opened.mm", function() { mmenu_opened();  } )
            .on("closing.mm", function() { mmenu_closing();  } )
            .on("closed.mm", function() { mmenu_closed();  } );

        function mmenu_opening() {
            var top = $('body').scrollTop();
            $('.mobile-navbar').css('top',top+'px');
        }
        function mmenu_opened() {
            m.set('times');
        }

        function mmenu_closing() {
            // $('.mobile-navbar').css('top',0);
        }
        function mmenu_closed() {
            m.set('bars');
            $('.mobile-navbar').css('top',0);
        }

        /* SCROLL TO TOP BUTTON ========================== */

        function debounce(func, wait, immediate) {
            var timeout;
            return function() {
                var context = this, args = arguments;
                var later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        };

        var checkFixNav = debounce(function(){
            if ($(window).scrollTop() > 500) {
                $('body').addClass("scroll-started");
            } else {
                $('body').removeClass("scroll-started");
            }
        }, 250);

        window.addEventListener('scroll', checkFixNav);

        /* ANIMATE TO NAMED ANCHORS ========================== */

        $("a[href^='#']").click(function(e){
            e.preventDefault(); //used to prevent default actions

            var _href = $(this).attr('href').substring(1);

            var _this = $("[name='"+_href+"']").get(0);
            _this = $(_this);

            $('body, html').animate({
                scrollTop: _this.offset().top
            }, 250) // how ever fast you want it to scroll.

        });
    
	});

});