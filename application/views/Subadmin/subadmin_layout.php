<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/9985d54170.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<style>
    :root {
        --primary-color: #6c5ce7;
        --secondary-color: #a29bfe;
        --accent-color: #fd79a8;
        --dark-color: #2d3436;
        --light-color: #f5f6fa;
        --success-color: #00b894;
        --info-color: #0984e3;
        --warning-color: #fdcb6e;
        --danger-color: #d63031;
        --sidebar-width: 280px;
        --sidebar-collapsed-width: 80px;
        --transition-speed: 0.3s;
    }

    body,
    html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        color: #333;
        overflow-x: hidden;
    }

    body::-webkit-scrollbar {
        width: 8px;
    }

    body::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    body::-webkit-scrollbar-thumb {
        background: var(--primary-color);
        border-radius: 4px;
    }

    #sidebar-wrapper {
        width: var(--sidebar-width);
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        z-index: 1000;
        box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
        background-color: #eaf2f9 !important;
    }

    #sidebar-wrapper.collapsed {
        width: var(--sidebar-collapsed-width);
    }

    #sidebar-wrapper.collapsed .sidebar-heading,
    #sidebar-wrapper.collapsed .list-group-item span {
        display: none;
    }

    #sidebar-wrapper.collapsed .list-group-item {
        text-align: center;
        padding: 15px 5px;
    }

    #sidebar-wrapper.collapsed .list-group-item i {
        margin-right: 0;
        font-size: 1.5rem;
    }

    .sidebar-heading {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: all var(--transition-speed) ease;
    }

    .sidebar-heading img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .sidebar-heading img:hover {
        transform: scale(1.05);
        border-color: var(--accent-color);
    }

    .list-group-item {
        background-color: transparent !important;
        border: none;
        padding: 15px 25px;
        margin-bottom: 5px;
        font-size: 0.95em;
        color: #a29bfe !important;
        border-left: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .list-group-item:hover,
    .list-group-item.active {
        background-color: rgba(255, 255, 255, 0.05) !important;
        color: blue !important;
        border-left: 2px solid blue;
        font-weight: 600;
    }

    .list-group-item i {
        margin-right: 15px;
        font-size: 1.1rem;
        color: #a29bfe;
        transition: all 0.3s ease;
    }

    .list-group-item:hover i,
    .list-group-item.active i {
        color: blue;
        transform: scale(1.1);
    }

    #page-content-wrapper {
        margin-left: var(--sidebar-width);
        width: calc(100% - var(--sidebar-width));
        transition: all var(--transition-speed) ease;
        min-height: 100vh;
    }

    #wrapper.collapsed #page-content-wrapper {
        margin-left: var(--sidebar-collapsed-width);
        width: calc(100% - var(--sidebar-collapsed-width));
    }

    .navbar {
        background: white !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px 30px;
        position: sticky;
        top: 0;
        z-index: 800;
        background-color: #eaf2f9 !important;
    }

    .navbar-brand {
        font-weight: 700;
        color: var(--primary-color) !important;
        font-size: 1.5rem;
    }

    .username {
        color: var(--primary-color);
        font-weight: 600;
    }

    .btn-logout {
        background: linear-gradient(135deg, var(--danger-color), #c0392b);
        border: none;
        border-radius: 50px;
        padding: 10px 25px;
        color: white;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(214, 48, 49, 0.3);
    }

    .btn-logout:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(214, 48, 49, 0.4);
        color: white;
    }

    .menu-toggle {
        cursor: pointer;
        font-size: 1.5rem;
        color: var(--dark-color);
        transition: all 0.3s ease;
    }

    .menu-toggle:hover {
        color: var(--primary-color);
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        #sidebar-wrapper {
            left: -280px;
        }

        #sidebar-wrapper.collapsed {
            left: 0;
            width: 280px;
        }

        #page-content-wrapper {
            margin-left: 0;
            width: 100%;
        }

        #wrapper.collapsed #sidebar-wrapper {
            left: -280px;
        }

        #wrapper.collapsed #page-content-wrapper {
            margin-left: 0;
        }

        .menu-toggle {
            display: block !important;
        }
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 10px 15px;
        }

        .btn-logout {
            padding: 8px 15px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .navbar {
            padding: 10px 15px;
        }

        .btn-logout {
            padding: 8px 15px;
            font-size: 0.9rem;
        }


    }

    /* Add this to your style section */
    .list-group-item[data-toggle="collapse"] {
        position: relative;
    }

    .list-group-item[data-toggle="collapse"] .fa-angle-down {
        transition: transform 0.3s ease;
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
    }

    .list-group-item[data-toggle="collapse"][aria-expanded="true"] .fa-angle-down {
        transform: translateY(-50%) rotate(180deg);
    }

    .submenu-item {
        padding-left: 60px !important;
        font-size: 0.85em !important;
        background-color: rgba(255, 255, 255, 0.02) !important;
    }

    .submenu-item:hover {
        background-color: rgba(255, 255, 255, 0.05) !important;
    }










    /* Add this to your media query for mobile devices */
    @media (max-width: 992px) {
        #sidebar-wrapper {
            left: -280px;
            transition: all 0.3s ease;
        }

        #sidebar-wrapper.show {
            left: 0;
            width: 280px;
        }

        #wrapper.collapsed #sidebar-wrapper {
            left: -280px;
        }

        #wrapper.collapsed #page-content-wrapper {
            margin-left: 0;
            width: 100%;
        }

        .menu-toggle {
            display: block !important;
        }
    }




    /* Add this to your style section */
    .rotate-180 {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }

    /* Ensure the collapse content has proper padding */
    .collapse.list-group {
        padding-left: 15px;
    }

    /* Make sure submenu items are properly indented */
    .submenu-item {
        padding-left: 50px !important;
        font-size: 0.9em !important;
    }

    /* Style for active menu items */
    .list-group-item.active {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: white !important;
        border-left: 3px solid var(--primary-color) !important;
    }
</style>

<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-dark text-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-2.5" style="border-bottom:2px solid gray;">
                <h4 class="mt-3 " style="color:darkblue;font-weight:600;">Admin Panel</h4>
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="<?php echo base_url('dashboard'); ?>" class="list-group-item list-group-item-action">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
                <!-- Subadmin section  -->
                <a href="#subadmin" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#subadmin">
                    <i class="fas fa-boxes"></i> <span>Subadmin</span>
                    <i class="fas fa-angle-down float-right mt-1"></i>
                </a>
                <div class="collapse list-group" id="subadmin">
                    <a href="<?php echo base_url('AddSubadmin'); ?>" class="list-group-item list-group-item-action submenu-item">
                        <i class="fas fa-plus-circle"></i> <span>Add Subadmin</span>
                    </a>
                    <a href="<?php echo base_url('subadmin-list'); ?>" class="list-group-item list-group-item-action submenu-item">
                        <i class="fas fa-edit"></i> <span>Subadmin List</span>
                    </a>
                </div>
                <a href="<?php echo base_url('all_users_details'); ?>" class="list-group-item list-group-item-action">
                    <i class="fas fa-users"></i> <span>Customers</span>
                </a>
                <!-- Products Management Section -->
                <a href="#productsSubmenu" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#productsSubmenu">
                    <i class="fas fa-boxes"></i> <span>Products</span>
                    <i class="fas fa-angle-down float-right mt-1"></i>
                </a>
                <div class="collapse list-group" id="productsSubmenu">
                    <a href="<?php echo base_url('AddProduct'); ?>" class="list-group-item list-group-item-action submenu-item">
                        <i class="fas fa-plus-circle"></i> <span>Add Product</span>
                    </a>
                    <a href="<?php echo base_url('edit_product_page'); ?>" class="list-group-item list-group-item-action submenu-item">
                        <i class="fas fa-edit"></i> <span>Edit Product</span>
                    </a>
                    <a href="<?php echo base_url('manage_products'); ?>" class="list-group-item list-group-item-action submenu-item">
                        <i class="fa-solid fa-square-plus"></i> <span>Manage Products</span>
                    </a>
                </div>

                <a href="#coupan" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#coupan">
                    <i class="fas fa-boxes"></i> <span>Manage Coupon</span>
                    <i class="fas fa-angle-down float-right mt-1"></i>
                </a>
                <div class="collapse list-group" id="coupan">
                    <a href="<?php echo base_url('add_coupon'); ?>" class="list-group-item list-group-item-action submenu-item">
                        <i class="fas fa-plus-circle"></i> <span>Add Coupon</span>
                    </a>
                    <a href="<?php echo base_url('coupon_list'); ?>" class="list-group-item list-group-item-action submenu-item">
                        <i class="fas fa-trash-alt"></i> <span>Coupon list</span>
                    </a>
                </div>
                <!-- Orders Section -->
                <a href="<?php echo base_url('admin_order_details'); ?>" class="list-group-item list-group-item-action">
                    <i class="fas fa-credit-card"></i> <span>Orders</span>
                </a>
                <a href="<?php echo base_url('payment_details'); ?>" class="list-group-item list-group-item-action">
                    <i class="fas fa-money-bill-wave"></i> <span>Payment Details</span>
                </a>
                <a href="<?php echo base_url('sales_details'); ?>" class="list-group-item list-group-item-action">
                    <i class="fas fa-chart-line"></i> <span>Sales</span>
                </a>

                <!-- Customers Section -->


                <!-- Settings Section -->
                <a href="#settingsSubmenu" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#settingsSubmenu">
                    <i class="fas fa-cog"></i> <span>Settings</span>
                    <i class="fas fa-angle-down float-right mt-1"></i>
                </a>
                <div class="collapse list-group" id="settingsSubmenu">
                    <a href="<?php echo base_url('change_password'); ?>" class="list-group-item list-group-item-action submenu-item">
                        <i class="fas fa-key"></i> <span>Change Password</span>
                    </a>
                    <a href="<?php echo base_url('manage_website'); ?>" class="list-group-item list-group-item-action submenu-item">
                        <i class="fas fa-globe"></i> <span>Manage Website</span>
                    </a>
                </div>
                <a href="<?php echo base_url('banner'); ?>" class="list-group-item list-group-item-action">
                    <i class="fa-solid fa-icons"></i><span>Add Banner</span>
                </a>
                <a href="<?php echo base_url(''); ?>" class="list-group-item list-group-item-action">
                    <i class="fa-sharp-duotone fa-regular fa-circle-user"></i> <span>Home</span>
                </a>

            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Top Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left menu-toggle mr-3" id="menu-toggle"></i>
                    <a class="navbar-brand" href="#">Admin Dashboard</a>
                </div>

                <div class="ml-auto d-flex align-items-center">
                    <div class="mr-3">
                        Welcome, <span class="username"><?php echo $this->session->userdata('name'); ?></span>
                    </div>
                    <a href="<?php echo base_url('admin_logout'); ?>" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </nav>

            <div class="container-fluid">
                <?php if (isset($content)) echo $content; ?>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                $(document).ready(function() {
                    // Toggle sidebar
                    $("#menu-toggle").click(function(e) {
                        e.preventDefault();

                        // For mobile view
                        if ($(window).width() < 992) {
                            $("#sidebar-wrapper").toggleClass("show");
                        }
                        // For desktop view
                        else {
                            $("#wrapper").toggleClass("collapsed");
                            $("#sidebar-wrapper").toggleClass("collapsed");
                        }
                    });

                    // Initialize Bootstrap collapse properly
                    $('[data-toggle="collapse"]').on('click', function(e) {
                        // Toggle the collapse
                        var target = $(this).data('target');
                        $(target).collapse('toggle');

                        // Rotate the arrow icon
                        $(this).find('.fa-angle-down').toggleClass('rotate-180');

                        // Prevent default only if it's not a link that should navigate
                        if ($(this).attr('href') === '#') {
                            e.preventDefault();
                        }
                    });

                    // Close sidebar when clicking outside on mobile
                    $(document).click(function(e) {
                        if ($(window).width() < 992) {
                            if (!$(e.target).closest('#sidebar-wrapper').length &&
                                !$(e.target).is('#menu-toggle') &&
                                $('#sidebar-wrapper').hasClass('show')) {
                                $('#sidebar-wrapper').removeClass('show');
                            }
                        }
                    });

                    // Prevent closing when clicking inside sidebar
                    $('#sidebar-wrapper').click(function(e) {
                        e.stopPropagation();
                    });
                });
            </script>



</body>

</html>