<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gantt Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@^2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@^1"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
            crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-1 align-self-center">
                <img src="https://img.freepik.com/free-vector/bird-colorful-logo-gradient-vector_343694-1365.jpg?w=826&t=st=1701183707~exp=1701184307~hmac=ddd9183d3bc4c64ace279f5bd5e52fdaff8513c2f3a1ec3987098f7f9a623d68" 
                    alt=""
                    width="200px"
                    >
            </div>
            <div class="col-sm-11">
                <div style="width: 80%; margin: auto; text-align: center; height: 500px" class="container">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    
        <div style="text-align: left;" class="mt-4">
            <h5><a href="/">Back</a></h5>
        </div>
    </div>


    <script>
        var options = {
            indexAxis: 'y',
            barPercentage: 1,
            // categoryPercentage: 1,
            // aspectRatio: 2,
            scales: {
                x: {
                    position: 'top',
                    type: 'time',
                    time: {
                        unit: 'hour',
                        displayFormats: {
                            hour: 'HH:00' // Display format with ':00'
                        }
                    },
                    min: new Date('2023-11-28T07:00'),
                    max: new Date('2023-11-28T19:00')
                },
                y: {
                    beginAtZero: true,
                    stacked: true,
                }
            },
            plugins: {
                datalabels: {
                    anchor: 'center',
                    align: 'center',
                    formatter: (value, context) => {
                        return context.dataset.label; // Display dataset label as the value
                    },
                    color: 'white',
                    font: {
                        weight: 'bold',
                        size: 14
                    }
                }
            }
        };

        fetch('/Timeline')
            .then(response => response.json())
            .then(data => {
                var datasets = data.datasets.map(item => ({
                    label: item.label,
                    data: [
                        {
                            x: [item.data.awal, item.data.akhir],
                            y: item.y
                        }
                    ],
                    backgroundColor: item.backgroundColor,
                }));
                Chart.register(ChartDataLabels);
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: datasets
                    },
                    options: options,
                });
            });
    </script>
</body>
</html>
