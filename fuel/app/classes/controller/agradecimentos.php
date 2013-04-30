<?php

class Controller_Agradecimentos extends Controller
{

    public function action_index()
    {
        return Response::forge(View::forge('eventos/escolas'));
    }

    public function action_escolas()
    {
        return Response::forge(View::forge('web/agradecimentos/escolas'));
    }

    public function action_publico()
    {
        return Response::forge(View::forge('web/publico/obrigado'));
    }

    public function action_coletivos()
    {
        return Response::forge(View::forge('web/agradecimentos/coletivos'));
    }

}
