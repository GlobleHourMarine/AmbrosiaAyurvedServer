<style>
    body,
    html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fa;
    }

    body::-webkit-scrollbar {
        display: none;
    }

    .container-fluid {
        padding: 20px;
    }

    .content-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
        padding: 25px;
        margin-bottom: 25px;
    }

    .heading {
        color: black;
        background-color: #eaf2f9;
        text-align: center;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
        font-size: 24px;
        font-weight: 600;
        position: relative;
    }

    .heading:after {
        content: "";
        position: absolute;
        bottom: 8px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(to right, #ffc107, #ff9800);
    }

    /* Summary Cards */
    .summary-cards {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .summary-card {
        flex: 1;
        min-width: 200px;
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border-top: 4px solid;
        text-align: center;
    }

    .summary-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .summary-card.total {
        border-top-color: #007bff;
    }

    .summary-card.international {
        border-top-color: #28a745;
    }

    .summary-card.national {
        border-top-color: #ffc107;
    }

    .summary-card.new {
        border-top-color: #dc3545;
    }

    .summary-card h4 {
        font-size: 16px;
        color: #6c757d;
        margin-bottom: 10px;
    }

    .summary-card .count {
        font-size: 28px;
        font-weight: 700;
        color: #343a40;
        margin: 10px 0;
    }

    .summary-card .subtext {
        font-size: 14px;
        color: #6c757d;
    }

    /* Filter Section */
    .filter-section {
        margin-bottom: 25px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: center;
    }

    .filter-options {
        display: flex;
        gap: 10px;
        background: #f1f3f5;
        padding: 8px;
        border-radius: 8px;
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
        padding: 6px 15px;
        border-radius: 6px;
        font-size: 14px;
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
        border: 1px solid #e9ecef;
        font-size: 14px;
        height: 40px;
        box-shadow: none;
    }

    .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #adb5bd;
    }

    /* Table Styles */
    .table-responsive {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }

    .table {
        margin-bottom: 0;
        font-size: 14px;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead th {
        background-color: #eaf2f9 !important;
        /* color: rgba(0, 123, 255, 0.03) !important; */
        font-weight: 500;
        border: none;
        padding: 15px;
        position: sticky;
        top: 0;
        color: black !important;
    }

    .table tbody tr {
        transition: all 0.2s;
    }

    .table tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.03);
    }

    .table td {
        vertical-align: middle;
        padding: 12px 15px;
        border-color: #f1f1f1;
    }

    .country-flag {
        width: 20px;
        height: 15px;
        object-fit: cover;
        border-radius: 2px;
        margin-right: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
        min-width: 70px;
        text-align: center;
    }

    .status-active {
        background-color: #d4edda;
        color: #155724;
    }

    .status-inactive {
        background-color: #f8d7da;
        color: #721c24;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .no-customers {
        text-align: center;
        padding: 40px;
        color: #6c757d;
    }

    .no-customers i {
        font-size: 50px;
        margin-bottom: 15px;
        color: #e9ecef;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .summary-cards {
            flex-direction: column;
        }

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

        .table td,
        .table th {
            padding: 10px 12px;
        }
    }

    /* Animation for table rows */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .table tbody tr {
        animation: fadeIn 0.3s ease-out;
        animation-fill-mode: both;
    }

    .table tbody tr:nth-child(1) {
        animation-delay: 0.1s;
    }

    .table tbody tr:nth-child(2) {
        animation-delay: 0.2s;
    }

    .table tbody tr:nth-child(3) {
        animation-delay: 0.3s;
    }

    .table tbody tr:nth-child(4) {
        animation-delay: 0.4s;
    }

    .table tbody tr:nth-child(5) {
        animation-delay: 0.5s;
    }
</style>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar code remains the same -->
        <!-- <div id="page-content-wrapper"> -->

        <div class="container-fluid">
            <div class="content-container navbar-body">
                <!-- <h5 class="heading">Customer Management</h5> -->

                <!-- Summary Cards -->
                <div class="summary-cards">
                    <div class="summary-card total">
                        <h4>Total Customers</h4>
                        <div class="count"><?php echo isset($user_stats['total_users']) ? $user_stats['total_users'] : '0'; ?></div>
                        <div class="subtext">All registered users</div>
                    </div>

                    <div class="summary-card national">
                        <h4>National Customers</h4>
                        <div class="count"><?php echo isset($user_stats['india_users']) ?  $user_stats['india_users'] : '0'; ?></div>
                        <div class="subtext">From your country</div>
                    </div>

                    <div class="summary-card international">
                        <h4>International</h4>
                        <div class="count"><?php echo isset($user_stats['foreign_users']) ? $user_stats['foreign_users'] : '0'; ?></div>
                        <div class="subtext">From other countries</div>
                    </div>

                    <div class="summary-card new">
                        <h4>New Customers</h4>
                        <div class="count"><?php echo isset($user_stats['new_users']) ? $user_stats['new_users'] : '0'; ?></div>
                        <div class="subtext">Last 30 days</div>
                    </div>
                </div>
                <div class="export-options mt-3">
                    <button class="btn btn-success" id="exportUserCsv">Export CSV</button>
                    <button class="btn btn-info" id="exportUserExcel">Export Excel</button>
                    <button class="btn btn-danger" id="exportUserPdf">Export PDF</button>
                </div>
                <!-- Filter Section -->
                <div class="filter-section">
                    <div class="filter-options">
                        <div class="filter-option">
                            <input type="radio" id="filter-all" name="customer-filter" value="all" checked>
                            <label for="filter-all">All</label>
                        </div>
                        <div class="filter-option">
                            <input type="radio" id="filter-national" name="customer-filter" value="national">
                            <label for="filter-national">National</label>
                        </div>
                        <div class="filter-option">
                            <input type="radio" id="filter-international" name="customer-filter" value="international">
                            <label for="filter-international">International</label>
                        </div>
                        <div class="filter-option">
                            <input type="radio" id="filter-new" name="customer-filter" value="new">
                            <label for="filter-new">New (30d)</label>
                        </div>
                    </div>

                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Search customers..." id="customerSearch">
                    </div>
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <label for="fromDate">From:</label>
                            <input type="date" class="form-control" id="fromDate">
                        </div>
                        <div class="col">
                            <label for="toDate">To:</label>
                            <input type="date" class="form-control" id="toDate">
                        </div>
                    </div>
                </div>

                <!-- Customers Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>User ID</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Country</th>
                                <th>Registered</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <!-- AJAX content loads here -->
                        </tbody>


                    </table>
                </div>
                </table>
                <div id="paginationContainer" class="mt-3"></div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        function loadUsers(page = 1) {
            const filter_type = $("input[name='customer-filter']:checked").val() || 'all';
            const search_term = $('#customerSearch').val().trim();
            const from_date = $('#fromDate').val();
            const to_date = $('#toDate').val();

            const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            if ((from_date && !dateRegex.test(from_date)) || (to_date && !dateRegex.test(to_date))) {
                alert("Invalid date format. Please use the date picker.");
                return;
            }

            $('#userTableBody').html('<tr><td colspan="7" class="text-center">Loading...</td></tr>');

            $.post('<?= base_url("Admin_reports/fetch_users_ajax") ?>', {
                filter_type,
                search_term,
                from_date,
                to_date,
                page
            }, function(res) {
                let html = '';

                if (res && Array.isArray(res.users) && res.users.length) {
                    $.each(res.users, function(i, user) {
                        const regDate = new Date(user.created_at).toLocaleDateString('en-GB');
                        const fullName = `${user.fname} ${user.lname}`;

                        html += `
                    <tr>
                        <td>${user.user_id}</td>
                        <td contenteditable="true" class="editable" data-id="${user.user_id}" data-field="name">${fullName}</td>
                        <td contenteditable="true" class="editable" data-id="${user.user_id}" data-field="email">${user.email || 'No email'}</td>
                        <td contenteditable="true" class="editable" data-id="${user.user_id}" data-field="mobile">${user.mobile || 'No phone'}</td>
                        <td contenteditable="true" class="editable" data-id="${user.user_id}" data-field="country">${user.country || 'N/A'}</td>
                        <td>${regDate}</td>
                        <td><a href="<?= base_url('Address/') ?>${user.user_id}" class="btn btn-sm btn-info">View</a></td>
                    </tr>`;
                    });
                } else {
                    html = `<tr><td colspan="7" class="text-center">No customers found</td></tr>`;
                }

                $('#userTableBody').html(html);

                const total = parseInt(res?.total || 0);
                const perPage = parseInt(res?.per_page || 10);
                const totalPages = Math.ceil(total / perPage);

                let paginationHtml = '';
                for (let i = 1; i <= totalPages; i++) {
                    paginationHtml += `<button class="btn btn-sm ${i === page ? 'btn-primary' : 'btn-light'} me-1" onclick="loadUsers(${i})">${i}</button>`;
                }
                $('#paginationContainer').html(paginationHtml);
            }, 'json').fail(function() {
                $('#userTableBody').html('<tr><td colspan="7" class="text-center text-danger">Failed to load data</td></tr>');
            });
        }

        function getUserFilterParams() {
            return {
                filter_type: $("input[name='customer-filter']:checked").val() || 'all',
                search_term: $('#customerSearch').val().trim(),
                from_date: $('#fromDate').val(),
                to_date: $('#toDate').val()
            };
        }

        function updateUserField($el) {
            if (!$el || typeof $el.data !== 'function') return;

            const userId = $el.data('id');
            const field = $el.data('field');
            const value = $el.text().trim();

            if (!userId || !field) return;

            $.post('<?= base_url("Admin_reports/update_user_field") ?>', {
                user_id: userId,
                field: field,
                value: value
            }, function() {
                $el.css('background-color', '#d4edda');
                setTimeout(function() {
                    $el.css('background-color', '');
                }, 300);
            }).fail(function() {
                alert('Failed to update. Please try again.');
            });
        }

        function debounce(func, delay) {
            let timer;
            return function(...args) {
                clearTimeout(timer);
                timer = setTimeout(() => func.apply(this, args), delay);
            };
        }

        $(document).ready(function() {
            loadUsers();

            $("input[name='customer-filter'], #fromDate, #toDate").on("change", () => loadUsers(1));
            $('#customerSearch').on('input', () => loadUsers(1)); 

            const debouncedUpdate = debounce((e) => {
                updateUserField($(e.target));
            }, 800);

            $(document).on('input', '.editable', debouncedUpdate);

            $(document).on('keydown', '.editable', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    updateUserField($(this));
                    $(this).blur();
                }
            });

            $('#exportUserCsv').click(function() {
                const params = getUserFilterParams();
                params.format = 'csv';
                window.location.href = '<?= base_url("Admin_reports/export_users") ?>?' + $.param(params);
            });

            $('#exportUserExcel').click(function() {
                const params = getUserFilterParams();
                params.format = 'excel';
                window.location.href = '<?= base_url("Admin_reports/export_users") ?>?' + $.param(params);
            });

            $('#exportUserPdf').click(function() {
                const params = getUserFilterParams();
                params.format = 'pdf';
                window.open('<?= base_url("Admin_reports/export_users") ?>?' + $.param(params), '_blank');
            });
        });
    </script>

</body>