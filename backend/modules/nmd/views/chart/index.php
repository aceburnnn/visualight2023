<?php

$this->title = '';
$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js', ['position' => \yii\web\View::POS_HEAD]);
?>

<!DOCTYPE html>
<html>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<meta name="description" content="">

<style>
    @font-face {
        font-family: 'Poppins';
        src: url('<?= Yii::$app->request->baseUrl ?>/fonts/Poppins-Light.ttf') format('truetype'),
            url('<?= Yii::$app->request->baseUrl ?>/fonts/Poppins-Light.woff') format('woff');

    }

    /* Default styles */
    .chart-container {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .aveTransactionDiv,
    .aveSalesDiv {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        text-align: center;
        /* You may adjust the margin as needed */
        margin: 0 2%;
        /* Reduced margin for better centering */
    }

    .custom-text {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        text-align: center;
        top: 80px;
        /* If you want to position it from the top, adjust as needed */
        right: 50px;
        /* If you want to position it from the right, adjust as needed */
        margin: 5% 10%;
        box-sizing: border-box;
        padding: 15px;
        width: 80%;
        /* Increase the width for better centering */
    }


    .aveTransactionDiv,
    .aveSalesDiv {
        background-color: #B526C2;
        color: white;
        width: 400px;
        height: 130px;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin-bottom: 30px;
    }

    .aveTransactionDiv {
        background-color: #11A34C;
        /* Updated background color for .aveTransactionDiv */
    }

    .texty {
        margin: 0;
        font-weight: bold;
        font-size: 16px;
        font-family: Poppins;
    }

    .number {
        margin: 0;
        font-family: Poppins;
        font-size: 45px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    #myChart {
        position: absolute;
        left: 50px;
        top: 45px;
    }

    .asOne {
        justify-content: space-between;
        width: 60%;
        right: 50%;
    }

    @media (max-width: 600px) {
        .custom-text {
            position: absolute;
            top: 25%;
            right: 10%;
            box-sizing: border-box;
            display: inline-block;
        }

        .aveTransactionDiv,
        .aveSalesDiv {
            width: 120px;
            height: 120px;
            border-radius: 20px;
            padding: 15px;
            margin-bottom: 15px;
        }

        #myChart {
            position: absolute;
            left: 50px;
            top: 150px;
            justify-content: space-between;
        }

        .asOne {
            justify-content: space-between;
            width: 60%;
            right: 50%;
        }
    }



    :root {
        font-size: 16px;
    }

    /* Daily transaction css */

    .DailyTransaction {
        width: 100%;
        height: 10.8125rem;
        border-radius: .635rem;
        background: #EFF5FF;
        text-align: center;
        color: #3A3835;
        font-family: Poppins;
        font-size: 1rem;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        letter-spacing: .15rem;
        display: wrap;

    }

    .deptransaction {
        width: 30%;
        height: 7.875rem;
        border-radius: .635rem;
        background: #11A34C;
        color: #FFF;
        font-family: Poppins;
        font-size: 1rem;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: .15rem;
        display: inline-block;
    }

    .deptransaction img {
        margin-left: .625rem;
    }

    .deptransaction:hover {
        transform: scale(1.1);
        cursor: pointer;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: .125rem;
        grid-template-rows: auto auto;

    }

    #dailyTrans, #dailyIncome, #avgTrans {
        font-size: 3.375rem;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: .5rem;
    }

    #valueIncrease {
        font-size: 1.2rem;
        font-weight: 400;
        letter-spacing: .15rem;
        grid-column: 3;
        text-align: right;
        padding-top: 2.5rem;

    }


    /* dropdown and datepicker */

    .date_filter {
        width: 100%;
        height: 5.8125rem;
        display: wrap;
        text-align: center;
    }

    .containers {
        width: 45%;
        height: 7.875rem;
        display: inline-block;
    }

    .dropdown_pdf_container {
        position: relative;
    }

    .date_dropdown {
        position: relative;
        padding-top: 1.1rem;
        padding-bottom: 1.1rem;
        float: left;
        overflow: hidden;
        z-index: 99;
    }

    .date_type_label {
        font-style: Poppins;
        color: #F8B200;
        font-size: 1.3rem;
        letter-spacing: .30rem;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        min-width: 8rem;
        z-index: 1;
        text-align: center;
        border-radius: 0.5rem;
    }

    .date_type {
        border-radius: 0.5rem
    }

    .print_pdf {
        padding-right: 8.7rem;
        padding-top: 1.3rem;
        padding-bottom: 1.1rem;
        right: 1rem;
    }

    .print_pdf_label {
        border-radius: 1rem;
        background-color: #00BDB2;
        font-size: .7rem;
        text-align: center;
        margin: auto;
        padding: 0.2rem;
        padding-left: 1rem;
        padding-right: 1rem;
        color: white;
        width: 7rem;
    }

    .datePicker_label {
        border-radius: 0.5rem;
        width: 8rem;
        text-align: center;
        font-size: 0.9rem;
    }

    .datePicker {
        text-align: right;
    }


    /* graph div */
    .graph {
        width: 100%;
        text-align: center;
        display: wrap;
    }

    #container {
        height: 500px;
        min-width: 310px;
        max-width: 800px;
        margin: 0 auto;
    }

    .loading {
        margin-top: 10em;
        text-align: center;
        color: gray;
    }


    .chart-container {
        margin: .62rem;
        padding: 3em;
        border-radius: .93rem;
        background-color: white;
        display: inline-block;
        height: 30rem;
        width: 100%;

    }

    .graph2 {
        width: 100%;
        text-align: center;
        display: wrap;
        background-color: white;
    }

    .chart-container2 {
        margin: .1rem;
        padding-top: 3rem;
        padding-bottom: 3rem;
        border-radius: .93rem;
        background-color: white;
        display: inline-block;
        height: 28rem;
        width: 49%;
    }

    body.dark-mode .chart-container {
        background-color: black;

    }

    body.dark-mode .chart-container canvas {
        background-color: black;
        color: white;
    }

    .reportTitle {
        color: #0362BA;
        font-family: Poppins;
        font-size: .875rem;
        font-weight: 700;
        letter-spacing: .15rem;

    }

    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }

    .popup-content {
        width: 69%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-40%, -46%);
        background: white;
        color: black;
        padding: 20px;
        border: 1px solid #333;
        box-shadow: 2px 2px 10px #888;
        text-align: center;
    }


    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
    }

    .half-speedometer {
        margin-top: 20px;
        text-align: center;
    }

    .speedometer-dial {
        width: 150px;
        height: 85px;
        top: 10%;
        /* Half the height of the full dial */
        background-color: red;
        border-radius: 75px 75px 0 0;
        /* Round the top corners */
        position: relative;
        margin: 0 auto;
        overflow: hidden;

    }

    .speedometer-reading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 18px;
        font-weight: bold;
    }

    .speedometer-arrow {
        position: absolute;
        width: 2px;
        height: 30px;
        background-color: black;
        top: 45%;
        left: 50%;
        transform-origin: 50% 0;
        transform: translateX(-50%) rotate(0deg);
        transition: transform 1s ease;
    }

    /* background */
    .speedometer {
        background-color: #E2EBEC;
        position: absolute;
        right: 40%;
        top: 55%;
        transform: translate(-50%, -50%);
        width: 400px;
        height: 200px;
        justify-content: left;
        align-items: left;
        font-size: 1.5rem;
        font-weight: bold;
        border-radius: 1rem;
    }

    #toggleButton{
            background-color: #0073D8;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 1000px;
            margin-bottom:10px;
            font-weight: bold;
            position:static;
            font-size: 20px;
            display:none;

        }

        #toggleButton:hover {
            background-color: #6BBAFF;
        }





    /* responsiveness */

    /* daily transaction div */
    @media (max-width: 900px) {
        .deptransaction {
            width: 80%;
            display: justify;
            /* Change to block to stack vertically */
            margin: 0 auto 1rem;

        }

        .DailyTransaction {
            height: auto;
        }

        .header {
            font-size: 1rem;
        }
    }

    /* graph responsiveness */
    @media (max-width: 900px) {
        .chart-container {
            flex-basis: 100%;
            max-width: 100%;
            width: 95%;
            height: 25rem;
            display: block;
        }

        .chart-container2 {
            flex-basis: 100%;
            max-width: 100%;
            width: 95%;
            height: 25rem;
            display: block;
        }
    }

    /* dropdown and date picker responsiveness */
    /* tablet ui */
    @media (min-width: 720),
    (max-width:1500px) {

        .date_filter {
            height: 2.8125rem;
        }

        .containers {
            height: 2.875rem;
        }

        .date_dropdown {
            padding-right: 1rem;
            padding-top: .5rem;
            padding-bottom: .5rem;
        }

        .date_type_label {
            font-size: .8rem;
            letter-spacing: 0.01rem;
        }

        .dropdown-content {
            z-index: 1;
            text-align: center;
            border-radius: 0.5rem;
            width: 0.02rem;
            height: 1.5rem;
            font-size: .8rem;
        }

        .date_type {
            border-radius: 1px;
        }

        .print_pdf {
            padding-right: 0rem;
            padding-top: .5rem;
            padding-bottom: .2rem;
        }

        .print_pdf_label {
            border-radius: 1rem;
            padding-left: 0rem;
            padding-right: 0rem;
            width: 9rem;
        }

        .datePicker_label {
            border-radius: 0.3rem;
            width: 6rem;
            font-size: .6rem;
        }

    }

    /* phone ui */
    @media (max-width: 719px) {
        .date_filter {
            height: 7.8125rem;

        }

        .containers {
            height: 4.875rem;
            width: 100%;
            display: inline-block;
        }


        .date_dropdown {
            /* padding-right: 3rem; */
            padding-top: .5rem;
            padding-bottom: .5rem;
        }

        .date_type_label {
            font-size: .8rem;
            letter-spacing: 0.01rem;
        }

        .dropdown-content {
            width: 0.02rem;
            height: 1.5rem;
            font-size: .8rem;
        }

        .date_type {
            border-radius: 1px;
        }

        .print_pdf {
            /* padding-right: 0rem; */
            padding-top: .5rem;
            padding-bottom: .2rem;
        }

        .print_pdf_label {
            padding-left: 0rem;
            padding-right: 0rem;
            width: 6rem;
        }

        .datePicker {
            font-size: .8rem;
            text-align: left;

        }

        .datePicker_label {
            border-radius: 0.3rem;
            width: 6rem;
            height: 1rem;
            text-align: center;
            font-size: .6rem;
        }
    }
</style>


<?php

use yii\db\Query;
use yii\bootstrap5\Html;
// Fetch sales data from the database
// $fromDate = $_POST['startDate'];
// $toDate = $_POST['endDate'];

Yii::$app->set('db', [ //reroute default connection 
    'class' => \yii\db\Connection::class,
    'dsn' => 'mysql:host=localhost;dbname=visualight2data',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
]);

$query = new Query();

$salesData = $query->select(['division', 'transaction_date', 'SUM(amount) as total_amount'])
    ->from('transaction')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    // ->where(['between', 'transaction_date', '2023-06-10', '2023-06-14'])
    ->where([
        'division' => '1',
        'transaction_status' => ['1'] //videlle bakit mo sinasama pending sa sales? Di pa nga bayad yon eh
    ])
    ->groupBy(['division', 'transaction_date'])
    ->orderBy(['transaction_date' => SORT_DESC])
    ->all();
// Prepare $SalesperDiv array (null pa to)
$SalesperDiv = [
    'labels' => [],
    'datasets' => [],
];

$divMapping = [
    "1" => "National Metrology Division",
];

foreach ($salesData as &$item) { //this renames division into actual division name
    if (isset($item['division']) && isset($divMapping[$item['division']])) {
        $item['division'] = $divMapping[$item['division']];
    }
}

//dito kukuha ng data for $SalesperDiv
foreach ($salesData as $data) {
    $divisionName = $data['division'];
    $transactionDate = $data['transaction_date'];
    $totalAmount = (float) $data['total_amount'];

    // Add unique dates to the labels array
    if (!in_array($transactionDate, $SalesperDiv['labels'])) {
        $SalesperDiv['labels'][] = $transactionDate;
    }

    // Find the index of the division in the datasets array
    $divisionIndex = array_search($divisionName, array_column($SalesperDiv['datasets'], 'label'));

    if ($divisionIndex === false) {
        // Add a new dataset for the division if not already present
        $SalesperDiv['datasets'][] = [
            'label' => $divisionName,
            'data' => [$totalAmount],
        ];
    } else {
        // If the dataset already exists, add the amount to the existing data
        $SalesperDiv['datasets'][$divisionIndex]['data'][] = $totalAmount;
    }
}

$query = new Query();
// Fetch transaction data from the database 
$transactionData = $query->select(['division', 'transaction_date', 'COUNT(*) as transaction_count'])
    ->from('transaction')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->where([
        'division' => '1'
    ])
    ->groupBy(['division', 'transaction_date'])
    ->orderBy(['transaction_date' => SORT_DESC])
    ->all();

foreach ($transactionData as &$item) { //this renames division into actual division name
    if (isset($item['division']) && isset($divMapping[$item['division']])) {
        $item['division'] = $divMapping[$item['division']];
    }
}

// Prepare $TransactionperDiv array (null pa// otw yung data HAHA)
$TransactionperDiv = [
    'labels' => [],
    'datasets' => [],
];

//getting data for the $TransactionperDiv
foreach ($transactionData as $data) {
    $divisionName = $data['division'];
    $transactionDate = $data['transaction_date'];
    $transactionCount = (int) $data['transaction_count'];

    // Add unique dates to the labels array
    if (!in_array($transactionDate, $TransactionperDiv['labels'])) {
        $TransactionperDiv['labels'][] = $transactionDate;
    }

    // Find the index of the division in the datasets array
    $divisionIndex = array_search($divisionName, array_column($TransactionperDiv['datasets'], 'label'));

    if ($divisionIndex === false) {
        // Add a new dataset for the division if not already present
        $TransactionperDiv['datasets'][] = [
            'label' => $divisionName,
            'data' => [$transactionCount],
        ];
    } else {
        // If the dataset already exists, add the transaction count to the existing data
        $TransactionperDiv['datasets'][$divisionIndex]['data'][] = $transactionCount;
    }
}


$query = new Query();
$addressData = $query->select(['c.address as address', 'COUNT(*) as customer_count']) //joined table of transaction and customer, 
    ->from('transaction bs')                                              //since both have id in their columns, aliases are used (bs and c)
    ->innerJoin('customer c', 'bs.customer_id = c.id')
    ->where(['bs.division' => ['1']])
    ->groupBy('c.address')
    ->orderBy('bs.transaction_date')
    ->all();

// // Prepare data for the chart
// $province = [];
// $customersCounts = [];
$provinces = [
    'labels' => [],
    'datasets' => [],
];

foreach ($addressData as $customeraddress) {
    $province[] = $customeraddress['address'];
    $customersCounts[] = $customeraddress['customer_count'];

    if (!in_array($province, $provinces['labels'])) {
        $provinces['labels'][] = $province;
    }
    $provinceIndex = array_search($province, array_column($provinces['datasets'], 'label'));
    if ($provinceIndex === false) {
        // Add a new dataset for the division if not already present
        $provinces['datasets'][] = [
            'label' => $province,
            'data' => [$customersCounts],
        ];
    } else {
        // If the dataset already exists, add the transaction count to the existing data
        $provinces['datasets'][$provinceIndex]['data'][] = $customersCounts;
    }
}

$query = new Query();
$addressDatatransaction = $query->select(['customer.address', 'COUNT(*) as transaction_count'])
    ->from('transaction')
    ->join('INNER JOIN', 'customer', 'transaction.customer_id = customer.id')
    ->where(['transaction.division' => ['2']])
    // Add your additional conditions if needed
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->groupBy(['customer.address'])
    ->orderBy(['transaction_count' => SORT_DESC])
    ->all();

$provincestransaction = [
    'labels' => [],
    'datasets' => [],
];

foreach ($addressDatatransaction as $customeraddress) {
    $province = $customeraddress['address'];
    $transactioncount = $customeraddress['transaction_count'];

    // Check if the province is not already in labels
    if (!in_array($province, $provincestransaction['labels'])) {
        $provincestransaction['labels'][] = $province;
    }

    // Add the customer count directly to the datasets array
    $provincestransaction['datasets'][] = $transactioncount;
}

foreach ($addressDatatransaction as $customeraddress) {
    $province = $customeraddress['address'];
    $transactioncount = $customeraddress['transaction_count'];

    // Check if the province is not already in labels
    if (!in_array($province, $provincestransaction['labels'])) {
        $provincestransaction['labels'][] = $province;
    }

    // Add the customer count directly to the datasets array
    $provincestransaction['datasets'][] = $transactioncount;
}

$addressDataincome = (new \yii\db\Query())
    ->select(['customer.address', 'SUM(amount) as total_amount'])
    ->from('transaction')
    ->join('INNER JOIN', 'customer', 'transaction.customer_id = customer.id')
    ->where(['transaction.division' => ['2']])
    // Add your additional conditions if needed
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->groupBy(['customer.address'])
    ->orderBy(['total_amount' => SORT_DESC])
    ->all();

$provincesincome = [
    'labels' => [],
    'datasets' => [],
];

foreach ($addressDataincome as $customeraddress) {
    $province = $customeraddress['address'];
    $transactioncount = $customeraddress['total_amount'];

    // Check if the province is not already in labels
    if (!in_array($province, $provincesincome['labels'])) {
        $provincesincome['labels'][] = $province;
    }

    // Add the customer count directly to the datasets array
    $provincesincome['datasets'][] = $transactioncount;
}

$query = new Query();
$customerTypeData = $query->select([
    'c.customer_type',
    'customer_count' => new \yii\db\Expression('COUNT(*)')
])
    ->from('transaction bs')
    ->innerJoin(['customer c'], 'bs.customer_id = c.id')
    ->where([
        'bs.division' => 1
    ])
    ->groupBy('c.customer_type')
    ->orderBy('bs.transaction_date')
    ->all();

$customerType_name = [
    "1" => "Student",
    "2" => "Individual",
    "3" => "Private",
    "4" => "Government",
    "5" => "Internal",
    "6" => "Academe",
    "7" => "Not Applicable",
];

$customerType = ['no customer'];
$customerscounts = [0];

foreach ($customerTypeData as $customersType) {
    if (isset($customersType['customer_type']) && isset($customerType_name[$customersType['customer_type']])) {
        $customersType['customer_type'] = $customerType_name[$customersType['customer_type']];
    }
    $customerType[] = $customersType['customer_type'];
    $customerscounts[] = $customersType['customer_count'];
}

// customer type from table transaction
$customerTypeDatatransaction = (new \yii\db\Query())
    ->select(['customer.customer_type', 'COUNT(*) as transaction_count'])
    ->from('transaction')
    ->join('INNER JOIN', 'customer', 'transaction.customer_id = customer.id')
    ->where([
        'transaction.division' => 1
    ])
    // Add your additional conditions if needed
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->groupBy(['customer.customer_type'])
    ->orderBy(['transaction_count' => SORT_DESC])
    ->all();
$customerTypetransaction = [];
$customerTypecounttransaction = [];

foreach ($customerTypeDatatransaction as $type) {
    if (isset($type['customer_type']) && isset($customerType_name[$type['customer_type']])) {
        $type['customer_type'] = $customerType_name[$type['customer_type']];
    }

    $customerTypetransaction[] = $type['customer_type'];
    $customerTypecounttransaction[] = $type['transaction_count'];
}


$customerTypeDataincome = (new \yii\db\Query())
    ->select(['customer.customer_type', 'SUM(amount) as total_amount'])
    ->from('transaction')
    ->join('INNER JOIN', 'customer', 'transaction.customer_id = customer.id')
    ->where([
        'transaction.division' => 1
    ])
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->groupBy(['customer.customer_type'])
    ->orderBy(['total_amount' => SORT_DESC])
    ->all();
$customerTypeincome = [];
$customerTypecountincome = [];

foreach ($customerTypeDataincome as $type) {
    if (isset($type['customer_type']) && isset($customerType_name[$type['customer_type']])) {
        $type['customer_type'] = $customerType_name[$type['customer_type']];
    }

    $customerTypeincome[] = $type['customer_type'];
    $customerTypecountincome[] = $type['total_amount'];
}

$query = new Query();
$transactionTypeData = $query->select(['transaction_type', 'COUNT(*) as customer_count'])
    ->from('transaction')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->where([
        'division' => '1',
        //'transaction_status' => ['1']
    ])
    ->groupBy(['transaction_type'])
    ->orderBy(['customer_count' => SORT_DESC])
    ->all();

$transactionType = [];
$transactionTypecounts = [];

$transactionType_name = [
    "1" => "Technical Services",
    "2" => "NLIMS",
    "3" => "ULIMS",
];

foreach ($transactionTypeData as $type) {
    if (isset($type['transaction_type']) && isset($transactionType_name[$type['transaction_type']])) {
        $type['transaction_type'] = $transactionType_name[$type['transaction_type']];
    }

    $transactionType[] = $type['transaction_type'];
    $transactionTypecounts[] = $type['customer_count'];
}

$transactionTypeincomeData = $query->select(['transaction_type', 'SUM(amount) as total_amount'])
    ->from('transaction')
    ->where([
        'division' => '1',
        //'transaction_status' => ['1']
    ])
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->groupBy(['transaction_type'])
    ->orderBy(['total_amount' => SORT_DESC])
    ->limit(100000)
    ->all();
$transactionTypeincome = [];
$transactionTypesumincome = [];

foreach ($transactionTypeincomeData as $type) {
    if (isset($type['transaction_type']) && isset($transactionType_name[$type['transaction_type']])) {
        $type['transaction_type'] = $transactionType_name[$type['transaction_type']];
    }

    $transactionTypeincome[] = $type['transaction_type'];
    $transactionTypesumincome[] = $type['total_amount'];
}

//transaction used per customer type
$customerTypeDatapertransaction = (new \yii\db\Query())
    ->select([
        'ct.type as customer_type',
        'tt.type as transaction_type',
        'COUNT(*) as transaction_count',
        'SUM(t.amount) as total_amount',
        'ts.status as transaction_status',
        't.transaction_date',
        'pm.method as payment_method',
    ])
    ->from('transaction t')
    ->where(['t.division' => '1',])
    ->join('INNER JOIN', 'customer c', 't.customer_id = c.id')
    ->join('INNER JOIN', 'customer_type ct', 'c.customer_type = ct.id')
    ->join('INNER JOIN', 'transaction_type tt', 't.transaction_type = tt.id')
    ->join('INNER JOIN', 'transaction_status ts', 't.transaction_status = ts.id')
    ->join('INNER JOIN', 'payment_method pm', 't.payment_method = pm.id')
    ->groupBy(['ct.type', 'tt.type', 'ts.status', 't.transaction_date', 'pm.method'])
    ->orderBy(['transaction_count' => SORT_DESC])
    ->all();

$ctpt = [];
$ctct = [0];
$ctamt = [0];
$ctstatus = [''];
$cttd = [''];
$ctpm = [''];

foreach ($customerTypeDatapertransaction as $type) {
    $ctpt[] = $type['customer_type'];
    $ctct[] = $type['transaction_count'];
    $ctamt[] = $type['total_amount'];
    $ctstatus[] = $type['transaction_status'];
    $cttd[] = $type['transaction_date'];
    $ctpm[] = $type['payment_method']; // Store the payment_method value
}

$TransactionYear = (new \yii\db\Query())
    ->select(['YEAR(t.transaction_date) as year'])
    ->distinct()
    ->from('transaction t')
    ->orderBy(['year' => SORT_ASC])
    ->all();

$distinctYears = array_column($TransactionYear, 'year');

$query = new Query();
$transactionStatusData = $query->select(['transaction_status', 'COUNT(*) as customer_count'])
    ->from('transaction')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->where([
        'division' => '1',
    ])
    ->groupBy(['transaction_status'])
    ->orderBy(['customer_count' => SORT_DESC])
    ->all();

$transactionStatus = [];
$transactionStatusDatacounts = [];

$transactionStatus_name = [
    "1" => "Paid",
    "2" => "Cancelled",
    "3" => "Pending",
];


foreach ($transactionStatusData as $status) {
    if (isset($status['transaction_status']) && isset($transactionStatus_name[$status['transaction_status']])) {
        $status['transaction_status'] = $transactionStatus_name[$status['transaction_status']];
    }
    $transactionStatus[] = $status['transaction_status'];
    $transactionStatusDatacounts[] = $status['customer_count'];
}

$query = new Query();
$PaymentMethodData = $query->select(['payment_method', 'COUNT(*) as customer_count'])
    ->from('transaction')
    ->where(['payment_method' => ['1', '2', '3']])
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->where([
        'division' => '1',
        'transaction_status' => '1'
    ])
    ->groupBy(['payment_method'])
    ->orderBy(['customer_count' => SORT_DESC])
    ->all();

$PaymentMethod = [];
$PaymentMethodcounts = [];

$paymentmethod_name = [
    "1" => "Over the Counter",
    "2" => "Online Payment",
    "3" => "Cheque",
];

foreach ($PaymentMethodData as $method) {
    if (isset($method['payment_method']) && isset($paymentmethod_name[$method['payment_method']])) {
        $method['payment_method'] = $paymentmethod_name[$method['payment_method']];
    }
    $PaymentMethod[] = $method['payment_method'];
    $PaymentMethodcounts[] = $method['customer_count'];
}

$transactionPerday = (new Query())
    ->select('transaction_date, COUNT(*) as transaction_count')
    ->from('transaction')
    ->where([
        'division' => '1',
        'transaction_status' => '1'
    ])
    ->groupBy('transaction_date');

$transactionPerday = $transactionPerday->all(); // Get the results with daily transaction counts
$totalDays = count($transactionPerday); // Total number of days
$totalTransactions = 0;

foreach ($transactionPerday as $result) {
    $totalTransactions += $result['transaction_count'];
}
$average = round($totalTransactions / $totalDays); // Calculate the average

$SalesAve = (new Query())
    ->select('transaction_date, SUM(amount) as transaction_count')
    ->from('transaction')
    ->where([
        'division' => '1',
        'transaction_status' => '1'
    ])
    ->groupBy('transaction_date');

$SalesAve = $SalesAve->all(); // Get the results with daily transaction counts
$totalDays = count($SalesAve); // Total number of days
$totalTransactions = 0;

foreach ($SalesAve as $result) {
    $totalTransactions += $result['transaction_count'];
}
$saleaverage = round($totalTransactions / $totalDays); // Calculate the average
if ($saleaverage >= 1000 && $saleaverage <= 999999) {
    $saleaverage = round(($saleaverage / 1000), 2) . 'K';
} else if ($saleaverage >= 1000000 && $saleaverage <= 999999999) {
    $saleaverage = round(($saleaverage / 1000000), 2) . 'M';
} else if ($saleaverage >= 1000000000) {
    $saleaverage = round(($saleaverage / 1000000000), 2) . 'B';
}

//setting default colors for each department
$divisionColors = [
    'National Metrology Division' => [
        'backgroundColor' => '#06d6a0',
        'borderWidth' => 2,
    ],
];

//dito yung pag lalagay nung naka set na color
foreach ($SalesperDiv['datasets'] as &$dataset) {
    $divisionName = $dataset['label'];
    $dataset['backgroundColor'] = isset($divisionColors[$divisionName]['#bf60e2']) ? $divisionColors[$divisionName]['backgroundColor'] : '#bf60e2'; // Default background color if division not found
    $dataset['borderColor'] = isset($divisionColors[$divisionName]['borderColor']) ? $divisionColors[$divisionName]['borderColor'] : '#bf60e2'; // Default border color if division not found
    // $dataset['borderWidth'] = isset($divisionColors[$divisionName]['borderWidth']) ? $divisionColors[$divisionName]['borderWidth'] : '#0362BA';
}

foreach ($TransactionperDiv['datasets'] as &$dataset) {
    $divisionName = $dataset['label'];
    $dataset['backgroundColor'] = isset($divisionColors[$divisionName]['#06d6a0']) ? $divisionColors[$divisionName]['backgroundColor'] : '#06d6a0'; // Default background color if division not found
    $dataset['borderColor'] = isset($divisionColors[$divisionName]['borderColor']) ? $divisionColors[$divisionName]['borderColor'] : '#0362BA'; // Default border color if division not found
    // $dataset['borderWidth'] = isset($divisionColors[$divisionName]['borderWidth']) ? $divisionColors[$divisionName]['borderWidth'] : '#0362BA';
}


//Dito yung para sa Total ng Daily Transaction (tinatype ko pa yung date kasi di ako marunong nung rekta connected sa calendar HAHAHAH)
date_default_timezone_set('Asia/Manila');

//Total Transaction everyday changes depending on date
$todaymettrans = (new Query())
    ->select('COUNT(*)')
    ->from('transaction')
    ->where([
        'division' => '1',
        'transaction_date' => date('Y-m-d') // Assuming you want the number of transactions for today
    ])
    ->scalar();

$lastmettrans = (new Query())
    ->select('COUNT(*)')
    ->from('transaction')
    ->where([
        'division' => '1',
        'transaction_date' => date('Y-m-d', strtotime('-1 day'))
    ])
    ->scalar();

if ($todaymettrans == 0) {
    $metdailytransincrease = 0;
} else {
    //dito magcocompute ng percentage ng increase or decrease ng number of past transaction at today's transaction (tinatype ko pa din yung sa last transaction kunwari kasi di pa ko marunong)
    $metdailytransincrease = (($todaymettrans - $lastmettrans) / $todaymettrans) * 100;
    $metdailytransincrease = number_format($metdailytransincrease);
    if ($metdailytransincrease > 1) {
        $metdailytransincrease = '+' . $metdailytransincrease . '%';
    } else {
        $metdailytransincrease = $metdailytransincrease . '%';
    }
}



//Here should be the sum of total sales everyday
$SalesToday = (new Query())
    ->select(['SUM(amount)'])
    ->from('transaction')
    ->where([
        'division' => '1',
        'transaction_date' => date('Y-m-d') // Using the current date in 'Y-m-d' format
    ])
    ->scalar();

$SalesYesterday = (new Query())
    ->select(['SUM(amount)'])
    ->from('transaction')
    ->where([
        'division' => '1',
        'transaction_date' => date('Y-m-d', strtotime('-1 day'))
    ])
    ->scalar();

if ($SalesToday == 0) {
    $SalesToday = 0;
    $SalesIncreasePercent = 0;
} else {

    $SalesIncreasePercent = (($SalesToday - $SalesYesterday) / $SalesToday) * 100;
    $SalesIncreasePercent = number_format($SalesIncreasePercent);
    if ($SalesIncreasePercent > 1) {
        $SalesIncreasePercent = '+' . $SalesIncreasePercent . '%';
    } else {
        $SalesIncreasePercent = $SalesIncreasePercent . '%';
    }

    if ($SalesToday >= 1000 && $SalesToday <= 999999) {
        $SalesToday = round(($SalesToday / 1000), 2) . 'K';
    } else if ($SalesToday >= 1000000 && $SalesToday <= 999999999) {
        $SalesToday = round(($SalesToday / 1000000), 2) . 'M';
    } else if ($SalesToday >= 1000000000) {
        $SalesToday =  round(($SalesToday / 1000000000), 2) . 'B';
    }
}


//Here is the average transaction daily
$transactionPerday = (new Query())
    ->select('transaction_date, COUNT(*) as transaction_count')
    ->from('transaction')
    ->where([
        'division' => '1',
    ])
    ->groupBy('transaction_date');

$transactionPerday = $transactionPerday->all(); // Get the results with daily transaction counts
$totalDays = count($transactionPerday); // Total number of days
$totalTransactions = 0;

foreach ($transactionPerday as $result) {
    $totalTransactions += $result['transaction_count'];
}

try {
    $average = round($totalTransactions / $totalDays); // Calculate the average
} catch (DivisionByZeroError $e) {
    $average = 0;
}

Yii::$app->set('db', [ //revert default connection 
    'class' => \yii\db\Connection::class,
    'dsn' => 'mysql:host=localhost;dbname=visualight2user',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
]);

$currentDate = new \DateTime();

$targetTransactiondata = Yii::$app->db->createCommand('
    SELECT quarter_1, quarter_2, quarter_3, quarter_4
    FROM nmdtarget_transaction
    WHERE date = :year', [':year' => $currentDate->format('Y')])->queryOne();

$targetTransaction = [
    (float)($targetTransactiondata['quarter_1'] ?? 0),
    (float)($targetTransactiondata['quarter_2'] ?? 0),
    (float)($targetTransactiondata['quarter_3'] ?? 0),
    (float)($targetTransactiondata['quarter_4'] ?? 0),
];

$targetIncomedata = Yii::$app->db->createCommand('
    SELECT quarter_1, quarter_2, quarter_3, quarter_4
    FROM nmdtarget_income
    WHERE date = :year', [':year' => $currentDate->format('Y')])->queryOne();

$targetIncome =
    [
        (float)($targetIncomedata['quarter_1'] ?? 0),
        (float)($targetIncomedata['quarter_2'] ?? 0),
        (float)($targetIncomedata['quarter_3'] ?? 0),
        (float)($targetIncomedata['quarter_4'] ?? 0),
    ];

?>

<div class="DailyTransaction">
    <br>

    <div class="deptransaction">
        <p>Total Transactions Daily</p>
        <div class="grid">
            <img src="/images/Total Sales.png" alt="icon1">
            <p id="dailyTrans"><?= $todaymettrans ?></p>
            <p id="valueIncrease"><?= $metdailytransincrease ?></p>
        </div>
    </div>
    <div class="deptransaction">
        <p>Total Income Daily</p>
        <div class="grid">
            <img src="/images/Sales Performance.png" alt="icon2">
            <p id="dailyIncome"><?= $SalesToday ?></p>
            <p id="valueIncrease"><?= $SalesIncreasePercent ?></p>
        </div>
    </div>
    <div class="deptransaction">
        <p>Average Transaction Daily</p>
        <div class="grid">
            <img src="/images/Calculator.png" alt="icon3">
            <p id="avgTrans"><?= $average ?></p>
        </div>
    </div>

</div>

<div id="sending-email-message" class="alert alert-info hidden" style="display:none;">
    PDF file is downloading, please wait...
</div>

<button id="toggleButton">—</button>


<!-- Date Filter Div -->
<div class="date_filter" id = "prediction-form">

    <div class="containers">
        <div class="dropdown_pdf_container">
            <div class="date_dropdown">
                <form>
                    <label for="date_type" class="date_type_label">
                        <strong>Date Filter:</strong></label>
                    <select name="date_type" id="date_type" class="dropdown-content" onchange="dateChange()">
                        <option value="Days">Days</option>
                        <option value="Months">Months</option>
                        <option value="Years">Years</option>
                    </select>
                </form>
            </div>

            <div class="print_pdf">
                <Button class="print_pdf_label" onclick="downloadPDF()"> Chart Download</Button>
            </div>
        </div>
    </div>
    <div class="containers">
        <!-- <form method="post" action="process_data.php"> Replace with your processing script -->
        <div class="datePicker">
            <label>From: </label>
            <input type="date" id="startDate" name="startDate" class="datePicker_label" onchange="dateFilter(); updateChartContent()">
            <!-- </div>
    <div class="datePicker"> -->
            <label>&nbsp;&nbsp;&nbsp;&nbsp;To:</label>
            <input type="date" id="endDate" name="endDate" class="datePicker_label" onchange="dateFilter(); updateChartContent()">
        </div>
        <!-- <input type="submit" value="Filter"> -->
        <!-- </form> -->
    </div>
</div>

<script>
    window.onscroll = function() { scrollFunction(); };
    
    function scrollFunction() {
        var form = document.getElementById("prediction-form");
        var toggleButton = document.getElementById("toggleButton");

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            form.style.position = "fixed";
            form.style.top = "20px"; // Add "px" for the top value
            form.style.width = "68%";
            form.style.height = "17%";
            form.style.zIndex = "1000";
            form.style.background = "white";
            form.style.boxShadow= "-4px 4px 8px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.15)";
            form.style.left = "20%";

            toggleButton.style.display = "block";
            toggleButton.style.position = "fixed";
            toggleButton.style.top = "10px"; // Add "px" for the top value
            toggleButton.style.right = "170px"; // Adjust this value based on your design
            toggleButton.style.zIndex = "1500";
            

            if (toggleButton.innerHTML == "+") {
                toggleButton.innerHTML = "+";
            }

        } else {
            form.style.position = "static";
            form.style.top = "20px"; // Add "px" for the top value
            form.style.width = "100%";
            form.style.marginBottom = "-30%";
            form.style.background = "none";
            form.style.boxShadow= "none";
            toggleButton.style.display = "none";

            if (toggleButton.innerHTML == "+") {
                toggleButton.innerHTML = "+";
            }
            
        }
    }

    var form = document.getElementById("prediction-form");
    var toggleButton = document.getElementById("toggleButton");

    toggleButton.addEventListener("click", function() {
        form.style.display = (form.style.display === "none") ? "block" : "none";
        toggleButton.innerHTML = (form.style.display === "none") ? "+" : "—";

    });
</script>

<script>
    // Attach an event listener to the date picker fields
    document.getElementById("startDate").addEventListener("change", updateFilteredData);
    document.getElementById("endDate").addEventListener("change", updateFilteredData);

    function updateFilteredData() {
        const startDate = document.getElementById("startDate").value;
        const endDate = document.getElementById("endDate").value;

        // Convert the date format to match the database format (YYYY-MM-DD)
        const formattedStartDate = new Date(startDate).toISOString().split('T')[0];
        const formattedEndDate = new Date(endDate).toISOString().split('T')[0];

        // Update the data using AJAX or fetch
        // ...
    }
</script>


<!-- graph Div, holder of graphs -->
<div class="graph">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.9.179/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/brain.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <div class="chart-container">
        <p class="reportTitle" id="transaction">Total Transaction Report</p>
        <!-- <div class="containerBody"> -->
        <canvas id="transactionChart"></canvas>
        <!-- </div> -->
    </div>


    <div class="chart-container">
        <p class="reportTitle" id="sales"> Total Income Report</p>
        <canvas id="salesChart"></canvas>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="close-popup">&times;</span>

            <h2 id="PopupHeader"></h2>

            <div class="speedometer">
                <p><span style="color: #C70039 ">Low </span>
                    <span style="color: #FF5733 ">Moderate </span>
                    <span style="color: #FFC300 ">High </span>
                    <span style="color: #6ABF70">Satisfaction </span>
                </p>
                <div class="speedometer-dial">
                    <div class="speedometer-reading" id="speedometer-reading"></div>
                    <div class="speedometer-arrow" id="speedometer-arrow"></div>
                </div>
            </div>
            <p id="percentTransaction" style="position: absolute; bottom: 90px; width: 100%; right: 290px;"></p>

            <p id="targetTransaction"></p>


            <div style="text-align: right; margin: 0 auto; width: 80%;">
                <ul style="padding-left: 500px;">
                    <li>
                        <p id="highest"></p>
                    </li>
                    <li>
                        <p id="least"></p>
                    </li>
                    <li>
                        <p id="mostTransactionType"></p>
                    </li>
                    <li>
                        <p id="leastTransactionType"></p>
                    </li>
                    <li>
                        <p id="mostCustomerType"></p>
                    </li>
                    <li>
                        <p id="leastCustomerType"></p>
                    </li>
                    <li>
                        <p id="mostCustomerProvince"></p>
                    </li>
                    <li>
                        <p id="leastCustomerProvince"></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Reference datas
        const transaction = <?php echo json_encode($TransactionperDiv); ?>;
        const income = <?php echo json_encode($SalesperDiv); ?>;
        const targetValues = <?php echo json_encode($targetTransaction); ?>;
        const targetincomeValues = <?php echo json_encode($targetIncome); ?>;
        const province = <?php echo json_encode($provincestransaction); ?>;
        const provinceincome = <?php echo json_encode($provincesincome); ?>;

        const currentDate = new Date();
        const currentMonth = currentDate.getMonth();
        const currentYear = currentDate.getFullYear();

        const totaltransactionChart = document.getElementById("transaction");
        const totalsalesChart = document.getElementById("sales");
        const popup = document.getElementById("popup");
        const closePopup = document.getElementById("close-popup");
        const targetTransaction = document.getElementById("targetTransaction");
        const percentTransaction = document.getElementById("percentTransaction");
        const PopupHeader = document.getElementById("PopupHeader");
        const speedometerReading = document.getElementById("speedometer-reading");
        const speedometerArrow = document.getElementById("speedometer-arrow");
        const highest = document.getElementById("highest");
        const least = document.getElementById("least");
        const mostTransactionType = document.getElementById("mostTransactionType");
        const leastTransactionType = document.getElementById("leastTransactionType");
        const mostCustomerType = document.getElementById("mostCustomerType");
        const leastCustomerType = document.getElementById("leastCustomerType");
        const mostCustomerProvince = document.getElementById("mostCustomerProvince");
        const leastCustomerProvince = document.getElementById("leastCustomerProvince");


        //totaltransaction popup
        totaltransactionChart.addEventListener("click", () => {

            // Initialize empty arrays for each quarter
            const quarter1 = [];
            const quarter2 = [];
            const quarter3 = [];
            const quarter4 = [];

            // Iterate through the transaction data
            transaction.labels.forEach((label, index) => {
                const date = new Date(label);
                const year = date.getFullYear();
                const quarter = Math.floor((date.getMonth() + 3) / 3);

                // Check if the transaction is from the current year
                if (year === currentYear) {
                    // Categorize transactions into quarters
                    switch (quarter) {
                        case 1:
                            quarter1.push(transaction.datasets[0].data[index]);
                            break;
                        case 2:
                            quarter2.push(transaction.datasets[0].data[index]);
                            break;
                        case 3:
                            quarter3.push(transaction.datasets[0].data[index]);
                            break;
                        case 4:
                            quarter4.push(transaction.datasets[0].data[index]);
                            break;
                    }
                }
            });
            // Calculate the sum of transactions for each quarter
            const sumQuarter1 = quarter1.reduce((acc, value) => acc + value, 0);
            const sumQuarter2 = quarter2.reduce((acc, value) => acc + value, 0);
            const sumQuarter3 = quarter3.reduce((acc, value) => acc + value, 0);
            const sumQuarter4 = quarter4.reduce((acc, value) => acc + value, 0);

            // Get the appropriate target value based on the current month
            const targetValue = getTargetValue(currentMonth);

            // Function to determine the target value based on the current month
            function getTargetValue(month) {
                if (month >= 0 && month < 3) {
                    return targetValues[0]; // January to March
                } else if (month >= 3 && month < 6) {
                    return targetValues[1]; // April to June
                } else if (month >= 6 && month < 9) {
                    return targetValues[2]; // July to September
                } else {
                    return targetValues[3]; // October to December
                }
            }

            Target = targetValue;
            let Total;

            if (currentMonth >= 0 && currentMonth < 3) {
                Total = sumQuarter1; // January to March
            } else if (currentMonth >= 3 && currentMonth < 6) {
                Total = sumQuarter2; // April to June
            } else if (currentMonth >= 6 && currentMonth < 9) {
                Total = sumQuarter3; // July to September
            } else if (currentMonth >= 8 && currentMonth < 12) {
                Total = sumQuarter4; // October to December
            }

            const needle = (Total / Target);
            let percentage = needle * 100;
            if (percentage > 100) {
                percentage = 100;
            } else {
                percentage = percentage;
            }

            speedometerReading.textContent = Total + " Transaction";

            //rotation of the needle 
            let rotation = (needle) * 180 - 90;
            if (rotation > 180) {
                rotation = 180 - 90;
            }

            speedometerArrow.style.transformOrigin = "50% 100%";
            speedometerArrow.style.transform = `translateX(-50%) rotate(${rotation}deg)`;

            const speedometerDial = document.querySelector('.speedometer-dial');

            // Get the total/target value (you can replace this with your actual value)
            const totalValue = needle; // Change this value as needed

            // Function to update the background color based on the value
            function updateBackgroundColor(value) {
                if (value >= 0 && value <= 0.25) {
                    speedometerDial.style.backgroundColor = 'red';
                } else if (value > 0.25 && value <= 0.5) {
                    speedometerDial.style.backgroundColor = 'orange';
                } else if (value > 0.5 && value <= 0.75) {
                    speedometerDial.style.backgroundColor = 'yellow';
                } else {
                    speedometerDial.style.backgroundColor = 'green';
                }
            }

            // Call the updateBackgroundColor function with the initial total/target value
            updateBackgroundColor(totalValue);
            //percentage text color
            let percentagecolor = '';
            if (percentage >= 76 && percentage <= 100) {
                percentagecolor = 'green';
            } else if (percentage >= 51 && percentage <= 75) {
                percentagecolor = 'yellow';
            } else if (percentage >= 26 && percentage <= 50) {
                percentagecolor = 'orange';
            } else {
                percentagecolor = 'red';
            }


            // Display the pop-up
            popup.style.display = "block";

            targetTransaction.innerHTML = "Target transaction for this quarter is <span style='color: blue;'>" + Target;
            percentTransaction.innerHTML = "Achieved <span style='color: " + percentagecolor + ";'>" + percentage + "%</span> of target transaction.";
            PopupHeader.innerHTML = "Total Transaction";

            // Extract transactionlabel and transactiondata from the PHP
            const transactionlabel = transaction.labels;
            const transactiondata = transaction.datasets;

            // Initialize variables for overall highest and least values
            let overallHighestTransactionCount = 0;
            let overallLeastTransactionCount = Infinity;
            let overallHighestTransactionDate = null;
            let overallLeastTransactionDate = null;

            // Iterate through the datasets
            transactiondata.forEach(dataset => {
                // Find the highest transaction count in the dataset
                const highestTransactionCountInDataset = Math.max(...dataset.data);

                // Find the least transaction count in the dataset
                const leastTransactionCountInDataset = Math.min(...dataset.data);

                // Check for the overall highest transaction count
                if (highestTransactionCountInDataset > overallHighestTransactionCount) {
                    overallHighestTransactionCount = highestTransactionCountInDataset;
                    overallHighestTransactionDate = transactionlabel[dataset.data.indexOf(overallHighestTransactionCount)];
                }

                // Check for the overall least transaction count
                if (leastTransactionCountInDataset < overallLeastTransactionCount) {
                    overallLeastTransactionCount = leastTransactionCountInDataset;
                    overallLeastTransactionDate = transactionlabel[dataset.data.indexOf(overallLeastTransactionCount)];
                }
            });


            //Transaction type dataset
            const transactionTypeData = <?php
                                        $data = array();
                                        for ($i = 0; $i < count($transactionType); $i++) {
                                            $data[] = array('label' => $transactionType[$i], 'data' => $transactionTypecounts[$i]);
                                        }
                                        echo json_encode($data);
                                        ?>;
            if (transactionTypeData.length === 0) {
                transactionTypeData.push({
                    label: 'No customer saved',
                    data: 0
                });
            }

            const maxtransactionTypeData = transactionTypeData.reduce((max, obj) => (obj.data > max.data ? obj : max), {
                data: -Infinity
            });
            const maxData = maxtransactionTypeData.data;
            const maxtransactionType = transactionTypeData.filter(obj => obj.data === maxData).map(obj => obj.label);
            const minTransactionTypeData = transactionTypeData.reduce((min, obj) => (obj.data < min.data ? obj : min), {
                data: Infinity
            });
            const minData = minTransactionTypeData.data;
            const minTransactionType = transactionTypeData.filter(obj => obj.data === minData).map(obj => obj.label);

            const customerTypeData = <?php
                                        $data = array();
                                        for ($i = 0; $i < count($customerTypetransaction); $i++) {
                                            $data[] = array('label' => $customerTypetransaction[$i], 'data' => $customerTypecounttransaction[$i]);
                                        }
                                        echo json_encode($data);
                                        ?>;
            if (customerTypeData.length === 0) {
                customerTypeData.push({
                    label: 'No customer saved',
                    data: 0
                });
            }

            const maxCustomerTypeData = customerTypeData.reduce((max, obj) => (obj.data >= max.data ? obj : max), {
                data: -Infinity
            });
            const maxCustomerData = maxCustomerTypeData.data;
            const maxCustomerTypes = customerTypeData.filter(obj => obj.data === maxCustomerData).map(obj => obj.label);
            const minCustomerTypeData = customerTypeData.reduce((min, obj) => (obj.data <= min.data ? obj : min), {
                data: Infinity
            });
            const minCustomerData = minCustomerTypeData.data;
            const minCustomerType = customerTypeData.filter(obj => obj.data === minCustomerData).map(obj => obj.label);

            const Province = {
                data: province.datasets,
                labels: province.labels,
            };

            // Check if the data array is empty
            if (Province.data.length === 0) {
                const defaultLabel = 'none';
                const defaultData = 0;

                mostCustomerProvince.innerHTML = "Provinces with the highest transactions: <span style='color:green;'>" + defaultLabel + "</span> having <span style='color: blue;'> " + defaultData + "</span> transaction/s.";
                leastCustomerProvince.innerHTML = "Provinces with the least transactions: <span style='color:green;'>" + defaultLabel + "</span> having <span style='color: blue;'> " + defaultData + "</span> transaction/s.";
            } else {
                const tolerance = 0.0001;

                const highestprovincedata = Math.max(...Province.data);
                const leastprovincedata = Math.min(...Province.data);

                const highestprovinces = [];
                const leastprovinces = [];

                Province.labels.forEach((label, index) => {
                    if (Math.abs(Province.data[index] - highestprovincedata) < tolerance) {
                        highestprovinces.push(label);
                    }

                    if (Math.abs(Province.data[index] - leastprovincedata) < tolerance) {
                        leastprovinces.push(label);
                    }
                });

                mostCustomerProvince.innerHTML = "Provinces with the highest transactions: <span style='color:green;'>" + highestprovinces.join(', ') + "</span> having <span style='color: blue;'> " + highestprovincedata + "</span> transaction/s.";
                leastCustomerProvince.innerHTML = "Provinces with the least transactions: <span style='color:green;'>" + leastprovinces.join(', ') + "</span> having <span style='color: blue;'> " + leastprovincedata + "</span> transaction/s.";
            }



            // Display the results in your HTML elements
            highest.innerHTML = "Highest transaction: <span style='color: red;'>" + overallHighestTransactionDate + "</span> with <span style='color: blue;'> " + overallHighestTransactionCount + "</span> transaction/s.";
            least.innerHTML = "Least transaction: <span style='color: red;'>" + overallLeastTransactionDate + "</span> with <span style='color: blue;'> " + overallLeastTransactionCount + "</span> transaction/s.";
            mostTransactionType.innerHTML = "Highest transaction type:  <span style='color:green;'>" + maxtransactionType.join(', ') + "</span> having  <span style='color: blue;'> " + maxData + "</span> transaction/s.";
            leastTransactionType.innerHTML = "Least transaction type:   <span style='color:green;'>" + minTransactionType.join(', ') + "</span> having  <span style='color: blue;'> " + minData + "</span> transaction/s.";
            mostCustomerType.innerHTML = "Highest customer type(s): <span style='color:green;'>" + maxCustomerTypes.join(', ') + "</span> having <span style='color: blue;'> " + maxCustomerData + "</span> transaction/s.";
            leastCustomerType.innerHTML = "Least customer type: <span style='color:green;'>" + minCustomerType.join(', ') + "</span> having <span style='color: blue;'> " + minCustomerData + "</span> transaction/s.";
        });

        closePopup.addEventListener("click", () => {
            // Close the pop-up when the close button is clicked
            popup.style.display = "none";
        });

        /// sales popup
        totalsalesChart.addEventListener("click", () => {


            // Initialize empty arrays for each quarter
            const quarter1 = [];
            const quarter2 = [];
            const quarter3 = [];
            const quarter4 = [];

            // Iterate through the income data
            income.labels.forEach((label, index) => {
                const date = new Date(label);
                const year = date.getFullYear();
                const quarter = Math.floor((date.getMonth() + 3) / 3);

                // Check if the income is from the current year
                if (year === currentYear) {
                    // Categorize income into quarters
                    switch (quarter) {
                        case 1:
                            quarter1.push(income.datasets[0].data[index]);
                            break;
                        case 2:
                            quarter2.push(income.datasets[0].data[index]);
                            break;
                        case 3:
                            quarter3.push(income.datasets[0].data[index]);
                            break;
                        case 4:
                            quarter4.push(income.datasets[0].data[index]);
                            break;
                    }
                }
            });
            // Calculate the sum of income for each quarter
            const sumQuarter1 = quarter1.reduce((acc, value) => acc + value, 0);
            const sumQuarter2 = quarter2.reduce((acc, value) => acc + value, 0);
            const sumQuarter3 = quarter3.reduce((acc, value) => acc + value, 0);
            const sumQuarter4 = quarter4.reduce((acc, value) => acc + value, 0);

            // Get the appropriate target value based on the current month
            const targetincomeValue = getTargetValue(currentMonth);

            // Function to determine the target value based on the current month
            function getTargetValue(month) {
                if (month >= 0 && month < 3) {
                    return targetincomeValues[0]; // January to March
                } else if (month >= 3 && month < 6) {
                    return targetincomeValues[1]; // April to June
                } else if (month >= 6 && month < 9) {
                    return targetincomeValues[2]; // July to September
                } else {
                    return targetincomeValues[3]; // October to December
                }
            }

            Target = targetincomeValue;


            let Total;

            if (currentMonth >= 0 && currentMonth < 3) {
                Total = sumQuarter1; // January to March
            } else if (currentMonth >= 3 && currentMonth < 6) {
                Total = sumQuarter2; // April to June
            } else if (currentMonth >= 6 && currentMonth < 9) {
                Total = sumQuarter3; // July to September
            } else if (currentMonth >= 8 && currentMonth < 12) {
                Total = sumQuarter4; // October to December
            }
            Total = Total.toFixed(2);

            const needle = (Total / Target);
            let percentage = needle * 100;
            if (percentage > 100) {
                percentage = 100;
            } else {
                percentage = percentage;
            }

            speedometerReading.textContent = Number(Total).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + " Income";

            // Simulate the speedometer arrow movement (you can replace this with actual data)
            let rotation = (needle) * 180 - 90;
            if (rotation > 180) {
                rotation = 180 - 90;
            }
            speedometerArrow.style.transformOrigin = "50% 100%";
            speedometerArrow.style.transform = `translateX(-50%) rotate(${rotation}deg)`;

            const speedometerDial = document.querySelector('.speedometer-dial');

            // Get the total/target value (you can replace this with your actual value)
            const totalValue = needle; // Change this value as needed

            // Function to update the background color based on the value
            function updateBackgroundColor(value) {
                if (value >= 0 && value <= 0.25) {
                    speedometerDial.style.backgroundColor = 'red';
                } else if (value > 0.25 && value <= 0.5) {
                    speedometerDial.style.backgroundColor = 'orange';
                } else if (value > 0.5 && value <= 0.75) {
                    speedometerDial.style.backgroundColor = 'yellow';
                } else {
                    speedometerDial.style.backgroundColor = 'green';
                }
            }

            // Call the updateBackgroundColor function with the initial total/target value
            updateBackgroundColor(totalValue);
            //percentage text color
            let percentagecolor = '';
            if (percentage >= 76 && percentage <= 100) {
                percentagecolor = 'green';
            } else if (percentage >= 51 && percentage <= 75) {
                percentagecolor = 'yellow';
            } else if (percentage >= 26 && percentage <= 50) {
                percentagecolor = 'orange';
            } else {
                percentagecolor = 'red';
            }


            // Display the pop-up
            popup.style.display = "block";

            targetTransaction.innerHTML = "Target income for this quarter is <span style='color: blue;'>" + Target;
            percentTransaction.innerHTML = "Achieved <span style='color: " + percentagecolor + ";'>" + percentage + "%</span> of target income";
            PopupHeader.innerHTML = "Total Income";


            // Extract incomelabel and incomedata from the PHP data
            const incomelabel = income.labels;
            const incomedata = income.datasets;

            // Initialize variables for overall highest and least values
            let overallHighestIncome = 0;
            let overallLeastIncome = Infinity;
            let overallHighestIncomeDate = null;
            let overallLeastIncomeDate = null;

            // Iterate through the datasets
            incomedata.forEach(dataset => {
                // Find the highest income in the dataset
                const highestIncomeInDataset = Math.max(...dataset.data);

                // Find the least income in the dataset
                const leastIncomeInDataset = Math.min(...dataset.data);

                // Check for the overall highest income
                if (highestIncomeInDataset > overallHighestIncome) {
                    overallHighestIncome = highestIncomeInDataset;
                    overallHighestIncomeDate = incomelabel[dataset.data.indexOf(overallHighestIncome)];
                }

                // Check for the overall least income
                if (leastIncomeInDataset < overallLeastIncome) {
                    overallLeastIncome = leastIncomeInDataset;
                    overallLeastIncomeDate = incomelabel[dataset.data.indexOf(overallLeastIncome)];
                }
            });

            const transactionTypeData = <?php
                                        $data = array();
                                        for ($i = 0; $i < count($transactionTypeincome); $i++) {
                                            $data[] = array('label' => $transactionTypeincome[$i], 'data' => $transactionTypesumincome[$i]);
                                        }
                                        echo json_encode($data);
                                        ?>;
            if (transactionTypeData.length === 0) {
                transactionTypeData.push({
                    label: 'No customer saved',
                    data: 0
                });
            }


            const maxtransactionTypeData = transactionTypeData.reduce((max, obj) => (obj.data > max.data ? obj : max), {
                data: -Infinity
            });
            const maxData = maxtransactionTypeData.data;
            const maxtransactionType = transactionTypeData.filter(obj => obj.data === maxData).map(obj => obj.label);
            const minTransactionTypeData = transactionTypeData.reduce((min, obj) => (obj.data < min.data ? obj : min), {
                data: Infinity
            });
            const minData = minTransactionTypeData.data;
            const minTransactionType = transactionTypeData.filter(obj => obj.data === minData).map(obj => obj.label);

            const customerTypeData = <?php
                                        $data = array();
                                        for ($i = 0; $i < count($customerTypeincome); $i++) {
                                            $data[] = array('label' => $customerTypeincome[$i], 'data' => $customerTypecountincome[$i]);
                                        }
                                        echo json_encode($data);
                                        ?>;
            if (customerTypeData.length === 0) {
                customerTypeData.push({
                    label: 'No customer saved',
                    data: 0
                });
            }


            const maxCustomerTypeData = customerTypeData.reduce((max, obj) => (obj.data >= max.data ? obj : max), {
                data: -Infinity
            });
            const maxCustomerData = maxCustomerTypeData.data;
            const maxCustomerTypes = customerTypeData.filter(obj => obj.data === maxCustomerData).map(obj => obj.label);
            const minCustomerTypeData = customerTypeData.reduce((min, obj) => (obj.data <= min.data ? obj : min), {
                data: Infinity
            });
            const minCustomerData = minCustomerTypeData.data;
            const minCustomerType = customerTypeData.filter(obj => obj.data === minCustomerData).map(obj => obj.label);

            const Province = {
                data: provinceincome.datasets,
                labels: provinceincome.labels,
            };

            // Check if the data array is empty
            if (Province.data.length === 0) {
                const defaultLabel = 'none';
                const defaultData = 0;

                mostCustomerProvince.innerHTML = "Provinces with the highest income: <span style='color:green;'>" + defaultLabel + "</span> having <span style='color: blue;'> " + Number(defaultData).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }) + "</span> total income.";
                leastCustomerProvince.innerHTML = "Provinces with the least income: <span style='color:green;'>" + defaultLabel + "</span> having <span style='color: blue;'> " + Number(defaultData).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }) + "</span> total income.";
            } else {
                const tolerance = 0.0001;

                const highestprovincedata = Math.max(...Province.data);
                const leastprovincedata = Math.min(...Province.data);

                const highestprovinces = [];
                const leastprovinces = [];

                Province.labels.forEach((label, index) => {
                    if (Math.abs(Province.data[index] - highestprovincedata) < tolerance) {
                        highestprovinces.push(label);
                    }

                    if (Math.abs(Province.data[index] - leastprovincedata) < tolerance) {
                        leastprovinces.push(label);
                    }
                });

                mostCustomerProvince.innerHTML = "Provinces with the highest income: <span style='color:green;'>" + highestprovinces.join(', ') + "</span> having <span style='color: blue;'> " + Number(highestprovincedata).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }) + "</span> total income.";
                leastCustomerProvince.innerHTML = "Provinces with the least income: <span style='color:green;'>" + leastprovinces.join(', ') + "</span> having <span style='color: blue;'> " + Number(leastprovincedata).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }) + "</span> total income.";
            }

            highest.innerHTML = "Highest income: <span style='color: red;'>" + overallHighestIncomeDate + "</span> with <span style='color: blue;'> " + Number(overallHighestIncome).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + "</span>.";
            least.innerHTML = "Least income: <span style='color: red;'>" + overallLeastIncomeDate + "</span> with <span style='color: blue;'> " + Number(overallLeastIncome).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + "</span>.";
            mostTransactionType.innerHTML = "Highest transaction type:  <span style='color:green;'>" + maxtransactionType.join(', ') + "</span> having  <span style='color: blue;'> " + Number(maxData).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + "</span> total income.";
            leastTransactionType.innerHTML = "Least transaction type:   <span style='color:green;'>" + minTransactionType.join(', ') + "</span> having  <span style='color: blue;'> " + Number(minData).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + "</span> total income.";
            mostCustomerType.innerHTML = "Highest customer type(s): <span style='color:green;'>" + maxCustomerTypes.join(', ') + "</span> having <span style='color: blue;'> " + Number(maxCustomerData).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + "</span> total income.";
            leastCustomerType.innerHTML = "Least customer type: <span style='color:green;'>" + minCustomerType.join(', ') + "</span> having <span style='color: blue;'> " + Number(minCustomerData).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + "</span> total income.";


        });


        closePopup.addEventListener("click", () => {
            // Close the pop-up when the close button is clicked
            popup.style.display = "none";
        });
    </script>




    <script>
        // Reference datas
        const TransactionperDiv = <?php echo json_encode($TransactionperDiv); ?>;
        const SalesperDiv = <?php echo json_encode($SalesperDiv); ?>;

        // Transaction bar graphs
        const transactionCtx = document.getElementById('transactionChart').getContext('2d');
        const transactionChart = new Chart(transactionCtx, {
            type: 'bar',
            // {
            //     datasets: TransactionperDiv.datasets.map(dataset => ({
            //         ...dataset,
            //         data: dataset.data.slice(0, 7) // Display only the first 7 data points for each dataset
            //     })),
            //     labels: TransactionperDiv.labels.slice(0, 7)  // Assuming labels are defined in TransactionperDiv
            // },
            options: {
                indexAxis: 'x',
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            drawOnChartArea: false,
                            display: false
                        },
                    },
                    y: {
                        grid: {
                            display: false,
                            drawOnChartArea: false
                        }
                    },
                },
                ticks: {
                    precision: 0,
                },
            }
        });

        // const barPosition = {
        //     id: 'barPosition',
        //     beforeDatasetsDraw: (chart, args, pluginOptions) => {
        //         const { ctx, data, chartArea: { top, bottom, left, right, width, height }, scales: { x, y } } = chart;

        //         // Calculate the width for each dataset based on the total number of datasets.
        //         // This assumes that the labels array length is equal to the number of x-axis categories.
        //         // Adding "_unique" to the variable name to make it unique.
        //         const barWidth_unique = width / data.labels.length;

        //         // Loop through each dataset.
        //         data.datasets.forEach((dataset, datasetIndex) => {
        //         // Get the meta for the current dataset.
        //         const datasetMeta = chart.getDatasetMeta(datasetIndex);

        //         // Loop through each datapoint in the current dataset.
        //         datasetMeta.data.forEach((datapoint, index) => {
        //             // Adjust the x position of the datapoint.
        //             // This centers the bar within the allocated space for each x-axis category.
        //             // Now using "barWidth_unique" to reflect the unique variable name.
        //             datapoint.x = left + (barWidth_unique * (index + 0.5));
        //             datapoint.x += (barWidth_unique / data.datasets.length) * datasetIndex - (barWidth_unique/4);
        //         });
        //         });
        //     }
        //     };



        //sales bar graph
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'bar',
            data: SalesperDiv,
            options: {
                tension: 0.4,
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawOnChartArea: false,
                            display: false
                        }

                    },

                    x: {
                        grid: {
                            drawOnChartArea: false
                        }
                    }

                },
                // plugins: {
                //     barPosition: false 
                // },

            },
            // plugins: [barPosition],
        });

        const bgColor = {
            id: 'bgColor',
            beforeDraw: (chart, steps, options) => {
                const {
                    ctx,
                    width,
                    height
                } = chart;
                ctx.fillStyle = options.backgroundColor;
                ctx.fillRect(0, 0, width, height)
                ctx.restore();
            }
        };


        function dateChange() {
            let dateTypeSelect = document.getElementById('date_type');
            let selectedValue = dateTypeSelect.value;

            // if (selectedValue === 'Days') {

            // salesChart.config.type = "line";
            // salesChart.update();

            // salesChart.options.plugins.barPosition = false; // Or any other setting you wish to apply
            // salesChart.update(); 

            // }    
            if (selectedValue === 'Months') {

                document.getElementById('startDate').setAttribute('type', 'month');
                document.getElementById('endDate').setAttribute('type', 'month');

                const dX = new Date();
                let yearX = dX.getFullYear();
                var listers = []; //for months

                function updateThis() {
                    var chartLabelZ = (<?= json_encode($monthLabel) ?>);
                    var x = 0;
                    while (chartLabelZ[x] != null) {
                        var lab2 = chartLabelZ[x].month;
                        listers[x] = lab2;
                        x++;
                    }
                }
                updateThis()
                let janm = listers.slice(0, 1).toString().split("-");
                let janMonth = janm[1].toString();
                let currMonth = ("0" + (dX.getMonth() + 1)).slice(-2); //get current month

                document.getElementById('startDate').value = yearX + "-" + janMonth;
                document.getElementById('endDate').value = yearX + "-" + currMonth;

                // salesChart.config.type = "line";
                // salesChart.update();

                // salesChart.options.plugins.barPosition = false; // Or any other setting you wish to apply
                // salesChart.update(); 

            } else if (selectedValue === 'Years') {

                var yearLabelZ = (<?= json_encode($yearLabel) ?>);
                const dX = new Date();
                let yearX = dX.getFullYear();
                var listers = []; //for years

                function yearAssign() {
                    var x = 0;
                    while (yearLabelZ[x] != null) {
                        var lab3 = yearLabelZ[x].year;
                        listers[x] = lab3;
                        x++;
                    }
                }
                yearAssign();

                document.getElementById('startDate').setAttribute('type', 'number');
                document.getElementById('startDate').value = "2023";
                document.getElementById('endDate').setAttribute('type', 'number');
                document.getElementById('endDate').value = yearX;


                // salesChart.config.type = "bar";
                // salesChart.update();

                // salesChart.options.plugins.barPosition = true; // Or any other setting you wish to apply
                // salesChart.update(); 

            } else { //Days

                document.getElementById('startDate').setAttribute('type', 'date');
                document.getElementById('endDate').setAttribute('type', 'date');

                dateFilterRefresh();
            }
            dateFilter();
        };

        function dateFilterRefresh() { // asign current week's sunday and saturday to datepicker

            let dateTypeSelect = document.getElementById('date_type');
            let selectedValue = dateTypeSelect.value;
            if (selectedValue === 'Days') {

                //duh
                const today = new Date();
                //get date of this week's sunday
                const sunDay = new Date(
                    today.setDate(today.getDate() - today.getDay() + 1),
                );
                //get date of this week's saturday
                const satDay = new Date(
                    today.setDate(today.getDate() - today.getDay() + 7),
                );
                //"yyyy-mm-dd" format
                var toSunDay = sunDay.toISOString().slice(0, 10);
                var toSatDay = satDay.toISOString().slice(0, 10);

                //calculated dates as input values
                document.getElementById('startDate').value = toSunDay;
                document.getElementById('endDate').value = toSatDay;
            }
        }
        dateFilterRefresh();


        // Function to calculate the average of an array of numbers
        const calculateAverage = (array) => {
            if (array.length === 0) return 0;
            const sum = array.reduce((total, num) => total + num, 0);
            return Math.round(sum / array.length);
        };

        // // Calculate the average of each dataset
        // const salesAverage = SalesperDiv.datasets.map(dataset => ({
        //     label: dataset.label,
        //     average: calculateAverage(dataset.data),
        // }));


        // Calculate the average of each dataset
        const TransactionAverage = SalesperDiv.datasets.map(dataset => ({
            label: dataset.label,
            average: calculateAverage(dataset.data),
        }));
        // Find the maximum average value
        const maxAverage = Math.max(...TransactionAverage.map((average) => average.average));

        // Create a new dataset for each sales average
        const newDatasets = TransactionAverage.map((average, index) => {
            const datasetColors = ['rgba(0, 115, 199,1)', 'rgba(2, 165, 96,1)', 'rgba(242, 26, 156,1)']; // Array of specific colors
            const color = datasetColors[index % datasetColors.length]; // Assign color based on index

            return {
                label: `Average ${average.label}`,
                data: [average.average],
                borderWidth: 1,
                circumference: (ctx) => ((ctx.dataset.data[0] / maxAverage) * 270),
                backgroundColor: color,
                borderColor: color,
            };
        });

        // Combine the existing datasets with the new datasets
        const allDatasets = [...TransactionAverage, ...newDatasets];

        // Define the data for the doughnut chart
        const data = {
            datasets: allDatasets,
        };
        const divisionName = {


        } // tsaka ko na to tutuloy yawa walang wifi

        // Config for the doughnut chart
        const config = {
            type: 'doughnut',
            data,
            options: {
                // cutout:'85%',
                borderRadius: 10,
                plugins: {
                    legend: {
                        display: false
                    }
                },

                // plugins:[divisionName] //to be continue
            },
            plugins: [{
                id: 'divisionName',
                afterDatasetsDraw(chart, args, options) {
                    const {
                        ctx,
                        data,
                        scales,
                        chartArea: {
                            left,
                            top,
                            width,
                            height
                        }
                    } = chart;

                    ctx.save();
                    ctx.font = 'bolder 15px Poppins';
                    ctx.fillStyle = 'rgb(3, 98, 186, 1)';
                    ctx.textAlign = 'center';
                    ctx.fillText('Average sales per day', width / 2.1, height / 2 + top);

                }

            }]
        };

        // Render the doughnut chart
        const myChart = new Chart(document.getElementById('myChart'), config);

        // Instantly assign Chart.js version
        const chartVersion = document.getElementById('chartVersion');

        var customerTypeData = <?php echo json_encode($customerTypeData); ?>;
        var paragraphElement = document.getElementById('customerTypeParagraph');
    </script>


    <!-- All about customer graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="customers_data">
        <div class="date_filter" style="text-align: left; padding-left: 8rem; padding-top: 0rem; padding-bottom: 2rem;">
            <div class="containers">
                <div class="date_dropdown">
                    <label for="chart_type" class="chart_type_label">
                        <strong>Select Region: </strong></label>
                    <select name="chart_type" id="chart_type" class="dropdown-content" onchange="dateFilter()">
                        <option value="ncr">National Capital Region</option>
                        <option value="region-1">Region-I</option>
                        <option value="region-2">Region-II</option>
                        <option value="region-3">Region-III</option>
                        <option value="region-4a">Region-IV-A</option>
                        <option value="mimaropa">MIMAROPA</option>
                        <option value="region-5">Region-V</option>
                        <option value="car">Cordillera Administrative Region</option>
                        <option value="region-6">Region-VI</option>
                        <option value="region-7">Region-VII</option>
                        <option value="region-8">Region-VII</option>
                        <option value="region-9">Region-IX</option>
                        <option value="region-10">Region-X</option>
                        <option value="region-11">Region-XI</option>
                        <option value="region-12">Region-XII</option>
                        <option value="region-13">Region-XIII</option>
                        <option value="barm">Bangsamoro</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <p class="reportTitle" id=" ">Total Customers per Province</p>
            <canvas id="Provinces"></canvas>
        </div>
    </div>
</div>

<!-- <div class="chart-container" style="width: 47%; text-align: center;">
                <p class="reportTitle" id=" ">Type of Customers per Province</p>
                    <canvas id="TCProvinces"></canvas>
            </div>
            <div class="chart-container" style="width: 47%; text-align: center;">
                <p class="reportTitle" id=" ">Type of Transaction per Province</p>
                <div class="containerBody">
                    <canvas id="TTProvinces"></canvas>
                </div>
            </div>
        </div>

</div> -->


<!-- scriptfor customers graph -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    // Get references to chart containers and the dropdown
    const provincesChartContainer = document.getElementById('Provinces').getContext('2d');
    const chartTypeDropdown = document.getElementById('chart_type');
    const constprovincesChart = new Chart(provincesChartContainer, {
        type: 'bar',
        options: {
            barThickness: 25,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false,
                    },
                },
                x: {
                    ticks: {
                        display: false,
                    },
                    grid: {
                        display: false,
                    },
                },
            },
            ticks: {
                    precision: 0,
                },
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'end',
                    offset: 4,
                    display: 'auto',
                    color: 'white',
                },
                bgColor: {
                    backgroundColor: 'white'
                }
            },
        },
    });

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    var provinceData = [];
    //look for updateChartContent(response)
</script>

<!-- All about customer graphs -->
<script src="path/to/Chart.min.js"></script>
<div class="customers_data">
    <div class="date_filter" style="text-align: left; padding-left: 8rem; padding-top: 0rem; padding-bottom: 2rem;">
        <div class="containers">
            <div class="date_dropdown">
                <label for="chart_type2" class="chart_type_label2">
                    <strong>Chart Filter</strong></label>
                <select name="chart_type2" id="chart_type2" class="dropdown-content" onchange="changeChart()">
                    <option value="doughnut">Doughnut</option>
                    <option value="pie">Pie</option>
                    <option value="bar">Bar</option>

                    <!-- <option value="horizontal_bar">Horizontal chart</option> -->
                </select>
            </div>
        </div>
    </div>

    <div class="graph2">
        <div class="chart-container2">
            <p class="reportTitle" id=" ">Transaction Status</p>
            <canvas id="transactionStatus"></canvas>
        </div>
        <div class="chart-container2">
            <p class="reportTitle" id=" ">Payment Method</p>
            <canvas id="paymendtMethod"></canvas>
        </div>
    </div>
    <div class="graph2">
        <div class="chart-container2">
            <p class="reportTitle" id=" ">Type of Transaction</p>
            <canvas id="transactionType"></canvas>
        </div>

        <div class="chart-container2">
            <p class="reportTitle" id=" ">Type of Customers</p>
            <canvas id="customerType"></canvas>
        </div>
    </div>
</div>


<!-- scriptfor customers graph -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    //3bm75
    // Get references to chart containers and the dropdown
    const transactionStatusChartContainer = document.getElementById('transactionStatus');
    const paymendtMethodChartContainer = document.getElementById('paymendtMethod');
    const transactionTypeChartContainer = document.getElementById('transactionType');
    const customerTypeChartContainer = document.getElementById('customerType');
    const chartTypeDropdown2 = document.getElementById('chart_type2');


    const selectedChartType = chartTypeDropdown2.value;

    const doughnutOptions = {
        plugins: {
            scales: {
                y: {
                    grid: {
                        display: false,
                    }
                },
                x: {
                    grid: {
                        display: false,
                    }
                },
                ticks: {
                    precision: 0,
                },
            },
            legend:{
                    display: true,
            },
            bgColor: {
                backgroundColor: 'white',
            },
            datalabels: {
                color: 'black',
                fontSize: 10,
            },
        },
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%',

    };

    const transactionTypeElement = document.getElementById("transactionType");
    transactionTypeElement.style.marginLeft = "0px";
    // For doughnut and pie charts, use the custom options
    transactionStatusChart = new Chart(transactionStatusChartContainer, {
        type: 'doughnut',
        options: doughnutOptions,
        plugins: [bgColor, ChartDataLabels],
        data: {
            labels: <?php echo json_encode($transactionStatus); ?>,
            datasets: [{
                data: <?php echo json_encode($transactionStatusDatacounts); ?>,
                backgroundColor: ['rgba(229, 247, 48, 0.2)', //red
                    'rgba(241, 37, 150, 0.2)', //yellow
                    'rgba(0, 215, 132, 0.2)', //green
                ],
                borderColor: ['rgba(229, 247, 48, 0.8)', //red
                    'rgba(241, 37, 150, 0.8)', //yellow
                    'rgba(0, 215, 132, 0.93)', //green
                ],
                borderWidth: 2
            }],
        },
    });

    paymendtMethodChart = new Chart(paymendtMethodChartContainer, {
        type: 'doughnut',
        options: doughnutOptions,
        plugins: [bgColor, ChartDataLabels],
        data: {
            labels: <?php echo json_encode($PaymentMethod); ?>,
            datasets: [{
                data: <?php echo json_encode($PaymentMethodcounts); ?>,
                backgroundColor: ['rgba(0, 21, 215, 0.2)',
                    'rgba(0, 215, 132, 0.2)',
                    'rgba(118, 0, 186, 0.2)',
                ],
                borderColor: ['rgba(0, 21, 215, 0.93)',
                    'rgba(0, 215, 132, 1)',
                    'rgba(118, 0, 186, 0.93)',
                ],
                borderWidth: 2
            }],
        },
    });
    transactionTypeChart = new Chart(transactionTypeChartContainer, {
        type: 'doughnut',
        options: doughnutOptions,
        plugins: [bgColor, ChartDataLabels],
        data: {
            labels: <?php echo json_encode($transactionType); ?>,
            datasets: [{
                data: <?php echo json_encode($transactionTypecounts); ?>,
                backgroundColor: ['rgba(186, 0, 0, 0.2)',
                    'rgba(250, 154, 37, 0.2)',
                    'rgba(37, 202, 247, 0.2)',
                ],
                borderColor: ['rgba(186, 0, 0, 0.93)',
                    'rgba(250, 154, 37, 0.81)',
                    'rgba(37, 202, 247, 0.81)',
                ],
                borderWidth: 2
            }],
        },
    });
    customerTypeChart = new Chart(customerTypeChartContainer, {
        type: 'doughnut',
        options: doughnutOptions,
        plugins: [bgColor, ChartDataLabels],
        data: {
            labels: <?php echo json_encode($customerType); ?>,
            datasets: [{
                data: <?php echo json_encode($customerscounts); ?>,
                backgroundColor: ['rgba(247, 37, 149, 0.2)',
                    'rgba(166, 37, 247, 0.2)',
                    'rgba(255, 155, 22, 0.2)',
                    'rgba(255, 213, 22, 0.2)',
                    'rgba(49, 255, 22, 0.2)',
                    'rgba(73, 0, 242, 0.2)',
                    'rgba(0, 220, 242, 0.2)'

                ],
                borderColor: ['rgba(247, 37, 149, 0.81)',
                    'rgba(166, 37, 247, 0.83)',
                    'rgba(255, 155, 22, 0.83)',
                    'rgba(255, 213, 22, 0.83)',
                    'rgba(49, 255, 22, 0.83)',
                    'rgba(73, 0, 242, 0.83)',
                    'rgba(0, 220, 242, 0.83)'
                ],
                borderWidth: 2
            }],
        },
    });

    // dashboard design end

    function changeChart() {
        var type = document.getElementById('chart_type2');
        var typeSelect = type.value;

        // Remove cutout if the selected type is 'bar'
        doughnutOptions.cutout = typeSelect === 'pie' ? 0 : '70%';

        if (typeSelect === 'bar') {
        // Remove gridlines for x and y axes
        doughnutOptions.plugins.scales.x.grid.display = false;
        doughnutOptions.plugins.scales.y.grid.display = false;
        doughnutOptions.plugins.legend.display = false;

        } else {
            // For other chart types, display gridlines
            doughnutOptions.plugins.scales.x.grid.display = true;
            doughnutOptions.plugins.scales.y.grid.display = true;
            doughnutOptions.plugins.legend.display = true;    
        }


        transactionStatusChart.config.type = typeSelect;
        paymendtMethodChart.config.type = typeSelect;
        transactionTypeChart.config.type = typeSelect;
        customerTypeChart.config.type = typeSelect;

        transactionStatusChart.options = JSON.parse(JSON.stringify(doughnutOptions));
        paymendtMethodChart.options = JSON.parse(JSON.stringify(doughnutOptions));
        transactionTypeChart.options = JSON.parse(JSON.stringify(doughnutOptions));
        customerTypeChart.options = JSON.parse(JSON.stringify(doughnutOptions));

        transactionStatusChart.update();
        paymendtMethodChart.update();
        transactionTypeChart.update();
        customerTypeChart.update();

        typeSelect = "";
    }
</script>

<script>
    function dateFilter() {
        var dateTypeSelect = document.getElementById('date_type');
        var selectedValue = dateTypeSelect.value;

        if (selectedValue === 'Days') {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            //get the contents of the html datepicker
            const fromDateValue = document.getElementById('startDate');
            const toDatevalue = document.getElementById('endDate');

            const fDate = fromDateValue.value;
            const tDate = toDatevalue.value;

            //send datepicker data to controller, 
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/chart/days' ?>', // from index to controller then action
                method: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                dataType: 'json',
                data: {
                    fromDate: fDate,
                    toDate: tDate
                },
                success: function(response) {
                    updateChartContent(response);
                    //assign new value from controller to variables
                },
                error: function(error) {
                    console.error(error);
                    console.log("=== day error");
                }
            });

        } else if (selectedValue === 'Months') {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            //get the contents of the html datepicker
            const fromDateValue = document.getElementById('startDate');
            const toDatevalue = document.getElementById('endDate');

            const fDate = fromDateValue.value;
            const tDate = toDatevalue.value;
            console.log(fDate + " to " + tDate)

            //send datepicker data to controller, 
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/chart/months' ?>', // from index to controller then action
                method: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                dataType: 'json',
                data: {
                    fromDate: fDate,
                    toDate: tDate
                },
                success: function(response) {
                    updateChartContent(response);
                    //assign new value from controller to variables
                },
                error: function(error) {
                    console.error(error);
                    console.log("=== month error");
                }
            });
        } else { //years

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            //get the contents of the html datepicker
            const fromDateValue = document.getElementById('startDate');
            const toDatevalue = document.getElementById('endDate');

            const fDate = fromDateValue.value;
            const tDate = toDatevalue.value;
            console.log(fDate + " to " + tDate)

            //send datepicker data to controller, 
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/chart/years' ?>', // from index to controller then action
                method: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                dataType: 'json',
                data: {
                    fromDate: fDate,
                    toDate: tDate
                },
                success: function(response) {
                    updateChartContent(response);
                    //assign new value from controller to variables
                },
                error: function(error) {
                    console.error(error);
                    console.log("=== year error");
                }
            });
        }
    }
    dateFilter();

    function updateChartContent(response) {

        var dateTypeSelect = document.getElementById('date_type');
        var selectedValue = dateTypeSelect.value;

        var x = 0;

        //------------------------------------------------1st//3bm60
        // Remove old data
        transactionChart.data.datasets.forEach((dataset) => {
            dataset.data = [];
        });

        var totalTransactionDataset = {
            datasets: [{
                backgroundColor: '#06d6a0',
                label: 'National Metrology Division',
                data: {}
            }, ],
        }

        function totalTransactionTranslate() {
            x = 0;
            while (response.queryAllDate[x] != null) {
                var samp = response.queryAllDate[x].labels;
                var sampo = parseInt(response.queryAllDate[x].datasets);
                if (response.queryAllDate[x].label === "National Metrology Division") {

                    totalTransactionDataset.datasets[0].data[samp] = sampo;
                }
                x++
            }
            x = 0;
        }
        totalTransactionTranslate();

        transactionChart.config.data.datasets = totalTransactionDataset.datasets; //replace the current chart dataset
        console.log(totalTransactionDataset.datasets)
        //------------------------------------------------2nd//3bm40
        // Remove old data
        salesChart.data.datasets.forEach((dataset) => {
            dataset.data = [];
        });

        var totalIncomeDataset = {
            datasets: [{
                backgroundColor: '#bf60e2',
                label: 'National Metrology Division',
                data: {}
            }, ],
        }

        function totalIncomeTranslate() {
            x = 0;
            while (response.queryTotalSale[x] != null) {
                var samp = response.queryTotalSale[x].labels;
                var sampo = parseInt(response.queryTotalSale[x].datasets);
                if (response.queryTotalSale[x].label === "National Metrology Division") {

                    totalIncomeDataset.datasets[0].data[samp] = sampo;
                }
                x++
            }
            x = 0;
        }
        totalIncomeTranslate();

        salesChart.config.data.datasets = totalIncomeDataset.datasets; //replace the current chart dataset

        const dateList = [];
        const monthList = [];
        const yearList = []

        if (selectedValue === 'Days') {
            while (response.chartLabel[x] != null) {
                var lab1 = response.chartLabel[x].labels;
                dateList[x] = lab1;
                x++;
            }
            console.log(dateList)

        } else if (selectedValue === 'Months') {
            while (response.monthLabel[x] != null) {
                var lab1 = response.monthLabel[x].labels;
                monthList[x] = lab1;
                x++;
            }
        } else {
            while (response.yearLabel[x] != null) {
                var lab1 = response.yearLabel[x].labels;
                yearList[x] = lab1;
                x++;
            }
            console.log(yearList)
        }

        x = 0;
        transactionChart.config.data.labels = [];
        salesChart.config.data.labels = [];

        if (selectedValue === 'Days') {
            transactionChart.config.data.labels = dateList;
            salesChart.config.data.labels = dateList;

        } else if (selectedValue === 'Months') {
            transactionChart.config.data.labels = monthList;
            salesChart.config.data.labels = monthList;
        } else {
            transactionChart.config.data.labels = yearList;
            salesChart.config.data.labels = yearList;
        }

        transactionChart.update();
        salesChart.update();

        const selectedType = chartTypeDropdown.value;
        var selected_data;
        switch (selectedType) {
            case "ncr":
                selected_data = response.custmerPerProvinceNCR
                break;
            case "region-1":
                selected_data = response.custmerPerProvinceRI
                break;
            case "region-2":
                selected_data = response.custmerPerProvinceRII
                break;
            case "region-3":
                selected_data = response.custmerPerProvinceRIII
                break;
            case "region-4a":
                selected_data = response.custmerPerProvinceRIVA
                break;
            case "mimaropa":
                selected_data = response.custmerPerProvinceMIMAROPA
                break;
            case "region-5":
                selected_data = response.custmerPerProvinceV
                break;
            case "car":
                selected_data = response.custmerPerProvinceCAR
                break;
            case "region-6":
                selected_data = response.custmerPerProvinceVI
                break;
            case "region-7":
                selected_data = response.custmerPerProvinceVII
                break;
            case "region-8":
                selected_data = response.custmerPerProvinceVIII
                break;
            case "region-9":
                selected_data = response.custmerPerProvinceIX
                break;
            case "region-10":
                selected_data = response.custmerPerProvinceX
                break;
            case "region-11":
                selected_data = response.custmerPerProvinceXI
                break;
            case "region-12":
                selected_data = response.custmerPerProvinceXII
                break;
            case "region-13":
                selected_data = response.custmerPerProvinceXIII
                break;
            case "barm":
                selected_data = response.custmerPerProvinceBARMM
                break;
        }
        // Remove old data
        constprovincesChart.data.labels = [];
        constprovincesChart.data.datasets.forEach((dataset) => {
            dataset.data = [];
        });

        //convert data into usable chartjs labels
        x = 0
        while (selected_data[x] != null) {
            var dataA = selected_data[x].label;
            var dataB = selected_data[x].data;
            var arrayZ = [{
                backgroundColor: getRandomColor(),
                data: {
                    [dataA]: parseInt(dataB)
                },
                label: dataA
            }]
            for (var i = 0; i < arrayZ.length; i++) {
                provinceData.push(arrayZ[i]);
            }
            x++
        }

        constprovincesChart.data.datasets = provinceData;
        constprovincesChart.config.data.labels = [];
        constprovincesChart.update();
        provinceData = [];

        // for transactionStatusChart / Transaction Status
        x = 0
        var TSChart1 = response.forTransactionStatusChart;

        var data1 = TSChart1.map(item => item.data);

        transactionStatusChart.config.data = {
            labels: ["Paid", "Cancelled", "Pending"],
            datasets: [{
                data: data1,
                backgroundColor: [
                    'rgba(0, 215, 132, 0.2)', //green
                    'rgba(241, 37, 150, 0.2)', //yellow
                    'rgba(229, 247, 48, 0.2)', //red


                ],
                borderColor: [
                    'rgba(0, 215, 132, 0.93)', //green
                    'rgba(241, 37, 150, 0.8)', //yellow
                    'rgba(229, 247, 48, 0.8)', //red


                ],
                borderWidth: 2
            }],
        }
        transactionStatusChart.update();

        //paymendtMethodChart
        x = 0
        var TSChart2 = response.forPaymendtMethodChart;

        var data2 = TSChart2.map(item => item.data);

        paymendtMethodChart.config.data = {
            labels: ["Over the Counter", "Online Payment", "Cheque"],
            datasets: [{
                data: data2,
                backgroundColor: ['rgba(0, 21, 215, 0.2)',
                    'rgba(0, 215, 132, 0.2)',
                    'rgba(118, 0, 186, 0.2)',
                ],
                borderColor: ['rgba(0, 21, 215, 0.93)',
                    'rgba(0, 215, 132, 1)',
                    'rgba(118, 0, 186, 0.93)',
                ],
                borderWidth: 2
            }],
        }
        paymendtMethodChart.update();

        //transactionTypeChart
        x = 0
        var TSChart3 = response.forTransactionTypeChart;

        var data3 = TSChart3.map(item => item.data);

        transactionTypeChart.config.data = {
            labels: ["Technical Services", "NLIMS", "ULIMS"],
            datasets: [{
                data: data3,
                backgroundColor: ['rgba(186, 0, 0, 0.2)',
                    'rgba(250, 154, 37, 0.2)',
                    'rgba(37, 202, 247, 0.2)',
                ],
                borderColor: ['rgba(186, 0, 0, 0.93)',
                    'rgba(250, 154, 37, 0.81)',
                    'rgba(37, 202, 247, 0.81)',
                ],
                borderWidth: 2
            }],
        }
        transactionTypeChart.update();

        //customerTypeChart
        x = 0
        var TSChart4 = response.forCustomerTypeChart;

        var data4 = TSChart4.map(item => item.data);

        customerTypeChart.config.data = {
            labels: ["Student", "Individual", "Private", "Government", "Internal", "Academe", "Not Applicable", ],
            datasets: [{
                data: data4,
                backgroundColor: ['rgba(247, 37, 149, 0.2)',
                    'rgba(166, 37, 247, 0.2)',
                    'rgba(255, 155, 22, 0.2)',
                    'rgba(255, 213, 22, 0.2)',
                    'rgba(49, 255, 22, 0.2)',
                    'rgba(73, 0, 242, 0.2)',
                    'rgba(0, 220, 242, 0.2)'

                ],
                borderColor: ['rgba(247, 37, 149, 0.81)',
                    'rgba(166, 37, 247, 0.83)',
                    'rgba(255, 155, 22, 0.83)',
                    'rgba(255, 213, 22, 0.83)',
                    'rgba(49, 255, 22, 0.83)',
                    'rgba(73, 0, 242, 0.83)',
                    'rgba(0, 220, 242, 0.83)'
                ],
                borderWidth: 2
            }],
        }
        customerTypeChart.update();

        //myChart
        // myChart.config.data.datasets[2].data[0] = response.forMyChart[0].data;
        // myChart.config.data.datasets[3].data[0] = response.forMyChart[1].data;
        // myChart.update();

        let fDate = new Date(document.getElementById('startDate').value);
        let tDate = new Date(document.getElementById('endDate').value);

        const timeDifference = tDate.getTime() - fDate.getTime();
        const numberOfDays = Math.floor(timeDifference / (1000 * 3600 * 24)) + 1;
        const digi = response.forMyChartAvgTransaction[0].data
        const avgThis = Math.ceil(digi / numberOfDays);
        console.log(`Math.ceil( AVG: ${response.forMyChartAvgTransaction[0].data} / ${numberOfDays} = ${avgThis} )`); // mema lang to di yan actual formula

        document.getElementById('dailyTrans').innerHTML = digi;
        document.getElementById('avgTrans').innerHTML = avgThis;
        let number = parseInt(response.forMyChart[0].data)
        let fixedNumber = Math.round(number * 100) / 100;
        document.getElementById('dailyIncome').innerHTML = fixedNumber.toLocaleString("en-US");
    }
</script>


<script>
    function downloadPDF() {

        document.getElementById('sending-email-message').style.display = 'block';

        const transactionChart = document.getElementById('transactionChart');
        const salesChart = document.getElementById('salesChart');
        const myChart = document.getElementById('myChart');
        const provincesChart = document.getElementById('Provinces');
        const transactionStatusChart = document.getElementById('transactionStatus'); // New chart element
        const paymentChart = document.getElementById('paymendtMethod'); // New chart element
        const transactionTypeChart = document.getElementById('transactionType'); // New chart element
        const customerTypeChart = document.getElementById('customerType'); // New chart element


        const options = {
            quality: 5,
            width: 800,
            height: 600
        };

        domtoimage.toPng(transactionChart, options)
            .then(function(transactionChartImg) {
                domtoimage.toPng(salesChart, options)
                    .then(function(salesChartImg) {
                        domtoimage.toPng(provincesChart, options)
                            .then(function(provincesChartImg) {
                                domtoimage.toPng(transactionStatusChart, options)
                                    .then(function(transactionStatusChartImg) {
                                        domtoimage.toPng(transactionTypeChart, options)
                                            .then(function(transactionTypeChartImg) {
                                                domtoimage.toPng(paymentChart, options)
                                                    .then(function(paymentChartImg) {
                                                        domtoimage.toPng(customerTypeChart, options)
                                                            .then(function(customerTypeChartImg) {
                                                                const pdf = new jsPDF();

                                                                pdf.setFontSize(12);
                                                                pdf.setFont('helvetica', 'bold');
                                                                pdf.setTextColor(0, 122, 204);
                                                                pdf.text('Transaction Report', 40, 25);
                                                                pdf.text('Income Report', 40, 115);
                                                                pdf.text('Total Customer Per Province', 40, 215);

                                                                pdf.setFont('helvetica', 'bold');
                                                                pdf.setTextColor(0, 41, 102);
                                                                pdf.setFontSize(14);
                                                                pdf.text('Visualight-National Metrology', 75, 10);

                                                                pdf.addImage(transactionChartImg, 'PNG', 40, 30, 130, 70, undefined, 'FAST');
                                                                pdf.addImage(salesChartImg, 'PNG', 40, 123, 130, 70, undefined, 'FAST');
                                                                pdf.addImage(provincesChartImg, 'PNG', 40, 220, 130, 70, undefined, 'FAST');

                                                                pdf.addPage();

                                                                pdf.setFontSize(12);
                                                                pdf.setFont('helvetica', 'bold');
                                                                pdf.setTextColor(0, 122, 204);
                                                                pdf.text('Transaction Status', 40, 18);

                                                                pdf.addImage(transactionStatusChartImg, 'PNG', 60, 25, 110, 70, undefined, 'FAST');

                                                                pdf.text('Payment Method', 40, 110);

                                                                pdf.addImage(paymentChartImg, 'JPEG', 60, 115, 110, 70, undefined, 'FAST');


                                                                pdf.text('Transaction Type', 40, 205);

                                                                pdf.addImage(transactionTypeChartImg, 'PNG', 60, 215, 110, 70, undefined, 'FAST');

                                                                pdf.addPage();

                                                                pdf.setFontSize(12);
                                                                pdf.setFont('helvetica', 'bold');
                                                                pdf.setTextColor(0, 122, 204);
                                                                pdf.text('Customer Type', 40, 18);

                                                                pdf.addImage(customerTypeChartImg, 'PNG', 60, 25, 110, 70, undefined, 'FAST');



                                                                pdf.save('Visualight-National-Metrology.pdf');
                                                            });
                                                    });

                                            });
                                    });
                            });
                    });
            })
            .catch(function(error) {
                console.error('Error generating PDF:', error);
            });
        setTimeout(function() {
            document.getElementById('sending-email-message').style.display = 'none';
        }, 5000);

    }
</script>