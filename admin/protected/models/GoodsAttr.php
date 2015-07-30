<?php

/**
 * This is the model class for table "{{goods_attr}}".
 *
 * The followings are the available columns in table '{{goods_attr}}':
 * @property string $attr_id
 * @property string $attr_name
 * @property string $attr_value
 * @property integer $attr_sort
 */
class GoodsAttr extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods_attr}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('attr_name, attr_value', 'required'),
			array('attr_sort', 'numerical', 'integerOnly'=>true),
			array('attr_name', 'length', 'max'=>100),
			array('attr_value', 'length', 'max'=>255),
		    array('attr_name', 'unique', 'attributeName'=>'attr_name'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('attr_id, attr_name, attr_value, attr_sort', 'safe', 'on'=>'search'),
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
			'attr_id' => 'Attr',
			'attr_name' => 'Attr Name',
			'attr_value' => 'Attr Value',
			'attr_sort' => 'Attr Sort',
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

		$criteria->compare('attr_id',$this->attr_id,true);
		$criteria->compare('attr_name',$this->attr_name,true);
		$criteria->compare('attr_value',$this->attr_value,true);
		$criteria->compare('attr_sort',$this->attr_sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the attrified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GoodsAttr the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Count goodsattr's number
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 */
	public function countAttr($condition, $link = ' AND '){
	    $cond = "";
	    foreach($condition as $key=>$value){
	        $cond .= $key.$value[0].':'.$key;
	        if(current($condition) != end($condition))
	            $cond .= $link;
	        $param[':'.$key] = $value[1];
	    }
	
	    $arr = array(
	            'condition'=>$cond,
	            'params'=>$param
	    );
	
	    return $this->count($arr);
	}
	
	/**
	 * Get goodsattr by condition
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function getAttrList($condition, $order='attr_sort DESC', $limit=null, $offset=null, $link = ' AND '){
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
	            'index'=> 'attr_id',
	    );
	
	    $arr = $limit ? array_merge($arr, array('limit'=>$limit)) : $arr;
	    $arr = $limit && $offset ? array_merge($arr, array('offset'=>$offset)) : $arr;
	
	    return $this->findAll($arr);
	}
}
