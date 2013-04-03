<fieldset>
    <div class="clearfix">
        <?php echo Form::label('Nome', 'name'); ?>

        <div class="input">
            <?php echo Form::input('name', isset($conteudo) ? $conteudo->name : '', array('class' => 'span4')); ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Descrição', 'description'); ?>

        <div class="input">
            <?php echo Form::textarea('description', isset($conteudo) ? $conteudo->description : '', array('class' => 'span4')); ?>
        </div>
    </div>    
  
    <div class="clearfix">
        <?php echo Form::label('Imagem', 'image'); ?>
            
            
        <div class="input">
            <?php echo Form::file('file_logo'); ?>                
        </div>
    </div>
    
    

    

    <div class="actions">
        <?php echo Form::submit('submit', 'Adicionar imagem', array('class' => 'btn btn-primary')); ?>

    </div>
</fieldset>