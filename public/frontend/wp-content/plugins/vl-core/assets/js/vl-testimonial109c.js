(function ($) {
     "use strict";
      /**
        * @param $scope The Widget wrapper element as a jQuery element
       * @param $ The jQuery alias
       */
 

 
     var WidgetVlTestimonial = function ($scope, $) { 

         var VlTestimonial = $scope.find('.testimonials-slider-area');
         var VlTestimonial4 = $scope.find('.testimonial4-slider-area');
         var VlTestimonial2 = $scope.find('.testimonial2-owl-carousel-area');
         var slidertestimonial = $scope.find('.slider-testimonial');
         var testimonialnav = $scope.find('.testimonial-nav');

         //testimonial slider
         testimonialnav.slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: slidertestimonial,
            dots: false,
            loop: true,
            centerMode: true,
            focusOnSelect: true,
            arrows: false,
        });
    
        slidertestimonial.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: $(".testimonial-prev-arrow"),
            nextArrow: $(".testimonial-next-arrow"),
            fade: true,
            loop: true,
            asNavFor: testimonialnav,
        });
            
         VlTestimonial2.owlCarousel({
            loop:true,
            margin:30,
            nav:false,
            dots:true,
            items:10,
            autoplay:true,
            smartSpeed:2000,
            autoplayTimeout:3000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:false,
                },
                600:{
                    items:2,
                },
                1000:{
                    items:1,
                }
            }
          });
         
         VlTestimonial4.owlCarousel({
            loop:true,
            margin:30,
            nav:true,
            dots:false,
            mouseDrag:true,
            items:10,
            autoplay:true,
            navText:["<i class='fa-solid fa-angle-left'></i>" , "<i class='fa-solid fa-angle-right'></i>"],
            smartSpeed:3000,
            autoplayTimeout:4000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                },
                600:{
                    items:2,
                },
                1000:{
                    items:3,
                }
            }
          });
         
          VlTestimonial.owlCarousel({
               loop:true,
               margin:30,
               nav:false,
               dots:true,
               items:10,
               autoplay:true,
               smartSpeed:3000,
               autoplayTimeout:4000,
               responsiveClass:true,
               responsive:{
                   0:{
                       items:1,
                       nav:false,
                   },
                   600:{
                       items:2,
                   },
                   1000:{
                       items:1,
                   }
               }
          });
          
          
     }
 
 
      // // Make sure you run this code under Elementor.
      $( window ).on( 'elementor/frontend/init', function() {
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-testimonial.default', WidgetVlTestimonial );
      } );
 
 
 
 }(jQuery));
 