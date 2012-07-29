<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $last_login_time
 * @property string $create_time
 * @property integer $create_userid
 * @property string $update_time
 * @property integer $update_userid
 *
 * The followings are the available model relations:
 * @property Issues[] $issues
 * @property Issues[] $issues1
 * @property Projects[] $projects
 * @property Projects[] $projects1
 * @property Projects[] $projects2
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_userid, update_userid', 'numerical', 'integerOnly'=>true),
			array('email, username, password', 'length', 'max'=>256),
			array('last_login_time, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, username, password, last_login_time, create_time, create_userid, update_time, update_userid', 'safe', 'on'=>'search'),
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
			'issues' => array(self::HAS_MANY, 'Issues', 'owner_id'),
			'issues1' => array(self::HAS_MANY, 'Issues', 'requester_id'),
			'projects' => array(self::MANY_MANY, 'Projects', 'project_user_assignment(user_id, project_id)'),
			'projects1' => array(self::HAS_MANY, 'Projects', 'create_userid'),
			'projects2' => array(self::HAS_MANY, 'Projects', 'update_userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'username' => 'Username',
			'password' => 'Password',
			'last_login_time' => 'Last Login Time',
			'create_time' => 'Create Time',
			'create_userid' => 'Create Userid',
			'update_time' => 'Update Time',
			'update_userid' => 'Update Userid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_userid',$this->create_userid);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_userid',$this->update_userid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}