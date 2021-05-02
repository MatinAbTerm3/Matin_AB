<?php

if(! class_exists('Authentication'))
{
	class Authentication
	{
		static function login($uid)
		{
			$_SESSION['uid'] = $uid;
			$_SESSION['lastLogin'] = time();
		}
		
		static function uid()
		{
			return $_SESSION['uid'];
		}
		
		static function check()
		{
			return isset($_SESSION['uid']);
		}
		
		static function logout()
		{
			unset($_SESSION['uid']);
		}
		
		static function autoLogout()
		{
			if(time() - $_SESSION['lastLogin'] > 30 * 24 * 60 * 60) //30 days
				self::logout();
			if(time() - $_SESSION['lastActivity'] > 5) // 10 min
				self::logout();
			$_SESSION['lastActivity'] = time();
		}
	}
}

?>