<?php

/**
 * This is the model class for table "{{goods_spec_value}}".
 *
 * The followings are the available columns in table '{{goods_spec_value}}':
 * @property string $svalue_id
 * @property string $goods_id
 * @property string $spec_goods_seri
 * @property string $spec_goods_price
 * @property integer $spec_goods_storage
 * @property integer $spec_salenum
 */
class GoodsSpecValue extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods_spec_value}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goods_id, spec_goods_seri, spec_goods_price', 'required'),
			array('spec_goods_storage, spec_salenum', 'numerical', 'integerOnly'=>true),
			array('goods_id', 'length', 'max'=>11),
			array('spec_goods_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('svalue_id, goods_id, spec_goods_seri, spec_goods_price, spec_goods_storage, spec_salenum', 'safe', 'on'=>'search'),
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
			'svalue_id' => 'Svalue',
			'goods_id' => '商品id',
			'spec_goods_seri' => '商品规格序列化',
			'spec_goods_price' => '规格商品价格',
			'spec_goods_storage' => '规格商品库存',
			'spec_salenum' => '订出数量',
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

		$criteria->compare('svalue_id',$this->svalue_id,true);
		$criteria->compare('goods_id',$this->goods_id,true);
		$criteria->compare('spec_goods_seri',$this->spec_goods_seri,true);
		$criteria->compare('spec_goods_price',$this->spec_goods_price,true);
		$criteria->compare('spec_goods_storage',$this->spec_goods_storage);
		$criteria->compare('spec_salenum',$this->spec_salenum);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GoodsSpecValue the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
