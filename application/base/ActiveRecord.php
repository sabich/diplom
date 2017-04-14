<?php

namespace app\base;

use yii\behaviors\TimestampBehavior;

class ActiveRecord extends \yii\db\ActiveRecord {
    public $timestampBehavior = true;

    public function init() {
        if ($this->timestampBehavior) {
            if (!is_array($this->timestampBehavior)) {
                $this->timestampBehavior = [
                    'class' => TimestampBehavior::className(),
                    'createdAttribute' => 'created',
                    'updatedAttribute' => 'updated'
                ];
            } else {
                if (!isset($this->timestampBehavior['class'])) {
                    $this->timestampBehavior['class'] = TimestampBehavior::className();
                }

                if (!isset($this->timestampBehavior['createdAttribute'])) {
                    $this->timestampBehavior['createdAttribute'] = 'created';
                }

                if (!isset($this->timestampBehavior['updatedAttribute'])) {
                    $this->timestampBehavior['updatedAttribute'] = 'updated';
                }
            }

            $this->attachBehavior('timestamp', $this->timestampBehavior);
        }
    }
}