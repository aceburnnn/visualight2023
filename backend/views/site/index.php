<?php

use yii\helpers\Url;

$this->title = '';

$this->registerJsFile('https://code.jquery.com/jquery-3.6.0.min.js', ['position' => \yii\web\View::POS_HEAD]);

$currentUrl = Yii::$app->controller->id;
$currentIndex = Url::to(['']);

?>

<style>
    @font-face {
        font-family: 'Poppins';
        src: url('<?= Yii::$app->request->baseUrl ?>/fonts/Poppins-Light.ttf') format('truetype'),
            url('<?= Yii::$app->request->baseUrl ?>/fonts/Poppins-Light.woff') format('woff');

    }

    /* Default styles */
    .chart-container {
        top: 20px;
        bottom: 15px;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.15);
        /* Updated box-shadow */
    }

    .average {
        position: absolute;
        top: 80px;
        right: 95px;
        text-align: center;
        width: 30%;
        display: inline-block;
    }

    .aveTransactionDiv,
    .aveSalesDiv {
        background-color: #B526C2;
        color: white;
        width: 20rem;
        height: 12rem;
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
        font-size: 1.5rem;
        font-family: Poppins;
    }

    .number {
        margin: 0;
        font-family: Poppins;
        font-size: 4rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    #myChart {
        /* css sa radial */
        position: absolute;
        left: 100px;
        top: 35px;
    }

    .asOne {
        justify-content: space-between;
        width: 40%;
        right: 40%;
        left: 60%;
    }

    #chart_type {
        width: 200px;
    }



    @media (max-width: 600px) {
        .average {
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
            right: 45%;
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
        width: 45%;
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

    #dailyTrans {
        font-size: 3.375rem;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: .5rem;
    }

    #valueIncrease {
        font-size: 1.5rem;
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

    .navigation-and-download {
        justify-content: space-between;
        align-items: center;
    }

    .navigation {
        
    }


    /* graph div */
    .graph {
        width: 100%;
        text-align: center;
        display: wrap;


    }


    .chart-container {
        margin: .62rem;
        padding: 3em;
        border-radius: .93rem;
        background-color: white;
        display: inline-block;
        height: 35rem;
        width: 100%;

    }



    .graph2 {
        width: 100%;
        text-align: center;
        display: wrap;
        background-color: white;
        box-shadow: -4px 4px 8px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.15);
        z-index: 0;

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

    .division-content {
        width: 48%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: darkgray;
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
    ->groupBy(['division', 'transaction_date'])
    ->orderBy(['transaction_date' => SORT_DESC])
    ->all();

// Fetch transaction data from the database (depends on how many transaction in same date and same div)
$transactionData = $query->select(['division', 'transaction_date', 'COUNT(*) as transaction_count'])
    ->from('transaction')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->groupBy(['division', 'transaction_date'])
    ->orderBy(['transaction_date' => SORT_DESC])
    ->all();

$TransactionperDiv = [
    'labels' => [],
    'datasets' => [],
];


$lotMapping = [
    "1" => "National Metrology Division",
    "2" => "Standards and Testing Division",
];

foreach ($transactionData as &$item) {
    if (isset($item['division']) && isset($lotMapping[$item['division']])) {
        $item['division'] = $lotMapping[$item['division']];
    }
}

foreach ($salesData as &$item) {
    if (isset($item['division']) && isset($lotMapping[$item['division']])) {
        $item['division'] = $lotMapping[$item['division']];
    }
}

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

$addressData = $query->select(['address', 'COUNT(*) as customer_count'])
    ->from('customer')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->groupBy(['address'])
    ->orderBy(['customer_count' => SORT_DESC])
    ->all();

$provinces = [
    'labels' => [],
    'datasets' => [],
];

foreach ($addressData as $customeraddress) {
    $province = $customeraddress['address'];
    $customerCount = $customeraddress['customer_count'];

    // Check if the province is not already in labels
    if (!in_array($province, $provinces['labels'])) {
        $provinces['labels'][] = $province;
    }

    // Add the customer count directly to the datasets array
    $provinces['datasets'][] = $customerCount;
}

//address from transaction table
$addressDatatransaction = (new \yii\db\Query())
    ->select(['customer.address', 'COUNT(*) as transaction_count'])
    ->from('transaction')
    ->join('INNER JOIN', 'customer', 'transaction.customer_id = customer.id')
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

$addressDataincome = (new \yii\db\Query())
    ->select(['customer.address', 'SUM(amount) as total_amount'])
    ->from('transaction')
    ->join('INNER JOIN', 'customer', 'transaction.customer_id = customer.id')
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





$customerTypeData = $query->select(['customer_type', 'COUNT(*) as customer_count'])
    ->from('customer')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->groupBy(['customer_type'])
    ->orderBy(['customer_count' => SORT_DESC])
    ->all();
$customerType = [];
$customerscounts = [];

$customerType_name = [
    "1" => "Student",
    "2" => "Individual",
    "3" => "Private",
    "4" => "Government",
    "5" => "Internal",
    "6" => "Academe",
    "7" => "Not Applicable",
];


foreach ($customerTypeData as $type) {
    if (isset($type['customer_type']) && isset($customerType_name[$type['customer_type']])) {
        $type['customer_type'] = $customerType_name[$type['customer_type']];
    }

    $customerType[] = $type['customer_type'];
    $customerscounts[] = $type['customer_count'];
}

// customer type from table transaction
$customerTypeDatatransaction = (new \yii\db\Query())
    ->select(['customer.customer_type', 'COUNT(*) as transaction_count'])
    ->from('transaction')
    ->join('INNER JOIN', 'customer', 'transaction.customer_id = customer.id')
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
    // Add your additional conditions if needed
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


//Transaction Type queries
$transactionTypeData = $query->select(['transaction_type', 'COUNT(*) as customer_count'])
    ->from('transaction')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
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

//income from transaction type
$transactionTypeincomeData = $query->select(['transaction_type', 'SUM(amount) as total_amount'])
    ->from('transaction')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
    ->groupBy(['transaction_type'])
    ->orderBy(['total_amount' => SORT_DESC])
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


$customerTypeDatapertransaction = (new \yii\db\Query())
    ->select([
        'ct.type as customer_type',
        'tt.type as transaction_type',
        'COUNT(*) as transaction_count',
        'SUM(t.amount) as total_amount',
        'ts.status as transaction_status',
        't.transaction_date',
        'pm.method as payment_method',
        'c.address',
        'd.division'
    ])
    ->from('transaction t')
    ->join('INNER JOIN', 'customer c', 't.customer_id = c.id')
    ->join('INNER JOIN', 'customer_type ct', 'c.customer_type = ct.id')
    ->join('INNER JOIN', 'transaction_type tt', 't.transaction_type = tt.id')
    ->join('INNER JOIN', 'transaction_status ts', 't.transaction_status = ts.id')
    ->join('INNER JOIN', 'payment_method pm', 't.payment_method = pm.id')
    ->join('INNER JOIN', 'division d', 't.division= d.id')
    ->groupBy(['ct.type', 'tt.type', 'ts.status', 't.transaction_date', 'pm.method', 'c.address', 'd.division'])
    ->orderBy(['transaction_count' => SORT_DESC])
    ->all();

$ctpt = [];
$ctct = [0];
$ctamt = [0];
$ctstatus = [''];
$cttd = [''];
$ctpm = [''];
$ctaddress = [];
$ctdivision = [];

foreach ($customerTypeDatapertransaction as $type) {
    $ctpt[] = $type['customer_type'];
    $ctct[] = $type['transaction_count'];
    $ctamt[] = $type['total_amount'];
    $ctstatus[] = $type['transaction_status'];
    $cttd[] = $type['transaction_date'];
    $ctpm[] = $type['payment_method'];
    $ctaddress[] = $type['address'];
    $ctdivision[] = $type['division'];
}


$TransactionYear = (new \yii\db\Query())
    ->select(['YEAR(t.transaction_date) as year'])
    ->distinct()
    ->from('transaction t')
    ->orderBy(['year' => SORT_ASC])
    ->all();

$distinctYears = array_column($TransactionYear, 'year');




$transactionStatusData = $query->select(['transaction_status', 'COUNT(*) as customer_count'])
    ->from('transaction')
    // ->where(['between', 'transaction_date', $fromDate, $toDate])
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



$PaymentMethodData = $query->select(['payment_method', 'COUNT(*) as customer_count'])
    ->from('transaction')
    ->where(['transaction_status' => ['1']])
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


// Prepare $SalesperDiv array (null pa to)
$SalesperDiv = [
    'labels' => [],
    'datasets' => [],
];



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

$transactionPerday = (new Query())
    ->select('transaction_date, COUNT(*) as transaction_count')
    ->from('transaction')
    ->where(['transaction_status' => '1'])
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
    ->where(['transaction_status' => '1'])
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
    'Standards and Testing Division' => [
        'backgroundColor' => '#7209b7',
        'borderWidth' => 2,
    ],
];

//dito yung pag lalagay nung naka set na color
foreach ($SalesperDiv['datasets'] as &$dataset) {
    $divisionName = $dataset['label'];
    $dataset['backgroundColor'] = isset($divisionColors[$divisionName]['backgroundColor']) ? $divisionColors[$divisionName]['backgroundColor'] : '#EFF5FF'; // Default background color if division not found
    $dataset['borderColor'] = isset($divisionColors[$divisionName]['borderColor']) ? $divisionColors[$divisionName]['borderColor'] : '#0362BA'; // Default border color if division not found
    // $dataset['borderWidth'] = isset($divisionColors[$divisionName]['borderWidth']) ? $divisionColors[$divisionName]['borderWidth'] : '#0362BA';
}

foreach ($TransactionperDiv['datasets'] as &$dataset) {
    $divisionName = $dataset['label'];
    $dataset['backgroundColor'] = isset($divisionColors[$divisionName]['backgroundColor']) ? $divisionColors[$divisionName]['backgroundColor'] : '#EFF5FF'; // Default background color if division not found
    $dataset['borderColor'] = isset($divisionColors[$divisionName]['borderColor']) ? $divisionColors[$divisionName]['borderColor'] : '#0362BA'; // Default border color if division not found
    // $dataset['borderWidth'] = isset($divisionColors[$divisionName]['borderWidth']) ? $divisionColors[$divisionName]['borderWidth'] : '#0362BA';
}


//Dito yung para sa Total ng Daily Transaction (tinatype ko pa yung date kasi di ako marunong nung rekta connected sa calendar HAHAHAH)
date_default_timezone_set('Asia/Manila');
//Metrology transaction
//dito banda kukunin yung number of transaction tapos kung anong date
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
//same scenario sa taas



//S&T transaction
$todaySandTtrans = (new Query())
    ->select('COUNT(*)')
    ->from('transaction')
    ->where([
        'division' => '2',
        'transaction_date' => date('Y-m-d')
    ])
    ->scalar();

$lastSandTtrans = (new Query())
    ->select('COUNT(*)')
    ->from('transaction')
    ->where([
        'division' => '2',
        'transaction_date' => date('Y-m-d', strtotime('-1 day'))
    ])
    ->scalar();

if ($todaySandTtrans == 0) {
    $SandTdailytransincrease = 0;
} else {

    $SandTdailytransincrease = (($todaySandTtrans - $lastSandTtrans) / $todaySandTtrans) * 100;
    $SandTdailytransincrease = number_format($SandTdailytransincrease);
    if ($SandTdailytransincrease > 1) {
        $SandTdailytransincrease = '+' . $SandTdailytransincrease . '%';
    } else {
        $SandTdailytransincrease = $SandTdailytransincrease . '%';
    }
}

Yii::$app->set('db', [ //revert default connection 
    'class' => \yii\db\Connection::class,
    'dsn' => 'mysql:host=localhost;dbname=visualight2user',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
]);

$currentDate = new \DateTime();
$targetStd = Yii::$app->db->createCommand('
SELECT quarter_1, quarter_2, quarter_3, quarter_4
FROM stdtarget_transaction
WHERE date = :year
', [':year' => $currentDate->format('Y')])->queryOne();

$targetNmd = Yii::$app->db->createCommand('
SELECT quarter_1, quarter_2, quarter_3, quarter_4
FROM nmdtarget_transaction
WHERE date = :year
', [':year' => $currentDate->format('Y')])->queryOne();

$targetTransaction = [
    (float)($targetStd['quarter_1'] ?? 0) + (float)($targetNmd['quarter_1'] ?? 0),
    (float)($targetStd['quarter_2'] ?? 0) + (float)($targetNmd['quarter_2'] ?? 0),
    (float)($targetStd['quarter_3'] ?? 0) + (float)($targetNmd['quarter_3'] ?? 0),
    (float)($targetStd['quarter_4'] ?? 0) + (float)($targetNmd['quarter_4'] ?? 0),
];

$targeiStd = Yii::$app->db->createCommand('
SELECT quarter_1, quarter_2, quarter_3, quarter_4
FROM stdtarget_income
WHERE date = :year
', [':year' => $currentDate->format('Y')])->queryOne();

$targeiNmd = Yii::$app->db->createCommand('
SELECT quarter_1, quarter_2, quarter_3, quarter_4
FROM nmdtarget_income
WHERE date = :year
', [':year' => $currentDate->format('Y')])->queryOne();

$targetIncome = [
    (float)($targeiStd['quarter_1'] ?? 0) + (float)($targeiNmd['quarter_1'] ?? 0),
    (float)($targeiStd['quarter_2'] ?? 0) + (float)($targeiNmd['quarter_2'] ?? 0),
    (float)($targeiStd['quarter_3'] ?? 0) + (float)($targeiNmd['quarter_3'] ?? 0),
    (float)($targeiStd['quarter_4'] ?? 0) + (float)($targeiNmd['quarter_4'] ?? 0),
];

?>
<?php \yii\widgets\Pjax::begin(); ?>
<div class="DailyTransaction">
    <p>Total Transactions Daily</p>
    <!-- <p id="totalTransactionsTitle">Total Transactions Daily</p> -->

    <div class="deptransaction">
        <p>National Metrology</p>
        <div class="grid">
            <img src="/images/Pressure Gauge.png" alt="icon1">
            <p id="dailyTrans"><?= $todaymettrans ?></p>
            <p id="valueIncrease"><?= $metdailytransincrease ?></p>
        </div>
    </div>
    <div class="deptransaction" style="background-color:#0073e6;">
        <p>Standards and Testing</p>
        <div class="grid">
            <img src="/images/Pass Fail.png" alt="icon2">
            <p id="dailyTrans"><?= $todaySandTtrans ?></p>
            <p id="valueIncrease"><?= $SandTdailytransincrease ?></p>
        </div>
    </div>
</div>

<script>
    // Get the current date
    const currentDate1 = new Date();

    // Format the date as "Month Day, Year"
    const formattedDate = currentDate1.toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    });

    // Get the element with the ID "totalTransactionsTitle"
    const titleElement = document.getElementById('totalTransactionsTitle');

    // Update the HTML content to include the formatted date
    titleElement.innerHTML += `: ${formattedDate}`;
</script>

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
                    <select id="date_type" class="dropdown-content" onchange="dateChange()">
                        <option value="Days">Days</option>
                        <option value="Months">Months</option>
                        <option value="Years">Years</option>
                    </select>
                </form>
            </div>

            <div class="navigation-and-download">
                <div class="print_pdf">
                    <Button class="print_pdf_label" onclick="downloadPDF()">Chart Download</Button>
                </div>

                <div class="navigation" style ="margin-right:360px; margin-left:-20px; z-index:1000;">
                    <label for="navigationDropdown">Navigate to:</label>
                    <select id="navigationDropdown" onchange="navigateToSection()" >
                        <option value="totaltransaction">Total Transaction Report</option>
                        <option value="totalsales">Total Income Report</option>
                        <option value="transactionChart">Transaction Per Division</option>
                        <option value="salesChart">Income per Division</option>
                        <option value="avgSales">Average Income</option>
                        <option value="Provinces">Provinces</option>
                        <option value="transaction">Transaction Types</option>
                        <!-- Add more options based on the IDs of your other sections -->
                    </select>
                </div>
            </div>
            <script>
                function navigateToSection() {
                    var dropdown = document.getElementById("navigationDropdown");
                    var selectedOption = dropdown.options[dropdown.selectedIndex].value;

                    // Scroll to the selected section
                    var selectedSection = document.getElementById(selectedOption);
                    selectedSection.scrollIntoView({
                        behavior: "smooth"
                    });
                }
            </script>
        </div>
    </div>
    <div class="containers">
        <div class="datePicker">
            <label>From: </label>
            <input type="date" id="startDate" class="datePicker_label" onchange="dateFilter(); updateProvince()"> <!-- look for updateProvince(response) -->
            <label>&nbsp;&nbsp;&nbsp;&nbsp;To:</label>
            <input type="date" id="endDate" class="datePicker_label" onchange="dateFilter(); updateProvince()">
        </div>
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
            form.style.width = "78%";
            form.style.height = "21%";
            form.style.zIndex = "1000";
            form.style.background = "white";
            form.style.boxShadow= "-4px 4px 8px rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.15)";
            form.style.left = "20%";
            toggleButton.style.display = "block";
            toggleButton.style.position = "fixed";
            toggleButton.style.top = "10px"; // Add "px" for the top value
            toggleButton.style.right = "20px"; // Adjust this value based on your design
            toggleButton.style.zIndex = "1500";
            

            if (toggleButton.innerHTML == "+") {
                toggleButton.innerHTML = "+";
            }

        } else {
            form.style.position = "static";
            form.style.top = "20px"; // Add "px" for the top value
            form.style.width = "100%";
            form.style.height = "17%";
            form.style.marginBottom = "-7%";
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- graph Div, holder of graphs -->
<div class="graph">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.9.179/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/brain.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <div class="chart-container" style= "z-index:0;">

        <p class="reportTitle" id="totaltransaction"> Total Transaction Report</p>
        <canvas id="totaltransactionChart"></canvas>
    </div>


    <div class="chart-container">
        <p class="reportTitle" id="totalsales"> Total Income Report </p>
        <canvas id="totalsalesChart"></canvas>
    </div>


    <div class="chart-container">
        <p class="reportTitle" id=" "> Transaction Per Division</p>
        <!-- <div class="containerBody"> -->
        <canvas id="transactionChart"></canvas>
        <!-- </div> -->
    </div>


    <div class="chart-container">
        <p class="reportTitle" id=" "> Income per Division</p>
        <canvas id="salesChart"></canvas>
    </div>

    <div class="chart-container" id="avgSales">
        <p class="reportTitle" id=" "></p>
        <div class="asOne">
            <canvas id="myChart"></canvas>
            <div class="average">
                <div class="aveTransactionDiv">
                    <p class="texty"> Average Transactions </p>
                    <p class="number" id="avgTransaction"> No Data</p>
                </div>
                <div class="aveSalesDiv">
                    <p class="texty"> Combined Average Income </p>
                    <p class="number" id="avgIncome"> No Data </p>
                </div>
            </div>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="close-popup">&times;</span>

            <h2 id="PopupHeader"></h2>

            <p style="color: black;">Color of speedometer will identify if the target is meet</p>

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
    <div class="popup" id="transactiondivisionpopup">
        <div class="popup-content">
            <span class="close" id="close-transaction-popup">&times;</span>

            <div class="division-content">
                <h2 id="MetrologyPopupHeader">National Metrology Division</h2>
                <div class="speedometer">
                    <p>Color of speedometer will identify if the target is meet</p>
                    <p><span style="color: red">Low </span>
                        <span style="color: orange">Moderate </span>
                        <span style="color: yellow">High </span>
                        <span style="color: green">Satisfaction </span>
                    </p>
                    <div class="speedometer-dial">
                        <div class="speedometer-reading" id="speedometer-reading"></div>
                        <div class="speedometer-arrow" id="speedometer-arrow"></div>
                    </div>
                </div>
                <p id="targetTransaction"></p>
                <p id="percentTransaction"></p>
                <p></p>


                <div style="text-align: left; margin: 0 auto; width: 80%;">
                    <p id="highest"> </p>
                    <p id="least"> </p>

                    <p id="mostTransactionType"> </p>
                    <p id="leastTransactionType"> </p>

                    <p id="mostCustomerType"> </p>
                    <p id="leastCustomerType"> </p>

                    <p id="mostCustomerProvince"> </p>
                    <p id="leastCustomerProvince"> </p>
                </div>
            </div>

            <div class="division-content">
                <h2 id="TestingPopupHeader">Standard and Testing Division</h2>
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

        const totaltransactionChart = document.getElementById("totaltransaction");
        const totalsalesChart = document.getElementById("totalsales");
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

        const startDateS = document.getElementById("startDate").value;
        const endDateS = document.getElementById("endDate").value;


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
                    const sumValue = transaction.datasets[0].data[index] + transaction.datasets[1].data[index];
                    switch (quarter) {
                        case 1:
                            quarter1.push(sumValue);
                            break;
                        case 2:
                            quarter2.push(sumValue);
                            break;
                        case 3:
                            quarter3.push(sumValue);
                            break;
                        case 4:
                            quarter4.push(sumValue);
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

            const startDateObj = new Date(startDateS);
            const endDateObj = new Date(endDateS);

            //sum of transaction per div (dataset)
            const sumTransactionDataset = {
                data: TransactionperDiv.labels.map((date, index) => {
                    let sum = 0;
                    TransactionperDiv.datasets.forEach(dataset => {
                        if (dataset.data[index] !== undefined) {
                            sum += dataset.data[index];
                        }
                    });
                    return sum;
                }),
                // Set labels to transaction_date values
                labels: TransactionperDiv.labels,
            };
            const maxIndex = sumTransactionDataset.data.indexOf(Math.max(...sumTransactionDataset.data));
            const highestTransactionCount = sumTransactionDataset.data[maxIndex];
            const dateofhighest = sumTransactionDataset.labels[maxIndex];
            const minIndex = sumTransactionDataset.data.indexOf(Math.min(...sumTransactionDataset.data));
            const leastTransactionCount = sumTransactionDataset.data[minIndex];
            const dateofleast = sumTransactionDataset.labels[minIndex];

            //Transaction type dataset
            const transactionTypeData = <?php
                                        $data = array();
                                        for ($i = 0; $i < count($transactionType); $i++) {
                                            $data[] = array('label' => $transactionType[$i], 'data' => $transactionTypecounts[$i]);
                                        }
                                        echo json_encode($data);
                                        ?>;

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

            const highestprovincedata = Math.max(...Province.data);
            const tolerance = 0.0001;
            const highestprovinces = [];
            Province.labels.forEach((label, index) => {
                if (Math.abs(Province.data[index] - highestprovincedata) < tolerance) {
                    highestprovinces.push(label);
                }
            });

            const leastprovincedata = Math.min(...Province.data);
            const leastprovinces = [];
            Province.labels.forEach((label, index) => {
                if (Math.abs(Province.data[index] - leastprovincedata) < tolerance) {
                    leastprovinces.push(label);
                }
            });

            //analyzation that should depends in the date filter or chart
            highest.innerHTML = "Highest transaction: <span style='color: red;'>" + dateofleast + "</span> with <span style='color: blue;'> " + highestTransactionCount + "</span> transaction/s.";
            least.innerHTML = "Least transaction: <span style='color: red;'>" + dateofhighest + "</span> with <span style='color: blue;'> " + leastTransactionCount + "</span> transaction/s.";
            mostTransactionType.innerHTML = "Highest transaction type:  <span style='color:green;'>" + maxtransactionType.join(', ') + "</span> having  <span style='color: blue;'> " + maxData + "</span> transaction/s.";
            leastTransactionType.innerHTML = "Least transaction type:   <span style='color:green;'>" + minTransactionType.join(', ') + "</span> having  <span style='color: blue;'> " + minData + "</span> transaction/s.";
            mostCustomerType.innerHTML = "Highest customer type(s): <span style='color:green;'>" + maxCustomerTypes.join(', ') + "</span> having <span style='color: blue;'> " + maxCustomerData + "</span> transaction/s.";
            leastCustomerType.innerHTML = "Least customer type: <span style='color:green;'>" + minCustomerType.join(', ') + "</span> having <span style='color: blue;'> " + minCustomerData + "</span> transaction/s.";
            mostCustomerProvince.innerHTML = "Provinces with the highest transactions: <span style='color:green;'>" + highestprovinces.join(', ') + "</span> having <span style='color: blue;'> " + highestprovincedata + "</span> transaction/s.";
            leastCustomerProvince.innerHTML = "Provinces with the least transactions: <span style='color:green;'>" + leastprovinces.join(', ') + "</span> having <span style='color: blue;'> " + leastprovincedata + "</span> transaction/s.";

        });
        closePopup.addEventListener("click", () => {
            // Close the pop-up when the close button is clicked
            popup.style.display = "none";
        });

        // sales popup
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
                    const sumValue = income.datasets[0].data[index] + income.datasets[1].data[index];
                    switch (quarter) {
                        case 1:
                            quarter1.push(sumValue);
                            break;
                        case 2:
                            quarter2.push(sumValue);
                            break;
                        case 3:
                            quarter3.push(sumValue);
                            break;
                        case 4:
                            quarter4.push(sumValue);
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


            //sum of transaction per div (dataset)
            const sumIncomeDataset = {
                data: SalesperDiv.labels.map((date, index) => {
                    let sum = 0;
                    SalesperDiv.datasets.forEach(dataset => {
                        if (dataset.data[index] !== undefined) {
                            sum += dataset.data[index];
                        }
                    });
                    return sum;
                }),
                // Set labels to transaction_date values
                labels: SalesperDiv.labels,
            };

            const maxIndex = sumIncomeDataset.data.indexOf(Math.max(...sumIncomeDataset.data));
            const highestIncomeCount = parseFloat(sumIncomeDataset.data[maxIndex]).toFixed(2);
            const dateofhighest = sumIncomeDataset.labels[maxIndex];
            const minIndex = sumIncomeDataset.data.indexOf(Math.min(...sumIncomeDataset.data));
            const leastIncomeCount = parseFloat(sumIncomeDataset.data[minIndex]).toFixed(2);
            const dateofleast = sumIncomeDataset.labels[minIndex];

            const transactionTypeData = <?php
                                        $data = array();
                                        for ($i = 0; $i < count($transactionTypeincome); $i++) {
                                            $data[] = array('label' => $transactionTypeincome[$i], 'data' => $transactionTypesumincome[$i]);
                                        }
                                        echo json_encode($data);
                                        ?>;

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

            const ProvinceIncome = {
                data: provinceincome.datasets,
                labels: provinceincome.labels,
            };

            const highestIncomeData = Math.max(...ProvinceIncome.data);
            const tolerance = 0.0001;
            const highestIncomeProvinces = [];
            ProvinceIncome.labels.forEach((label, index) => {
                if (Math.abs(ProvinceIncome.data[index] - highestIncomeData) < tolerance) {
                    highestIncomeProvinces.push(label);
                }
            });

            const leastIncomeData = Math.min(...ProvinceIncome.data);
            const leastIncomeProvinces = [];
            ProvinceIncome.labels.forEach((label, index) => {
                if (Math.abs(ProvinceIncome.data[index] - leastIncomeData) < tolerance) {
                    leastIncomeProvinces.push(label);
                }
            });




            highest.innerHTML = "Highest income: <span style='color: red;'>" + dateofleast + "</span> with <span style='color: blue;'> " + highestIncomeCount + "</span> total income.";
            least.innerHTML = "Least income: <span style='color: red;'>" + dateofhighest + "</span> with <span style='color: blue;'> " + leastIncomeCount + "</span> total income.";
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
            mostCustomerProvince.innerHTML = "Provinces with the highest income: <span style='color:green;'>" + highestIncomeProvinces.join(', ') + "</span> having <span style='color: blue;'> " + Number(highestIncomeData).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + "</span>.";
            leastCustomerProvince.innerHTML = "Provinces with the least income: <span style='color:green;'>" + leastIncomeProvinces.join(', ') + "</span> having <span style='color: blue;'> " + Number(leastIncomeData).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + "</span>.";

        });


        closePopup.addEventListener("click", () => {
            popup.style.display = "none";
        });
    </script>

    <script>
        // Reference datas
        const TransactionperDiv = <?php echo json_encode($TransactionperDiv); ?>;
        const SalesperDiv = <?php echo json_encode($SalesperDiv); ?>;

        // getting the sum of the transactions per day (from the data of $TransactionperDiv)
        const sumTransaction = TransactionperDiv.labels.map((label, index) => {
            let sum = 0;
            TransactionperDiv.datasets.forEach(dataset => {
                sum += dataset.data[index];
            });
            return sum;
        });

        // Create a new data set named sumTransactionDataset from what we got from sumTransaction
        const sumTransactionDataset = {
            label: 'Total Transaction',
            data: sumTransaction,

        };

        // getting the sum of the sales per day (from the data of $SalesperDiv)
        const sumSalesData = SalesperDiv.labels.map((label, index) => {
            let sum = 0;
            SalesperDiv.datasets.forEach(dataset => {
                sum += dataset.data[index];
            });
            return sum;
        });

        // Create a new data set named sumSalesDataset from what we got from sumSalesData
        const sumSalesDataset = {
            label: 'Total Income',
            data: sumSalesData,
        };

        //start of query from controller-----------------------

        //retrieve data from controller
        var totalTransaction = (<?= json_encode($queryAllDate) ?>);
        var chartLabels = (<?= json_encode($chartLabel) ?>);
        //preparing array to store the retrieved data
        var totalTransactionDataset = {
            datasets: [{
                backgroundColor: "#274690",
                label: 'Total Transaction',
                data: {}
            }, ],
        }

        console.log("before: ")
        console.log(totalTransaction)
        //populate json; create child inside of another child, function to translate data of division and total transaction from controller
        function totalTransactionTranslate() {
            var x = 0;
            while (totalTransaction[x] != null) {
                var samp = totalTransaction[x].labels;
                var sampo = parseInt(totalTransaction[x].datasets);
                if (totalTransaction[x].label == 'National Metrology Division') {
                    //do nothing
                } else if (totalTransaction[x].label == 'Standards and Testing Division') {
                    //do nothing 
                } else {
                    totalTransactionDataset.datasets[0].data[samp] = sampo;
                }
                x++
            }
            x = 0;
        }
        console.log("after: ")
        console.log(totalTransactionDataset)

        var global_label_day = []; //use this label as duh label for all chart that uses yyyy-mm-dd format label

        function labelTranslate() {
            var x = 0;
            while (chartLabels[x] != null) {
                var lab = chartLabels[x].labels;
                global_label_day[x] = lab;
                x++;
            }
            x = 0;
        }

        totalTransactionTranslate(); //call the function to translate data to chartjs readable format
        labelTranslate();

        const totaltransactionCtx = document.getElementById('totaltransactionChart').getContext('2d');
        // dashboard total transaction
        const totaltransactionChartB = new Chart(totaltransactionCtx, {
            type: 'bar', // This specifies a bar chart
            data: {
                labels: global_label_day,
                datasets: totalTransactionDataset.datasets,
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        },
                        grid: {
                            display: false,
                        }
                    },
                    x: {
                        ticks: {
                            autoSkip: false,
                        },
                        grid: {
                            display: false,
                        }
                    },
                },
            },
        });

        var total_Income = (<?= json_encode($queryTotalSale) ?>);

        var totalSum = {
            datasets: [{
                backgroundColor: "#fccb06",
                borderColor: "#fccb06",
                label: 'Total Income',
                data: {}
            }]
        }

        function income_load() {
            var x = 0;
            while (total_Income[x] != null) {
                var samp = total_Income[x].labels;
                var sampo = parseInt(total_Income[x].datasets);
                if (total_Income[x].label == 'National Metrology Division') {
                    //do nuthin
                } else if (total_Income[x].label == 'Standards and Testing Division') {
                    //do nuthin
                } else {
                    totalSum.datasets[0].data[samp] = sampo;
                }
                x++
            }
            x = 0;
        }

        income_load();

           // barPosition plugin block
        //    const barPositions1 = {
        //         id: 'barPositions1',
        //         beforeDatasetsDraw: (chart, args, pluginOptions) => {
        //             const { ctx, data, chartArea: { top, bottom, left, right, width, height }, scales: { x, y } } = chart;

        //             // Calculate the width for each dataset based on the total number of datasets.
        //             // This assumes that the labels array length is equal to the number of x-axis categories.
        //             const barWidth = width / data.labels.length;

        //             // Loop through each dataset.
        //             data.datasets.forEach((dataset, datasetIndex) => {
        //             // Get the meta for the current dataset.
        //             const datasetMeta = chart.getDatasetMeta(datasetIndex);

        //             // Loop through each datapoint in the current dataset.
        //             datasetMeta.data.forEach((datapoint, index) => {
        //                 // Adjust the x position of the datapoint.
        //                 // This centers the bar within the allocated space for each x-axis category.
        //                 datapoint.x = left + (barWidth * (index + 0.5));
        //                 datapoint.x += (barWidth / data.datasets.length) * datasetIndex - (barWidth / 4);
        //             });
        //             });
        //         }
        //         };

        const totalsalesCtx = document.getElementById('totalsalesChart').getContext('2d');

        // dashboard total income
        const totalsalesChartB = new Chart(totalsalesCtx, {
            type: 'bar', // This specifies a bar chart
            data: {
                labels: global_label_day,
                datasets: totalSum.datasets,
            },
            //plugins: [barPositions1],
            options: {
                tension: 0.4,
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false,
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                        }
                    },
                },
                // plugins: {
                //     // Here's how you would add the plugin configuration directly to the options
                //     barPositions1: false // Assuming you want to set it to false initially
                // },
            },
            //plugins: [barPositions1],
        });



        //what this for bruh?
        //Creating a combined data using the sumTransactionDataset and sumSalesDataset (to be used/call in creating combined chart)
        const combinedData = {
            labels: TransactionperDiv.labels,
            datasets: [{
                    ...sumSalesDataset,
                    type: 'line', // Use line type
                    backgroundColor: '#ba2ee8',
                    borderColor: '#00d498',
                    yAxisID: 'lineY', // Assign the line chart to a specific y-axis
                    cubicInterpolationMode: 'monotone'


                },
                {
                    ...sumTransactionDataset,
                    borderColor: 'rgba(127, 207, 250)',
                    backgroundColor: 'rgba(127, 207, 250)',
                    type: 'bar',
                    borderWidth: 2,
                    yAxisID: 'y-axis-bar', // Assign the line chart to a specific y-axis

                },
            ]
        };

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

        const bgColor1 = {
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

        var tPerDivData = (<?= json_encode($queryAllDate) ?>); //retrieve data from controller
        var perDivData = { //prepare array for translated data
            datasets: [{
                    backgroundColor: "#06d6a0",
                    label: 'National Metrology Division',
                    data: {}
                },
                {
                    backgroundColor: "#0073e6",
                    label: 'Standards and Testing Division',
                    data: {}
                }
            ],
        }

        function perDivLoad() { //translate for chartjs 
            var x = 0;
            while (tPerDivData[x] != null) {
                var samp = tPerDivData[x].labels;
                var sampo = parseInt(tPerDivData[x].datasets);
                if (tPerDivData[x].label == 'National Metrology Division') {
                    perDivData.datasets[0].data[samp] = sampo;
                } else if (tPerDivData[x].label == 'Standards and Testing Division') {
                    perDivData.datasets[1].data[samp] = sampo;
                }
                x++
            }
            x = 0; //just in case while loop decided to be petty
        }
        perDivLoad(); //call the function to translate

        // dashboard transaction per division
        const transactionCtx = document.getElementById('transactionChart').getContext('2d');
        const transactionChartB = new Chart(transactionCtx, {
            type: 'bar',
            data: {
                labels: global_label_day,
                datasets: perDivData.datasets,
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        },
                        grid: {
                            display: false,
                        },
                    },
                    x: {
                        ticks: {
                            autoSkip: true,
                        },
                        grid: {
                            display: false,
                        },
                    },
                },
                plugins: {
                    bgColor: {
                        backgroundColor: 'white'
                    }
                },
            },
            plugins: [bgColor],
        });

        var soldPerDivs = { //prepare array for translated data
            datasets: [{
                    backgroundColor: "#06d6a0",
                    borderColor: "#06d6a0",
                    label: 'National Metrology Division',
                    data: {}
                },
                {
                    backgroundColor: "#0073e6",
                    borderColor: "#0073e6",
                    label: 'Standards and Testing Division',
                    data: {}
                }
            ]
        }

        function loadPerDivSales() { //translate for chartjs 
            var x = 0;
            while (total_Income[x] != null) {
                var samp = total_Income[x].labels;
                var sampo = parseInt(total_Income[x].datasets);
                if (total_Income[x].label == 'National Metrology Division') {
                    soldPerDivs.datasets[0].data[samp] = sampo;
                } else if (total_Income[x].label == 'Standards and Testing Division') {
                    soldPerDivs.datasets[1].data[samp] = sampo;
                }
                x++
            }
            x = 0; //just in case while loop decided to be petty
        }
        loadPerDivSales(); //call the function to translate


        const barPosition = {
            id: 'barPosition',
            beforeDatasetsDraw: (chart, args, pluginOptions) => {
                const { ctx, data, chartArea: { top, bottom, left, right, width, height }, scales: { x, y } } = chart;

                // Calculate the width for each dataset based on the total number of datasets.
                // This assumes that the labels array length is equal to the number of x-axis categories.
                // Adding "_unique" to the variable name to make it unique.
                const barWidth_unique = width / data.labels.length;

                // Loop through each dataset.
                data.datasets.forEach((dataset, datasetIndex) => {
                // Get the meta for the current dataset.
                const datasetMeta = chart.getDatasetMeta(datasetIndex);

                // Loop through each datapoint in the current dataset.
                datasetMeta.data.forEach((datapoint, index) => {
                    // Adjust the x position of the datapoint.
                    // This centers the bar within the allocated space for each x-axis category.
                    // Now using "barWidth_unique" to reflect the unique variable name.
                    datapoint.x = left + (barWidth_unique * (index + 0.5));
                    datapoint.x += (barWidth_unique / data.datasets.length) * datasetIndex - (barWidth_unique/4);
                });
                });
            }
            };


        //dashboard income per division
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: global_label_day,
                datasets: soldPerDivs.datasets,
            },
            options: {
                tension: 0.4,
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawOnChartArea: false,
                            display: false,
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                },
                plugins: {
                    bgColor: {
                        backgroundColor: 'white'
                    },
                    barPosition: false 
                },

            },
            plugins: [bgColor, barPosition],
        });

        function dateChange() {
            let dateTypeSelect = document.getElementById('date_type');
            let selectedValue = dateTypeSelect.value;

            if (selectedValue === 'Days') {

                // totalsalesChartB.config.type = "bar";
                // totalsalesChartB.update();

                salesChart.config.type = "line";
                salesChart.update();

                // totalsalesChartB.options.plugins.barPositions1 = false; // Or any other setting you wish to apply
                // totalsalesChartB.update(); 

                salesChart.options.plugins.barPosition = false; // Or any other setting you wish to apply
                salesChart.update(); 

            }    

            if (selectedValue === 'Months') {

                document.getElementById('startDate').setAttribute('type', 'month');
                document.getElementById('endDate').setAttribute('type', 'month');

                var monthLabelZ = (<?= json_encode($monthLabel) ?>);
                const dX = new Date();
                let yearX = dX.getFullYear();
                var listers = []; //for months

                function monthAssign() {
                    var x = 0;
                    while (monthLabelZ[x] != null) {
                        var lab = monthLabelZ[x].month;
                        listers[x] = lab;
                        x++;
                    }
                }
                monthAssign();

                // totalsalesChartB.config.type = "bar";
                // totalsalesChartB.update();

                salesChart.config.type = "line";
                salesChart.update();

                let janm = listers.slice(0, 1).toString().split("-");
                let janMonth = janm[1].toString();
                let currMonth = ("0" + (dX.getMonth() + 1)).slice(-2); //get current month

                document.getElementById('startDate').value = yearX + "-" + janMonth;
                document.getElementById('endDate').value = yearX + "-" + currMonth;

                // totalsalesChartB.options.plugins.barPositions1 = false; // Or any other setting you wish to apply
                // totalsalesChartB.update(); 
                
                salesChart.options.plugins.barPosition = false; // Or any other setting you wish to apply
                salesChart.update(); 

            } else if (selectedValue === 'Years') {

                var yearLabelZ = (<?= json_encode($yearLabel) ?>);
                const dX = new Date();
                let yearX = dX.getFullYear();
                var listers = []; //for years

                function yearAssign() {
                    var x = 0;
                    while (yearLabelZ[x] != null) {
                        var lab = yearLabelZ[x].year;
                        listers[x] = lab;
                        x++;
                    }
                }
                yearAssign();

                document.getElementById('startDate').setAttribute('type', 'number');
                document.getElementById('startDate').value = "2023";
                document.getElementById('endDate').setAttribute('type', 'number');
                document.getElementById('endDate').value = yearX;
    
                // totalsalesChartB.config.type = "bar";
                // totalsalesChartB.update();

                salesChart.config.type = "bar";
                salesChart.update();

                // totalsalesChartB.options.plugins.barPositions1 = true; // Or any other setting you wish to apply
                // totalsalesChartB.update(); 

                salesChart.options.plugins.barPosition = true; // Or any other setting you wish to apply
                salesChart.update(); 

            } else {

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


        // Calculate the average of each dataset
        const TransactionAverage = SalesperDiv.datasets.map(dataset => ({
            label: dataset.label,
            average: calculateAverage(dataset.data),
        }));

        // Find the maximum average value
        const maxAverage = Math.max(...TransactionAverage.map((average) => average.average));

        // Create a new dataset for each sales average
        const salesAverage = TransactionAverage.map((average, index) => {
            const datasetColors = ['rgba(0, 115, 199,1)', 'rgba(2, 165, 96,1)', 'rgba(242, 26, 156,1)']; // Array of specific colors
            const color = datasetColors[index % datasetColors.length]; // Assign color based on index

            return {
                label: `Average ${average.label}`,
                data: [average.average],
                borderWidth: 4, // previous:1
                circumference: (ctx) => ((ctx.dataset.data[0] / maxAverage) * 270),
                backgroundColor: color,
                borderColor: 'white', //borderColor: color (previous code)
            };
        });

        // Combine the existing datasets with the new datasets
        const allDatasets = [...TransactionAverage, ...salesAverage];

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
                    ctx.fillText('Average Income', width / 2.1, height / 10 + top);

                    // Count and display the numbers
                    let total1 = 0;
                    let total2 = 0;
                    data.datasets[2].data.forEach(value => {
                        total1 += value;
                    });
                    data.datasets[3].data.forEach(value => {
                        total2 += value;
                    });

                    ctx.fillStyle = 'rgb(0, 115, 230)';
                    ctx.fillText(`STD: ${parseInt(total1.toLocaleString(), 10).toLocaleString()}`, width / 2.1, height / 2 + top);
                    ctx.fillStyle = 'rgb(17, 163, 76)';
                    ctx.fillText(`NMD: ${parseInt(total2.toLocaleString(), 10).toLocaleString()}`, width / 2.1, height / 2 + top + 20);
                    ctx.restore();
                }
            }]
        };


        // Render the doughnut chart
        const myChart = new Chart(document.getElementById('myChart'), config);

        // Instantly assign Chart.js version
        const chartVersion = document.getElementById('chartVersion');

        var customerTypeData = <?php echo json_encode($customerTypeData); ?>;
        var paragraphElement = document.getElementById('customerTypeParagraph');
        //paragraphElement.textContent = 'Customer Type: ' + customerTypeData;
    </script>


    <!-- All about customer graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="customers_data">
        <div class="date_filter" style="text-align: left; padding-left: 8rem; padding-top: 0rem; padding-bottom: 2rem;">
            <div class="containers">
                <div class="date_dropdown" style="top: 20px;">
                    <label for="chart_type" class="chart_type_label">
                        <strong>Select Region: </strong></label>
                    <select name="chart_type" id="chart_type" class="dropdown-content" onchange="dateFilter()">
                        <!-- <option value="all-region">All Province</option> -->
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

                        <!-- <option value="horizontal_bar">Horizontal chart</option> -->
                    </select>
                </div>
            </div>
        </div>

        <div class="chart-container">
            <p class="reportTitle" id="Provincespopup">Total Customers per Province</p>
            <canvas id="Provinces" width="100%"></canvas>
        </div>
    </div>

</div>

<div class="popup" id="ProvinceopenPopup">
    <div class="popup-content" style="width: 50%; height:auto">
        <span class="close" id="ProvinceclosePopup">&times;</span>

        <h1 id="header"></h1>
        <h5>Paid Transactions</h5>

        <div style="text-align: left; margin: 0 auto; width: 80%;">
            <label for="transactionTypeDropdown">Top 5 Provinces</label>
            <select id="provinceDropdown">
            </select> <br><br>


            <div style="text-align: left; margin: 0 auto; width: 80%;">
                <h4 id="typeprovince"></h4>
                <p id="contentprovince"></p>

            </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const provincesPopup = document.getElementById("Provincespopup");
        const ProvinceopenPopup = document.getElementById("ProvinceopenPopup");
        const ProvinceclosePopup = document.getElementById("ProvinceclosePopup");
        const header = document.getElementById("header");
        const provinceDropdown = document.getElementById("provinceDropdown");
        const typeprovince = document.getElementById("typeprovince");
        const contentprovince = document.getElementById("contentprovince");


        const startDate = document.getElementById("startDate").value;
        const endDate = document.getElementById("endDate").value;

        const technicalServicesData = <?php echo json_encode($customerTypeDatapertransaction); ?>;
        const customerTypeData = technicalServicesData.filter(item =>
            item.transaction_date >= startDate &&
            item.transaction_date <= endDate &&
            item.transaction_status == "Paid"
        )
        const provinceTransactionCounts = {};
        customerTypeData.forEach(item => {
            const province = item.address;

            if (!provinceTransactionCounts[province]) {
                provinceTransactionCounts[province] = 0;
            }

            provinceTransactionCounts[province]++;
        });

        // Sort provinces based on transaction counts in descending order
        const sortedProvinces = Object.keys(provinceTransactionCounts).sort((a, b) =>
            provinceTransactionCounts[b] - provinceTransactionCounts[a]
        );

        // Get the top 5 provinces
        const topProvinces = sortedProvinces.slice(0, 5);

        provincesPopup.addEventListener("click", () => {
            provinceDropdown.innerHTML = '';
            topProvinces.forEach(function(province) {
                var option = document.createElement('option');
                option.value = province;
                option.text = province.charAt(0).toUpperCase() + province.slice(1);
                provinceDropdown.add(option);
            });

            header.innerText = 'Top 5 Provinces';
            provinceDropdown.value = topProvinces[0];
            provinceDropdown.dispatchEvent(new Event('change'));
            ProvinceopenPopup.style.display = "block";
        });

        provinceDropdown.addEventListener("change", function() {
            const selectedValue = this.options[this.selectedIndex].value;
            const formattedProvince = selectedValue.charAt(0).toUpperCase() + selectedValue.slice(1);

            typeprovince.innerText = '';
            contentprovince.innerText = '';

            function updateProvinceData(provinceName) {
                const province1data = customerTypeData.filter(item => item.address === formattedProvince);
                const province1datafiltered = province1data.reduce((result, item) => {
                    const existingTransactionTypeIndex = result.findIndex(entry => entry.transaction_type === item.transaction_type);

                    if (existingTransactionTypeIndex !== -1) {
                        const existingCustomerTypeIndex = result[existingTransactionTypeIndex].customer_types.findIndex(
                            customer => customer.customer_type === item.customer_type
                        );

                        if (existingCustomerTypeIndex !== -1) {
                            result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].transaction_count += Number(item.transaction_count);
                            result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].total_amount += Number(item.total_amount);
                        } else {
                            result[existingTransactionTypeIndex].customer_types.push({
                                customer_type: item.customer_type,
                                transaction_count: Number(item.transaction_count),
                                total_amount: Number(item.total_amount)
                            });
                        }
                    } else {
                        result.push({
                            transaction_type: item.transaction_type,
                            customer_types: [{
                                customer_type: item.customer_type,
                                transaction_count: Number(item.transaction_count),
                                total_amount: Number(item.total_amount)
                            }]
                        });
                    }

                    return result;
                }, []);

                // if null or empty dataset
                function handleNullDataset(dataset) {
                    if (!dataset || dataset.length === 0) {
                        return [{
                            transaction_type: ' ',
                            customer_types: [{
                                customer_type: ' ',
                                transaction_count: 0,
                                total_amount: 0
                            }]
                        }];
                    }
                    return dataset;
                }
                let province1Transactions = handleNullDataset(province1datafiltered);
                let sumOfAllProvince1TransactionCounts = 0;
                let sumOfAllProvince1TransactionAmounts = 0;
                province1Transactions.forEach(transaction => {
                    transaction.customer_types.forEach(customer => {
                        sumOfAllProvince1TransactionCounts += customer.transaction_count;
                        sumOfAllProvince1TransactionAmounts += customer.total_amount;
                    });
                });

                // table
                let tableHtml = '<table style="border-collapse: collapse; width: 100%;">';
                tableHtml += `
                <tr>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Customer Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Count</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Amount</th>
                </tr>`;

                // column/row each transaction type
                province1Transactions.forEach(transaction => {
                    let totalRowsForTransactionType = transaction.customer_types.length;
                    transaction.customer_types.forEach((customer, customerIndex) => {
                        tableHtml += '<tr style="border: 1px solid white;">';
                        if (customerIndex === 0) {
                            tableHtml += `<td rowspan="${totalRowsForTransactionType}" style="border: 1px solid white; padding: 8px;">${transaction.transaction_type}</td>`;
                        }
                        tableHtml += `
                        <td style="border: 1px solid white; padding: 8px;">${customer.customer_type}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.transaction_count}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.total_amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    </tr>`;
                    });
                });

                tableHtml += '</table>';
                typeprovince.innerHTML = "<span style='color: Red;'>" + formattedProvince + " <br>";
                contentprovince.innerHTML = "Total " + formattedProvince + " Transaction:  <span style='color: red;'>" + sumOfAllProvince1TransactionCounts + "</span> amounting of  <span style='color: red;'>" + Number(sumOfAllProvince1TransactionAmounts).toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }) +
                    "</span><br><br>" + tableHtml;

            }

            // Handling content update based on the selected province
            switch (selectedValue) {
                case topProvinces[0]:
                    updateProvinceData(selectedValue);
                    break;
                case topProvinces[1]:
                    updateProvinceData(selectedValue);
                    break;

                case topProvinces[2]:
                    updateProvinceData(selectedValue);
                    break;

                case topProvinces[3]:
                    updateProvinceData(selectedValue);
                    break;

                case topProvinces[4]:
                    updateProvinceData(selectedValue);
                    break;
            }
        });

        ProvinceclosePopup.addEventListener("click", () => {
            ProvinceopenPopup.style.display = "none";
        });
    });
</script>






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
    //look for updateProvince(response)
</script>

<!-- All about customer graphs -->
<div class="customers_data">
    <div class="date_filter" style="text-align: left; padding-left: 8rem; padding-top: 0rem; padding-bottom: 2rem;">
        <div class="containers">
            <div class="date_dropdown" style="top: 20px;">
                <label for="chart_type2" class="chart_type_label2">
                    <strong>Chart Filter: </strong></label>
                <select name="chart_type2" id="chart_type2" class="dropdown-content" onchange="changeChart()">
                    <option value="doughnut">Doughnut</option>
                    <option value="pie">Pie</option>
                    <option value="bar">Bar</option>

                    <!-- <option value="horizontal_bar">Horizontal chart</option> -->
                </select>
            </div>
        </div>
    </div>

    <div class="graph2" id="transaction" style="margin-top:20px">
        <div class="chart-container2">
            <p class="reportTitle" id="transactionStatuspopup">Transaction Status</p>
            <canvas id="transactionStatus"></canvas>
        </div>
        <div class="chart-container2">
            <p class="reportTitle" id="paymentMethodpopup">Payment Method</p>
            <canvas id="paymendtMethod"></canvas>
        </div>
    </div>
    <div class="graph2">
        <div class="chart-container2">
            <p class="reportTitle" id="transactionTypepoppup">Type of Transaction</p>
            <canvas id="transactionType"></canvas>
        </div>

        <div class="chart-container2">
            <p class="reportTitle" id="customerTypepoppup">Type of Customers</p>
            <canvas id="customerType"></canvas>
        </div>
    </div>


    <!-- Pop-up for transaction type -->
    <div class="popup" id="customerpopup">
        <div class="popup-content">
            <span class="close" id="close">&times;</span>

            <h2 id="header"></h2>

            <div style="text-align: left; margin: 0 auto; width: 80%;">
                <div id="transactionTypeDropdownContainer">
                    <label for="transactionTypeDropdown"></label>
                    <select id="transactionTypeDropdown">
                        <option value="ts">Technical Services</option>
                        <option value="nlims">National Laboratory Information Management System</option>
                        <option value="ulims">Unified Laboratory Information Management System</option>


                    </select> <br><br>
                </div>

                <div style="text-align: left; margin: 0 auto; width: 80%;">
                    <h4 id="type1"></h4>
                    <p id="hightype1"></p>

                </div>
            </div>
        </div>

    </div>
    <div class="popup" id="customerpopup2">
        <div class="popup-content">
            <span class="close" id="close2">&times;</span>

            <h2 id="header2"></h2>

            <div id="yearPickerContainer" style="margin-bottom: 20px;">
                <label for="yearPicker">Select Year:</label>
                <select id="yearPicker">
                    <?php foreach ($distinctYears as $year) : ?>
                        <option value="<?php echo htmlspecialchars($year); ?>">
                            <?php echo htmlspecialchars($year); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div style="text-align: left; margin: 0 auto; width: 80%;">
                <h4 id="type"></h4>
                <p id="hightype"></p>

            </div>
        </div>
    </div>

</div>

<?php \yii\widgets\Pjax::end(); ?>

<!-- popup script for customers -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Reference datas current
        const currentDate = new Date();
        const month = currentDate.getMonth();
        const year = currentDate.getFullYear();

        //for clickable reference
        const transactionStatuspopup = document.getElementById("transactionStatuspopup");
        const paymentMethodpopup = document.getElementById("paymentMethodpopup");
        const transactionTypepoppup = document.getElementById("transactionTypepoppup");
        const customerTypepoppup = document.getElementById("customerTypepoppup");
        const customerpopup = document.getElementById("customerpopup");
        const close = document.getElementById("close");
        const customerpopup2 = document.getElementById("customerpopup2");
        const close2 = document.getElementById("close2");


        const startDateS = document.getElementById("startDate").value;
        const endDateS = document.getElementById("endDate").value;

        const technicalServicesData = <?php echo json_encode($customerTypeDatapertransaction); ?>;
        const customerTypeData = technicalServicesData.filter(item =>
            item.transaction_date >= startDateS &&
            item.transaction_date <= endDateS
        );

        // Transaction status pop-up analyzation
        if (transactionStatuspopup) {
            transactionStatuspopup.addEventListener("click", () => {
                const dropdown = document.getElementById("transactionTypeDropdown");

                // Clear existing options and add new options: Paid, Pending, Cancelled
                dropdown.innerHTML = '';
                const options = ["Paid", "Pending", "Cancelled"];
                options.forEach(option => {
                    let opt = document.createElement('option');
                    opt.value = option.toLowerCase();
                    opt.innerHTML = option;
                    dropdown.appendChild(opt);
                });

                header.innerHTML = "Transaction Status <br>";

                // Initialize the dropdown value to 'paid' and dispatch the change event
                dropdown.value = 'paid';
                dropdown.dispatchEvent(new Event('change'));

                customerpopup.style.display = "block";
            });
        }

        // Handle the change event for the dropdown
        document.getElementById("transactionTypeDropdown").addEventListener("change", (event) => {
            const selectedTransactionType = event.target.value;

            switch (selectedTransactionType) {
                case "paid":
                    const paiddata = customerTypeData.filter(item => item.transaction_status === 'Paid');
                    const paiddatafiltered = paiddata.reduce((result, item) => {
                        const existingTransactionTypeIndex = result.findIndex(entry => entry.transaction_type === item.transaction_type);

                        if (existingTransactionTypeIndex !== -1) {
                            const existingCustomerTypeIndex = result[existingTransactionTypeIndex].customer_types.findIndex(
                                customer => customer.customer_type === item.customer_type
                            );

                            if (existingCustomerTypeIndex !== -1) {
                                result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].transaction_count += Number(
                                    item.transaction_count
                                );
                                result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].total_amount += Number(
                                    item.total_amount
                                );
                            } else {
                                result[existingTransactionTypeIndex].customer_types.push({
                                    customer_type: item.customer_type,
                                    transaction_count: Number(item.transaction_count),
                                    total_amount: Number(item.total_amount),
                                });
                            }
                        } else {
                            result.push({
                                transaction_type: item.transaction_type,
                                customer_types: [{
                                    customer_type: item.customer_type,
                                    transaction_count: Number(item.transaction_count),
                                    total_amount: Number(item.total_amount),
                                }, ],
                            });
                        }

                        return result;
                    }, []);

                    // Summing transaction_count for each transaction_type
                    const transactionTypeSum = paiddatafiltered.map(entry => ({
                        transaction_type: entry.transaction_type,
                        total_transaction_count: entry.customer_types.reduce((sum, customer) => sum + customer.transaction_count, 0),
                        total_transaction_income: entry.customer_types.reduce((sum, customer) => sum + customer.total_amount, 0),
                    }));
                    const customertypepaid = paiddatafiltered.map(item => item.customer_types.map(customer => customer.customer_type));
                    const totalAmountpaiddata = transactionTypeSum.map(item => item.total_transaction_income);
                    const transactionTypepaid = transactionTypeSum.map(item => item.transaction_type);
                    const customertypepaiddata = transactionTypeSum.map(item => item.total_transaction_count);

                    const customertransactiontypePaid = [];
                    for (let i = 0; i < customertypepaid.length; i++) {
                        customertransactiontypePaid.push({
                            label: customertypepaid[i],
                            data: customertypepaiddata[i],
                            totalAmount: totalAmountpaiddata[i],
                            transactionType: transactionTypepaid[i]
                        });
                    }

                    function handleNullDataset(dataset) {
                        if (!dataset || dataset.length === 0) {
                            return [{
                                label: 'no customer',
                                data: 0,
                                totalAmount: 0,
                                transactionType: 'no transaction'
                            }];
                        }
                        return dataset;
                    }

                    let paidTransactions = customertransactiontypePaid;
                    paidTransactions = handleNullDataset(paidTransactions);
                    const totalpaidTransaction = customertransactiontypePaid.reduce((sum, item) => sum + item.data, 0);
                    const totalpaidAmount = customertransactiontypePaid.reduce((sum, item) => sum + item.totalAmount, 0);
                    const highestPaidTransaction = paidTransactions.reduce((max, current) => (current.totalAmount > max.totalAmount) ? current : max, paidTransactions[0]);
                    const leastPaidTransaction = paidTransactions.reduce((min, current) => (current.totalAmount < min.totalAmount) ? current : min, paidTransactions[0]);
                    const highestlabelPaidransaction = paidTransactions.filter(obj => obj.totalAmount === highestPaidTransaction.totalAmount).map(obj => obj.label);
                    const leastlabelPaidTransaction = paidTransactions.filter(obj => obj.totalAmount === leastPaidTransaction.totalAmount).map(obj => obj.label);
                    const highestlabelPaidransactionTY = paidTransactions.filter(obj => obj.totalAmount === highestPaidTransaction.totalAmount).map(obj => obj.transactionType);
                    const leastlabelPaidTransactionTY = paidTransactions.filter(obj => obj.totalAmount === leastPaidTransaction.totalAmount).map(obj => obj.transactionType);

                    //get the highest & lowest customer type with paid transaction (customer, transaction, amount, transaction type)
                    type1.innerHTML = "<span style='color: green;'> Paid Transaction <br>";
                    hightype1.innerHTML = "Total of Paid transaction: <span style='color: red;'>" + totalpaidTransaction + "</span> with the amount of <span style='color: red;'>" + Number(totalpaidAmount).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) +
                        "</span><br><br><br>The highest paying transaction type: <span style='color: blue;'>" + highestlabelPaidransactionTY.join(' , ') + "</span> with total income of <span style='color: red;'>" + Number(highestPaidTransaction.totalAmount).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) +
                        "</span> for <span style='color: red;'>" + highestPaidTransaction.data + "</span> transactions from customers; <br> <br> Customers with highest paying transactions: <span style='color: blue;'> " + highestlabelPaidransaction.join(', ') +
                        "</span><br><br><br>The Least paying transaction type: <span style='color: blue;'>" + leastlabelPaidTransactionTY.join(' , ') + "</span> with total income of <span style='color: red;'>" + Number(leastPaidTransaction.totalAmount).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) +
                        "</span> for <span style='color: red;'>" + leastPaidTransaction.data + "</span> transactions from customers; <br> <br> Customers with least paying transactions: <span style='color: blue;'> " + leastlabelPaidTransaction.join(', ');
                    break;

                case "pending":
                    const pendingdata = customerTypeData.filter(item => item.transaction_status === 'Pending');

                    const pendingdatafiltered = pendingdata.reduce((result, item) => {
                        const existingTransactionTypeIndex = result.findIndex(entry => entry.transaction_type === item.transaction_type);

                        if (existingTransactionTypeIndex !== -1) {
                            const existingCustomerTypeIndex = result[existingTransactionTypeIndex].customer_types.findIndex(
                                customer => customer.customer_type === item.customer_type
                            );

                            if (existingCustomerTypeIndex !== -1) {
                                result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].transaction_count += Number(item.transaction_count);
                                result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].total_amount += Number(item.total_amount);
                            } else {
                                result[existingTransactionTypeIndex].customer_types.push({
                                    customer_type: item.customer_type,
                                    transaction_count: Number(item.transaction_count),
                                    total_amount: Number(item.total_amount)
                                });
                            }
                        } else {
                            result.push({
                                transaction_type: item.transaction_type,
                                customer_types: [{
                                    customer_type: item.customer_type,
                                    transaction_count: Number(item.transaction_count),
                                    total_amount: Number(item.total_amount)
                                }]
                            });
                        }

                        return result;
                    }, []);

                    // if null or empty dataset
                    function handleNullDataset(dataset) {
                        if (!dataset || dataset.length === 0) {
                            return [{
                                transaction_type: ' ',
                                customer_types: [{
                                    customer_type: ' ',
                                    transaction_count: 0,
                                    total_amount: 0
                                }]
                            }];
                        }
                        return dataset;
                    }

                    let pendingTransactions = handleNullDataset(pendingdatafiltered);
                    let sumOfAllPendingTransactionCounts = 0;
                    let sumOfAllPendingTransactionAmounts = 0;
                    pendingTransactions.forEach(transaction => {
                        transaction.customer_types.forEach(customer => {
                            sumOfAllPendingTransactionCounts += customer.transaction_count;
                            sumOfAllPendingTransactionAmounts += customer.total_amount;
                        });
                    });

                    // table
                    let tableHtml = '<table style="border-collapse: collapse; width: 100%;">';
                    tableHtml += `
                <tr>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Customer Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Count</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Amount</th>
                </tr>`;

                    // column/row each transaction type
                    pendingTransactions.forEach(transaction => {
                        let totalRowsForTransactionType = transaction.customer_types.length;
                        transaction.customer_types.forEach((customer, customerIndex) => {
                            tableHtml += '<tr style="border: 1px solid white;">';
                            if (customerIndex === 0) {
                                tableHtml += `<td rowspan="${totalRowsForTransactionType}" style="border: 1px solid white; padding: 8px;">${transaction.transaction_type}</td>`;
                            }
                            tableHtml += `
                        <td style="border: 1px solid white; padding: 8px;">${customer.customer_type}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.transaction_count}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.total_amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    </tr>`;
                        });
                    });

                    tableHtml += '</table>';
                    type1.innerHTML = "<span style='color: Yellow;'>Pending Transaction <br>";
                    hightype1.innerHTML = "Total Pending Transaction:  <span style='color: red;'>" + sumOfAllPendingTransactionCounts + "</span> amounting of  <span style='color: red;'>" + Number(sumOfAllPendingTransactionAmounts).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) +
                        "</span><br><br>" + tableHtml;

                    break;

                case "cancelled":
                    const cancelleddata = customerTypeData.filter(item => item.transaction_status === 'Cancelled');

                    const cancelleddatafiltered = cancelleddata.reduce((result, item) => {
                        const existingTransactionTypeIndex = result.findIndex(entry => entry.transaction_type === item.transaction_type);

                        if (existingTransactionTypeIndex !== -1) {
                            const existingCustomerTypeIndex = result[existingTransactionTypeIndex].customer_types.findIndex(
                                customer => customer.customer_type === item.customer_type
                            );

                            if (existingCustomerTypeIndex !== -1) {
                                result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].transaction_count += Number(item.transaction_count);
                                result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].total_amount += Number(item.total_amount);
                            } else {
                                result[existingTransactionTypeIndex].customer_types.push({
                                    customer_type: item.customer_type,
                                    transaction_count: Number(item.transaction_count),
                                    total_amount: Number(item.total_amount)
                                });
                            }
                        } else {
                            result.push({
                                transaction_type: item.transaction_type,
                                customer_types: [{
                                    customer_type: item.customer_type,
                                    transaction_count: Number(item.transaction_count),
                                    total_amount: Number(item.total_amount)
                                }]
                            });
                        }

                        return result;
                    }, []);

                    // if null or empty dataset
                    function handleNullDataset(dataset) {
                        if (!dataset || dataset.length === 0) {
                            return [{
                                transaction_type: ' ',
                                customer_types: [{
                                    customer_type: ' ',
                                    transaction_count: 0,
                                    total_amount: 0
                                }]
                            }];
                        }
                        return dataset;
                    }

                    let cancelledTransactions = handleNullDataset(cancelleddatafiltered);
                    let sumOfAllPendingTransactionCountsCancelled = 0;
                    let sumOfAllPendingTransactionAmountsCancelled = 0;
                    cancelledTransactions.forEach(transaction => {
                        transaction.customer_types.forEach(customer => {
                            sumOfAllPendingTransactionCountsCancelled += customer.transaction_count;
                            sumOfAllPendingTransactionAmountsCancelled += customer.total_amount;
                        });
                    });

                    // table
                    let tableHtmlcancelled = '<table style="border-collapse: collapse; width: 100%;">';
                    tableHtmlcancelled += `
                <tr>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Customer Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Count</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Amount</th>
                </tr>`;

                    // column/row each transaction type
                    cancelledTransactions.forEach(transaction => {
                        let totalRowsForTransactionType = transaction.customer_types.length;
                        transaction.customer_types.forEach((customer, customerIndex) => {
                            tableHtmlcancelled += '<tr style="border: 1px solid white;">';
                            if (customerIndex === 0) {
                                tableHtmlcancelled += `<td rowspan="${totalRowsForTransactionType}" style="border: 1px solid white; padding: 8px;">${transaction.transaction_type}</td>`;
                            }
                            tableHtmlcancelled += `
                        <td style="border: 1px solid white; padding: 8px;">${customer.customer_type}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.transaction_count}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.total_amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    </tr>`;
                        });
                    });

                    tableHtmlcancelled += '</table>';
                    type1.innerHTML = "<span style='color: Yellow;'>Cancelled Transaction <br>";
                    hightype1.innerHTML = "Total Cancelled Transaction:  <span style='color: red;'>" + sumOfAllPendingTransactionCountsCancelled + "</span> amounting of  <span style='color: red;'>" + Number(sumOfAllPendingTransactionAmountsCancelled).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) +
                        "</span><br><br>" + tableHtmlcancelled;


                    break;
            }

            customerpopup.style.display = "block";
        });


        // Transaction status pop-up analyzation
        if (paymentMethodpopup) {
            paymentMethodpopup.addEventListener("click", () => {
                const dropdown = document.getElementById("transactionTypeDropdown");
                dropdown.innerHTML = '';
                const paymenMethod = [{
                        value: "otc",
                        text: "Ove the Counter"
                    },
                    {
                        value: "op",
                        text: "Online Payment"
                    },
                    {
                        value: "cheque",
                        text: "Cheque"
                    }
                ];
                paymenMethod.forEach(option => {
                    let opt = document.createElement('option');
                    opt.value = option.value;
                    opt.innerHTML = option.text;
                    dropdown.appendChild(opt);
                });
                header.innerHTML = "Transaction Type <br>";


                // Initialize the dropdown value to 'paid' and dispatch the change event
                dropdown.value = 'otc';
                dropdown.dispatchEvent(new Event('change'));

                customerpopup.style.display = "block";


                // Handle the change event for the dropdown
                document.getElementById("transactionTypeDropdown").addEventListener("change", (event) => {
                    const selectedTransactionType = event.target.value;

                    switch (selectedTransactionType) {
                        case "otc":
                            const otcdata = customerTypeData.filter(item => item.transaction_status === 'Paid' && item.payment_method === 'Over the Counter');

                            const otcdatafiltered = otcdata.reduce((result, item) => {
                                const existingTransactionTypeIndex = result.findIndex(entry => entry.transaction_type === item.transaction_type);

                                if (existingTransactionTypeIndex !== -1) {
                                    const existingCustomerTypeIndex = result[existingTransactionTypeIndex].customer_types.findIndex(
                                        customer => customer.customer_type === item.customer_type
                                    );

                                    if (existingCustomerTypeIndex !== -1) {
                                        result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].transaction_count += Number(item.transaction_count);
                                        result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].total_amount += Number(item.total_amount);
                                    } else {
                                        result[existingTransactionTypeIndex].customer_types.push({
                                            customer_type: item.customer_type,
                                            transaction_count: Number(item.transaction_count),
                                            total_amount: Number(item.total_amount)
                                        });
                                    }
                                } else {
                                    result.push({
                                        transaction_type: item.transaction_type,
                                        customer_types: [{
                                            customer_type: item.customer_type,
                                            transaction_count: Number(item.transaction_count),
                                            total_amount: Number(item.total_amount)
                                        }]
                                    });
                                }

                                return result;
                            }, []);

                            // if null or empty dataset
                            function handleNullDataset(dataset) {
                                if (!dataset || dataset.length === 0) {
                                    return [{
                                        transaction_type: ' ',
                                        customer_types: [{
                                            customer_type: ' ',
                                            transaction_count: 0,
                                            total_amount: 0
                                        }]
                                    }];
                                }
                                return dataset;
                            }

                            let otcTransactions = handleNullDataset(otcdatafiltered);
                            let sumOfAllOTCTransactionCounts = 0;
                            let sumOfAllOTCTransactionAmounts = 0;
                            otcTransactions.forEach(transaction => {
                                transaction.customer_types.forEach(customer => {
                                    sumOfAllOTCTransactionCounts += customer.transaction_count;
                                    sumOfAllOTCTransactionAmounts += customer.total_amount;
                                });
                            });

                            // table
                            let tableHtml = '<table style="border-collapse: collapse; width: 100%;">';
                            tableHtml += `
                <tr>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Customer Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Count</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Amount</th>
                </tr>`;

                            // column/row each transaction type
                            otcTransactions.forEach(transaction => {
                                let totalRowsForTransactionType = transaction.customer_types.length;
                                transaction.customer_types.forEach((customer, customerIndex) => {
                                    tableHtml += '<tr style="border: 1px solid white;">';
                                    if (customerIndex === 0) {
                                        tableHtml += `<td rowspan="${totalRowsForTransactionType}" style="border: 1px solid white; padding: 8px;">${transaction.transaction_type}</td>`;
                                    }
                                    tableHtml += `
                        <td style="border: 1px solid white; padding: 8px;">${customer.customer_type}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.transaction_count}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.total_amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    </tr>`;
                                });
                            });

                            tableHtml += '</table>';
                            type1.innerHTML = "<span style='color: blue;'>Over the Counter Payment<br>";
                            hightype1.innerHTML = "Total Over the Counter Payment:  <span style='color: red;'>" + sumOfAllOTCTransactionCounts + "</span> amounting of  <span style='color: red;'>" + Number(sumOfAllOTCTransactionAmounts).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) +
                                "</span><br><br>" + tableHtml;

                            break;
                        case "op":
                            const opdata = customerTypeData.filter(item => item.transaction_status === 'Paid' && item.payment_method === 'Online Payment');

                            const opdatafiltered = opdata.reduce((result, item) => {
                                const existingTransactionTypeIndex = result.findIndex(entry => entry.transaction_type === item.transaction_type);

                                if (existingTransactionTypeIndex !== -1) {
                                    const existingCustomerTypeIndex = result[existingTransactionTypeIndex].customer_types.findIndex(
                                        customer => customer.customer_type === item.customer_type
                                    );

                                    if (existingCustomerTypeIndex !== -1) {
                                        result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].transaction_count += Number(item.transaction_count);
                                        result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].total_amount += Number(item.total_amount);
                                    } else {
                                        result[existingTransactionTypeIndex].customer_types.push({
                                            customer_type: item.customer_type,
                                            transaction_count: Number(item.transaction_count),
                                            total_amount: Number(item.total_amount)
                                        });
                                    }
                                } else {
                                    result.push({
                                        transaction_type: item.transaction_type,
                                        customer_types: [{
                                            customer_type: item.customer_type,
                                            transaction_count: Number(item.transaction_count),
                                            total_amount: Number(item.total_amount)
                                        }]
                                    });
                                }

                                return result;
                            }, []);

                            // if null or empty dataset
                            function handleNullDataset(dataset) {
                                if (!dataset || dataset.length === 0) {
                                    return [{
                                        transaction_type: ' ',
                                        customer_types: [{
                                            customer_type: ' ',
                                            transaction_count: 0,
                                            total_amount: 0
                                        }]
                                    }];
                                }
                                return dataset;
                            }

                            let opTransactions = handleNullDataset(opdatafiltered);
                            let sumOfAllOPTransactionCounts = 0;
                            let sumOfAllOPTransactionAmounts = 0;
                            opTransactions.forEach(transaction => {
                                transaction.customer_types.forEach(customer => {
                                    sumOfAllOPTransactionCounts += customer.transaction_count;
                                    sumOfAllOPTransactionAmounts += customer.total_amount;
                                });
                            });

                            // table
                            let tableHtmlOP = '<table style="border-collapse: collapse; width: 100%;">';
                            tableHtmlOP += `
                <tr>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Customer Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Count</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Amount</th>
                </tr>`;

                            // column/row each transaction type
                            opTransactions.forEach(transaction => {
                                let totalRowsForTransactionType = transaction.customer_types.length;
                                transaction.customer_types.forEach((customer, customerIndex) => {
                                    tableHtmlOP += '<tr style="border: 1px solid white;">';
                                    if (customerIndex === 0) {
                                        tableHtmlOP += `<td rowspan="${totalRowsForTransactionType}" style="border: 1px solid white; padding: 8px;">${transaction.transaction_type}</td>`;
                                    }
                                    tableHtmlOP += `
                        <td style="border: 1px solid white; padding: 8px;">${customer.customer_type}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.transaction_count}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.total_amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    </tr>`;
                                });
                            });

                            tableHtmlOP += '</table>';
                            type1.innerHTML = "<span style='color: Blue;'>Online Payment<br>";
                            hightype1.innerHTML = "Total Online Payment:  <span style='color: red;'>" + sumOfAllOPTransactionCounts + "</span> amounting of  <span style='color: red;'>" + Number(sumOfAllOPTransactionAmounts).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) +
                                "</span><br><br>" + tableHtmlOP;

                            break;
                        case "cheque":
                            const chequedata = customerTypeData.filter(item => item.transaction_status === 'Paid' && item.payment_method === 'Cheque');

                            const chequedatafiltered = chequedata.reduce((result, item) => {
                                const existingTransactionTypeIndex = result.findIndex(entry => entry.transaction_type === item.transaction_type);

                                if (existingTransactionTypeIndex !== -1) {
                                    const existingCustomerTypeIndex = result[existingTransactionTypeIndex].customer_types.findIndex(
                                        customer => customer.customer_type === item.customer_type
                                    );

                                    if (existingCustomerTypeIndex !== -1) {
                                        result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].transaction_count += Number(item.transaction_count);
                                        result[existingTransactionTypeIndex].customer_types[existingCustomerTypeIndex].total_amount += Number(item.total_amount);
                                    } else {
                                        result[existingTransactionTypeIndex].customer_types.push({
                                            customer_type: item.customer_type,
                                            transaction_count: Number(item.transaction_count),
                                            total_amount: Number(item.total_amount)
                                        });
                                    }
                                } else {
                                    result.push({
                                        transaction_type: item.transaction_type,
                                        customer_types: [{
                                            customer_type: item.customer_type,
                                            transaction_count: Number(item.transaction_count),
                                            total_amount: Number(item.total_amount)
                                        }]
                                    });
                                }

                                return result;
                            }, []);

                            // if null or empty dataset
                            function handleNullDataset(dataset) {
                                if (!dataset || dataset.length === 0) {
                                    return [{
                                        transaction_type: ' ',
                                        customer_types: [{
                                            customer_type: ' ',
                                            transaction_count: 0,
                                            total_amount: 0
                                        }]
                                    }];
                                }
                                return dataset;
                            }

                            let chequeTransactions = handleNullDataset(chequedatafiltered);
                            let sumOfAllChequeTransactionCounts = 0;
                            let sumOfAllChequeTransactionAmounts = 0;
                            chequeTransactions.forEach(transaction => {
                                transaction.customer_types.forEach(customer => {
                                    sumOfAllChequeTransactionCounts += customer.transaction_count;
                                    sumOfAllChequeTransactionAmounts += customer.total_amount;
                                });
                            });

                            // table
                            let tableHtmlCheque = '<table style="border-collapse: collapse; width: 100%;">';
                            tableHtmlCheque += `
                <tr>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Customer Type</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Transaction Count</th>
                    <th style="border: 1px solid white; padding: 8px; text-align: left;">Amount</th>
                </tr>`;

                            // column/row each transaction type
                            chequeTransactions.forEach(transaction => {
                                let totalRowsForTransactionType = transaction.customer_types.length;
                                transaction.customer_types.forEach((customer, customerIndex) => {
                                    tableHtmlCheque += '<tr style="border: 1px solid white;">';
                                    if (customerIndex === 0) {
                                        tableHtmlCheque += `<td rowspan="${totalRowsForTransactionType}" style="border: 1px solid white; padding: 8px;">${transaction.transaction_type}</td>`;
                                    }
                                    tableHtmlCheque += `
                        <td style="border: 1px solid white; padding: 8px;">${customer.customer_type}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.transaction_count}</td>
                        <td style="border: 1px solid white; padding: 8px;">${customer.total_amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                    </tr>`;
                                });
                            });

                            tableHtmlCheque += '</table>';
                            type1.innerHTML = "<span style='color: Blue;'>Cheque Payment<br>";
                            hightype1.innerHTML = "Total Cheque Payment:  <span style='color: red;'>" + sumOfAllChequeTransactionCounts + "</span> amounting of  <span style='color: red;'>" + Number(sumOfAllChequeTransactionAmounts).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) +
                                "</span><br><br>" + tableHtmlCheque;

                            break;
                            break;
                    }
                });
                transactionTypeDropdown.value = 'otc';
                transactionTypeDropdown.dispatchEvent(new Event('change'));

                customerpopup.style.display = "block";
            });
        }

        //Transaction Type pop-up analyzation
        if (transactionTypepoppup) {
            transactionTypepoppup.addEventListener("click", () => {
                const dropdown = document.getElementById("transactionTypeDropdown");
                dropdown.innerHTML = '';
                const originalOptions = [{
                        value: "ts",
                        text: "Technical Services"
                    },
                    {
                        value: "nlims",
                        text: "National Laboratory Information Management System"
                    },
                    {
                        value: "ulims",
                        text: "Unified Laboratory Information Management System"
                    }
                ];
                originalOptions.forEach(option => {
                    let opt = document.createElement('option');
                    opt.value = option.value;
                    opt.innerHTML = option.text;
                    dropdown.appendChild(opt);
                });
                header.innerHTML = "Transaction Type <br>";

                transactionTypeDropdown.addEventListener("change", () => {
                    const selectedTransactionType = transactionTypeDropdown.value;

                    switch (selectedTransactionType) {
                        case "ts":
                            //for Technical services transaction type
                            const technicalServicesData = customerTypeData.filter(item => item.transaction_type === 'Technical Services');
                            const technicalServicesDatafiltered = technicalServicesData.reduce((result, item) => {
                                const existingItem = result.find(entry => entry.customer_type === item.customer_type && entry.transaction_status === item.transaction_status);

                                if (existingItem) {
                                    existingItem.transaction_count += Number(item.transaction_count);
                                    existingItem.total_amount += Number(item.total_amount);
                                } else {
                                    result.push({
                                        customer_type: item.customer_type,
                                        transaction_status: item.transaction_status,
                                        transaction_count: Number(item.transaction_count),
                                        total_amount: Number(item.total_amount)
                                    });
                                }

                                return result;
                            }, []);

                            const customertypeTS = technicalServicesDatafiltered.map(item => item.customer_type);
                            const customertypeTSdata = technicalServicesDatafiltered.map(item => item.transaction_count);
                            const totalAmountTSdata = technicalServicesDatafiltered.map(item => item.total_amount);
                            const transactionStatusTS = technicalServicesDatafiltered.map(item => item.transaction_status);


                            const customertransactiontype = [];

                            for (let i = 0; i < customertypeTS.length; i++) {
                                customertransactiontype.push({
                                    label: customertypeTS[i],
                                    data: customertypeTSdata[i],
                                    totalAmount: totalAmountTSdata[i],
                                    transactionStatus: transactionStatusTS[i]
                                });
                            }

                            function handleNullDataset(dataset) {
                                if (!dataset || dataset.length === 0) {
                                    return [{
                                        label: 'no customer',
                                        data: 0,
                                        totalAmount: 0,
                                        transactionStatus: 'no transaction'
                                    }];
                                }
                                return dataset;
                            }
                            //paid ts
                            let paidTransactionsTS = customertransactiontype.filter(item => item.transactionStatus === 'Paid');
                            paidTransactionsTS = handleNullDataset(paidTransactionsTS);
                            const highestPaidTransactionTS = paidTransactionsTS.reduce((max, current) => (current.data > max.data) ? current : max, paidTransactionsTS[0]);
                            const leastPaidTransactionTS = paidTransactionsTS.reduce((min, current) => (current.data < min.data) ? current : min, paidTransactionsTS[0]);
                            const highestlabelPaidransactionTS = paidTransactionsTS.filter(obj => obj.data === highestPaidTransactionTS.data).map(obj => obj.label);
                            const leastlabelPaidTransactionTS = paidTransactionsTS.filter(obj => obj.data === leastPaidTransactionTS.data).map(obj => obj.label);
                            //cancelled ts
                            let cancelledTransactionsTS = customertransactiontype.filter(item => item.transactionStatus === 'Cancelled');
                            cancelledTransactionsTS = handleNullDataset(cancelledTransactionsTS);
                            const highestcancelledTransactionTS = cancelledTransactionsTS.reduce((max, current) => (current.data > max.data) ? current : max, cancelledTransactionsTS[0]);
                            const leastcancelledTransactionTS = cancelledTransactionsTS.reduce((min, current) => (current.data < min.data) ? current : min, cancelledTransactionsTS[0]);
                            const highestlabelcancelledTransactionTS = cancelledTransactionsTS.filter(obj => obj.data === highestcancelledTransactionTS.data).map(obj => obj.label);
                            const leastlabelcancelledTransactionTS = cancelledTransactionsTS.filter(obj => obj.data === leastcancelledTransactionTS.data).map(obj => obj.label);
                            //Pending TS
                            let pendingTransactionsTS = customertransactiontype.filter(item => item.transactionStatus === 'Pending');
                            pendingTransactionsTS = handleNullDataset(pendingTransactionsTS);
                            const highestPendingTransactionTS = pendingTransactionsTS.reduce((max, current) => (current.data > max.data) ? current : max, pendingTransactionsTS[0]);
                            const leastPendingTransactionTS = pendingTransactionsTS.reduce((min, current) => (current.data < min.data) ? current : min, pendingTransactionsTS[0]);
                            const highestlabelPendingTransactionTS = pendingTransactionsTS.filter(obj => obj.data === highestPendingTransactionTS.data).map(obj => obj.label);
                            const leastlabelPendingTransactionTS = pendingTransactionsTS.filter(obj => obj.data === leastPendingTransactionTS.data).map(obj => obj.label);


                            // // Use the found data

                            type1.innerHTML = "<span style='color: red;'>Technical Services <br>";
                            hightype1.innerHTML = "&nbsp; &nbsp; + Highest Paid Transaction:<span style='color: green;'> " + highestlabelPaidransactionTS.join(' ,') + "</span> with <span style='color: red;'>" + highestPaidTransactionTS.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(highestPaidTransactionTS.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Least paid Transaction:<span style='color: green;'> " + leastlabelPaidTransactionTS.join(' ,') + "</span> with <span style='color: red;'>" + leastPaidTransactionTS.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(leastPaidTransactionTS.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Highest pending Transaction:<span style='color: green;'> " + highestlabelPendingTransactionTS.join(' ,') + "</span> with <span style='color: red;'>" + highestPendingTransactionTS.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(highestPendingTransactionTS.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Least pending Transaction:<span style='color: green;'> " + leastlabelPendingTransactionTS.join(' ,') + "</span> with <span style='color: red;'>" + leastPendingTransactionTS.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(leastPendingTransactionTS.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Highest cancelled Transaction:<span style='color: green;'> " + highestlabelcancelledTransactionTS.join(' ,') + "</span> with <span style='color: red;'>" + highestcancelledTransactionTS.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(highestcancelledTransactionTS.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Least cancelled Transaction:<span style='color: green;'> " + leastlabelcancelledTransactionTS.join(' ,') + "</span> with <span style='color: red;'>" + leastcancelledTransactionTS.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(leastcancelledTransactionTS.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + ".";

                            break;
                            //National Laboratory Information Management System

                        case "nlims":

                            const nlimsData = customerTypeData.filter(item =>
                                item.transaction_type === 'National Laboratory Information Management System');
                            const nlimsDatafiltered = nlimsData.reduce((result, item) => {
                                const existingItem = result.find(entry => entry.customer_type === item.customer_type && entry.transaction_status === item.transaction_status);

                                if (existingItem) {
                                    existingItem.transaction_count += Number(item.transaction_count);
                                    existingItem.total_amount += Number(item.total_amount);
                                } else {
                                    result.push({
                                        customer_type: item.customer_type,
                                        transaction_status: item.transaction_status,
                                        transaction_count: Number(item.transaction_count),
                                        total_amount: Number(item.total_amount)
                                    });
                                }

                                return result;
                            }, []);

                            const customertypenlims = nlimsDatafiltered.map(item => item.customer_type);
                            const customertypenlimsdata = nlimsDatafiltered.map(item => item.transaction_count);
                            const totalAmountnlimsdata = nlimsDatafiltered.map(item => item.total_amount);
                            const transactionStatusnlims = nlimsDatafiltered.map(item => item.transaction_status);


                            const customertransactiontypenlims = [];

                            for (let i = 0; i < customertypenlims.length; i++) {
                                customertransactiontypenlims.push({
                                    label: customertypenlims[i],
                                    data: customertypenlimsdata[i],
                                    totalAmount: totalAmountnlimsdata[i],
                                    transactionStatus: transactionStatusnlims[i]
                                });
                            }

                            function handleNullDataset(dataset) {
                                if (!dataset || dataset.length === 0) {
                                    return [{
                                        label: 'no customer',
                                        data: 0,
                                        totalAmount: 0,
                                        transactionStatus: 'no transaction'
                                    }];
                                }
                                return dataset;
                            }
                            //paid nlims
                            let paidTransactionsnlims = customertransactiontypenlims.filter(item => item.transactionStatus === 'Paid');
                            paidTransactionsnlims = handleNullDataset(paidTransactionsnlims);

                            // Continue with further processing
                            const highestPaidTransactionnlims = paidTransactionsnlims.reduce((max, current) => (current.data > max.data) ? current : max, paidTransactionsnlims[0]);
                            const leastPaidTransactionnlims = paidTransactionsnlims.reduce((min, current) => (current.data < min.data) ? current : min, paidTransactionsnlims[0]);
                            const highestlabelPaidransactionnlims = paidTransactionsnlims.filter(obj => obj.data === highestPaidTransactionnlims.data).map(obj => obj.label);
                            const leastlabelPaidTransactionnlims = paidTransactionsnlims.filter(obj => obj.data === leastPaidTransactionnlims.data).map(obj => obj.label);

                            //cancelled nlims
                            let cancelledTransactionsnlims = customertransactiontypenlims.filter(item => item.transactionStatus === 'Cancelled');
                            cancelledTransactionsnlims = handleNullDataset(cancelledTransactionsnlims);
                            const highestcancelledTransactionnlims = cancelledTransactionsnlims.reduce((max, current) => (current.data > max.data) ? current : max, cancelledTransactionsnlims[0]);
                            const leastcancelledTransactionnlims = cancelledTransactionsnlims.reduce((min, current) => (current.data < min.data) ? current : min, cancelledTransactionsnlims[0]);
                            const highestlabelcancelledTransactionnlims = cancelledTransactionsnlims.filter(obj => obj.data === highestcancelledTransactionnlims.data).map(obj => obj.label);
                            const leastlabelcancelledTransactionnlims = cancelledTransactionsnlims.filter(obj => obj.data === leastcancelledTransactionnlims.data).map(obj => obj.label);
                            //Pending nlims
                            let pendingTransactionsnlims = customertransactiontypenlims.filter(item => item.transactionStatus === 'Pending');
                            pendingTransactionsnlims = handleNullDataset(pendingTransactionsnlims);
                            const highestPendingTransactionnlims = pendingTransactionsnlims.reduce((max, current) => (current.data > max.data) ? current : max, pendingTransactionsnlims[0]);
                            const leastPendingTransactionnlims = pendingTransactionsnlims.reduce((min, current) => (current.data < min.data) ? current : min, pendingTransactionsnlims[0]);
                            const highestlabelPendingTransactionnlims = pendingTransactionsnlims.filter(obj => obj.data === highestPendingTransactionnlims.data).map(obj => obj.label);
                            const leastlabelPendingTransactionnlims = pendingTransactionsnlims.filter(obj => obj.data === leastPendingTransactionnlims.data).map(obj => obj.label);


                            // // Use the found data

                            type1.innerHTML = "<span style='color: orange;'>National Laboratory Information Management System <br>";
                            hightype1.innerHTML = "&nbsp; &nbsp; + Highest Paid Transaction:<span style='color: green;'> " + highestlabelPaidransactionnlims.join(' ,') + "</span> with <span style='color: red;'>" + highestPaidTransactionnlims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(highestPaidTransactionnlims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Least paid Transaction:<span style='color: green;'> " + leastlabelPaidTransactionnlims.join(' ,') + "</span> with <span style='color: red;'>" + leastPaidTransactionnlims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(leastPaidTransactionnlims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Highest pending Transaction:<span style='color: green;'> " + highestlabelPendingTransactionnlims.join(' ,') + "</span> with <span style='color: red;'>" + highestPendingTransactionnlims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(highestPendingTransactionnlims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Least pending Transaction:<span style='color: green;'> " + leastlabelPendingTransactionnlims.join(' ,') + "</span> with <span style='color: red;'>" + leastPendingTransactionnlims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(leastPendingTransactionnlims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Highest cancelled Transaction:<span style='color: green;'> " + highestlabelcancelledTransactionnlims.join(' ,') + "</span> with <span style='color: red;'>" + highestcancelledTransactionnlims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(highestcancelledTransactionnlims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Least cancelled Transaction:<span style='color: green;'> " + leastlabelcancelledTransactionnlims.join(' ,') + "</span> with <span style='color: red;'>" + leastcancelledTransactionnlims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(leastcancelledTransactionnlims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + ".";

                            break;

                        case "ulims":

                            //for ulims transaction type
                            const ulimsData = customerTypeData.filter(item =>
                                item.transaction_type === 'Unified Laboratory Information Management System');
                            const ulimsDatafiltered = ulimsData.reduce((result, item) => {
                                const existingItem = result.find(entry => entry.customer_type === item.customer_type && entry.transaction_status === item.transaction_status);

                                if (existingItem) {
                                    existingItem.transaction_count += Number(item.transaction_count);
                                    existingItem.total_amount += Number(item.total_amount);
                                } else {
                                    result.push({
                                        customer_type: item.customer_type,
                                        transaction_status: item.transaction_status,
                                        transaction_count: Number(item.transaction_count),
                                        total_amount: Number(item.total_amount)
                                    });
                                }

                                return result;
                            }, []);

                            const customertypeulims = ulimsDatafiltered.map(item => item.customer_type);
                            const customertypeulimsdata = ulimsDatafiltered.map(item => item.transaction_count);
                            const totalAmountulimsdata = ulimsDatafiltered.map(item => item.total_amount);
                            const transactionStatusulims = ulimsDatafiltered.map(item => item.transaction_status);


                            const customertransactiontypeulims = [];

                            for (let i = 0; i < customertypeulims.length; i++) {
                                customertransactiontypeulims.push({
                                    label: customertypeulims[i],
                                    data: customertypeulimsdata[i],
                                    totalAmount: totalAmountulimsdata[i],
                                    transactionStatus: transactionStatusulims[i]
                                });
                            }

                            function handleNullDataset(dataset) {
                                if (!dataset || dataset.length === 0) {
                                    return [{
                                        label: 'no customer',
                                        data: 0,
                                        totalAmount: 0,
                                        transactionStatus: 'no transaction'
                                    }];
                                }
                                return dataset;
                            }
                            //paid ulims
                            let paidTransactionsulims = customertransactiontypeulims.filter(item => item.transactionStatus === 'Paid');
                            paidTransactionsulims = handleNullDataset(paidTransactionsulims);
                            const highestPaidTransactionulims = paidTransactionsulims.reduce((max, current) => (current.data > max.data) ? current : max, paidTransactionsulims[0]);
                            const leastPaidTransactionulims = paidTransactionsulims.reduce((min, current) => (current.data < min.data) ? current : min, paidTransactionsulims[0]);
                            const highestlabelPaidransactionulims = paidTransactionsulims.filter(obj => obj.data === highestPaidTransactionulims.data).map(obj => obj.label);
                            const leastlabelPaidTransactionulims = paidTransactionsulims.filter(obj => obj.data === leastPaidTransactionulims.data).map(obj => obj.label);
                            //cancelled ulims
                            let cancelledTransactionsulims = customertransactiontypeulims.filter(item => item.transactionStatus === 'Cancelled');
                            cancelledTransactionsulims = handleNullDataset(cancelledTransactionsulims);
                            const highestcancelledTransactionulims = cancelledTransactionsulims.reduce((max, current) => (current.data > max.data) ? current : max, cancelledTransactionsulims[0]);
                            const leastcancelledTransactionulims = cancelledTransactionsulims.reduce((min, current) => (current.data < min.data) ? current : min, cancelledTransactionsulims[0]);
                            const highestlabelcancelledTransactionulims = cancelledTransactionsulims.filter(obj => obj.data === highestcancelledTransactionulims.data).map(obj => obj.label);
                            const leastlabelcancelledTransactionulims = cancelledTransactionsulims.filter(obj => obj.data === leastcancelledTransactionulims.data).map(obj => obj.label);
                            //Pending ulims
                            let pendingTransactionsulims = customertransactiontypeulims.filter(item => item.transactionStatus === 'Pending');
                            pendingTransactionsulims = handleNullDataset(pendingTransactionsulims);
                            const highestPendingTransactionulims = pendingTransactionsulims.reduce((max, current) => (current.data > max.data) ? current : max, pendingTransactionsulims[0]);
                            const leastPendingTransactionulims = pendingTransactionsulims.reduce((min, current) => (current.data < min.data) ? current : min, pendingTransactionsulims[0]);
                            const highestlabelPendingTransactionulims = pendingTransactionsulims.filter(obj => obj.data === highestPendingTransactionulims.data).map(obj => obj.label);
                            const leastlabelPendingTransactionulims = pendingTransactionsulims.filter(obj => obj.data === leastPendingTransactionulims.data).map(obj => obj.label);


                            // // Use the found data

                            type1.innerHTML = "<span style='color: orange;'>Unified Laboratory Information Management System <br>";
                            hightype1.innerHTML = "&nbsp; &nbsp; + Highest Paid Transaction:<span style='color: green;'> " + highestlabelPaidransactionulims.join(' ,') + "</span> with <span style='color: red;'>" + highestPaidTransactionulims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(highestPaidTransactionulims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Least paid Transaction:<span style='color: green;'> " + leastlabelPaidTransactionulims.join(' ,') + "</span> with <span style='color: red;'>" + leastPaidTransactionulims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(leastPaidTransactionulims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Highest pending Transaction:<span style='color: green;'> " + highestlabelPendingTransactionulims.join(' ,') + "</span> with <span style='color: red;'>" + highestPendingTransactionulims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(highestPendingTransactionulims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Least pending Transaction:<span style='color: green;'> " + leastlabelPendingTransactionulims.join(' ,') + "</span> with <span style='color: red;'>" + leastPendingTransactionulims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(leastPendingTransactionulims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Highest cancelled Transaction:<span style='color: green;'> " + highestlabelcancelledTransactionulims.join(' ,') + "</span> with <span style='color: red;'>" + highestcancelledTransactionulims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(highestcancelledTransactionulims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + "." +
                                "</span><br><br>&nbsp; &nbsp; + Least cancelled Transaction:<span style='color: green;'> " + leastlabelcancelledTransactionulims.join(' ,') + "</span> with <span style='color: red;'>" + leastcancelledTransactionulims.data + "</span> transaction having the total income of <span style='color: red;'>" + Number(leastcancelledTransactionulims.totalAmount).toLocaleString('en-US', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }) + ".";

                            break;
                    }
                });
                transactionTypeDropdown.value = 'ts';
                transactionTypeDropdown.dispatchEvent(new Event('change'));

                customerpopup.style.display = "block";
            });
        }

        if (close) {
            close.addEventListener("click", () => {
                // Close the popup when the close button is clicked
                customerpopup.style.display = "none";
            });
        }
        // Transaction status pop-up analyzation
        if (customerTypepoppup) {
            customerTypepoppup.addEventListener("click", () => {
                // Show the popup
                customerpopup2.style.display = "block";

                // Set the header content
                header2.innerHTML = "Customer Type";

                // Clear previous data
                type.innerHTML = "Top Customer Transaction per Month";
                document.getElementById("yearPicker").addEventListener("change", function() {
                    const selectedYear = this.value;
                    const filteredData = technicalServicesData.filter(item => {
                        const transactionYear = new Date(item.transaction_date).getFullYear();
                        return item.transaction_status === 'Paid' && transactionYear.toString() === selectedYear;
                    });

                    let monthlyDataAggregated = {};
                    filteredData.forEach(item => {
                        const transactionMonth = new Date(item.transaction_date).getMonth() + 1;
                        const key = item.customer_type;

                        if (!monthlyDataAggregated[transactionMonth]) {
                            monthlyDataAggregated[transactionMonth] = {};
                        }

                        if (!monthlyDataAggregated[transactionMonth][key]) {
                            monthlyDataAggregated[transactionMonth][key] = {
                                transaction_count: 0,
                                total_amount: 0
                            };
                        }

                        monthlyDataAggregated[transactionMonth][key].transaction_count += Number(item.transaction_count);
                        monthlyDataAggregated[transactionMonth][key].total_amount += Number(item.total_amount);
                    });

                    // Find the customer type with the highest transaction count for each month
                    let highestTransactionsPerMonth = {};
                    for (const month in monthlyDataAggregated) {
                        let maxCount = 0;
                        let customerTypeWithMaxCount = '';
                        let maxIncome = 0;

                        for (const customerType in monthlyDataAggregated[month]) {
                            const {
                                transaction_count,
                                total_amount
                            } = monthlyDataAggregated[month][customerType];

                            if (transaction_count > maxCount) {
                                maxCount = transaction_count;
                                customerTypeWithMaxCount = customerType;
                                maxIncome = total_amount; // Set the max income for the current customer type
                            }
                        }

                        highestTransactionsPerMonth[month] = {
                            customer_type: customerTypeWithMaxCount,
                            transaction_count: maxCount,
                            income: maxIncome.toLocaleString('en-US', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            }),
                        };
                    }

                    // Generate table HTML
                    let tableHtml = '<table style="width: 100%; text-align: center;">';
                    tableHtml += `
                <tr>
                    <th style="border: 1px solid white; padding: 8px;">Month</th>
                    <th style="border: 1px solid white; padding: 8px; ">Customer Type</th>
                    <th style="border: 1px solid white; padding: 8px; ">Transaction Count</th>
                    <th style="border: 1px solid white; padding: 8px; ">Income</th>
                </tr>`;

                    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

                    Object.entries(highestTransactionsPerMonth).forEach(([month, data]) => {
                        const monthName = monthNames[parseInt(month) - 1]; // Convert numeric month to month name
                        tableHtml += `
                    <tr style="border: 1px solid white;">
                        <td style="border: 1px solid white; padding: 8px;">${monthName}</td>
                        <td style="border: 1px solid white; padding: 8px;">${data.customer_type}</td>
                        <td style="border: 1px solid white; padding: 8px;">${data.transaction_count}</td>
                        <td style="border: 1px solid white; padding: 8px;">${data.income}</td>
                    </tr>`;
                    });

                    tableHtml += '</table>';
                    hightype.innerHTML = tableHtml;
                });

                // Trigger change event to load data for the currently selected year
                document.getElementById("yearPicker").value = year;

                document.getElementById("yearPicker").dispatchEvent(new Event('change'));
            });
        }

        function handleNullDataset(dataset) {
            for (const month in dataset) {
                if (dataset[month].length === 0) {
                    dataset[month].push({
                        customer_type: 'None',
                        transaction_count: 0,
                        total_amount: 0
                    });
                }
            }
            return dataset;
        }


        // Close button functionality

        if (close2) {
            close2.addEventListener("click", () => {
                // Close the popup when the close button is clicked
                customerpopup2.style.display = "none";

            });
        }

    });
</script>
<!-- scriptfor customers graph -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

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

    // Check if the selected type is 'bar' and adjust options accordingly
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

    // Update options and then update the charts
    transactionStatusChart.config.type = typeSelect;
    paymendtMethodChart.config.type = typeSelect;
    transactionTypeChart.config.type = typeSelect;
    customerTypeChart.config.type = typeSelect;

    // Clone the options to avoid modifying the shared options object
    transactionStatusChart.options = JSON.parse(JSON.stringify(doughnutOptions));
    paymendtMethodChart.options = JSON.parse(JSON.stringify(doughnutOptions));
    transactionTypeChart.options = JSON.parse(JSON.stringify(doughnutOptions));
    customerTypeChart.options = JSON.parse(JSON.stringify(doughnutOptions));

    // Update the charts
    transactionStatusChart.update();
    paymendtMethodChart.update();
    transactionTypeChart.update();
    customerTypeChart.update();

    typeSelect = "";
}



</script>

<script>
    //script for date filter, at the bottom so all functions can be called
    var newTotalTransaction = {
        datasets: []
    };
    newTotalTransaction.datasets = totalTransactionDataset.datasets.map(a => {
        return {
            ...a
        }
    }); //total transaction modified json

    var newTotalSum = {
        datasets: []
    };
    newTotalSum.datasets = totalSum.datasets.map(a => {
        return {
            ...a
        }
    }) //total income modified json


    var new_divData = {
        datasets: []
    };
    new_divData.datasets = perDivData.datasets.map(a => {
        return {
            ...a
        }
    })

    var newSoldPerDivs = {
        datasets: []
    };
    newSoldPerDivs.datasets = soldPerDivs.datasets.map(a => {
        return {
            ...a
        }
    }); //total income per division modified json

    //reserve as backup dataset, cuz OG gets modified---------------------------------------------------------------
    const cacheTotalTransaction = {
        datasets: []
    };
    cacheTotalTransaction.datasets = totalTransactionDataset.datasets.map(a => {
        return {
            ...a
        }
    });

    const cacheTotalSum = {
        datasets: []
    };
    cacheTotalSum.datasets = totalSum.datasets.map(a => {
        return {
            ...a
        }
    });

    const cachePerDivData = {
        datasets: []
    };
    cachePerDivData.datasets = perDivData.datasets.map(a => {
        return {
            ...a
        }
    });

    const cacheSoldPerDivs = {
        datasets: []
    };
    cacheSoldPerDivs.datasets = soldPerDivs.datasets.map(a => {
        return {
            ...a
        }
    });
    //--------------------------------------------------------------------------------------------------------------
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
                url: '<?php echo Yii::$app->request->baseUrl . '/site/province' ?>', // from index to controller then action
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
                    //assign new value from controller to variables
                    updateProvince(response)
                },
                error: function(error) {
                    console.error(error);
                }
            });


            const dateList = [...global_label_day];

            //get the index of the labels array based on the value of datepicker
            //both array value and date picker value must be matching cAsE sEnSiTiVe to give a result
            const sunIndex = dateList.indexOf(fromDateValue.value);
            const satIndex = dateList.indexOf(toDatevalue.value);

            //slice the labels array based on the sunIndex and satIndex
            const new_dayList = dateList.slice(sunIndex, satIndex + 1);

            totaltransactionChartB.config.data.labels = new_dayList; //assign new label to the chart
            transactionChartB.config.data.labels = new_dayList;
            totalsalesChartB.config.data.labels = new_dayList;
            salesChart.config.data.labels = new_dayList;

            //new json for new dataset iterates through all object "data"
            //if date is not accurate remove the -7 on both sunIndex and satIndex, some machines are retarded
            //------------------------------------------------1st
            newTotalTransaction.datasets.forEach(function(datasets) {
                var originalDataLog = datasets.data;
                var newDataLog = {};
                var keys = Object.keys(originalDataLog);
                for (var i = sunIndex - 7; i <= satIndex - 7 && i < keys.length; i++) { //fetch all values based from sunIndex to satIndex
                    var key = keys[i];
                    newDataLog[key] = originalDataLog[key];
                }
                datasets.data = newDataLog;
            });
            totaltransactionChartB.config.data.datasets = newTotalTransaction.datasets; //replace the current chart dataset
            //now repeating the process for the other chart---2nd
            newTotalSum.datasets.forEach(function(datasets) {
                var originalDataLog = datasets.data;
                var newDataLog = {};
                var keys = Object.keys(originalDataLog);
                for (var i = sunIndex - 7; i <= satIndex - 7 && i < keys.length; i++) { //fetch all values based from sunIndex to satIndex
                    var key = keys[i];
                    newDataLog[key] = originalDataLog[key];
                }
                datasets.data = newDataLog;
            });
            totalsalesChartB.config.data.datasets = newTotalSum.datasets
            //------------------------------------------------3rd

            new_divData.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            transactionChartB.config.data.datasets = new_divData.datasets;
            //------------------------------------------------4th

            newSoldPerDivs.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            salesChart.config.data.datasets = newSoldPerDivs.datasets;

            totaltransactionChartB.update(); //udpate the chart
            totalsalesChartB.update();
            transactionChartB.update();
            salesChart.update();

            newTotalTransaction = JSON.parse(JSON.stringify(cacheTotalTransaction)); //reverts the value of the newTotalTransaction prior to modification
            newTotalSum = JSON.parse(JSON.stringify(cacheTotalSum));
            new_divData = JSON.parse(JSON.stringify(cachePerDivData));
            newSoldPerDivs = JSON.parse(JSON.stringify(cacheSoldPerDivs));

        } else if (selectedValue === 'Months') {

            var monthtotalTransaction = (<?= json_encode($monthqueryAllDate) ?>); // dashboard total transaction
            var monthLabel = (<?= json_encode($monthLabel) ?>);
            //preparing array to store the retrieved data
            var monthttotalTransactionDataset = {
                datasets: [{
                    backgroundColor: "#274690",
                    label: 'Total Transaction',
                    data: {}
                }, ],
            }

            var x = 0;

            function cusmo() {
                while (monthtotalTransaction[x] != null) {
                    var samp = monthtotalTransaction[x].labels;
                    var sampo = parseInt(monthtotalTransaction[x].datasets);
                    if (monthtotalTransaction[x].label == "Total") {
                        monthttotalTransactionDataset.datasets[0].data[samp] = sampo;
                    }
                    x++
                }
            }
            cusmo();
            x = 0;


            var global_label_month = []; //for months

            while (monthLabel[x] != null) {
                var lab = monthLabel[x].labels;
                global_label_month[x] = lab;
                x++;
            }
            x = 0;

            var monthtotal_Income = (<?= json_encode($monthqueryTotalSale) ?>);

            var monthtotalSum = {
                datasets: [{
                    backgroundColor: "#fccb06",
                    borderColor: "#fccb06",
                    label: 'Total Income',
                    data: {}
                }]
            }

            function calInc() {
                while (monthtotal_Income[x] != null) {
                    var samp = monthtotal_Income[x].labels;
                    var sampo = parseInt(monthtotal_Income[x].datasets);
                    if (monthtotal_Income[x].label === "Total") {
                        monthtotalSum.datasets[0].data[samp] = sampo;
                    }
                    x++
                }
            }
            calInc();
            x = 0;

            var monthtPerDivData = (<?= json_encode($monthqueryAllDate) ?>); //retrieve data from controller
            var monthperDivData = { //prepare array for translated data
                datasets: [{
                        backgroundColor: "#06d6a0",
                        label: 'National Metrology Division',
                        data: {}
                    },
                    {
                        backgroundColor: "#0073e6",
                        label: 'Standards and Testing Division',
                        data: {}
                    }
                ],
            }
            while (monthtPerDivData[x] != null) {
                var samp = monthtPerDivData[x].labels;
                var sampo = parseInt(monthtPerDivData[x].datasets);
                if (monthtPerDivData[x].label == 'National Metrology Division') {
                    monthperDivData.datasets[0].data[samp] = sampo;
                } else if (monthtPerDivData[x].label == 'Standards and Testing Division') {
                    monthperDivData.datasets[1].data[samp] = sampo;
                }
                x++
            }
            x = 0;

            var monthsoldPerDivs = { //prepare array for translated data
                datasets: [{
                        backgroundColor: "#06d6a0",
                        borderColor: "#06d6a0",
                        label: 'National Metrology Division',
                        data: {}
                    },
                    {
                        backgroundColor: "#0073e6",
                        borderColor: "#0073e6",
                        label: 'Standards and Testing Division',
                        data: {}
                    }
                ]
            }

            while (monthtotal_Income[x] != null) {
                var samp = monthtotal_Income[x].labels;
                var sampo = parseInt(monthtotal_Income[x].datasets);
                if (monthtotal_Income[x].label == 'National Metrology Division') {
                    monthsoldPerDivs.datasets[0].data[samp] = sampo;
                } else if (monthtotal_Income[x].label == 'Standards and Testing Division') {
                    monthsoldPerDivs.datasets[1].data[samp] = sampo;
                }
                x++
            }
            x = 0;

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            //get the contents of the html datepicker
            const fromDateValue = document.getElementById('startDate');
            const toDatevalue = document.getElementById('endDate');

            const fDate = fromDateValue.value;
            const tDate = toDatevalue.value;

            //send datepicker data to controller, 
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/site/month' ?>', // from index to controller then action
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
                    //assign new value from controller to variables
                    updateProvince(response)
                },
                error: function(error) {
                    console.error(error);
                }
            });

            const monthList = [...global_label_month];

            //get the index of the labels array based on the value of datepicker
            //both array value and date picker value must be matching cAsE sEnSiTiVe to give a result

            const sunIndex = monthList.indexOf(fromDateValue.value);
            const satIndex = monthList.indexOf(toDatevalue.value);

            //slice the labels array based on the sunIndex and satIndex
            const new_monthList = monthList.slice(sunIndex, satIndex + 1);


            //------------------------------------------------1st

            // Remove old data
            totaltransactionChartB.data.labels = [];
            totaltransactionChartB.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            monthttotalTransactionDataset.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            totaltransactionChartB.config.data.datasets = monthttotalTransactionDataset.datasets; //replace the current chart dataset
            //now repeating the process for the other chart---2nd

            // Remove old data
            totalsalesChartB.data.labels = [];
            totalsalesChartB.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            monthtotalSum.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            totalsalesChartB.config.data.datasets = monthtotalSum.datasets
            //------------------------------------------------3rd

            // Remove old data
            transactionChartB.data.labels = [];
            transactionChartB.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            monthperDivData.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            transactionChartB.config.data.datasets = monthperDivData.datasets;
            //------------------------------------------------4th

            // Remove old data
            salesChart.data.labels = [];
            salesChart.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            monthsoldPerDivs.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            salesChart.config.data.datasets = monthsoldPerDivs.datasets;
            //------------------------------------------------------------

            totaltransactionChartB.config.data.labels = new_monthList; //assign new label to the chart
            transactionChartB.config.data.labels = new_monthList;
            totalsalesChartB.config.data.labels = new_monthList;
            salesChart.config.data.labels = new_monthList;

            totaltransactionChartB.update(); //udpate the chart
            totalsalesChartB.update();
            transactionChartB.update();
            salesChart.update();
            //
        } else if (selectedValue === 'Years') {


            var yeartotalTransaction = (<?= json_encode($yearqueryAllDate) ?>); // dashboard total transaction
            var yearLabel = (<?= json_encode($yearLabel) ?>);
            //preparing array to store the retrieved data
            var yearttotalTransactionDataset = {
                datasets: [{
                    backgroundColor: "#274690",
                    label: 'Total Transaction',
                    data: {}
                }, ],
            }

            var x = 0;

            function cusmo() {
                while (yeartotalTransaction[x] != null) {
                    var samp = yeartotalTransaction[x].labels;
                    var sampo = parseInt(yeartotalTransaction[x].datasets);
                    if (yeartotalTransaction[x].label == "Total") {
                        yearttotalTransactionDataset.datasets[0].data[samp] = sampo;
                    }
                    x++
                }
            }
            cusmo();
            x = 0;


            var global_label_year = []; //for years

            while (yearLabel[x] != null) {
                var lab = yearLabel[x].labels;
                global_label_year[x] = lab;
                x++;
            }
            x = 0;

            var yeartotal_Income = (<?= json_encode($yearqueryTotalSale) ?>);

            var yeartotalSum = {
                datasets: [{
                    backgroundColor: "#fccb06",
                    borderColor: "#fccb06",
                    label: 'Total Income',
                    data: {}
                }]
            }

            function calInc() {
                while (yeartotal_Income[x] != null) {
                    var samp = yeartotal_Income[x].labels;
                    var sampo = parseInt(yeartotal_Income[x].datasets);
                    if (yeartotal_Income[x].label === "Total") {
                        yeartotalSum.datasets[0].data[samp] = sampo;
                    }
                    x++
                }
            }
            calInc();
            x = 0;

            var yeartPerDivData = (<?= json_encode($yearqueryAllDate) ?>); //retrieve data from controller
            var yearperDivData = { //prepare array for translated data
                datasets: [{
                        backgroundColor: "#06d6a0",
                        label: 'National Metrology Division',
                        data: {}
                    },
                    {
                        backgroundColor: "#0073e6",
                        label: 'Standards and Testing Division',
                        data: {}
                    }
                ],
            }
            while (yeartPerDivData[x] != null) {
                var samp = yeartPerDivData[x].labels;
                var sampo = parseInt(yeartPerDivData[x].datasets);
                if (yeartPerDivData[x].label == 'National Metrology Division') {
                    yearperDivData.datasets[0].data[samp] = sampo;
                } else if (yeartPerDivData[x].label == 'Standards and Testing Division') {
                    yearperDivData.datasets[1].data[samp] = sampo;
                }
                x++
            }
            x = 0;

            var yearsoldPerDivs = { //prepare array for translated data
                datasets: [{
                        backgroundColor: "#06d6a0",
                        borderColor: "#06d6a0",
                        label: 'National Metrology Division',
                        data: {}
                    },
                    {
                        backgroundColor: "#0073e6",
                        borderColor: "#0073e6",
                        label: 'Standards and Testing Division',
                        data: {}
                    }
                ]
            }

            while (yeartotal_Income[x] != null) {
                var samp = yeartotal_Income[x].labels;
                var sampo = parseInt(yeartotal_Income[x].datasets);
                if (yeartotal_Income[x].label == 'National Metrology Division') {
                    yearsoldPerDivs.datasets[0].data[samp] = sampo;
                } else if (yeartotal_Income[x].label == 'Standards and Testing Division') {
                    yearsoldPerDivs.datasets[1].data[samp] = sampo;
                }
                x++
            }
            x = 0;

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            //get the contents of the html datepicker
            const fromDateValue = document.getElementById('startDate');
            const toDatevalue = document.getElementById('endDate');

            const fDate = fromDateValue.value;
            const tDate = toDatevalue.value;

            //send datepicker data to controller, 
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl . '/site/yearly' ?>', // from index to controller then action
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
                    //assign new value from controller to variables
                    updateProvince(response)
                },
                error: function(error) {
                    console.error(error);
                }
            });

            const yearList = [...global_label_year];

            //get the index of the labels array based on the value of datepicker
            //both array value and date picker value must be matching cAsE sEnSiTiVe to give a result

            const sunIndex = yearList.indexOf(fromDateValue.value);
            const satIndex = yearList.indexOf(toDatevalue.value);

            //slice the labels array based on the sunIndex and satIndex
            const new_yearList = yearList.slice(sunIndex, satIndex + 1);


            //------------------------------------------------1st

            // Remove old data
            totaltransactionChartB.data.labels = [];
            totaltransactionChartB.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            yearttotalTransactionDataset.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            totaltransactionChartB.config.data.datasets = yearttotalTransactionDataset.datasets; //replace the current chart dataset
            //now repeating the process for the other chart---2nd

            // Remove old data
            totalsalesChartB.data.labels = [];
            totalsalesChartB.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            yeartotalSum.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            totalsalesChartB.config.data.datasets = yeartotalSum.datasets
            //------------------------------------------------3rd

            // Remove old data
            transactionChartB.data.labels = [];
            transactionChartB.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            yearperDivData.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            transactionChartB.config.data.datasets = yearperDivData.datasets;
            //------------------------------------------------4th

            // Remove old data
            salesChart.data.labels = [];
            salesChart.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            yearsoldPerDivs.datasets.forEach(function(dataset) {
                dataset.data = Object.keys(dataset.data)
                    .filter((date) => date >= fromDateValue.value && date <= toDatevalue.value)
                    .reduce((obj, date) => {
                        obj[date] = dataset.data[date];
                        return obj;
                    }, {});
            });
            salesChart.config.data.datasets = yearsoldPerDivs.datasets;
            //------------------------------------------------------------

            totaltransactionChartB.config.data.labels = new_yearList; //assign new label to the chart
            transactionChartB.config.data.labels = new_yearList;
            totalsalesChartB.config.data.labels = new_yearList;
            salesChart.config.data.labels = new_yearList;

            totaltransactionChartB.update(); //udpate the chart
            totalsalesChartB.update();
            transactionChartB.update();
            salesChart.update();
            //

        }
    }



    function updateProvince(response) {

        var dateTypeSelect = document.getElementById('date_type');
        var selectedValue = dateTypeSelect.value;

        if (selectedValue === 'Days') {
            //START OF Total Customers per Province
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
            var x = 0
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
            myChart.config.data.datasets[2].data[0] = response.forMyChart[0].data;
            myChart.config.data.datasets[3].data[0] = response.forMyChart[1].data;
            myChart.update();

            let fDate = new Date(document.getElementById('startDate').value);
            let tDate = new Date(document.getElementById('endDate').value);

            const timeDifference = tDate.getTime() - fDate.getTime();
            const numberOfDays = Math.floor(timeDifference / (1000 * 3600 * 24)) + 1;
            const digi = response.forMyChartAvgTransaction[0].data
            const avgThis = Math.floor(digi / numberOfDays);
            console.log(`Math.floor( AVG: ${response.forMyChartAvgTransaction[0].data} / ${numberOfDays} = ${avgThis} )`); // mema lang to di yan actual formula

            document.getElementById('avgTransaction').innerHTML = avgThis;
            let number = parseInt(response.forMyChart[0].data) + parseInt(response.forMyChart[1].data)
            let fixedNumber = Math.round(number * 100) / 100;
            document.getElementById('avgIncome').innerHTML = fixedNumber.toLocaleString("en-US");
        } // end of day filter
        else if (selectedValue === 'Months') {
            //START OF Total Customers per Province
            const selectedType = chartTypeDropdown.value;
            var selected_data;
            switch (selectedType) {
                case "ncr":
                    selected_data = response.monthcustmerPerProvinceNCR
                    break;
                case "region-1":
                    selected_data = response.monthcustmerPerProvinceRI
                    break;
                case "region-2":
                    selected_data = response.monthcustmerPerProvinceRII
                    break;
                case "region-3":
                    selected_data = response.monthcustmerPerProvinceRIII
                    break;
                case "region-4a":
                    selected_data = response.monthcustmerPerProvinceRIVA
                    break;
                case "mimaropa":
                    selected_data = response.monthcustmerPerProvinceMIMAROPA
                    break;
                case "region-5":
                    selected_data = response.monthcustmerPerProvinceV
                    break;
                case "car":
                    selected_data = response.monthcustmerPerProvinceCAR
                    break;
                case "region-6":
                    selected_data = response.monthcustmerPerProvinceVI
                    break;
                case "region-7":
                    selected_data = response.monthcustmerPerProvinceVII
                    break;
                case "region-8":
                    selected_data = response.monthcustmerPerProvinceVIII
                    break;
                case "region-9":
                    selected_data = response.monthcustmerPerProvinceIX
                    break;
                case "region-10":
                    selected_data = response.monthcustmerPerProvinceX
                    break;
                case "region-11":
                    selected_data = response.monthcustmerPerProvinceXI
                    break;
                case "region-12":
                    selected_data = response.monthcustmerPerProvinceXII
                    break;
                case "region-13":
                    selected_data = response.monthcustmerPerProvinceXIII
                    break;
                case "barm":
                    selected_data = response.monthcustmerPerProvinceBARMM
                    break;
            }

            // Remove old data
            constprovincesChart.data.labels = [];
            constprovincesChart.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            //convert data into usable chartjs labels
            var x = 0
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
            var TSChart1 = response.monthforTransactionStatusChart;

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
            var TSChart2 = response.monthforPaymendtMethodChart;

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
            var TSChart3 = response.monthforTransactionTypeChart;

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
            var TSChart4 = response.monthforCustomerTypeChart;

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

            console.log(response.monthforMyChart[0].data);

            myChart.config.data.datasets[2].data[0] = response.monthforMyChart[0].data;
            myChart.config.data.datasets[3].data[0] = response.monthforMyChart[1].data;
            myChart.update();


            let fDate = new Date(document.getElementById('startDate').value);
            let tDate = new Date(document.getElementById('endDate').value);

            const timeDifference = tDate.getTime() - fDate.getTime();
            const numberOfDays = Math.floor(timeDifference / (1000 * 3600 * 24)) + 1;
            const digi = response.monthforMyChartAvgTransaction[0].data
            const avgThis = Math.floor(digi / numberOfDays);
            console.log(`Math.floor( AVG: ${response.monthforMyChartAvgTransaction[0].data} / ${numberOfDays} = ${avgThis} )`); // mema lang to di yan actual formula

            document.getElementById('avgTransaction').innerHTML = avgThis;
            let number = parseInt(response.monthforMyChart[0].data) + parseInt(response.monthforMyChart[1].data)
            let fixedNumber = Math.round(number * 100) / 100;
            document.getElementById('avgIncome').innerHTML = fixedNumber.toLocaleString("en-US");
        } // end of month filter
        else if (selectedValue === 'Years') {
            //START OF Total Customers per Province
            const selectedType = chartTypeDropdown.value;
            var selected_data;
            switch (selectedType) {
                case "ncr":
                    selected_data = response.yearcustmerPerProvinceNCR
                    break;
                case "region-1":
                    selected_data = response.yearcustmerPerProvinceRI
                    break;
                case "region-2":
                    selected_data = response.yearcustmerPerProvinceRII
                    break;
                case "region-3":
                    selected_data = response.yearcustmerPerProvinceRIII
                    break;
                case "region-4a":
                    selected_data = response.yearcustmerPerProvinceRIVA
                    break;
                case "mimaropa":
                    selected_data = response.yearcustmerPerProvinceMIMAROPA
                    break;
                case "region-5":
                    selected_data = response.yearcustmerPerProvinceV
                    break;
                case "car":
                    selected_data = response.yearcustmerPerProvinceCAR
                    break;
                case "region-6":
                    selected_data = response.yearcustmerPerProvinceVI
                    break;
                case "region-7":
                    selected_data = response.yearcustmerPerProvinceVII
                    break;
                case "region-8":
                    selected_data = response.yearcustmerPerProvinceVIII
                    break;
                case "region-9":
                    selected_data = response.yearcustmerPerProvinceIX
                    break;
                case "region-10":
                    selected_data = response.yearcustmerPerProvinceX
                    break;
                case "region-11":
                    selected_data = response.yearcustmerPerProvinceXI
                    break;
                case "region-12":
                    selected_data = response.yearcustmerPerProvinceXII
                    break;
                case "region-13":
                    selected_data = response.yearcustmerPerProvinceXIII
                    break;
                case "barm":
                    selected_data = response.yearcustmerPerProvinceBARMM
                    break;
            }

            constprovincesChart.data.labels = [];
            constprovincesChart.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });

            var x = 0
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

            x = 0
            var TSChart1 = response.yearforTransactionStatusChart;

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
            x = 0

            var TSChart2 = response.yearforPaymendtMethodChart

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

            x = 0

            var TSChart3 = response.yearforTransactionTypeChart;
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

            x = 0
            var TSChart4 = response.yearforCustomerTypeChart;
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

            myChart.config.data.datasets[2].data[0] = response.yearforMyChart[0].data;
            myChart.config.data.datasets[3].data[0] = response.yearforMyChart[1].data;
            myChart.update();

            let fDate = new Date(document.getElementById('startDate').value);
            let tDate = new Date(document.getElementById('endDate').value);

            const timeDifference = tDate.getTime() - fDate.getTime();
            const numberOfDays = Math.floor(timeDifference / (1000 * 3600 * 24)) + 1;
            const digi = response.yearforMyChartAvgTransaction[0].data
            const avgThis = Math.floor(digi / numberOfDays);
            console.log(`Math.floor( AVG: ${response.yearforMyChartAvgTransaction[0].data} / ${numberOfDays} = ${avgThis} )`); // mema lang to di yan actual formula

            document.getElementById('avgTransaction').innerHTML = avgThis;
            let number = parseInt(response.yearforMyChart[0].data) + parseInt(response.yearforMyChart[1].data)
            let fixedNumber = Math.round(number * 100) / 100;
            document.getElementById('avgIncome').innerHTML = fixedNumber.toLocaleString("en-US");
        } // end of year filter
    }
    dateFilter();
</script>
<script>
    function downloadPDF() {

        document.getElementById('sending-email-message').style.display = 'block';

        const totaltransactionChart = document.getElementById('totaltransactionChart');
        const transactionChart = document.getElementById('transactionChart');
        const totalsalesChart = document.getElementById('totalsalesChart');
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

        domtoimage.toPng(totaltransactionChart, options)
            .then(function(totaltransactionChartImg) {
                domtoimage.toPng(transactionChart, options)
                    .then(function(transactionChartImg) {
                        domtoimage.toPng(salesChart, options)
                            .then(function(salesChartImg) {
                                domtoimage.toPng(myChart, options)
                                    .then(function(myChartImg) {
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
                                                                                domtoimage.toPng(totalsalesChart, options)
                                                                                    .then(function(totalsalesChartImg) {
                                                                                        const pdf = new jsPDF();

                                                                                        pdf.setFontSize(12);
                                                                                        pdf.setFont('helvetica', 'bold');
                                                                                        pdf.setTextColor(0, 122, 204);
                                                                                        pdf.text('Total Transactions', 40, 25);
                                                                                        pdf.text('Total Income', 40, 115);
                                                                                        pdf.text('Transaction per Division', 40, 215);

                                                                                        pdf.setFont('helvetica', 'bold');
                                                                                        pdf.setTextColor(0, 41, 102);
                                                                                        pdf.setFontSize(14);
                                                                                        pdf.text('Visualight-Dashboard', 83, 10);

                                                                                        pdf.addImage(totaltransactionChartImg, 'PNG', 40, 30, 130, 70, undefined, 'FAST');
                                                                                        pdf.addImage(totalsalesChartImg, 'PNG', 40, 123, 130, 70, undefined, 'FAST');
                                                                                        pdf.addImage(transactionChartImg, 'PNG', 40, 220, 130, 70, undefined, 'FAST');

                                                                                        pdf.addPage();

                                                                                        pdf.setFontSize(12);
                                                                                        pdf.setFont('helvetica', 'bold');
                                                                                        pdf.setTextColor(0, 122, 204);
                                                                                        pdf.text('Income per Division', 40, 25);

                                                                                        pdf.addImage(salesChartImg, 'PNG', 40, 30, 140, 70, undefined, 'FAST');

                                                                                        pdf.text('Average Income', 40, 115);

                                                                                        pdf.addImage(myChartImg, 'PNG', 40, 120, 105, 80, undefined, 'FAST');

                                                                                        pdf.text('Total Customers per Province', 40, 210);

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



                                                                                        pdf.save('Visualight-Dashboard.pdf');
                                                                                    });
                                                                            });

                                                                    });
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