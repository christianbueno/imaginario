var shadowbox = (function(){
    var $items = $('.video'),
        $player = $('#player');

    var play = function(e) {
        e.preventDefault;
        $current = $(e.target);

        id = $current.data('videoid');
        conteudo_id = $current.data('conteudoid');
        
        var params = { allowScriptAccess: "always" };
        var atts = { id: "myytplayer" };
        swfobject.embedSWF("http://www.youtube.com/v/"+id+"?enablejsapi=1&playerapiid=ytplayer&version=3&autoplay=1","player", "425", "356", "8", null, null, params, atts);
    },
    binds = function (){
        $items.on( 'click' , play );
    },
    init = function() {
        binds();
    };

    return {
        init: init
    }
})(),
imaginar = (function(){
    var $toggler = $('.imaginar');

    var toggle = function(e) {
        $current = $(e.target);

        is_saved = $current.data('saved');
        conteudo_id = $current.data('conteudoid');

        
        $.get('/users/imagina/conteudo/'+conteudo_id)
            .done(function(data){
                $current.html(data.message);
            })
            .fail(function(e){
                data = $.parseJSON(e.responseText);
                if(data.message === 'unauthorized')
                    window.location.href = '/users/login/';
            });
    },
    binds = function (){
        $toggler.on( 'click' , toggle );
    },
    init = function() {
        binds();
    };

    return {
        init: init
    }
})(),
menu = (function(){

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
    var $holder = $('#holder'),
        $item = $holder.find('a');

    var timeout = null;

    var binds = function() {
        $item.hover( holdAndSlow , play );
    },
    play = function() {
        clearInterval(timeout);
        $holder.resume();             
    },
    holdAndSlow = function() {       
        $holder.pause(); 
        timeout = setInterval(left,80);
    },
    left = function() {
        if($holder.offset().left <= -4424)
            $holder.css('left', 0);

        $holder.css('left', '-=1px');
    },
    animate = function() {             
        $holder.animate({            
            left: -4424,
            }, 40000, 'linear', function() {
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
    imaginar.init();
    slider.init();

    if(typeof start_cropper !== 'undefined')
        cropper.init();
});