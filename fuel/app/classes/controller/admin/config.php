<?php
class Controller_Admin_Config extends Controller_Admin
{

    public function action_index()
    {  
        Config::load('carrossel', 'config'); 
        
        $data['order'] = Config::get('config.order', true);

        $this->template->title = 'Configuração'; 
        $this->template->content = View::forge('admin/config/edit', $data);
    }

    public function action_editar()
    {        
        Config::load('carrossel', 'display');
        Config::set('display.order', Input::post('order'));
        Config::save('carrossel', 'display');
        Response::redirect('admin/config');
    }


}