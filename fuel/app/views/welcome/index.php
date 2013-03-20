<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Imagina.RIO</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('main.css'); ?>

</head>
<body>
	<div id="vignette" class="container-fluid">		
			<h1 id="logo">Imagina.RIO</h1>
			<div id="slider" class="row">
				<div id="holder">
					<a href="" title="Balletto"><?php echo Html::img('img/slider1.png'); ?></a>
					<a href="" title="Tigre"><?php echo Html::img('img/slider2.png'); ?></a>
					<a href="" title="Balletto"><?php echo Html::img('img/slider1.png'); ?></a>
				</div>
			</div>
			<div class="container">
				<?php echo Html::img('img/logo-parceiros.png'); ?>" />
			</div>
			<div id="expmenu">
				<div class="heading">
					Abrir Menu
				</div>
				<div class="content display">
					Conteudo
				</div>
			</div>
	</div>

	<!--div class="container">
		<div class="hero-unit">
			<h1>Welcome!</h1>
			<p>You have successfully installed the FuelPHP Framework.</p>
			<p><a class="btn btn-primary btn-large" href="http://docs.fuelphp.com">Read the Docs</a></p>
		</div>
		<div class="row">
			<div class="span4">
				<h2>Get Started</h2>
				<p>The controller generating this page is found at <code>APPPATH/classes/controller/welcome.php</code>.</p>
				<p>This view can be found at <code>APPPATH/views/welcome/index.php</code>.</p>
				<p>You can modify these files to get your application started quickly.</p>
			</div>
			<div class="span4">
				<h2>Learn</h2>
				<p>The best way to learn FuelPHP is reading through the <a href="http://docs.fuelphp.com">Documentation</a>.</p>
				<p>Another good resource is the <a href="http://fuelphp.com/forums">Forums</a>.  They are fairly active, and you can usually get a response quickly.</p>
			</div>
			<div class="span4">
				<h2>Contribute</h2>
				<p>FuelPHP wouldn't exist without awesome contributions from the community.  Use the links below to get contributing.</p>
				<ul>
					<li><a href="http://docs.fuelphp.com/general/coding_standards.html">Coding Standards</a></li>
					<li><a href="http://github.com/fuel/fuel">GitHub Respository</a></li>
					<li><a href="http://fuelphp.com/contribute/issue-tracker">Issue Tracker</a></li>
				</ul>
			</div>
		</div>
		<hr/>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo Fuel::VERSION; ?></small>
			</p>
		</footer>
	</div-->
</body>
</html>
