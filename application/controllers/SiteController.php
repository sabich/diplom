<?php

namespace app\controllers;

use app\models\forms\CallbackForm;

class SiteController extends \app\base\Controller
{
    public function actionIndex()
    {
        return $this->render('/index');
    }

    public function actionService()
    {
        return $this->render('/service');
    }

    public function actionCallback() {
        if (\Yii::$app->request->isPost) {
            $form = new CallbackForm();
            $form->load(\Yii::$app->request->post());

            if (!$form->run()) {
                \Yii::$app->session->setFlash('callbackErrors', $form->errors);
            }
        }

        return $this->goBack();
    }
}
