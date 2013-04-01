<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>

</head>
<body class="zulub">
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2"></span>

        <div class="texto-wrapper">
        <h1>Agenda</h1>
        <div id="agenda">
            <div class="linhabranca">
                <span class="data"><span class="ano">2013</span><span class="dia">26</span><span class="mes">Jul</span></span>
                <span class="nome-evento">Festival Circo Digital</span>
                <span class="eventShare">Compartilhe</span>         
            </div>
            <div>
                <span class="data"><span class="ano">2013</span><span class="dia">30</span><span class="mes">Jul</span></span>
                <span class="nome-evento">Festival Circo Digital</span>
                <span class="eventShare">Compartilhe</span>         
            </div>
            <div class="linhabranca">
                <span class="data"><span class="ano">2013</span><span class="dia">02</span><span class="mes">Ago</span></span>
                <span class="nome-evento">Festival Circo Digital</span>
                <span class="eventShare">Compartilhe</span>         
            </div>
            <div>
                <span class="data"><span class="ano">2013</span><span class="dia">15</span><span class="mes">Ago</span></span>
                <span class="nome-evento">Festival Circo Digital</span>
                <span class="eventShare">Compartilhe</span>         
            </div>
            <div class="linhabranca">
                <span class="data"><span class="ano">2013</span><span class="dia">22</span><span class="mes">Ago</span></span>
                <span class="nome-evento">Festival Circo Digital</span>
                <span class="eventShare">Compartilhe</span>         
            </div>
            <div>
                <span class="data"><span class="ano">2013</span><span class="dia">11</span><span class="mes">Sep</span></span>
                <span class="nome-evento">Festival Circo Digital</span>
                <span class="eventShare">Compartilhe</span>         
            </div>
            <div class="linhabranca">
                <span class="data"><span class="ano">2013</span><span class="dia">15</span><span class="mes">Sep</span></span>
                <span class="nome-evento">Festival Circo Digital</span>
                <span class="eventShare">Compartilhe</span>         
            </div>
        </div>
        
        </div>

        <?php echo render('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>