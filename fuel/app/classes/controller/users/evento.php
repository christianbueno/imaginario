<?php
class Controller_Users_Evento extends Controller_Users
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
        if (Input::method() === 'POST')
        {            
            $val = Model_Evento::validate();
            if ($val->run())
            {               
                $evento = new Model_Evento();                
                $evento->title = Input::post('title');
                $evento->description = Input::post('description');

                list($dd,$mm,$yyyy) = explode('/',Input::post('when'));

                if(strlen($dd) === 1)
                    $dd = "0$dd";

                if(strlen($mm) === 1)
                    $mm = "0$mm";

                $evento->when = Date::create_from_string("$dd/$mm/$yyyy" , 'eu')->get_timestamp();

                $evento->coletivo_id = $id;
                $evento->user_id = $user[1];

                $metadata = array(
                    'type' => Input::post('type'),
                    'latlng' => Input::post('latlng'),
                    'address' => Input::post('address'),
                );

                $evento->metadata = serialize($metadata);

                if ($evento->save())
                {
                    Session::set_flash('success', 'Evento adicionado!');      
                    Response::redirect("users/evento/adicionar/$id");              
                }
                else
                {
                    Session::set_flash('error', 'Ocorreu um problema ao adicionar o evento, tente novamente.');
                }

            }
            else
            {
                $retorno = new Model_Evento();
                $retorno->title = Input::post('title');
                $retorno->description = Input::post('description');
                $retorno->when = Input::post('when');
                $retorno->address = Input::post('address');
                $retorno->latlng = Input::post('latlng');

                $this->template->set_global('evento', $retorno, false);
                Session::set_flash('error', $val->error());
                
            }
            

        }


        $eventos = Model_Evento::find('all', array(
            'where' => array(
                    array('coletivo_id', $id),                
                    array('user_id', $user[1]),                
            )
        ));

        foreach ($eventos as $evento) {
            $evento->info = unserialize($evento->metadata);
        }

        $data['eventos'] = $eventos;
        $this->template->title = 'Meu evento'; 
        $this->template->content = View::forge('users/evento/view', $data);
    }

    public function action_remover($coletivo_id = null, $evento_id = null) 
    {
        $evento = Model_Evento::find($evento_id);
        $evento->delete();

        Response::redirect("users/evento/adicionar/$coletivo_id");
    }
  
}