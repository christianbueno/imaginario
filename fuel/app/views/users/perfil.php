<a class="btn btn-danger" href="/users/logout/"><i class="icon-off icon-white"></i> Logout</a>
<h2>Informações</h2>


<?php if( count($coletivos) > 0 ) { ?>
<h2>Meus coletivos</h2>

<ul class="nav nav-list">
<?php foreach ($coletivos as $coletivo): ?>
    <li><a href="#<?php echo $coletivo->id; ?>"><i class="icon-globe"></i> <?php echo $coletivo->name; ?></a></li>
<?php endforeach; ?>
</ul>

<?php foreach ($coletivos as $coletivo): ?>
    <div id="<?php echo $coletivo->id; ?>" class="editorCole">    
        <h3><?php echo $coletivo->name; ?></h3>
        <?php echo Html::anchor("users/conteudo/adicionar/$coletivo->id", '<i class="icon-file"></i> Enviar conteúdo', array('class' => 'btn btn-default')); ?>
        <?php echo Html::anchor("users/evento/adicionar/$coletivo->id", '<i class="icon-calendar"></i> Criar evento', array('class' => 'btn btn-default')); ?>
        <h4>Informações</h4>    
        <?php 
        $data['coletivo'] = $coletivo;
        echo Form::open(array('action' => "users/salvarcoletivo/$coletivo->id", 'enctype' => 'multipart/form-data')); 
        echo View::forge('admin/coletivo/_form',$data);
        echo Form::close();
        ?>
    </div>
<?php endforeach; ?>  



<?php } ?>

<h2>Meu Imagina.RIO</h2>

<h3>Imagens salvas</h3>

<ul id="coletivo-images">
<?php foreach ($images as $image):
    echo '<li>';
    echo Html::anchor('arquivos/'.$image->content, Html::img('arquivos/thumb-'.$image->content, array('class' => 'i-medium')));
    echo '</li>';
endforeach; ?> 
</ul>
