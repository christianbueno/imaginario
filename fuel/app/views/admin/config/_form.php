<h3>Carrossel</h3>


    <fieldset>
    <div class="clearfix">
        <?php echo Form::label('Ordem', 'order'); ?>

        <div class="input">
            <?php 
                echo Form::select('order', $order , array(
                    'newest' => 'Cronologica',
                    'random' => 'Aleatoria'
                ));
             ?>
        </div>
    </div>
    <div class="actions">
        <?php echo Form::submit('submit', 'Salvar', array('class' => 'btn btn-primary')); ?>
    </div>
</fieldset>