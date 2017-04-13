<?php

namespace app\controllers;

use app\models\Project;

class CatalogController extends \app\base\Controller {
    public function actionIndex() {
        $projects = Project::find()->limit(9)->all();

        return $this->render('index', ['projects' => $projects]);
    }
}