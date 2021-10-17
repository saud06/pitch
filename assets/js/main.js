(function ($) {
	"use strict";

    jQuery(document).ready(function($){


        $(".embed-responsive iframe").addClass("embed-responsive-item");
        $(".carousel-inner .item:first-child").addClass("active");
        
        $('[data-toggle="tooltip"]').tooltip();

        
                $('#mobile-menu-active').meanmenu({
                    meanScreenWidth: "767",
                    meanMenuContainer: '.menu-prepent',
                 });



                $('.menu-open').click( function (){
                  
            $('.off-canvas-section').toggleClass('activee');  
            $('.menu-open').toggleClass('toggle');  
                  
        });

       
              
        $(".idea-blog-slide").owlCarousel({
            items:3,
            nav:true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dot:false,
            loop:true,
            margin:30,
            autoplay:false,
            autoplayTimeout:3000,
            smartSpeed:1000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                   
                },
                768:{
                    items:3,
                   
                },
                1000:{
                    items:3,
                   
                }
            }
            
          
        });
              
        $(".messge-sldier").owlCarousel({
            items:5,
            nav:true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dot:false,
            loop:true,
            margin:30,
            autoplay:false,
            autoplayTimeout:3000,
            smartSpeed:1000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                   
                },
                768:{
                    items:3,
                   
                },
                1000:{
                    items:4,
                   
                }
            }
        });


              
        $(".overview_slide").owlCarousel({
            items:3,
            nav:true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dot:true,
            loop:true,
            margin:30,
            autoplay:false,
            autoplayTimeout:3000,
            smartSpeed:1000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                   
                },
                768:{
                    items:2,
                   
                },
                1000:{
                    items:3,
                   
                }
            }
        });


        
        
        $('select').niceSelect();
        
        
        $(".video-play-btn").magnificPopup({
		  
		  type:'video'
	  })                 
       
        


    });


    jQuery(window).load(function(){


    });


}(jQuery));	