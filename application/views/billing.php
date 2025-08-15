<?php
// echo "<pre>";
// print_r($user_address);
// echo "total";
// print_r($cart_total);
// die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Order Invoice</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: #f1f4f8;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .invoice-box {
      position: relative;
      max-width: 850px;
      margin: 40px auto;
      padding: 30px;
      background: #fff;
      border: 1px solid #dee2e6;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      z-index: 1;
    }

    .invoice-box::before {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      width: 400px;
      height: 400px;
      background: url('https://ambrosiaayurved.in/assets/images/new_logo11.webp') no-repeat center center;
      background-size: contain;
      opacity: 0.08;
      /* reduced from 0.2 */
      filter: brightness(1.2) saturate(0.5);
      /* bright and desaturated for lighter effect */
      mix-blend-mode: multiply;
      transform: translate(-50%, -50%);
      pointer-events: none;
      z-index: 0;
    }


    .invoice-title {
      font-size: 32px;
      font-weight: 600;
      color: #198754;
    }

    .company-name {
      font-size: 20px;
      font-weight: bold;
      color: #343a40;
    }

    .company-address {
      font-size: 14px;
      color: #6c757d;
    }

    .table th,
    .table td {
      vertical-align: middle;
    }

    .summary-box {
      background-color: #e9f7ef;
      border-left: 5px solid #198754;
      padding: 15px;
      margin-top: 20px;
      position: relative;
      z-index: 1;
    }

    @media print {
      body {
        background: #fff !important;
      }

      .btn,
      .text-center.mt-4,
      .no-print,
      nav,
      footer {
        display: none !important;
      }

      .invoice-box {
        box-shadow: none !important;
        border: none !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
        page-break-inside: avoid !important;
      }

      .invoice-box::before {
        opacity: 0.08 !important;
        filter: grayscale(1);
      }

      * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
      }

      @page {
        size: A4 portrait;
        margin: 10mm;
      }
    }
  </style>
</head>

<body>
  <div class="invoice-box">
    <!-- Header Row -->
    <div class="row mb-4">
      <div class="col-md-6 d-flex align-items-start">
        <img src="https://ambrosiaayurved.in/assets/images/new_logo11.webp" alt="Logo" class="me-3"
          style="width: 60px; height: 60px;" />
        <div>
          <div class="company-name">Ambrosia Ayurved</div>
          <div class="company-address">
            Mohali, Punjab<br />
            01762-458122<br />
            care@ambrosiaayurved.in
          </div>
        </div>
      </div>
      <div class="col-md-6 text-end">
        <h2 class="invoice-title">INVOICE</h2>
        <?php
        $invoice_no = 'INV-' . date('Ymd') . rand(100, 999);
        $order_date = date('d M Y');
        ?>

        <p>
          <strong>Invoice #:</strong> <?= $invoice_no ?><br />
          <strong>Order Date:</strong> <?= $order_date ?><br />
          <strong>Status:</strong> <span class="badge bg-success">Paid</span>
        </p>
      </div>
    </div>

    <!-- Customer & Payment Info -->
    <div class="row mb-4">
      <div class="col-md-6">
        <h6 class="fw-bold">Bill To:</h6>
        <p>
          <?= $user_info->fname ?? '' ?> <?= $user_info->lname ?? '' ?><br />
          <?= $user_info->mobile ?? '' ?><br />
          <?= $user_info->email ?? '' ?>
        </p>
      </div>
      <div class="col-md-6 text-end">
        <h6 class="fw-bold">Payment Method:</h6>
        <p>
          Prepaid<br />
          Transaction ID:
        </p>
      </div>
    </div>

    <!-- Items Table -->
    <table class="table table-bordered">
      <thead class="table-success">
        <tr>
          <th>#</th>
          <th>Product</th>
          <th>Qty</th>
          <th>Price (₹)</th>
          <th>Total (₹)</th>
        </tr>
      </thead>
      <table class="table table-bordered">
        <thead class="table-success">
          <tr>
            <th>#</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Price (₹)</th>
            <th>Total (₹)</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $subtotal = 0.0; // ✅ Force float to avoid string + int issue
          foreach ($cart_items as $index => $item):
            $product_id = is_array($item) ? $item['product_id'] : (isset($item->product_id) ? $item->product_id : null);
            $product = $products_info[$product_id] ?? null;
            if ($product):
              $price = isset($item['pack_price']) ? (float)$item['pack_price'] : (float)($item['price'] ?? 0);
              $qty = isset($item['quantity']) ? (int)$item['quantity'] : 1;
              $total = $price * $qty;
              $subtotal += $total; // ✅ Safe now
          ?>
              <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($product->product_name) ?></td>
                <td><?= $qty ?></td>
                <td>₹<?= number_format($price, 2) ?></td>
                <td>₹<?= number_format($total, 2) ?></td>
              </tr>
          <?php endif;
          endforeach; ?>
        </tbody>

        <tfoot>
          <?php
          $gst = $subtotal * (12 / 112); // GST is 12% included
          $base_price = $subtotal - $gst;
          ?>
          <tr>
            <th colspan="4" class="text-end">Base Amount (Excl. GST)</th>
            <th>₹<?= number_format($base_price, 2) ?></th>
          </tr>
          <tr>
            <th colspan="4" class="text-end">Included GST (12%)</th>
            <th>₹<?= number_format($gst, 2) ?></th>
          </tr>
          <tr class="table-success">
            <th colspan="4" class="text-end">Total (Incl. GST)</th>
            <th>₹<?= number_format($subtotal, 2) ?></th>
          </tr>
        </tfoot>
      </table>


      <!-- Summary Section -->
      <div class="summary-box">
        <strong>Thank you for shopping with Ambrosia Ayurved!</strong><br />
        This invoice confirms your purchase and payment. If you have any questions, feel free to contact us.
      </div>

      <!-- Print Button -->
      <div class="text-center mt-4">
        <button class="btn btn-outline-success px-4" onclick="window.print()">🖨️ Print Invoice</button>
        <button class="btn btn-outline-success px-4" onclick="window.location.href='<?= base_url('order') ?>'">
          Order History
        </button>
      </div>
  </div>
  <script>
    // document.addEventListener("DOMContentLoaded", function() {
    //   const orderData = {
    //     // order_id: "<//?=$order_id?>",
    //     order_id: "<?= $_SESSION['merchantOrderId'] ?>",
    //     fname: "<?= $user_address->fname ?>",
    //     lname: "<?= $user_address->lname ?>",
    //     email: "<?= $user_info->email ?>",
    //     phone: "<?= $user_address->mobile ?>",
    //     address: "<?= $user_address->address ?>",
    //     city: "<?= $user_address->city ?>",
    //     state: "<?= $user_address->state ?>",
    //     pincode: "<?= $user_address->pincode ?>",
    //     country: "<?= $user_address->country ?>",
    //     payment_method: "Prepaid", // or "COD"
    //     product_data: <?= json_encode($cart_items) ?>,
    //     subtotal: "<?= $subtotal ?>",
    //   };

    //   console.log(orderData);

    //   // AJAX to your server to push order to Shiprocket
    //   fetch("<?php //base_url('Tracking/create_order') 
                ?>", {
    //       method: "POST",
    //       headers: {
    //         "Content-Type": "application/json"
    //       },
    //       body: JSON.stringify(orderData)
    //     })
    //     .then(res => res.json())
    //     .then(response => {
    //       console.log("Shiprocket Response:", response);
    //     })
    //     .catch(err => console.error("Error pushing to Shiprocket:", err));
    // });
  </script>

</body>

</html>