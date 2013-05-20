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
        $latest_image = Model_Conteudo::find('last', array(
                'where' => array('coletivo_id' => $coletivo->id),
            ));

        if(!isset($latest_image))
            $coletivo->latest_image = '/assets/img/rio-silhueta.jpg';
        else
            $coletivo->latest_image = "/arquivos/$latest_image->content";

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

        foreach ($eventos as $evento) {
            $evento->coletivo = Model_Coletivo::find($evento->coletivo_id);
            $evento->info = unserialize($evento->metadata);            

            $evento->day = (int)Date::forge((int)$evento->when)->format("%d");            
            $evento->icon = '/assets/img/eventos/'.$evento->info['type'].'.png';
            $evento->latlng = $evento->info['latlng'];  
            $evento->endereco = $evento->info['address'];     
        }
        $data['images'] = $images;
        $data['coletivo'] = $coletivo;
        $data['eventos'] = $eventos;


        return Response::forge(View::forge('web/coletivos/pagina', $data));
    }


}
