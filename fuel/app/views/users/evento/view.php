<h2>Adicionar evento</h2>
<?php echo Form::open(array('enctype' => 'multipart/form-data')); ?>

<?php echo render('users/evento/_form'); ?>

<?php echo Form::close(); ?>

<?php if ( count($eventos) > 0 ): ?>
<h2>Eventos</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>   
            <th>Descrição</th>         
            <th>Quando</th>
            <th>Onde</th>
            <th>Remover</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($eventos as $evento): ?>     
        <tr>
            <td><?php echo $evento->id ?></td>
            <td><?php echo $evento->title; ?></td>     
            <td><?php echo $evento->description ?></td> 
            <td><?php echo Date::forge($evento->when)->format("%d/%m/%Y"); ?></td>
            <td><?php echo $evento->info['address'] ?></td>       
            <td><?php echo Html::anchor("users/evento/remover/$evento->coletivo_id/$evento->id", 'x', array('class' => 'btn btn-danger')); ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<?php else: ?>

<p>Nenhum evento cadastrado.</p>

<?php endif; ?>