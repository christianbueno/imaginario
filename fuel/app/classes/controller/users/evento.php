<?php
class Controller_Users_Evento extends Controller_Users
{
    // essa classe necessita de crop para 200x200 
    public function before()
    {        
        if( Auth::instance()->get_user_id()[1]===0 )                   
            Response::redirect('users/login');

        parent::before();
    }
    public function action_adicionar($id = null)
    {
        $auth = Auth::instance();
        if (Input::method() == 'POST')
        {
            if (Upload::is_valid())
            {               
                $evento = new Model_evento();
                $evento->content = Controller_Admin_Coletivo::processUpload();
                $evento->type = 'image';
                $evento->coletivo_id = $id;
                $evento->user_id = $auth->get_user_id()[1];

                $metadata = array(
                    'name' => Input::post('name'),
                    'description' => Input::post('description'),
                );

                $evento->metadata = serialize($metadata);

                if ($evento->save())
                {
                    Session::set_flash('success', 'Evento adicionado!');                    
                }
                else
                {
                    Session::set_flash('error', 'Ocorreu um problema ao adicionar o evento, tente novamente.');
                }

            }
            else
            {
                Session::set_flash('error', 'É necessário escolher uma imagem para adicionar');
            }

            Response::redirect("users/evento/adicionar/$id");

        }


        $eventos = Model_Evento::find('all', array(
            'where' => array(
                    array('coletivo_id', $id),                
                    array('user_id', $auth->get_user_id()[1]),                
            )
        ));

        foreach ($eventos as $evento) {
            $evento->info = unserialize($evento->metadata);
        }

        $data['eventos'] = $eventos;
        $this->template->title = 'Meu evento'; 
        $this->template->content = View::forge('users/evento/adicionar', $data);
    }

    public function action_remover($coletivo_id = null, $evento_id = null) 
    {
        $evento = Model_Evento::find($evento_id);
        $evento->delete();

        Response::redirect("users/evento/adicionar/$coletivo_id");
    }
  
}