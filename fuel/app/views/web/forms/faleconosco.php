<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Fale conosco</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <?php echo Asset::js('analytics.js'); ?>
</head>
<body class="fale-conosco">
    <div id="vignette" class="container-fluid">     

        <a href="http://imaginario.etc.br" id="logo" class="offset2"></a>

        <div class="texto-wrapper">
        <h1>Fale conosco</h1>
        
        <p>O IMAGINA RIO é feito de você, da sua participação e do seu envolvimento, e é por isso que o IMAGINA RIO busca meios de você fazer parte do nosso grande mesclado, seja você o representante de um <strong>coletivo</strong> ou <strong>escola</strong>, um <strong>artista</strong>, ou simplesmente uma pessoa interessada em cultura e integração.</p>
	        <div class="row">
		        <a href="/artistas">
			        <div class="span3 fcBlock">
			        	<img src="/assets/img/coletivosfc.png" alt="coletivosfc" width="180" height="180">
				        <span class="fcButton">Coletivos/Artistas</span>
			        </div>
		        </a>
		       <a href="/escolas">
			       <div class="span3 fcBlock">
			        	<img src="/assets/img/escolasfc.png" alt="escolasfc" width="180" height="180">
			        	<span class="fcButton">Escolas</span>		        
			        </div>
		        </a>
		        <a href="/individual">
			        <div class="span3 fcBlock">
			        	<img src="/assets/img/individuofc.png" alt="individuofc" width="180" height="180">
				        <span class="fcButton">Indivíduos</span>
			        </div>
		        </a>
	        </div>
        </div>

        <?php echo render('modules/menu'); ?>
    <footer class="copyFooter">
    	<a href="/copyright">Copyright</a> | <a href="/politicas-de-privacidade">Política de Privacidade</a> | <a href="/anti-spam">Anti-Spam</a><br/>
    	&copy; Imagina: Rio 2013 - Todos os direitos reservados. | Rua Humaitá, 58 - Casa 2 - Humaitá<br/>
    	Rio de Janeiro, RJ Brasil 22261-001 | <a href="mailto:contato@imaginario.etc.br">contato@imaginario.etc.br</a><br/>
    	<a href="http://www.babelteam.com/pt">Babel-Team – Marketing & Vendas Automatizadas</a>
    </footer>
    </div>
<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>