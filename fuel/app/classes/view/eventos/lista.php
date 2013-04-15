<?php

class View_Eventos_Lista extends ViewModel
{
    public $_view = 'web/eventos/lista';

    public function view()
    {
        $eventos = Model_Evento::find('all', array(
            'order_by' => array('when' => 'desc'),
        ));

        foreach ($eventos as $evento) {
            $evento->info = unserialize($evento->metadata);
        }
        $this->eventos = $eventos;
    }


}
 