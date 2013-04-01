<?php
return array(
	'version' => 
	array(
		'app' => 
		array(
			'default' => 
			array(
				0 => '001_create_media',
				1 => '002_create_coletivos',
				2 => '003_create_events',
				3 => '004_create_users',
				4 => '006_create_eventos',
				5 => '007_create_conteudos',
				6 => '008_create_ownerships',
			),
		),
		'module' => 
		array(
		),
		'package' => 
		array(
			'ninjauth' => 
			array(
				0 => '001_create_authentications',
				1 => '002_add_refresh_tokens',
				2 => '003_Allow_null_secret',
			),
		),
	),
	'folder' => 'migrations/',
	'table' => 'migration',
);
