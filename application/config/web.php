<?php

return [
    'id' => 'ARS',
    'name' => 'ARS-Holding',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'runtimePath' => dirname(dirname(__DIR__)) . '/runtime',
    'viewPath' => dirname(__DIR__) . '/views/pages',
    'layoutPath' => dirname(__DIR__) . '/views/layouts',
    'components' => require(__DIR__ . '/web_components.php'),
    'modules' => require(__DIR__ . '/web_modules.php'),
    'bootstrap' => ['debug'],
    'params' => require(__DIR__ . '/params.php')
];