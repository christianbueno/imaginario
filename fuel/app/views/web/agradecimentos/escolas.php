<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Agradecimentos > Obrigado</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <style>
        #galeria {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        }
        #items li {            
            list-style: none;
            list-style-image: none;
        }
    </style>
</head>
<body class="zulub">
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2"></span>

        <div id="galeria" class="container">
            obrigado escolas
        </div>

        <?php echo render('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>