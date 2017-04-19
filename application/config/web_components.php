<?php

return [
    'db' => require(__DIR__ . '/db.php'),
    'user' => [
        'identityClass' => false,
        'enableAutoLogin' => true
    ],
    'mailer' => [
        'class' => 'yii\swiftmailer\Mailer',
        'useFileTransport' => false,
        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.gmail.com',
            'username' => 'system@site.com', //xxxx@gmail.com
            'password' => '',
            'port' => '587',
            'encryption' => 'tls',
        ],
    ],
    'assetManager' => [
        'forceCopy' => true
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
        ],
    ],
    'request' => [
        'cookieValidationKey' => 'RO10EEu9rvKLlwrH4i92vTkY8OjNAZsm',
    ],
];