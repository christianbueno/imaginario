<?php

class View_Inicio extends ViewModel
{
    public $_view = 'web/inicio';

    public function view()
    {
        $images = Model_Conteudo::find('all', array(
            'where' => array(
                    array('type', 'image'),                                    
            )
        ));
        foreach ($images as $image) {
            $image->info = unserialize($image['metadata']);
            $image->coletivo = Model_Coletivo::find($image->coletivo_id);
            $image->coletivo->info = unserialize($image->coletivo->metadata);
        }                

        $this->renderSlider = function($images)
        {
            $keys = array_keys($images);
            $slider = '';
            for ($i = 0; $i < 20; $i++) { 
                if(isset($keys[$i]))
                {
                    $image = Html::img('arquivos/thumb-'.$images[$keys[$i]]->content);
                    $coletivo_id = $images[$keys[$i]]->coletivo->id;
                    $coletivo_name = $images[$keys[$i]]->coletivo->name;                
                    $url = "coletivos/$coletivo_name/$coletivo_id";

                    $color = isset($images[$keys[$i]]->coletivo->info['color']) ? $images[$keys[$i]]->coletivo->info['color'] : '';

                    $content = "<span style='background-color:#$color;'>" .  $images[$keys[$i]]->coletivo->name . '</span>' . $image;
                } 
                else 
                {
                    $content = Html::img('arquivos/default-kaled.gif');
                    $url = "javascript:void(0)";
                }

                $ref = $i+1;

                switch ($ref) {
                    case '4':
                        $output = "pos-$ref i-medium";
                        break;
                    case '5':
                        $output = "pos-$ref i-medium";
                        break;                            
                    case '9':
                        $output = "pos-$ref i-large";
                        break;   
                    case '14':
                        $output = "pos-$ref i-medium";
                        break;
                    case '15':
                        $output = "pos-$ref i-medium";
                        break;                
                    case '16':
                        $output = "pos-$ref i-large";
                        break;                            
                    case '20':
                        $output = "pos-$ref i-large";
                        break;                                  
                    default:
                        $output = "pos-$ref i-small";
                        break;
                }

                $slider .= Html::anchor($url, $content, array('class' => $output));                 
            }

            echo $slider;
        };
        $this->images = $images;
    }
    
    public function classify($ref) 
    {


        return $output;
        
    }


}
         

