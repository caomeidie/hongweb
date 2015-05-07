<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $user_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property string $addtime
 * @property string $updatetime
 * @property integer $logintimes
 * @property string $lastip
 * @property string $status
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('logintimes, style_id', 'numerical', 'integerOnly'=>true),
			array('username, email, phone', 'length', 'max'=>50),
			array('password', 'length', 'max'=>60),
			array('addtime, updatetime, lastip', 'length', 'max'=>20),
			array('status', 'length', 'max'=>1),
		    array('style_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, username, password, email, phone, addtime, updatetime, logintimes, lastip, status, style_id', 'safe', 'on'=>'search'),
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
		        'UserStyle'=>array(self::BELONGS_TO, 'UserStyle', 'style_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'phone' => 'Phone',
			'addtime' => 'Addtime',
			'updatetime' => 'Updatetime',
			'logintimes' => 'Logintimes',
			'lastip' => 'Lastip',
			'status' => 'Status',
		    'style_id' => 'Style_id',
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

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);
		$criteria->compare('logintimes',$this->logintimes);
		$criteria->compare('lastip',$this->lastip,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('style_id',$this->style_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * validate user's password
	 * @param string $password
	 * @return ture or false
	 */
	public function validatePassword($password){
	    return CPasswordHelper::verifyPassword($password,$this->password);
	}
	
	/**
	 * Get users by condition
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 * @param string $order
	 * @param string $limit
	 * 
	 * @return array
	 */
	public function usersList($condition, $order='addtime DESC', $limit, $offset){
	    $cond = "";
	    foreach($condition as $key=>$value){
	        $cond .= $key.$value[0].':'.$key;
	        if(current($condition) != end($condition))
	            $cond .= ' AND ';
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
	 * get users info
	 * @param $user_id array
	 */
	public function usersInfo($user_id){
	
	    return $this->deleteAll("user_id IN(".$user_id.")");
	}
	
	/**
	 * Count user's number
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 */
	public function usersCount($condition){
	    $cond = "";
	    foreach($condition as $key=>$value){
	        $cond .= $key.$value[0].':'.$key;
	        if(current($condition) != end($condition))
	            $cond .= ' AND ';
	        $param[':'.$key] = $value[1];
	    }
	     
	    $arr = array(
	            'condition'=>$cond,
	            'params'=>$param,
	    );
	
	    return $this->count($arr);
	}
	
	/**
	 * drop users
	 * @param $user_id string or int
	 */
	public function usersDropOne($user_id){
	    
	    return $this->deleteByPk($user_id);
	}
	
	/**
	 * drop users
	 * @param $user_id array
	 */
	public function usersDropAll($user_id){
	     
	    return $this->deleteAll("user_id IN(".$user_id.")");
	}
	
    /**
     * update users
     * @param $user_id int
     */
    public function editUser($user_id){
        return $this->updateByPk($user_id, array('username'=>$this->username, 'email'=>$this->email, 'phone'=>$this->phone, 'updatetime'=>time()));
    }
}
