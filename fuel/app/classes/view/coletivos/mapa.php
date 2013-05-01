<?php

class View_Coletivos_Mapa extends ViewModel
{
    public $_view = 'web/coletivos/mapa';

    public function view()
    {
        $coletivos = Model_Coletivo::find('all');

        foreach ($coletivos as $coletivo) {
            $coletivo->info = unserialize($coletivo->metadata);

            $thumb = Model_Conteudo::find('last', array(
                'where' => array('coletivo_id' => $coletivo->id),
            ));

            $coletivo->cor = isset($coletivo->info['cor']) ? $coletivo->info['cor'] : 'FF7200';
            $coletivo->thumb = isset($thumb) ? "/arquivos/thumb-$thumb->content" : '/assets/img/thumb-noicon.jpg';
            $coletivo->background = isset($thumb) ? "url(/arquivos/thumb-$thumb->content) -50px -50px" : "url(/assets/img/thumb-noicon.jpg) -50px -50px";
            $coletivo->ref = isset($coletivo->info['logo']) ? $coletivo->info['logo'] : '';
            
            $coletivo->latlng = isset($coletivo->info['latlng']) ? $coletivo->info['latlng'] : '';
        }


        $this->coletivos = Arr::sort($coletivos, 'coletivo.name','asc', SORT_STRING);
    }


}
 