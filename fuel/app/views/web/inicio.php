<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Imagina.RIO</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('main.css'); ?>
	
</head>
<body>
	<div id="vignette" class="container-fluid">		
	<div class="linguas">
	<img src="assets/img/flag-02.png" alt="flag-02" width="32" height="32" />
<img src="assets/img/flag-11.png" alt="flag-11" width="32" height="32" />
<img src="assets/img/flag-12.png" alt="flag-12" width="32" height="32" />
	</div>
			<a href="http://imaginario.etc.br" id="logo" class="offset2"></a>
			<div id="socialmedia">
				<a href="http://www.facebook.com/pages/ImaginaRio/210683839051269" target="_blank"><img src="assets/img/facebook_32.png" alt="facebook_32" width="32" height="32" /></a>
				<img src="assets/img/google_32.png" alt="google_32" width="32" height="32" />
				<img src="assets/img/twitter_32.png" alt="twitter_32" width="32" height="32" />
				<img src="assets/img/vimeo_32.png" alt="vimeo_32" width="32" height="32" />
			</div>	
			
			<div id="kaled" class="row">
				<div id="holder">
					<div class="slider">
						<?php $renderSlider(array_slice($images, 0, 20, true)); ?>
					</div>
					<div class="slider">
						<?php $renderSlider(array_slice($images, 20, 20, true)); ?>
					</div>
					<div class="slider">
						<?php $renderSlider(array_slice($images, 40, 20, true)); ?>
					</div>
					<div class="slider">
						<?php $renderSlider(array_slice($images, 60, 20, true)); ?>
					</div>				
					<div class="slider">
						<?php $renderSlider(array_slice($images, 0, 20, true)); ?>
					</div>
					<div class="slider">
						<?php $renderSlider(array_slice($images, 20, 20, true)); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="parceiros">
				<a href="/apoio" alt="Nossos Parceiros"><img src="assets/img/logo-parceiros.png" width="938" height="196"/></a>
				</div>
				<div class="span2 pull-right">


				</div>
			</div>

			<?php echo View::forge('modules/menu'); ?>
	</div>

<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>