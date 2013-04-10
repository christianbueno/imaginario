<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSUuzKFf-qvUvfah7ekcUoJPB3V1DUDmw&sensor=false"></script>
</head>
<body class="zulub">
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2 branco"></span>

        <div class="invisibleCont">
        <?php echo Html::img('arquivos/'.$coletivo->info['logo'], array('class' => 'logoCole')); ?>
        
        <div class="texto-wrapper coletAzul">
            <?php echo $coletivo->name ?>
        <img src="/assets/img/headerCole.png" alt="headerCole" width="231" height="63" style="margin-bottom:21px;"/>
        <div class="coleMap" id="map-canvas"></div>
        <h2>Sobre o Coletivo</h2>
        <p><?php echo $coletivo->description ?></p>
        
        <img src="/assets/img/image-strip.png" alt="image-strip" width="775" height="100" />
        <div style="float:left;" class="agendaCole"><img style="margin:20px 0 0 20px;" src="/assets/img/agenda-coletivo.png" alt="agenda-coletivo" width="535" height="63" />
        </div>
        </div>
        </div>

        <?php echo render('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('main.js'); ?>

<script>
$(document).ready(function(){
    var mapOptions = {
        center: new google.maps.LatLng(-22.9035393,-43.20958689999998),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
});
</script>
</body></html>






