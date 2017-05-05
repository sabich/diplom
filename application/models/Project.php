<?php

namespace app\models;

use app\base\ActiveRecord;
use yii\base\Exception;
use yii\helpers\FileHelper;
use yii\imagine\Image as Imagine;

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

    // Images
    const IMAGE_SIZE_ORIGIN = null;
    const IMAGE_COVER_SIZE = [266, 260];
    const IMAGE_SLIDER_SIZE = [900, 480];
    const IMAGE_THUMB_SIZE = [150, 80];

    public function addUploadedImage($uploadedImage, $cover = false) {
        if (!$this->id) {
            throw new Exception("Can not create photo. Project not saved.");
        }

        $fileDir = \Yii::getAlias("@webroot/images/projects/{$this->id}/");
        $fileName = $this->coverId ? $this->cover->filename : \Yii::$app->security->generateRandomString();

        $originName = $fileDir . $fileName . '.jpg';
        $coverFileName = $fileDir . $fileName . '_' . self::IMAGE_COVER_SIZE[0] . '_' . self::IMAGE_COVER_SIZE[1] . '.jpg';
        $sliderFileName = $fileDir . $fileName . '_' . self::IMAGE_SLIDER_SIZE[0] . '_' . self::IMAGE_SLIDER_SIZE[1] . '.jpg';
        $thumbFileName = $fileDir . $fileName . '_' . self::IMAGE_THUMB_SIZE[0] . '_' . self::IMAGE_THUMB_SIZE[1] . '.jpg';
        $watermark = \Yii::getAlias('@webroot/images/watermark.png');

        FileHelper::createDirectory($fileDir, 0777);
        $originImage = Imagine::getImagine()->open($uploadedImage->tempName);
        $coverImage = Imagine::thumbnail($originImage, self::IMAGE_COVER_SIZE[0], self::IMAGE_COVER_SIZE[1]);
        $sliderImage = Imagine::thumbnail($originImage, self::IMAGE_SLIDER_SIZE[0], self::IMAGE_SLIDER_SIZE[1]);
        $thumbImage = Imagine::thumbnail($originImage, self::IMAGE_THUMB_SIZE[0], self::IMAGE_THUMB_SIZE[1]);

        //Imagine::watermark($originImage, $watermark, [0, 0]);
        //Imagine::watermark($coverImage, $watermark, [0, 0]);
        //Imagine::watermark($sliderImage, $watermark, [0, 0]);
        //Imagine::watermark($thumbImage, $watermark, [0, 0]);

        $originImage->save($originName);
        $coverImage->save($coverFileName);
        $sliderImage->save($sliderFileName);
        $thumbImage->save($thumbFileName);

        if (!$this->coverId) {
            $image = new Image(['filename' => $fileName]);

            if (!$image->save()) {
                throw new Exception('Can not save project image');
            }

            \Yii::$app->db->createCommand()->insert('project_image', ['projectId' => $this->id, 'imageId' => $image->id])->execute();

            if ($cover) {
                $this->coverId = $image->id;
                if (!$this->save()) {
                    throw new Exception('Can not update project cover');
                };
            }
        }
    }

    public function getCoverUrl($size = self::IMAGE_THUMB_SIZE) {
        $size = empty($size) ? '' : "_{$size[0]}_{$size[1]}";

        if ($this->id && $this->cover) {
            return \Yii::getAlias("@web/images/projects/{$this->id}/{$this->cover->filename}{$size}.jpg");
        }

        return \Yii::getAlias("@web/images/projects/default{$size}.jpg");
    }

    public function getImageUrl($image, $size = self::IMAGE_THUMB_SIZE) {
        $size = empty($size) ? '' : "_{$size[0]}_{$size[1]}";

        if ($this->id) {
            return \Yii::getAlias("@web/images/projects/{$this->id}/{$image->filename}{$size}.jpg");
        }

        return \Yii::getAlias("@web/images/projects/default{$size}.jpg");
    }
}