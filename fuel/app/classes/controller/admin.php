<?php
class Controller_Admin extends Controller_Template
{
    public $template = 'admin/template';
    
    public function before()
    {
        parent::before();        

        if( !Auth::check() )                   
            Response::redirect('users/login');

        $groups = Auth::instance()->get_groups();

        if( (int)$groups[0][1] < 50 )     
            Response::redirect('/');  
    }

    public function action_index()
    {        
        $this->template->title = 'Imagina.RIO';
        $this->template->content = View::forge('admin/index');
    }

    public function action_logout()
    {
        Session::set('logado', false);
    }


}
