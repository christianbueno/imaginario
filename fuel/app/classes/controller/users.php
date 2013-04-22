<?php

class Controller_Users extends Controller_Template
{
    public $template = 'users/template';
    
    public function action_login()
    {
        $view = View::forge('users/login');

        $form = Form::forge('login');
        $auth = Auth::instance();
        $form->add('username', 'Username:');
        $form->add('password', 'Password:', array('type' => 'password'));
        $form->add('submit', ' ', array('type' => 'submit', 'value' => 'Login'));
        if($_POST)
        {
            if($auth->login(Input::post('username'), Input::post('password')))
            {                
                Response::redirect('users/perfil');
            }
            else
            {
                Session::set_flash('error', 'Usuário ou senha incorretos.');
            }
        }

        $view->set('form', $form, false);
        $this->template->title = 'User &raquo; Login';
        $this->template->content = $view;
    }
    public function action_logout()
    {
        $auth = Auth::instance();
        $auth->logout();        
        Response::redirect('/');
    }

    public function action_registrar()
    {
        $auth = Auth::instance();
        $view = View::forge('users/register');
        $form = Fieldset::forge('register');
        Model_User::register($form);

        if($_POST) {
            $form->repopulate();
            $result = Model_User::validate_registration($form, $auth);
            if($result['e_found'])
            {
                $view->set('errors', $result['errors'], false);
            }
            else
            {                
                Response::redirect('users/perfil');
            }
        }

        $view->set('reg', $form->build(), false);
        $this->template->title = 'User &raquo; Register';
        $this->template->content = $view;
    }

    public function action_perfil()
    {
        $auth = Auth::instance();
        
        if( !Auth::check() )                   
            Response::redirect('users/login');

        $email = $auth->get_email();

        $coletivos = Model_Coletivo::find('all', array(
            'where' => array(
                array('metadata', 'like', "%$email%"),
        )));
        foreach ($coletivos as $coletivo) {
            $metadata = unserialize($coletivo->metadata);
            $coletivo->admins = implode(';',$metadata['admins']);
            $coletivo->image = $metadata['logo'];
            $coletivo->address = $metadata['endereco'];
            $coletivo->latlng = $metadata['latlng'];
            $coletivo->color = isset($metadata['cor']) ? $metadata['cor'] : '';
        }
        $user_id = Auth::instance()->get_user_id();
        $saved_content = Auth::instance()->get_profile_fields('conteudos');
        $user = Model_User::find($user_id[1]);

        $images = array();
        if(isset($saved_content)) {
            foreach ($saved_content as $content_id) {
                if($image = Model_Conteudo::find($content_id)){                
                    array_push($images,$image);
                }
            }
        }
        

        $data['images'] = $images;
        $data['user'] = $user;
        $data['coletivos'] = $coletivos;

        $this->template->content = View::forge('users/perfil', $data);
    }

    public function action_salvarcoletivo($id = null) 
    {
        is_null($id) and Response::redirect('users/perfil');

        $val = Model_Coletivo::validate_web();

        if ($val->run())
        {            
            $coletivo = Model_Coletivo::find($id);  
            $metadata = unserialize($coletivo->metadata);    

            if(Upload::is_valid()) 
                $metadata['logo'] = Controller_Admin_Coletivo::processUpload();

            $metadata['endereco'] = Input::post('address');
            $metadata['latlng'] = Input::post('latlng');
            $metadata['color'] = Input::post('color');
            
            $coletivo->name = Input::post('name');
            $coletivo->description = Input::post('description');
            $coletivo->metadata = serialize($metadata);

            if ($coletivo and $coletivo->save())
            {
                Session::set_flash('success', 'Coletivo salvo!');                
            }
            else
            {
                Session::set_flash('error', 'Não foi possivel salvar o coletivo');
            }
        }
        else
        {
            Session::set_flash('error', $val->error());
        }

        Response::redirect('users/perfil');

    }
}
