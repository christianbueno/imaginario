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
        $error = false;

        if (Input::method() == 'POST')
        {
            $conteudo = new Model_Conteudo();
            $conteudo->coletivo_id = $id;
            $conteudo->user_id = $user[1];
            $conteudo->type = Input::post('type');
            $metadata = array(
                    'name' => Input::post('name'),
                    'description' => Input::post('description'),
            );
            $conteudo->metadata = serialize($metadata);

            if($conteudo->type === 'video') {
                parse_str( parse_url( Input::post('content') , PHP_URL_QUERY ), $url );
                $error = !(isset($url) and isset($url['v']));
                if($error)
                    Session::set_flash('error', 'Verifique se a URL informada é uma URL válida e contem o parametro v');
                else
                    $conteudo->content = $url['v'];
            }

            if($conteudo->type === 'image') {
                if (Upload::is_valid())
                {               
                    $conteudo->content = Controller_Admin_Coletivo::processUpload();
                    $conteudo->type = 'image';

                    Image::load(DOCROOT.DS."arquivos/$conteudo->content")->crop_resize(200,200)->save(DOCROOT.DS.'arquivos/thumb-'.$conteudo->content);                                   
                }
                else
                {
                    $error = true;
                    Session::set_flash('error', 'É necessário escolher uma imagem para enviar');
                }
            }

            if(!$error)
            {
                if($conteudo->save())
                    Session::set_flash('success', 'Conteudo enviado!');                   
                else
                    Session::set_flash('success', 'Ocorreu um problema ao tentar salvar o conteudo');                   
            }
            $data['conteudo'] = $conteudo;
            //Response::redirect("users/conteudo/adicionar/$id");

        }


        $conteudos = Model_Conteudo::find('all', array(
            'where' => array(
                    array('coletivo_id', $id),                
                    array('user_id', $user[1]),                
            ),
            'order_by' => array('created_at' => 'desc'),
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

        if($conteudo->type === 'image')  
        {
            File::delete(DOCROOT.DS.'arquivos/thumb-'.$conteudo->content);
            File::delete(DOCROOT.DS.'arquivos/'.$conteudo->content);
        }

        $conteudo->delete();

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