<?php

/**
 * Description of TrackStarActiveRecord
 *
 * @author Charles
 */
abstract class TrackStarActiveRecord extends CActiveRecord {
    
    /**
     * Prepare create_time, create_userid, update_time, update_userid
     * attribute before performing validation 
     */
    protected function beforeValidate() {
        if ($this->isNewRecord) {
            // set the create date, last updated date and the user doing the creating
            $this->create_time = $this->update_time = new CDbExpression('NOW()');
            $this->create_userid = $this->update_userid = Yii::app()->user->id;
        }
        else {
            $this->update_time = new CDbExpression('NOW()');
            $this->update_userid = Yii::app()->user->id;
        }
        
        return parent::beforeValidate();
    }
}

?>
