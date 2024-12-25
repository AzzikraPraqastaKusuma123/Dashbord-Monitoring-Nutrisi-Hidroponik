<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

include "koneksi.php";

// Fetch Data
$query = "SELECT * FROM monitoring ORDER BY timestamp DESC LIMIT 10";
$result = $conn->query($query);
$monitoring_data = [];
$timestamps = [];
$ph_values = [];
$suhu_air_values = [];
$kelembapan_values = [];
$tds_values = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $monitoring_data[] = $row;
        $timestamps[] = $row['timestamp'];
        $ph_values[] = $row['ph'];
        $suhu_air_values[] = $row['suhu_air'];
        $kelembapan_values[] = $row['kelembapan'];
        $tds_values[] = $row['tds'];
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring Nutrisi Hidroponik</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <h1>HydroNutri Control</h1>
        <nav>
            <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="pH.html">pH</a></li>
                <li><a href="suhuair.html">Suhu-Air</a></li>
                <li><a href="kelembapan.html">Kelembapan</a></li>
                <li><a href="tds.html">TDS</a></li>
                <li><a href="logout.php">Log out </a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="overview">
            <h2>Ringkasan Sistem</h2>
            <div class="cards">
                <div class="card">
                    <h3>Status Sistem</h3>
                    <p>Aktif</p>
                </div>
                <div class="card">
                    <h3>Modul Aktif</h3>
                    <p>5</p>
                </div>
                <div class="card">
                    <h3>Total Tanaman</h3>
                    <p>120</p>
                </div>
            </div>
        </section>

        <section id="monitoring">
            <h2>Monitoring Nutrisi</h2>
            <table>
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>pH</th>
                        <th>Suhu Air (°C)</th>
                        <th>Kelembapan (%)</th>
                        <th>TDS (ppm)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($monitoring_data as $data): ?>
                    <tr>
                        <td><?= $data['timestamp'] ?></td>
                        <td><?= $data['ph'] ?></td>
                        <td><?= $data['suhu_air'] ?></td>
                        <td><?= $data['kelembapan'] ?></td>
                        <td><?= $data['tds'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <section id="charts">
            <h2>Grafik Monitoring Nutrisi</h2>
            <div class="charts-grid">
                <div class="chart-card">
                    <canvas id="chartPH"></canvas>
                </div>
                <div class="chart-card">
                    <canvas id="chartSuhuAir"></canvas>
                </div>
                <div class="chart-card">
                    <canvas id="chartKelembapan"></canvas>
                </div>
                <div class="chart-card">
                    <canvas id="chartTDS"></canvas>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 HydroNutri Control. All rights reserved.</p>
    </footer>

    <script>
        const timestamps = <?= json_encode($timestamps) ?>;
        const phValues = <?= json_encode($ph_values) ?>;
        const suhuAirValues = <?= json_encode($suhu_air_values) ?>;
        const kelembapanValues = <?= json_encode($kelembapan_values) ?>;
        const tdsValues = <?= json_encode($tds_values) ?>;

        // Chart Configurations
        const createChart = (ctx, label, data, borderColor, backgroundColor) => {
            return new Chart(ctx, {
                type: 'line',
                data: {
                    labels: timestamps,
                    datasets: [{
                        label,
                        data,
                        borderColor,
                        backgroundColor,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: { responsive: true }
            });
        };

        createChart(document.getElementById('chartPH'), 'pH', phValues, 'rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 0.2)');
        createChart(document.getElementById('chartSuhuAir'), 'Suhu Air (°C)', suhuAirValues, 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 0.2)');
        createChart(document.getElementById('chartKelembapan'), 'Kelembapan (%)', kelembapanValues, 'rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 0.2)');
        createChart(document.getElementById('chartTDS'), 'TDS (ppm)', tdsValues, 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 0.2)');
    </script>
</body>
</html>
