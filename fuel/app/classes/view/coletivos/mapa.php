<?php

class View_Coletivos_Mapa extends ViewModel
{
    public $_view = 'web/coletivos/mapa';

    public function view()
    {
        $coletivos = Model_Coletivo::find('all');

        foreach ($coletivos as $coletivo) {
            $coletivo->info = unserialize($coletivo->metadata);
            $coletivo->logo = isset($coletivo->info['logo']) ? $coletivo->info['logo'] : '';
            $coletivo->cor = isset($coletivo->info['cor']) ? $coletivo->info['cor'] : '';
            $coletivo->latlng = isset($coletivo->info['latlng']) ? $coletivo->info['latlng'] : '';
        }


        $this->coletivos = $coletivos;
    }


}
 