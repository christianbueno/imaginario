<?php
return array(
	'_root_'  => 'router/index',  // The default route
	'_404_'   => 'router/404',    // The main 404 route
	
	'hello(/:name)?' => array('router/hello', 'name' => 'hello'),
);