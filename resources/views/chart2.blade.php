<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Chart</title>
    <!-- Sertakan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Canvas untuk grafik -->
    <canvas id="timelineChart" width="800" height="400"></canvas>

    <script>
        // Ambil data dari server atau sesuaikan dengan cara yang sesuai
        const fetchData = async () => {
            const response = await fetch('/Timeline'); // Gantilah URL dengan URL API Anda
            const data = await response.json();
            return data;
        };

        // Fungsi untuk membuat grafik timeline
        const createTimelineChart = (data) => {
            const ctx = document.getElementById('timelineChart').getContext('2d');
            const operators = data.operator;
            const timelineData = data.data;

            const datasets = [];

            // Iterasi untuk setiap elemen data pada timeline
            timelineData.forEach((item, index) => {
                const dataset = {
                    label: `${item.activity} - ${item.reason}`,
                    backgroundColor: getColor(index), // Fungsi untuk mendapatkan warna berbeda
                    borderColor: 'white',
                    borderWidth: 1,
                    data: [{
                        x: item.operator,
                        y: [item.timeStart, item.timeEnd]
                    }],
                };

                datasets.push(dataset);
            });

            // Konfigurasi chart
            const options = {
                scales: {
                    x: {
                        type: 'category',
                        title: {
                            display: true,
                            text: 'Operator',
                        },
                    },
                    y: {
                        type: 'linear',  // Menggunakan skala linear untuk sumbu y
                        title: {
                            display: true,
                            text: 'Waktu',
                        },
                        ticks: {
                            // Format waktu dalam jam
                            callback: (value, index, values) => {
                                const hours = Math.floor(value / 60);
                                const minutes = value % 60;
                                return `${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
                            },
                        },
                    },
                },
            };

            // Buat chart
            const timelineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    datasets,
                },
                options,
            });
        };

        // Fungsi untuk mendapatkan warna berbeda untuk setiap elemen dataset
        const getColor = (index) => {
            const colors = ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)', 'rgba(75, 192, 192, 0.7)'];
            return colors[index % colors.length];
        };

        // Panggil fungsi fetchData dan createTimelineChart saat halaman dimuat
        window.onload = async () => {
            const data = await fetchData();
            createTimelineChart(data);
        };
    </script>
</body>
</html>
