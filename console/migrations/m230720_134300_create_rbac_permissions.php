<?php

use yii\db\Migration;

/**
 * Class m230720_134300_create_rbac_permissions
 */
class m230720_134300_create_rbac_permissions extends Migration
{
    /**
     * {@inheritdoc}
     */public function up()
    {
        $auth = Yii::$app->authManager;

        // We create "createUser" permission
        $createUser = $auth->createPermission('createUser');
        $createUser->description = 'Can create a new user';
        $auth->add($createUser);

        // We create "updateUser" permission
        $updateUser = $auth->createPermission('updateUser');
        $updateUser->description = 'Can update an existing user';
        $auth->add($updateUser);

        // We create the "admin" role (if it doesn't exist)
        $adminRole = $auth->createRole('admin');
        $adminRole->description = 'Administrator role';
        $auth->add($adminRole);

        // We assign permissions to the "admin" role
        $auth->addChild($adminRole, $createUser);
        $auth->addChild($adminRole, $updateUser);

        // If you have more permissions or roles to create or assign, you can add them here...
    }

    public function down()
    {
        // If you need to revert the changes, you can put the code here...
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230720_134300_create_rbac_permissions cannot be reverted.\n";

        return false;
    }
    */
}
