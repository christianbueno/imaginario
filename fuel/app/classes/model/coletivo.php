<?php
// modelo para o coletivo, indica uma entidade que agrega conteudos 
class Model_Coletivo extends \Orm\Model
{
	protected static $_has_many = array('conteudos', 'eventos');
	protected static $_properties = array(
		'id',
		'name',
		'description',
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

	public static function validate_admin()
	{
		$val = Validation::forge();
		$val->add_field('name', 'Nome', 'required|min_length[3]|max_length[150]');
		$val->add_field('description', 'Descrição', 'required|min_length[3]|max_length[5000]');
		$val->add_field('color', 'Cor', 'required|exact_length[6]');	
		$val->add_field('admins', 'Colaboradores', 'required|valid_emails[;]');		

		return $val;
	}
	public static function validate_web()
	{
		$val = Validation::forge();
		$val->add_field('name', 'Nome', 'required|min_length[3]|max_length[150]');
		$val->add_field('color', 'Cor', 'required|exact_length[6]');	
		$val->add_field('description', 'Descrição', 'required|min_length[3]|max_length[5000]');

		return $val;
	}	
}
