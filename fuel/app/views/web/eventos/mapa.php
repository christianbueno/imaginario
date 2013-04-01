<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>

</head>
<body class="noBG">
    <div id="vignette" class="container-fluid">     

        <span id="logo" class="offset2"></span>
        <img style="position:absolute;z-index:997;margin:-200px 0 0 280px;" src="/assets/img/mapa-eventos.png" alt="mapa-eventos" width="1138" height="535" />
        <iframe class="bgMap" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Avenida+Olof+Palme,+Rio+de+Janeiro,+Brazil&amp;aq=0&amp;oq=avenida+olo&amp;sll=37.0625,-95.677068&amp;sspn=43.578243,93.076172&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Olof+Palme+-+Camorim,+Rio+de+Janeiro,+Brazil&amp;t=m&amp;ll=-22.98052,-43.413506&amp;spn=0.284468,0.548973&amp;z=12&amp;iwloc=near&amp;output=embed&style=feature:all|element:labels|visibility:off"></iframe>


        <?php echo render('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.8.3.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>