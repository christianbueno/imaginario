<?php

class Controller_Conteudos extends Controller
{

    public function action_index()
    {
        return Response::forge(ViewModel::forge('conteudos/todos'));
    }
    public function action_imagens()
    {
        return Response::forge(ViewModel::forge('conteudos/imagens'));
    }
    public function action_videos($id = null)
    {
        return Response::forge(ViewModel::forge('conteudos/videos'));
    }

}
