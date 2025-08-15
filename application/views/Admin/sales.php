<style>
    .spinner-container {
        text-align: center;
        margin: 20px 0;
    }

    .spinner {
        margin: 0 auto;
        width: 35px;
        height: 35px;
        border: 4px solid #ccc;
        border-top: 4px solid #007bff;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .filter-section {
        margin-bottom: 25px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: center;
    }

    .pagination {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        padding-left: 0;
    }

    .pagination li {
        margin: 2px;
    }


    .status-pending {
        background-color: #f0ad4e;
        /* yellow/orange */
    }

    .status-delivered {
        background-color: #5cb85c;
        /* green */
    }

    .status-rejected {
        background-color: #d9534f;
        /* red */
    }


    .filter-options {
        display: flex;
        gap: 8px;
        background: #f8f9fa;
        padding: 6px 10px;
        border-radius: 6px;
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
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        background: transparent;
        color: #495057;
    }

    .filter-option input:checked+label {
        background: #007bff;
        color: white;
        box-shadow: 0 2px 5px rgba(0, 123, 255, 0.3);
    }

    .search-box {
        position: relative;
        flex-grow: 1;
        max-width: 300px;
    }

    .search-box input {
        padding-left: 40px;
        border-radius: 20px;
        border: 1px solid #dee2e6;
        font-size: 14px;
        height: 34px;
    }

    .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    .total-amount {
        font-weight: bold;
        color: #007bff;
        font-size: 16px;
        margin-left: auto;
    }

    @media (max-width: 768px) {
        .filter-section {
            flex-direction: column;
            align-items: flex-start;
        }

        .filter-options {
            width: 100%;
            justify-content: space-between;
        }

        .search-box {
            max-width: 100%;
            width: 100%;
        }

        .total-amount {
            margin-top: 10px;
            margin-left: 0;
        }

        .table td,
        .table th {
            padding: 8px 10px;
        }
    }

    .table td,
    .table th {
        padding: 8px 10px;
    }

    th {
        font-weight: 600;
        background-color: #eaf2f9;
        font-size: 14px;
    }
</style>

<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="m-0 font-weight-bold text-primary">Sales Details</h4>
            <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <div class="filter-section">
                        <div class="filter-options">
                            <div class="filter-option">
                                <input type="radio" id="filter-all" name="payment-filter" value="all" checked>
                                <label for="filter-all">All</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-international" name="payment-filter" value="international">
                                <label for="filter-international">International</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-national1" name="payment-filter" value="national">
                                <label for="filter-national1">National</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-monthly" name="payment-filter" value="monthly">
                                <label for="filter-monthly">Monthly</label>
                            </div>
                            <div class="filter-option">
                                <input type="radio" id="filter-daily" name="payment-filter" value="daily">
                                <label for="filter-daily">Daily</label>
                            </div>
                        </div>

                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" class="form-control" placeholder="Search payments..." id="paymentSearch">
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col">
                                <label for="fromPaymentDate">From:</label>
                                <input type="date" class="form-control" id="fromPaymentDate">
                            </div>
                            <div class="col">
                                <label for="toPaymentDate">To:</label>
                                <input type="date" class="form-control" id="toPaymentDate">
                            </div>
                        </div>

                        <div class="export-buttons">
                            <button class="btn btn-success" onclick="exportSales('csv')">Export CSV</button>
                            <button class="btn btn-info" onclick="exportSales('excel')">Export Excel</button>
                            <button class="btn btn-danger" onclick="exportSales('pdf')">Export PDF</button>
                        </div>
                    </div>


                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                        <div class="total-amount">Total Amount: <span id="totalAmount">Rs.0.00</span></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="salesTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Country</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Delivery Status</th>
                                </tr>
                            </thead>
                            <tbody id="salesData">
                                <div id="loader" style="display: none;" class="spinner-container">
                                    <div class="spinner"></div>
                                </div>
                            </tbody>

                        </table>
                    </div>
                    <nav>
                        <ul class="pagination justify-content-center" id="pagination"></ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function fetchSales(page = 1) {
        let filter = $('input[name="payment-filter"]:checked').val();
        let search = $('#paymentSearch').val();
        let from_date = $('#fromPaymentDate').val();
        let to_date = $('#toPaymentDate').val();

        $('#loader').show(); // Show loader
        $('#salesData').html(''); // Clear table before new data

        $.ajax({
            url: '<?= base_url("Admin_reports/sales_list_ajax") ?>',
            type: 'GET',
            data: {
                filter_type: filter,
                search_term: search,
                from_date: from_date,
                to_date: to_date,
                page: page
            },
            dataType: 'json',
            success: function(res) {
                let html = '';
                if (res.sales.length) {
                    $.each(res.sales, function(i, sale) {
                        let fullName = `${sale.fname || ''} ${sale.lname || ''}`.trim();
                        let statusMap = {
                            '0': ['Pending', 'badge badge-warning'],
                            '1': ['Done', 'badge badge-success'],
                            '2': ['Rejected', 'badge badge-danger'],
                        };
                        let status = statusMap[sale.payment_status] || ['Unknown', 'badge badge-secondary'];
                        html += `
                        <tr>
                            <td>${fullName}</td>
                            <td>${sale.country || 'N/A'}</td>
                            <td>${sale.mobile || 'No phone'}</td>
                            <td>Rs.${Math.round(parseFloat(sale.amount))}</td>
                            <td>${new Date(sale.date).toLocaleDateString('en-GB')}</td>
                            <td><span class="${status[1]}">${status[0]}</span></td>
                        </tr>`;
                    });
                } else {
                    html = '<tr><td colspan="6" class="text-center">No sales records found.</td></tr>';
                }

                $('#salesData').html(html);
                $('#totalAmount').text('Rs.' + Math.round(res.total_amount));

                // Pagination rendering
                let totalPages = Math.ceil(res.total / res.limit);
                let paginationHtml = '';
                let start = Math.max(1, page - 2);
                let end = Math.min(totalPages, page + 2);

                if (start > 1) {
                    paginationHtml += `<li class="page-item"><a class="page-link" data-page="1">1</a></li>`;
                    if (start > 2) paginationHtml += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                }

                for (let i = start; i <= end; i++) {
                    paginationHtml += `<li class="page-item ${i === page ? 'active' : ''}">
                        <a class="page-link" href="#" data-page="${i}">${i}</a>
                    </li>`;
                }

                if (end < totalPages) {
                    if (end < totalPages - 1) paginationHtml += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                    paginationHtml += `<li class="page-item"><a class="page-link" data-page="${totalPages}">${totalPages}</a></li>`;
                }

                $('#pagination').html(paginationHtml);
            },
            complete: function() {
                $('#loader').hide(); // Hide loader after done
            }
        });
    }

    $(document).on('change', 'input[name="payment-filter"], #fromPaymentDate, #toPaymentDate', function() {
        fetchSales(1);
    });

    $('#paymentSearch').on('keyup', function() {
        fetchSales(1);
    });

    $(document).on('click', '.page-link', function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        fetchSales(page);
    });

    $(document).ready(function() {
        fetchSales();
    });

    function exportSales(format) {
        let filter = $('input[name="payment-filter"]:checked').val();
        let search = $('#paymentSearch').val();
        let from_date = $('#fromPaymentDate').val();
        let to_date = $('#toPaymentDate').val();

        let url = '<?= base_url("Admin_reports/export_sales") ?>' +
            `?filter_type=${encodeURIComponent(filter)}&search_term=${encodeURIComponent(search)}&from_date=${from_date}&to_date=${to_date}&format=${format}`;

        let iframe = document.getElementById('hiddenDownloader');
        if (!iframe) {
            iframe = document.createElement('iframe');
            iframe.id = 'hiddenDownloader';
            iframe.style.display = 'none';
            document.body.appendChild(iframe);
        }
        iframe.src = url;
    }

    $('#exportSalesCSV').click(() => exportSales('csv'));
    $('#exportSalesExcel').click(() => exportSales('excel'));
    $('#exportSalesPDF').click(() => exportSales('pdf'));
</script>