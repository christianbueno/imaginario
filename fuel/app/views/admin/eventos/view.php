<?php if ( count($eventos) > 0 ): ?>
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
            <td><?php echo Html::anchor("admin/evento/remover/$evento->id", 'x', array('class' => 'btn btn-danger')); ?></td>
        </tr>
        <?php endforeach; ?>    
    </tbody>
</table>

<?php else: ?>

<p>Nenhum evento cadastrado.</p>

<?php endif; ?>