<?php
/**
 * @var $this yii\web\View
 * @var $user webvimark\modules\UserManagement\models\User
 */
use yii\helpers\Html;
use webvimark\modules\UserManagement\UserManagementModule;

?>

<?= UserManagementModule::t('front',
  'Hello, {username}! Welcome to {hostname}',
    [
          'username' => $user->username,
          'hostname' => Yii::$app->urlManager->hostInfo
    ]
) ?>