<?php echo Form::open(array('action' => 'admin/login')); ?>
<fieldset>
    <div class="clearfix">
        <?php echo Form::label('Login', 'login'); ?>

        <div class="input">
            <?php echo Form::input('login', '', array('class' => 'span4')); ?>
        </div>
    </div>
    <div class="clearfix">
        <?php echo Form::label('Senha', 'senha'); ?>

        <div class="input">
            <?php echo Form::password('senha', '', array('class' => 'span4')); ?>
        </div>
    </div>
    <div class="actions">
        <?php echo Form::submit('submit', 'Enviar', array('class' => 'btn btn-primary')); ?>

    </div>
</fieldset>
<?php 
    echo Form::close();
?>