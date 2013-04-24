<?php

class View_Conteudos_Galeria extends ViewModel
{
    public $_view = 'web/conteudos/galeria';

    public function view()
    {        

        if(Auth::check())
            $saved_content = Auth::instance()->get_profile_fields('conteudos');

        $conteudos = Model_Conteudo::find('all', array(
            'order_by' => array('created_at' => 'desc'),
        ));

        foreach ($conteudos as $conteudo) {
            $conteudo->info = unserialize($conteudo->metadata);
            $conteudo->saved = isset($saved_content) ? in_array($conteudo->id, $saved_content) : false;

        }
        $this->conteudos = $conteudos;
    }


}
 