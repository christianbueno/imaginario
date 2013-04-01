<h2>Adicionar conteudo</h2>
<?php echo Form::open(array('enctype' => 'multipart/form-data')); ?>
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

<?php echo Form::close(); ?>

<?php if ( count($conteudos) > 0 ): ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imagem</th>   
            <th>Nome</th>         
            <th>Descrição</th>
            <th>Remover</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conteudos as $conteudo): ?>     
        <tr>
            <td><?php echo $conteudo->id ?></td>
            <td><?php echo Html::img("/arquivos/$conteudo->content", array('alt' =>$conteudo->info['name'])); ?></td>     
            <td><?php echo $conteudo->info['name'] ?></td> 
            <td><?php echo $conteudo->info['description'] ?></td>       
            <td><?php echo Html::anchor("users/conteudo/remover/$conteudo->coletivo_id/$conteudo->id", 'x', array('class' => 'btn btn-danger')); ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<?php else: ?>

<p>Nenhum conteudo cadastrado.</p>

<?php endif; ?>