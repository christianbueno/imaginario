<?php

class Controller_Eventos extends Controller
{

    public function action_index()
    {        
        return Response::forge(ViewModel::forge('eventos/mapa'));
    }
    public function action_localizar()
    {
        View::set_global('find_location', Input::get('latlng'), false);
        return Response::forge(ViewModel::forge('eventos/mapa'));
    }

    public function action_agenda($year = null, $month = null, $day = null, $id_evento = null)
    {
        $today = getdate();
        
        if($year === null)
            $year = $today['year'];

        if($month === null)
            $month = $today['mon'];

        View::set_global('year', $year, false);
        View::set_global('month', $month, false);
        View::set_global('day', $day, false);        
        View::set_global('id_evento', $id_evento, false);

        return Response::forge(ViewModel::forge('eventos/lista'));
    }

}
