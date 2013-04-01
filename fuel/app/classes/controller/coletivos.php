<?php

class Controller_Coletivos extends Controller
{

    public function action_index()
    {
        return Response::forge(ViewModel::forge('coletivos/mapa'));
    }

    public function action_ver()
    {        
        return Response::forge(ViewModel::forge('coletivos/pagina'));
    }

    public function action_editar()
    {   
        return Response::forge(ViewModel::forge('coletivos/pagina'));
    }

}
