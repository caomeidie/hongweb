<?php

/**
 * This is the model class for table "article_class".
 *
 * The followings are the available columns in table 'article_class':
 * @property string $ac_id
 * @property string $ac_code
 * @property string $ac_name
 * @property string $ac_parent_id
 * @property integer $ac_sort
 */
class ArticleClass extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{article_class}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ac_name,ac_sort,ac_parent_id', 'required'),
			array('ac_sort', 'numerical', 'integerOnly'=>true),
			array('ac_code', 'length', 'max'=>20),
			array('ac_name', 'length', 'max'=>100),
			array('ac_parent_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ac_id, ac_code, ac_name, ac_parent_id, ac_sort', 'safe', 'on'=>'search'),
		    array('ac_name', 'unique'),
		    array('ac_code', 'unique'),
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
			'ac_id' => '索引ID',
			'ac_code' => '分类标识码',
			'ac_name' => '分类名称',
			'ac_parent_id' => '父ID',
			'ac_sort' => '排序',
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

		$criteria->compare('ac_id',$this->ac_id,true);
		$criteria->compare('ac_code',$this->ac_code,true);
		$criteria->compare('ac_name',$this->ac_name,true);
		$criteria->compare('ac_parent_id',$this->ac_parent_id,true);
		$criteria->compare('ac_sort',$this->ac_sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArticleClass the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get all AC
	 * @return array or null
	 */
	public function getAllAC()
	{
	    return $this->findAll(array('index'=> 'ac_id'));
	}
	
	/**
	 * add a AC
	 * @return boolean add AC's id
	 */
	public function addAC()
	{
        return $this->save();
	}
	
	/**
	 * Count AC's number
	 */
	public function ACCount(){
	    return $this->count();
	}
	
	/**
	 * Get AC list by condition
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function ACList($order='ac_sort DESC', $limit=null, $offset=null){
	    $arr = array(
	            'order'=>$order,
	    );
	
	    $arr = $limit ? array_merge($arr, array('limit'=>$limit)) : $arr;
	    $arr = $limit && $offset ? array_merge($arr, array('offset'=>$offset)) : $arr;
	
	    $ACList = $this->findAll($arr);
	    return $ACList;
	}
}
