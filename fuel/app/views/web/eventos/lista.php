<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Agenda</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>

</head>
<body class="zulub">
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2"></span>

        <div class="texto-wrapper">
        <h1>Agenda</h1>
        <div id="agenda">
        <?php 
        $i = 1;
        foreach ($eventos as $evento): 
            $i++;
        ?>
            <div <?php echo $i % 2 === 0 ? 'class="linhabranca"' : ''; ?>>
                <span class="data"><?php echo Date::forge($evento->when)->format("<span class=\"ano\">%Y</span><span class=\"dia\">%d</span><span class=\"mes\">%m</span>"); ?></span>
                <span class="nome-evento"><?php echo $evento->title ?></span>
                <span class="eventShare">Compartilhe</span>         
            </div>
        <?php endforeach; 
        if(count($eventos) === 0) {
        ?> 
        <p>Nenhum evento cadastrado</p>
        <?php } ?>
        </div>
        
        </div>

        <?php echo render('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>