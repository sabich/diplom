<?php

$config = [
    'id' => 'ARS',
    'name' => 'ARS-Holding',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'runtimePath' => dirname(dirname(__DIR__)) . '/runtime',
    'viewPath' => dirname(__DIR__) . '/views/pages',
    'layoutPath' => dirname(__DIR__) . '/views/layouts',
    'components' => require(__DIR__ . '/web_components.php'),
    'bootstrap' => ['debug'],
    'params' => require(__DIR__ . '/params.php')
];
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;