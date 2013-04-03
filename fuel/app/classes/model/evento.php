<?php
// um evento pertence a algum coletivo, tem data marcada para acontecer e dados especificos
class Model_Evento extends \Orm\Model
{
	protected static $_belongs_to = array('coletivo', 'user');
	protected static $_properties = array(
		'id',
		'coletivo_id',
		'user_id',
		'title',
		'description',
		'when',		
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

	public static function validate()
	{
		$val = Validation::forge();
		
		$val->add_field('title', 'Título', 'required|min_length[3]|max_length[150]');
		$val->add_field('description', 'Descrição', 'required|min_length[3]|max_length[5000]');
		$val->add_field('address', 'Onde', 'required|min_length[3]|max_length[5000]');
		$val->set_message('date', 'A data do campo :label é inválida.');
		$val->add_field('when', 'Quando', 'required')->add_rule(array('date' => function($val) {
			$passed = false;
			if(count(explode('/',$val)) === 3){
				list($dd,$mm,$yyyy) = explode('/',$val);
				$passed = checkdate($mm,$dd,$yyyy);
			}
			return $passed; 
		}));

		return $val;
	}
}
