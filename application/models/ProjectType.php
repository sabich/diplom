<?php

namespace app\models;

class ProjectType extends \app\base\ActiveRecord {
    // ActiveRecord
    public $timestampBehavior = false;

    public static function tableName() {
        return 'project_type';
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