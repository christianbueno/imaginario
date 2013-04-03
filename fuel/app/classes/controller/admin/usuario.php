<?php
class Controller_Admin_Usuario extends Controller_Admin
{

    public function action_index()
    {
        $data['usuarios'] = Model_User::find('all');
        
        $this->template->title = 'Usuarios'; 
        $this->template->content = View::forge('admin/usuario/view', $data);
    }


    public function action_remover($id = null)
    {
        if ($user = Model_User::find($id))
        {
            $user->delete();
            Session::set_flash('success', 'Coletivo removido');
        }
        else
        {
            Session::set_flash('error', 'Não foi possivel remover o coletivo');
        }

        Response::redirect('admin/coletivo');

    }
  
}