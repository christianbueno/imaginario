<?php

class Controller_Conteudos extends Controller
{

    public function action_index()
    {
        return Response::forge(ViewModel::forge('conteudos/galeria'));
    }

}
