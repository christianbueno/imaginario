<?php

class Controller_Eventos extends Controller
{

    public function action_index()
    {
        return Response::forge(View::forge('web/eventos/mapa'));
    }

    public function action_agenda()
    {
        return Response::forge(View::forge('web/eventos/lista'));
    }

}
