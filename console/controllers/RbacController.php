<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Create the "admin" role if it doesn't exist
        $admin = $auth->getRole('admin');
        if (!$admin) {
            $admin = $auth->createRole('admin');
            $auth->add($admin);
        }

        // Create the "user" role if it doesn't exist
        $user = $auth->getRole('user');
        if (!$user) {
            $user = $auth->createRole('user');
            $auth->add($user);
        }

        // Create the "createPost" permission if it doesn't exist
        $createPost = $auth->getPermission('createPost');
        if (!$createPost) {
            $createPost = $auth->createPermission('createPost');
            $createPost->description = 'Create a post';
            $auth->add($createPost);
        }

        // Create the "updatePost" permission if it doesn't exist
        $updatePost = $auth->getPermission('updatePost');
        if (!$updatePost) {
            $updatePost = $auth->createPermission('updatePost');
            $updatePost->description = 'Update a post';
            $auth->add($updatePost);
        }

        // Create the "createUser" permission if it doesn't exist
        $createUser = $auth->getPermission('createUser');
        if (!$createUser) {
            $createUser = $auth->createPermission('createUser');
            $createUser->description = 'Create a user';
            $auth->add($createUser);
        }

        // Create the "updateUser" permission if it doesn't exist
        $updateUser = $auth->getPermission('updateUser');
        if (!$updateUser) {
            $updateUser = $auth->createPermission('updateUser');
            $updateUser->description = 'Update a user';
            $auth->add($updateUser);
        }

        // Assign permissions to roles
        $auth->addChild($admin, $createPost);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $createUser); // Assign "createUser" to "admin"
        $auth->addChild($admin, $updateUser); // Assign "updateUser" to "admin"

        $auth->addChild($user, $updatePost);
        $auth->addChild($user, $updateUser); // Assign "updateUser" to "user"

        echo "Roles and permissions have been created successfully.\n";
    }
}
