<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > espalhe o amor > Obrigado</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <?php echo Asset::js('analytics.js'); ?>
</head>
<body class="zulub">
    <div id="vignette" class="container-fluid">     

        <a href="http://imaginario.etc.br" id="logo" class="offset2"></a>

        <div class="texto-wrapper" style="margin-bottom:250px;">
            <h1>Espalhe sua paixão!</h1>
                <img src="/assets/img/spread-the-love.png" width="155" height="130" align="right" style="margin-top:-70px;"/>
                <div class="shareBox">
                    <span class="input-xxlarge uneditable-input fakeInput">Para participar do ImaginaRio 2013, cadastre-se em www.imaginario.etc.br/individual e receba a programação completa por e-mail</span>
                    <a style="margin-right:7px;" class="btn btn-info btn-large" href="http://twitter.com/home?status=Para participar do ImaginaRio 2013, cadastre-se em www.imaginario.etc.br/individual e receba a programação completa por e-mail" target="_blank">
        <img src="/assets/img/twitter-ico.png" width="14" height="14" class="btnSMico"> Compartilhe no Twitter</a>
                    <a class="btn btn-primary btn-large" href="http://www.facebook.com/share.php?u=http://imaginario.etc.br" target="_blank"><img src="/assets/img/facebook-ico.png" width="14" height="14" class="btnSMico"> Compartilhe no Facebook</a>
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
<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>