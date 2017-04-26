<?php

namespace app\controllers\admin;

use app\models\forms\admin\ProjectForm;

class AdminProjectController extends \app\base\AdminController {
    public function actionIndex() {

    }

    public function actionCreate() {
        $form = new ProjectForm([
            'scenario' => 'add'
        ]);

        if (\Yii::$app->request->isPost) {
            $form->load(\Yii::$app->request->post());

            if ($form->run()) {
                return $this->redirect(['admin-project/index']);
            }
        }

        return $this->render('form');
    }

    public function actionUpdate($id) {
        $form = new ProjectForm([
            'scenario' => 'edit',
            'id' => $id
        ]);
    }

    public function actionDelete() {

    }

    public function addImage() {

    }
}