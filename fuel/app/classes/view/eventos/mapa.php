<?php

class View_Eventos_Mapa extends ViewModel
{
    public $_view = 'web/eventos/mapa';

    public function view()
    {
        $eventos = Model_Evento::find('all');

        foreach ($eventos as $evento) {
            $evento->coletivo = Model_Coletivo::find($evento->coletivo_id);
            $evento->info = unserialize($evento->metadata);            

            $evento->icon = '/assets/img/eventos/'.$evento->info['type'].'.png';
            $evento->latlng = $evento->info['latlng'];  
            $evento->endereco = $evento->info['address'];          
        }

        $this->eventos = $eventos;


    }


}
 