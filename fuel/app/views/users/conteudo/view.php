<h2>Enviar conteudo</h2>
<?php echo Form::open(array('enctype' => 'multipart/form-data')); ?>

<?php 
    $data = null;
    if(isset($conteudo))
        $data['conteudo'] = $conteudo;
    echo View::forge('users/conteudo/_form', $data); 
?>

<?php echo Form::close(); ?>

<?php if ( count($conteudos) > 0 ): ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imagem</th>   
            <th>Nome</th>         
            <th>Descrição</th>            
            <th>Ações</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conteudos as $conteudo): ?>     
        <tr>
            <td><?php echo $conteudo->id ?></td>
            <td><?php echo Html::img("/arquivos/thumb-$conteudo->content", array('alt' =>$conteudo->info['name'])); ?></td>     
            <td><?php echo $conteudo->info['name'] ?></td> 
            <td><?php echo $conteudo->info['description'] ?></td>                 
            <td><?php 
                if($conteudo->type === 'image')
                    echo Html::anchor("users/conteudo/crop/$conteudo->coletivo_id/$conteudo->id", 'cropar', array('class' => 'btn btn-primary')); 
                
                echo Html::anchor("users/conteudo/remover/$conteudo->coletivo_id/$conteudo->id", 'x', array('class' => 'btn btn-danger')); 
            ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<?php else: ?>

<p>Nenhum conteudo cadastrado.</p>

<?php endif; ?>