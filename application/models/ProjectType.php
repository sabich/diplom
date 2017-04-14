<?php

namespace app\models;

class ProjectType extends \app\base\Activerecord {
    // ActiveRecord
    public $timestampBehavior = false;

    public static function tableName() {
        return 'project';
    }

    public function rules() {
        return [
            [['name'], 'require']
        ];
    }

    // Projects relation
    public function getProjects() {
        return $this->hasMany(Project::className(), ['typeId' => 'id']);
    }
}