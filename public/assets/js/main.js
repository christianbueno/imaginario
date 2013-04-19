var menu = (function(){

    var $handle = $('#handle'),
        $holder = $('#expmenu');

    var toggle = function() {

        if($holder.is('.open')) {
            $handle.html('<img src="/assets/img/abre.png" width="8" height="74"/>');
            $holder.removeClass('open');
        }
        else {
            $handle.html('<img src="/assets/img/fecha.png" width="8" height="84"/>');
            $holder.addClass('open');
        }
    },
    binds = function (){
        $handle.on( 'click' , toggle );
    },
    init = function() {
        binds();
    };

    return {
        init: init
    }

})(),
cropper = (function(){
    
    var $image = $('#cropme'),
        $coords = $('#form_coords');

    set = function(c) {
        $coords.val(c.x + ' ' + c.y + ' ' + c.x2 + ' ' + c.y2);           
        if($coords.val() === '0 0 0 0')
            $coords.val('0 0 200 200');        
    },
    init = function() {
        $image.Jcrop({
            setSelect: $coords.val() !== '' ? $coords.val().split(' ') : '0 0 200 200',
            onSelect: set,
            minSize: [200, 200]            
        });
    };


    return {
        init: init
    }
})(),
supports = (function() {  
   var div = document.createElement('div'),  
      vendors = 'Khtml Ms O Moz Webkit Blink'.split(' '),  
      len = vendors.length;  
  
   return function(prop) {  
      if ( prop in div.style ) return true;  
  
      prop = prop.replace(/^[a-z]/, function(val) {  
         return val.toUpperCase();  
      });  
  
      while(len--) {  
         if ( vendors[len] + prop in div.style ) {  
            return true;  
         }   
      }  
      return false;  
   };  
})(); 
slider =  (function(){
    var $holder = $('#holder');
    var $holderItem = $('.slider a');
    var binds = function() {
        $holderItem.hover(function() {
            //$holder.pause();
            
        $holder.pause();                 
        $holder.animate({            
            left: -2216,
            easing: 'linear'
            }, 100000, 'linear', function() {
                $holder.css('left', 0);
                animate();
            }
        );   

            
            
        }, function() {
           // $holder.resume();
            $holder.animate({            
            left: -2216,
            easing: 'linear'
            }, 80000, 'linear', function() {
                $holder.css('left', 0);
                animate();
            }
        ); 
        });
    },
    animate = function() {             
        $holder.animate({            
            left: -2216,
            easing: 'linear'
            }, 30000, 'linear', function() {
                $holder.css('left', 0);
                animate();
            }
        );   
    },
    init = function() {
        $.getScript('/assets/js/jquery.pause.min.js').done(function(){
            binds();
            animate();
        });        
    };
    
    return {
        init: init
    }
})();
$(document).ready(function(){
    menu.init();
    
        slider.init();

    if(typeof start_cropper !== 'undefined')
        cropper.init();
});