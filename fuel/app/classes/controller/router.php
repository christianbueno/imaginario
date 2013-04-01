<?php

class Controller_Router extends Controller
{

	public function action_inicio()
	{
		return Response::forge(View::forge('web/inicio'));
	}

	public function action_404()
	{
		return Response::forge(View::forge('web/404'), 404);
	}
}
