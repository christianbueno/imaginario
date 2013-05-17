<?php

class View_Eventos_Lista extends ViewModel
{
    public $_view = 'web/eventos/lista';
    public static $meses = array(
                            1=>'Janeiro',
                            2=>'Fevereiro',
                            3=>'Março',
                            4=>'Abril',
                            5=>'Maio',
                            6=>'Junho',
                            7=>'Julho',
                            8=>'Agosto',
                            9=>'Setembro',
                            10=>'Outubro',
                            11=>'Novembro',
                            12=>'Dezembro'
                            );

    public function view()
    {
        $eventos = Model_Evento::find('all', array(
            'order_by' => array('when' => 'desc'),
        ));

        foreach ($eventos as $evento) {
            $evento->coletivo = Model_Coletivo::find($evento->coletivo_id);
            $evento->info = unserialize($evento->metadata);            

            $evento->day = (int)Date::forge((int)$evento->when)->format("%d");            
            $evento->icon = '/assets/img/eventos/'.$evento->info['type'].'.png';
            $evento->latlng = $evento->info['latlng'];  
            $evento->endereco = $evento->info['address'];    
        }
        

        $imonth = (int)$this->month;
        $iyear = (int)$this->year;
        $eventos = Arr::filter_recursive($eventos, function($evento){             
            $date = Date::forge((int)$evento->when);
            return (((int)$date->format("%m") === $imonth) && ((int)$date->format("%Y") === $iyear)); 
        });
        if($this->day)
            $eventos = Arr::filter_recursive($eventos, function($evento){             
                $date = Date::forge((int)$evento->when);
                return (int)$date->format("%d") === (int)$this->day; 
            });
        $this->eventos = $eventos;
        $this->meses = self::$meses;
    }


}
 