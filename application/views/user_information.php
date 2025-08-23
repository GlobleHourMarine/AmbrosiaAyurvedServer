<!-- <!DOCTYPE html>
<html lang="en"> -->

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter&display=swap"> 
 <title>Checkout Page</title> -->
    <style>
        /* Base Styles */
        .checkout-base-styles * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", sans-serif;
        }

        .checkout-body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .checkout-main-container {
            display: flex;
            max-width: 1200px;
            margin: 30px auto;
            gap: 30px;
            padding: 0 20px;
        }

        /* Form Container */
        .checkout-form-container {
            flex: 1;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
            animation: checkout-fadeIn 0.5s ease-out;
        }

        .checkout-form-header {
            margin-bottom: 25px;
            text-align: center;
        }

        .checkout-form-header h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 8px;
        }

        .checkout-form-header .checkout-divider {
            width: 60px;
            height: 3px;
            background: #3498db;
            margin: 0 auto;
            border-radius: 3px;
        }

        /* Form Sections */
        .checkout-form-section {
            margin-bottom: 25px;
            animation: checkout-slideUp 0.5s ease-out;
        }

        .checkout-section-title {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .checkout-section-title .checkout-icon {
            margin-right: 10px;
            color: #3498db;
        }

        /* Input Styles */
        .checkout-form-group {
            margin-bottom: 15px;
        }

        .checkout-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        .checkout-input-row {
            display: flex;
            gap: 15px;
        }

        .checkout-input-row .checkout-form-group {
            flex: 1;
        }

        .checkout-input,
        .checkout-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .checkout-input:focus,
        .checkout-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }

        /* Radio Buttons */
        .checkout-radio-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        .checkout-radio-option {
            display: flex;
            align-items: center;
        }

        .checkout-radio-option input {
            width: auto;
            margin-right: 8px;
        }

        .checkout-address-wrapper {
            position: relative;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding-right: 40px;
        }

        /* Address Cards */
        .checkout-address-cards {
            /* display: grid; */
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .checkout-address-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            padding-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            margin-top: 5px;
        }

        .checkout-address-card:hover {
            border-color: #3498db;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .checkout-address-card.selected {
            border: 2px solid #3498db;
            background-color: #f8fafc;
        }

        .checkout-address-card input {
            position: absolute;
            opacity: 0;
        }

        .checkout-address-card .checkout-address-content {
            pointer-events: none;
        }

        .checkout-address-card h4 {
            margin-bottom: 8px;
            color: #2c3e50;
        }

        .checkout-address-card p {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .checkout-add-new-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            background: #f8fafc;
            border: 1px dashed #ccc;
            border-radius: 8px;
            color: #3498db;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .checkout-add-new-btn:hover {
            background: #f0f4f8;
            border-color: #3498db;
        }

        /* Login Section */
        .checkout-login-section {
            background: #f8fafc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid #e0e0e0;
        }

        .checkout-login-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .checkout-login-toggle h3 {
            font-size: 16px;
            color: #2c3e50;
        }

        .checkout-toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .checkout-toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .checkout-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 24px;
        }

        .checkout-slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        .checkout-toggle-switch input:checked+.checkout-slider {
            background-color: #3498db;
        }

        .checkout-toggle-switch input:checked+.checkout-slider:before {
            transform: translateX(26px);
        }

        /* Button Styles */
        .checkout-btn {
            display: inline-block;
            padding: 12px 24px;
            /* background: #3498db; */
            color: black !important;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            width: 100%;
        }

        .checkout-btn:hover {
            background: #1f8f1bff !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            color: white !important;
        }

        /* Cart Section */
        .checkout-cart-container {
            width: 380px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 25px;
            position: sticky;
            top: 30px;
            animation: checkout-fadeIn 0.5s ease-out 0.2s forwards;
        }

        /* Animations */
        @keyframes checkout-fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes checkout-slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .checkout-main-container {
                flex-direction: column;
            }

            .checkout-cart-container {
                width: 100%;
                position: static;
                margin-top: 30px;
            }
        }

        @media (max-width: 576px) {
            .checkout-input-row {
                flex-direction: column;
                gap: 0;
            }

            .checkout-address-cards {
                grid-template-columns: 1fr;
            }

            .coupan-section-of-amb {
                /* border:2px solid red !important; */

            }

            #couponCode {
                /* border:3px solid black !important; */
                width: 50% !important;
            }

        }

        /* View more button */
        .checkout-view-more-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #f8fafc;
            border: 1px solid #ddd;
            border-radius: 8px;
            color: #3498db;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .checkout-view-more-btn:hover {
            background: #f0f4f8;
            border-color: #3498db;
        }

        /* Address actions */
        .checkout-address-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .checkout-edit-address-btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .checkout-delete-address-btn {
            position: absolute;
            top: 77px !important;
            right: 1px !important;
            background: transparent;
            border: none;
            font-size: 23px !important;
            color: red !important;
            cursor: pointer;
            z-index: 21px;
        }

        .checkout-address-actions button:hover {
            opacity: 0.9;
        }

        /* Address form */
        .checkout-address-form-container {
            margin-top: 20px;
            background: #f8fafc;
            border-radius: 8px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            position: relative;
            transition: all 0.3s ease;
        }

        /* Close button style */
        .checkout-close-form-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #666;
        }

        .checkout-close-form-btn:hover {
            color: #e74c3c;
        }

        /* Popup Overlay */
        .checkout-popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
            justify-content: center;
            align-items: center;
        }

        /* Popup Container */
        .checkout-popup-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            animation: checkout-fadeInUp 0.3s;
            position: relative;
        }

        @keyframes checkout-fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Close Button */
        .checkout-popup-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
            z-index: 10;
        }

        .checkout-popup-close:hover {
            color: #e74c3c;
        }

        /* Cart item styles */
        .checkout-cart-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .checkout-cart-item-img {
            width: 80px;
            height: 80px;
            flex-shrink: 0;
        }

        .checkout-cart-item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .checkout-cart-item-details {
            flex-grow: 1;
        }

        .checkout-cart-item-header {
            display: flex;
            justify-content: space-between;
        }

        .checkout-cart-item-title {
            font-size: 15px;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .checkout-cart-item-qty {
            font-size: 13px;
            color: #666;
            margin-bottom: 5px;
        }

        .checkout-cart-item-price {
            font-size: 15px;
            font-weight: 500;
        }

        /* Order summary styles */
        .checkout-order-summary {
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .checkout-summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .checkout-total-row {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 18px;
            margin: 15px 0;
        }

        .checkout-address-cards {
            max-height: 200px;
            overflow-y: auto;
            margin-bottom: 10px;
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 10px;
        }

        .checkout-address-card {
            position: relative;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }

        .checkout-address-card.selected {
            border-color: #3498db;
            background-color: #f8fafc;
        }

        .checkout-delete-address-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            color: #e74c3c;
            cursor: pointer;
            font-size: 16px;
        }

        .checkout-view-more-btn {
            color: #3498db;
            text-decoration: underline;
            background: none;
            border: none;
            cursor: pointer;
            margin-top: 5px;
            text-align: right;
            width: 100%;
        }

        #addNewAddressBtn {
            width: auto;
            padding: 8px 16px;
            margin-left: auto;
            display: block;
        }
    </style>
</head>

<body class="checkout-body">
    <div class="checkout-main-container">
        <!-- Form Section -->
        <div class="checkout-form-container">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <div class="checkout-form-header">
                <h2>Checkout Details</h2>
                <div class="checkout-divider"></div>
            </div>

            <!-- User Authentication Section (for guest users) -->
            <?php if (!$this->session->userdata('user_id')): ?>
                <!-- Replace the existing login section with this code -->
                <div class="checkout-login-section">
                    <div class="checkout-login-toggle">
                        <h3><i class="checkout-icon">🔒</i> Already have an account?</h3>
                        <div style="display: flex; gap: 10px;">
                            <button id="loginYesBtn" class="checkout-btn" style="padding: 8px 16px; width: auto; background: #3498db; color: #333; border: 1px solid #ddd;">Yes</button>
                            <button id="loginNoBtn" class="checkout-btn" style="padding: 8px 16px; width: auto; color: black !important;">No</button>
                        </div>
                    </div>

                    <div id="loginForm" style="display: none;">
                        <div class="checkout-form-group">
                            <label for="phoneOtp" class="checkout-label">Phone Number</label>
                            <input type="tel" id="phoneOtp" name="phoneOtp" class="checkout-input" placeholder="Enter your number" />
                            <small id="phoneOtpError" class="checkout-error-message"></small>
                        </div>

                        <!-- OTP input -->
                        <div id="otpSection" class="checkout-form-group" style="display: none;">
                            <label for="otp" class="checkout-label">Enter OTP</label>
                            <input type="text" id="otp" name="otp" class="checkout-input" placeholder="Enter OTP" />
                            <small id="otpError" class="checkout-error-message"></small>
                        </div>

                        <!-- Buttons -->
                        <div style="display: flex; gap: 10px; margin-top: 10px;">
                            <button id="sendOtpBtnlogin" class="checkout-btn">Send OTP</button>
                            <button id="verifyOtpBtnlogin" class="checkout-btn" style="display: none;">Verify & Continue</button>
                        </div>
                    </div>
                </div>


            <?php endif; ?>

            <!-- Address Section -->
            <div class="checkout-form-section">
                <div class="checkout-section-title">
                    <span class="checkout-icon">🏠</span>
                    <h3>Delivery Address</h3>
                </div>

                <!-- Existing Addresses (shown if user is logged in and has addresses) -->
                <div id="addressCards" class="checkout-address-cards">
                    <!-- Address cards will be dynamically inserted here -->
                </div>

                <button id="viewMoreBtn" class="checkout-view-more-btn" style="display: none;">
                    Show More Addresses
                </button>

                <!-- Add New Address Button -->
                <button id="addNewAddressBtn" class="checkout-add-new-btn"><span>+</span> Add New Address</button>
                <button id="proceedToPaymentBtn" class="checkout-btn" style="margin-top: 20px; display: none;">
                    Proceed to Payment
                </button>
                <!-- Address Form (hidden by default) -->
                <div id="addressFormContainer" style="display: none;">
                    <form id="addressForm" action="<?php echo base_url('save_checkout_information'); ?>" method="POST" class="checkout-address-form-container">
                        <button type="button" class="checkout-close-form-btn" id="closeAddressForm">×</button>
                        <div class="checkout-input-row">
                            <div class="checkout-form-group">
                                <label for="first-name" class="checkout-label">First Name*</label>
                                <input type="text" id="first-name" name="fname" class="checkout-input" required />
                            </div>
                            <div class="checkout-form-group">
                                <label for="last-name" class="checkout-label">Last Name*</label>
                                <input type="text" id="last-name" name="lname" class="checkout-input" required />
                            </div>
                        </div>

                        <div class="checkout-form-group">
                            <label for="phone" class="checkout-label">Phone Number*</label>
                            <input type="tel" id="otphone" name="mobile" class="checkout-input" required
                                title="Please enter a valid Indian mobile number like +91 1234567890"
                                <?php if ($this->session->userdata('user_id')) ?> />

                            <?php if (!$this->session->userdata('user_id')): ?>
                                <button type="button" id="sendOtpBtn" class="checkout-btn" style="padding: 6px 15px;">Send OTP</button>
                            <?php endif; ?>
                        </div>

                        <?php if (!$this->session->userdata('user_id')): ?>
                            <div class="checkout-form-group" id="otpGroup" style="display: none;">
                                <label for="otp" class="checkout-label">Enter OTP*</label>
                                <input type="text" id="otp" name="otp" class="checkout-input" placeholder="Enter the OTP" required />
                            </div>
                        <?php endif; ?>
                        <div class="checkout-form-group">
                            <label for="pincode" class="checkout-label">PIN Code*</label>
                            <input type="text" id="pincode" name="pincode" class="checkout-input" maxlength="6" required />
                        </div>

                        <div class="checkout-input-row">
                            <div class="checkout-form-group">
                                <label for="country" class="checkout-label">Country*</label>
                                <input type="text" id="country" name="country" class="checkout-input" readonly />
                            </div>
                            <div class="checkout-form-group">
                                <label for="state" class="checkout-label">State*</label>
                                <input type="text" id="state" name="state" class="checkout-input" readonly />
                            </div>
                        </div>

                        <div class="checkout-input-row">
                            <div class="checkout-form-group">
                                <label for="district" class="checkout-label">District*</label>
                                <input type="text" id="district" name="district" class="checkout-input" readonly />
                            </div>
                            <div class="checkout-form-group">
                                <label for="city" class="checkout-label">City*</label>
                                <input type="text" id="city" name="city" class="checkout-input" readonly />
                            </div>
                        </div>

                        <div class="checkout-form-group">
                            <label for="address" class="checkout-label">Full Address*</label>
                            <input type="text" id="address" name="address" class="checkout-input" placeholder="Area, colony, House No." required />
                        </div>

                        <div class="checkout-form-group">
                            <label class="checkout-label">Address Type*</label>
                            <div class="checkout-radio-group">
                                <div class="checkout-radio-option">
                                    <input type="radio" id="home" name="type" value="Home" checked />
                                    <label for="home">Home</label>
                                </div>
                                <div class="checkout-radio-option">
                                    <input type="radio" id="work" name="type" value="Work" />
                                    <label for="work">Work</label>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden fields for logged in users -->
                        <?php if ($this->session->userdata('user_id')): ?>
                            <input type="hidden" name="email" value="" />
                            <input type="hidden" name="password" value="" />
                        <?php endif; ?>

                        <!-- Product and total amount fields -->
                        <?php if (is_array($cart_data) || is_object($cart_data)): ?>
                            <?php foreach ($cart_data as $cart): ?>
                                <input type="hidden" name="product_id[]" value="<?php echo $cart->product_id; ?>" />
                            <?php endforeach; ?>

                            <?php
                            $subtotal = 0;
                            $delivery_charges = 0;
                            $discount = 0;
                            $online_discount = 0;
                            $coupon_discount = isset($coupon_discount) ? $coupon_discount : 0;

                            foreach ($cart_data as $cart) {
                                $item_total = $cart->price;
                                $subtotal += $item_total;
                            }
                            $gst = ($subtotal * 12) / 100;
                            $grand_total = $subtotal - $discount - $coupon_discount - $online_discount + $gst; ?>
                            <input type="hidden" name="total_amount" value="<?php echo $grand_total; ?>" />
                        <?php endif; ?>

                        <div style="display: flex; gap: 10px; margin-top: 20px;">
                            <button type="button" id="cancelAddressBtn" style="flex: 1; padding: 12px; background: #f8f9fa; border: 1px solid #ddd; border-radius: 8px; cursor: pointer;">Cancel</button>
                            <button type="submit" id="saveAddressBtn" class="checkout-btn" style="flex: 1; display: none;">Save Address</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Cart Summary Section -->
        <!-- Cart Summary Section -->
        <?php
        $total_mrp = 0;
        $discount = 0;
        $coupon_discount = $coupon_discount ?? 0;
        $delivery_charges = $delivery_charges ?? 0;

        $gst_rate = 12;
        $subtotal_after_discount = 0;

        foreach ($cart_data as $cart) {
            $product = $cart->is_pack ? $cart->product_data : $cart;
            $qty = $cart->quantity;

            // ✅ Get original price for MRP
            if ($cart->is_pack) {
                // From pack (not product)
                $original_price = isset($cart->base_price) ? $cart->base_price : $cart->price;
            } else {
                // From product
                $original_price = $product->price;
            }

            // ✅ Actual selling price
            $selling_price = $cart->price;

            // Totals
            $total_mrp += $original_price * $qty;
            $discount += ($original_price - $selling_price) * $qty;
            $subtotal_after_discount += $selling_price * $qty;
        }

        // ✅ GST from inclusive price
        $gst = $subtotal_after_discount * ($gst_rate / (100 + $gst_rate));

        // ✅ Final total
        $grand_total = $subtotal_after_discount - $coupon_discount + $delivery_charges;
        ?>



        <div class="checkout-cart-container">
            <h2 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 1px solid #eee; padding-bottom: 15px;">Order Summary</h2>

            <!-- Cart Items -->
            <div style="max-height: 200px; overflow-y: auto; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <?php if (!empty($cart_data)): ?>
                    <?php foreach ($cart_data as $cart): ?>
                        <?php
                        $product = $cart->is_pack ? $cart->product_data : $cart;
                        $product_images = json_decode($product->image);
                        ?>
                        <div class="checkout-cart-item">
                            <div class="checkout-cart-item-img">
                                <img src="<?= base_url($product_images[0]) ?>" alt="<?= $product->product_name ?>" />
                            </div>
                            <div class="checkout-cart-item-details">
                                <div class="checkout-cart-item-header">
                                    <h4 class="checkout-cart-item-title"><?= $product->product_name ?></h4>
                                    <span class="checkout-cart-item-price">
                                        ₹<?= number_format($cart->price * $cart->quantity, 2) ?>
                                    </span>
                                </div>
                                <p class="checkout-cart-item-qty">
                                    <?= $cart->quantity ?> Month (<?= $cart->quantity * 20 ?> Unit)
                                </p>
                                <div style="display: flex; align-items: center; margin-top: 5px;">
                                    <form action="<?= base_url('delete_product_from_cart') ?>" method="POST" style="margin-left: auto;">
                                        <?php if ($is_guest): ?>
                                            <input type="hidden" name="cart_token" value="<?= $cart->cart_token ?>" />
                                        <?php else: ?>
                                            <input type="hidden" name="cartid" value="<?= $cart->cart_id ?>" />
                                        <?php endif; ?>
                                        <!-- <button type="submit" style="background: none; border: none; cursor: pointer; color: #e74c3c; font-size: 16px;">✕</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Coupon Section -->
            <div style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <h3 style="font-size: 16px; margin-bottom: 10px; color: #2c3e50;">Coupons</h3>
                <p style="font-size: 13px; color: #666; margin-bottom: 10px;">(Not applicable on Price GSI)</p>
                <p style="font-size: 14px; margin-bottom: 15px; color: #3498db; font-weight: 500;">
                    Earn 5% Discount on every order. <strong>LOGIN NOW!</strong>
                </p>
                <div class="coupan-section-of-amb" style="display: flex; gap: 10px; margin-top: 10px;">
                    <input type="text" id="couponCode" placeholder="Enter Coupon code" style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                    <button id="applyCouponBtn" style="padding: 10px 15px; background: #096209; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; ">APPLY</button>
                </div>
                <div id="couponMessage" style="margin-top: 10px; font-size: 13px;"></div>
            </div>

            <!-- Product Summary -->
            <div style="margin-bottom: 15px;">
                <h3 style="font-size: 16px; margin-bottom: 10px; color: #2c3e50;">Product Summary</h3>
                <?php foreach ($cart_data as $cart): ?>
                    <?php $product = $cart->is_pack ? $cart->product_data : $cart; ?>
                    <div style="display: flex; justify-content: space-between; font-size: 14px; margin-bottom: 6px;">
                        <span><?= $product->product_name ?> (x<?= $cart->quantity ?>)</span>
                        <span>₹<?= number_format($cart->price * $cart->quantity, 2) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Price Summary -->
            <div style="margin-bottom: 20px; border-top: 1px solid #eee; padding-top: 15px;">
                <h3 style="font-size: 16px; margin-bottom: 10px; color: #2c3e50;">Price Summary</h3>
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px;">
                    <span>Total MRP</span>
                    <span>₹<?= number_format($total_mrp, 2) ?></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px;">
                    <span>Coupon Discount</span>
                    <span id="couponDiscountValue">- ₹<?= number_format($coupon_discount, 2) ?></span>
                </div>

                <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px;">
                    <span>Shipping</span>
                    <span>₹<?= number_format($delivery_charges, 2) ?></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px;">
                    <span>GST (Inclusive)</span>
                    <span>₹<?= number_format($gst, 2) ?></span>
                </div>
            </div>

            <!-- Grand Total -->
            <div style="border-top: 1px solid #eee; padding-top: 15px;">
                <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 18px;">
                    <span>Grand Total:</span>
                    <span id="grandTotal">₹<?= number_format($grand_total, 2) ?></span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- login check -->

    <script>
        $(document).ready(function() {
            // PIN Code API integration
            <?php if ($this->session->userdata('user_id')): ?>
                // User is already logged in — skip OTP and show save address button
                $("#otpSection").hide();
                $("#sendOtpBtn").hide();
                $("#verifyOtpBtn").hide();
                $("#otp").prop("required", false);
                $("#saveAddressBtn").show();
            <?php endif; ?>

            $("#loginForm").show();
            $("#addressCards").hide();
            $("#addNewAddressBtn").hide();
            $("#addressFormContainer").hide();
            $("#proceedToPaymentBtn").hide();
            const pincodeInput = $("#pincode");
            const countryInput = $("#country");
            const districtInput = $("#district");
            const stateInput = $("#state");
            const cityInput = $("#city");

            function clearFields() {
                countryInput.val("");
                districtInput.val("");
                stateInput.val("");
                cityInput.val("");
            }

            pincodeInput.on("input", function() {
                const pincode = pincodeInput.val().trim();

                if (pincode.length === 6 && /^[1-9][0-9]{5}$/.test(pincode)) {
                    fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                        .then(res => res.json())
                        .then(data => {
                            if (data[0].Status === "Success" && data[0].PostOffice?.length > 0) {
                                const postOffice = data[0].PostOffice[0];
                                countryInput.val("India");
                                stateInput.val(postOffice.State);
                                districtInput.val(postOffice.District);
                                cityInput.val(postOffice.Name);
                            } else {
                                alert("Invalid Pincode");
                                clearFields();
                            }
                        })
                        .catch(err => {
                            console.error("API Error:", err);
                            alert("Error checking pincode.");
                            clearFields();
                        });
                } else {
                    clearFields();
                }
            });

            // Clear fields initially
            clearFields();

            // Toggle login form
            $("#loginToggle").change(function() {
                if ($(this).is(":checked")) {
                    $("#loginForm").slideDown();
                } else {
                    $("#loginForm").slideUp();
                }
            });

            // Add new address button
            $("#addNewAddressBtn").click(function() {
                // Reset the form completely
                $("#otpSection").hide();
                $("#sendOtpBtn").hide();
                $("#verifyOtpBtn").hide();
                $("#otp").prop("required", false);

                // ✅ Show the Save Address button
                $("#saveAddressBtn").show();
                $("#addressForm")[0].reset();
                $("input[name='address_id']").remove();
                clearFields();

                // Hide address cards and buttons
                $("#addressCards").hide();
                $("#viewMoreBtn").hide();
                $("#proceedToPaymentBtn").hide();
                $(this).hide();

                // Show the form container and form
                $("#addressFormContainer").slideDown();
                $("#addressForm").show();

                // Update the form header
                $(".checkout-form-header h2").text("Add New Address");

                // Scroll to the form section
                $('html, body').animate({
                    scrollTop: $(".checkout-form-section").offset().top - 20
                }, 300);

                // Set focus to first field
                $("#first-name").focus();
            });

            // Replace the toggle with these buttons
            $("#loginYesBtn").click(function() {
                $("#loginForm").slideDown();
                $(this).css({
                    'background': '#3498db',
                    'color': 'white'
                });
                $("#loginNoBtn").css({
                    'background': '#f8f9fa',
                    'color': '#333'
                });

                // Hide address form if it was shown
                $("#addressFormContainer").slideUp();

            });

            $("#loginNoBtn").click(function() {
                $("#loginForm").slideUp();
                $(this).css({
                    'background': '#3498db',
                    'color': 'white'
                });
                $("#loginYesBtn").css({
                    'background': '#f8f9fa',
                    'color': '#333'
                });

                // Reset and show address form with email/password fields
                $("#addressForm")[0].reset();
                clearFields();

                // Add email/password fields if not already there
                if ($("#addressForm").find("input[name='email']").length === 0) {
                    $("#addressForm").prepend(`
                        <div class="checkout-form-group">
                            <label for="reg-email" class="checkout-label">Email Address*</label>
                            <input type="email" id="reg-email" name="email" class="checkout-input" placeholder="Enter your email" required>
                        </div>
                        <div class="checkout-form-group">
                            <label for="reg-password" class="checkout-label">Create Password*</label>
                            <input type="password" id="reg-password" name="password" class="checkout-input" placeholder="Create a password" required>
                        </div>
                    `);
                }

                $("#addressFormContainer").slideDown();
            });


            // Make sure this cancel handler matches
            $("#cancelAddressBtn, #closeAddressForm").click(function() {
                $("#addressFormContainer").slideUp(function() {
                    $("#addNewAddressBtn").show();

                    <?php if ($this->session->userdata('user_id')): ?>
                        // For logged-in users, show addresses again
                        $("#addressCards").show();
                        if ($(".checkout-address-card").length > 2) {
                            $("#viewMoreBtn").show();
                        }
                    <?php else: ?>
                        if ($(".checkout-address-card").length > 0) {
                            $("#addressCards").show();
                        }
                    <?php endif; ?>
                });

                // Clear the form
                $("#addressForm")[0].reset();
                $("input[name='address_id']").remove();
                clearFields();
            });

            $("#closeAddressForm").click(function() {
                $("#addressForm").slideUp();
                $("#addNewAddressBtn").show();

                <?php if ($this->session->userdata('user_id')): ?>
                    fetchUserAddresses();
                <?php else: ?>
                    if ($(".checkout-address-card").length > 0) {
                        $("#addressCards").show();
                    }
                <?php endif; ?>

                // Clear the form
                $("#addressForm")[0].reset();
                $("input[name='address_id']").remove();
                clearFields();
            });

            // checout page login
            let sessionId = '';
            let isNewUser = false;

            $("#sendOtpBtnlogin").click(function() {
                const phone = $("#phoneOtp").val().trim();
                $("#phoneOtpError").text("");

                if (!/^[6-9]\d{9}$/.test(phone)) {
                    $("#phoneOtpError").text("Enter a valid phone number").css("color", "red");
                    return;
                }

                $.post("<?= base_url('user/check_credentials') ?>", {
                    phone: phone
                }, function(res) {
                    if (typeof res === "string") res = JSON.parse(res);

                    if (res.status === 'otp_sent') {
                        sessionId = res.session_id;
                        isNewUser = res.is_new;
                        alert(res.message);

                        $("#otpSection").show();
                        $("#sendOtpBtnlogin").hide();
                        $("#verifyOtpBtnlogin").show();

                        if (isNewUser) {
                            $("#nameSection").show();
                        }
                    } else {
                        alert(res.message);
                    }
                });
            });

            $("#verifyOtpBtnlogin").click(function() {
                const otp = $("#otp").val().trim();
                const phone = $("#phoneOtp").val().trim();
                const name = $("#name").val() ? $("#name").val().trim() : '';

                if (!/^\d{4,6}$/.test(otp)) {
                    alert("Enter a valid OTP");
                    return;
                }

                $.post("<?= base_url('user/verify_credentials') ?>", {
                    otp: otp,
                    session_id: sessionId,
                    phone: phone,
                    name: name
                }, function(res) {
                    if (typeof res === "string") res = JSON.parse(res);

                    if (res.status === 'valid') {
                        $("#loginForm").slideUp();
                        $(".checkout-login-toggle h3").html('<i class="checkout-icon">✓</i> Verified');
                        $("#saveAddressBtn").show();
                        $("#otpSection").hide();

                        if (res.message === 'address existed') {
                            renderAddresses(res.data);
                            $("#proceedToPaymentBtn").show();
                            $("#addNewAddressBtn").show();
                        } else {
                            $("#addressFormContainer").show();
                            $("#addressForm").append(`<input type="hidden" name="phone" value="${phone}">`);
                        }
                    } else {
                        alert(res.message);
                    }
                });
            });

            /////end
            $("#proceedToPaymentBtn").click(function() {
                const selectedAddress = $(".checkout-address-card.selected input[name='selected_address']").val();
                if (selectedAddress) {
                    // Here you would typically submit the selected address and proceed to payment
                    // For now, just show an alert
                    //alert("Proceeding to payment with selected address");
                    // window.location.href = "<?= base_url('payment') ?>";
                }
            });
            // Function to fill delivery form with address data
            function fillDeliveryForm(data) {
                console.log(data.id);
                $.ajax({
                    url: "<?= base_url('user/selected_address') ?>",
                    type: "POST",
                    data: {
                        address_id: data.id
                    },
                    success: function(response) {
                        let res = typeof response === "string" ? JSON.parse(response) : response;
                        if (res.status === 'success') {
                            console.log("Selected address ID saved in session");
                        } else {
                            console.warn("Failed to save address ID in session");
                        }
                    },
                    error: function() {
                        console.error("Error while saving address ID in session");
                    }
                });

                $("#first-name").val(data.fname || '');
                $("#last-name").val(data.lname || '');
                $("#phone").val(data.mobile || '');
                $("#pincode").val(data.pincode || '');
                $("#address").val(data.address || '');
                $("#country").val(data.country || '');
                $("#state").val(data.state || '');
                $("#district").val(data.district || '');
                $("#city").val(data.city || '');

                // Set address type
                if (data.type === 'Home') {
                    $("#home").prop("checked", true);
                } else if (data.type === 'Work') {
                    $("#work").prop("checked", true);
                }

                // Add hidden field for address ID if editing
                if (data.id) {
                    $("input[name='address_id']").remove();
                    $("#addressForm").append(`<input type="hidden" name="address_id" value="${data.id}">`);
                }
            }

            function renderAddresses(addresses, limit = 2) {
                let html = '';
                const showMoreBtn = addresses.length > limit;

                // Always show all addresses if less than or equal to limit
                const addressesToShow = showMoreBtn ? addresses.slice(0, limit) : addresses;

                addressesToShow.forEach((item, index) => {
                    html += createAddressCard(item, index);
                });

                $("#addressCards").html(html).show();
                $("#viewMoreBtn").toggle(showMoreBtn);
                $("#addNewAddressBtn").show();

                // Show proceed to payment button if there are addresses
                $("#proceedToPaymentBtn").toggle(addresses.length > 0);

                if (showMoreBtn) {
                    $("#viewMoreBtn").off('click').on('click', function() {
                        // Show all addresses
                        let fullHtml = '';
                        addresses.forEach((item, index) => {
                            fullHtml += createAddressCard(item, index);
                        });
                        $("#addressCards").html(fullHtml);
                        $("#viewMoreBtn").hide();

                        // Reattach click handlers
                        attachAddressCardHandlers();
                    });
                }

                attachAddressCardHandlers();
            }


            // Function to create address card HTML
            function createAddressCard(item, index) {
                return `
                            <div class="checkout-address-wrapper">
                                <div class="checkout-address-card ${index === 0 ? 'selected' : ''}" data-address-id="${item.id || ''}">
                                    <input type="radio" name="selected_address" value='${JSON.stringify(item)}'
                                        ${index === 0 ? 'checked' : ''}>
                                    <div class="checkout-address-content">
                                        <h4>${item.fname} ${item.lname}</h4>
                                        <p>${item.address}</p>
                                        <p>${item.city}, ${item.district}, ${item.state}</p>
                                        <p>${item.country} - ${item.pincode}</p>
                                        <p>Phone: ${item.mobile}</p>
                                    </div>
                                </div>
                                <button class="checkout-delete-address-btn" data-address-id="${item.id || ''}"> <i class="fas fa-trash-alt"></i></button>
                            </div>
                        `;
            }
            // Function to attach event handlers to address cards
            function attachAddressCardHandlers() {
                // Address selection
                $(".checkout-address-card").click(function(e) {
                    // Don't trigger selection if clicking on edit/delete buttons
                    if ($(e.target).hasClass('checkout-edit-address-btn') || $(e.target).hasClass('checkout-delete-address-btn') || $(e.target).closest('.checkout-edit-address-btn').length || $(e.target).closest('.checkout-delete-address-btn').length) {
                        return;
                    }

                    $(".checkout-address-card").removeClass("selected");
                    $(this).addClass("selected");
                    $(this).find("input").prop("checked", true);

                    // Fill the form with this address data (for reference)
                    const addressData = JSON.parse($(this).find('input[name="selected_address"]').val());
                    fillDeliveryForm(addressData);
                });

                // Edit address
                $(".checkout-edit-address-btn").click(function(e) {
                    e.stopPropagation();
                    const card = $(this).closest('.checkout-address-card');
                    const addressData = JSON.parse(card.find('input[name="selected_address"]').val());

                    // Fill the form with this address data
                    fillDeliveryForm(addressData);

                    // Show the form and hide address cards
                    $("#addressCards").hide();
                    $("#viewMoreBtn").hide();
                    $("#addNewAddressBtn").hide();
                    $("#addressForm").slideDown();
                });

                // Delete address
                $(document).on("click", ".checkout-delete-address-btn", function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const button = $(this);
                    const addressId = button.data('address-id');

                    if (!addressId) {
                        Swal.fire("Error", "Address ID is missing", "error");
                        return;
                    }

                    Swal.fire({
                        title: 'Delete Address?',
                        text: "Are you sure you want to delete this address?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '<?= base_url("user/delete_address") ?>',
                                type: 'POST',
                                data: {
                                    address_id: addressId
                                },
                                success: function(response) {
                                    let res = typeof response === "string" ? JSON.parse(response) : response;
                                    if (res.status === 'success') {
                                        Swal.fire("Deleted!", "Address has been deleted.", "success");

                                        <?php if ($this->session->userdata('user_id')): ?>
                                            fetchUserAddresses();
                                        <?php else: ?>
                                            button.closest('.checkout-address-wrapper').remove();
                                            if ($(".checkout-address-card").length === 0) {
                                                $("#addressCards").hide();
                                                $("#addNewAddressBtn").show();
                                                $("#proceedToPaymentBtn").hide();
                                            }
                                        <?php endif; ?>
                                    } else {
                                        Swal.fire("Error", res.message || "Failed to delete address", "error");
                                    }
                                },
                                error: function() {
                                    Swal.fire("Error", "Something went wrong. Please try again.", "error");
                                }
                            });
                        }
                    });
                });
            }

            // Function to fetch user addresses (for logged-in users)
            function fetchUserAddresses() {
                $.ajax({
                    url: '<?= base_url("user/fetch_user_addresses") ?>',
                    type: 'GET',
                    success: function(response) {
                        let res = typeof response === "string" ? JSON.parse(response) : response;

                        if (res.status === 'success' && res.data.length > 0) {
                            renderAddresses(res.data);

                            // Fill form with first address by default
                            fillDeliveryForm(res.data[0]);

                            // Show address cards and hide form
                            $("#addressCards").show();
                            $("#addressForm").hide();
                            $("#addNewAddressBtn").show();
                        } else {
                            // No addresses - show the add new button and form
                            $("#addressCards").hide();
                            $("#viewMoreBtn").hide();
                            $("#addNewAddressBtn").show();
                            $("#addressForm").show();
                        }
                    },
                    error: function() {
                        alert('Failed to load addresses. Please try again.');
                    }
                });
            }

            // For logged-in users, fetch addresses on page load
            <?php if ($this->session->userdata('user_id')): ?>
                fetchUserAddresses();
            <?php endif; ?>

            // Handle form submission for both new and edited addresses
            // Modified address form submission to handle new user registration
            // Modified address form submission to handle new user registration
            $("#addressForm").submit(function(e) {
                e.preventDefault();

                // Check if this is a new user registration
                const isNewUser = $(this).find("input[name='email']").length > 0;

                if (isNewUser) {
                    const email = $(this).find("input[name='email']").val();

                    // First check if email exists
                    $.ajax({
                        url: '<?= base_url("user/check_email") ?>',
                        type: 'POST',
                        data: {
                            email: email
                        },
                        success: function(response) {
                            if (response.exists) {
                                // Existing user - show login form
                                alert("This email is already registered. Please login instead.");
                                $("#loginYesBtn").click();
                                $("#email").val(email);
                            } else {
                                // New user - proceed with registration
                                submitAddressForm(true);
                            }
                        }
                    });
                } else {
                    // Existing user just saving address
                    submitAddressForm(false);
                }
            });

            function submitAddressForm(isNewUser) {
                const submitBtn = $("#addressForm").find('button[type="submit"]');
                const originalText = submitBtn.text();
                submitBtn.prop('disabled', true).text('Saving...');

                $.ajax({
                    url: $("#addressForm").attr('action'),
                    type: 'POST',
                    data: $("#addressForm").serialize(),
                    success: function(response) {
                        let res = typeof response === "string" ? JSON.parse(response) : response;

                        if (res.status === 'success') {
                            if (isNewUser) {
                                // For new users, we've already logged them in via the controller
                                renderAddresses(res.data);
                                $("#proceedToPaymentBtn").show();
                                $("#addressFormContainer").slideUp();
                            } else {
                                // For existing users, just show the updated addresses
                                renderAddresses(res.data);
                                $("#proceedToPaymentBtn").show();
                                $("#addressFormContainer").slideUp();
                            }
                        } else if (res.status === 'email_exists') {
                            alert(res.message);
                            $("#loginYesBtn").click();
                            $("#email").val($("#addressForm").find("input[name='email']").val());
                        } else {
                            alert(res.message || 'Failed to save address');
                        }
                    },
                    error: function(xhr) {
                        try {
                            const res = JSON.parse(xhr.responseText);
                            alert(res.message || 'Failed to save address');
                        } catch (e) {
                            alert('Failed to save address. Please try again.');
                        }
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false).text(originalText);
                    }
                });
            }
            // When address is selected or payment is clicked
            $(".checkout-address-card").click(function() {
                const addressData = JSON.parse($(this).find('input[name="selected_address"]').val());
                sessionStorage.setItem('selectedAddress', JSON.stringify(addressData));
            });

            // Proceed to payment
            $("#proceedToPaymentBtn").click(function() {
                const selectedAddress = $(".checkout-address-card.selected input[name='selected_address']").val();
                if (selectedAddress) {
                    sessionStorage.setItem('selectedAddress', selectedAddress);
                    window.location.href = "<?= base_url('payment') ?>";
                }
            });
            // Cancel button functionality
            // Update the cancel handler to show the proceed button when appropriate
            $("#cancelAddressBtn, #closeAddressForm").click(function() {
                $("#addressFormContainer").slideUp(function() {
                    $("#addNewAddressBtn").show();

                    <?php if ($this->session->userdata('user_id')): ?>
                        // For logged-in users, show addresses again
                        $("#addressCards").show();
                        if ($(".checkout-address-card").length > 2) {
                            $("#viewMoreBtn").show();
                        }
                        $("#proceedToPaymentBtn").toggle($(".checkout-address-card").length > 0);
                    <?php else: ?>
                        if ($(".checkout-address-card").length > 0) {
                            $("#addressCards").show();
                            $("#proceedToPaymentBtn").show();
                        }
                    <?php endif; ?>
                });

                // Clear the form
                $("#addressForm")[0].reset();
                $("input[name='address_id']").remove();
                clearFields();
            });
        });

        // Coupon functionality
        $("#applyCouponBtn").click(function() {
            const couponCode = $("#couponCode").val().trim();

            if (!couponCode) {
                $("#couponMessage").text("Please enter a coupon code").css("color", "red");
                return;
            }

            // Show loading state
            $(this).prop('disabled', true).text('Applying...');
            $("#couponMessage").text("").css("color", "");

            // Delay for UX (optional, you can remove setTimeout)
            setTimeout(function() {
                $.ajax({
                    url: '<?= base_url("apply_coupon") ?>',
                    type: 'POST',
                    data: {
                        coupon_code: couponCode
                    },
                    success: function(response) {
                        let res = typeof response === "string" ? JSON.parse(response) : response;

                        if (res.status === 'success') {
                            $("#couponMessage").text(res.message).css("color", "green");

                            // ✅ Update price UI
                            updatePricesAfterCoupon(res.discount_amount);

                            // ✅ Disable inputs after successful apply
                            $("#couponCode").prop("disabled", true);
                            $("#applyCouponBtn").prop("disabled", true).text("Applied");
                        } else {
                            $("#couponMessage").text(res.message).css("color", "red");
                            $("#applyCouponBtn").prop("disabled", false).text("APPLY");
                        }
                    },
                    error: function() {
                        $("#couponMessage").text("Failed to apply coupon. Please try again.").css("color", "red");
                        $("#applyCouponBtn").prop("disabled", false).text("APPLY");
                    }
                });
            }, 1000);
        });

        function updatePricesAfterCoupon(discount) {
            // ✅ Update Coupon Discount line
            $("#couponDiscountValue").text("- ₹" + discount.toFixed(2));

            // ✅ Calculate new grand total (use hidden base value to avoid compound discounts)
            const baseTotal = parseFloat(<?= json_encode($grand_total + $coupon_discount) ?>); // Add previous discount back
            const newTotal = baseTotal - discount;

            // ✅ Update Grand Total
            $("#grandTotal").text("₹" + newTotal.toFixed(2));

            // ✅ Optional: Update hidden input if needed for order form
            $("input[name='total_amount']").val(newTotal.toFixed(2));
        }
    </script>

    <?php if (!$this->session->userdata('user_id')): ?>
        <script>
            let otpSessionId = "";

            $("#sendOtpBtn").click(function() {
                const phone = $("#otphone").val().trim();

                if (!/^[6-9]\d{9}$/.test(phone)) {
                    alert("Please enter a valid 10-digit Indian mobile number.");
                    return;
                }

                $(this).text("Sending...").prop("disabled", true);

                $.ajax({
                    url: "<?= base_url('user/send_otp') ?>",
                    type: "POST",
                    data: {
                        phone
                    },
                    success: function(response) {
                        const result = typeof response === "string" ? JSON.parse(response) : response;

                        if (result.status === "success") {
                            otpSessionId = result.session_id;
                            $("#otpGroup").slideDown();

                            if ($("#verifyOtpBtn").length === 0) {
                                $("#otpGroup").append(`<button type="button" id="verifyOtpBtn" class="checkout-btn" style="margin-top: 10px;">Verify OTP</button>`);
                            }

                            $("#sendOtpBtn").text("Resend OTP").prop("disabled", false);
                        } else {
                            alert(result.message || "Failed to send OTP.");
                            $("#sendOtpBtn").text("Send OTP").prop("disabled", false);
                        }
                    },
                    error: function() {
                        alert("Failed to send OTP. Try again.");
                        $("#sendOtpBtn").text("Send OTP").prop("disabled", false);
                    }
                });
            });

            $(document).on("click", "#verifyOtpBtn", function() {
                const otp = $("#otp").val().trim();
                const phone = $("#otphone").val().trim();

                if (!otp) {
                    alert("Please enter the OTP.");
                    return;
                }

                $(this).text("Verifying...").prop("disabled", true);

                $.ajax({
                    url: "<?= base_url('user/verify_otp') ?>",
                    type: "POST",
                    data: {
                        otp,
                        session_id: otpSessionId,
                        phone
                    },
                    success: function(response) {
                        const result = typeof response === "string" ? JSON.parse(response) : response;

                        if (result.status === "success") {
                            alert("✅ OTP verified successfully.");
                            $("#verifyOtpBtn").remove();
                            $("#otpGroup").slideUp();
                            $("#saveAddressBtn").show();
                            $("#sendOtpBtn").hide();
                            $("#otphone").prop("readonly", true).addClass("readonly-verified");
                        } else {
                            alert(result.message || "Invalid OTP.");
                            $("#verifyOtpBtn").text("Verify OTP").prop("disabled", false);
                        }
                    },
                    error: function() {
                        alert("OTP verification failed.");
                        $("#verifyOtpBtn").text("Verify OTP").prop("disabled", false);
                    }
                });
            });
        </script>
    <?php endif; ?>
</body>