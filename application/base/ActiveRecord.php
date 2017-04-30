<?php

namespace app\base;

use yii\behaviors\TimestampBehavior;
use yii\db\BaseActiveRecord;

class ActiveRecord extends \yii\db\ActiveRecord {
    public $timestampBehavior = true;

    public function init() {
        if ($this->timestampBehavior) {
            if (!is_array($this->timestampBehavior)) {
                $this->timestampBehavior = [
                    'class' => TimestampBehavior::className(),
                    'createdAtAttribute' => 'created',
                    'updatedAtAttribute' => 'updated'
                ];
            } else {
                if (!isset($this->timestampBehavior['class'])) {
                    $this->timestampBehavior['class'] = TimestampBehavior::className();
                }

                if (!isset($this->timestampBehavior['createdAtAttribute'])) {
                    $this->timestampBehavior['createdAtAttribute'] = 'created';
                }

                if (!isset($this->timestampBehavior['updatedAtAttribute'])) {
                    $this->timestampBehavior['updatedAtAttribute'] = 'updated';
                }
            }

            $this->attachBehavior('timestamp', $this->timestampBehavior);
        }
    }
}