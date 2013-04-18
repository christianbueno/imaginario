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
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    

    <?php foreach ($coletivos as $coletivo):?>   
	


    var location = new google.maps.LatLng(<?php echo $coletivo->latlng; ?>);
    

    var seta = {
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

    var marker = new google.maps.Marker({
        position: location,
        map: map,        
        icon: seta,
        shadow: shadow        
    });
	
    var thumb = new MarkerWithLabel({
        position: location,
        map: map,
		labelContent: "<?php echo $coletivo->name; ?>",
	    labelAnchor: new google.maps.Point(50, 190),
		labelClass: "foto fundo<?php echo $coletivo->id; ?>",
		labelVisible: true,	
        icon: 'null.jpg',
		shadow:shadow,		
		labelInForeground:false
    });   		   	
   

    <?php 
        $coletivo_id = $coletivo->id;
        $coletivo_name = Inflector::friendly_title($coletivo->name, '-', true);                
        $url = "/coletivos/ver/$coletivo_name/$coletivo_id";
    ?>

    google.maps.event.addListener(thumb, 'click', function(e) {
        window.location.href = '<?php echo $url; ?>';
    });
    <?php endforeach; ?> 
});

</script>
</body></html>