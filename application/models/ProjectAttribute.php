<?php

namespace app\models;

class ProjectAttribute extends \app\base\ActiveRecord {
    // ActiveRecord
    public $timestampBehavior = false;

    public static function tableName()
    {
        return 'project_attribute';
    }

    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25],
            [['name'], 'unique']
        ];
    }
}