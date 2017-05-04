<?php

namespace app\models;

class DesignType extends \app\base\Activerecord {
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