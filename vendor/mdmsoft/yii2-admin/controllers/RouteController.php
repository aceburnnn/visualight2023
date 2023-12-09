<?php

namespace mdm\admin\controllers;

use Yii;
use mdm\admin\models\Route;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Description of RuleController
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class RouteController extends BaseController
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
                      'permissions' => ['canRoute'],
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
                    'create' => ['post'],
                    'assign' => ['post'],
                    'remove' => ['post'],
                    'refresh' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Lists all Route models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Route();
        return $this->render('index', ['routes' => $model->getRoutes()]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
{
    Yii::$app->getResponse()->format = 'json';
    $routes = Yii::$app->getRequest()->post('route', '');
    $routes = preg_split('/\s*,\s*/', trim($routes), -1, PREG_SPLIT_NO_EMPTY);
    $model = new Route();

    $existingRoutes = $model->getRoutes(); // Get existing routes

    // Check if any of the entered routes already exist or are assigned
    $existingRoutesFlattened = array_merge($existingRoutes['available'], $existingRoutes['assigned']);
    $alreadyAssigned = array_intersect($routes, $existingRoutesFlattened);

    $successMessage = ''; // Initialize successMessage
    $errorMessage = ''; // Initialize errorMessage

    foreach ($routes as $route) {
        if (!in_array($route, $existingRoutesFlattened)) {
            // The route doesn't exist in the system
            $model->addNew([$route]);
            $successMessage .= 'Route "' . $route . '" added successfully. ';        } elseif (in_array($route, $existingRoutesFlattened)) {
            if (!in_array($route, $existingRoutes['assigned'])) {
                // The route exists but is not assigned
                $model->addNew([$route]);
                $successMessage .= 'Route "' . $route . '" added successfully. ';
            } else {
                // The route is already assigned
                $errorMessage .= 'Route "' . $route . '" is already assigned. ';
            }
        } else {
            // Add the new route
            $model->addNew([$route]);
            $successMessage .= 'Route "' . $route . '" added successfully. ';
        }
    }

    // Set a success message in the response
    $response = [
        'routes' => $model->getRoutes(),
        'successMessage' => $successMessage,
        'errorMessage' => $errorMessage,
    ];

    return $response;
}


    /**
     * Assign routes
     * @return array
     */
    public function actionAssign()
    {
        $routes = Yii::$app->getRequest()->post('routes', []);
        $model = new Route();
        $model->addNew($routes);
        Yii::$app->getResponse()->format = 'json';
        return $model->getRoutes();
    }

    /**
     * Remove routes
     * @return array
     */
    public function actionRemove()
    {
        $routes = Yii::$app->getRequest()->post('routes', []);
        $model = new Route();
        $model->remove($routes);
        Yii::$app->getResponse()->format = 'json';
        return $model->getRoutes();
    }

    /**
     * Refresh cache
     * @return type
     */
    public function actionRefresh()
    {
        $model = new Route();
        $model->invalidate();
        Yii::$app->getResponse()->format = 'json';
        return $model->getRoutes();
    }
}
