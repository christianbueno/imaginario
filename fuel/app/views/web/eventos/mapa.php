<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>

</head>
<body class="mapa-eventos-temp">
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2"></span>
        <div class="alerta">
        <h1>Em Breve!</h1>
        <p>Você terá acesso a todos os eventos <strong>IMAGINA RIO</strong>, poderá encontrar um evento do tipo que você mais gosta, mais próximo de você, e poderá compartilhá-los com seus amigos, e ter mais informações de como fazer parte de cada um!</p>
        </div>

        <?php echo render('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>