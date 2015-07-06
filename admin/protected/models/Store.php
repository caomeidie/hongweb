<?php

/**
 * This is the model class for table "{{store}}".
 *
 * The followings are the available columns in table '{{store}}':
 * @property integer $store_id
 * @property string $store_name
 * @property string $store_pass
 * @property integer $store_name_auth
 * @property integer $grade_id
 * @property string $store_owner_card
 * @property integer $area_id
 * @property string $area_info
 * @property string $store_address
 * @property string $store_zip
 * @property string $store_mobile
 * @property integer $store_state
 * @property string $store_close_info
 * @property integer $store_sort
 * @property string $store_time
 * @property string $store_end_time
 * @property string $store_logo
 * @property string $store_workingtime
 */
class Store extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{store}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('grade_id, store_owner_card, area_id, area_info, store_address, store_zip, store_mobile, store_time', 'required'),
			array('store_name_auth, grade_id, area_id, store_state, store_sort', 'numerical', 'integerOnly'=>true),
			array('store_name, store_owner_card, store_mobile', 'length', 'max'=>50),
			array('store_pass', 'length', 'max'=>64),
			array('area_info, store_address, store_workingtime', 'length', 'max'=>100),
			array('store_zip, store_time, store_end_time', 'length', 'max'=>10),
			array('store_close_info, store_logo', 'length', 'max'=>255),
		    array('store_name', 'unique', 'attributeName'=>'store_name'),
		    array('store_owner_card', 'unique', 'attributeName'=>'store_owner_card'),
		    array('store_mobile', 'unique', 'attributeName'=>'store_mobile'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('store_id, store_name, store_pass, store_name_auth, grade_id, store_owner_card, area_id, area_info, store_address, store_zip, store_mobile, store_state, store_close_info, store_sort, store_time, store_end_time, store_logo, store_workingtime', 'safe', 'on'=>'search'),
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
			'store_id' => '店铺索引id',
			'store_name' => '店铺名称',
			'store_pass' => '店铺登录密码',
			'store_name_auth' => '店主认证',
			'grade_id' => '店铺等级',
			'store_owner_card' => '身份证',
			'area_id' => '地区id',
			'area_info' => '地区内容',
			'store_address' => '详细地区',
			'store_zip' => '邮政编码',
			'store_mobile' => '电话号码',
			'store_state' => '店铺状态，0关闭，1开启，2审核中',
			'store_close_info' => '店铺关闭原因',
			'store_sort' => '店铺排序',
			'store_time' => '店铺添加时间',
			'store_end_time' => '店铺关闭时间',
			'store_logo' => '店标',
			'store_workingtime' => '工作时间',
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

		$criteria->compare('store_id',$this->store_id);
		$criteria->compare('store_name',$this->store_name,true);
		$criteria->compare('store_pass',$this->store_pass,true);
		$criteria->compare('store_name_auth',$this->store_name_auth);
		$criteria->compare('grade_id',$this->grade_id);
		$criteria->compare('store_owner_card',$this->store_owner_card,true);
		$criteria->compare('area_id',$this->area_id);
		$criteria->compare('area_info',$this->area_info,true);
		$criteria->compare('store_address',$this->store_address,true);
		$criteria->compare('store_zip',$this->store_zip,true);
		$criteria->compare('store_mobile',$this->store_mobile,true);
		$criteria->compare('store_state',$this->store_state);
		$criteria->compare('store_close_info',$this->store_close_info,true);
		$criteria->compare('store_sort',$this->store_sort);
		$criteria->compare('store_time',$this->store_time,true);
		$criteria->compare('store_end_time',$this->store_end_time,true);
		$criteria->compare('store_logo',$this->store_logo,true);
		$criteria->compare('store_workingtime',$this->store_workingtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Store the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
