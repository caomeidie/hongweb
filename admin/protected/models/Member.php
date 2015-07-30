<?php

/**
 * This is the model class for table "{{member}}".
 *
 * The followings are the available columns in table '{{member}}':
 * @property string $member_id
 * @property string $member_name
 * @property string $member_passwd
 * @property string $member_truename
 * @property string $member_mobile
 * @property string $member_avatar
 * @property integer $member_sex
 * @property string $member_birthday
 * @property string $member_email
 * @property integer $member_login_num
 * @property string $member_addtime
 * @property string $member_logintime
 * @property string $member_old_logintime
 * @property string $member_loginip
 * @property string $member_old_loginip
 * @property integer $member_points
 * @property integer $member_state
 * @property integer $member_areaid
 * @property integer $member_cityid
 * @property integer $member_provinceid
 * @property string $member_areainfo
 * @property integer $member_vip
 */
class Member extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{member}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('member_name, member_passwd, member_mobile', 'required'),
			array('member_sex, member_login_num, member_points, member_state, member_areaid, member_cityid, member_provinceid, member_vip', 'numerical', 'integerOnly'=>true),
			array('member_name, member_avatar', 'length', 'max'=>50),
			array('member_passwd', 'length', 'max'=>64),
			array('member_truename, member_idcard, member_mobile, member_loginip, member_old_loginip', 'length', 'max'=>20),
			array('member_email', 'length', 'max'=>100),
			array('member_addtime, member_logintime, member_old_logintime', 'length', 'max'=>10),
			array('member_areainfo', 'length', 'max'=>255),
			array('member_birthday', 'safe'),
	        array('member_name', 'unique', 'attributeName'=>'member_name'),
		    array('member_email', 'unique', 'attributeName'=>'member_email'),
	        array('member_mobile', 'unique', 'attributeName'=>'member_mobile'),
	        array('member_idcard', 'unique', 'attributeName'=>'member_idcard'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('member_id, member_name, member_passwd, member_truename, member_idcard, member_mobile, member_avatar, member_sex, member_birthday, member_email, member_login_num, member_addtime, member_logintime, member_old_logintime, member_loginip, member_old_loginip, member_points, member_state, member_areaid, member_cityid, member_provinceid, member_areainfo, member_vip', 'safe', 'on'=>'search'),
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
			'member_id' => '会员id',
			'member_name' => '会员名称',
			'member_passwd' => '会员密码',
			'member_truename' => '真实姓名',
		    'member_idcard' => '身份证号',
			'member_mobile' => '会员手机',
			'member_avatar' => '会员头像',
			'member_sex' => '会员性别:0保密，1男，2女',
			'member_birthday' => '生日',
			'member_email' => '会员邮箱',
			'member_login_num' => '登录次数',
			'member_addtime' => '会员注册时间',
			'member_logintime' => '当前登录时间',
			'member_old_logintime' => '上次登录时间',
			'member_loginip' => '当前登录ip',
			'member_old_loginip' => '上次登录ip',
			'member_points' => '会员积分',
			'member_state' => '会员的开启状态 1为开启 0为关闭',
			'member_areaid' => '地区ID',
			'member_cityid' => '城市ID',
			'member_provinceid' => '省份ID',
			'member_areainfo' => '地区内容',
			'member_vip' => '是否是vip：0不是，1是',
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

		$criteria->compare('member_id',$this->member_id,true);
		$criteria->compare('member_name',$this->member_name,true);
		$criteria->compare('member_passwd',$this->member_passwd,true);
		$criteria->compare('member_truename',$this->member_truename,true);
		$criteria->compare('member_idcard',$this->member_idcard,true);
		$criteria->compare('member_mobile',$this->member_mobile,true);
		$criteria->compare('member_avatar',$this->member_avatar,true);
		$criteria->compare('member_sex',$this->member_sex);
		$criteria->compare('member_birthday',$this->member_birthday,true);
		$criteria->compare('member_email',$this->member_email,true);
		$criteria->compare('member_login_num',$this->member_login_num);
		$criteria->compare('member_addtime',$this->member_addtime,true);
		$criteria->compare('member_logintime',$this->member_logintime,true);
		$criteria->compare('member_old_logintime',$this->member_old_logintime,true);
		$criteria->compare('member_loginip',$this->member_loginip,true);
		$criteria->compare('member_old_loginip',$this->member_old_loginip,true);
		$criteria->compare('member_points',$this->member_points);
		$criteria->compare('member_state',$this->member_state);
		$criteria->compare('member_areaid',$this->member_areaid);
		$criteria->compare('member_cityid',$this->member_cityid);
		$criteria->compare('member_provinceid',$this->member_provinceid);
		$criteria->compare('member_areainfo',$this->member_areainfo,true);
		$criteria->compare('member_vip',$this->member_vip);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Member the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get member by condition
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 * @param string $order
	 * @param string $limit
	 *
	 * @return array
	 */
	public function getMemberList($condition, $order='member_addtime DESC', $limit=null, $offset=null, $link = ' AND '){
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
	 * Count member's number
	 * @param array $condition(二维数组：array(key=>array(operator, valuea)))
	 */
	public function countMember($condition, $link = ' AND '){
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
	 * drop member
	 * @param $member_id string or int
	 */
	public function dropOneMember($member_id){
	     
	    return $this->deleteByPk($member_id);
	}
	
	/**
	 * drop member
	 * @param $member_id array
	 */
	public function dropAllMember($member_id){
	
	    return $this->deleteAll("member_id IN(".$member_id.")");
	}
	
	/**
	 * @return boolean whether add member is successful
	 */
	public function addMember()
	{
	    $this->member_passwd = CPasswordHelper::hashPassword($this->member_passwd);
	    $this->member_login_num = 0;
	    $this->member_addtime = time();
	    $this->member_logintime = time();
	    $this->member_old_logintime = time();
	    $this->member_loginip = Yii::app()->request->userHostAddress;
	    $this->member_old_loginip = Yii::app()->request->userHostAddress;
	    $this->member_points = 0;

        if(!$this->save()){
            return false;
        }else{
            return true;
        }
	}
}
