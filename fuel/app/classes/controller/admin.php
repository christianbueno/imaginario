<?php
class Controller_Admin extends Controller_Template
{
    public $template = 'admin/template';
    
    public function action_index()
    {        
        $this->template->title = 'Imagina.RIO';
        $this->template->content = View::forge('admin/index');
    }

    public function action_login()
    {
        $logins = array(
            'derpito' => 'derp',
            'babel-team' => 'babel123team',
        );
        if (Input::method() == 'POST' and $logins[Input::post('login')] == Input::post('senha'))
        {
            Session::set('logado', true);
            Response::redirect('/admin');
        } else {
            Session::set_flash('error', 'Login ou senha incorretos');
        }

    }

    public function action_logout()
    {
        Session::set('logado', false);
    }


}
