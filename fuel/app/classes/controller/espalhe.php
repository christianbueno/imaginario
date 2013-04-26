<?php

class Controller_Espalhe extends Controller
{

    public function action_index()
    {
        return Response::forge(View::forge('web/espalhe/escolas'));
    }

    public function action_escolas()
    {
        return Response::forge(View::forge('web/espalhe/escolas'));
    }

    public function action_publico()
    {
        return Response::forge(View::forge('web/espalhe/publico'));
    }

    public function action_coletivos()
    {
        return Response::forge(View::forge('web/espalhe/coletivos'));
    }

}
