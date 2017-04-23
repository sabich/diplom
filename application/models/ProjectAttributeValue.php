<?php
namespace app\models;

class ProjectAttributeValue extends \app\base\ActiveRecord {
    // ActiveRecord
    public $timestampBehavior = false;

    public static function tableName() {
        return 'project_attribute_value';
    }

    public function rules() {
        return [
            [['projectId', 'attributeId'], 'required'],
            [['value'], 'safe']
        ];
    }

    // Attribute relation
    public function getProjectAttribute() {
        return $this->hasOne(ProjectAttribute::className(), ['id' => 'attributeId']);
    }

    // Project relation
    public function getProject() {
        return $this->hasOne(Project::className(), ['id' => 'projectId']);
    }

    // Custom fields
    public function getName() {
        return $this->projectAttribute->name;
    }
}