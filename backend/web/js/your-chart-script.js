// document.addEventListener('DOMContentLoaded', function () {
//     // Decode the JSON data for bar and pie charts
//     var barChartData = JSON.parse(document.getElementById('barChart').getAttribute('data-chart-data'));
//     var pieChartData = JSON.parse(document.getElementById('pieChart').getAttribute('data-chart-data'));

//     // Prepare the bar chart
//     var barCtx = document.getElementById('barChart').getContext('2d');
//     var barChart = new Chart(barCtx, {
//         type: 'bar',
//         data: barChartData,
//         options: {
//             maintainAspectRatio: false,
//             scales: {
//                 y: {
//                     beginAtZero: true,
//                     ticks: {
//                         stepSize: 1,
//                     },
//                     grid: {
//                         display: false,
//                     },
//                 },
//                 x: {
//                     ticks: {
//                         autoSkip: true,
//                         maxTicksLimit: 7,
//                     },
//                     grid: {
//                         display: false,
//                     },
//                 },
//             },
//             plugins: {
//                 title:{
//                     display: true,
//                     text: 'Car Brands Total Order per Year',
//                 },
//                 legend: {
//                     display: true,
//                 },
//             },
//             responsive: true,
//             layout: {
//                 padding: {
//                     left: 15,
//                     right: 15,
//                     top: 15,
//                     bottom: 15,
//                 },
//             },
//         },
//     });

//     // Prepare the pie chart
//     var pieCtx = document.getElementById('pieChart').getContext('2d');
//     var pieChart = new Chart(pieCtx, {
//         type: 'pie',
//         data: pieChartData,
//         options: {
//             maintainAspectRatio: false,
//             plugins: {
//                 title:{
//                     display: true,
//                     text: 'Car Brands General Total Order',
//                 },
//                 legend: {
//                     display: true,
//                 },
//             },
//             responsive: true,
//             layout: {
//                 padding: {
//                     left: 15,
//                     right: 15,
//                     top: 15,
//                     bottom: 15,
//                 },
//             },
//         },
//     });
// });
