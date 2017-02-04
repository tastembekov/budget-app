<?php

$config = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=database_name',
    'username' => 'database_username',
    'password' => 'database_password',
    'charset' => 'utf8',
];

if (file_exists(__DIR__ . '/db.local.php')) {
    $config = \yii\helpers\ArrayHelper::merge($config, require(__DIR__ . '/db.local.php'));
}

return $config;