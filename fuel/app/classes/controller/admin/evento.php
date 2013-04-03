<?php
class Controller_Admin_Evento extends Controller_Admin
{

    public function action_index()
    {
        $eventos = Model_Evento::find('all');

        foreach ($eventos as $evento) {
            $evento->info = unserialize($evento->metadata);
        }

        $data['eventos'] = $eventos;

        $this->template->title = 'Eventos'; 
        $this->template->content = View::forge('admin/eventos/view', $data);
    }

    public function action_remover($id)
    {
        if ($evento = Model_Evento::find($id))
        {
            $evento->delete();
            Session::set_flash('success', 'Evento removido');
        }
        else
        {
            Session::set_flash('error', 'Não foi possivel remover o evento');
        }

        Response::redirect('admin/evento');
    }
}