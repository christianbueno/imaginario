<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Coletivos &amp; Artistas</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <?php echo Asset::js('analytics.js'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSUuzKFf-qvUvfah7ekcUoJPB3V1DUDmw&sensor=false"></script>  
    <!--script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script-->
    <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/richmarker/src/richmarker-compiled.js"></script>
    
  
  
<style type="text/css">

.foto {
    color: white;
    text-shadow: 2px 2px 1px rgba(0, 0, 0, 1);
    font-family: "Lucida Grande", "Arial", sans-serif;
    font-size: 19px;
    font-weight: bold;
    text-align: center;
    width: 124px; 
    height:124px; 
    display:table;
    line-height:120px;
    border-radius: 60px; 
    position: relative;
    bottom: 66px;
    left: 11px;
    -moz-border-radius: 60px; 
    -webkit-border-radius: 60px;
}

    <?php foreach ($coletivos as $coletivo):?>   
   
   .fundo<?php echo $coletivo->id; ?> {
	   background: <?php echo $coletivo->background; ?>;
   }
  
     <?php endforeach; ?> 
</style> 
</head>
<body class="noBG">
    <div id="box-coletivos">
        <h1>Coletivos</h1>
        <ul id="box-coletivos-lista">
        <?php foreach ($coletivos as $coletivo):
            $coletivo_id = $coletivo->id;
            $coletivo_name = Inflector::friendly_title($coletivo->name, '-', true);                
            $url = "/coletivos/ver/$coletivo_name/$coletivo_id";
        ?>   

            <li><?php echo Html::anchor($url, Html::img($coletivo->thumb, array('class' => 'i-thumb pull-left')) . $coletivo->name, array('style' => "background-color: #$coletivo->cor")); ?></li>
        <?php endforeach; ?>
    </div>
    <div class="bgMap" id="map-canvas"></div>
    <div id="vignette" class="container-fluid">     

        <a href="/" id="logo" class="offset2"></a>        

        

        <div id="participe">
        	<p>Participe</p>
        	<a href="/artistas"><span>Coletivos & Artistas</span></a>
        	<a href="/escolas"><span>Escolas</span></a>
        	<a href="/individual"><span class="partLast">Individual</span></a>
        </div>
        <?php echo render('modules/menu'); ?>
    </div>
<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('jquery-ui-1.10.2.custom.min.js'); ?>
<?php echo Asset::js('main.js'); 

?>

<script>
$(document).ready(function(){
    $( "#box-coletivos" ).draggable({ 
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
    

<?php 
    $i = 999;
    foreach ($coletivos as $coletivo):
?>   
	


    var location = new google.maps.LatLng(<?php echo $coletivo->latlng; ?>);
    

    var seta<?php echo $coletivo->id; ?> = {
        path: 'M 48.4 159 C 33.6 139.9 21.8 126.4 20.6 123.8 C 14.5 110.9 10.6 110 6.8 97 C 5.2 91.6 2.4 71 7.7 51.5 C 12.1 35.5 33 15.9 45.7 11 C 51.8 8.6 59 5.7 75.3 5.7 C 91.6 5.7 95.1 8.3 101.3 10.4 C 121.5 17.4 138.1 32.3 145.1 58.6 C 147.6 67.9 145.8 93.2 142.9 99 C 135.4 114.1 132.2 120.9 128.1 126.3 C 126.4 128.6 119.6 139.5 105 157.8 C 86.5 180.9 79.4 191.7 81.2 189.1 C 81.8 188.3 77.9 192.8 75 191.8 C 70 190.1 62 176.6 48.4 159Z M 135.6 61.9 C 47.7 149.5 91.7 105.7 135.6 61.9Z',
        fillColor: "#<?php echo $coletivo->cor; ?>",
        fillOpacity: 1,
        scale: 1,
        anchor: new google.maps.Point(64, 204),
        strokeWeight: 0
    };
    var shadow = {
        url: '/assets/img/sombra.png',                
        anchor: new google.maps.Point(60, 200)
    };
    <?php $i--; ?>
    var thumb<?php echo $coletivo->id; ?> = new RichMarker({
        position: location,        
        map: map,  
        shadow: null,
        zIndex: <?php echo $i ?>,
        flat: true,          
        optimized: false,  
        content: '<span class="fundo<?php echo $coletivo->id; ?> foto"><?php echo $coletivo->name; ?></span>',
    });    
    <?php $i--; ?>
    var marker<?php echo $coletivo->id; ?> = new google.maps.Marker({
        position: location,        
        map: map,       
        zIndex: <?php echo $i ?>,     
        optimized: false,  
        flat: true,
        icon: seta<?php echo $coletivo->id; ?>,        
        shadow: shadow        
    });


    <?php 
        $coletivo_id = $coletivo->id;
        $coletivo_name = Inflector::friendly_title($coletivo->name, '-', true);                
        $url = "/coletivos/ver/$coletivo_name/$coletivo_id";
    ?>

    google.maps.event.addListener(marker<?php echo $coletivo->id; ?>, 'click', function(e) {
        window.location.href = '<?php echo $url; ?>';
    });
    google.maps.event.addListener(marker<?php echo $coletivo->id; ?>, 'mouseover', function(e) {
        $current = $(e.target);

        $current.addClass('hovered');
    });
    google.maps.event.addListener(marker<?php echo $coletivo->id; ?>, 'mouseout', function(e) {
        $current = $(e.target);

        $current.removeClass('hovered');
    });    

    
<?php endforeach; ?> 
});

</script>


</body></html>