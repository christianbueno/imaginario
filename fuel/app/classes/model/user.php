<?php
// modelo para usuários do site
class Model_User extends \Orm\Model
{
	protected static $_has_many = array('conteudos');
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'last_login',
		'login_hash',
		'profile_fields',
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

	public static function register(Fieldset $form)
    {
    	$form->add('username', 'Usuário:')->add_rule('required');
	    $form->add('password', 'Senha:', array('type'=>'password'))->add_rule('required');
	    $form->add('password2', 'Confirme a senha:', array('type' => 'password'))->add_rule('required');
	    $form->add('email', 'E-mail:')->add_rule('required')->add_rule('valid_email');
	    $form->add('submit', ' ', array('type'=>'submit', 'value' => 'Registrar'));
	    return $form;
    }

    public static function validate_registration(Fieldset $form, $auth)
    {
		$form->field('password')->add_rule('match_value', $form->field('password2')->get_attribute('value'));
		$val = $form->validation();
		if($val->run())
		{
			$username = $form->field('username')->get_attribute('value');
			$password = $form->field('password')->get_attribute('value');
			$email = $form->field('email')->get_attribute('value');
			try
			{
				$user = $auth->create_user($username, $password, $email);
			}
			catch (Exception $e)
			{
				$error = $e->getMessage();
			}
			if(isset($user))
			{
				$auth->login($username, $password);
			}
			else
			{
				if(isset($error))
				{
					$li = $error;
				}
				else
				{
					$li = 'Não foi possível criar o usuário, algum problema aconteceu :(';
				}
			$errors = Html::ul(array($li));
			return array('e_found' => true, 'errors' => $errors);
			}
		}
		else
		{
			$errors = $val->show_errors();
			return array('e_found' => true, 'errors' => $errors);
		}
    }
}
