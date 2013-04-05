<h2>Crop para o carrossel</h2>
<?php echo Form::open(array('enctype' => 'multipart/form-data')); ?>

<fieldset>
  
    <div class="clearfix">
        
            
        <div class="input">   
            <?php echo Html::img("/arquivos/$conteudo->content", array('id' => 'cropme')); ?>
            <?php echo Form::hidden('coords', isset($conteudo->info['coords']) ? $conteudo->info['coords'] : ''); ?>
        </div>
    </div>
    
    <div class="actions">
        <?php echo Form::submit('submit', 'Salvar crop', array('class' => 'btn btn-primary')); ?>

    </div>
</fieldset>



<?php echo Form::close(); ?>

<script>    
    var start_cropper = true;
</script>