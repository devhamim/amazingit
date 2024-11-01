(function ($) {
     "use strict";
      /**
        * @param $scope The Widget wrapper element as a jQuery element
       * @param $ The jQuery alias
       */
 

 
     var WidgetlogCarousel = function ($scope, $) { 

          var sliderallboxarea = $scope.find('.slider-all-boxarea');
          var sliderallboxarea2 = $scope.find('.slider-all-boxarea2');

          sliderallboxarea.slick({
               autoplay: true,
               autoplaySpeed: 0,
               speed: 5000,
               arrows: false,
               swipe: false,
               slidesToShow: 3,
               cssEase: 'linear',
               pauseOnFocus: true,
               pauseOnHover: true,
               responsive: [
                 {
                   breakpoint: 1400,
                   settings: {
                   slidesToShow: 3,
                   slidesToScroll: 1,
                   infinite: true,
                   }
                   },
               {
                 breakpoint: 1024,
                 settings: {
                 slidesToShow: 1,
                 slidesToScroll: 1,
                 infinite: true,
                 }
                 },
         
                 {
                   breakpoint: 600,
                   settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1,
                 }
                 },
         
                 {
                   breakpoint: 480,
                   settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1
                 }
                 },
         
                 {
                   breakpoint: 375,
                   settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1
                 }
                 },
         
                 {
                   breakpoint: 320,
                   settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1
                 }
                 },
               ]
          });
          

          sliderallboxarea2.slick({
               autoplay: true,
               autoplaySpeed: 0,
               speed: 8000,
               arrows: false,
               swipe: false,
               slidesToShow: 3,
               cssEase: 'linear',
               pauseOnFocus: true,
               pauseOnHover: true,
               responsive: [
                 {
                   breakpoint: 1400,
                   settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1,
                   infinite: true,
                   }
                   },
               {
                 breakpoint: 1024,
                 settings: {
                 slidesToShow: 1,
                 slidesToScroll: 1,
                 infinite: true,
                 }
                 },
         
                 {
                   breakpoint: 600,
                   settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1,
                 }
                 },
         
                 {
                   breakpoint: 480,
                   settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1
                 }
                 },
         
                 {
                   breakpoint: 375,
                   settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1
                 }
                 },
         
                 {
                   breakpoint: 320,
                   settings: {
                   slidesToShow: 1,
                   slidesToScroll: 1
                 }
                 },
               ]
             });
          
          
      }
 
 
      
      // // Make sure you run this code under Elementor.
      $( window ).on( 'elementor/frontend/init', function() {
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-logo-carousel.default', WidgetlogCarousel );
      } );
 
 
 
 }(jQuery));
 