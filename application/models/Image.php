<?php

namespace app\models;

class Image extends \app\base\ActiveRecord {
    // ActiveRecord
    public $timestampBehavior = [
        'updatedAtAttribute' => false
    ];

    public static function tableName() {
        return 'image';
    }

    public function rules() {
        return [
            [['filename'], 'required'],
            [['filename'], 'string', 'min' => 32, 'max' => 32],
            [['filename'], 'unique']
        ];
    }

    public static function generateFilename() {
        do {
            $filename = \Yii::$app->security->generateRandomString();
        } while (self::find()->where(['filename' => $filename])->exists());

        return $filename;
    }
}