<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background: #f8f9fa;
        }

        .chart-card {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .btn-outline-primary.active {
            background-color: #0d6efd;
            color: #fff;
        }

        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
        }

        .dashboard-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .dashboard-subtitle {
            color: #6c757d;
            font-size: 1rem;
        }
    </style>
</head>
<body>

    <div class="container py-5">
        <div class="text-center mb-4">
            <div class="dashboard-title">📊 Sales Dashboard</div>
            <div class="dashboard-subtitle">Track your sales performance over time</div>
        </div>

        <div class="card chart-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Sales Overview</h5>
                <div class="btn-group" role="group">
                    <button class="btn btn-outline-primary" id="btn-daily" onclick="loadChartData('daily')">
                        <i class="bi bi-calendar-day"></i> Daily
                    </button>
                    <button class="btn btn-outline-primary" id="btn-weekly" onclick="loadChartData('weekly')">
                        <i class="bi bi-calendar-week"></i> Weekly
                    </button>
                    <button class="btn btn-outline-primary active" id="btn-monthly" onclick="loadChartData('monthly')">
                        <i class="bi bi-calendar-month"></i> Monthly
                    </button>
                    <button class="btn btn-outline-primary" id="btn-yearly" onclick="loadChartData('yearly')">
                        <i class="bi bi-calendar3"></i> Yearly
                    </button>
                </div>
            </div>

            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        let chart;

        function setActiveButton(type) {
            $("#btn-daily, #btn-weekly, #btn-monthly, #btn-yearly").removeClass("active");
            $(`#btn-${type}`).addClass("active");
        }

        function loadChartData(type = 'monthly') {
            setActiveButton(type);

            $.ajax({
                url: '<?= base_url("admin_dashboard/get_sales_data") ?>',
                method: 'POST',
                data: { type },
                dataType: 'json',
                success: function (response) {
                    const labels = response.labels;
                    const data = response.data;

                    const ctx = document.getElementById('salesChart').getContext('2d');

                    const chartData = {
                        labels: labels,
                        datasets: [{
                            label: 'Sales',
                            data: data,
                            borderColor: '#6610f2',
                            backgroundColor: '#6610f2',
                            fill: false,
                            tension: 0.3,
                            borderWidth: 3,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#6610f2',
                            pointHoverBackgroundColor: '#6610f2',
                            pointHoverBorderColor: '#fff',
                            pointRadius: 5,
                            pointHoverRadius: 7
                        }]
                    };

                    const config = {
                        type: 'line',
                        data: chartData,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            animation: {
                                duration: 1000,
                                easing: 'easeInOutQuart'
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    labels: {
                                        color: '#343a40',
                                        font: {
                                            size: 14,
                                            weight: 'bold'
                                        }
                                    }
                                },
                                tooltip: {
                                    backgroundColor: '#343a40',
                                    titleColor: '#fff',
                                    bodyColor: '#f8f9fa',
                                    borderColor: '#6610f2',
                                    borderWidth: 1
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        color: '#dee2e6'
                                    },
                                    ticks: {
                                        color: '#495057',
                                        font: {
                                            weight: '500'
                                        }
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: '#dee2e6'
                                    },
                                    ticks: {
                                        color: '#495057',
                                        stepSize: 1000,
                                        font: {
                                            weight: '500'
                                        }
                                    }
                                }
                            }
                        }
                    };

                    if (chart) chart.destroy();
                    chart = new Chart(ctx, config);
                }
            });
        }

        // Load default (monthly)
        loadChartData('monthly');
    </script>

</body>
</html>
