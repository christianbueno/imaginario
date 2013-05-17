<?php

class Controller_Router extends Controller
{

	public function action_inicio()
	{
		return Response::forge(ViewModel::forge('inicio'));
	}


    public function action_apoio()
    {
        return Response::forge(View::forge('web/apoio'));
    }


    public function action_quemsomos()
    {
        return Response::forge(View::forge('web/forms/quemsomos'));
    }

    public function action_faleconosco()
    {
        return Response::forge(View::forge('web/forms/faleconosco'));
    }

    public function action_escolas()
    {
        return Response::forge(View::forge('web/forms/escolas'));
    }

    public function action_individual()
    {
        return Response::forge(View::forge('web/forms/individual'));
    }

    public function action_artistas()
    {
        return Response::forge(View::forge('web/forms/artistas'));
    }

    public function action_copyright()
    {
        return Response::forge(View::forge('web/copyright'));
    }

    public function action_antispam()
    {
        return Response::forge(View::forge('web/spam'));
    }

    public function action_politicas()
    {
        return Response::forge(View::forge('web/politicas'));
    }


	public function action_404()
	{
		return Response::forge(View::forge('web/404'), 404);
	}
    public function action_channel()
    {
        $cache_expire = 60*60*24*365;       
        header("Pragma: public");
        header("Cache-Control: max-age=".$cache_expire);
        header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');
 
        return '<script src="//connect.facebook.net/pt_BR/all.js"></script>';
    }
}
