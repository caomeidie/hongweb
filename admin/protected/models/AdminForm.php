<?php

/**
 * AdminForm class.
 * AdminForm is the data structure for keeping
 * add admin form data. It is used by the 'add' action of 'AdminController'.
 */
class AdminForm extends CFormModel
{
    public $admin_name;
    public $password;
    public $checkpwd;
    public $email;
    public $phone;
    public $style_id;
    
    private $_identity;
    /**
     * Declares the validation rules.
     * The rules state that admin_name and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
                // admin_name, password, checkpwd and style_id are required
                array('admin_name, password, checkpwd, style_id', 'required'),
                array('checkpwd', 'compare', 'compareAttribute'=>'password'),
                array('email', 'email'),
                array('admin_name', 'unique', 'className'=>'Admin', 'attributeName'=>'admin_name'),
                array('email', 'unique', 'className'=>'Admin', 'attributeName'=>'email'),
                array('phone', 'unique', 'className'=>'Admin', 'attributeName'=>'phone'),
                array('phone', 'match', 'pattern' =>'/^(1(([35][0-9])|(47)|[8][01236789]))\d{8}$/'),
        );
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'admin_name' => '用户名',
                'password' => '密码',
                'checkpwd' => '确认密码',
                'email' => 'Email',
                'phone' => '手机号',
                'style_id' => '类型',
        );
    }
    
    /**
     * @return boolean whether add admin is successful
     */
    public function addAdmin()
    {
        $this->_identity=new UserIdentity($this->admin_name, $this->password);
        if($this->_identity->validate()){
            $admin_model = new Admin();
            $admin_model->admin_name = $this->admin_name;
            $admin_model->password = CPasswordHelper::hashPassword($this->password);
            $admin_model->email = $this->email;
            $admin_model->phone = $this->phone;
            $admin_model->addtime = time();
            $admin_model->updatetime = time();
            $admin_model->logintimes = 1;
            $admin_model->lastip = Yii::app()->request->userHostAddress;
            $admin_model->style_id = $this->style_id;
            
            if(!$admin_model->save()){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
}
