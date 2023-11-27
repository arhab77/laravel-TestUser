<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hourly Production</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
            crossorigin="anonymous">
    </head>
    <body>
        <div style="width: 80%; margin: auto; text-align: center;" class="container">
            <canvas id="myChart"></canvas>
        </div>
        
        <div class="container">
            <div style="text-align: right;" class="mt-4">
                <h5><a href="/chart2">Next</a></h5>
            </div>
        </div>

        <script>
            fetch('/Production')
                .then(response => response.json())
                .then(data => {
                // console.log(data);
                // console.log(data.actual[0]);
                Chart.register(ChartDataLabels);
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00','15:00', '16:00',
                                '17:00','18:00','19:00','20:00','21:00','22:00', '23:00', '00:00', '01:00', '02:00', '03:00', 
                                '04:00','05:00','06:00', '07:00'],
                        datasets: [
                            {
                                label: 'Actual',
                                data: data.actual,
                                backgroundColor: 'lightgreen',
                                borderColor: 'black',
                                borderWidth: 1
                            },
                            {
                                label: 'plan',
                                data: data.plan,
                                backgroundColor: 'white',
                                borderColor: 'black',
                                borderWidth: 1
                            },
                            {
                                label: 'N Loader',
                                data: data.Nloader,
                                backgroundColor: 'brown',
                                borderColor: 'brown',
                                borderWidth: 1
                            },
                            {
                                label: 'EWH',
                                data: data.EWH,
                                backgroundColor: 'red',
                                borderColor: 'red',
                                borderWidth: 1
                            },
                            {
                                label: 'prodity',
                                data: data.prodity,
                                backgroundColor: 'green',
                                borderColor: 'green',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        // indexAxis: 'y',
                        plugins: {
                            datalabels: {
                                anchor: 'start',
                                align: 'top',
                                color: 'black',
                                font: {
                                    weight: 'bold'
                                },
                                formatter: function(value, context) {
                                    if (context.dataset.label === 'Actual') {
                                        return value === null ? '' : value;
                                    }
                                    return '';
                                }
                            }
                        },
                        scales: {
                            x: {
                                stacked: true
                            },
                            y: {
                                stepSize: 1000,
                                max: 10000
                            }
                        }
                    }
                });
            });
        </script>
    </body>
</html>