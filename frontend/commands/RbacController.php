<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-29
 * Time: 18:41
 */

namespace app\commands;

use yii\console\Controller;
use yii\rbac\DbManager;

class RbacController extends Controller
{
    public function actionIndex(){
        $authManager = \Yii::$app->authManager;

        $admin = $authManager->createRole('admin');
        $viewer = $authManager->createRole('viewer');

        $authManager->add($admin);
        $authManager->add($viewer);

        $permissionCommentAdd = $authManager->createPermission('CommentAdd');
        $permissionAdminTasksAndUsers = $authManager->createPermission('AdminTasksAndUsers');

        $authManager->add($permissionCommentAdd);
        $authManager->add($permissionAdminTasksAndUsers);

        $authManager->addChild($admin, $permissionCommentAdd, $permissionAdminTasksAndUsers);

        $authManager->assign($admin, 1);
        $authManager->assign($viewer, 2);

    }


}