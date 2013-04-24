<?php

class Controller_Conteudos extends Controller
{

    public function action_index()
    {
        return Response::forge(ViewModel::forge('conteudos/galeria'));
    }
    public function action_imagens()
    {
        return Response::forge(ViewModel::forge('conteudos/imagens'));
    }
    public function action_videos()
    {
        return Response::forge(ViewModel::forge('conteudos/videos'));
    }

}
