<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSUuzKFf-qvUvfah7ekcUoJPB3V1DUDmw&sensor=false"></script>
</head>
<body class="noBG">
    <div class="bgMap" id="map-canvas"></div>
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2"></span>        

        


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

    var image = {
        url: "/arquivos/<?php echo $coletivo->info['logo']; ?>",
        
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(75, 75)
    };
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $coletivo->info['latlng']; ?>),
        icon: image,
        map: map,
        title:"<?php echo $coletivo->name; ?>"
    });


    google.maps.event.addListener(marker, 'click', function(e) {
        console.log(e);
    });
    <?php endforeach; ?> 
});
</script>
</body></html>