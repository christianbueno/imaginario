<?php
class Controller_Users_Conteudo extends Controller_Users
{
    // essa classe necessita de crop para 200x200 
    public function before()
    {
        $user = Auth::instance()->get_user_id();        
        if( $user[1] === 0 )                   
            Response::redirect('users/login');

        parent::before();
    }
    public function action_adicionar($id = null)
    {
        $auth = Auth::instance();
        $user = $auth->get_user_id();
        if (Input::method() == 'POST')
        {
            if (Upload::is_valid())
            {               
                $conteudo = new Model_Conteudo();
                $conteudo->content = Controller_Admin_Coletivo::processUpload();
                $conteudo->type = 'image';
                $conteudo->coletivo_id = $id;
                $conteudo->user_id = $user[1];

                Image::load(DOCROOT.DS."arquivos/$conteudo->content")->crop_resize(200,200)->save(DOCROOT.DS.'arquivos/thumb-'.$conteudo->content);


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
                    array('user_id', $user[1]),                
            )
        ));

        foreach ($conteudos as $conteudo) {
            $conteudo->info = unserialize($conteudo->metadata);
        }

        $data['conteudos'] = $conteudos;
        $this->template->title = 'Meu conteudo'; 
        $this->template->content = View::forge('users/conteudo/view', $data);
    }

    public function action_remover($coletivo_id = null, $conteudo_id = null) 
    {
        $conteudo = Model_Conteudo::find($conteudo_id);
        $conteudo->delete();
        File::delete(DOCROOT.DS.'arquivos/thumb-'.$conteudo->content);
        File::delete(DOCROOT.DS.'arquivos/'.$conteudo->content);
        Response::redirect("users/conteudo/adicionar/$coletivo_id");
    }

    public function action_crop($coletivo_id = null, $conteudo_id = null) 
    {
        is_null($conteudo_id) and Response::redirect("users/conteudo/adicionar/$coletivo_id");
        
        $conteudo = Model_Conteudo::find($conteudo_id);
        $conteudo->info = unserialize($conteudo->metadata);
        if (Input::method() == 'POST')
        {
            if(Input::post('coords') === '') {
                Session::set_flash('error', 'Escolha um crop para a imagem');                  
            }
            else
            {
                $conteudo->info['coords'] = Input::post('coords');
                $conteudo->metadata = serialize($conteudo->info);

                list($c1,$c2,$c3,$c4) = explode(' ',Input::post('coords'));
                File::delete(DOCROOT.DS.'arquivos/thumb-'.$conteudo->content);
                Image::load(DOCROOT.DS."arquivos/$conteudo->content")->crop($c1, $c2, $c3, $c4)->save(DOCROOT.DS.'arquivos/thumb-'.$conteudo->content);

                $conteudo->save();

                Session::set_flash('success', 'Crop salvo!');      
                Response::redirect("users/conteudo/adicionar/$coletivo_id");
            }
        } 


        $data['conteudo'] = $conteudo;

        $this->template->content = View::forge('users/conteudo/crop', $data);
    }
  
}