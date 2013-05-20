<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Coletivos &amp; Artistas > <?php echo $coletivo->name ?></title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <?php echo Asset::js('analytics.js'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSUuzKFf-qvUvfah7ekcUoJPB3V1DUDmw&sensor=false"></script>
    <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
        
</head>
<body class="zulub" id="coletivo-pagina" style="background: url(<?php echo $coletivo->latest_image; ?>) no-repeat center center fixed;background-size: cover;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;-ms-background-size: cover;">
    <div id="vignette" class="container-fluid">     

        <a href="/" id="logo" class="offset2"></a>

        <div class="invisibleCont">
        <?php echo Html::img('arquivos/'.$coletivo->info['logo'], array('class' => 'logoCole')); ?>
        
        <div class="texto-wrapper">

        <h1 id="titulo-pagina"><?php echo Html::anchor( Input::uri() , $coletivo->name ); ?></h1>
        <?php if(count($eventos) > 0) { ?>
        <div class="coleMap" id="map-canvas"></div>
        <?php } ?>
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
        <h2 id="agenda-pagina">Agenda de eventos</h2>
            
        <ul class="media-list">
        <?php                
        foreach ($eventos as $evento): 
            $coletivo = $evento->coletivo;                                    
            $coletivo_id = $coletivo->id;
            $coletivo_name = Inflector::friendly_title($coletivo->name, '-', true);                
            $url = "/coletivos/ver/$coletivo_name/$coletivo_id";
        ?>
            <li class="media">               
                   <div class="media-body">                       
                       <h3 class="media-heading"><?php echo Html::img($evento->icon, array("class" => "pull-right", "width" => "40", "height" => "40")); ?><?php echo $evento->title; ?> <small><?php echo Date::forge($evento->when)->format("%d/%m/%Y"); ?></small></h3>
                       
                       <?php echo str_replace(array("\r\n", "\r", "\n"), "<br />",$evento->description); ?> 
                       <span class="eventShare" data-day="<?php echo $evento->day; ?>" data-name="<?php echo $evento->title; ?>" data-idevento="<?php echo $evento->id; ?>" data-caption="Agenda Imaginario" data-desc="Evento do Coletivo/Artista <?php echo $evento->coletivo->name; ?>">Compartilhe</span>
                   </div>
            </li>
        <?php endforeach; 
                if(count($eventos) === 0) {
        ?> 
        <li><i class="icon-calendar"></i> Nenhum evento cadastrado</li>
        <?php } ?>
        </ul>            

        
        
        </div>
        </div>

        <?php echo render('modules/menu'); ?>
    </div>
    <footer class="copyFooter">
        <a href="/copyright">Copyright</a> | <a href="/politicas-de-privacidade">Política de Privacidade</a> | <a href="/anti-spam">Anti-Spam</a><br/>
        &copy; Imagina: Rio 2013 - Todos os direitos reservados. | Rua Humaitá, 58 - Casa 2 - Humaitá<br/>
        Rio de Janeiro, RJ Brasil 22261-001 | <a href="mailto:contato@imaginario.etc.br">contato@imaginario.etc.br</a><br/>
        <a href="http://www.babelteam.com/pt">Babel-Team – Marketing & Vendas Automatizadas</a>
    </footer>
<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('main.js'); ?>

<script>
$(document).ready(function(){
    var mapOptions = {
        zoom: 12,        
        zoomControl: true,
        streetViewControl: false,
        mapTypeControl: false,
        zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL
        },
        center: new google.maps.LatLng(-22.9035393,-43.20958689999998),
        scaleControl: false,  
        panControl: false,        
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    <?php if(count($eventos) > 0) { ?>
        map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    <?php } ?>

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
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '428196857269693',                        // App ID from the app dashboard
      channelUrl : '//imaginario.etc.br/router/channel', // Channel file for x-domain comms
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });

    // Additional initialization code such as adding Event Listeners goes here
  };

  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

$('.eventShare').on('click', facebook.share);
</script>
</body></html>






