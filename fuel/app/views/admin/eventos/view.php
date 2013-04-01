<?php echo Html::anchor('admin/evento/adicionar', 'Adicionar', array('class' => 'btn btn-primary pull-right')) ?>
<?php if (isset($eventos)): ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>            
            <th>Descrição</th>
            <th>Remover</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($eventos as $evento): ?>     
        <tr>
            <td><?php echo $evento->id ?></td>
            <td><?php echo Html::anchor("admin/evento/editar/$evento->id", $evento->name); ?></td>     
            <td><?php echo $evento->description ?></td>       
            <td><?php echo Html::anchor("admin/evento/remover/$evento->id", 'x', array('class' => 'btn btn-danger')); ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<?php else: ?>

<p>Nenhum evento cadastrado.</p>

<?php endif; ?>