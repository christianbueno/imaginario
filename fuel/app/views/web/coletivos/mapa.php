<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSUuzKFf-qvUvfah7ekcUoJPB3V1DUDmw&sensor=false"></script>
  <script type="text/javascript" src="/assets/js/markerwithlabel.js"></script>
  
  
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
    <div class="bgMap" id="map-canvas"></div>
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2"></span>        

        

        <div id="participe">
        	<p>Participe</p>
        	<a href="/artistas"><span>Coletivos & Artistas</span></a>
        	<a href="/escolas"><span>Escolas</span></a>
        	<a href="/individual"><span class="partLast">Individual</span></a>
        </div>
        <?php echo render('modules/menu'); ?>
    </div>
<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('main.js'); 

?>

<script>
$(document).ready(function(){
    var mapOptions = {
        center: new google.maps.LatLng(-22.9035393,-43.20958689999998),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    

    <?php foreach ($coletivos as $coletivo):?>   
	


    var location = new google.maps.LatLng(<?php echo $coletivo->latlng; ?>);
    

    var seta = {
        path: 'm144.980927,61.492798c0,6.333008 0,12.665009 0,18.997986c-0.919006,4.712006 -1.488007,9.526001 -2.830017,14.115021c-2.985992,10.214996 -9.10199,18.531006 -15.763977,26.786987c-17.813995,22.07901 -34.97702,44.688019 -52.397003,67.084991c-1,0 -2,0 -3,0c-2.460999,-3.137024 -4.938019,-6.260986 -7.380005,-9.411987c-14.247009,-18.385986 -28.045013,-37.141998 -42.877991,-55.040985c-10.063995,-12.144012 -16.975006,-25.01001 -18.656982,-40.922028c-3.072021,-29.077972 5.982971,-52.676971 29.559967,-70.455994c14.890991,-11.229004 31.947998,-13.210999 49.78302,-12.255005c25.946991,1.390015 44.135986,14.656006 56.602997,36.814026c4.259979,7.572968 5.61499,15.912964 6.959991,24.286987zm-11.925995,8.112c0.429016,-33.115997 -28.807983,-61.321991 -64.248993,-59.26001c-31.496002,1.833008 -57.192017,27.729004 -56.888,62.667999c0.306,35.063995 33.766998,59.477997 61.014008,59.35202c31.003967,-0.142029 62.731964,-30.524017 60.122986,-62.76001z',
        fillColor: "#<?php echo $coletivo->cor; ?>",
        fillOpacity: 1,
        scale: 1,
        anchor: new google.maps.Point(61, 199),
        strokeWeight: 0
    };

	 
     var shape = new MarkerWithLabel({
        position: location,
        map: map,
		labelContent: "<?php echo $coletivo->name; ?>",
	    labelAnchor: new google.maps.Point(50, 190),
		labelClass: "foto fundo<?php echo $coletivo->id; ?>",
		labelVisible: true,
		icon: seta,
		shadow:"/arquivos/sombra.png",
		labelZIndex:  -650,
		labelInForeground:false
    });   		   	
   

    <?php 
        $coletivo_id = $coletivo->id;
        $coletivo_name = Inflector::friendly_title($coletivo->name, '-', true);                
        $url = "/coletivos/ver/$coletivo_name/$coletivo_id";
    ?>

    google.maps.event.addListener(shape, 'click', function(e) {
        window.location.href = '<?php echo $url; ?>';
    });
    <?php endforeach; ?> 
});

</script>
</body></html>