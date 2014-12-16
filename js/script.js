// JavaScript Document

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


        /* BACK TO TOP STUFF ========================== */
    $(".back-to-top a").hide();
    function set_nav() {
      var scroll = $(window).scrollTop();
      
      if (scroll >= 50) {
        $(".back-to-top a").fadeIn(500);
      } else {
        $(".back-to-top a").fadeOut(500);
      }
    }
    set_nav();
    $(window).scroll(function() {    
      set_nav();
    });
    /* END BACK TO TOP STUFF ========================== */
    
    /* OFF CANVAS MENU STUFF ========================== */
    /*
    // make the menu and page height both the greater of the two.
    $(window).load(function(){
      var nav = $('.nav-strata-mobile #nav .block #menu-primary-menu');
      var nav_bottom = nav.height() + 50; // container's padding.
      var page_height = $('#inner-wrap').height();
      var viewport_height = $(window).height();
      
      var new_height = 0;
      // is nav or page bigger? 
      if (nav_bottom > new_height) new_height = nav_bottom;
      if (page_height >= new_height) new_height = page_height;
      if (viewport_height >= new_height) new_height = viewport_height;
      
      // add space for back-to-top
      var back_to_top_height = $('.back-to-top').height();
      new_height = new_height+back_to_top_height;
      
      // is viewport bigger?
      var new_nav_height = new_height - 50;
      console.log(new_height);
      nav.height(new_nav_height);
      $('#inner-wrap').height(new_height);
    });
    
    // get that back to top button working nicely
    $('.back-to-top a').click(function() {
      $('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
    });
      */
    /* END OFF CANVAS MENU STUFF ========================== */
    
	});

});