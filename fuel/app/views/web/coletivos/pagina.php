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
        <img class="logoCole" src="/assets/img/logo-coletivo.png" alt="logo-coletivo" width="240" height="76" />
        <div class="texto-wrapper coletAzul">
        <img src="/assets/img/headerCole.png" alt="headerCole" width="231" height="63" style="margin-bottom:21px;"/>
        <div class="coleMap" id="map-canvas"></div>
        <h2>Sobre o Coletivo</h2>
        <p>Ilha de Gorée é um resort turístico na costa do Senegal. A ilha é símbolo do terror que a Europa promoveu no continente africano. Por isso, aquele local amaldiçoado foi considerado patrimônio mundial pela UNESCO. Considerada a Ilha Infernal do Não Retorno, a Ilha de Gorée é um aterro de 900 metros formado artificialmente pelas potências europeias na costa do Senegal para servir como porto do terror (de escravos). Esse tipo de porto sempre era muito difícil de se instalar no continente, por que frequêntemente eles eram invadidos por canibais.</p>
        <p>A Ilha de Gorée então durante anos a fio desenvolveu seu papel muito bem de garantir passagem grátis de viajem de negros para a América. Essas pessoas que eram sorteadas eram denominadas de escravos. A ilha durante os séculos XV e XIX foi muito movimentada, muito tiro, muito canhão, sempre estava acontecendo alguma batalha.</p>
        <p>Como todo raro lugar que é bom na África, a Ilha de Gorée foi região de disputa entre as potências da Europa. Todo mundo queria aquela força de trabalho fácil em detrimento da humanidade e ainda tinham a coragem de fazer mais barbárie guerreando no local.</p>
        
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






