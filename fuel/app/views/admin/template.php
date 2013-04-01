<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }

		.mapa-coletivo {
		    
		    height: 500px;
		    left: 405px;
		    position: absolute;
		    top: -390px;
		    width: 500px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			
			<h1>Admin <?php if( Session::get('logado') ) echo Html::anchor('/admin/logout', 'Logout', array('class' => 'pull-right'))?></h1>

			<hr>

			
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
			<?php endif;

			

			if( Session::get('logado') ) 
			{	
				echo View::forge('admin/menu');
				echo "<h2>$title</h2>";
				echo $content;			
			}
			else { 
				echo View::forge('admin/login');
		}

	?>
			
		</div>
		<footer>			
			<p>Feito com<br />
				<a href="http://fuelphp.com">FuelPHP</a><br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>			
		</footer>
	</div>
</body>
</html>
