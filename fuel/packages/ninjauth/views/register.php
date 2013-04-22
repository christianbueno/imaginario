<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Meu Imaginario</title>
    <?php echo Asset::css('jquery.Jcrop.min.css'); ?>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>


</head>
<body>
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2"></span>

        <div class="container">
         <?php if (Session::get_flash('success')): ?>
            <div class="alert-message success">
                <p>
                <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                </p>
            </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
            <div class="alert-message error">
                <p class="label label-important">                   
                    <?php echo implode('</p><p class="label label-important">', e((array) Session::get_flash('error'))); ?>                 
                </p>
            </div>
        <?php endif; ?>                
            <?php echo Form::open(null, array('id' => 'register')); ?>

	<?php if (isset($error)): ?>
		<span class="error"><?php echo $error; ?></span>
	<?php endif; ?>

	<p>
		<label for="username">Usuário</label>
		<?php echo Form::input('username', $user->username) ?>
	</p>
	<p>
		<label for="email">Email</label>
		<?php echo Form::input('email', $user->email) ?>
	</p>
	<p>
		<label for="password">Senha</label>
		<?php echo Form::password('password') ?>
	</p>
	<?php echo Form::submit('submit') ?>

<?php echo Form::close() ?>
        </div>


        <?php echo View::forge('modules/menu'); ?>
    </div>


</body></html>

