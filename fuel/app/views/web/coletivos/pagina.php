<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Coletivos &amp; Artistas > <?php echo $coletivo->name ?></title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSUuzKFf-qvUvfah7ekcUoJPB3V1DUDmw&sensor=false"></script>
    <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
        
</head>
<body class="zulub" style="background: url(/arquivos/<?php echo $coletivo->latest_image->content; ?>) no-repeat center center fixed;">
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2"></span>

        <div class="invisibleCont">
        <?php echo Html::img('arquivos/'.$coletivo->info['logo'], array('class' => 'logoCole')); ?>
        
        <div class="texto-wrapper">

        <img src="/assets/img/headerCole.png" alt="headerCole" width="62" height="63" style="margin:0 16px 0 0;float:left;"/><h1 style="width:640px;float:left;margin-top:16px;margin-bottom:40px;"><?php echo $coletivo->name ?></h1>
        <div class="coleMap" id="map-canvas"></div>
        <h2>Sobre o Coletivo</h2>
        <p><?php echo $coletivo->description; ?></p>
        <ul id="coletivo-images">
        <?php foreach ($images as $image):
            echo '<li>';
            echo Html::anchor('arquivos/'.$image->content, Html::img('arquivos/thumb-'.$image->content, array('class' => 'i-medium')));

            if($image->saved)
                $text = 'Remover';
            else
                $text = 'Salvar';
            echo Html::anchor('javascript:void(0)',$text,array('data-conteudoid' => $image->id, 'data-saved' => $image->saved ? 'true' : 'false', 'class'=>'imaginar'));
            echo '</li>';
        endforeach; ?> 
        </ul>
        <div class="agendaCole pull-left"><img style="margin:0 16px 0 20px;" src="/assets/img/agenda-coletivo.png" alt="agenda-coletivo" width="120" height="63" />Agenda de eventos
        </div>
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
        </div>

        <?php echo render('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('main.js'); ?>

<script>
$(document).ready(function(){
    var mapOptions = {
        center: new google.maps.LatLng(-22.9035393,-43.20958689999998),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    <?php foreach ($eventos as $evento):?>   
        var location = new google.maps.LatLng(<?php echo $evento->latlng; ?>); 
        

        var boxText = document.createElement("div");        
        boxText.innerHTML = '<h2><?php echo $evento->title; ?></h2>' +
                            '<p><?php echo Date::forge($evento->when)->format("%d.%b.%Y"); ?></p>'
                
        var myOptions = {
                 content: boxText
                ,disableAutoPan: false
                ,maxWidth: 0
                ,boxClass: 'infoboxeventos'
                ,pixelOffset: new google.maps.Size(-80, -140)
                ,zIndex: null
                ,boxStyle: {                   
                  opacity: 0.9
                  ,width: "180px"
                 }
                ,closeBoxURL: ''
                ,closeBoxMargin: "10px 2px 2px 2px"
                ,infoBoxClearance: new google.maps.Size(1, 1)
                ,isHidden: false
                ,pane: "floatPane"
                ,enableEventPropagation: false
        };

        var infowindow<?php echo $evento->id; ?> = new InfoBox(myOptions);

        
              
        var marker<?php echo $evento->id; ?> = new google.maps.Marker({
            position: location,
            map: map,        
            icon: "<?php echo $evento->icon; ?>"        
        });
        google.maps.event.addListener(marker<?php echo $evento->id; ?>, 'mouseover', function(e) {
            infowindow<?php echo $evento->id; ?>.open(map,marker<?php echo $evento->id; ?>);
        });
        google.maps.event.addListener(marker<?php echo $evento->id; ?>, 'mouseout', function(e) {
            infowindow<?php echo $evento->id; ?>.close();
        });
    <?php endforeach; ?>     
});
</script>
</body></html>






