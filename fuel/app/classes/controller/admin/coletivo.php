<?php
class Controller_Admin_Coletivo extends Controller_Admin
{

    public function action_index()
    {
        $data['coletivos'] = Model_Coletivo::find('all');
        
        $this->template->title = 'Coletivos'; 
        $this->template->content = View::forge('admin/coletivo/view', $data);
    }

    public function action_adicionar()
    {
        
        if (Input::method() == 'POST')
        {

            $val = Model_Coletivo::validate_admin();
            
            if ($val->run())
            {
                $metadata = array(
                    'admins' => explode(';', Input::post('admins')),
                    'logo' => $this->processUpload(),
                    'endereco' => Input::post('address'),
                    'cor' => Input::post('color'),
                    'latlng' => Input::post('latlng'),
                );
                $coletivo = Model_Coletivo::forge(array(
                    'name' => Input::post('name'),                    
                    'description' => Input::post('description'),
                    'metadata' => serialize($metadata),
                ));

                if ($coletivo and $coletivo->save())
                {
                    Session::set_flash('success', 'Coletivo salvo!');

                    Response::redirect('admin/coletivo');
                }

                else
                {
                    Session::set_flash('error', 'Não foi possivel salvar o coletivo');
                }
            }
            else
            {
                $retorno = new Model_Coletivo();
                $retorno->name = Input::post('name');
                $retorno->description = Input::post('description');
                $retorno->admins = Input::post('admins');
                $retorno->address = Input::post('address');
                $retorno->latlng = Input::post('latlng');
                $retorno->color = Input::post('color');

                $this->template->set_global('coletivo', $retorno, false);
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = 'Adicionar coletivo';
        $this->template->content = View::forge('admin/coletivo/add');
    }

    public function action_editar($id = null)
    {
        
        $coletivo = Model_Coletivo::find($id);        
        $metadata = unserialize($coletivo->metadata);        
        
        $coletivo->admins = implode(';',$metadata['admins']);
        $coletivo->image = $metadata['logo'];
        $coletivo->address = $metadata['endereco'];
        $coletivo->latlng = $metadata['latlng'];
        $coletivo->color = isset($metadata['cor']) ? $metadata['cor'] : '';

        $this->template->set_global('coletivo', $coletivo, false);


        if (Input::method() == 'POST')
        {
            $val = Model_Coletivo::validate_admin();
            
            if ($val->run())
            {
                $metadata['admins'] = explode(';',Input::post('admins'));
                if(Upload::is_valid()) 
                    $metadata['logo'] = $this->processUpload();
                $metadata['endereco'] = Input::post('address');
                $metadata['latlng'] = Input::post('latlng');
                $metadata['cor'] = Input::post('color');
                
                $coletivo->name = Input::post('name');
                $coletivo->description = Input::post('description');
                $coletivo->metadata = serialize($metadata);

                if ($coletivo and $coletivo->save())
                {
                    Session::set_flash('success', 'Coletivo salvo!');
                    Response::redirect('admin/coletivo');
                }

                else
                {
                    Session::set_flash('error', 'Não foi possivel salvar o coletivo');
                }
            }
            else
            {
                $retorno = new Model_Coletivo();

                $retorno->id = $coletivo->id;
                $retorno->name = Input::post('name');
                $retorno->description = Input::post('description');
                $retorno->admins = Input::post('admins');
                $retorno->address = Input::post('address');
                $retorno->latlng = Input::post('latlng');
                $retorno->color = Input::post('color');

                $this->template->set_global('coletivo', $retorno, false);
                Session::set_flash('error', $val->error());
            }
        }    

        $this->template->title = 'Editar coletivo';
        $this->template->content = View::forge('admin/coletivo/edit');
    }

    public function action_remover($id = null)
    {
        if ($coletivo = Model_Coletivo::find($id))
        {
            $coletivo->delete();
            Session::set_flash('success', 'Coletivo removido');
        }
        else
        {
            Session::set_flash('error', 'Não foi possivel remover o coletivo');
        }

        Response::redirect('admin/coletivo');

    }
    public static function processUpload() {
        $config = array(
            'path' => DOCROOT.DS.'arquivos',
            'prefix' => 'coletivo',
            'randomize' => true,
            'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
        );

        Upload::process($config);

        if (Upload::is_valid())
        {
            // save them according to the config
            Upload::save();

           //if you want to save to tha database lets grab the file name
            $value = Upload::get_files();  
            $imgsrc = $value[0]['saved_as'];
        } 
        else 
        {
            $imgsrc = 'notfound.gif';
        }
        return $imgsrc;
    }    
}