<?php

/**
 * This is the model class for table "{{goods_class}}".
 *
 * The followings are the available columns in table '{{goods_class}}':
 * @property string $gc_id
 * @property string $gc_name
 * @property string $gc_id
 * @property string $gc_parent_id
 * @property integer $gc_sort
 * @property integer $gc_show
 */
class GoodsClass extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goods_class}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gc_name', 'required'),
			array('gc_sort, gc_show', 'numerical', 'integerOnly'=>true),
			array('gc_name', 'length', 'max'=>100),
			array('gc_id, gc_parent_id', 'length', 'max'=>10),
		    array('gc_name', 'unique', 'attributeName'=>'gc_name'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('gc_id, gc_name, gc_id, gc_parent_id, gc_sort, gc_show', 'safe', 'on'=>'search'),
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
		        'gc'=>array(self::HAS_MANY, 'Goods', 'gc_id', 'order'=>'gc_id DESC')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gc_id' => '索引ID',
			'gc_name' => '分类名称',
			'gc_id' => '类型id',
			'gc_parent_id' => '父ID',
			'gc_sort' => '排序',
			'gc_show' => '前台显示，0为否，1为是，默认为1',
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

		$criteria->compare('gc_id',$this->gc_id,true);
		$criteria->compare('gc_name',$this->gc_name,true);
		$criteria->compare('gc_id',$this->gc_id,true);
		$criteria->compare('gc_parent_id',$this->gc_parent_id,true);
		$criteria->compare('gc_sort',$this->gc_sort);
		$criteria->compare('gc_show',$this->gc_show);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GoodsClass the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	

	/**
	 * Get goodsclass by condition
	 * @param array $condition(二维数组：array(key=>array(operator, value)))
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function getGCList($condition, $order='gc_sort DESC', $limit=null, $offset=null, $link = ' AND '){
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
	            'index'=>'gc_id'
	    );
	
	    $arr = $limit ? array_merge($arr, array('limit'=>$limit)) : $arr;
	    $arr = $limit && $offset ? array_merge($arr, array('offset'=>$offset)) : $arr;
	
	    return $this->findAll($arr);
	}
		
	/**
	 * Count goodsclass' number
	 */
	public function countGC($condition, $link = ' AND '){
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
