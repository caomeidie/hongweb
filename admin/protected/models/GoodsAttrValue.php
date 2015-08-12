<?php

/**
 * This is the model class for table "{{goods_attr_value}}".
 *
 * The followings are the available columns in table '{{goods_attr_value}}':
 * @property string $avalue_id
 * @property string $goods_id
 * @property string $attr_id
 * @property string $attr_value
 */
class GoodsAttrValue extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods_attr_value}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goods_id, attr_id, attr_value', 'required'),
			array('goods_id, attr_id', 'length', 'max'=>11),
			array('attr_value', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('avalue_id, goods_id, attr_id, attr_value', 'safe', 'on'=>'search'),
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
			'avalue_id' => 'Avalue',
			'goods_id' => 'Goods',
			'attr_id' => 'Attr',
			'attr_value' => 'Attr Value',
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

		$criteria->compare('avalue_id',$this->avalue_id,true);
		$criteria->compare('goods_id',$this->goods_id,true);
		$criteria->compare('attr_id',$this->attr_id,true);
		$criteria->compare('attr_value',$this->attr_value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GoodsAttrValue the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
