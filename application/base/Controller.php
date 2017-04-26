<?php

namespace app\base;

class Controller extends \yii\web\Controller {
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $request = \Yii::$app->request;

            if ($request->referrer != $request->url && !$request->isAjax) {
                \Yii::$app->user->setReturnUrl(\Yii::$app->request->referrer);
            }

            return true;
        }
    }
}