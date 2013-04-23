<a class="btn btn-danger" href="/users/logout/"><i class="icon-off icon-white"></i>Logout</a>
<h2>Informações</h2>


<?php if( count($coletivos) > 0 ) { ?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
<ul class="nav nav-tabs">
<li class="active"><a href="#tab1" data-toggle="tab">Meus coletivos</a></li>
<li><a href="#tab2" data-toggle="tab">Meu Imagina RIO</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab1">
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
<?php endforeach; ?>  
</div>
<?php } ?>
<?php if( count($coletivos) === 0 ) { ?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
<ul class="nav nav-tabs">
<li class="active"><a href="#tab2" data-toggle="tab">Meu Imagina RIO</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab1">


<h2>Meu Imagina.RIO</h2>

<h3>Imagens salvas</h3>

<ul id="coletivo-images">
<?php foreach ($images as $image):
    echo '<li>';
    echo Html::anchor('arquivos/'.$image->content, Html::img('arquivos/thumb-'.$image->content, array('class' => 'i-medium')));
    echo '</li>';
endforeach; ?> 
</ul>
</div>
</div>
<?php } ?>
