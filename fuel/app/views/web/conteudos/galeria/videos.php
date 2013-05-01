<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Conteudos > Galeria</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
    <?php echo Asset::js('swfobject.js'); ?>
    <?php echo Asset::js('analytics.js'); ?>
    <style>
        #galeria {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        }
        #items li {            
            list-style: none;
            list-style-image: none;
        }
    </style>
</head>
<body class="zulub">
    <div id="vignette" class="container-fluid">     

        <a href="http://imaginario.etc.br" id="logo" class="offset2"></a>

        <div id="galeria" class="container">
        <h1>Galeria <?php echo $title; ?></h1>
        <nav class="btn-group">
            <?php //echo Html::anchor('/conteudos/', 'Todos', array('class' => $selected === 'todos' ? 'selected' : '')); ?>
            <?php echo Html::anchor('/conteudos/imagens/', '<i class="icon-camera"></i>  Imagens', array('class' => $selected === 'imagens' ? 'active btn' : 'btn')); ?>
            <?php echo Html::anchor('/conteudos/videos/', '<i class="icon-facetime-video"></i> Vídeos', array('class' => $selected === 'videos' ? 'active btn' : 'btn')); ?>
        </nav>
        <div id="player">

        </div>
        <ul id="items">
        <?php foreach ($conteudos as $conteudo):
            echo '<li class="pull-left">';
            echo Html::anchor('javascript:void(0)', Html::img("http://img.youtube.com/vi/$conteudo->content/default.jpg", array('class' => 'i-medium video', 'data-videoid' => $conteudo->content)));

            if($conteudo->saved)
                $text = 'Remover';
            else
                $text = 'Salvar';

            //echo Html::anchor('javascript:void(0)',$text,array('data-conteudoid' => $conteudo->id, 'data-saved' => $conteudo->saved ? 'true' : 'false', 'class'=>'imaginar'));
            echo '</li>';
        endforeach; 
        if(count($conteudos) === 0) {
        ?> 
            <li>Nenhum video cadastrado</li>
        <?php } ?>
        </ul>
        
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
    $(document).ready(shadowbox.init);
</script>
</body></html>