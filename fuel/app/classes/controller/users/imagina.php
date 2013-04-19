<?php
class Controller_Users_Imagina extends Controller_Rest
{
    protected $format = 'json';  

    public function router($resource, array $arguments)
    {  
        if ( ! \Auth::check())
        {
            $this->response(array('error'=> 'true', 'message'=> 'unauthorized'), 401);
        }
        else
        {
             return parent::router($resource, $arguments);
        }   
    }    

    public function get_conteudo($id = null)
    {          
        if($id){
            $auth = Auth::instance();
            $conteudos = $auth->get_profile_fields('conteudos');
                    
            if(!isset($conteudos)) 
                $conteudos = array();

            if(!in_array((int)$id, $conteudos)){
                array_push($conteudos, (int)$id);
                $value = $conteudos;
                $message = 'Remover';

            } else {
                unset($conteudos[array_search($id, $conteudos)]);
                $value = $conteudos;
                $message = 'Salvar';
            }

            $error = !$auth->update_user(
                    array(
                        'conteudos' => $value,
                    ));

            if($error)
                $message = 'problema ao salvar o conteudo :(';

        } else {
            $error = true;
            $message = 'id obrigatório';
        }

        return $this->response(array(
            'error' => $error,
            'message' => $message,
        ));
    }


  
}