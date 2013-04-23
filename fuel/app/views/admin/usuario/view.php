<h3>Admins</h3>
<?php if (count($admins) > 0): ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>            
            <th>E-mail</th>
            <th>Ações</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($admins as $admin): ?>     
        <tr>
            <td><?php echo $admin->id ?></td>
            <td><?php echo Html::anchor("admin/usuario/editar/$admin->id", $admin->username); ?></td>     
            <td><?php echo $admin->email ?></td>       
            <td><?php echo Html::anchor("admin/usuario/degradar/$admin->id", '&or; degradar', array('class' => 'btn btn-primary')); ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<?php else: ?>

<p>Nenhum admin cadastrado.</p>

<?php endif; ?>

<h3>Gerais</h3>

<?php if (isset($usuarios)): ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>            
            <th>E-mail</th>
            <th>Ações</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>     
        <tr>
            <td><?php echo $usuario->id ?></td>
            <td><?php echo Html::anchor("admin/usuario/editar/$usuario->id", $usuario->username); ?></td>     
            <td><?php echo $usuario->email ?></td>       
            <td><?php echo Html::anchor("admin/usuario/promover/$usuario->id", '&and; promover', array('class' => 'btn btn-success')); ?> <?php echo Html::anchor("admin/usuario/remover/$usuario->id", 'x', array('class' => 'btn btn-danger')); ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<?php else: ?>

<p>Nenhum usuario cadastrado.</p>

<?php endif; ?>