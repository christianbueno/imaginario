var facebook = (function(){
    var $anchor = null;

    var obj = {
            method: 'feed',
            display: 'dialog',
            link: '',
            picture: '',
            name: '',
            caption: '',
            description: ''
        };
    var share = function(e) {
            e.preventDefault();
            e.stopPropagation();

            $anchor = $(e.target);
            obj.access_token = $anchor.data('token');
            baseurl = window.location.protocol + "//" + window.location.host;
            obj.link = baseurl + window.location.pathname + '/' +  $anchor.data('day') + '/' +  $anchor.data('idevento');
            obj.picture = 'http://imaginario.etc.br/assets/img/logo.png';
            obj.name = $anchor.data('name');
            obj.caption = $anchor.data('caption');
            obj.description = $anchor.data('desc');

            FB.ui(obj, null);
        };

        return {
            share: share
        };
})(),
toolbar = (function(){
        var $box = $('#toolbar'),
            $opt_plus = $('#toolbar-menu-plus'),
            $opt_minus = $('#toolbar-menu-minus');

        var ZOOM_RANGE = 1;

    var plus_zoom = function(e) {
        e.preventDefault;
        
        current_zoom = map.getZoom();

        map.setZoom(current_zoom + ZOOM_RANGE);

        return false;
    },
    minus_zoom = function(e) {
        e.preventDefault;
        current_zoom = map.getZoom();

        map.setZoom(current_zoom - ZOOM_RANGE);

        return false;
    },
    binds = function (){
        $opt_plus.on( 'click' , plus_zoom );
        $opt_minus.on( 'click' , minus_zoom );
    },
    init = function() {
        binds();
    };

    return {
        init: init
    }
})(),
locator = (function(){

    var $box = $('#box-coletivos'),
        $items = $box.find('a');

    var locate = function(e) {
        e.preventDefault;
        $current = $(e.target);
        latlng = $current.data('latlng');
        lat = latlng.split(',')[0];
        lng = latlng.split(',')[1];

        
        
        if(map.getZoom() < 15)
            map.setZoom(15);

        map.panTo(new google.maps.LatLng(lat,lng));

        return false;
    },
    binds = function (){
        $items.on( 'click' , locate );
    },
    init = function() {
        binds();
    };

    return {
        init: init
    }

})(),
shadowbox = (function(){
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