<?php
return array(
	'_root_'  => 'router/inicio',  // The default route
	'_404_'   => 'router/404',    // The main 404 route	
	
    
    'coletivos(/:name)' => array('coletivos/ver', 'name' => 'hello'),
    
    
);