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

        <div class="container-fluid">
            <div class="content-container navbar-body">
                <!-- Customers Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>City</th>
                                <th>District</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Address Type</th>
                                <th>Full Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($address)) { ?>
                                <?php foreach ($address as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $offset + $key + 1; ?></td> <!-- Correct serial number -->
                                        <td><?php echo $value['user_id']; ?></td>
                                        <td><?php echo $value['city']; ?></td>
                                        <td><?php echo $value['district']; ?></td>
                                        <td><?php echo $value['state']; ?></td>
                                        <td><?php echo $value['country']; ?></td>
                                        <td><?php echo $value['address_type']; ?></td>
                                        <td><?php echo $value['address']; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center">No address added</td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
                <div class="text-center">
                    <?= $pagination ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>