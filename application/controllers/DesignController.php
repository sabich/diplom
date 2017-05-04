<?php

namespace app\controllers;

use app\models\Design;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class DesignController extends \app\base\FrontController {
    public $layout = 'catalog';

    public function actionIndex($typeId) {
        $provider = new ActiveDataProvider([
//            'query' => Design::find()->where(['typeId' => $typeId])->orderBy(['id'=>SORT_DESC]),
            'query' => Design::find()->where(['typeId' => $typeId]),
            'pagination' => [
                'pageSize' => 8
            ]

        ]);
        return $this->render('index', ['designProvider' => $provider]);
    }

    public function actionDesign($id) {
        $design = Design::findOne($id);

        if (!$design) throw new NotFoundHttpException('Проект не найден');

        return $this->render('design', [
            'design' => $design,
            'similarDesign' => Design::find()
                ->where(['typeId' => $design->typeId])
                ->andWhere(['!=', 'id', $id])
                ->orderBy(new \yii\db\Expression('RAND()'))
                ->limit(4)
                ->all()
        ]);
    }
}