<?php
/**
 * RegisterForm class.
 * user register form data. It is used by the 'register' action of 'SiteController'.
 */

class RegisterForm extends CFormModel
{
    public $username;
    public $password;
    public $checkpwd;
    public $email;
    public $phone;
    
    private $_identity;
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
                // username and password are required
                array('username, password, checkpwd', 'required'),
                array('checkpwd', 'compare', 'compareAttribute'=>'password'),
        );
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'username' => '用户名',
                'password' => '密码',
                'checkpwd' => '确认密码',
                'email' => 'Email',
                'phone' => '手机号',
        );
    }
    
    /**
     * @return boolean whether register is successful
     */
    public function register()
    {   
        $user_model = User::model();
        $user_model->attributes
        $this->_identity=new UserIdentity($this->username, $this->password);
        return $this->_identity->validate();
    }
}