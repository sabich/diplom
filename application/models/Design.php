<?php

namespace app\models;

use app\base\ActiveRecord;
use yii\base\Exception;
use yii\helpers\FileHelper;
use yii\imagine\Image as Imagine;

class Design extends ActiveRecord {
    const TYPE_INDIVIDUAL = 1;
    const TYPE_RESIDENTIAL = 2;
    const TYPE_INDUSTRIAL = 3;
    const TYPE_ENTERTAINMENT = 4;

    // ActiveRecord
    public static function tableName() {
        return 'design';
    }

    public function rules() {
        return [
            [['typeId', 'article', 'annotation', 'description'], 'required'],
            [['typeId'], 'integer'],
            [['article'], 'string', 'max' => 25],
            [['article'], 'unique'],
            [['cover'], 'string', 'max'=>32],
            [['annotation'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 2048],
        ];
    }

    // ProjectType relation
    public function getType() {
        return $this->hasOne(ProjectType::className(), ['id' => 'typeId']);
    }

}