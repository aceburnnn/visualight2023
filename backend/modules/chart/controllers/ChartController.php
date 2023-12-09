<?php

// Ang `namespace` ay parang location o address kung saan makikita ang controller na ito sa folder na `backend\modules\chart\controllers`.
namespace backend\modules\chart\controllers;

// I-import natin yung kailangan nating class para ma-extend yung Yii Controller.
use backend\controllers\BaseController;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\db\Query;

// I-extend natin yung Controller class para makagawa tayo ng ating custom ChartController.
class ChartController extends BaseController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','index'],
                'rules' => [
                  [
                      'allow' => true,
                      'actions' => ['index'],
                      'permissions' => ['practiceChart'], //add only admin allowed
                  ]
                ],
            ],
        ];
    }
    
    // Ito yung pangunahing action na tatawagin kapag may nag-access sa page ng chart.
    public function actionIndex()
    {
        // Kukuhanin natin yung data para sa bar chart gamit yung 'prepareBarChartData' function.
        $barChartData = $this->prepareBarChartData();

        // Kukuhanin natin yung data para sa pie chart gamit yung 'preparePieChartData' function.
        $pieChartData = $this->preparePieChartData();

        // Ipapakita natin yung 'index' view at ipapasa natin yung barChartData at pieChartData sa view.
        return $this->render('index', [
            'barChartData' => $barChartData,
            'pieChartData' => $pieChartData,
        ]);
    }

    // Function para i-prepare yung data para sa bar chart.
    public function prepareBarChartData()
    {
        // Kukuhanin natin yung data mula sa 'car_brands' table sa database.
        $data = (new Query())
            ->select(['YEAR(order_date) AS year', 'brand', 'COUNT(*) AS total_orders'])
            ->from('car_brands')
            ->groupBy(['YEAR(order_date)', 'brand'])
            ->orderBy('brand, YEAR(order_date)')
            ->all();

        // Itatag natin yung variable para sa data ng bar chart.
        $chartData = [
            'labels' => [],     // Dito natin ilalagay yung mga taon (x-axis labels).
            'datasets' => [],   // Bawat dataset ay kumakatawan sa isang car brand.
        ];

        // I-define natin yung mga kulay para sa iba't ibang car brands.
        $colors = [
            'Honda' => 'rgba(255, 99, 132, 0.7)',
            'Toyota' => 'rgba(255, 206, 86, 0.7)',
            'BMW' => 'rgba(54, 162, 235, 0.7)',
            'Mercedes-Benz' => 'rgba(75, 192, 192, 0.7)',
            'Nissan' => 'rgba(153, 102, 255, 0.7)',
        ];

        // I-prepare natin yung empty array para sa data ng bawat car brand.
        $brandData = [];

        // Dadaan tayo sa data na nakuha para ayusin yung data para sa bar chart.
        foreach ($data as $row) {
            // Kuha natin yung pangalan ng car brand, taon ng order, at total ng orders.
            $brand = $row['brand'];
            $year = $row['year'];
            $totalOrders = (int) $row['total_orders'];

            // Kung first time natin nakita yung brand, gagawa tayo ng entry para dito sa $brandData array.
            if (!isset($brandData[$brand])) {
                $brandData[$brand] = [
                    'label' => $brand,                          // Label para sa brand (gagamitin sa legend).
                    'backgroundColor' => $colors[$brand],       // Kulay para sa bar na kumakatawan sa brand na ito.
                    'data' => [],                               // Data para sa brand na ito (bilang ng orders para sa bawat taon).
                ];
            }

            // Ilalagay natin yung bilang ng orders para sa brand na ito at taon.
            $brandData[$brand]['data'][$year] = $totalOrders;

            // Kung hindi pa nasa listahan ng labels (x-axis) yung taon, idadagdag natin.
            if (!in_array($year, $chartData['labels'])) {
                $chartData['labels'][] = $year;
            }
        }

        // Pupunuin natin ng 0 yung mga taon na walang data para sa bawat car brand para maging kumpleto.
        foreach ($brandData as &$brand) {
            foreach ($chartData['labels'] as $year) {
                if (!isset($brand['data'][$year])) {
                    $brand['data'][$year] = 0;
                }
            }
            // I-sosort natin yung data base sa taon para maging chronologically arranged yung x-axis.
            ksort($brand['data']);
            // Isasama natin yung data ng car brand na ito sa datasets ng bar chart.
            $chartData['datasets'][] = $brand;
        }
        unset($brand); // I-clear natin yung reference sa $brand para maiwasan yung mga problema sa future iterations.

        // Ibalik natin yung inayos na data para sa bar chart.
        return $chartData;
    }

    // Function para i-prepare yung data para sa pie chart.
    public function preparePieChartData()
    {
        // Kukuhanin natin yung data mula sa 'car_brands' table sa database, at i-count yung bilang ng orders para sa bawat brand.
        $data = (new Query())
            ->select(['brand', 'COUNT(*) AS total_orders'])
            ->from('car_brands')
            ->groupBy('brand')
            ->all();

        // Itatag natin yung variable para sa data ng pie chart.
        $chartData = [
            'labels' => [],                                     // Dito ilalagay yung mga labels (brand names) para sa pie chart.
            'datasets' => [                                     // Yung datasets array ay naglalaman ng data at configuration para sa pie chart.
                [
                    'data' => [],                               // Bilang ng orders para sa bawat brand.
                    'backgroundColor' => [],                   // Mga kulay para sa bawat slice ng pie chart.
                ],
            ],
        ];

        // I-define natin yung mga kulay para sa iba't ibang car brands (gagamitin para maiba-iba yung kulay ng slices sa pie chart).
        $colors = [
            'Honda' => 'rgba(255, 99, 132, 0.7)',
            'Toyota' => 'rgba(255, 206, 86, 0.7)',
            'BMW' => 'rgba(54, 162, 235, 0.7)',
            'Mercedes-Benz' => 'rgba(75, 192, 192, 0.7)',
            'Nissan' => 'rgba(153, 102, 255, 0.7)',
        ];

        // Dadaan tayo sa data na nakuha para ayusin yung data para sa pie chart.
        foreach ($data as $row) {
            // Kuha natin yung pangalan ng car brand at bilang ng orders mula sa data.
            $brand = $row['brand'];
            $totalOrders = (int) $row['total_orders'];

            // Ilalagay natin yung pangalan ng car brand sa mga labels para sa pie chart.
            $chartData['labels'][] = $brand;
            // Ilalagay natin yung bilang ng orders para sa car brand na ito sa data ng pie chart.
            $chartData['datasets'][0]['data'][] = $totalOrders;
            // Ilalagay natin yung kulay para sa slice na kumakatawan sa brand na ito sa mga background colors ng pie chart.
            $chartData['datasets'][0]['backgroundColor'][] = $colors[$brand];
        }

        // Ibalik natin yung inayos na data para sa pie chart.
        return $chartData;
    }
}
