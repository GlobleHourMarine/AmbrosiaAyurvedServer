<style>
    .order-header {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        border-radius: 8px 8px 0 0;
    }

    .filter-section {
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: center;
        padding: 15px 0;
    }

    .status-processing {
        background-color: #17a2b8;
        /* Teal / Info tone (Bootstrap Info) */
    }

    .filter-options {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        background: #f8f9fa;
        padding: 8px 12px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .filter-option {
        position: relative;
    }

    .filter-option input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .filter-option label {
        display: block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        background: #e9ecef;
        color: #495057;
        white-space: nowrap;
    }

    .filter-option input:checked+label {
        background: #4e73df;
        color: white;
        box-shadow: 0 2px 8px rgba(78, 115, 223, 0.4);
    }

    .search-box {
        position: relative;
        flex-grow: 1;
        min-width: 250px;
    }

    .search-box input {
        padding-left: 40px;
        border-radius: 20px;
        border: 1px solid #dee2e6;
        font-size: 14px;
        height: 38px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    .date-range-picker {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .date-range-picker input {
        border-radius: 20px;
        padding: 6px 12px;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .total-summary {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    .summary-card {
        flex: 1;
        min-width: 150px;
        background: white;
        border-radius: 8px;
        padding: 12px 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .summary-card h5 {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .summary-card .value {
        font-size: 18px;
        font-weight: 600;
        color: #4e73df;
    }

    .status-badge {
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-delivered {
        background-color: #d1fae5;
        color: #065f46;
    }

    .status-pending {
        background-color: #fef3c7;
        color: #92400e;
    }

    .status-cancelled {
        background-color: #fee2e2;
        color: #991b1b;
    }

    .status-shipped {
        background-color: #dbeafe;
        color: #1e40af;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
        border-top: none;
    }

    .table td {
        vertical-align: middle;
    }

    .pagination .page-item.active .page-link {
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .pagination .page-link {
        color: #4e73df;
    }

    .action-btn {
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        transition: all 0.2s;
    }

    .action-btn:hover {
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .filter-section {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-options {
            justify-content: center;
        }

        .search-box {
            width: 100%;
        }

        .date-range-picker {
            flex-direction: column;
            width: 100%;
        }

        .summary-card {
            min-width: 100%;
        }
    }

    td {
        font-size: 14px;
    }

    .total-amount {
        font-weight: bold;
        color: #007bff;
        font-size: 16px;
        margin-left: auto;
    }
</style>

<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow mb-4">
                <!-- <div class="card-header order-header py-3"> -->
                <h4 class="m-0 font-weight-bold text-white " style="bckground-color:#eaf2f9;">Orders Management</h4>
                <!-- </div> -->

                <h5 style="background-color:#eaf2f9;text-align:center;margin:0px;padding:10px 0px;">Orders management</h5>
                <div class="card-body">
                    <div class="filter-section">
                        <div class="filter-options">
                            <div class="filter-option">
                                <input type="radio" id="filter-all" name="order-filter" value="all" checked>
                                <label for="filter-all">All Orders</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-international" name="order-filter" value="international">
                                <label for="filter-international">International</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-national" name="order-filter" value="national">
                                <label for="filter-national">National</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-delivered" name="order-filter" value="delivered">
                                <label for="filter-delivered">Delivered</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-pending" name="order-filter" value="pending">
                                <label for="filter-pending">Pending</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-cancelled" name="order-filter" value="cancelled">
                                <label for="filter-cancelled">Cancelled</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-shipped" name="order-filter" value="shipped">
                                <label for="filter-shipped">Shipped</label>
                            </div>
                        </div>
                        <div class="date-range-picker row">
                            <div class="col">
                                <input type="date" class="form-control" id="fromDate" placeholder="From Date">
                            </div>
                            <div class="col">
                                <input type="date" class="form-control" id="toDate" placeholder="To Date">
                            </div>
                        </div>
                        <div class="export-options mt-3">
                            <button class="btn btn-success" id="exportCsv">Export CSV</button>
                            <button class="btn btn-info" id="exportExcel">Export Excel</button>
                            <button class="btn btn-danger" id="exportPdf">Export PDF</button>
                        </div>
                        <div style="display:flex;justify-content:space-between; width:100%;">
                            <div class="search-box" style="width:30%;">
                                <i class="fas fa-search"></i>
                                <input style="width:50%;" type="text" class="form-control" placeholder="Search orders..." id="orderSearch">
                            </div>
                            <div class="total-amount" style="width:30%;">
                                <p>Total Amount : Rs.<?php echo $total ?></p>
                            </div>

                        </div>



                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="ordersTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Country</th>

                                    <th>Product ID</th>
                                    <th>No. of Products</th>
                                    <th>Product Amount</th>
                                    <th>GST</th>
                                    <th>Total Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($order_details)): ?>
                                    <tr>
                                        <td colspan="11" class="text-center">No orders found.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($order_details as $value): ?>
                                        <tr>
                                            <td>#ORD- <?php echo $value['order_id'] ?></td>
                                            <td>CUST-<?php echo $value['user_id'] ?></td>
                                            <td><?php echo $value['fname'] . ' ' . $value['lname'] ?></td>
                                            <td><?php echo $value['country'] ?></td>
                                            <td>PROD-<?php echo $value['product_id'] ?></td>
                                            <td><?php echo $value['product_quantity'] ?></td>
                                            <td>Rs.<?php echo $value['product_price'] ?></td>
                                            <td>Rs.<?php echo number_format($value['product_price'] * 0.12, 2) ?></td>
                                            <td>Rs.<?php echo $value['total_price'] ?></td>
                                            <td><?php echo date('d M Y', strtotime($value['created_at'])) ?></td>
                                            <td>
                                                <?php
                                                switch ($value['status']) {
                                                    case 0:
                                                        echo '<span class="status-badge status-cancelled">Cancelled</span>';
                                                        break;
                                                    case 1:
                                                        echo '<span class="status-badge status-pending">Pending</span>';
                                                        break;
                                                    case 2:
                                                        echo '<span class="status-badge status-processing">processing</span>';
                                                        break;
                                                    case 3:
                                                        echo '<span class="status-badge status-rejected">Rejected</span>';
                                                        break;
                                                    case 4:
                                                        echo '<span class="status-badge status-delivered">Delivered</span>';
                                                        break;

                                                    default:
                                                        echo '<span class="status-badge status-unknown">Unknown</span>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        <?php echo $pagination; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchOrders(page = 0) {
            var filterType = $('input[name="order-filter"]:checked').val();
            var searchTerm = $('#orderSearch').val();
            var fromDate = $('#fromDate').val();
            var toDate = $('#toDate').val();
            var offset = page;

            $.ajax({
                url: '<?php echo base_url('Admin_reports/filter_orders'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    filter_type: filterType,
                    search_term: searchTerm,
                    from_date: fromDate,
                    to_date: toDate,
                    page: offset
                },
                success: function(response) {
                    var ordersTableBody = $('#ordersTable tbody');
                    ordersTableBody.empty();

                    if (response.order_details.length > 0) {
                        $.each(response.order_details, function(index, order) {
                            var statusBadgeClass = '';
                            var statusText = '';
                            switch (parseInt(order.status)) {
                                case 0:
                                    statusBadgeClass = 'status-cancelled';
                                    statusText = 'Cancelled';
                                    break;
                                case 1:
                                    statusBadgeClass = 'status-pending';
                                    statusText = 'Pending';
                                    break;
                                case 2:
                                    statusBadgeClass = 'status-processing';
                                    statusText = 'Processing';
                                    break;
                                case 3:
                                    statusBadgeClass = 'status-rejected';
                                    statusText = 'Rejected';
                                    break;
                                case 4:
                                    statusBadgeClass = 'status-delivered';
                                    statusText = 'Delivered';
                                    break;
                                default:
                                    statusBadgeClass = 'status-unknown';
                                    statusText = 'Unknown';
                            }

                            var gst = (parseFloat(order.product_price) * 0.12).toFixed(2);

                            var newRow = '<tr>' +
                                '<td>#ORD- ' + order.order_id + '</td>' +
                                '<td>CUST-' + order.user_id + '</td>' +
                                '<td>' + order.fname + ' ' + order.lname + '</td>' +
                                '<td>' + order.country + '</td>' +
                                '<td>PROD-' + order.product_id + '</td>' +
                                '<td>' + order.product_quantity + '</td>' +
                                '<td>Rs.' + order.product_price + '</td>' +
                                '<td>Rs.' + gst + '</td>' +
                                '<td>Rs.' + order.total_price + '</td>' +
                                '<td>' + new Date(order.created_at).toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric'
                                }) + '</td>' +
                                '<td><span class="status-badge ' + statusBadgeClass + '">' + statusText + '</span></td>' +
                                '</tr>';
                            ordersTableBody.append(newRow);
                        });
                    } else {
                        ordersTableBody.append('<tr><td colspan="11" class="text-center">No orders found for the selected filters.</td></tr>');
                    }

                    $('.total-amount p').text('Total Amount : Rs.' + parseFloat(response.total).toFixed(2));
                    $('.pagination-container').html(response.pagination);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                    alert("An error occurred while fetching orders. Please try again.");
                }
            });
        }

        // Event listeners
        $('input[name="order-filter"]').on('change', function() {
            fetchOrders(0);
        });

        $('#orderSearch').on('keyup', function() {
            fetchOrders(0);
        });

        $('#fromDate, #toDate').on('change', function() {
            fetchOrders(0);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var page = 0;

            var urlParams = new URLSearchParams(url.split('?')[1]);
            if (urlParams.has('page')) {
                page = parseInt(urlParams.get('page'));
            }

            fetchOrders(page);
        });

        // Export
        function getFilterParams() {
            return {
                filter_type: $('input[name="order-filter"]:checked').val(),
                search_term: $('#orderSearch').val(),
                from_date: $('#fromDate').val(),
                to_date: $('#toDate').val()
            };
        }

        $('#exportCsv').on('click', function() {
            var params = getFilterParams();
            params.format = 'csv';
            window.location.href = '<?php echo base_url('Admin_reports/export_orders'); ?>?' + $.param(params);
        });

        $('#exportExcel').on('click', function() {
            var params = getFilterParams();
            params.format = 'excel';
            window.location.href = '<?php echo base_url('Admin_reports/export_orders'); ?>?' + $.param(params);
        });

        $('#exportPdf').on('click', function() {
            var params = getFilterParams();
            params.format = 'pdf';
            window.location.href = '<?php echo base_url('Admin_reports/export_orders'); ?>?' + $.param(params);
        });

        // Initial load
        fetchOrders(0);
    });
</script>