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

        /* STICKY SIDEBAR ========================== */


        var $sidebar = $('div.sidebar.sidebar-product');
        var sidebarOffset = $sidebar.offset();
        var sidebarTopInitial = sidebarOffset.top;
        var sidebarLeftInitial = sidebarOffset.left;

        $(window).scroll(function() {
            // only on the desktop...
            if ($(window).width() > 992) {
                var sidebarHeight = $sidebar.height();
                var $rowContainer = $sidebar.closest('.row');
                var rowContainerOffset = $rowContainer.offset();
                var rowContainerTop = rowContainerOffset.top;
                var rowContainerHeight = $rowContainer.height();
                var currentPos = $(window).scrollTop();
                var onPoint = rowContainerTop;
                var offPoint = rowContainerTop + rowContainerHeight - sidebarHeight;
                if (currentPos < onPoint) {
                    $sidebar.offset({left: sidebarLeftInitial, top: sidebarTopInitial });
                } else if ( currentPos > offPoint ) {
                    $sidebar.offset({left: sidebarLeftInitial, top: offPoint });
                } else {
                    $sidebar.offset({left: sidebarLeftInitial, top: currentPos });
                }
            }
        });
    
	});

});