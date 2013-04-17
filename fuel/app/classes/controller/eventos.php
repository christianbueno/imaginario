<?php

class Controller_Eventos extends Controller
{

    public function action_index()
    {
        return Response::forge(ViewModel::forge('eventos/mapa'));
    }

    public function action_agenda()
    {
        return Response::forge(ViewModel::forge('eventos/lista'));
    }

}
