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

        $images = Model_Conteudo::find('all', array(
            'where' => array(
                    array('coletivo_id', $id),                                    
            )
        ));


        $eventos = Model_Evento::find('all', array(
            'where' => array(
                    array('coletivo_id', $id),                                    
            )
        ));

        $data['images'] = $images;
        $data['coletivo'] = $coletivo;
        $data['eventos'] = $eventos;
        return Response::forge(View::forge('web/coletivos/pagina', $data));
    }


}
