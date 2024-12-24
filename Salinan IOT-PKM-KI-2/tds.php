<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring Nutrisi Hidroponik</title>
    <link rel="stylesheet" href="css/tds.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <h1>HydroNutri Control</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="pH.php">pH</a></li>
                <li><a href="suhuair.php">Suhu-Air</a></li>
                <li><a href="kelembapan.php">Kelembapan</a></li>
                <li><a href="tds.php">TDS</a></li>
                <li><a href="logout.php">log out </a></li>
            </ul>
        </nav>
    </header>

<body>
    <div class="container">
        <h1>Tampilan Diagram TDS 2024</h1>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script>
        // Data untuk diagram
        const data = {
            labels: ['2024-12-22 18.57.03', '2024-12-23 18.57.03', '2024-12-24 18.57.03', '2024-12-25 18.57.03', '2024-12-26 18.57.03',],
            datasets: [{
                label: 'TDS 2024',
                data: [800, 850, 820, 810, 870],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Konfigurasi diagram
        const config = {
            type: 'bar', // Jenis diagram: bar, line, pie, dll.
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Render diagram
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>

