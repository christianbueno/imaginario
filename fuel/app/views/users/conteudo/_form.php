
<fieldset>
    <div class="clearfix">
        <?php echo Form::label('Nome', 'name'); ?>

        <div class="input">
            <?php echo Form::input('name', '', array('class' => 'span4')); ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Descrição', 'description'); ?>

        <div class="input">
            <?php echo Form::textarea('description', '', array('class' => 'span4')); ?>
        </div>
    </div>    

    <div class="clearfix">
        <?php echo Form::label('Tipo'); ?>

        <div id="toggler" class="input">
            <?php 
            
            echo Form::label('Imagem', 'tp_image');
            echo Form::radio('type', 'image', isset($conteudo) ? $conteudo->type === 'image' : true, array('id' => 'form_tp_image'));
            echo Form::label('Video', 'tp_video');
            echo Form::radio('type', 'video', isset($conteudo) ? $conteudo->type === 'video' : false, array('id' => 'form_tp_video'));
            ?>
        </div>
    </div> 
  
    <div id="image" class="clearfix types">
        <?php echo Form::label('Selecione a imagem'); ?>
        <div class="input">
            <?php echo Form::file('file_logo'); ?>                
        </div>
    </div>
    
    <div id="video" class="clearfix types hide">
        <?php echo Form::label('URL do video no youtube', 'content'); ?>

        <div class="input">
            <?php echo Form::input('content', isset($conteudo) && $conteudo->type === 'video' ? $conteudo->content : '', array('class' => 'span4')); ?>
        </div>
    </div>

    

    <div class="actions">
        <?php echo Form::submit('submit', 'Enviar', array('class' => 'btn btn-success')); ?>

    </div>
</fieldset>

<script>
var toggler = (function(){
    var $opt = $('#toggler').find('input'),
        $items = $('.types');

    var toggle = function(e) {
        $current = $(e.target);
        id = $current.val();
        $el = $(document.getElementById(id));
        
        $el.removeClass('hide').siblings('.types').addClass('hide');
    },
    binds = function (){                        
        $opt.on( 'change' , toggle );
        $opt.on( 'click' , toggle );
    },
    init = function() {
        binds();
        $opt.filter(':checked').trigger('click');
    };

    return {
        init: init
    }
})();

$(document).ready(toggler.init);


</script>