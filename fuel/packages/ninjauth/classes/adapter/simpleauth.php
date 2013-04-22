<?php

namespace NinjAuth;

use Auth;

class Adapter_SimpleAuth extends Adapter
{
	public function is_logged_in()
	{
		return Auth::check();
	}

	public function get_user_id()
	{
		list($driver, $user_id) = Auth::instance()->get_user_id();
		return $user_id;
	}

	public function force_login($user_id)
	{
		return Auth::instance()->force_login($user_id);
	}

	public function create_user(array $user)
	{
		try
		{
			$user_id = Auth::instance()->create_user(

				// Username
				isset($user['username']) ? $user['username'] : null,

				// Password (random string will do if none provided)
				isset($user['password']) ? $user['password'] : \Str::random(),

				// Email address 
				isset($user['email']) ? $user['email'] : null

			);
			if(isset($user_id))
				$this::force_login($user_id);

		    return $user_id ?: false;
		}
		catch (SimpleUserUpdateException $e)
		{
		    \Session::set_flash('ninjauth.error', $e->getMessage());
		}

		return false;
	}

	public function can_auto_login(array $user)
	{
		// To automatically register with SimpleAuth you only need one or the other
		return isset($user['username']) and isset($user['email']) and isset($user['password']);
	}
}
