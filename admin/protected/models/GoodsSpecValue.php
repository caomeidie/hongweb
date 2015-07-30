<?php

/**
 * This is the model class for table "{{goods_spec_value}}".
 *
 * The followings are the available columns in table '{{goods_spec_value}}':
 * @property string $value_id
 * @property integer $goods_id
 * @property integer $spec_id
 * @property string $spec_name
 * @property string $spec_goods_price
 * @property integer $spec_goods_storage
 * @property integer $spec_salenum
 * @property string $spec_goods_spec
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
			array('goods_id, spec_id, spec_name, spec_goods_price, spec_goods_spec', 'required'),
			array('goods_id, spec_id, spec_goods_storage, spec_salenum', 'numerical', 'integerOnly'=>true),
			array('spec_name', 'length', 'max'=>255),
			array('spec_goods_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('value_id, goods_id, spec_id, spec_name, spec_goods_price, spec_goods_storage, spec_salenum, spec_goods_spec', 'safe', 'on'=>'search'),
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
			'value_id' => 'Value',
			'goods_id' => '商品id',
			'spec_id' => '商品规格索引id',
			'spec_name' => '规格名称',
			'spec_goods_price' => '规格商品价格',
			'spec_goods_storage' => '规格商品库存',
			'spec_salenum' => '订出数量',
			'spec_goods_spec' => '商品规格序列化',
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

		$criteria->compare('value_id',$this->value_id,true);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('spec_id',$this->spec_id);
		$criteria->compare('spec_name',$this->spec_name,true);
		$criteria->compare('spec_goods_price',$this->spec_goods_price,true);
		$criteria->compare('spec_goods_storage',$this->spec_goods_storage);
		$criteria->compare('spec_salenum',$this->spec_salenum);
		$criteria->compare('spec_goods_spec',$this->spec_goods_spec,true);

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
