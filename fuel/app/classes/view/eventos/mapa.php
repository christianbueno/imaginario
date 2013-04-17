<?php

class View_Eventos_Mapa extends ViewModel
{
    public $_view = 'web/eventos/mapa';

    public function view()
    {
        $eventos = Model_Evento::find('all');

        foreach ($eventos as $evento) {
            $evento->info = unserialize($evento->metadata);            

            $evento->icon = '/assets/img/eventos/'.$evento->info['type'].'.png';
            $evento->latlng = $evento->info['latlng'];          
        }

        $this->eventos = $eventos;


    }


}
 