<!-- <html> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Orders | Ambrosia Ayurved - Order History

    </title>
    <meta name="description" content="View your past orders and track their status at Ambrosia Ayurved. Easily access your complete purchase history and order details.">

</head>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="index.css"> -->
<style>
    :root {
        --primary: #0070f3;
        --primary-foreground: #ffffff;
        --secondary: #f5f5f5;
        --secondary-foreground: #111;
        --background: #ffffff;
        --foreground: #111;
        --card: #ffffff;
        --card-foreground: #111;
        --border: #e5e5e5;
        --input: #e5e5e5;
        --ring: #0070f3;
    }

    /* body {
    background-color: var(--background);
    color: var(--foreground);


    .card {
        background-color: var(--card);
        color: var(--card-foreground);
        border-color: var(--border);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* border:4px solid red; */
    }

    .table {
        color: var(--foreground);
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: var(--secondary);
    }

    .form-control,
    .form-select {
        border-color: var(--input);
        background-color: var(--background);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--ring);
        box-shadow: 0 0 0 2px rgba(0, 112, 243, 0.2);
    }

    .btn-outline-primary {
        color: var(--primary);
        border-color: var(--primary);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary);
        color: var(--primary-foreground);
    }

    .pagination .page-link {
        color: var(--primary);
        border-color: var(--border);
    }

    .pagination .active .page-link {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .cont {
        /* border:2px solid black!important; */
        display: flex;
        justify-content: space-between;
    }

    .list {
        border: 1px solid skyblue;
        /* font-weight:bolder !important; */
        border-radius: 6px;
        padding: 0px;
    }

    .box {
        /* border:1px solid black; */
        display: flex;
        height: auto;
    }

    .box-data {
        /* border:1px solid red; */
        width: 24%;
        height: 100px;
        border-radius: 5px;
    }

    .box1 {
        background: linear-gradient(to bottom, #e0f7fa, #80d8ff);
        color: black !important;
        text-align: center;
    }

    .box2 {
        background: linear-gradient(to bottom, #e0f7fa, #80d8ff);
        background: linear-gradient(to bottom, #e0b3ff, #b388ff);
        color: black !important;
        text-align: center;

    }

    .box3 {
        background: linear-gradient(to bottom, #e0f7fa, #80d8ff);
        background: linear-gradient(to bottom, #d4fc79, #96e6a1);
        color: black !important;
        text-align: center;

    }

    .box4 {
        background: linear-gradient(to bottom, #e0f7fa, #80d8ff);
        background: linear-gradient(to bottom, #fff9c4, #ffe57f);
        background: linear-gradient(to bottom, #ffcdd2, #ef9a9a);
        color: black !important;
        text-align: center;



    }

    .remove-btn {
        background-color: red;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 3px 10px;
        font-size: 14px;
        cursor: pointer;
        font-weight: bolder;
        /* margin-left: 10px; Add some spacing between the quantity buttons and the remove button */
    }

    .remove-btn:hover {
        background-color: darkred;
    }

    .bttn {
        padding: 7px 15px;
    }

    .list {
        max-width: 100%;
        overflow: hidden !important;
        margin: auto;
    }



    @media (max-width: 768px) {
        .table-responsive {
            margin-bottom: 1rem;
            border: 0;
        }

        .list {
            /* border:3px solid red ; */
            width: 90%;
            margin: auto;

        }

        .butn {
            /* border:1px solid red; */
            width: 30%;
            margin: auto;
            margin-top: 20px;
        }

        .box {
            width: 100%;
            flex-direction: column;
        }

        .box-data {
            width: 90%;
            margin: auto;

        }

        .btn {
            border: 1px solid black;
            padding: 5px 45px;
            margin-left: -10px !important;
        }

        .list {
            max-width: 100%;
            overflow: hidden !important;
            margin: auto;
        }

        .option-list option {
            border: 1px solid red;
        }

    }

    .track-btn {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 12px;
        font-size: 14px;
        cursor: pointer;
        font-weight: bold;
        box-shadow: 0 0 8px rgba(40, 167, 69, 0.8);
        transition: 0.3s;
    }

    .track-btn:hover {
        background-color: #218838;
        box-shadow: 0 0 12px rgba(40, 167, 69, 1);
    }

    .back-button {
        display: inline-block;
        padding: 12px 20px;
        background-color: #2a7f62;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: 500;
        float: right;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #256e56;
        color: white;
    }

    .offcanvas-backdrop.show {
        opacity: 0 !important;
    }
    .offcanvas-backdrop.show {
        z-index:0 !important; 
    }
    .offcanvas-backdrop {
        z-index: 0 !important;
    }
</style>


<div class="container py-5" style="margin-top:0px z-index:0 !important;">
    <div class="row mb-4 box">
        <div class="col-md-10 mb-3 box-data ">
            <div class="card bg-primary text-white box1">
                <div class="card-body">
                    <h5>Total Orders</h5>
                    <h2><?php echo $stats->total_orders ?? 0; ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 box-data ">
            <div class="card bg-success text-white box2">
                <div class="card-body">
                    <h5>processing orders</h5>
                    <h2><?php echo $stats->processing_orders ?? 0; ?></h2>

                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 box-data ">
            <div class="card bg-info text-white box3">
                <div class="card-body">
                    <h5>Pending Order</h5>
                    <h2><?php echo $stats->pending_orders ?? 0; ?></h2>

                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 box-data ">
            <div class="card bg-info text-white box4">
                <div class="card-body">
                    <h5>order delivered</h5>
                    <h2><?php echo $stats->deleiverd_orders ?? 0; ?></h2>

                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product Name</th>
                            <!-- <th>payment Method</th> -->
                            <th>Status</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th style="text-align:center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($orders) && is_array($orders)) : ?>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?php echo date('M d, Y', strtotime($order->created_at)); ?></td>
                                    <td><?php echo htmlspecialchars($order->product_name); ?></td>
                                    <td>
                                        <?php if ($order->status == '2') : ?>
                                            <span class="badge bg-success bttn">Processing</span>
                                        <?php elseif ($order->status == '1') : ?>
                                            <span class="badge bg-warning bttn">Pending</span>
                                        <?php elseif ($order->status == '0') : ?>
                                            <span class="badge bg-danger bttn">Cancelled</span>
                                        <?php elseif ($order->status == '3') : ?>
                                            <span class="badge bg-secondary bttn">Rejected</span>
                                        <?php elseif ($order->status == '4') : ?>
                                            <span class="badge bg-success bttn">Delivered</span>
                                        <?php elseif ($order->status == '5') : ?>
                                            <span class="badge bg-info bttn">Shipped</span>
                                        <?php else : ?>
                                            <span class="badge bg-dark bttn">Unknown</span>
                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo htmlspecialchars($order->product_quantity); ?></td>
                                    <td><?php echo htmlspecialchars($order->total_price); ?></td>
                                    <td style=" display:flex;justify-content:space-between;">
                                        <div>
                                            <?php if ((int)$order->status !== 5 && (int)$order->status !== 2 && (int)$order->status !== 0): ?>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="order_id" value="<?php echo $order->order_id; ?>">
                                                    <button class="remove-btn" onclick="cancelOrder('<?php echo $order->order_id; ?>')">Cancel</button>
                                                </form>
                                            <?php endif; ?>
                                        </div>

                                        <!-- If the status is processing (status == 2), show popup when user clicks cancel -->
                                        <div>
                                            <?php if ($order->status == '2') : ?>
                                                <button class="track-btn" onclick="showProcessingAlert()">Track Your Order</button>
                                            <?php else : ?>
                                                <a href="<?php echo base_url('track-order/' . $order->order_id); ?>">
                                                    <button class="track-btn">
                                                        Track Your Order
                                                    </button>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center">No orders found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
                <div class="pagination-links">
                    <?= $pagination_links ?>
                </div>
            </div>

            <!-- <nav aria-label="Order history pagination">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav> -->
            <!-- <button><a href='<//?php echo base_url('/') ?>'>Back to home</a></button>
                  -->
            <!-- <a href="<//?php echo base_url('user_information') ?>" class="back-button">Back </a> -->

        </div>
    </div>
</div>
<!-- <script>
    document.querySelectorAll('.form-select').forEach(select => {
        select.addEventListener('click', () => {
            const rect = select.getBoundingClientRect();
            if (rect.right > window.innerWidth) {
                select.style.left = `${window.innerWidth - rect.right}px`;
            }
        });
    });




    $(".track-btn").click(function() {
        let trackingNumber = $(this).data("tracking-number"); // Ensure tracking number is available

        if (!trackingNumber) {
            alert("Tracking number is missing for this order.");
            return;
        }

        $.ajax({
            url: "<?php //echo base_url('tracking/track_status/'); ?>/" + trackingNumber,
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    alert("Tracking Status: " + response.data.status + "\nLast Update: " + response.data.timestamp);
                }
            },
            error: function(xhr, status, error) {
                alert("Error fetching tracking status: " + xhr.responseText);
            }
        });
    });
</script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Show alert if order is in processing
    function showProcessingAlert() {
        alert("You cannot cancel the order as it is in processing.");
    }







    function cancelOrder(orderId) {
        if (confirm("Are you sure you want to cancel the order?")) {
            fetch('<?php echo base_url("cancel_order"); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'order_id=' + encodeURIComponent(orderId),
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        // Now safely redirect the full parent window
                        window.top.location.href = "<?php echo base_url('order'); ?>";
                    } else {
                        alert('Failed to cancel the order.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error cancelling the order.');
                });
        }
    }

    $(document).ready(function(){
  $.ajax({
    url: "<?= base_url('tracking/update_tracking_status');?>",
    type: "GET",
    dataType: "json",
    success: function(response){
      console.log("Status:", response);
    },
    error: function(xhr, status, error){
      console.error("Error:", error);
    }
  });
});
</script>
<!-- </body> -->

<!-- </html> -->