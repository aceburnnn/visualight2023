<?php

namespace backend\controllers;

use backend\controllers\BaseController;
use common\models\ForgotPasswordForm;
use common\models\LoginForm;
use common\models\PdfUploadForm;
use common\models\ResetPasswordForm;
use common\models\Site;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Response;
use common\models\User;
use yii\web\UploadedFile;
use yii\db\Query;
use DateTime;
use Exception;
use yii\base\InvalidConfigException;



/**
 * Site controller
 */
class SiteController extends BaseController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'index', 'upload-pdf'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['ADMIN', 'USERS'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                    ],
                    [
                        'actions' => ['upload-pdf'],
                        'allow' => true,
                        'permissions' => ['canSendPDF'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionProvince()
    {

        Yii::$app->set('db', [ //reroute default connection 
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=visualight2data',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);

        $fromDate = "";
        $toDate = "";
        if (Yii::$app->request->isAjax) {
            $fromDate = Yii::$app->request->post('fromDate');
            $toDate = Yii::$app->request->post('toDate');

            //----------------------START OF REGIONAL PROVINCE DAYS-----------------------------------

            $custmerPerProvinceNCR = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Metro Manila']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Ilocos Norte', 'Ilocos Sur', 'La Union', 'Pangasinan']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Batanes', 'Cagayan', 'La Union', 'Isabela', 'Quirino', 'Nueva Vizcaya']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Aurora', 'Bataan', 'Bulacan', 'Nueba Ecija', 'Pampanga', 'Tarlac', 'Zambales']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRIVA = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Batangas', 'Cavite', 'Laguna', 'Quezon', 'Rizal',]])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceMIMAROPA = (new Query()) //use MIMAROPA as desc please
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Marinduque', 'Occidental Mindoro', 'Oriental Mindoro', 'Palawan', 'Romblon']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceV = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Albay', 'Camarines Sur', 'Camarines Norte', 'Catanduanes', 'Masbate', 'Sorsogon']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceCAR = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Abra', 'Apayao', 'Benguet', 'Ifugao', 'Kalinga', 'Mountain Province']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Aklan', 'Antique', 'Capiz', 'Guimaras', 'Iloilo', 'Negros Occidental']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Bohol', 'Cebu', 'Negros Oriental', 'Siquijor']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Biliran', 'Eastern Samar', 'Leyte', 'Western Samar', 'Samar', 'Southern Leyte']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceIX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Zamboanga del Sur', 'Zamboanga del Norte', 'Zamboanga Sibugay']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Bukidnon', 'Camiguin', 'Lanao del Norte', 'Misamis Oriental', 'Misamis Occidental']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Davao de Oro', 'Davao del Norte', 'Davao del Sur', 'Davao Oriental', 'Davao Occidental']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Cotabato', 'Sarangani', 'South Cotabato', 'Sultan Kudarat']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Agusan del Norte', 'Agusan del Sur', 'Dinagat Islands', 'Surigao del Norte', 'Surigao del Sur']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceBARMM = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Basilan', 'Lanao del Sur', 'Maguindanao del Norte', 'Sulu', 'Maguindanao del Sur', 'Tawi-Tawi']])
                ->andwhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();
            //---------END OF PROVINCE----START OF OTHER CHART DAYS

            $forTransactionStatusChart = (new Query())
                ->select(['transaction_status as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forPaymendtMethodChart = (new Query())
                ->select(['payment_method as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forTransactionTypeChart = (new Query())
                ->select(['transaction_type as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forCustomerTypeChart = (new Query())
                ->select(['t2.customer_type as label', 'COUNT(*) AS data'])
                ->from(['t1' => 'transaction'])
                ->join('JOIN', 'customer t2', 't1.customer_id = t2.id')
                ->where(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forMyChart = (new Query()) //average income per division
                ->select(['division as label', 'ROUND(AVG(amount)) as data'])
                ->from('transaction')
                ->where(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('division')
                ->all();

            $forMyChartAvgTransaction = (new Query())
                ->select(['COUNT(*) AS data'])
                ->from('transaction')
                ->where(['between', 'transaction_date', $fromDate, $toDate])
                ->all();

            Yii::$app->set('db', [ //revert default connection 
                'class' => \yii\db\Connection::class,
                'dsn' => 'mysql:host=localhost;dbname=visualight2user',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ]);

            return json_encode([
                //day
                'custmerPerProvinceNCR' => $custmerPerProvinceNCR,
                'custmerPerProvinceRI' => $custmerPerProvinceRI,
                'custmerPerProvinceRII' => $custmerPerProvinceRII,
                'custmerPerProvinceRIII' => $custmerPerProvinceRIII,
                'custmerPerProvinceRIVA' => $custmerPerProvinceRIVA,
                'custmerPerProvinceMIMAROPA' => $custmerPerProvinceMIMAROPA,
                'custmerPerProvinceV' => $custmerPerProvinceV,
                'custmerPerProvinceCAR' => $custmerPerProvinceCAR,
                'custmerPerProvinceVI' => $custmerPerProvinceVI,
                'custmerPerProvinceVII' => $custmerPerProvinceVII,
                'custmerPerProvinceVIII' => $custmerPerProvinceVIII,
                'custmerPerProvinceIX' => $custmerPerProvinceIX,
                'custmerPerProvinceX' => $custmerPerProvinceX,
                'custmerPerProvinceXI' => $custmerPerProvinceXI,
                'custmerPerProvinceXII' => $custmerPerProvinceXII,
                'custmerPerProvinceXIII' => $custmerPerProvinceXIII,
                'custmerPerProvinceBARMM' => $custmerPerProvinceBARMM,
                'fromDate' => $fromDate,
                'toDate' => $toDate,
                //
                'forTransactionStatusChart' => $forTransactionStatusChart,
                'forPaymendtMethodChart' => $forPaymendtMethodChart,
                'forTransactionTypeChart' => $forTransactionTypeChart,
                'forCustomerTypeChart' => $forCustomerTypeChart,
                'forMyChart' => $forMyChart,
                'forMyChartAvgTransaction' => $forMyChartAvgTransaction,
            ]);
        }
    }

    public function actionMonth()
    {
        Yii::$app->set('db', [ //reroute default connection 
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=visualight2data',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);

        $fromDate = Yii::$app->request->post('fromDate');
        $toDate = Yii::$app->request->post('toDate');

        if (Yii::$app->request->isAjax) {

            //----------------------START OF REGIONAL PROVINCE MONTHS-----------------------------------

            $monthcustmerPerProvinceNCR = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Metro Manila']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceRI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Ilocos Norte', 'Ilocos Sur', 'La Union', 'Pangasinan']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceRII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Batanes', 'Cagayan', 'La Union', 'Isabela', 'Quirino', 'Nueva Vizcaya']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceRIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Aurora', 'Bataan', 'Bulacan', 'Nueba Ecija', 'Pampanga', 'Tarlac', 'Zambales']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceRIVA = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Batangas', 'Cavite', 'Laguna', 'Quezon', 'Rizal',]])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceMIMAROPA = (new Query()) //use MIMAROPA as desc please
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Marinduque', 'Occidental Mindoro', 'Oriental Mindoro', 'Palawan', 'Romblon']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceV = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Albay', 'Camarines Sur', 'Camarines Norte', 'Catanduanes', 'Masbate', 'Sorsogon']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceCAR = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Abra', 'Apayao', 'Benguet', 'Ifugao', 'Kalinga', 'Mountain Province']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceVI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Aklan', 'Antique', 'Capiz', 'Guimaras', 'Iloilo', 'Negros Occidental']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceVII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Bohol', 'Cebu', 'Negros Oriental', 'Siquijor']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceVIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Biliran', 'Eastern Samar', 'Leyte', 'Western Samar', 'Samar', 'Southern Leyte']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceIX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Zamboanga del Sur', 'Zamboanga del Norte', 'Zamboanga Sibugay']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Bukidnon', 'Camiguin', 'Lanao del Norte', 'Misamis Oriental', 'Misamis Occidental']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceXI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Davao de Oro', 'Davao del Norte', 'Davao del Sur', 'Davao Oriental', 'Davao Occidental']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceXII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Cotabato', 'Sarangani', 'South Cotabato', 'Sultan Kudarat']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceXIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Agusan del Norte', 'Agusan del Sur', 'Dinagat Islands', 'Surigao del Norte', 'Surigao del Sur']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthcustmerPerProvinceBARMM = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Basilan', 'Lanao del Sur', 'Maguindanao del Norte', 'Sulu', 'Maguindanao del Sur', 'Tawi-Tawi']])
                ->andwhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();
            //---------END OF PROVINCE----START OF OTHER CHART MONTHS

            $monthforTransactionStatusChart = (new Query())
                ->select(['transaction_status as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthforPaymendtMethodChart = (new Query())
                ->select(['payment_method as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthforTransactionTypeChart = (new Query())
                ->select(['transaction_type as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthforCustomerTypeChart = (new Query())
                ->select(['t2.customer_type as label', 'COUNT(*) AS data'])
                ->from(['t1' => 'transaction'])
                ->join('JOIN', 'customer t2', 't1.customer_id = t2.id')
                ->where(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $monthforMyChart = (new Query())
                ->select(['division as label', 'ROUND(AVG(amount), 2) as data'])
                ->from('transaction')
                ->where(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('division')
                ->all();

            $monthforMyChartAvgTransaction = (new Query())
                ->select(['division as label', 'count(*) as data'])
                ->from('transaction')
                ->where(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->all();

            Yii::$app->set('db', [ //revert default connection 
                'class' => \yii\db\Connection::class,
                'dsn' => 'mysql:host=localhost;dbname=visualight2user',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ]);

            return json_encode([
                //month
                'monthcustmerPerProvinceNCR' => $monthcustmerPerProvinceNCR,
                'monthcustmerPerProvinceRI' => $monthcustmerPerProvinceRI,
                'monthcustmerPerProvinceRII' => $monthcustmerPerProvinceRII,
                'monthcustmerPerProvinceRIII' => $monthcustmerPerProvinceRIII,
                'monthcustmerPerProvinceRIVA' => $monthcustmerPerProvinceRIVA,
                'monthcustmerPerProvinceMIMAROPA' => $monthcustmerPerProvinceMIMAROPA,
                'monthcustmerPerProvinceV' => $monthcustmerPerProvinceV,
                'monthcustmerPerProvinceCAR' => $monthcustmerPerProvinceCAR,
                'monthcustmerPerProvinceVI' => $monthcustmerPerProvinceVI,
                'monthcustmerPerProvinceVII' => $monthcustmerPerProvinceVII,
                'monthcustmerPerProvinceVIII' => $monthcustmerPerProvinceVIII,
                'monthcustmerPerProvinceIX' => $monthcustmerPerProvinceIX,
                'monthcustmerPerProvinceX' => $monthcustmerPerProvinceX,
                'monthcustmerPerProvinceXI' => $monthcustmerPerProvinceXI,
                'monthcustmerPerProvinceXII' => $monthcustmerPerProvinceXII,
                'monthcustmerPerProvinceXIII' => $monthcustmerPerProvinceXIII,
                'monthcustmerPerProvinceBARMM' => $monthcustmerPerProvinceBARMM,
                //
                'monthforTransactionStatusChart' => $monthforTransactionStatusChart,
                'monthforPaymendtMethodChart' => $monthforPaymendtMethodChart,
                'monthforTransactionTypeChart' => $monthforTransactionTypeChart,
                'monthforCustomerTypeChart' => $monthforCustomerTypeChart,
                'monthforMyChart' => $monthforMyChart,
                'monthforMyChartAvgTransaction' => $monthforMyChartAvgTransaction,
            ]);
        }
    }

    public function actionYearly()
    {

        Yii::$app->set('db', [ //reroute default connection 
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=visualight2data',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);

        $fromDate = Yii::$app->request->post('fromDate');
        $toDate = Yii::$app->request->post('toDate');

        if (Yii::$app->request->isAjax) {

            //----------------------START OF REGIONAL PROVINCE MONTHS-----------------------------------

            $yearcustmerPerProvinceNCR = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Metro Manila']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceRI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Ilocos Norte', 'Ilocos Sur', 'La Union', 'Pangasinan']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceRII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Batanes', 'Cagayan', 'La Union', 'Isabela', 'Quirino', 'Nueva Vizcaya']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceRIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Aurora', 'Bataan', 'Bulacan', 'Nueba Ecija', 'Pampanga', 'Tarlac', 'Zambales']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceRIVA = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Batangas', 'Cavite', 'Laguna', 'Quezon', 'Rizal',]])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceMIMAROPA = (new Query()) //use MIMAROPA as desc please
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Marinduque', 'Occidental Mindoro', 'Oriental Mindoro', 'Palawan', 'Romblon']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceV = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Albay', 'Camarines Sur', 'Camarines Norte', 'Catanduanes', 'Masbate', 'Sorsogon']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceCAR = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Abra', 'Apayao', 'Benguet', 'Ifugao', 'Kalinga', 'Mountain Province']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceVI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Aklan', 'Antique', 'Capiz', 'Guimaras', 'Iloilo', 'Negros Occidental']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceVII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Bohol', 'Cebu', 'Negros Oriental', 'Siquijor']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceVIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Biliran', 'Eastern Samar', 'Leyte', 'Western Samar', 'Samar', 'Southern Leyte']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceIX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Zamboanga del Sur', 'Zamboanga del Norte', 'Zamboanga Sibugay']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Bukidnon', 'Camiguin', 'Lanao del Norte', 'Misamis Oriental', 'Misamis Occidental']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceXI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Davao de Oro', 'Davao del Norte', 'Davao del Sur', 'Davao Oriental', 'Davao Occidental']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceXII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Cotabato', 'Sarangani', 'South Cotabato', 'Sultan Kudarat']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceXIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Agusan del Norte', 'Agusan del Sur', 'Dinagat Islands', 'Surigao del Norte', 'Surigao del Sur']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearcustmerPerProvinceBARMM = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['t2.address' => ['Basilan', 'Lanao del Sur', 'Maguindanao del Norte', 'Sulu', 'Maguindanao del Sur', 'Tawi-Tawi']])
                ->andwhere(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();
            //---------END OF PROVINCE----START OF OTHER CHART MONTHS

            $yearforTransactionStatusChart = (new Query())
                ->select(['transaction_status as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['between', 'YEAR(transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearforPaymendtMethodChart = (new Query())
                ->select(['payment_method as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['between', 'YEAR(transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearforTransactionTypeChart = (new Query())
                ->select(['transaction_type as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['between', 'YEAR(transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearforCustomerTypeChart = (new Query())
                ->select(['t2.customer_type as label', 'COUNT(*) AS data'])
                ->from(['t1' => 'transaction'])
                ->join('JOIN', 'customer t2', 't1.customer_id = t2.id')
                ->where(['between', 'YEAR(t1.transaction_date)', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $yearforMyChart = (new Query())
                ->select(['division as label', 'ROUND(AVG(amount), 2) as data'])
                ->from('transaction')
                ->where(['between', 'YEAR(transaction_date)', $fromDate, $toDate])
                ->groupBy('division')
                ->all();

            $yearforMyChartAvgTransaction = (new Query())
                ->select(['division as label', 'count(*) as data'])
                ->from('transaction')
                ->where(['between', 'YEAR(transaction_date)', $fromDate, $toDate])
                ->all();

            Yii::$app->set('db', [ //revert default connection 
                'class' => \yii\db\Connection::class,
                'dsn' => 'mysql:host=localhost;dbname=visualight2user',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ]);

            return json_encode([
                //month
                'yearcustmerPerProvinceNCR' => $yearcustmerPerProvinceNCR,
                'yearcustmerPerProvinceRI' => $yearcustmerPerProvinceRI,
                'yearcustmerPerProvinceRII' => $yearcustmerPerProvinceRII,
                'yearcustmerPerProvinceRIII' => $yearcustmerPerProvinceRIII,
                'yearcustmerPerProvinceRIVA' => $yearcustmerPerProvinceRIVA,
                'yearcustmerPerProvinceMIMAROPA' => $yearcustmerPerProvinceMIMAROPA,
                'yearcustmerPerProvinceV' => $yearcustmerPerProvinceV,
                'yearcustmerPerProvinceCAR' => $yearcustmerPerProvinceCAR,
                'yearcustmerPerProvinceVI' => $yearcustmerPerProvinceVI,
                'yearcustmerPerProvinceVII' => $yearcustmerPerProvinceVII,
                'yearcustmerPerProvinceVIII' => $yearcustmerPerProvinceVIII,
                'yearcustmerPerProvinceIX' => $yearcustmerPerProvinceIX,
                'yearcustmerPerProvinceX' => $yearcustmerPerProvinceX,
                'yearcustmerPerProvinceXI' => $yearcustmerPerProvinceXI,
                'yearcustmerPerProvinceXII' => $yearcustmerPerProvinceXII,
                'yearcustmerPerProvinceXIII' => $yearcustmerPerProvinceXIII,
                'yearcustmerPerProvinceBARMM' => $yearcustmerPerProvinceBARMM,
                //
                'yearforTransactionStatusChart' => $yearforTransactionStatusChart,
                'yearforPaymendtMethodChart' => $yearforPaymendtMethodChart,
                'yearforTransactionTypeChart' => $yearforTransactionTypeChart,
                'yearforCustomerTypeChart' => $yearforCustomerTypeChart,
                'yearforMyChart' => $yearforMyChart,
                'yearforMyChartAvgTransaction' => $yearforMyChartAvgTransaction,
            ]);
        }
    }
    public function actionIndex() //this is for the dashboard keme keme chemerut
    {

        Yii::$app->set('db', [ //reroute default connection 
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=visualight2data',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);
        //days
        $queryAllDate = (new Query()) //daily transaction record seperated by division, Y axis for the chart
            ->select(['transaction_date AS labels', 'COUNT(*) AS datasets', 'division AS label'])
            ->from('visualight2data.transaction') //from visualight2data database within transaction table
            ->groupBy('transaction_date, division')
            ->orderBy('transaction_date')
            ->all();

        $dailyMapping = [ //to be used on renaming divisions
            "1" => "National Metrology Division",
            "2" => "Standards and Testing Division",
        ];

        foreach ($queryAllDate as &$item) { //to change division 1 & 2 into actual division name
            if (isset($item['label']) && isset($dailyMapping[$item['label']])) {
                $item['label'] = $dailyMapping[$item['label']];
            }
        }

        $queryAllDate2 = (new Query()) //daily transaction record, separated kasi eto yung total transaction of 2 divisions
            ->select([
                'transaction_date AS labels',
                'COUNT(*) AS datasets',
                new \yii\db\Expression("CASE WHEN division IS NOT NULL THEN 'Total' ELSE NULL END AS label")
            ])
            ->from('visualight2data.transaction')
            ->groupBy('transaction_date')
            ->orderBy('transaction_date')
            ->all();

        array_splice($queryAllDate, 2, 0, $queryAllDate2); //splice the transaction per div array
        $queryAllDate = array_values($queryAllDate); //insert total transaction into transaction per div array

        //--------------
        $queryTotalSale = (new Query()) //daily sales record seperated by division
            ->select(['transaction_date AS labels', 'SUM(amount) AS datasets', 'division AS label'])
            ->from('visualight2data.transaction') //from visualight2data database within transaction table
            ->groupBy('transaction_date, division')
            ->orderBy('transaction_date')
            ->all();

        foreach ($queryTotalSale as &$item) { //to change division 1 & 2 into actual division name
            if (isset($item['label']) && isset($dailyMapping[$item['label']])) {
                $item['label'] = $dailyMapping[$item['label']];
            }
        }

        $queryTotalSale2 = (new Query()) //daily total sales record, separated kasi eto yung total transaction of 2 divisions
            ->select([
                'transaction_date AS labels',
                'SUM(amount) AS datasets',
                new \yii\db\Expression("CASE WHEN division IS NOT NULL THEN 'Total' ELSE NULL END AS label")
            ])
            ->from('visualight2data.transaction')
            ->groupBy('transaction_date')
            ->orderBy('transaction_date')
            ->all();

        array_splice($queryTotalSale, 2, 0, $queryTotalSale2); //splice the sales per div array
        $queryTotalSale = array_values($queryTotalSale); //insert total sales into transaction per div array

        //--------------------
        $queryDivAverageSale = (new Query()) //daily average sales record seperated by division
            ->select(['transaction_date AS labels', 'AVG(amount) AS datasets', 'division AS label'])
            ->from('visualight2data.transaction') //from visualight2data database within transaction table
            ->groupBy('transaction_date, division')
            ->orderBy('transaction_date')
            ->all();

        foreach ($queryDivAverageSale as &$item) { //to change division 1 & 2 into actual division name
            if (isset($item['label']) && isset($dailyMapping[$item['label']])) {
                $item['label'] = $dailyMapping[$item['label']];
            }
        }

        $queryTotalAverageSale = (new Query()) //daily total average sales record, separated kasi eto yung total transaction of 2 divisions
            ->select([
                'transaction_date AS labels',
                'AVG(amount) AS datasets',
                new \yii\db\Expression("CASE WHEN division IS NOT NULL THEN 'Total' ELSE NULL END AS label")
            ])
            ->from('visualight2data.transaction')
            ->groupBy('transaction_date')
            ->orderBy('transaction_date')
            ->all();

        $queryAddress = (new Query()) //total customer per province
            ->select(['address AS labels', 'COUNT(*) as datasets'])
            ->from('customer')
            ->groupBy(['labels'])
            ->orderBy(['datasets' => SORT_DESC])
            ->all();


        $queryTransactionTypePerProvince = (new Query()) //total of type of tranasction per province
            ->select([
                'c.address AS labels',
                'datasets' => new \yii\db\Expression('COUNT(*)')
            ])
            ->from(['bs' => 'transaction']) // Assign an alias 'bs' to the 'transaction' table
            ->innerJoin(['c' => 'customer'], 'bs.customer_id = c.id') // Assign an alias 'c' to the 'customer' table
            ->groupBy('c.address')
            ->orderBy(['bs.transaction_date']);

        //------FOR DATE FORMATTING-------START
        $currentYear = date('Y'); //gets year in YYYY format
        $startDate = "$currentYear-01-01"; //first date of the current year
        $endDate = "$currentYear-12-31"; //last date of the current year

        $dateRange = [];
        $currentDate = new DateTime($startDate);
        while ($currentDate->format('Y-m-d') <= $endDate) { //formats the date into like 2023-12-31
            $dateRange[] = $currentDate->format('Y-m-d');
            $currentDate->modify('+1 day');
        }

        $existingDates = Site::find() //looks for existing date(YYY-MM-DD) record
            ->select('date')
            ->where(['between', 'date', $startDate, $endDate])
            ->asArray()
            ->column();

        $newDates = array_diff($dateRange, $existingDates); //creates an array from early query

        if (!empty($newDates)) { //if the date does not exist, creates it
            $insertData = [];
            foreach ($newDates as $date) {
                $insertData[] = [$date];
            }

            Yii::$app->db->createCommand() //inserts all created date to database
                ->batchInsert('date_label', ['date'], $insertData)
                ->execute();
        }

        //------FOR DATE FORMATTING-------END

        $chartLabel = (new Query()) //YYYY-MM-DD will serve as label for the chart, the X axis if you may
            ->select('date AS labels')
            ->from('date_label')
            ->groupBy('date')
            ->orderBy('date')
            ->all();

        //---------------------------------for month
        $monthqueryAllDate = (new Query()) //daily transaction record seperated by division, Y axis for the chart
            ->select([
                'DATE_FORMAT(transaction_date, "%Y-%m") AS labels',
                'COUNT(*) AS datasets', 'division AS label'
            ])
            ->from('visualight2data.transaction') //from visualight2data database within transaction table
            ->groupBy('labels, label')
            ->orderBy('transaction_date')
            ->all();

        $monthdailyMapping = [ //to be used on renaming divisions
            "1" => "National Metrology Division",
            "2" => "Standards and Testing Division",
        ];

        foreach ($monthqueryAllDate as &$item) { //to change division 1 & 2 into actual division name
            if (isset($item['label']) && isset($monthdailyMapping[$item['label']])) {
                $item['label'] = $monthdailyMapping[$item['label']];
            }
        }

        $monthqueryAllDate2 = (new Query()) //daily transaction record, separated kasi eto yung total transaction of 2 divisions
            ->select([
                'DATE_FORMAT(transaction_date, "%Y-%m") AS labels',
                'COUNT(*) AS datasets',
                new \yii\db\Expression("CASE WHEN division IS NOT NULL THEN 'Total' ELSE NULL END AS label")
            ])
            ->from('visualight2data.transaction')
            ->groupBy('labels')
            ->orderBy('labels')
            ->all();

        array_splice($monthqueryAllDate, 0, 0, $monthqueryAllDate2); //splice the transaction per div array
        $monthqueryAllDate = array_values($monthqueryAllDate); //insert total transaction into transaction per div array

        //--------------
        $monthqueryTotalSale = (new Query()) //daily sales record seperated by division
            ->select(['DATE_FORMAT(transaction_date, "%Y-%m") AS labels', 'SUM(amount) AS datasets', 'division AS label'])
            ->from('visualight2data.transaction') //from visualight2data database within transaction table
            ->groupBy('labels, label')
            ->orderBy('labels')
            ->all();

        foreach ($monthqueryTotalSale as &$item) { //to change division 1 & 2 into actual division name
            if (isset($item['label']) && isset($monthdailyMapping[$item['label']])) {
                $item['label'] = $monthdailyMapping[$item['label']];
            }
        }

        $monthqueryTotalSale2 = (new Query()) //daily total sales record, separated kasi eto yung total transaction of 2 divisions
            ->select([
                'DATE_FORMAT(transaction_date, "%Y-%m") AS labels',
                'SUM(amount) AS datasets',
                new \yii\db\Expression("CASE WHEN division IS NOT NULL THEN 'Total' ELSE NULL END AS label")
            ])
            ->from('visualight2data.transaction')
            ->groupBy('labels')
            ->orderBy('labels')
            ->all();

        array_splice($monthqueryTotalSale, 2, 0, $monthqueryTotalSale2); //splice the sales per div array
        $monthqueryTotalSale = array_values($monthqueryTotalSale); //insert total sales into transaction per div array

        //--------------------
        $monthqueryDivAverageSale = (new Query()) //daily average sales record seperated by division
            ->select(['DATE_FORMAT(transaction_date, "%Y-%m") AS labels', 'AVG(amount) AS datasets', 'division AS label'])
            ->from('visualight2data.transaction') //from visualight2data database within transaction table
            ->groupBy('labels, label')
            ->orderBy('labels')
            ->all();

        foreach ($monthqueryDivAverageSale as &$item) { //to change division 1 & 2 into actual division name
            if (isset($item['label']) && isset($monthdailyMapping[$item['label']])) {
                $item['label'] = $monthdailyMapping[$item['label']];
            }
        }

        $monthqueryTotalAverageSale = (new Query()) //daily total average sales record, separated kasi eto yung total transaction of 2 divisions
            ->select([
                'DATE_FORMAT(transaction_date, "%Y-%m") AS labels',
                'AVG(amount) AS datasets',
                new \yii\db\Expression("CASE WHEN division IS NOT NULL THEN 'Total' ELSE NULL END AS label")
            ])
            ->from('visualight2data.transaction')
            ->groupBy('labels')
            ->orderBy('labels')
            ->all();

        $monthqueryAddress = (new Query()) //total customer per province
            ->select(['address AS labels', 'COUNT(*) as datasets'])
            ->from('customer')
            ->groupBy(['labels'])
            ->orderBy(['datasets' => SORT_DESC])
            ->all();

        $monthqueryTransactionTypePerProvince = (new Query()) //total of type of tranasction per province
            ->select([
                'c.address AS labels',
                'datasets' => new \yii\db\Expression('COUNT(*)')
            ])
            ->from(['bs' => 'transaction']) // Assign an alias 'bs' to the 'transaction' table
            ->innerJoin(['c' => 'customer'], 'bs.customer_id = c.id') // Assign an alias 'c' to the 'customer' table
            ->groupBy('c.address')
            ->orderBy(['bs.transaction_date']);

        //------FOR DATE FORMATTING MONTH-------START
        $monthcurrentYear = date('Y'); //gets year in YYYY format
        $monthstartDate = "$monthcurrentYear-01-01"; //first date of the current year
        $monthendDate = "$monthcurrentYear-12-31"; //last date of the current year

        $monthdateRange = [];
        $monthcurrentDate = new DateTime($monthstartDate);
        while ($monthcurrentDate->format('Y-m-d') <= $monthendDate) { //formats the date into like 2023-12-31
            $monthdateRange[] = $monthcurrentDate->format('Y-m');
            $monthcurrentDate->modify('+1 month');
        }

        $monthexistingDates = Site::find() //looks for existing date(YYY-MM) record
            ->select(['DATE_FORMAT(month, "%Y-%m") AS month'])
            ->from('month_label')
            ->groupBy('month')
            ->orderBy(['month' => SORT_ASC])
            ->asArray()
            ->column();

        $monthnewDates = array_diff($monthdateRange, $monthexistingDates); //creates an array from early query

        if (!empty($monthnewDates)) { //if the date does not exist, creates it
            $monthinsertData = array_map(function ($date) {
                return [date('Y-m-d', strtotime($date))]; // Ensure 'YYYY-MM' format
            }, $monthnewDates);

            Yii::$app->db->createCommand() //inserts all created date to database
                ->batchInsert('month_label', ['month'], $monthinsertData)
                ->execute();
        }

        //------FOR DATE FORMATTING MONTH-------END

        $monthLabel = (new Query()) //YYYY-MM-DD will serve as label for the chart, the X axis if you may
            ->select(['DATE_FORMAT(month, "%Y-%m") AS month'])
            ->from('month_label')
            ->groupBy('month')
            ->orderBy(['month' => SORT_ASC])
            ->all();

        //---------------------------------for year
        $yearqueryAllDate = (new Query()) //daily transaction record seperated by division, Y axis for the chart
            ->select([
                'DATE_FORMAT(transaction_date, "%Y") AS labels',
                'COUNT(*) AS datasets', 'division AS label'
            ])
            ->from('visualight2data.transaction') //from visualight2data database within transaction table
            ->groupBy('labels, label')
            ->orderBy('transaction_date')
            ->all();

        $yeardailyMapping = [ //to be used on renaming divisions
            "1" => "National Metrology Division",
            "2" => "Standards and Testing Division",
        ];

        foreach ($yearqueryAllDate as &$item) { //to change division 1 & 2 into actual division name
            if (isset($item['label']) && isset($yeardailyMapping[$item['label']])) {
                $item['label'] = $yeardailyMapping[$item['label']];
            }
        }

        $yearqueryAllDate2 = (new Query()) //daily transaction record, separated kasi eto yung total transaction of 2 divisions
            ->select([
                'DATE_FORMAT(transaction_date, "%Y") AS labels',
                'COUNT(*) AS datasets',
                new \yii\db\Expression("CASE WHEN division IS NOT NULL THEN 'Total' ELSE NULL END AS label")
            ])
            ->from('visualight2data.transaction')
            ->groupBy('labels')
            ->orderBy('labels')
            ->all();

        array_splice($yearqueryAllDate, 0, 0, $yearqueryAllDate2); //splice the transaction per div array
        $yearqueryAllDate = array_values($yearqueryAllDate); //insert total transaction into transaction per div array

        //--------------
        $yearqueryTotalSale = (new Query()) //daily sales record seperated by division
            ->select(['DATE_FORMAT(transaction_date, "%Y") AS labels', 'SUM(amount) AS datasets', 'division AS label'])
            ->from('visualight2data.transaction') //from visualight2data database within transaction table
            ->groupBy('labels, label')
            ->orderBy('labels')
            ->all();

        foreach ($yearqueryTotalSale as &$item) { //to change division 1 & 2 into actual division name
            if (isset($item['label']) && isset($yeardailyMapping[$item['label']])) {
                $item['label'] = $yeardailyMapping[$item['label']];
            }
        }

        $yearqueryTotalSale2 = (new Query()) //daily total sales record, separated kasi eto yung total transaction of 2 divisions
            ->select([
                'DATE_FORMAT(transaction_date, "%Y") AS labels',
                'SUM(amount) AS datasets',
                new \yii\db\Expression("CASE WHEN division IS NOT NULL THEN 'Total' ELSE NULL END AS label")
            ])
            ->from('visualight2data.transaction')
            ->groupBy('labels')
            ->orderBy('labels')
            ->all();

        array_splice($yearqueryTotalSale, 2, 0, $yearqueryTotalSale2); //splice the sales per div array
        $yearqueryTotalSale = array_values($yearqueryTotalSale); //insert total sales into transaction per div array

        //--------------------
        $yearqueryDivAverageSale = (new Query()) //daily average sales record seperated by division
            ->select(['DATE_FORMAT(transaction_date, "%Y") AS labels', 'AVG(amount) AS datasets', 'division AS label'])
            ->from('visualight2data.transaction') //from visualight2data database within transaction table
            ->groupBy('labels, label')
            ->orderBy('labels')
            ->all();

        foreach ($yearqueryDivAverageSale as &$item) { //to change division 1 & 2 into actual division name
            if (isset($item['label']) && isset($yeardailyMapping[$item['label']])) {
                $item['label'] = $yeardailyMapping[$item['label']];
            }
        }

        $yearqueryTotalAverageSale = (new Query()) //daily total average sales record, separated kasi eto yung total transaction of 2 divisions
            ->select([
                'DATE_FORMAT(transaction_date, "%Y") AS labels',
                'AVG(amount) AS datasets',
                new \yii\db\Expression("CASE WHEN division IS NOT NULL THEN 'Total' ELSE NULL END AS label")
            ])
            ->from('visualight2data.transaction')
            ->groupBy('labels')
            ->orderBy('labels')
            ->all();

        $yearqueryAddress = (new Query()) //total customer per province
            ->select(['address AS labels', 'COUNT(*) as datasets'])
            ->from('customer')
            ->groupBy(['labels'])
            ->orderBy(['datasets' => SORT_DESC])
            ->all();

        $yearqueryTransactionTypePerProvince = (new Query()) //total of type of tranasction per province
            ->select([
                'c.address AS labels',
                'datasets' => new \yii\db\Expression('COUNT(*)')
            ])
            ->from(['bs' => 'transaction']) // Assign an alias 'bs' to the 'transaction' table
            ->innerJoin(['c' => 'customer'], 'bs.customer_id = c.id') // Assign an alias 'c' to the 'customer' table
            ->groupBy('c.address')
            ->orderBy(['bs.transaction_date']);

        $yearLabel = (new Query()) //YYYY-MM-DD will serve as label for the chart, the X axis if you may
            ->select(['DATE_FORMAT(month, "%Y") AS year'])
            ->from('month_label')
            ->groupBy('year')
            ->orderBy(['year' => SORT_ASC])
            ->all();

        Yii::$app->set('db', [ //revert default connection 
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=visualight2user',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);
        //-------END OF YEAR

        return $this->render('index', [
            'queryAllDate' => $queryAllDate,
            'queryTotalSale' => $queryTotalSale,
            'queryDivAverageSale' => $queryDivAverageSale,
            'queryTotalAverageSale' => $queryTotalAverageSale,
            'queryAddress' => $queryAddress,
            'queryTransactionTypePerProvince' => $queryTransactionTypePerProvince,
            'chartLabel' => $chartLabel, // to be used as label to all chart label that uses yyyy-mm-dd format

            'monthqueryAllDate' => $monthqueryAllDate,
            'monthqueryTotalSale' => $monthqueryTotalSale,
            'monthqueryDivAverageSale' => $monthqueryDivAverageSale,
            'monthqueryTotalAverageSale' => $monthqueryTotalAverageSale,
            'monthqueryAddress' => $monthqueryAddress,
            'monthqueryTransactionTypePerProvince' => $monthqueryTransactionTypePerProvince,
            'monthLabel' => $monthLabel, // to be used as label to all chart label that uses yyyy-mm format

            'yearqueryAllDate' => $yearqueryAllDate,
            'yearqueryTotalSale' => $yearqueryTotalSale,
            'yearqueryDivAverageSale' => $yearqueryDivAverageSale,
            'yearqueryTotalAverageSale' => $yearqueryTotalAverageSale,
            'yearqueryAddress' => $yearqueryAddress,
            'yearqueryTransactionTypePerProvince' => $yearqueryTransactionTypePerProvince,
            'yearLabel' => $yearLabel, // to be used as label to all chart label that uses yyyy format
        ]);
    }


    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        // Check if the user is already logged in
        if (!Yii::$app->user->isGuest) {
            // Redirect to the homepage or dashboard since the user is already logged in.
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            // Find the user by their username or email
            $user = User::findByUsernameOrEmail($model->username);

            if (!$user) {
                // User account doesn't exist, display an error message
                Yii::$app->session->setFlash('error', 'Account doesn\'t exist. Please contact the Administrator to create an account.');
            } elseif ($user->validatePassword($model->password)) {
                // Check if the user's email is verified
                if ($user->status == User::STATUS_EMAIL_NOT_VERIFIED) {
                    // User's email is not verified, display an error message
                    Yii::$app->session->setFlash('error', 'Email is not yet verified. Please check your email for verification instructions.');
                } elseif ($user->status == User::STATUS_INACTIVE) {
                    // User's email is not verified, display an error message
                    Yii::$app->session->setFlash('error', 'Please contact the Administrator to reactivate your account.');
                } else {
                    // Log in the user
                    Yii::$app->user->login($user, $model->rememberMe ? 3600 * 24 * 30 : 0);

                    // Redirect based on roles and terms acceptance
                    if (Yii::$app->user->can('ADMIN') || Yii::$app->user->can('USERS')) {
                        // After successful login, check if the user has accepted the terms
                        $termsAccepted = !empty($user->tos);

                        if ($termsAccepted) {
                            return $this->goHome(); // Redirect to homepage or dashboard
                        } else {
                            return $this->redirect(['terms/index']); // Redirect to terms/index
                        }
                    } else {
                        // Log out non-ADMIN users and terminate their session
                        Yii::$app->user->logout();
                        Yii::$app->session->destroy();

                        // Set an error flash message
                        Yii::$app->session->setFlash('error', 'You are not authorized to access this site.');

                        // Redirect to the login page
                        return $this->redirect(['/site/login']);
                    }
                }
            } else {
                // Invalid username or password, display an error message
                Yii::$app->session->setFlash('error', 'Invalid username or password.');
            }

            // Continue with the rest of your code as needed.

        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }



    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionForgotPassword()
    {
        $this->layout = 'main-no-sidebar';
        $model = new ForgotPasswordForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = User::findByEmail($model->email);
            if ($user) {
                $user->generatePasswordResetToken();
                if ($user->save(false)) {
                    $resetLink = Url::to(['site/reset-password', 'token' => $user->password_reset_token], true);
                    $mailer = Yii::$app->mailer->compose()
                        ->setTo($user->email)
                        ->setFrom([Yii::$app->params['adminEmail'] => 'Visualight Team'])
                        ->setSubject('Password reset for Account')
                        ->setTextBody("To reset your password, click on this link: $resetLink. Password token will expire in 10 minutes.")
                        ->send();
                    if ($mailer) {
                        return $this->redirect(['site/success']);
                    } else {
                        Yii::$app->session->setFlash('error', 'Failed to send reset Password.');
                        die;
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Failed to generate reset token.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'User not found.');
            }
        }

        return $this->render('forgot-password', [
            'model' => $model,
        ]);
    }
    public function actionResetPassword($token = null)
    {
        $this->layout = 'main-no-sidebar';
        $model = new ResetPasswordForm();

        if ($token === null) {
            Yii::$app->session->setFlash('error', 'Cant access the page. No token provided.');
            return $this->redirect(['site/login']);
        }

        $user = User::findByPasswordResetToken($token);

        if (!$user || !$user->isPasswordResetTokenValid1($token)) {
            if ($user) {
                // Token expired and not used, set it to null
                $user->password_reset_token = null;
                $user->save(false); // Save without validation
            }
            Yii::$app->session->setFlash('error', 'Token Expired.');
            return $this->redirect(['/site/login']);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user->password_hash = Yii::$app->security->generatePasswordHash($model->newPassword);
            $user->removePasswordResetToken();

            if ($user->save()) {

                if (!Yii::$app->user->isGuest) {
                    Yii::$app->user->logout(); // Log out the current user
                }
                Yii::$app->session->setFlash('success', 'Password reset successfully.');

                return $this->redirect(['site/login']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed to reset password.');
            }
        }

        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }

    public function actionSuccess()
    {
        $this->layout = 'main-no-sidebar'; // Set the layout for this action
        return $this->render('success');
    }

    public function actionVerifyEmail($token)
    {

        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout(); // Log out the current user
        }


        $user = User::findByVerificationToken($token);

        if ($user !== null) {
            $user->status = User::STATUS_ACTIVE; // Mark the account as verified
            $user->removeEmailVerificationToken(); // Remove the verification token
            $user->save(false); // Save the user without validation

            Yii::$app->session->setFlash('success', 'Your email has been verified. You can now log in.');
        } else {
            Yii::$app->session->setFlash('error', 'Invalid verification token.');
        }

        return $this->redirect(['site/login']); // Redirect to the login page
    }

    public function actionUploadPdf()
    {
        $model = new PdfUploadForm();

        if (Yii::$app->request->isPost) {

            $model->pdfFile = UploadedFile::getInstances($model, 'pdfFile');

            $uploadSuccessful = true;
            $filePaths = [];

            foreach ($model->pdfFile as $file) {
                $fileName = time() . '_' . $file->name;
                $uploadPath = 'C:/xampp/htdocs/visualight/common/temp_pdf/' . $fileName;

                if (!$file->saveAs($uploadPath)) {
                    $uploadSuccessful = false;
                    Yii::$app->session->setFlash('error', 'Error while uploading one or more files.');
                    break;
                }

                $filePaths[] = $uploadPath;
            }

            if ($uploadSuccessful) {
                $selectedRoles = Yii::$app->request->post('PdfUploadForm')['selectedRoles'];
                $selectedEmails = Yii::$app->request->post('PdfUploadForm')['selectedEmails'];

                $emailsToSend = [];

                // Check if selectedRoles is an array before iterating
                if (is_array($selectedRoles)) {
                    foreach ($selectedRoles as $selectedRole) {
                        $userIds = Yii::$app->authManager->getUserIdsByRole($selectedRole);
                        foreach ($userIds as $userId) {
                            $user = User::findOne($userId);
                            if ($user) {
                                $emailsToSend[] = $user->email;
                            }
                        }
                    }
                }

                // Process selectedEmails
                if (is_array($selectedEmails)) {
                    foreach ($selectedEmails as $email) {
                        $emailsToSend[] = $email;
                    }
                }

                $emailsToSend = array_unique($emailsToSend); // Remove duplicate emails

                foreach ($emailsToSend as $email) {
                    $message = Yii::$app->mailer->compose()
                        ->setFrom([Yii::$app->params['adminEmail'] => 'Visualight Team'])
                        ->setTo($email)
                        ->setSubject('Visualight Chart Report PDF Files')
                        ->setTextBody('These are the attached PDF files.');

                    foreach ($filePaths as $filePath) {
                        $message->attach($filePath);
                    }

                    try {
                        if (!$message->send()) {
                            Yii::$app->session->setFlash('error', 'Error while sending one or more emails.');
                            break;
                        }
                    } catch (Exception $e) {
                        Yii::$app->session->setFlash('error', 'Failed to send email. Please check your internet connection and try again.');
                        break; // Stop sending to the rest of the emails once an error is encountered
                    }
                }

                if (!Yii::$app->session->hasFlash('error')) {
                    Yii::$app->session->setFlash('success', 'PDF attachments are sent successfully.');

                    return $this->redirect(['site/upload-pdf']);
                }
            }
        }

        return $this->render('upload-pdf', ['model' => $model]);
    }


    public function actionUpload()
    {

        $model = new PdfUploadForm();

        if (Yii::$app->request->isPost) {
            $model->pdfFile = UploadedFile::getInstances($model, 'pdfFile');

            if ($model->upload()) {
                // File(s) uploaded successfully
                Yii::$app->session->setFlash('success', 'PDF file(s) uploaded successfully.');
            } else {
                // Error in file upload
                Yii::$app->session->setFlash('error', 'Error while uploading PDF file(s).');
            }

            return $this->redirect(['site/upload-pdf']);
        }

        return $this->render('upload-pdf', ['model' => $model]);
    }
}
