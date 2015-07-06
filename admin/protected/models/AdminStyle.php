<?php

/**
 * This is the model class for table "admin_style".
 *
 * The followings are the available columns in table 'admin_style':
 * @property string $style_id
 * @property string $style_value
 * @property string $roles
 */
class AdminStyle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
	    return '{{admin_style}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive admin inputs.
		return array(
			array('style_value, roles', 'required'),
			array('style_value', 'length', 'max'=>50),
		    array('style_value', 'unique', 'attributeName'=>'style_value'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('style_id, style_value, roles', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		        'Admin'=>array(self::HAS_MANY, 'Admin', 'style_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'style_id' => 'Style',
			'style_value' => 'Style Value',
			'roles' => 'Roles',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('style_id',$this->style_id,true);
		$criteria->compare('style_value',$this->style_value,true);
		$criteria->compare('roles',$this->roles,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminStyle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return boolean add admin's style
	 */
	public function addStyle()
	{
	    $this->roles = serialize($this->roles);	
	    return $this->save();
	}
	
	/**
	 * Get admin's style & roles
	 * @param int $id
	 * @return Array or null
	 */
	public function getStyle($id){
	    return $this->findByPk($id);
	}
	
	/**
	 * Get adminstyles by condition
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function stylesList($order='style_id ASC', $limit=0, $offset=0){
	    $arr = array(
	            'order'=>$order,
	    );
	     
	    $arr = $limit ? array_merge($arr, array('limit'=>$limit)) : $arr;
	    $arr = $limit && $offset ? array_merge($arr, array('offset'=>$offset)) : $arr;
	
	    $styleList = $this->findAll($arr);
	    $role_model = new Roles();
	    $rolesList = $role_model->getAllRoles();//获取所有权限列表
	    foreach ($styleList as $key=>$value){
	        $roleArr = array();
	        $roleArr = unserialize($value['roles']);//获取当前用户的权限
	        $roleStr = '';
	        
	        foreach($rolesList as $role){
	            if(in_array($role['role_id'], $roleArr)){
	                $roleStr = $roleStr.$role['role_desc'].' ';
	            }
	        }
	        	        
	        $styleList[$key]['roles'] = $roleStr;
	    }
	    return $styleList;
	}
	
	/**
	 * Count adminstyle's number
	 */
	public function stylesCount(){
	
	    $arr = array(
	            'condition'=>"1",
	    );
	
	    return $this->count('1=1');
	}
	
	/**
	 * update adminstyle
	 * @param $style_id int
	 */
	public function editStyle($style_id){
	    return $this->updateByPk($style_id, array('style_value'=>$this->style_value, 'roles'=>serialize($this->roles)));
	}
	
	/**
	 * drop style
	 * @param $style_id string or int
	 */
	public function styleDropOne($style_id){
	     
	    return $this->deleteByPk($style_id);
	}
	
	/**
	 * drop styles
	 * @param $style_id array
	 */
	public function styleDropAll($style_id){
	
	    return $this->deleteAll("style_id IN(".$style_id.")");
	}
}
