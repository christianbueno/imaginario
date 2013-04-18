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
        $coletivo->cor = isset($coletivo->info['cor']) ? $coletivo->info['cor'] : 'FF7200';
        $coletivo->latest_image = Model_Conteudo::find('last', array(
                'where' => array('coletivo_id' => $coletivo->id),
            ));

        $images = Model_Conteudo::find('all', array(
            'where' => array(
                    array('coletivo_id', $id),                                    
            )
        ));
        $saved_content = Auth::instance()->get_profile_fields('conteudos');
        
            foreach ($images as $image) {
                $image->saved = isset($saved_content) ? in_array($image->id, $saved_content) : false;
            }
        
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
