<?php

// Ang `namespace` ay parang location o address kung saan makikita ang controller na ito sa folder na `backend\modules\chart\controllers`.
namespace backend\modules\std\controllers;

// I-import natin yung kailangan nating class para ma-extend yung Yii Controller.
use backend\controllers\BaseController;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\db\Query;
use Yii;

// I-extend natin yung Controller class para makagawa tayo ng ating custom ChartController.
class ChartController extends BaseController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'permissions' => ['STDpermission'],
                    ]
                ],
            ],
        ];
    }


    public function actionDay()
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
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Metro Manila']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Ilocos Norte', 'Ilocos Sur', 'La Union', 'Pangasinan']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Batanes', 'Cagayan', 'La Union', 'Isabela', 'Quirino', 'Nueva Vizcaya']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Aurora', 'Bataan', 'Bulacan', 'Nueba Ecija', 'Pampanga', 'Tarlac', 'Zambales']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRIVA = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Batangas', 'Cavite', 'Laguna', 'Quezon', 'Rizal',]])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceMIMAROPA = (new Query()) //use MIMAROPA as desc please
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Marinduque', 'Occidental Mindoro', 'Oriental Mindoro', 'Palawan', 'Romblon']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceV = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Albay', 'Camarines Sur', 'Camarines Norte', 'Catanduanes', 'Masbate', 'Sorsogon']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceCAR = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Abra', 'Apayao', 'Benguet', 'Ifugao', 'Kalinga', 'Mountain Province']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Aklan', 'Antique', 'Capiz', 'Guimaras', 'Iloilo', 'Negros Occidental']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Bohol', 'Cebu', 'Negros Oriental', 'Siquijor']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Biliran', 'Eastern Samar', 'Leyte', 'Western Samar', 'Samar', 'Southern Leyte']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceIX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Zamboanga del Sur', 'Zamboanga del Norte', 'Zamboanga Sibugay']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Bukidnon', 'Camiguin', 'Lanao del Norte', 'Misamis Oriental', 'Misamis Occidental']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Davao de Oro', 'Davao del Norte', 'Davao del Sur', 'Davao Oriental', 'Davao Occidental']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Cotabato', 'Sarangani', 'South Cotabato', 'Sultan Kudarat']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Agusan del Norte', 'Agusan del Sur', 'Dinagat Islands', 'Surigao del Norte', 'Surigao del Sur']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceBARMM = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Basilan', 'Lanao del Sur', 'Maguindanao del Norte', 'Sulu', 'Maguindanao del Sur', 'Tawi-Tawi']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();
            //---------END OF PROVINCE----START OF OTHER CHART DAYS

            $queryAllDate = (new Query()) //daily transaction record seperated by division, Y axis for the chart
                ->select(['transaction_date AS labels', 'COUNT(*) AS datasets', 'division AS label'])
                ->from('visualight2data.transaction') //from visualight2data database within transaction table
                ->where(['division' => ['2']])
                ->andWhere(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('labels, division')
                ->orderBy('labels')
                ->all();

            $dailyMapping = [ //to be used on renaming
                "2" => "Standard and Testing Division",
            ];

            foreach ($queryAllDate as &$item) { //to change division 1 & 2 into actual division name
                if (isset($item['label']) && isset($dailyMapping[$item['label']])) {
                    $item['label'] = $dailyMapping[$item['label']];
                }
            }

            $queryTotalSale = (new Query()) //daily sales record seperated by division
                ->select(['transaction_date AS labels', 'SUM(amount) AS datasets', 'division AS label'])
                ->from('visualight2data.transaction') //from visualight2data database within transaction table
                ->where(['division' => ['2']])
                ->andWhere(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('labels, division')
                ->orderBy('labels')
                ->all();

            foreach ($queryTotalSale as &$item) { //to change division 1 & 2 into actual division name
                if (isset($item['label']) && isset($dailyMapping[$item['label']])) {
                    $item['label'] = $dailyMapping[$item['label']];
                }
            }

            $forTransactionStatusChart = (new Query())
                ->select(['transaction_status as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['division' => ['2']])
                ->andWhere(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forPaymendtMethodChart = (new Query())
                ->select(['payment_method as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['division' => ['2']])
                ->andWhere(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forTransactionTypeChart = (new Query())
                ->select(['transaction_type as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['division' => ['2']])
                ->andWhere(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forCustomerTypeChart = (new Query())
                ->select(['t2.customer_type as label', 'COUNT(*) AS data'])
                ->from(['t1' => 'transaction'])

                ->join('JOIN', 'customer t2', 't1.customer_id = t2.id')
                ->where(['division' => ['2']])
                ->andWhere(['between', 't1.transaction_date', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forMyChart = (new Query()) //average income per division
                ->select(['division as label', 'ROUND(AVG(amount)) as data'])
                ->from('transaction')
                ->where(['division' => ['1']])
                ->andWhere(['between', 'transaction_date', $fromDate, $toDate])
                ->groupBy('division')
                ->all();

            $forMyChartAvgTransaction = (new Query())
                ->select(['COUNT(*) AS data'])
                ->from('transaction')
                ->where(['division' => ['2']])
                ->andWhere(['between', 'transaction_date', $fromDate, $toDate])
                ->all();

            $chartLabel = (new Query()) //YYYY-MM-DD will serve as label for the chart, the X axis if you may
                ->select('date AS labels')
                ->from('date_label')
                ->where(['between', 'date', $fromDate, $toDate])
                ->groupBy('date')
                ->orderBy('date')
                ->all();

            Yii::$app->set('db', [ //revert default connection 
                'class' => \yii\db\Connection::class,
                'dsn' => 'mysql:host=localhost;dbname=visualight2user',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ]);

            return json_encode([
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
                //
                'queryAllDate' => $queryAllDate,
                'queryTotalSale' => $queryTotalSale,
                //
                'forTransactionStatusChart' => $forTransactionStatusChart,
                'forPaymendtMethodChart' => $forPaymendtMethodChart,
                'forTransactionTypeChart' => $forTransactionTypeChart,
                'forCustomerTypeChart' => $forCustomerTypeChart,
                'forMyChart' => $forMyChart,
                'forMyChartAvgTransaction' => $forMyChartAvgTransaction,
                //
                'chartLabel' => $chartLabel,
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
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Metro Manila']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Ilocos Norte', 'Ilocos Sur', 'La Union', 'Pangasinan']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Batanes', 'Cagayan', 'La Union', 'Isabela', 'Quirino', 'Nueva Vizcaya']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Aurora', 'Bataan', 'Bulacan', 'Nueba Ecija', 'Pampanga', 'Tarlac', 'Zambales']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRIVA = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Batangas', 'Cavite', 'Laguna', 'Quezon', 'Rizal',]])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceMIMAROPA = (new Query()) //use MIMAROPA as desc please
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Marinduque', 'Occidental Mindoro', 'Oriental Mindoro', 'Palawan', 'Romblon']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceV = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Albay', 'Camarines Sur', 'Camarines Norte', 'Catanduanes', 'Masbate', 'Sorsogon']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceCAR = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Abra', 'Apayao', 'Benguet', 'Ifugao', 'Kalinga', 'Mountain Province']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Aklan', 'Antique', 'Capiz', 'Guimaras', 'Iloilo', 'Negros Occidental']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Bohol', 'Cebu', 'Negros Oriental', 'Siquijor']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Biliran', 'Eastern Samar', 'Leyte', 'Western Samar', 'Samar', 'Southern Leyte']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceIX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Zamboanga del Sur', 'Zamboanga del Norte', 'Zamboanga Sibugay']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Bukidnon', 'Camiguin', 'Lanao del Norte', 'Misamis Oriental', 'Misamis Occidental']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Davao de Oro', 'Davao del Norte', 'Davao del Sur', 'Davao Oriental', 'Davao Occidental']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Cotabato', 'Sarangani', 'South Cotabato', 'Sultan Kudarat']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Agusan del Norte', 'Agusan del Sur', 'Dinagat Islands', 'Surigao del Norte', 'Surigao del Sur']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceBARMM = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Basilan', 'Lanao del Sur', 'Maguindanao del Norte', 'Sulu', 'Maguindanao del Sur', 'Tawi-Tawi']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();
            //---------END OF PROVINCE----START OF OTHER CHART MONTHS

            $queryAllDate = (new Query()) //daily transaction record seperated by division, Y axis for the chart
                ->select(['DATE_FORMAT(transaction_date, "%Y-%m") AS labels', 'COUNT(*) AS datasets', 'division AS label'])
                ->from('visualight2data.transaction') //from visualight2data database within transaction table
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('labels, division')
                ->orderBy('labels')
                ->all();

            $dailyMapping = [ //to be used on renaming
                "2" => "Standard and Testing Division",
            ];

            foreach ($queryAllDate as &$item) { //to change division 1 & 2 into actual division name
                if (isset($item['label']) && isset($dailyMapping[$item['label']])) {
                    $item['label'] = $dailyMapping[$item['label']];
                }
            }

            $queryTotalSale = (new Query()) //daily sales record seperated by division
                ->select(['DATE_FORMAT(transaction_date, "%Y-%m") AS labels', 'SUM(amount) AS datasets', 'division AS label'])
                ->from('visualight2data.transaction') //from visualight2data database within transaction table
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('labels, division')
                ->orderBy('labels')
                ->all();

            foreach ($queryTotalSale as &$item) { //to change division 1 & 2 into actual division name
                if (isset($item['label']) && isset($dailyMapping[$item['label']])) {
                    $item['label'] = $dailyMapping[$item['label']];
                }
            }

            $forTransactionStatusChart = (new Query())
                ->select(['transaction_status as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forPaymendtMethodChart = (new Query())
                ->select(['payment_method as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forTransactionTypeChart = (new Query())
                ->select(['transaction_type as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forCustomerTypeChart = (new Query())
                ->select(['t2.customer_type as label', 'COUNT(*) AS data'])
                ->from(['t1' => 'transaction'])

                ->join('JOIN', 'customer t2', 't1.customer_id = t2.id')
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forMyChart = (new Query()) //average income per division
                ->select(['division as label', 'ROUND(AVG(amount)) as data'])
                ->from('transaction')
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forMyChartAvgTransaction = (new Query())
                ->select(['COUNT(*) AS data'])
                ->from('transaction')
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y-%m")', $fromDate, $toDate])
                ->all();

            $monthLabel = (new Query()) //YYYY-MM will serve as label for the chart, the X axis if you may, move this to actionMonths
                ->select(['DATE_FORMAT(month, "%Y-%m") AS labels'])
                ->from('month_label')
                ->where(['between', 'DATE_FORMAT(month, "%Y-%m")', $fromDate, $toDate])
                ->groupBy('labels')
                ->orderBy('labels')
                ->all();

            Yii::$app->set('db', [ //revert default connection 
                'class' => \yii\db\Connection::class,
                'dsn' => 'mysql:host=localhost;dbname=visualight2user',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ]);

            return json_encode([
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
                //
                'queryAllDate' => $queryAllDate,
                'queryTotalSale' => $queryTotalSale,
                //
                'forTransactionStatusChart' => $forTransactionStatusChart,
                'forPaymendtMethodChart' => $forPaymendtMethodChart,
                'forTransactionTypeChart' => $forTransactionTypeChart,
                'forCustomerTypeChart' => $forCustomerTypeChart,
                'forMyChart' => $forMyChart,
                'forMyChartAvgTransaction' => $forMyChartAvgTransaction,
                //
                'monthLabel' => $monthLabel,
            ]);
        }
    }
    public function actionYear()
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
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Metro Manila']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Ilocos Norte', 'Ilocos Sur', 'La Union', 'Pangasinan']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Batanes', 'Cagayan', 'La Union', 'Isabela', 'Quirino', 'Nueva Vizcaya']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Aurora', 'Bataan', 'Bulacan', 'Nueba Ecija', 'Pampanga', 'Tarlac', 'Zambales']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceRIVA = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Batangas', 'Cavite', 'Laguna', 'Quezon', 'Rizal',]])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceMIMAROPA = (new Query()) //use MIMAROPA as desc please
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Marinduque', 'Occidental Mindoro', 'Oriental Mindoro', 'Palawan', 'Romblon']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceV = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Albay', 'Camarines Sur', 'Camarines Norte', 'Catanduanes', 'Masbate', 'Sorsogon']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceCAR = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Abra', 'Apayao', 'Benguet', 'Ifugao', 'Kalinga', 'Mountain Province']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Aklan', 'Antique', 'Capiz', 'Guimaras', 'Iloilo', 'Negros Occidental']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Bohol', 'Cebu', 'Negros Oriental', 'Siquijor']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceVIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Biliran', 'Eastern Samar', 'Leyte', 'Western Samar', 'Samar', 'Southern Leyte']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceIX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Zamboanga del Sur', 'Zamboanga del Norte', 'Zamboanga Sibugay']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceX = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Bukidnon', 'Camiguin', 'Lanao del Norte', 'Misamis Oriental', 'Misamis Occidental']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXI = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Davao de Oro', 'Davao del Norte', 'Davao del Sur', 'Davao Oriental', 'Davao Occidental']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Cotabato', 'Sarangani', 'South Cotabato', 'Sultan Kudarat']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceXIII = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Agusan del Norte', 'Agusan del Sur', 'Dinagat Islands', 'Surigao del Norte', 'Surigao del Sur']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $custmerPerProvinceBARMM = (new Query())
                ->select(['t2.address as label', 'COUNT(t1.customer_id) as data'])
                ->from(['t2' => 'customer'])
                ->join('JOIN', 'transaction t1', 't2.id = t1.customer_id')
                ->where(['division' => ['2']])
                ->andWhere(['t2.address' => ['Basilan', 'Lanao del Sur', 'Maguindanao del Norte', 'Sulu', 'Maguindanao del Sur', 'Tawi-Tawi']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();
            //---------END OF PROVINCE----START OF OTHER CHART YEARS

            $queryAllDate = (new Query()) //daily transaction record seperated by division, Y axis for the chart
                ->select(['DATE_FORMAT(transaction_date, "%Y") AS labels', 'COUNT(*) AS datasets', 'division AS label'])
                ->from('visualight2data.transaction') //from visualight2data database within transaction table
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('labels, division')
                ->orderBy('labels')
                ->all();

            $dailyMapping = [ //to be used on renaming
                "2" => "Standard and Testing Division",
            ];

            foreach ($queryAllDate as &$item) { //to change division 1 & 2 into actual division name
                if (isset($item['label']) && isset($dailyMapping[$item['label']])) {
                    $item['label'] = $dailyMapping[$item['label']];
                }
            }

            $queryTotalSale = (new Query()) //daily sales record seperated by division
                ->select(['DATE_FORMAT(transaction_date, "%Y") AS labels', 'SUM(amount) AS datasets', 'division AS label'])
                ->from('visualight2data.transaction') //from visualight2data database within transaction table
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('labels, division')
                ->orderBy('labels')
                ->all();

            foreach ($queryTotalSale as &$item) { //to change division 1 & 2 into actual division name
                if (isset($item['label']) && isset($dailyMapping[$item['label']])) {
                    $item['label'] = $dailyMapping[$item['label']];
                }
            }

            $forTransactionStatusChart = (new Query())
                ->select(['transaction_status as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forPaymendtMethodChart = (new Query())
                ->select(['payment_method as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forTransactionTypeChart = (new Query())
                ->select(['transaction_type as label', 'COUNT(*) as data'])
                ->from(['transaction'])
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forCustomerTypeChart = (new Query())
                ->select(['t2.customer_type as label', 'COUNT(*) AS data'])
                ->from(['t1' => 'transaction'])

                ->join('JOIN', 'customer t2', 't1.customer_id = t2.id')
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(t1.transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('label')
                ->all();

            $forMyChart = (new Query()) //average income per division
                ->select(['division as label', 'ROUND(AVG(amount)) as data'])
                ->from('transaction')
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y")', $fromDate, $toDate])
                ->groupBy('division')
                ->all();

            $forMyChartAvgTransaction = (new Query())
                ->select(['COUNT(*) AS data'])
                ->from('transaction')
                ->where(['division' => ['2']])
                ->andWhere(['between', 'DATE_FORMAT(transaction_date, "%Y")', $fromDate, $toDate])
                ->all();

            $yearLabel = (new Query()) //YYYY-MM will serve as label for the chart, the X axis if you may, move this to actionMonths
                ->select(['DATE_FORMAT(month, "%Y") AS labels'])
                ->from('month_label')
                ->where(['between', 'DATE_FORMAT(month, "%Y")', $fromDate, $toDate])
                ->groupBy('labels')
                ->orderBy('labels')
                ->all();

            Yii::$app->set('db', [ //revert default connection 
                'class' => \yii\db\Connection::class,
                'dsn' => 'mysql:host=localhost;dbname=visualight2user',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ]);

            return json_encode([
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
                //
                'queryAllDate' => $queryAllDate,
                'queryTotalSale' => $queryTotalSale,
                //
                'forTransactionStatusChart' => $forTransactionStatusChart,
                'forPaymendtMethodChart' => $forPaymendtMethodChart,
                'forTransactionTypeChart' => $forTransactionTypeChart,
                'forCustomerTypeChart' => $forCustomerTypeChart,
                'forMyChart' => $forMyChart,
                'forMyChartAvgTransaction' => $forMyChartAvgTransaction,
                //
                'yearLabel' => $yearLabel,
            ]);
        }
    }

    public function actionIndex()
    {
        Yii::$app->set('db', [ //reroute default connection 
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=visualight2data',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);

        $monthLabel = (new Query()) //YYYY-MM-DD will serve as label for the chart, the X axis if you may
            ->select(['DATE_FORMAT(month, "%Y-%m") AS month'])
            ->from('month_label')
            ->groupBy('month')
            ->orderBy('month')
            ->all();

        $yearLabel = (new Query()) //YYYY-MM-DD will serve as label for the chart, the X axis if you may
            ->select(['DATE_FORMAT(month, "%Y") AS year'])
            ->from('month_label')
            ->groupBy('year')
            ->orderBy('year')
            ->all();

        Yii::$app->set('db', [ //revert default connection 
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=visualight2user',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ]);

        return $this->render('index', [
            'monthLabel' => $monthLabel,
            'yearLabel' => $yearLabel,
        ]);
    }
}
