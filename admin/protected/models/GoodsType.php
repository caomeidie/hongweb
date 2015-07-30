<?php

/**
 * This is the model class for table "{{goods_type}}".
 *
 * The followings are the available columns in table '{{goods_type}}':
 * @property string $type_id
 * @property string $type_name
 * @property string $type_spec
 * @property string $type_brand
 * @property integer $type_sort
 */
class GoodsType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_name', 'required'),
			array('type_sort', 'numerical', 'integerOnly'=>true),
			array('type_name', 'length', 'max'=>100),
			array('type_spec, type_brand, type_attr', 'length', 'max'=>255),
		    array('type_name', 'unique', 'attributeName'=>'type_name'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('type_id, type_name, type_spec, type_brand, type_attr, type_sort', 'safe', 'on'=>'search'),
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
			'type_id' => '类型id',
			'type_name' => '类型名称',
			'type_spec' => '类型对应的规格',
			'type_brand' => '类型对应的品牌',
		    'type_attr' => '类型对应的属性',
			'type_sort' => '排序',
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

		$criteria->compare('type_id',$this->type_id,true);
		$criteria->compare('type_name',$this->type_name,true);
		$criteria->compare('type_spec',$this->type_spec,true);
		$criteria->compare('type_brand',$this->type_brand,true);
		$criteria->compare('type_attr',$this->type_attr,true);
		$criteria->compare('type_sort',$this->type_sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the typeified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GoodsType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Count goodstype's number
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 */
	public function countType($condition, $link = ' AND '){
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
	
	/**
	 * Get goodstype by condition
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function getTypeList($condition, $order='type_sort DESC', $limit=null, $offset=null, $link = ' AND '){
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
}
