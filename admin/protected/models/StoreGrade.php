<?php

/**
 * This is the model class for table "{{store_grade}}".
 *
 * The followings are the available columns in table '{{store_grade}}':
 * @property string $sg_id
 * @property string $sg_name
 * @property integer $sg_sort
 */
class StoreGrade extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{store_grade}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sg_sort', 'numerical', 'integerOnly'=>true),
			array('sg_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sg_id, sg_name, sg_sort', 'safe', 'on'=>'search'),
		    array('sg_name', 'unique', 'attributeName'=>'sg_name'),
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
			'sg_id' => '索引ID',
			'sg_name' => '等级名称',
			'sg_sort' => '级别，数目越大级别越高',
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

		$criteria->compare('sg_id',$this->sg_id,true);
		$criteria->compare('sg_name',$this->sg_name,true);
		$criteria->compare('sg_sort',$this->sg_sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StoreGrade the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return boolean whether add store grade is successful
	 */
	public function addSG()
	{	
	    if(!$this->save()){
	        return false;
	    }else{
	        return true;
	    }
	}
	
	/**
	 * Count storegrade's number
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 */
	public function countSG($condition, $link = ' AND '){
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
	 * Get storegrade by condition
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function getSGList($condition, $order='sg_sort DESC', $limit, $offset, $link = ' AND '){
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
	 * drop storegrade
	 * @param $sg_id string or int
	 */
	public function dropOneSG($sg_id){
	
	    return $this->deleteByPk($sg_id);
	}
	
	/**
	 * drop storegrade
	 * @param $sg_id array
	 */
	public function dropAllSG($sg_id){
	
	    return $this->deleteAll("sg_id IN(".$sg_id.")");
	}
	
	/**
	 * update storegrade
	 * @param $sg_id int
	 */
	public function editSG($sg_id){
	    $param = array();
	    foreach($this->attributes as $key=>$val){
	        if($val != null)
	            $param[$key] = $val;
	    }
	    return $this->updateByPk($sg_id, $param);
	}
}
