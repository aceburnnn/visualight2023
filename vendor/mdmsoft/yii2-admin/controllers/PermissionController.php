<?php

namespace mdm\admin\controllers;

use mdm\admin\components\ItemController;
use yii\rbac\Item;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * PermissionController implements the CRUD actions for AuthItem model.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class PermissionController extends ItemController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['login', 'logout', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['ADMIN'],
                  ],
                  [
                      'allow' => true,
                      'actions' => ['index'],
                      'permissions' => ['canPermit'],
                  ],
                  [
                    'allow' => true,
                    'actions' => ['logout'],
                    'roles' => ['ADMIN'], //add only admin allowed
                ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function labels()
    {
        return[
            'Item' => 'Permission',
            'Items' => 'Permissions',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return Item::TYPE_PERMISSION;
    }
}
