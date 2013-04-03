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
        <?php endif; ?>                
            <?php echo $content ?>
        </div>


        <?php echo View::forge('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>