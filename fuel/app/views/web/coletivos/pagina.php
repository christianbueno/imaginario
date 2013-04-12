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
        
        <div class="texto-wrapper">

        <img src="/assets/img/headerCole.png" alt="headerCole" width="62" height="63" style="margin:0 16px 0 0;float:left;"/><h1 style="width:640px;float:left;margin-top:16px;margin-bottom:40px;"><?php echo $coletivo->name ?></h1>
        <div class="coleMap" id="map-canvas"></div>
        <h2>Sobre o Coletivo</h2>
        <p><?php echo $coletivo->description ?></p>
        <?php foreach ($images as $image):
            echo Html::img('arquivos/thumb-'.$image->content);
        endforeach; ?> 
        <div style="float:left;" class="agendaCole"><img style="margin:0 16px 0 20px;" src="/assets/img/agenda-coletivo.png" alt="agenda-coletivo" width="120" height="63" />Em breve agenda de eventos da <?php echo $coletivo->name ?>!
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






