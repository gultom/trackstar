<?php

/**
 * This is the model class for table "issues".
 *
 * The followings are the available columns in table 'issues':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $project_id
 * @property integer $type_id
 * @property integer $status_id
 * @property integer $owner_id
 * @property integer $requester_id
 * @property string $create_time
 * @property integer $create_userid
 * @property string $update_time
 * @property integer $update_userid
 *
 * The followings are the available model relations:
 * @property Users $requester
 * @property Users $owner
 * @property Projects $project
 */
class Issues extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Issues the static model class
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
		return 'issues';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('project_id, type_id, status_id, owner_id, requester_id, create_userid, update_userid', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('description, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, project_id, type_id, status_id, owner_id, requester_id, create_time, create_userid, update_time, update_userid', 'safe', 'on'=>'search'),
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
			'requester' => array(self::BELONGS_TO, 'Users', 'requester_id'),
			'owner' => array(self::BELONGS_TO, 'Users', 'owner_id'),
			'project' => array(self::BELONGS_TO, 'Projects', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'project_id' => 'Project',
			'type_id' => 'Type',
			'status_id' => 'Status',
			'owner_id' => 'Owner',
			'requester_id' => 'Requester',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('requester_id',$this->requester_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_userid',$this->create_userid);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_userid',$this->update_userid);
        $criteria->condition = 'project_id=:projectId';
        $criteria->params=array(':projectId' => $this->project_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
    const TYPE_BUG = 0;
    const TYPE_FEATURE = 1;
    const TYPE_TASK = 2;

    public function getTypeOptions() {
        return array(
                self::TYPE_BUG => 'Bug',
                self::TYPE_FEATURE => 'Feature',
                self::TYPE_TASK => 'Task'
            );
    }
    
    /**
     * @return string the type text display for the current issue 
     */
    public function getTypeText() {
        $typeOptions = $this->typeOptions;
        return isset($typeOptions[$this->type_id]) ? $typeOptions[$this->type_id] : "unknown type ({$this->type_id})";
    }
        
    const STATUS_OPEN = 0;
    const STATUS_PROCEED = 1;
    const STATUS_CLOSED = 2;
    
    public function getStatusOptions() {
        return array (
                self::STATUS_OPEN => 'OPEN',
                self::STATUS_PROCEED => 'PROCEED',
                self::STATUS_CLOSED => 'CLOSED',
            );
    }
    
    /**
     * @return string the status text display for the current issue 
     */
    public function getStatusText() {
        $statusOptions = $this->statusOptions;
        return isset($statusOptions[$this->status_id]) ? $statusOptions[$this->status_id] : "unknown status ({$this->status_id})";
    }
}