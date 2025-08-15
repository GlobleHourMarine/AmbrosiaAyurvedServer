<style>
    .filter-section {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: center;
        justify-content: space-between;
        row-gap: 20px;
        padding: 15px 0;
        flex-direction: row;
    }

    .filter-options {
        display: flex;
        gap: 10px;
        background: #f1f3f5;
        padding: 8px 12px;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        flex-wrap: wrap;
    }

    .export-options {
        display: flex;
        gap: 10px;
    }

    .search-box {
        position: relative;
        width: 250px;
    }

    .search-box input {
        width: 100%;
        padding-left: 40px;
        border-radius: 20px;
        border: 1px solid #ced4da;
        font-size: 14px;
        height: 38px;
    }

    .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    .date-filters {
        display: flex;
        gap: 15px;
    }

    .date-group {
        display: flex;
        flex-direction: column;
    }

    .date-group label {
        font-size: 13px;
        font-weight: 500;
        color: #495057;
        margin-bottom: 4px;
        padding-left: 2px;
    }

    .date-group input[type="date"] {
        height: 38px;
        font-size: 14px;
        border-radius: 6px;
        border: 1px solid #ced4da;
        padding: 0 10px;
        width: 160px;
    }

    @media (max-width: 768px) {
        .filter-section {
            flex-direction: column;
            align-items: stretch;
        }

        .filter-options,
        .export-options,
        .search-box,
        .date-filters {
            width: 100%;
        }

        .search-box {
            width: 100%;
            max-width: 100%;
        }

        .date-filters {
            flex-direction: column;
        }

        .date-group input[type="date"] {
            width: 100%;
        }
    }

    /* Highlighted header style if needed */
    .page-title {
        background-color: #eaf2f9;
        padding: 12px 20px;
        border-radius: 10px;
        text-align: left;
        font-weight: 600;
        color: #2f3e52;
        font-size: 20px;
        margin-bottom: 25px;
    }

    /* Radio chip styles */
    .filter-chip {
        position: relative;
        border-radius: 20px;
        background-color: #dee2e6;
        padding: 8px 18px;
        font-size: 14px;
        font-weight: 500;
        color: #495057;
        cursor: pointer;
        transition: all 0.3s ease;
        user-select: none;
        display: flex;
        align-items: center;
    }

    .filter-chip input[type="radio"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .filter-chip input[type="radio"]:checked+span,
    .filter-chip input[type="radio"]:checked {
        background-color: #3f6df3;
        color: white;
        border-radius: 20px;
    }

    .filter-chip input[type="radio"]:checked~span {
        background-color: #3f6df3;
        color: white;
    }

    .filter-chip:hover {
        background-color: #d6d8db;
    }

    .filter-chip span {
        display: inline-block;
        padding: 8px 18px;
        border-radius: 20px;
        width: 100%;
        text-align: center;
        transition: all 0.3s ease;
    }

    .filter-chip input[type="radio"]:checked~span {
        background-color: #3f6df3;
        color: white;
    }

    .filter-chip:hover span {
        background-color: #d0ddfb;
        color: #212529;
    }

    .custom-thead {
        background-color: #e9edf4;
        color: #131212;
    }

    .custom-thead th {
        font-weight: 600;
        font-size: 14px;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 500;
        text-align: center;
        white-space: nowrap;
    }

    .status-delivered {
        background-color: #28a745;
        /* Green */
        color: #fff;
    }

    .status-rejected {
        background-color: #dc3545;
        /* Red */
        color: #fff;
    }

    .status-unknown {
        background-color: #6c757d;
        /* Gray */
        color: #fff;
    }

    .status-pending {
        background-color: #ffc107;
        /* Yellow */
        color: #212529;
    }

    .status-done {
        background-color: #28a745;
        color: #fff;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="content-container navbar-body">
            <!-- <h3 style="background-color:#eaf2f9; text-decoration:none;">Payment Details</h3> -->

            <!-- Filter Section -->
            <div class="filter-section">
                <div class="filter-options">
                    <label class="filter-chip">
                        <input type="radio" name="payment-filter" value="all" checked>
                        <span>All Payments</span>
                    </label>
                    <label class="filter-chip">
                        <input type="radio" name="payment-filter" value="international">
                        <span>International</span>
                    </label>
                    <label class="filter-chip">
                        <input type="radio" name="payment-filter" value="national">
                        <span>National</span>
                    </label>
                </div>

                <div class="date-filters">
                    <div class="date-group">
                        <label for="fromDate">From Date</label>
                        <input type="date" class="form-control" id="fromDate">
                    </div>
                    <div class="date-group">
                        <label for="toDate">To Date</label>
                        <input type="date" class="form-control" id="toDate">
                    </div>
                </div>

                <div class="export-options">
                    <button class="btn btn-success" id="exportPaymentCsv">Export CSV</button>
                    <button class="btn btn-info" id="exportPaymentExcel">Export Excel</button>
                    <button class="btn btn-danger" id="exportPaymentPdf">Export PDF</button>
                </div>

                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search payments..." id="paymentSearch">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="custom-thead">
                        <tr>
                            <th>Customer</th>
                            <th>Payment Type</th>
                            <th>Amount</th>
                            <th>Country</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="paymentsTable">
                        <?php if (!empty($result)): ?>
                            <?php foreach ($result as $key => $payment):
                                // Simplified status
                                $is_done = ($payment->status == 2); // Assuming 2 is "approved/done"
                                $status_class = $is_done ? 'status-done' : 'status-pending';
                                $status_text = $is_done ? 'Done' : 'Pending';

                                // Date formats
                                $formatted_date = date('M d, Y', strtotime($payment->date));  // For display
                                $raw_date = date('Y-m-d', strtotime($payment->date));          // For filtering
                            ?>
                                <tr class="payment-row">
                                    <td><?php echo $payment->fname . ' ' . $payment->lname; ?></td>
                                    <td>
                                        <div class="payment-method">
                                            <i class="fas fa-credit-card payment-icon"></i>
                                            <?php echo !empty($payment->payment_mode) ? ucfirst($payment->payment_mode) : 'N/A'; ?>

                                        </div>
                                    </td>
                                    <td class="amount">₹<?php echo number_format($payment->amount, 2); ?></td>
                                    <td><?php echo $payment->country; ?></td>
                                    <td><?php echo $formatted_date; ?></td>
                                    <td><span class="status-badge <?php echo $status_class; ?>"><?php echo $status_text; ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="no-payments">
                                    <i class="far fa-folder-open"></i>
                                    <h5>No payment records found</h5>
                                    <p>When payments are made, they will appear here</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="pagination-container mt-3"></div>

            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchPayments(page = 1) {
                const filterType = $('input[name="payment-filter"]:checked').val() || '';
                const searchTerm = $('#paymentSearch').val().trim();
                const fromDate = $('#fromDate').val();
                const toDate = $('#toDate').val();

                $.ajax({
                    url: '<?= base_url("Admin_reports/filter_payments"); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        filter_type: filterType,
                        search_term: searchTerm,
                        from_date: fromDate,
                        to_date: toDate,
                        page: page
                    },
                    success: function(response) {
                        const tableBody = $('#paymentsTable').empty();

                        if (response.payment_details?.length) {
                            $.each(response.payment_details, function(index, item) {
                                const rawDate = item.date.replace(' ', 'T');
                                const dateObj = new Date(rawDate);
                                const formattedDate = !isNaN(dateObj.getTime()) ?
                                    dateObj.toLocaleDateString('en-GB', {
                                        day: '2-digit',
                                        month: 'short',
                                        year: 'numeric'
                                    }) :
                                    item.date;

                                const statusMap = {
                                    'completed': ['Done', 'status-delivered'],
                                    'failed': ['Failed', 'status-rejected']
                                };
                                const statusKey = (item.status || '').trim().toLowerCase();
                                const statusInfo = statusMap[statusKey] || ['Unknown', 'status-unknown'];

                                tableBody.append(`
                                <tr>
                                    <td>${item.fname} ${item.lname}</td>
                                    <td>${item.payment_mode || 'N/A'}</td>
                                    <td>Rs.${parseFloat(item.amount).toFixed(2)}</td>
                                    <td>${item.country}</td>
                                    <td>${formattedDate}</td>
                                    <td><span class="status-badge ${statusInfo[1]}">${statusInfo[0]}</span></td>
                                </tr>
                            `);
                            });
                        } else {
                            tableBody.html('<tr><td colspan="6" class="text-center">No payments found.</td></tr>');
                        }

                        const totalAmount = parseFloat(response.total);
                        $('.total-amount p').text('Total Amount: Rs.' + (isNaN(totalAmount) ? '0.00' : totalAmount.toFixed(2)));

                        // 🔄 Build dynamic pagination
                        const totalPages = Math.ceil(response.total_rows / response.limit);
                        const currentPage = parseInt(response.current_page);
                        let paginationHtml = '';

                        if (totalPages > 1) {
                            const start = Math.max(1, currentPage - 2);
                            const end = Math.min(totalPages, currentPage + 2);

                            if (currentPage > 1) {
                                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${currentPage - 1}">&laquo;</a></li>`;
                            }

                            if (start > 1) {
                                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="1">1</a></li>`;
                                if (start > 2) paginationHtml += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                            }

                            for (let i = start; i <= end; i++) {
                                paginationHtml += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                                <a class="page-link" href="#" data-page="${i}">${i}</a>
                            </li>`;
                            }

                            if (end < totalPages) {
                                if (end < totalPages - 1) paginationHtml += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a></li>`;
                            }

                            if (currentPage < totalPages) {
                                paginationHtml += `<li class="page-item"><a class="page-link" href="#" data-page="${currentPage + 1}">&raquo;</a></li>`;
                            }

                            $('.pagination-container').html(`<ul class="pagination justify-content-center">${paginationHtml}</ul>`).show();
                        } else {
                            $('.pagination-container').hide();
                        }
                    },
                    error: function(xhr) {
                        alert("Error fetching data.");
                        console.error(xhr.responseText);
                    }
                });
            }

            // Trigger on filters
            $(document).on('change', 'input[name="payment-filter"], #fromDate, #toDate', function() {
                fetchPayments(1);
            });

            $('#paymentSearch').on('keyup', function() {
                fetchPayments(1);
            });

            $(document).on('click', '.pagination a.page-link', function(e) {
                e.preventDefault();
                const page = parseInt($(this).data('page'));
                if (!isNaN(page)) fetchPayments(page);
            });

            // Initial load
            fetchPayments(1);

            // Export
            function getPaymentFilterParams() {
                return {
                    filter_type: $('input[name="payment-filter"]:checked').val() || '',
                    search_term: $('#paymentSearch').val().trim(),
                    from_date: $('#fromDate').val(),
                    to_date: $('#toDate').val()
                };
            }

            $('#exportPaymentCsv').on('click', function() {
                const params = getPaymentFilterParams();
                params.format = 'csv';
                window.location.href = '<?= base_url('Admin_reports/export_payments'); ?>?' + $.param(params);
            });

            $('#exportPaymentExcel').on('click', function() {
                const params = getPaymentFilterParams();
                params.format = 'excel';
                window.location.href = '<?= base_url('Admin_reports/export_payments'); ?>?' + $.param(params);
            });

            $('#exportPaymentPdf').on('click', function() {
                const params = getPaymentFilterParams();
                params.format = 'pdf';
                window.open('<?= base_url('Admin_reports/export_payments'); ?>?' + $.param(params), '_blank');
            });
        });
    </script>




</body>