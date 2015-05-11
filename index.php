<?php

use source\core\front\BaseFrontApplication;
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require (__DIR__ . '/vendor/autoload.php');
require (__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

require (__DIR__ . '/source/config/bootstrap.php');
require (__DIR__ . '/frontend/config/bootstrap.php');


$config = yii\helpers\ArrayHelper::merge(
		require(__DIR__ . '/source/config/main.php'),
		require(__DIR__ . '/source/config/main-local.php'),
		require(__DIR__ . '/frontend/config/main.php'),
		require(__DIR__ . '/frontend/config/main-local.php')
);

$app = new BaseFrontApplication($config);
$app->run();


