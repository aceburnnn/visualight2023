<?php

use yii\db\Query;
use yii\i18n\Formatter;
use backend\modules\chart\controllers\ChartController;

$queryAllDate = (new Query())
    ->select(['transDate AS labels', 'COUNT(*) AS datasets', '_div AS label'])
    ->from('mock_data')
    ->groupBy('transDate, _div')
    ->orderBy('transDate')
    ->all();

$chartLabel = (new Query())
    ->select('transDate AS labels')
    ->from('mock_data')
    ->groupBy('transDate')
    ->orderBy('transDate')
    ->all();

$queryAllMonth = (new Query())
    ->select(['DATE_FORMAT(transDate, \'%Y-%m\') AS labels', 
    'COUNT(*) AS datasets', '_div AS label'])
    ->from('mock_data')
    ->groupBy('labels, _div')
    ->orderBy('transDate')
    ->all();

$monthLabel = (new Query())
    ->select(['DATE_FORMAT(transDate, \'%Y-%m\') AS labels'])
    ->from('mock_data')
    ->groupBy('labels')
    ->orderBy('labels')
    ->all();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Car Brand Data Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.9.179/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>


    <style>
        .chart-container {
            margin: 0.5rem;
            padding-bottom: 1rem;
            padding: 1rem;
            border-radius: 1rem;
            background-color: white;
            display: inline-block;
            height: 25rem;
            width: 90%;
        }

        /* .chart-container canvas {
            background-color: white;
            border-radius: 5px;
        } */

        body.dark-mode .chart-container {
            background-color: black;
        }

        body.dark-mode .chart-container canvas {
            background-color: black;
        }


        @media (max-width: 900px) {
            .chart-container {
                flex-basis: 100%;
                max-width: 100%;
                background-color: white;
                width: 100%;
                display: block;
                /* Change to block to stack vertically */
            }
        }
    </style>
</head>

<body><!-- removed direct declaration of chart from controller -->


    <div class="chart-container">
        <button onclick="downloadPDF()"> PDF Download</button>
        <a>Select</a>
        <select name="dateType" id="dateType" onchange="dateChange()">
            <option value="Days">Days</option>
            <option value="Months">Months</option>
            <!-- <option value="Years">Years</option> -->
        </select>
        <div style="float: right;">

            <label for="birthday">From:</label>
            <input onchange="dateFilter()" type="date" id="fromDate">
            <label for="birthday">To:</label>
            <input onchange="dateFilter()" type="date" id="toDate">
        </div>
        <canvas id="barChart"></canvas>
    </div>

    <div class="chart-container">

        <canvas id="pieChart"></canvas>
    </div>

    <script>
        //converts into json
        var queryAllDates = (<?= json_encode($queryAllDate) ?>);
        var queryAllLabel = (<?= json_encode($chartLabel) ?>);
        var queryAllMonth = (<?= json_encode($queryAllMonth) ?>);
        console.log(queryAllMonth)
        var monthLabel = (<?= json_encode($monthLabel) ?>);


        //create json
        var dataCon = {
            datasets: [{
                    backgroundColor: "rgba(255, 99, 132, 0.7)",
                    label: 'NMD',
                    data: {}
                },
                {
                    backgroundColor: "rgba(153, 102, 255, 0.7)",
                    label: 'STD',
                    data: {}
                }
            ],
        }
        var labels = [];

        //populate json; create child inside of another child
        function chartLoad() {
            var x = 0;
            while (queryAllDates[x] != null) {
                var samp = queryAllDates[x].labels;
                var sampo = parseInt(queryAllDates[x].datasets);
                if (queryAllDates[x].label == 'NMD') {
                    dataCon.datasets[0].data[samp] = sampo;
                }else {
                    dataCon.datasets[1].data[samp] = sampo;
                }
                x++
            }
            x = 0; //just in case while loop decided to be petty
        }

        function labelLoad() {
            var x = 0;
            while (queryAllLabel[x] != null) {
                var lab = queryAllLabel[x].labels;
                labels[x] = lab;
                x++;
            }
            x = 0;
        }


        //same thing as above but for months
        var monthDataCon = {
            datasets: [{
                    backgroundColor: "rgba(255, 99, 132, 0.7)",
                    label: 'NMD',
                    data: {}
                },
                {
                    backgroundColor: "rgba(153, 102, 255, 0.7)",
                    label: 'STD',
                    data: {}
                }
            ],
        }
        var monthLabels = [];

        function monthChartLoad() {
            var x = 0;
            while (queryAllMonth[x] != null) {
                var samp = queryAllMonth[x].labels;
                var sampo = parseInt(queryAllMonth[x].datasets);
                if (queryAllMonth[x].label == 'NMD') {
                    monthDataCon.datasets[0].data[samp] = sampo;
                } else {
                    monthDataCon.datasets[1].data[samp] = sampo;
                }
                x++
            }
            x = 0;
        }

        function monthLabelLoad() {
            var x = 0;
            while (monthLabel[x] != null) {
                var lab = monthLabel[x].labels;
                monthLabels[x] = lab;
                x++;
            }
            x = 0;
        }

        function dateFilterRefresh() { // asign current week's sunday and saturday to datepicker
            //duh
            const today = new Date();
            //get date of this week's sunday
            const sunDay = new Date(
                today.setDate(today.getDate() - today.getDay()),
            );
            //get date of this week's saturday
            const satDay = new Date(
                today.setDate(today.getDate() - today.getDay() + 6),
            );
            //"yyyy-mm-dd" format
            var toSunDay = sunDay.toISOString().slice(0, 10);
            var toSatDay = satDay.toISOString().slice(0, 10);

            //calculated dates as input values
            document.getElementById('fromDate').value = toSunDay;
            document.getElementById('toDate').value = toSatDay;
        }

        chartLoad();
        labelLoad();
        monthChartLoad();
        monthLabelLoad();
        dateFilterRefresh();
        const pieChartData = (<?= json_encode($pieChartData) ?>); //di ma edit pag sa html declared yung canvas/chart
        //Prepare the bar chart 
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: dataCon.datasets
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
                    title: {
                        display: true,
                        text: 'Car Brands Total Order per Year',
                    },
                    legend: {
                        display: true,
                    },
                },
                responsive: true,
                layout: {
                    padding: {
                        left: 15,
                        right: 15,
                        top: 15,
                        bottom: 15,
                    },
                },
            },
        });

        // Prepare the pie chart
        // var pieCtx = document.getElementById('pieChart').getContext('2d');
        // var pieChart = new Chart(pieCtx, {
        //     type: 'doughnut',
        //     data: pieChartData,
        //     options: {
        //         maintainAspectRatio: false,
        //         plugins: {
        //             title: {
        //                 display: true,
        //                 text: 'Transaction Statistics',
        //             },
        //             legend: {
        //                 display: true,
        //             },
        //         },
        //         responsive: true,
        //         layout: {
        //             padding: {
        //                 left: 15,
        //                 right: 15,
        //                 top: 15,
        //                 bottom: 15,
        //             },
        //         },
        //     },
        // });

        function downloadPDF() {
            const pieCanvas = document.getElementById('pieChart');
            const barCanvas = document.getElementById('barChart');
            const tempCanvas = document.createElement('canvas');
            const tempCtx = tempCanvas.getContext('2d');

            // Calculate the total height including space between the charts
            const totalHeight = pieCanvas.height + barCanvas.height + pieCanvas.height + barCanvas.height + 40; // Adding space between charts

            // Set canvas dimensions to accommodate both charts with space
            tempCanvas.width = Math.max(pieCanvas.width, barCanvas.width);
            tempCanvas.height = totalHeight;

            // Set the background color to white on the temporary canvas
            tempCtx.fillStyle = 'white';
            tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);

            // Draw pie chart on the temporary canvas
            tempCtx.drawImage(pieCanvas, 0, 0);

            // Draw bar chart below the first pie chart with space in between
            tempCtx.drawImage(barCanvas, 0, pieCanvas.height + 20); // Adding space

            // Draw another copy of pie chart below the bar chart
            tempCtx.drawImage(pieCanvas, 0, pieCanvas.height + barCanvas.height + 40); // Adding space

            // Create the PDF
            let pdf = new jsPDF();

            // First page
            const canvasImage = tempCanvas.toDataURL('image/jpeg', 1.0);
            pdf.setFontSize(20);
            pdf.addImage(canvasImage, 'JPEG', 15, 15, 190, totalHeight * (190 / tempCanvas.width)); // Adjust positioning and dimensions

            // Draw the title "Car Brands" using vector graphics
            pdf.setFont('helvetica', 'normal'); // Set font to Helvetica (similar to Poppins)
            pdf.setFontSize(16);
            pdf.setTextColor(0, 0, 0); // Set text color to black
            pdf.text(10, 10, "Car Brands");

            // Clean up the temporary canvas
            tempCanvas.width = 0;
            tempCanvas.height = 0;

            // Create a new temporary canvas for the second page
            tempCanvas.width = Math.max(pieCanvas.width, barCanvas.width);
            tempCanvas.height = totalHeight;

            // Set the background color to white on the temporary canvas
            tempCtx.fillStyle = 'white';
            tempCtx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);

            // Draw the duplicated bar chart on the new temporary canvas
            tempCtx.drawImage(barCanvas, 0, 0);

            // Add the second page with the duplicated bar chart
            pdf.addPage();
            const canvasImagePage2 = tempCanvas.toDataURL('image/jpeg', 1.0);
            pdf.addImage(canvasImagePage2, 'JPEG', 15, 15, 190, totalHeight * (190 / tempCanvas.width)); // Adjust positioning and dimensions

            // Save the PDF
            pdf.save('sample.pdf');
        }

        var newDataCon = {
            datasets: []
        };
        newDataCon.datasets = JSON.parse(JSON.stringify(dataCon.datasets)); //will server as a json to be modified fetched from chart data
        const cacheDataCon = {
            datasets: []
        };
        cacheDataCon.datasets = JSON.parse(JSON.stringify(dataCon.datasets)); //reserve as backup dataset, cuz OG gets modified

        const cacheMonthDataCon = {
            datasets: []
        }
        cacheMonthDataCon.datasets = JSON.parse(JSON.stringify(monthDataCon.datasets));

        var dateTypeSelect = document.getElementById('dateType');
        //get current year and month
        const d = new Date();
        let year = d.getFullYear();
        // let janMonth = ("0" + (d.getMonth() - d.getMonth()) + 1).slice(-2); //get current year's january
        let mbs = []

        function toMonthAssign() {
            var x = 0;
            while (monthLabel[x] != null) {
                var lab = monthLabel[x].labels;
                mbs[x] = lab;
                x++;
            }
            x = 0;

        }
        console.log("month label")
        console.log(monthLabel)
        toMonthAssign() //grabs the earliest month record
        let janm = mbs.slice(0, 1).toString().split("-");
        let janMonth = janm[1].toString();
        let currMonth = ("0" + (d.getMonth() + 1)).slice(-2); //get current month

        //dynamic datepicker my man
        function dateChange() {
            var selectedValue = dateTypeSelect.value;
            if (selectedValue === 'Months') {
                
                document.getElementById('fromDate').setAttribute('type', 'month');
                document.getElementById('fromDate').value = `${year}-${janMonth}`;
                document.getElementById('toDate').setAttribute('type', 'month');
                document.getElementById('toDate').value = `${year}-${currMonth}`;

                monthFilter();
                dateFilter();
            } else if (selectedValue === 'Years') {
                document.getElementById('fromDate').setAttribute('type', 'number');
                document.getElementById('fromDate').value = '2019'; //change this to the earliest year record
                document.getElementById('toDate').setAttribute('type', 'number');
                document.getElementById('toDate').value = year;
                dateFilter();
            } else {
                document.getElementById('fromDate').setAttribute('type', 'date');
                document.getElementById('toDate').setAttribute('type', 'date');

                dateFilterRefresh();
                dateFilter();
            }
        };

        function dateFilter() {
            var selectedValue = dateTypeSelect.value;
            if (selectedValue === 'Days') {
                const dateList = [...labels];
                
                //get the contents of the html datepicker
                const fromDateValue = document.getElementById('fromDate');
                const toDatevalue = document.getElementById('toDate');
                
                //get the index of the labels array based on the value of datepicker
                //both array value and date picker value must be matching cAsE sEnSiTiVe to give a result
                const sunIndex = dateList.indexOf(fromDateValue.value);
                const satIndex = dateList.indexOf(toDatevalue.value);

                //slice the labels array based on the sunIndex and satIndex
                const newLabels = dateList.slice(sunIndex, satIndex + 1);
                barChart.config.data.labels = newLabels; //assign new label to the chart

                //new json for new dataset iterates through all object "data"
                newDataCon.datasets.forEach(function(datasets) {
                    var originalDataLog = datasets.data;
                    var newDataLog = {};
                    var keys = Object.keys(originalDataLog);

                    for (var i = sunIndex; i <= satIndex && i < keys.length; i++) { //fetch all values based from sunIndex to satIndex
                        var key = keys[i];
                        newDataLog[key] = originalDataLog[key];
                    }
                    datasets.data = newDataLog;
                });
                console.log(newDataCon);
                barChart.config.data.datasets = newDataCon.datasets; //replace the current chart dataset
                barChart.update(); //udpate the chart
                newDataCon = JSON.parse(JSON.stringify(cacheDataCon)); //reverts the value of the newdataCon prior to modification

            } else if (selectedValue === 'Months') {



                barChart.update();
                monthDataCon = JSON.parse(JSON.stringify(cacheMonthDataCon));
            } else {
                console.log('soon for year filter');
            }

        }

        function monthFilter() {
            const dateList = [...monthLabels];
            while (1 <= barChart.config.data.labels.length) {
                barChart.config.data.labels.pop();
            }
            for (var i = 0; i < barChart.config.data.datasets.length; i++) {
                delete barChart.data.datasets[i];
            }
            barChart.config.data.labels = dateList;
            barChart.config.data.datasets = monthDataCon.datasets;
        }
        dateFilter();
    </script>
</body>

</html>