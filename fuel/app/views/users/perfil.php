<h2>Informações</h2>

## edição de informações pessoais

<?php if( count($coletivos) > 0 ) { ?>
<h2>Meus coletivos</h2>

    <?php foreach ($coletivos as $coletivo): ?>    
    <h3><?php echo $coletivo->name; ?></h3>
    <?php echo Html::anchor("users/conteudo/adicionar/$coletivo->id", 'Enviar conteúdo', array('class' => 'btn btn-default')); ?>
    <?php echo Html::anchor("users/evento/adicionar/$coletivo->id", 'Criar evento', array('class' => 'btn btn-default')); ?>
    <h4>Informações</h4>    
    <?php 
    $data['coletivo'] = $coletivo;
    echo Form::open(array('action' => "users/salvarcoletivo/$coletivo->id", 'enctype' => 'multipart/form-data')); 
    echo View::forge('admin/coletivo/_form',$data);
    echo Form::close();
    ?>



    <h4>Eventos</h4>
    <?php endforeach; ?>  



<?php } ?>

<h2>Meu Imagina.RIO</h2>

## a lista de conteudos marcados como relevantes por esse usuário