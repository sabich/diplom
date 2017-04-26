<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$application = new yii\web\Application(require(__DIR__ . '/../application/config/web.php'));
$application->controllerNamespace = 'app\controllers\admin';
$application->viewPath = Yii::getAlias('@app/views/admin/pages');
$application->layoutPath = Yii::getAlias('@app/views/admin/layouts');
$application->run();
