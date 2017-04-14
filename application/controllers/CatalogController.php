<?php

namespace app\controllers;

use app\models\Project;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class CatalogController extends \app\base\Controller {
    public $layout = 'catalog';

    public function actionIndex() {
        $provider = new ActiveDataProvider([
            'query' => Project::find(),
            'pagination' => [
                'pageSize' => 9
            ]
        ]);

        return $this->render('index', ['projectsProvider' => $provider]);
    }
}