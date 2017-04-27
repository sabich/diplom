<?php

namespace app\controllers\admin;

use app\models\forms\admin\ProjectForm;
use yii\base\Exception;

class AdminProjectController extends \app\base\AdminController {
    public function actionIndex() {

    }

    public function actionCreate() {
        $form = new ProjectForm([
            'scenario' => 'add'
        ]);

        if (\Yii::$app->request->isPost) {
            $form->load(\Yii::$app->request->post());

            try {
                if ($form->run()) {
                    return $this->redirect(['admin-project/index']);
                }
            } catch (Exception $e) {
                \Yii::$app->session->setFlash('submit-error', $e->getMessage());
            }
        }

        return $this->render('form', [
            'model' => $form
        ]);
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