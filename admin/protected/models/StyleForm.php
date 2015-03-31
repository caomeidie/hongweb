<?php

class StyleForm extends CFormModel
{
    public $stylename;
    public $roles;
        
    public function rules()
    {
        return array(
                array('stylename', 'required'),
                array('stylename', 'unique', 'className'=>'UserStyle', 'attributeName'=>'style_value'),
        );
    }
    
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'stylename' => '类型名',
                'roles' => '角色权限',
        );
    }
    
    /**
     * @return boolean add user's style
     */
    public function addStyle()
    {
        $style_model = new UserStyle();
        $style_model->style_value = $this->stylename;
        $style_model->roles = serialize($this->roles);
        
        return $style_model->save();
    }
}