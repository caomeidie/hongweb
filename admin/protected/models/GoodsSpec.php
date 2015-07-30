<?php

/**
 * This is the model class for table "{{goods_spec}}".
 *
 * The followings are the available columns in table '{{goods_spec}}':
 * @property string $spec_id
 * @property string $spec_name
 * @property string $spec_value
 * @property string $spec_type
 * @property string $spec_sort
 */
class GoodsSpec extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods_spec}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('spec_name, spec_value', 'required'),
			array('spec_name, spec_value', 'length', 'max'=>255),
			array('spec_type', 'length', 'max'=>11),
		    array('spec_sort', 'numerical', 'integerOnly'=>true),
		    array('spec_name', 'unique', 'attributeName'=>'spec_name'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('spec_id, spec_name, spec_value, spec_type, spec_sort', 'safe', 'on'=>'search'),
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
			'spec_id' => '商品规格索引id',
			'spec_name' => '规格名称',
			'spec_value' => '规格值',
			'spec_type' => '规格类型：0系统自带，不可删除；1：用户添加，可删除',
			'spec_sort' => '规格索引',
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

		$criteria->compare('spec_id',$this->spec_id,true);
		$criteria->compare('spec_name',$this->spec_name,true);
		$criteria->compare('spec_value',$this->spec_value,true);
		$criteria->compare('spec_type',$this->spec_type,true);
		$criteria->compare('spec_sort',$this->spec_sort,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GoodsSpec the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Count goodsspec's number
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 */
	public function countSpec($condition, $link = ' AND '){
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
	 * Get goodsspec by condition
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function getSpecList($condition, $order='spec_sort DESC', $limit=null, $offset=null, $link = ' AND '){
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
	            'index'=> 'spec_id',
	    );
	
	    $arr = $limit ? array_merge($arr, array('limit'=>$limit)) : $arr;
	    $arr = $limit && $offset ? array_merge($arr, array('offset'=>$offset)) : $arr;
	
	    return $this->findAll($arr);
	}
}
