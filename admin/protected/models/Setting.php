<?php

/**
 * This is the model class for table "{{setting}}".
 *
 * The followings are the available columns in table '{{setting}}':
 * @property string $setting_id
 * @property string $setting_key
 * @property string $setting_val
 * @property string $type_id
 */
class Setting extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{setting}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('setting_key', 'required'),
			array('setting_key', 'length', 'max'=>50),
			array('setting_val', 'length', 'max'=>255),
			array('type_id', 'length', 'max'=>10),
		    array('setting_key', 'unique', 'attributeName'=>'setting_key'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('setting_id, setting_key, setting_val, type_id', 'safe', 'on'=>'search'),
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
		        'SettingType'=>array(self::BELONGS_TO, 'SettingType', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'setting_id' => 'Setting',
			'setting_key' => 'Setting Key',
			'setting_val' => 'Setting Val',
			'type_id' => 'Type',
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

		$criteria->compare('setting_id',$this->setting_id,true);
		$criteria->compare('setting_key',$this->setting_key,true);
		$criteria->compare('setting_val',$this->setting_val,true);
		$criteria->compare('type_id',$this->type_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Setting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get setting list by type_id
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function settingList($type_id=1){;
	
	    $list = $this->findAll(array('index'=>'setting_key', 'condition'=>'type_id=:type_id', 'params'=>array(':type_id'=>$type_id)));
	    return $list;
	}
}
