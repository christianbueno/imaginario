<?php

class Controller_Coletivos extends Controller
{

    public function action_index()
    {
        return Response::forge(ViewModel::forge('coletivos/mapa'));
    }

    public function action_ver($name = null, $id = null)    
    {        
        $coletivo = Model_Coletivo::find($id);
        $coletivo->info = unserialize($coletivo->metadata);
        $data['coletivo'] = $coletivo;
        return Response::forge(View::forge('web/coletivos/pagina', $data));
    }


}
