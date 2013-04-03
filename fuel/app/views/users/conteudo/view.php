<h2>Adicionar conteudo</h2>
<?php echo Form::open(array('enctype' => 'multipart/form-data')); ?>

<?php echo render('users/conteudo/_form'); ?>

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