<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
	    $users_model = Users::model();
	    $users = $users_model->find("username=:username or email=:email or phone=:phone", array(':username'=>$this->username, ':email'=>$this->username, ':phone'=>$this->username));
	    	    
		if($users == null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(!$users->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
	
	/**
	 * Validate if the username or the phone or the email has exsit
	 * @return boolean whether authentication succeeds.
	 */
	public function validate()
	{
	    $users_model = Users::model();
	    $users = $users_model->find("username='".$this->username."' or email='".$this->username."' or phone='".$this->username."'");
	    if($users == null)
	        return true;
	    else
	        return false;
	}
}