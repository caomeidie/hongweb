<?php

/**
 * This is the model class for table "{{goods_brand}}".
 *
 * The followings are the available columns in table '{{goods_brand}}':
 * @property integer $brand_id
 * @property string $brand_name
 * @property string $brand_pic
 * @property integer $brand_type
 * @property integer $brand_sort
 */
class GoodsBrand extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods_brand}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_name', 'required'),
			array('brand_sort, brand_type', 'numerical', 'integerOnly'=>true),
			array('brand_name, brand_pic', 'length', 'max'=>100),
		    array('brand_name', 'unique', 'attributeName'=>'brand_name'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('brand_id, brand_name, brand_type, brand_pic, brand_sort', 'safe', 'on'=>'search'),
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
			'brand_id' => '索引ID',
			'brand_name' => '品牌名称',
		    'brand_type' => '品牌类型',
			'brand_pic' => '图片',
			'brand_sort' => '排序',
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

		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('brand_name',$this->brand_name,true);
		$criteria->compare('brand_type',$this->brand_type,true);
		$criteria->compare('brand_pic',$this->brand_pic,true);
		$criteria->compare('brand_sort',$this->brand_sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GoodsBrand the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get goodsbrand list by condition
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function brandList($condition, $order='brand_sort DESC', $limit, $offset, $link = ' AND '){
	    $cond = "";
	    foreach($condition as $key=>$value){
	        $cond .= $key.$value[0].':'.$key;
	        if(current($condition) != end($condition))
	            $cond .= $link;
	        $param[':'.$key] = $value[1];
	    }
	
	    $arr = array(
	            'condition'=>$cond,
	            'params'=>$param,
	            'order'=>$order,
	    );
	
	    $arr = $limit ? array_merge($arr, array('limit'=>$limit)) : $arr;
	    $arr = $limit && $offset ? array_merge($arr, array('offset'=>$offset)) : $arr;
	
	    return $this->findAll($arr);
	}
	
	/**
	 * Count brands' number
	 */
	public function brandCount($condition, $link = ' AND '){
	    $cond = "";
	    foreach($condition as $key=>$value){
	        $cond .= $key.$value[0].':'.$key;
	        if(current($condition) != end($condition))
	            $cond .= $link;
	        $param[':'.$key] = $value[1];
	    }
	     
	    $arr = array(
	            'condition'=>$cond,
	            'params'=>$param,
	    );
	    return $this->count($arr);
	}
}
