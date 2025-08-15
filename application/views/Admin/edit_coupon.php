<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Coupon</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* New Styles for the Select Dropdown */
        select {
            font-size: 16px;
            background-color: #fff;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }

        select:focus {
            outline: none;
            border-color: #4CAF50;
        }

        select option {
            padding: 10px;
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Edit Coupon</h1>
        <?php
        if ($this->session->flashdata('success')) {
        ?>
            <h3 class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></h3>
        <?php
        }
        if ($this->session->flashdata('error')) {
        ?>
            <h3 class="alert alert-danger"><?php $this->session->flashdata('error'); ?></h3>
        <?php
        }
        ?>
        <form action="<?php echo base_url('update_coupon_code'); ?>" method="POST">
            <div class="form-group">
                <label for="coupon-code">Coupon Code</label>
                <input type="text" id="coupon-code" name="coupon-code" placeholder="Enter your coupon code" value="<?php echo $result->coupon_code; ?>" oninput="this.value = this.value.toUpperCase();" required>
            </div>
            <div class="form-group">
                <label for="discount">Discount Percent %</label>
                <input type="text" id="discount" name="discount" placeholder="Enter discount percentage" value="<?php echo $result->discount; ?>" required>
            </div>
            <div class="form-group">
                <label for="expiry-date">Expiry Date</label>
                <input type="date" id="expiry-date" name="expiry-date" value="<?php echo $result->expiry_date; ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="active" <?php echo ($result->status == 'active') ? 'selected' : ''; ?>>Active</option>
                    <option value="unactive" <?php echo ($result->status == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>
            <button type="submit">Apply Coupon</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('expiry-date');
            const currentDate = new Date().toISOString().split('T')[0];

            // Only set current date if there's no value already set by PHP
            if (!dateInput.value) {
                dateInput.value = currentDate;
            }

            // Always set the minimum allowed date to today
            dateInput.setAttribute('min', currentDate);
        });
    </script>


</body>

</html>