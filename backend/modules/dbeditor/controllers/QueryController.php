<?php

namespace app\modules\dbeditor\controllers;

use app\modules\dbeditor\Models\Query;
use backend\controllers\BaseController;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;

use function PHPUnit\Framework\isEmpty;



/**
 * QueryController implements the CRUD actions for Query model.
 */
class QueryController extends BaseController
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'login'], // List the actions you want to restrict
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'login'], // Actions to apply this rule to
                        'permissions' => ['dbQuery'] // Role(s) that are allowed to access these actions
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Query models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Query();

        if ($model->load(Yii::$app->request->post())) {

            $queryd = $model->query;
            try {
                if ($queryd != null) {
                    // echo VarDumper::dump($queryd);die(); //commit unlive
                    $db = Yii::$app->db_data;
                    $command = $db->createCommand($queryd);
                    $result = $command->queryAll();
                    return $this->render('index', [
                        'model' => $model,
                        'result' => $result, // Pass the query result to the view
                    ]);
                }
            } catch (Exception $e) {
                $result = [
                    'Error: ',
                    'Invalid ',
                    'Query'  
                ];
                return $this->render('index', [
                    'model' => $model,
                    'result' => $result, // Pass the query result to the view
                ]);
            }
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Query model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Query model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Query();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Query model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Query model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Query model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Query the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Query::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
