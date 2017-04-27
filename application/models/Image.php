<?php

namespace app\models;

class Image extends \app\base\ActiveRecord {
    // ActiveRecord
    public $timestamp = [
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
}