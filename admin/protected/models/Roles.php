<?php

/**
 * This is the model class for table "roles".
 *
 * The followings are the available columns in table 'roles':
 * @property string $role_id
 * @property string $role_value
 * @property string $action
 * @property string $role_desc
 * @property string $parent_role_id
 * @property integer $related_role_id
 */
class Roles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{roles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_value, action, parent_role_id', 'required'),
			array('related_role_id', 'numerical', 'integerOnly'=>true),
			array('role_value', 'length', 'max'=>50),
			array('action, role_desc', 'length', 'max'=>255),
			array('parent_role_id', 'length', 'max'=>11),
		    array('role_value', 'unique', 'attributeName'=>'role_value'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('role_id, role_value, action, role_desc, parent_role_id, related_role_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'role_id' => 'Role',
			'role_value' => 'Role Value',
			'action' => 'Action',
			'role_desc' => 'Role Desc',
			'parent_role_id' => '父权限role_id',
			'related_role_id' => '同级权限相关的role_id',
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

		$criteria->compare('role_id',$this->role_id,true);
		$criteria->compare('role_value',$this->role_value,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('role_desc',$this->role_desc,true);
		$criteria->compare('parent_role_id',$this->parent_role_id,true);
		$criteria->compare('related_role_id',$this->related_role_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Roles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get role by $value and class $type
	 * @param string or int $value.(action's name or role_id)
	 * @param string $type(NAME, ID) defaule 'NAME'
	 * @param string or null $c_val(controller's name), default site, when $type is ID $c_val is unuseful.
	 * @return array or null
	 */
	public function getRole($value, $type='NAME', $c_val='site')
	{
	    if($type == 'NAME'){
	        $value = ($c_val == 'site' && $value == 'index') ? 'all' : $c_val.'_'.$value;
	        return $this->findByAttributes(array(
	                'role_value'=>$value,
	        ));
	    }else{
	        return $this->findByPk($value);
	    }
	}
	
	/**
	 * Get all roles
	 * @return array or null
	 */
	public function getAllRoles()
	{
	    return $this->findAll(array('index'=> 'role_id'));
	}
}
