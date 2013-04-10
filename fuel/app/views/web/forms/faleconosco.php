<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>

</head>
<body class="fale-conosco">
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2 branco"></span>

        <div class="texto-wrapper">
        <h1>Fale conosco</h1>
        
        <p>A IMAGINA RIO é feita de você, da sua participação e do seu envolvimento, e é por isso que a IMAGINA RIO busca meios de você fazer parte do nosso grande mesclado, seja você o representante de um <strong>coletivo</strong> ou <strong>escola</strong>, um <strong>artista</strong>, ou simplesmente uma pessoa interessada em cultura e integração.</p>
	        <div class="row">
		        <div class="span3 fcBlock">
		        	<img src="/assets/img/coletivosfc.png" alt="coletivosfc" width="180" height="180">
			        <span class="fcButton">Coletivos/Artistas</span>
		        </div>
		        <div class="span3 fcBlock">
		        	<img src="/assets/img/escolasfc.png" alt="escolasfc" width="180" height="180">
		        	<span class="fcButton">Escolas</span>		        
		        </div>
		        <div class="span3 fcBlock">
		        	<img src="/assets/img/individuofc.png" alt="individuofc" width="180" height="180">
			        <span class="fcButton">Indivíduos</span>
		        </div>
	        </div>
        </div>

        <?php echo render('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>