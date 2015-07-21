<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $article_id
 * @property integer $ac_id
 * @property string $article_url
 * @property integer $article_show
 * @property integer $article_sort
 * @property string $article_title
 * @property string $article_content
 * @property string $article_time
 */
class Article extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{article}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    array('article_title, article_show, article_time', 'required'),
			array('ac_id, article_show, article_sort', 'numerical', 'integerOnly'=>true),
			array('article_url, article_title', 'length', 'max'=>100),
			array('article_time', 'length', 'max'=>10),
			array('article_content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('article_id, ac_id, article_url, article_show, article_sort, article_title, article_content, article_time', 'safe', 'on'=>'search'),
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
			'article_id' => '索引id',
			'ac_id' => '分类id',
			'article_url' => '跳转链接',
			'article_show' => '是否显示，0为否，1为是，默认为1',
			'article_sort' => '排序',
			'article_title' => '标题',
			'article_content' => '内容',
			'article_time' => '发布时间',
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

		$criteria->compare('article_id',$this->article_id);
		$criteria->compare('ac_id',$this->ac_id);
		$criteria->compare('article_url',$this->article_url,true);
		$criteria->compare('article_show',$this->article_show);
		$criteria->compare('article_sort',$this->article_sort);
		$criteria->compare('article_title',$this->article_title,true);
		$criteria->compare('article_content',$this->article_content,true);
		$criteria->compare('article_time',$this->article_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * add an article
	 * @return boolean add article_id
	 */
	public function addArticle()
	{
	    return $this->save();
	}
	/**
	 * Count articles' number
	 */
	public function articleCount(){
	    return $this->count();
	}
	
	/**
	 * Get article list by condition
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function articleList($order='article_sort DESC', $limit, $offset){
	    $arr = array(
	            'order'=>$order,
	    );
	
	    $arr = $limit ? array_merge($arr, array('limit'=>$limit)) : $arr;
	    $arr = $limit && $offset ? array_merge($arr, array('offset'=>$offset)) : $arr;
	
	    $List = $this->findAll($arr);
	    return $List;
	}
	
	/**
	 * update article
	 * @param $article_id int
	 */
	public function editArticle($article_id){
	    return $this->updateByPk($article_id, $this->attributes);
	}
	
	/**
	 * drop one article
	 * @param $article_id string or int
	 */
	public function articleDropOne($article_id){
	
	    return $this->deleteByPk($article_id);
	}
	
	/**
	 * drop all article
	 * @param $article_id array
	 */
	public function articleDropAll($article_id){
	
	    return $this->deleteAll("article_id IN(".$article_id.")");
	}
	
}
