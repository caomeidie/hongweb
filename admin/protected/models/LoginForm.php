<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * admin login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $admin_name;
	public $password;
	public $rememberMe;
	public $verifyCode;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that admin_name and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// admin_name and password are required
			array('admin_name, password, verifyCode', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		    array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
		    'admin_name'=>'用户名',
		    'password'=>'密码',
			'rememberMe'=>'下次记住我？',
		    'verifyCode' =>'验证码',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->admin_name,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','用户名或密码有误.');
		}
	}

	/**
	 * Logs in the admin using the given admin_name and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->admin_name,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
