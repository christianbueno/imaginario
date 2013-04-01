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
    
            <span id="logo" class="offset2"></span>

            <div class="container">
                <?php echo $content ?>
            </div>


            <?php echo View::forge('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>