<?php echo Html::anchor('admin/coletivo/adicionar', 'Adicionar', array('class' => 'btn btn-primary pull-right')) ?>
<?php if (isset($coletivos)): ?>
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
        <?php foreach ($coletivos as $coletivo): ?>     
        <tr>
            <td><?php echo $coletivo->id ?></td>
            <td><?php echo Html::anchor("admin/coletivo/editar/$coletivo->id", $coletivo->name); ?></td>     
            <td><?php echo $coletivo->description ?></td>       
            <td><?php echo Html::anchor("admin/coletivo/remover/$coletivo->id", 'x', array('class' => 'btn btn-danger')); ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<?php else: ?>

<p>Nenhum coletivo cadastrado.</p>

<?php endif; ?>