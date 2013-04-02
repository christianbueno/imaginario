<?php

class View_Coletivos_Mapa extends ViewModel
{
    public $_view = 'web/coletivos/mapa';

    public function view()
    {
        $coletivos = Model_Coletivo::find('all');

        foreach ($coletivos as $coletivo) {
            $coletivo->info = unserialize($coletivo->metadata);
        }
        $this->coletivos = $coletivos;
    }


}
 