<?php

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

Dotenv::createUnsafeImmutable(__DIR__.'/..')->load();

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', filter_var(getenv('YII_DEBUG'), FILTER_VALIDATE_BOOLEAN));
defined('YII_ENV') or define('YII_ENV', filter_var(getenv('YII_ENV'), FILTER_VALIDATE_BOOLEAN));

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
