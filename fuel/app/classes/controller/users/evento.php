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
                $conteudo = new Model_Conteudo();
                $conteudo->content = Controller_Admin_Coletivo::processUpload();
                $conteudo->type = 'image';
                $conteudo->coletivo_id = $id;
                $conteudo->user_id = $auth->get_user_id()[1];

                $metadata = array(
                    'name' => Input::post('name'),
                    'description' => Input::post('description'),
                );

                $conteudo->metadata = serialize($metadata);

                if ($conteudo->save())
                {
                    Session::set_flash('success', 'Imagem adicionada!');                    
                }
                else
                {
                    Session::set_flash('error', 'Ocorreu um problema ao adicionar a imagem, tente novamente.');
                }

            }
            else
            {
                Session::set_flash('error', 'É necessário escolher uma imagem para adicionar');
            }

            Response::redirect("users/conteudo/adicionar/$id");

        }


        $conteudos = Model_Conteudo::find('all', array(
            'where' => array(
                    array('coletivo_id', $id),                
                    array('user_id', $auth->get_user_id()[1]),                
            )
        ));

        foreach ($conteudos as $conteudo) {
            $conteudo->info = unserialize($conteudo->metadata);
        }

        $data['conteudos'] = $conteudos;
        $this->template->title = 'Meu conteudo'; 
        $this->template->content = View::forge('users/conteudo/adicionar', $data);
    }

    public function action_remover($coletivo_id = null, $conteudo_id = null) 
    {
        $conteudo = Model_Conteudo::find($conteudo_id);
        $conteudo->delete();

        Response::redirect("users/conteudo/adicionar/$coletivo_id");
    }
  
}