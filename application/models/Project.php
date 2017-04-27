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
            [['typeId', 'date', 'article', 'annotation', 'description'], 'required'],
            [['typeId'], 'integer'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['article'], 'string', 'max' => 25],
            [['article'], 'unique'],
            [['coverId'], 'integer'],
            [['coverId'], 'exist', 'targetClass' => Image::className(), 'targetAttribute' => 'id'],
            [['annotation'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 2048],
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

    // Cover relation
    public function getCover() {
       return $this->hasOne(Image::className(), ['id' => 'coverId']);
    }

    // Images relation
    public function getImages() {
        return $this->hasMany(Image::className(), ['id' => 'imageId'])
            ->viaTable('project_image', ['projectId' => 'id']);
    }

    public function addUploadedImage($uploadedImage) {

    }
}