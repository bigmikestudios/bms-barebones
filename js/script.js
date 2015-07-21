// JavaScript Document

// preload plugin
jQuery.fn.preload = function() {
    this.each(function(){
        jQuery('<img/>')[0].src = this;
    });
}

jQuery(function ($) {	
	$(document).ready(function() {

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

        /* ANIMATE IN ON SCROLL ========================== */
        $(window).scroll(function() {
            $('.on-scroll').each(function(){
                var lag = 200;
                var imagePos = $(this).offset().top;
                var topOfWindow = $(window).scrollTop();
                var heightOfWindow = $(window).height();
                var startScrollPoint = topOfWindow + heightOfWindow;
                var transition = "fadeIn";

                // which transition?
                var classList =$(this).attr('class').split(/\s+/);
                $.each( classList, function(index, item){
                    if (item.match("^os-")) {
                        transition = item.slice(3);
                    }
                });
                function scrollInClass(element){
                    console.log(element);
                    if (!element.hasClass('animated')) {
                        element.addClass("animated");
                        element.addClass(transition);
                    }
                }
                if (!$(this).hasClass('animated')) {
                    if (imagePos < startScrollPoint) {
                    setTimeout(scrollInClass, 200, $(this) )
                   }
                }
            });
        });
    
	});

});