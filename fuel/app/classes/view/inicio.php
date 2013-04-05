<?php

class View_Inicio extends ViewModel
{
    public $_view = 'web/inicio';

    public function view()
    {
        $images = Model_Conteudo::find('all', array(
            'where' => array(
                    array('type', 'image'),                                    
            )
        ));

        $this->images = $images;
    }


}
         

