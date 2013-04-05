var menu = (function(){

    var $handle = $('#handle'),
        $holder = $('#expmenu')


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
})();

$(document).ready(function(){
    menu.init();

    if(typeof start_cropper !== 'undefined')
        cropper.init();
});