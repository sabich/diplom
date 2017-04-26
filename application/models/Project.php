<?php

namespace app\models;

use app\base\ActiveRecord;
use yii\db\Query;

class Project extends ActiveRecord {
    const TYPE_INDIVIDUAL = 1;
    const TYPE_RESIDENTIAL = 2;
    const TYPE_INDUSTRIAL = 3;
    const TYPE_ENTERTAINMENT = 4;

    // ActiveRecord
    public static function tableName() {
        return 'project';
    }

    public function rules() {
        return [
            [['typeId', 'date', 'article', 'cover', 'annotation', 'description'], 'require'],
            [['typeId'], 'integer'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['article'], 'string', 'max' => 25],
            [['article'], 'unique'],
            [['cover'], 'string', 'min' => 32, 'max' => 32],
            [['annotation'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 2048]
        ];
    }

    // ProjectType relation
    public function getType() {
        return $this->hasOne(ProjectType::className(), ['id' => 'typeId']);
    }

    // ProjectAttributeValue relation
    public function getAttributeValues() {
        return $this->hasMany(ProjectAttributeValue::className(), ['projectId' => 'id'])->with('projectAttribute');
    }
}