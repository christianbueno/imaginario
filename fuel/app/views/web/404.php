<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Imagina.RIO</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('main.css'); ?>
	<?php echo Asset::js('analytics.js'); ?>
</head>
<body>
	<div id="vignette" class="container-fluid">		
		
		<a href="http://imaginario.etc.br" id="logo" class="offset2"></a>

		<div class="container notfound">
			<h1>Ops, página não encontrada :(</h1>
			<p>Não encontramos o que você procurava, pode se tratar de algum link quebrado ou alguma coisa que não está no ar ainda. Você pode clicar em voltar no navegador para tentar de novo ou clicar <a href="/">aqui</a> para retornar ao inicio.</p>
		</div>


			<?php echo View::forge('modules/menu'); ?>
	</div>
    <footer class="copyFooter">
    	<a href="/copyright">Copyright</a> | <a href="/politicas-de-privacidade">Política de Privacidade</a> | <a href="/anti-spam">Anti-Spam</a><br/>
    	&copy; Imagina: Rio 2013 - Todos os direitos reservados. | Rua Humaitá, 58 - Casa 2 - Humaitá<br/>
    	Rio de Janeiro, RJ Brasil 22261-001 | <a href="mailto:contato@imaginario.etc.br">contato@imaginario.etc.br</a><br/>
    	<a href="http://www.babelteam.com/pt">Babel-Team – Marketing & Vendas Automatizadas</a>
    </footer>


<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>