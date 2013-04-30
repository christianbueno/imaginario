<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Imagina.RIO > Conteudos > Galeria</title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('main.css'); ?>
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
        <nav>
            <?php //echo Html::anchor('/conteudos/', 'Todos', array('class' => $selected === 'todos' ? 'selected' : '')); ?>
            <?php echo Html::anchor('/conteudos/imagens/', 'Imagens', array('class' => $selected === 'imagens' ? 'selected' : '')); ?>
            <?php echo Html::anchor('/conteudos/videos/', 'Videos', array('class' => $selected === 'videos' ? 'selected' : '')); ?>
        </nav>
        <ul id="items">
        <?php foreach ($conteudos as $conteudo):
            echo '<li class="pull-left">';
            echo Html::anchor('arquivos/'.$conteudo->content, Html::img('arquivos/thumb-'.$conteudo->content, array('class' => 'i-medium')));

            if($conteudo->saved)
                $text = 'Remover';
            else
                $text = 'Salvar';
            echo Html::anchor('javascript:void(0)',$text,array('data-conteudoid' => $conteudo->id, 'data-saved' => $conteudo->saved ? 'true' : 'false', 'class'=>'imaginar'));
            echo '</li>';
        endforeach; 
        if(count($conteudos) === 0) {
        ?> 
            <li>Nenhum conteudo cadastrado</li>
        <?php } ?>
        </ul>
        
        </div>

        <?php echo render('modules/menu'); ?>
    </div>

<?php echo Asset::js('jquery-1.9.1.min.js'); ?>
<?php echo Asset::js('main.js'); ?>
</body></html>