<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the admin_name and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
	    $admin_model = Admin::model();
	    $admin = $admin_model->find("admin_name=:admin_name or email=:email or phone=:phone", array(':admin_name'=>$this->username, ':email'=>$this->username, ':phone'=>$this->username));
	    	    
		if($admin == null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(!$admin->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
		    $this->_id = $admin['admin_id'];
		    $this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
	/**
	 * Validate if the admin_name or the phone or the email has exsit
	 * @return boolean whether authentication succeeds.
	 */
	public function validate()
	{
	    $admin_model = Admin::model();
	    $admin = $admin_model->find("admin_name='".$this->username."' or email='".$this->username."' or phone='".$this->username."'");
	    if($admin == null)
	        return true;
	    else
	        return false;
	}
	
	/**
	 * Get login admin'd id
	 * @return int.
	 */
	public function getId()
	{
	    return $this->_id;
	}
}
