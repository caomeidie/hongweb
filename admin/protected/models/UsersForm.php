<?php

/**
 * UsersForm class.
 * UsersForm is the data structure for keeping
 * add user form data. It is used by the 'add' action of 'UsersController'.
 */
class UsersForm extends CFormModel
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
                array('email', 'email'),
                array('username', 'unique', 'className'=>'Users', 'attributeName'=>'username'),
                array('email', 'unique', 'className'=>'Users', 'attributeName'=>'email'),
                array('phone', 'unique', 'className'=>'Users', 'attributeName'=>'phone'),
                array('phone', 'match', 'pattern' =>'/^(1(([35][0-9])|(47)|[8][01236789]))\d{8}$/'),
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
     * @return boolean whether add user is successful
     */
    public function addUser()
    {
        $this->_identity=new UserIdentity($this->username, $this->password);
        if($this->_identity->validate()){
            $users_model = new Users();
            $users_model->username = $this->username;
            $users_model->password = CPasswordHelper::hashPassword($this->password);
            $users_model->email = $this->email;
            $users_model->phone = $this->phone;
            $users_model->addtime = time();
            $users_model->updatetime = time();
            $users_model->logintimes = 1;
            $users_model->lastip = Yii::app()->request->userHostAddress;
            
            if(!$users_model->save()){
                return false;
            }else{
                return true;
            }            
        }else{
            return false;
        }
    }
    
    public function editUser(){
        
    }
}
