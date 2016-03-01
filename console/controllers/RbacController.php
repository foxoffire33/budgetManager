<?php

/**
 * Created by PhpStorm.
 * User: reinier
 * Date: 01/03/16
 * Time: 16:48
 */
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $user = $auth->createRole('user');
        $auth->add($user);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $user);

        $auth->assign($admin, 1);
    }
}