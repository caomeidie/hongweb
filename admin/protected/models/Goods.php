<?php

/**
 * This is the model class for table "{{goods}}".
 *
 * The followings are the available columns in table '{{goods}}':
 * @property string $goods_id
 * @property string $goods_name
 * @property string $gc_id
 * @property integer $brand_id
 * @property integer $goods_num
 * @property integer $spec_open
 * @property integer $attr_open
 * @property string $goods_image
 * @property string $goods_price
 * @property integer $goods_storage
 * @property integer $goods_show
 * @property integer $goods_status
 * @property integer $goods_recommend
 * @property string $goods_add_time
 * @property string $goods_starttime
 */
class Goods extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goods_name, gc_id, goods_image, goods_price, goods_show', 'required'),
			array('brand_id, goods_num, spec_open, attr_open, goods_storage, goods_show, goods_status, goods_recommend', 'numerical', 'integerOnly'=>true),
			array('goods_name, goods_image', 'length', 'max'=>100),
			array('gc_id, goods_price, goods_add_time, goods_starttime', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('goods_id, goods_name, gc_id, brand_id, goods_num, spec_open, attr_open, goods_image, goods_price, goods_storage, goods_show, goods_status, goods_recommend, goods_add_time, goods_starttime', 'safe', 'on'=>'search'),
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
			'goods_id' => '商品索引id',
			'goods_name' => '商品名称',
			'gc_id' => '商品分类id',
			'brand_id' => '商品品牌id',
			'goods_num' => '商品货号',
			'spec_open' => '商品规格开启状态，1开启，0关闭',
			'attr_open' => '商品属性开启状态，1开启，0关闭',
			'goods_image' => '商品默认封面图片',
			'goods_price' => '商品价格',
			'goods_storage' => '商品库存',
			'goods_show' => '商品上架',
			'goods_status' => '商品状态，0开启，1违规下架',
			'goods_recommend' => '商品推荐，1推荐，0不推荐',
			'goods_add_time' => '商品添加时间',
			'goods_starttime' => '发布开始时间',
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

		$criteria->compare('goods_id',$this->goods_id,true);
		$criteria->compare('goods_name',$this->goods_name,true);
		$criteria->compare('gc_id',$this->gc_id,true);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('goods_num',$this->goods_num);
		$criteria->compare('spec_open',$this->spec_open);
		$criteria->compare('attr_open',$this->attr_open);
		$criteria->compare('goods_image',$this->goods_image,true);
		$criteria->compare('goods_price',$this->goods_price,true);
		$criteria->compare('goods_storage',$this->goods_storage);
		$criteria->compare('goods_show',$this->goods_show);
		$criteria->compare('goods_status',$this->goods_status);
		$criteria->compare('goods_recommend',$this->goods_recommend);
		$criteria->compare('goods_add_time',$this->goods_add_time,true);
		$criteria->compare('goods_starttime',$this->goods_starttime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Goods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
