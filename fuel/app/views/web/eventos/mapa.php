<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Mapa de Eventos</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSUuzKFf-qvUvfah7ekcUoJPB3V1DUDmw&sensor=false"></script>  
    <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
</head>
<body class="noBG">
    <div class="bgMap" id="map-canvas"></div>
    <div id="vignette" class="container-fluid">     

        <a href="/" id="logo" class="offset2"></a>             

        <?php echo render('modules/toolbar'); ?>
        <?php echo render('modules/menu'); ?>
    </div>
<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('jquery-ui-1.10.2.custom.min.js'); ?>
<?php echo Asset::js('main.js'); 

?>

<script>
$(document).ready(function(){
    $(".box").draggable({ 
        handle: "h1",
        scroll: false,
        containment: 'parent'
    });
    var mapOptions = {
        zoom: 12,        
        zoomControl: true,
        streetViewControl: false,
        mapTypeControl: false,
        zoomControlOptions: {
          style: google.maps.ZoomControlStyle.LARGE
        },
        center: new google.maps.LatLng(-22.9035393,-43.20958689999998),
        scaleControl: false,  
        panControl: false,        
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);    

    toolbar.init();
    
    <?php 
    $locations = array();
    foreach ($eventos as $evento):
      if (!array_key_exists($evento->latlng , $locations))
         $locations[$evento->latlng] = array();

      array_push($locations[$evento->latlng], $evento);

    ?>   
        var location = new google.maps.LatLng(<?php echo $evento->latlng; ?>);         
        
        var marker<?php echo $evento->id; ?> = new google.maps.Marker({
            position: location,
            map: map,        
            icon: "<?php echo $evento->icon; ?>"        
        });
    <?php endforeach; ?> 
    <?php 
    $i = 0;
    
    foreach ($locations as $location):?>  
            
            content = '<h2>Eventos</h2>' +                            
                            '<ul class="media-list">' +
                            <?php foreach ($location as $evento):
                                $coletivo = $evento->coletivo;                                    
                                $coletivo_id = $coletivo->id;
                                $coletivo_name = Inflector::friendly_title($coletivo->name, '-', true);                
                                $url = "/coletivos/ver/$coletivo_name/$coletivo_id";
        
                                $latlng = $evento->latlng;
                            ?>  
                                '<li class="media">' +
                                '<span class="pull-left evento-dia"><?php echo Date::forge($evento->when)->format("<span class=\'dia\'>%d</span><span class=\'mes\'>%b</span><span class=\'ano\'>%Y</span>"); ?></span>' +        
                                    '<div class="media-body">' +
                                        '<h3 class="media-heading"><?php echo $evento->title; ?></h3>' +
                                        '<p><?php echo str_replace("\n", "<br />", $evento->description); ?></p>' + 
                                        '<small>Criado por: <?php echo Html::anchor($url, $coletivo->name); ?></small>' + 
                                    '</div>' +
                                '</li>' +
                            <?php endforeach; 
                                $i++
                            ?> 
                            '</ul>';
            $div = $('<div/>').text(content);
        
        var myOptions = {
                 content: $div.text()
                ,disableAutoPan: false
                ,maxWidth: 0
                ,boxClass: 'infoboxeventos'
                ,pixelOffset: new google.maps.Size(-80, -140)
                ,zIndex: null
                ,boxStyle: {                   
                  opacity: 1
                  ,width: "350px"
                 }
                ,closeBoxURL: ''
                ,closeBoxMargin: "10px 2px 2px 2px"
                ,infoBoxClearance: new google.maps.Size(1, 1)
                ,isHidden: false
                ,pane: "floatPane"
                ,enableEventPropagation: false
        };
        var refmarker<?php echo $i; ?> = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo $latlng; ?>),
            map: map,        
            flat:true,
            zIndex: Math.round(location.lat()*-100000)<<5, 
            icon: '/assets/img/placer-eventos.png'
        });


        var infowindow<?php echo $i; ?> = new InfoBox(myOptions);
        
        google.maps.event.addListener(refmarker<?php echo $i; ?>, 'mouseover', function(e) {

            infowindow<?php echo $i; ?>.open(map,refmarker<?php echo $i; ?>);
        });
        google.maps.event.addListener(refmarker<?php echo $i; ?>, 'mouseout', function(e) {
            infowindow<?php echo $i; ?>.close();
        });

    <?php endforeach; 

    

    ?> 




});

</script>

</body></html>


