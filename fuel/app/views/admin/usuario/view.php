<?php echo Html::anchor('admin/usuario/adicionar', 'Adicionar', array('class' => 'btn btn-primary pull-right')) ?>
<?php if (isset($usuarios)): ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>            
            <th>E-mail</th>
            <th>Remover</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>     
        <tr>
            <td><?php echo $usuario->id ?></td>
            <td><?php echo Html::anchor("admin/coletivo/editar/$usuario->id", $usuario->username); ?></td>     
            <td><?php echo $usuario->email ?></td>       
            <td><?php echo Html::anchor("admin/coletivo/remover/$usuario->id", 'x', array('class' => 'btn btn-danger')); ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<?php else: ?>

<p>Nenhum usuario cadastrado.</p>

<?php endif; ?>