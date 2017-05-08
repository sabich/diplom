<?php

namespace app\models;

use \app\base\ActiveRecord;

class DesignType extends Activerecord {
    // ActiveRecord
    public $timestampBehavior = false;

    public static function tableName() {
        return 'design_type';
    }

    public function rules() {
        return [
            [['name'], 'require']
        ];
    }

    // Projects relation
    public function getDesigns() {
        return $this->hasMany(Project::className(), ['typeId' => 'id']);
    }
}