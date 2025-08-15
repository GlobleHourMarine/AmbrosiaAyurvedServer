    <style>
        .content-container {
            padding: 20px 15px 5px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            margin-bottom: 25px;
            border-left: 3px solid;
            padding: 0px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-primary {
            border-left-color: var(--primary-color);
        }

        .card-success {
            border-left-color: var(--success-color);
        }

        .card-info {
            border-left-color: var(--info-color);
        }

        .card-warning {
            border-left-color: var(--warning-color);
        }

        .card-danger {
            border-left-color: var(--danger-color);
        }

        .card-secondary {
            border-left-color: #6c757d;
        }

        .card-purple {
            border-left-color: var(--primary-color);
        }

        .card-pink {
            border-left-color: var(--accent-color);
        }

        .card-body {
            padding: 10px 20px 10px;
        }

        .card-icon {
            font-size: 1.5rem;
            margin-bottom: 15px;
            opacity: 0.8;
        }

        .card-title {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .card-value {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .card-footer {
            background-color: transparent;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            font-size: 0.85rem;
            color: #6c757d;
            padding: 15px 25px;
        }

        /* Recent Orders Table Styles */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #495057;
            border-collapse: collapse;
        }

        .table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 12px 15px;
            border-bottom: 1px solid #dee2e6;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        /* Badge Styles */
        .badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        .badge-success {
            background-color: var(--success-color);
            color: white;
        }

        .badge-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .badge-warning {
            background-color: var(--warning-color);
            color: #212529;
        }

        /* Sales Chart Styles */
        .sales-chart {
            padding: 15px;
        }

        .progress {
            background-color: #e9ecef;
            border-radius: 0.25rem;
        }

        .progress-bar {
            transition: width 0.6s ease;
        }

        /* Card Header Styles */
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h5 {
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
            color: var(--dark-color);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        .delay-4 {
            animation-delay: 0.4s;
        }

        .delay-5 {
            animation-delay: 0.5s;
        }

        .delay-6 {
            animation-delay: 0.6s;
        }

        .delay-7 {
            animation-delay: 0.7s;
        }

        .delay-8 {
            animation-delay: 0.8s;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .card {
                margin-bottom: 15px;
            }

            .content-container {
                padding: 20px;
                margin: 15px;
            }

            .card-body {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .content-container {
                padding: 15px;
                margin: 10px;
            }

            .card-value {
                font-size: 1.5rem;
            }
        }




        .payment-view {
            transition: all 0.3s ease;
        }

        .flag-icon {
            width: 1em;
            height: 1em;
            border-radius: 50%;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
        }

        .payment-amount {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .payment-label {
            font-size: 0.9rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .payment-card {
            border-left: 4px solid;
            padding-left: 15px;
            margin-bottom: 15px;
        }

        .payment-card-international {
            border-left-color: #6c5ce7;
        }

        .payment-card-india {
            border-left-color: #00b894;
        }

        /* Chart Card Styling */
        .chart-card {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            padding: 20px;
            border: 1px solid #f1f3f5;
            transition: all 0.3s ease;
        }

        .chart-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
        }

        /* Chart Container */
        .chart-container {
            height: 350px;
            width: 100%;
            position: relative;
        }

        /* Chart Title */
        .chart-card h5 {
            font-size: 1rem;
            font-weight: 600;
            color: #212529;
        }

        /* Chart Toggle Buttons */
        .btn-outline-primary {
            font-size: 0.85rem;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 6px;
            border: 1px solid #0d6efd;
            transition: all 0.2s ease;
            color: #0d6efd;
            background-color: #fff;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        .btn-outline-primary.active {
            background-color: #0d6efd !important;
            color: #fff !important;
            box-shadow: 0 2px 6px rgba(13, 110, 253, 0.3);
        }

        /* Legend & Tooltip Fonts */
        .chartjs-legend,
        .chartjs-tooltip {
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            font-size: 13px;
        }

        /* Light Grid Lines */
        .chartjs-render-monitor line {
            stroke: #f1f3f5;
        }

        /* Point styling handled in JS config */
    </style>
    
    <!-- Main Content -->
    <div class="container-fluid p-4">
        <div class="content-container">
            <!-- Dashboard Cards -->
            <!-- Dashboard Cards -->
            <div class="row">
                <!-- Total Orders Card -->
                <div class="col-md-6 col-lg-3 fade-in delay-1">
                    <a href="<?php echo base_url('admin_order_details'); ?>" style="text-decoration: none; color: inherit;">
                        <div class="card card-success h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title mb-1">Total Orders</h6>
                                        <h3 class="card-value mb-0"><?php echo isset($total_orders) ? $total_orders : 0 ?></h3>
                                    </div>
                                    <i class="fas fa-shopping-cart card-icon text-success"></i>
                                </div>
                                <div class="card-footer px-0 py-0 bg-transparent mt-2">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Total Customers Card -->
                <div class="col-md-6 col-lg-3 fade-in delay-2">
                    <a href="<?php echo base_url('all_users_details'); ?>" style="text-decoration: none; color: inherit;">
                        <div class="card card-info h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title mb-1">Total Customers</h6>
                                        <h3 class="card-value mb-0"><?php echo isset($total_coustomer) ? $total_coustomer : 0 ?></h3>
                                    </div>
                                    <i class="fas fa-users card-icon text-info"></i>
                                </div>
                                <div class="card-footer px-0 py-0 bg-transparent mt-2">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Pending Deliveries Card -->
                <div class="col-md-6 col-lg-3 fade-in delay-3">
                    <a href="<?php echo base_url('admin_order_details'); ?>" style="text-decoration: none; color: inherit;">

                        <div class="card card-warning h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title mb-1">Pending Deliveries</h6>
                                        <h3 class="card-value mb-0"><?php echo isset($pending_orders) ? $pending_orders : 0 ?></h3>

                                    </div>
                                    <i class="fas fa-truck card-icon text-warning"></i>
                                </div>
                                <div class="card-footer px-0 py-0 bg-transparent mt-2">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Sold Products Card -->
                <div class="col-md-6 col-lg-3 fade-in delay-4">
                    <a href="<?php echo base_url('admin_order_details'); ?>" style="text-decoration: none; color: inherit;">

                        <div class="card card-danger h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title mb-1">Sold Products</h6>
                                        <h3 class="card-value mb-0"><?php echo isset($order_deleverd) ? $order_deleverd : 0 ?></h3>
                                    </div>
                                    <i class="fas fa-check-circle card-icon text-danger"></i>
                                </div>
                                <div class="card-footer px-0 py-0 bg-transparent mt-2">
                                </div>
                            </div>
                        </div>
                </div>
                </a>
            </div>

            <!-- Second Row of Cards -->
            <div class="row mt-3">
                <!-- Cancelled Orders Card -->
                <div class="col-md-6 col-lg-3 fade-in delay-5">
                    <a href="<?php echo base_url('admin_order_details'); ?>" style="text-decoration: none; color: inherit;">

                        <div class="card card-secondary h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title mb-1">Cancelled Orders</h6>
                                        <h3 class="card-value mb-0"><?php echo isset($cancel_orders) ? $cancel_orders : 0 ?></h3>
                                    </div>
                                    <i class="fas fa-times-circle card-icon text-secondary"></i>
                                </div>
                                <div class="card-footer px-0 py-0 bg-transparent mt-2">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- New Customers Card -->
                <div class="col-md-6 col-lg-3 fade-in delay-6">
                    <a href="<?php echo base_url('all_users_details'); ?>" style="text-decoration: none; color: inherit;">

                        <div class="card card-purple h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title mb-1">New Customers</h6>
                                        <h3 class="card-value mb-0"><?php echo isset($new_user) ? $new_user : 0 ?></h3>

                                    </div>
                                    <i class="fas fa-user-plus card-icon text-purple"></i>
                                </div>
                                <div class="card-footer px-0 py-0 bg-transparent mt-2">
                                    <small class="text-muted">Last 30 days</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Revenue Card -->
                <div class="col-md-6 col-lg-3 fade-in delay-7">
                    <div class="card card-primary h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="card-title mb-1">GST Rate</h6>
                                    <h3 class="card-value mb-0">12%</h3>
                                </div>
                                <i class="fas fa-dollar-sign card-icon text-primary"></i>
                            </div>
                            <div class="card-footer px-0 py-0 bg-transparent mt-2">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Return Rate Card -->
                <div class="col-md-6 col-lg-3 fade-in delay-8">
                    <a href="<?php echo base_url('sales_details'); ?>" style="text-decoration: none; color: inherit;">

                        <div class="card card-pink h-100">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="card-title mb-1">Monthly Sale</h6>
                                        <h3 class="card-value mb-0">
                                            Rs.<?php echo isset($current_month_total['total_amount']) ? $current_month_total['total_amount'] : 0; ?>
                                        </h3>
                                    </div>
                                    <i class="fas fa-exchange-alt card-icon text-pink"></i>
                                </div>
                                <div class="card-footer px-0 py-0 bg-transparent mt-2">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Add this after your second row of cards (before the closing </div> of content-container) -->

            <div class="row mt-4">
                <!-- Recent Orders -->
                <div class="col-lg-6 fade-in">
                    <div class="card" style="border-left:none;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Recent Orders</h5>
                            <a href="<?php echo base_url('admin_order_details'); ?>" class="btn btn-sm btn-outline-primary">View All</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Order Date</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders_history as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value->product_name ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($value->created_at)); ?></td>
                                                <td>Rs.<?php echo $value->price ?></td>
                                                <?php
                                                switch ($value->status) {
                                                    case 0:
                                                        $status_label = 'Cancelled';
                                                        $badge_class = 'badge-danger';
                                                        break;
                                                    case 1:
                                                        $status_label = 'Pending';
                                                        $badge_class = 'badge-warning';
                                                        break;
                                                    case 2:
                                                        $status_label = 'Processing';
                                                        $badge_class = 'badge-info';
                                                        break;
                                                    case 3:
                                                        $status_label = 'Rejected';
                                                        $badge_class = 'badge-secondary';
                                                        break;
                                                    case 4:
                                                        $status_label = 'Delivered';
                                                        $badge_class = 'badge-success';
                                                        break;
                                                    default:
                                                        $status_label = 'Unknown';
                                                        $badge_class = 'badge-dark';
                                                }
                                                ?>
                                                <td><span class="badge <?php echo $badge_class; ?>"><?php echo $status_label; ?></span></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales Chart -->
                <div class="col-lg-6 fade-in">
                    <div class="card chart-card p-4 h-100">
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

                        <div class="chart-container" style="height: 350px;">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add this after the existing row with Recent Orders and Sales Overview -->
            <div class="row mt-4">
                <div class="col-lg-12 fade-in">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Payment Distribution by Region</h5>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary active" id="viewChart">Chart View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" id="viewTable">Table View</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Chart View -->
                            <div id="chartView" class="payment-view">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="payment-chart-container" style="height: 300px; position: relative;">
                                            <canvas id="regionPieChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="payment-chart-container" style="height: 300px; position: relative;">
                                            <canvas id="countryBarChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Table View (hidden by default) -->
                            <div id="tableView" class="payment-view" style="display: none;">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Country</th>
                                                <th>Sessions</th>
                                                <th>Payment Amount</th>
                                                <th>Percentage</th>
                                            </tr>
                                        </thead>

                                        </tbody>
                                        <tbody>
                                            <?php foreach ($country_table as $row): ?>
                                                <tr>
                                                    <td>
                                                        <i class="flag-icon flag-icon-mr-2<?= strtolower(substr($row['country'], 0, 2)) ?>"></i>
                                                        <?= htmlspecialchars($row['country']) ?>
                                                    </td>
                                                    <td><?= $row['sessions'] ?></td>
                                                    <td><?= $row['payment'] ?></td>
                                                    <td>
                                                        <div class="progress" style="height: 6px;">
                                                            <div class="progress-bar bg-success"
                                                                role="progressbar"
                                                                style="width: <?= $row['percentage'] ?>%"
                                                                aria-valuenow="<?= $row['percentage'] ?>"
                                                                aria-valuemin="0"
                                                                aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <small><?= $row['percentage'] ?>%</small>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-footer text-muted">
                                        <small>Data updated 3 hours ago</small>
                                    </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                data: {
                    type
                },
                dataType: 'json',
                success: function(response) {
                    const labels = response.labels || [];
                    const data = response.data || [];

                    const ctx = document.getElementById('salesChart').getContext('2d');

                    if (chart) {
                        chart.destroy();
                    }

                    chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Sales',
                                data: data,
                                borderColor: '#6610f2',
                                backgroundColor: 'rgba(102, 16, 242, 0.2)',
                                fill: true,
                                tension: 0.4,
                                borderWidth: 3,
                                pointBackgroundColor: '#fff',
                                pointBorderColor: '#6610f2',
                                pointHoverBackgroundColor: '#6610f2',
                                pointHoverBorderColor: '#fff',
                                pointRadius: 5,
                                pointHoverRadius: 7
                            }]
                        },
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
                                        font: {
                                            weight: '500'
                                        },
                                        callback: function(value) {
                                            return 'Rs. ' + value.toLocaleString();
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Chart load failed:', error);
                    alert("Unable to load chart data. Please try again.");
                }
            });
        }

        // Ensure DOM is ready before loading chart
        document.addEventListener('DOMContentLoaded', function() {
            loadChartData('monthly');
        });
    </script>



    <!-- Add this script after your existing chart.js script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle between chart and table view
            document.getElementById('viewChart').addEventListener('click', function() {
                document.getElementById('chartView').style.display = 'block';
                document.getElementById('tableView').style.display = 'none';
                this.classList.add('active');
                document.getElementById('viewTable').classList.remove('active');
            });

            document.getElementById('viewTable').addEventListener('click', function() {
                document.getElementById('chartView').style.display = 'none';
                document.getElementById('tableView').style.display = 'block';
                this.classList.add('active');
                document.getElementById('viewChart').classList.remove('active');
            });

            // Region Pie Chart
            const regionChartData = <?= json_encode($region_chart); ?>;

            const regionCtx = document.getElementById('regionPieChart').getContext('2d');
            const regionPieChart = new Chart(regionCtx, {
                type: 'doughnut',
                data: {
                    labels: regionChartData.labels,
                    datasets: [{
                        data: regionChartData.data,
                        backgroundColor: ['#00b894', '#6c5ce7'],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.raw + '%';
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Payment Distribution by Region',
                            font: {
                                size: 16
                            }
                        }
                    },
                    cutout: '70%'
                }
            });

            // Country Bar Chart

            const countryChartData = <?= json_encode($country_chart); ?>;
            console.log(countryChartData);

            const countryCtx = document.getElementById('countryBarChart').getContext('2d');
            const countryBarChart = new Chart(countryCtx, {
                type: 'bar',
                data: {
                    labels: countryChartData.labels,
                    datasets: [{
                        label: 'Payment Amount (in thousands)',
                        data: countryChartData.data,
                        backgroundColor: [
                            'rgba(0, 184, 148, 0.7)',
                            'rgba(108, 92, 231, 0.7)',
                            'rgba(253, 203, 110, 0.7)',
                            'rgba(253, 121, 168, 0.7)',
                            'rgba(214, 48, 49, 0.7)',
                            'rgba(108, 92, 231, 0.7)',
                            'rgba(0, 184, 148, 0.7)',
                            // ... repeat or add more if you have more countries
                        ],
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'All Countries by Payment Amount',
                            font: {
                                size: 16
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Rs.' + context.raw.toLocaleString() + ',000';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: false,
                                maxRotation: 45,
                                minRotation: 45
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rs.' + value + 'k';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>