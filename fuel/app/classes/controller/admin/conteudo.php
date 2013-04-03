<?php
class Controller_Admin_Conteudo extends Controller_Admin
{

    public function action_index()
    {
        $conteudos = Model_Conteudo::find('all');

        foreach ($conteudos as $conteudo) {
            $conteudo->info = unserialize($conteudo->metadata);
        }

        $data['conteudos'] = $conteudos;       


        $this->template->title = 'Conteudos'; 
        $this->template->content = View::forge('admin/conteudo/view', $data);
    }

    public function action_remover($id)
    {
        if ($conteudo = Model_Conteudo::find($id))
        {
            $conteudo->delete();
            Session::set_flash('success', 'Conteudo removido');
        }
        else
        {
            Session::set_flash('error', 'Não foi possivel remover o conteudo');
        }

        Response::redirect('admin/conteudo');
    }
}