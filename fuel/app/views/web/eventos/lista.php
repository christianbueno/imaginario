<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Agenda</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <?php echo Asset::js('analytics.js'); ?>

</head>
<body class="zulub" id="agenda">
    <div id="vignette" class="container-fluid">     

        <a href="/" id="logo" class="offset2"></a>
        <span class="Aviso"><i class="icon-warning-sign icon-white"></i> Portal em Desenvolvimento</span>
        <div class="texto-wrapper" style="overflow: hidden;">
        <h1>Agenda</h1>        

        <h2>Ano</h2>
        <nav id="calendar-years">            
            <ul>                
                <li><?php echo Html::anchor("/eventos/agenda/2012/$month", '2012', array('class' => 'btn btn-link'. ((int)$year === 2012 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor("/eventos/agenda/2013/$month", '2013', array('class' => 'btn btn-link'. ((int)$year === 2013 ? ' btn-inverse' : ' btn-default'))); ?></li>
                
            </ul>
        </nav>   
        <h2>Mês</h2>
        <nav id="calendar-months">            
            <ul>                
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/1', 'Jan', array('class' => 'btn'. ((int)$month === 1 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/2', 'Fev', array('class' => 'btn'. ((int)$month === 2 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/3', 'Mar', array('class' => 'btn'. ((int)$month === 3 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/4', 'Abr', array('class' => 'btn'. ((int)$month === 4 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/5', 'Mai', array('class' => 'btn'. ((int)$month === 5 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/6', 'Jun', array('class' => 'btn'. ((int)$month === 6 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/7', 'Jul', array('class' => 'btn'. ((int)$month === 7 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/8', 'Ago', array('class' => 'btn'. ((int)$month === 8 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/9', 'Set', array('class' => 'btn'. ((int)$month === 9 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/10', 'Out', array('class' => 'btn'. ((int)$month === 10 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/11', 'Nov', array('class' => 'btn'. ((int)$month === 11 ? ' btn-inverse' : ' btn-default'))); ?></li>
                <li><?php echo Html::anchor('/eventos/agenda/' . $year . '/12', 'Dez', array('class' => 'btn'. ((int)$month === 12 ? ' btn-inverse' : ' btn-default'))); ?></li>

            </ul>
        </nav>        
        <h2>Eventos</h2>
        
<?php
    $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    for ($i=1; $i <= $days ; $i++) { 
        Session::set_flash('day', $i);
        $today = Arr::filter_recursive($eventos, function($evento){return $evento->day === Session::get_flash('day');});

        if(count($today) > 0) {
        ?>
        <h3><?php echo $i; ?> de <?php echo $meses[$month] ?> de <?php echo $year ?></h3>
        <ul class="media-list">
        <?php                
        foreach ($today as $evento): 
            $coletivo = $evento->coletivo;                                    
            $coletivo_id = $coletivo->id;
            $coletivo_name = Inflector::friendly_title($coletivo->name, '-', true);                
            $url = "/coletivos/ver/$coletivo_name/$coletivo_id";
        ?>
            <li class="media<?php echo ($id_evento && $id_evento === $evento->id) ? ' current' : ''; ?>">               
                   <div class="media-body">                       
                       <h3 class="media-heading"><?php echo Html::img($evento->icon, array("class" => "pull-right", "width" => "40", "height" => "40")); ?><?php echo $evento->title; ?> <small>Criado por: <?php echo Html::anchor($url, $coletivo->name); ?></small></h3>
                       
                       <?php echo str_replace(array("\r\n", "\r", "\n"), "<br />",$evento->description); ?> 
                       <span class="eventShare" data-day="<?php echo $evento->day; ?>" data-name="<?php echo $evento->title; ?>" data-idevento="<?php echo $evento->id; ?>" data-caption="Agenda Imaginario" data-desc="Evento do Coletivo/Artista <?php echo $evento->coletivo->name; ?>">Compartilhe</span>
                   </div>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php
        }   
    }
    if(count($eventos) === 0) {
    ?>
        <p>Nenhum evento cadastrado para este <?php echo $day ? 'dia' : 'mês'; ?></p>
    <?php } ?>
        
        
        </div>

        <?php echo render('modules/menu'); ?>
    </div>
    <footer class="copyFooter">
        <a href="/copyright">Copyright</a> | <a href="/politicas-de-privacidade">Política de Privacidade</a> | <a href="/anti-spam">Anti-Spam</a><br/>
        &copy; Imagina: Rio 2013 - Todos os direitos reservados. | Rua Humaitá, 58 - Casa 2 - Humaitá<br/>
        Rio de Janeiro, RJ Brasil 22261-001 | <a href="mailto:contato@imaginario.etc.br">contato@imaginario.etc.br</a><br/>
        <a href="http://www.babelteam.com/pt">Babel-Team – Marketing & Vendas Automatizadas</a>
    </footer>
<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
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