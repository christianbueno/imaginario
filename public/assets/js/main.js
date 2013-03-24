var menu = (function(){

    var $handle = $('#handle'),
        $holder = $('#expmenu')


    var toggle = function() {

        if($holder.is('.open')) {
            $handle.html('<img src="http://christianbueno.com/imaginario/index_files/abre.png" width="8" height="74"/>');
            $holder.removeClass('open');
        }
        else {
            $handle.html('<img src="http://christianbueno.com/imaginario/index_files/fecha.png" width="8" height="84"/>');
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

})();

$(document).ready(menu.init);