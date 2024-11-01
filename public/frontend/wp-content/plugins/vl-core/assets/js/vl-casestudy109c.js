(function ($) {
     "use strict";
      /**
        * @param $scope The Widget wrapper element as a jQuery element
       * @param $ The jQuery alias
       */
 

 
     var WidgetVlCasestudy = function ($scope, $) { 

          var CShoverActive = $scope.find('.cs_hover_active');
          var imageContentClass = $scope.find('.images-content-area');
          var CasestudySliderArea = $scope.find('.case-study-sliderarea');

          
          CasestudySliderArea.owlCarousel({
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
                       items:2,
                   }
               }
             });

             var SolutionSlider = $scope.find('.solution-slider-area');

             SolutionSlider.owlCarousel({
                  loop:true,
                  margin:30,
                  nav:false,
                  dots:true,
                  center: true,
                  autoplay:false,
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
                          items:3,
                      }
                  }
                });

          

          CShoverActive.hover(function () {
               $(this).addClass('active').siblings().removeClass('active');
          });
          imageContentClass.hover(function () {
               $(this).addClass('active').siblings().removeClass('active');
          });
          
          
      }
 
 
      
      // // Make sure you run this code under Elementor.
      $( window ).on( 'elementor/frontend/init', function() {
           elementorFrontend.hooks.addAction( 'frontend/element_ready/vl-casestudy.default', WidgetVlCasestudy );
      } );
 
 
 
 }(jQuery));
 