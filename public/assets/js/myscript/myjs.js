$(function(){
                 // grab the initial top offset of the navigation 
                var sticky_navigation_offset_top = $('#sticky_navigation').offset().top;
    
              // our function that decides weather the navigation bar should have "fixed" css position or not.
                var sticky_navigation = function(){
                    var scroll_top = $(window).scrollTop(); // our current vertical position from the top
        
                    // if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
                     if (scroll_top > sticky_navigation_offset_top) { 
                       $('#sticky_navigation').css({ 'position': 'fixed', 'top':0, 'left':0, 'right':0, 'z-index':100 });
                     } else {
                        $('#sticky_navigation').css({ 'position': 'relative', 'z-index':100 }); 
                         }   
                };
    
                    // run our function on load
                    sticky_navigation();
                    
                    // and run it again every time you scroll
                    $(window).scroll(function() {
                         sticky_navigation();
                    });

                    
                $('#main .img-responsive').lazyload({
                    effect: "fadeIn"
                  });
                $('#carousel-example-generic').carousel({
                  interval: 3000 //TIME IN MILLI SECONDS
                 });
                var options = {
                    url: "test.json",
                    getValue: function(element) {
                        return element.TEN_QUAN ;
                    },
                    // template: {
                    //     type : "description",
                    //     fields: {
                    //         description: "DIA_CHI"
                    //     }
                    // },
                    template: {
                        type: "custom",
                        method: function(value, item) {
                            return "<div>"+
                            "<div style = 'float:left'><img style = 'width: 50px; height: 40px' src = '" + item.ANH_DAI_DIEN + "'></div>" +
                            "<div>"+value + "<br>" + item.DIA_CHI + "</div>"+ 
                            "</div>";
                        }
                    },
                    list: {
                        match: {
                            enabled: true
                        },
                        maxNumberOfElements: 10,
                        showAnimation: {
                          type: "fade", //normal|slide|fade
                          time: 400,
                         callback: function() {}
                           },

                         hideAnimation: {
                          type: "slide", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                         },
                         sort: {
                             enabled: true
                           }
                    }
                };
                 var options1 = {
                    url: "test.json",
                    getValue: function(element) {
                        return element.DIA_CHI ;
                    },
                    // template: {
                    //     type : "description",
                    //     fields: {
                    //         description: "DIA_CHI"
                    //     }
                    // },
                    template: {
                        type: "custom",
                        method: function(value, item) {
                            return "<img style = 'width: 50px; height: 40px; float: left' src = '" + "  "+ item.ANH_DAI_DIEN +"'/> "+value+"<br>" +"  " +item.DIA_CHI; 
                        }
                    },
                    list: {
                        match: {
                            enabled: true
                        },
                        maxNumberOfElements: 10,
                        showAnimation: {
                          type: "fade", //normal|slide|fade
                          time: 400,
                         callback: function() {}
                           },

                         hideAnimation: {
                          type: "slide", //normal|slide|fade
                          time: 400,
                          callback: function() {}
                         },
                         sort: {
                             enabled: true
                           }
                    }
                };   
                // alert("huynam");
                $("#search").easyAutocomplete(options); 
                 // $("#search").easyAutocomplete(options1); 
            });