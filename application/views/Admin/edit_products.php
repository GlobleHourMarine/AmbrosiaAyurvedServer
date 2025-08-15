<style>
    .bg-dark {
        background-color: #343a40 !important;
    }

    .text-white {
        color: #fff !important;
    }

    .primary-text {
        color: #ffc107 !important;
    }

    .second-text {
        color: #adb5bd !important;
    }

    .second-text:hover {
        color: #ffc107 !important;
        /* color:orange; */
    }

    .dash:hover {
        cursor: pointer;
    }


    .collapse-menu {
        padding-left: 30px;
    }

    .container-fluid {

        height: calc(100vh - 100px);
        overflow-y: auto;
    }

    #profile {
        border-radius: 35px 35px;
    }

    .username {
        color: #ffc107;
        /* color:darkorange; */
    }


    .btn-danger {
        background-color: transparent;
        border: none;
        font-size: 18px;
        font-weight: bold;
        border-radius: 8px;
        transition: 0.3s;
        color: #ffc107;
    }

    .btn-danger:hover {
        background-color: rgb(255, 195, 13);
        /* Darker shade for hover effect */
        box-shadow: 0px 4px 10px rgba(241, 237, 0, 0.5);
        transform: scale(1.05);
    }

    .btn-danger i {
        margin-right: 8px;
        /* Space between icon and text */
    }

    .content-container {
        /* border:5px solid #343a40 ; */
        /* background-color: #343a40 ; */
        width: 100%;
        margin: auto;
        height: auto;

    }

    .product-actions .btn i {
        /* margin-right: 4px; */
        min-width: 100px;

    }

    /* Add your CSS styling here */
    .container {
        max-width: 1000px;
        margin: auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .product-card img {
        max-width: 150px;
        border-radius: 8px;
        margin-right: 20px;
    }

    .product-card h3 {
        margin-top: 0;
    }

    .product-info {
        flex: 1;
    }

    .product-actions {
        text-align: right;
    }

    .product-actions button {
        background-color: #d9534f;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
    }

    .product-actions button:hover {
        background-color: #c9302c;
    }

    .heading {
        color: rgb(91, 85, 214);
        /* color:rgba(3, 154, 143, 1); */
        /* background-color:pink; */

        background-color: rgb(206, 231, 255);
        text-align: center;
        padding: 8px;

    }


    .modal-dialog {
        max-width: 40%;
        /* Adjust width */
        margin: auto;
        /* Center it */
    }

    .modal-content {
        border-radius: 15px;
        /* Rounded corners */
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        /* Soft shadow */
        background: #fff;
        margin-top: 10px;
        padding: 7px;
    }

    .modal-header {
        background: #343a40;
        /* Dark header */
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        /* text-align:center; */
    }

    .modal-body {
        padding: 15px;
    }

    .close {
        color: white;
        font-size: 20px;
    }

    .text-success {
        color: darkgreen !important;
        font-weight: bold;
        font-size: 20px;
        text-align: center;
        text-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
        /* Whitish glow */
        animation: glow-white 1.5s infinite alternate;
        text-align: center;

    }

    .succeed {
        color: #f5f5dc !important;
    }

    /* Whitish glow animation */
    @keyframes glow-white {
        from {
            text-shadow: 0 0 8px rgba(40, 167, 69, 0.8);
            /* text-shadow: 0px 0px 8px rgba(40, 167, 69, 0.8); */

        }

        to {
            text-shadow: 0 0 15px rgba(40, 167, 69, 0.8);
        }
    }

    body {
        overflow-x: hidden;
    }


    @media (max-width: 768px) {
        #sidebar-wrapper {
            position: fixed;
            top: 0;
            left: -250px;
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            transition: left 0.3s ease-in-out;
            z-index: 1050;
        }

        #wrapper.toggled #sidebar-wrapper {
            left: 0;
        }

        #page-content-wrapper {
            width: 100%;
            overflow-x: hidden;
        }

        .navbar {
            padding: 15px;
        }
    }

    @media (max-width: 586px),
    (max-width: 480px) {
        .form-container {
            width: 95% !important;
            /* height:auto; */
            margin-top: -130px !important;
            /* border:2px solid red; */

        }


        .navbar-body {
            /* border:3px solid red !important; */
            margin: 0px !important;
            width: 100%;
            height: auto;
            /* padding-top:0px !important; */
        }

        .container-fluid {
            /* border:3px solid green !important; */
            padding: 0px !important;
            height: auto;


        }

        .btn-danger,
        .btn-primary {
            font-size: 16px;
            padding: 10px 16px;
        }

        .sidebar-heading img {
            width: 100px;
            height: 100px;
        }

        /* .list-group-item span {
        font-size: 16px;
    } */


        .product-card {
            /* border:3px solid pink; */
            flex-direction: column;

        }
    }
</style>

<body>
    <div class="d-flex" id="wrapper">
        <div class="container-fluid">
            <div class="content-container navbar-body">
                <?php if (!empty($product_data)): ?>
                    <div class="container edit-product">
                        <h2 class="heading">Edit Products</h2>
                        <h5 class="text-success"><?php echo $this->session->flashdata('message') ?></h5>

                        <?php foreach ($product_data as $product): ?>
                            <?php
                            $images = json_decode($product->image);
                            $first_image = !empty($images[0]) ? base_url($images[0]) : base_url('assets/no-image.png');
                            ?>
                            <div class="product-card">
                                <img src="<?= $first_image; ?>" alt="<?= htmlspecialchars($product->product_name); ?>" />
                                <div class="product-info">
                                    <h3><?= $product->product_name; ?></h3>
                                    <p><strong>Description:</strong> <?= $product->discription; ?></p>
                                    <p><strong>Price:</strong> <?= $product->price; ?> Rs</p>
                                </div>
                                <div class="d-flex flex-wrap justify-content-md-end justify-content-start align-items-center gap-2 mt-3">

                                    <!-- Edit Button -->
                                    <button type="button" class="btn btn-sm btn-outline-primary edit-product-btn" data-id="<?= $product->product_id; ?>">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                    </button>

                                    <!-- Remove Button -->
                                    <form id="remove-product-form-<?= $product->product_id; ?>" action="<?= base_url('remove_product_action'); ?>" method="POST" style="display: none;">
                                        <input type="hidden" name="product_id" value="<?= $product->product_id; ?>">
                                    </form>
                                    <button type="button" class="btn btn-sm btn-outline-danger remove-product-btn" data-product-id="<?= $product->product_id; ?>">
                                        <i class="fas fa-trash-alt me-1"></i> Remove
                                    </button>

                                    <!-- View Package Button -->
                                    <a href="<?= base_url('view_package/' . $product->product_id); ?>" class="btn btn-sm btn-outline-success">
                                        <i class="fa fa-eye me-1"></i> View Package
                                    </a>

                                </div>


                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="container">
                        <p>No products found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="editProductFrame" src="" width="100%" height="450px" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        setInterval(function() {
            $.ajax({
                url: "<?php echo base_url('User_data/check_session'); ?>",
                method: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.status === 'expired') {
                        $('#sessionExpiredModal').modal('show');
                    }
                }
            });
        }, 300000);

        $("#close-sidebar").click(function() {
            $("#wrapper").removeClass("toggled");
        });

        $(document).ready(function() {
            $(".edit-product-btn").click(function() {
                var productId = $(this).attr("data-id");
                var url = "<?php echo base_url('update_product_details'); ?>";
                $("#editProductFrame").attr("src", url + "?product_id=" + productId);
                $("#editProductModal").modal("show");
            });
            $(".remove-product-btn").click(function() {
                var productId = $(this).data("product-id");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to delete this product!",
                    icon: 'warning',
                    iconColor: '#007bff', // Bootstrap blue
                    showCancelButton: true,
                    confirmButtonColor: '#ff0000ff', // Blue confirm button
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    background: '#eaf4ff', // Light blue background
                    color: '#000', // Text color
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#remove-product-form-" + productId).submit();
                    }
                });
            });
        });
    </script>
</body>

</html>