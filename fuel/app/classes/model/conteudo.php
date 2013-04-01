<?php
// modelo para o conteudo de um coletivo, podem ser links, videos, imagens, texto ou arquivos de som
class Model_Conteudo extends \Orm\Model
{
	protected static $_belongs_to = array('coletivo', 'user');
	protected static $_properties = array(
		'id',
		'content',
		'coletivo_id',
		'user_id',
		'type', // todos os conteudo do type IMAGE são exibidos no slider da index da controller INICIO
		'metadata',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

}
