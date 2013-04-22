<?php
class Controller_Admin_Usuario extends Controller_Admin
{

    public function action_index()
    {
        $users = Model_User::find('all');
        $admins = array();

        foreach ($users as $user) {            
            if($user->group === '50')
                array_push($admins, $user);
        }
        
        $data['usuarios'] = $users; 
        $data['admins'] = $admins; 

        $this->template->title = 'Usuarios'; 
        $this->template->content = View::forge('admin/usuario/view', $data);
    }

    public function action_promover($id = null)
    {
        if ($user = Model_User::find($id))
        {
            $user->group = 50;
            $user->save();

            Session::set_flash('success', 'Usuário promovido!');
        }
        else
        {
            Session::set_flash('error', 'Não foi possivel promover o usuário');
        }

        Response::redirect('admin/usuario');

    }

    public function action_degradar($id = null)
    {
        if ($user = Model_User::find($id))
        {
            $user->group = 1;
            $user->save();

            Session::set_flash('success', 'Usuário removido!');
        }
        else
        {
            Session::set_flash('error', 'Não foi possivel remover o usuário');
        }

        Response::redirect('admin/usuario');

    }

    public function action_remover($id = null)
    {
        if ($user = Model_User::find($id))
        {
            $user->delete();
            Session::set_flash('success', 'Usuário removido');
        }
        else
        {
            Session::set_flash('error', 'Não foi possivel remover o usuário');
        }

        Response::redirect('admin/usuario');

    }
  
}