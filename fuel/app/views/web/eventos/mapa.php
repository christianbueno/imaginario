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