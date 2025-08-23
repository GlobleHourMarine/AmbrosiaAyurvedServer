<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?php echo base_url('/assets/images/favicon.png'); ?>" type="image/x-icon" />
    <link rel="canonical" href="https://ambrosiaayurved.in<?php echo strtok($_SERVER['REQUEST_URI'], '?'); ?>" />

    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://ambrosiaayurved.in/" />
    <meta property="og:image" content="https://ambrosiaayurved.in/assets/images/new_logo11.webp" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://ambrosiaayurved.in/" />
    <meta property="twitter:image" content="https://ambrosiaayurved.in/assets/images/new_logo11.webp" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />



    <link rel="stylesheet" href="<?php echo base_url('assets/css/header.css'); ?>" />
    <?php if (!empty($custom_css)) {
        foreach ($custom_css as $css) {
            echo '<link rel="stylesheet" href="' . base_url($css) . '">
        ' . "\n";
        }
    } ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/footer.css'); ?>" />

    <script async src="https://pay.google.com/gp/p/js/pay.js"></script>
    <script src="<?php echo base_url('assets/js/header.js'); ?>" defer></script>
    <script src="<?php echo base_url('assets/js/footer.js'); ?>" defer></script>
    <!-- <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInitUnique" async></script> -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XZ0PMZJGC1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-XZ0PMZJGC1');
    </script>


    <!-- Form Validation -->
    <script>
        function validationform(event) {
            event.preventDefault();

            const form = document.getElementById("addressForm-of-header");

            if (form.checkValidity()) {
                // All fields are valid
                alert("Form submitted successfully!");
                form.submit();
            } else {
                form.reportValidity();
            }
        }
    </script>
    <style>
        *{
            font-family: source-serif-pro, Georgia, Cambria, "Times New Roman", Times, serif;
                /* font-family: Josefin Sans, sans-serif; */
        }
        /* Existing modal styles, keep as is if they work for your existing modals */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1060;
            display: none;
        }

        .modal-dialog {
            position: relative;
            margin: 0 auto;
            z-index: 1061;
        }

        .modal-content-of-address {
            position: relative;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        #aaCartDrawer.offcanvas {
            width: 400px;
            max-width: 90vw;
            transition: transform 0.3s ease-in-out;
            z-index: 1100 !important;
        }

        .offcanvas-backdrop.show {
            z-index: 1099 !important;
        }

        .navbar.sticky-top,
        .navbar {
            z-index: 1000 !important;
            position: relative;
        }

        /* Cart Drawer Styles */
        #aaCartDrawer .offcanvas-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem;
        }

        #aaCartDrawer .offcanvas-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            display: flex;
            align-items: center;
        }

        #aaCartDrawer .offcanvas-title i {
            margin-right: 10px;
            color: #2a7f62;
        }

        #aaCartItemsContainer {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
            padding: 1rem;
        }

        .aa-cart-header {
            padding: 0.5rem 1rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .aa-cart-header h6 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .aa-milestone-reached {
            font-size: 0.85rem;
            display: flex;
            align-items: center;
        }

        .aa-cart-item {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            margin-bottom: 1rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .aa-cart-item-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 1rem;
            border: 1px solid #eee;
        }

        .aa-cart-item-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .aa-quantity-controls {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .aa-quantity-btn {
            background-color: #f8f9fa;
            border: none;
            padding: 0.25rem 0.75rem;
            cursor: pointer;
            font-size: 1rem;
            color: #333;
            transition: all 0.2s;
        }

        .aa-quantity-btn:hover {
            background-color: #e9ecef;
        }

        .aa-quantity-input {
            width: 40px;
            text-align: center;
            border: none;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            font-weight: 500;
            padding: 0.25rem 0;
            -moz-appearance: textfield;
        }

        .aa-quantity-input::-webkit-outer-spin-button,
        .aa-quantity-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .aa-remove-item-btn {
            background: none;
            border: none;
            color: #dc3545;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            transition: all 0.2s;
        }

        .aa-remove-item-btn:hover {
            color: #c82333;
            transform: scale(1.1);
        }
        .aa-subtotal-section {
            padding: 1rem;
            border-top: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .aa-subtotal-row {
            display: flex;
            justify-content: space-between;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }

        .aa-checkout-btn {
            width: 100%;
            padding: 0.45rem 1rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            background-color: #2a7f62;
            border-color: #2a7f62;
            transition: all 0.2s ease-in-out;
        }

        .aa-checkout-btn:hover {
            background-color: #216650;
            border-color: #216650;
            transform: translateY(-2px);
        }

        .aa-offer-banner {
            background-color: #fff3cd;
            color: #856404;
            padding: 0.75rem 1rem;
            text-align: center;
            font-size: 0.9rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .aa-offer-banner i {
            margin-right: 8px;
            color: #856404;
        }

        .aa-milestone-progress {
            margin: 1rem;
            padding: 1rem;
            background-color: #e9f7ef;
            border-radius: 8px;
            text-align: center;
            font-size: 0.9rem;
            color: #2a7f62;
        }

        .aa-milestone-progress strong {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .aa-progress-bar-container {
            width: 100%;
            height: 8px;
            background-color: #cce7d0;
            border-radius: 5px;
            overflow: hidden;
            margin: 0.5rem 0;
            position: relative;
        }

        .aa-progress-bar-fill {
            height: 100%;
            background-color: #2a7f62;
            border-radius: 5px;
            transition: width 0.5s ease-in-out;
            width: 0%;
            position: relative;
        }

        .aa-milestone-point {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            height: 16px;
            width: 16px;
            background-color: #fff;
            border-radius: 50%;
            border: 2px solid #2a7f62;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 600;
            color: #2a7f62;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .aa-milestone-point.m1 {
            left: 25%;
        }

        .aa-milestone-point.m2 {
            left: 50%;
        }

        .aa-milestone-point.m3 {
            left: 75%;
        }

        .aa-milestone-point.active {
            background-color: #2a7f62;
            color: #fff;
        }

        .aa-milestone-message {
            font-size: 0.85rem;
            color: #2a7f62;
            margin-top: 0.5rem;
            text-align: center;
        }

        .aa-milestone-message.reached {
            color: #28a745;
            font-weight: 600;
        }

        .aa-empty-cart {
            text-align: center;
            padding: 3rem 1rem;
            color: #6c757d;
        }

        .aa-empty-cart i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #ced4da;
        }

        .aa-empty-cart p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .aa-old-price {
            text-decoration: line-through;
            color: #adb5bd;
            font-size: 0.8em;
            margin-left: 0.5rem;
        }

        /* Cart Drawer Styles */
        #aaCartDrawer.offcanvas {
            width: 400px;
            max-width: 90vw;
            transition: transform 0.3s ease-in-out;
            z-index: 1100 !important;
        }

        .offcanvas-backdrop.show {
            z-index: 1099 !important;
        }

        /* Cart Drawer Content Styles */
        #aaCartDrawer .offcanvas-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem;
        }

        #aaCartDrawer .offcanvas-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            display: flex;
            align-items: center;
        }

        #aaCartDrawer .offcanvas-title i {
            margin-right: 10px;
            color: #2a7f62;
        }

        #aaCartItemsContainer {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
            padding: 1rem;
        }

        .aa-cart-header {
            padding: 0.5rem 1rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .aa-cart-header h6 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .aa-milestone-reached {
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            background-color: #e9f7ef;
            color: #2a7f62;
            padding: 0.5rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .aa-milestone-reached i {
            margin-right: 0.5rem;
            color: #2a7f62;
        }

        .aa-cart-item {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            margin-bottom: 1rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .aa-cart-item-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 1rem;
            border: 1px solid #eee;
        }

        .modal-content-of-address {
            width: 100% !important;
            border: none;
        }

        .aa-cart-item-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .aa-quantity-controls {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .aa-quantity-btn {
            background-color: #f8f9fa;
            border: none;
            padding: 0.25rem 0.75rem;
            cursor: pointer;
            font-size: 1rem;
            color: #333;
            transition: all 0.2s;
        }

        .aa-quantity-btn:hover {
            background-color: #e9ecef;
        }

        .aa-quantity-input {
            width: 40px;
            text-align: center;
            border: none;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            font-weight: 500;
            padding: 0.25rem 0;
            -moz-appearance: textfield;
        }

        .aa-quantity-input::-webkit-outer-spin-button,
        .aa-quantity-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .aa-remove-item-btn {
            background: none;
            border: none;
            color: #dc3545;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0.5rem;
            transition: all 0.2s;
        }

        .aa-remove-item-btn:hover {
            color: #c82333;
            transform: scale(1.1);
        }

        .aa-subtotal-section {
            padding: 1rem;
            border-top: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .aa-subtotal-row {
            display: flex;
            justify-content: space-between;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }

        .aa-checkout-btn {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            background-color: #2a7f62;
            border-color: #2a7f62;
            transition: all 0.2s ease-in-out;
        }

        .aa-checkout-btn:hover {
            background-color: #216650;
            border-color: #216650;
            transform: translateY(-2px);
        }

        .aa-offer-banner {
            background-color: #fff3cd;
            color: #856404;
            padding: 0.35rem 1rem;
            text-align: center;
            font-size: 0.9rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .aa-offer-banner i {
            margin-right: 8px;
            color: #856404;
        }

        .aa-milestone-progress {
            margin: 1rem;
            padding: 1rem;
            background-color: #e9f7ef;
            border-radius: 8px;
            text-align: center;
            font-size: 0.9rem;
            color: #2a7f62;
        }

        .aa-milestone-progress strong {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .aa-progress-bar-container {
            width: 100%;
            height: 8px;
            background-color: #cce7d0;
            border-radius: 5px;
            overflow: hidden;
            margin: 0.5rem 0;
            position: relative;
        }

        .aa-progress-bar-fill {
            height: 100%;
            background-color: #2a7f62;
            border-radius: 5px;
            transition: width 0.5s ease-in-out;
            width: 75%;
            position: relative;
        }

        .aa-milestone-point {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            height: 16px;
            width: 16px;
            background-color: #fff;
            border-radius: 50%;
            border: 2px solid #2a7f62;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 600;
            color: #2a7f62;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .aa-milestone-point.m1 {
            left: 25%;
        }

        .aa-milestone-point.m2 {
            left: 50%;
        }

        .aa-milestone-point.m3 {
            left: 75%;
        }

        .aa-milestone-point.active {
            background-color: #2a7f62;
            color: #fff;
        }

        .aa-milestone-message {
            font-size: 0.85rem;
            color: #2a7f62;
            margin-top: 0.5rem;
            text-align: center;
        }

        .aa-milestone-message.reached {
            color: #28a745;
            font-weight: 600;
        }

        .aa-empty-cart {
            text-align: center;
            padding: 3rem 1rem;
            color: #6c757d;
        }

        .aa-empty-cart i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #ced4da;
        }

        .aa-empty-cart p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .aa-old-price {
            text-decoration: line-through;
            color: #adb5bd;
            font-size: 0.8em;
            margin-left: 0.5rem;
        }

        /* Unique Cart Drawer Styles */
        .aa-offcanvas {
            position: fixed;
            top: 0;
            bottom: 0;
            z-index: 1045;
            display: flex;
            flex-direction: column;
            max-width: 100%;
            visibility: hidden;
            background-color: #fff;
            background-clip: padding-box;
            outline: 0;
            transition: transform 0.3s ease-in-out;
        }

        .aa-offcanvas.aa-offcanvas-end {
            right: 0;
            top: 0;
            width: 400px;
            /* max-width: 90vw; */
            border-left: 1px solid rgba(0, 0, 0, 0.2);
            transform: translateX(100%);
        }

        .aa-offcanvas.aa-offcanvas-end.show {
            transform: none;
        }

        .aa-offcanvas-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1040;
            width: 100vw;
            height: 100vh;
            background-color: #000;
        }

        .aa-offcanvas-backdrop.show {
            opacity: 0;
            z-index: 0 !important
        }

        .aa-offcanvas-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1rem;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .aa-offcanvas-title {
            margin-bottom: 0;
            line-height: 1.5;
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }

        .aa-btn-close {
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: 0.25em 0.25em;
            color: #000;
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            border-radius: 0.25rem;
            opacity: 0.5;
        }

        .aa-offcanvas-body {
            flex-grow: 1;
            padding: 0.3rem 1rem;
            overflow-y: hidden;
            opacity: none;
            /* border:2px solid red; */
        }

        .navbar {
            /* border:2px solid red; */
            margin-bottom: -39px !important;
        }

        /* Updated Header Styles */
        .main-header-nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1050;
            height: 70px;
            /* Slightly reduced height */
            background-color: #fff !important;
            /* Changed to white background */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Softer shadow */
            display: flex;
            align-items: center;
            padding: 0 20px;
        }

        .navbar-brand img {
            height: 60px;
            /* Slightly reduced logo size */
            transition: all 0.3s ease;
        }

        /* Main Navigation - Updated Style */
        .navbar-nav.main-nav {
            display: flex;
            justify-content: center;
            flex-grow: 1;
            gap: 5px;
            /* Added gap between items */
        }

        .navbar-nav.main-nav .nav-item {
            margin: 0 0.5rem;
            /* Reduced margin */
        }

        .navbar-nav.main-nav .nav-link {
            color: #333 !important;
            font-weight: 500;
            /* Medium weight instead of bold */
            font-size: 14px !important;
            padding: 8px 12px !important;
            /* Adjusted padding */
            display: flex;
            /* flex-direction: column; Stack icon and text vertically */
            align-items: center;
            transition: all 0.3s ease;
            border-radius: 6px;
            text-transform: uppercase;
            /* Uppercase text like ZeroHarm */
            font-size: 12px !important;
            /* Smaller font size */
            letter-spacing: 0.8px;
        }

        .navbar-nav.main-nav .nav-link i {
            font-size: 1rem !important;
            /* Smaller icons */
            margin-right: 0;
            /* No margin since stacked */
            margin-bottom: 4px;
            /* Space between icon and text */
            color: #2a7f62 !important;
        }

        .navbar-nav.main-nav .nav-link:hover {
            color: #2a7f62 !important;
            background-color: rgba(42, 127, 98, 0.1);
            /* Light green background on hover */
            transform: none;
            /* Remove translateY effect */
            box-shadow: none;
            /* Remove shadow */
        }

        /* Utility Navigation - Updated Style */
        .navbar-nav.utility-nav {
            display: flex;
            align-items: center;
            margin-left: auto;
            gap: 10px;
            /* Added gap between items */
        }

        .navbar-nav.utility-nav .nav-link {
            color: #333 !important;
            font-size: 1.2rem !important;
            /* Smaller icons */
            position: relative;
            padding: 8px !important;
            /* Adjusted padding */
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            background-color: transparent;
        }

        .navbar-nav.utility-nav .nav-link:hover {
            background-color: rgba(42, 127, 98, 0.1);
            transform: none;
        }

        /* Cart Count Badge */
        #cartCount {
            position: absolute;
            top: -1px;
            right: revert;
            background: #e74c3c;
            color: white;
            font-size: 10px;
            font-weight: bold;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex !important;
            justify-content: center;
            align-items: center;
        }


        /* Dropdown Menu - Updated Style */
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 0.5rem 0;
            margin-top: 8px !important;
        }

        .dropdown-item {
            padding: 0.5rem 1.25rem;
            font-size: 13px !important;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #2a7f62 !important;
            padding-left: 1.5rem;
        }

        /* Mobile Menu Toggler */
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .navbar-nav.main-nav {
                display: none;
            }

            .navbar-brand {
                margin-right: auto;
            }

            .navbar-nav.utility-nav {
                margin-left: auto;
            }
        }

        @media (max-width: 768px) {
            .main-header-nav {
                height: 60px;
                padding: 0 15px;
            }

            .navbar-brand img {
                height: 40px;
            }

            .navbar-nav.utility-nav .nav-link {
                width: 32px;
                height: 32px;
                font-size: 1.1rem !important;
            }
            .aa-subtotal-section {
            padding: 1rem;
            border-top: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }
        }

        /* Offcanvas Menu - Updated Style */
        .offcanvas {
            background: #333 !important;
            /* Green background like ZeroHarm */
            color: black !important;
            width: 280px !important;
            background-color: #333 !important;
        }

        .offcanvas-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .offcanvas-body .navbar-nav .nav-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .offcanvas-body .navbar-nav .nav-link {
            color: white !important;
            padding: 12px 20px;
            display: flex;
            align-items: center;
        }

        .offcanvas-body .navbar-nav .nav-link i {
            margin-right: 10px;
            font-size: 1rem;
        }

        .offcanvas-body .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white !important;
        }

        /* Rest of your existing cart drawer styles can remain the same, 

        .svg-inline--fa {
            display: var(--fa-display, inline-block);
            height: 1.3em;
            overflow: visible;
            vertical-align: -0.125em;
            /* border: 2px solid red; */
        margin-right: 5px;
        }

        .mobile-cart {
            /* border: 2px solid red; */
            margin-top: 0px !important;
            background-color: white !important;
            color: white;
        }

        .mobile-cart li a {
            color: black !important;
        }

        /* Mobile Cart Drawer Styles */
        .mobile-cart {
            background-color: #f8f9fa !important;
            color: #333 !important;
            width: 65% !important;
            margin-top: 0 !important;
            /* background-color:rgba(204, 221, 204, 0.2) !important; */
            /* border:3px solid black;
          */

            border: none;
            /* border:2px solid red; */
        }

        .mobile-cart .offcanvas-header {
            background-color: #bff7bf33;
            color: black;
            padding: 1rem;
            font-weight: bold;
        }

        .mobile-cart .offcanvas-title {
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .mobile-cart .offcanvas-title i {
            margin-right: 10px;
        }

        .mobile-cart .btn-close {
            filter: invert(1);
            opacity: 0.8;
        }

        .mobile-cart .navbar-nav {
            padding: 0;
        }

        .mobile-cart .nav-item {
            border-bottom: 1px solid #eee;
            transition: all 0.2s;
        }

        .mobile-cart .nav-item:last-child {
            border-bottom: none;
        }

        .mobile-cart .nav-link {
            color: #333 !important;
            padding: 1rem !important;
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }

        .mobile-cart .nav-link:hover {
            background-color: rgba(42, 127, 98, 0.1);
            color: #2a7f62 !important;
            padding-left: 1.2rem !important;
        }

        .mobile-cart .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 12px;
            color: #2a7f62;
        }

        .mobile-cart .dropdown-menu {
            border: none;
            box-shadow: none;
            background-color: rgba(42, 127, 98, 0.05);
            margin: 0;
            padding: 0;
        }

        .mobile-cart .dropdown-item {
            padding: 0.75rem 1rem 0.75rem 3rem;
            color: #555;
            border-bottom: 1px solid #eee;
        }

        .mobile-cart .dropdown-item:hover {
            background-color: rgba(42, 127, 98, 0.1);
            color: #2a7f62;
        }

        /* Cart Count in Mobile Menu */
        .mobile-cart .cart-count {
            background-color: #e74c3c;
            color: white;
            font-size: 10px;
            font-weight: bold;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin-left: 8px;
        }

        /* Make sure the cart drawer opens properly */
        #aaCartDrawer.offcanvas {
            z-index: 1100 !important;
        }

        .offcanvas-backdrop.show {
            z-index: 1099 !important;
        }

        .offcanvas-body .navbar-nav .nav-item .nav-link {
            color: black !important;
            /* margin:0px !important; */
            /* padding:0px !important; */
        }

        .offcanvas-body .navbar-nav .nav-item {
            border-bottom: 1px solid #333;
            /* background-color:rgba(178, 211, 178, 0.2); */
        }

        .offcanvas-body .navbar-nav .nav-item:hover {
            background-color: #bff7bf;
        }

        .offcanvas-body .navbar-nav {
            /* border:2px solid red; */
            margin: 0px !important;
            padding: 0px !important;
        }

        .offcanvas-body {
            /* border:2px  solid red; */
            background-color: rgba(219, 245, 219, 0.2);
        }

        /* Cart Drawer Animation Styles */
        #aaCartDrawer.offcanvas {
            width: 400px;
            max-width: 90vw;
            transition: transform 0.5s cubic-bezier(0.25, 0.1, 0.25, 1);
            /* Slower and smoother transition */
            z-index: 1100 !important;
        }

        /* For the backdrop fade effect */
        .offcanvas-backdrop {
            transition: opacity 0.5s ease-in-out;
        }

        /* For the mobile menu (if you want the same effect) */
        .offcanvas {
            transition: transform 0.5s cubic-bezier(0.25, 0.1, 0.25, 1);
        }

        /* Unique Cart Drawer Styles with slower animation */
        .aa-offcanvas {
            transition: transform 0.5s cubic-bezier(0.25, 0.1, 0.25, 1);
        }

        .aa-offcanvas-backdrop {
            transition: opacity 0.5s ease-in-out;
        }

        .navbar {
            /* border:2px solid red; */
            margin-top: 0px !important;
        }

        @media (max-width: 576px) {
            .navbar {
                /* border:2px solid red; */
                /* margin-top: 80px !important; */
                /* border:2px solid red; */
            }

            .dropdown-menu {
                /* border:2px solid red !important; */
                background-color: none;
            }

            .dropdown-item {
                background-color: none;
                border-bottom: 1px solid black !important;
                background-color: none;
                color: black;
                background: none !important;
                background-color: #f5f5f5 !important;
            }
        }

        #addAddressModal {
            /* border:2px solid red; */
        }

        #addAddressModal .modal-body-of-address {
            background-color: white !important;
        }

        .modal-backdrop.show {
            opacity: 0 !important;
            z-index: 0 !important
        }

        element.style {}

        .offcanvas-body .navbar-nav .nav-item .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
            color: rgb(6, 100, 49) !important;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.3);
        }

        .menu-close-btn {
            color: black !important;
        }
        

        @media (max-width: 576px) {
            .profile-modal-unique {
                /* border:2px  solid red !important; */
                padding: 0px !important;
                /* opacity:0.5; */
            }

            .modal-dialog {
                /* border:1px  solid green !important;s */
                width: 80% !important;
                margin: auto !important;
                top: 18% !important;
                left: 5%;
                /* padding:10px; */
                border-radius: 8px;
            }

            .try_now {
                margin-left: 0px !important;
            }

            .mobile-address-model {
                /* border:2px solid red !important; */
            }

            .mobile-address-modelll {
                /* border:2px solid red !important; */
                top: -1% !important;
                background-color: none !important;
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            /* background-color: rgba(0, 0, 0, 0.6); */
            justify-content: center;
            /* align-items: center; */
            /* border:2px solid red !important; */
            background-color: transparent !important;
        }

        .modal-dialog {
            /* border:2px solid red !important; */
            background-color: white !important;
        }

        body {
            font-family: "Poppins", sans-serif !important;
        }

        #loader-wrapper {
            z-index: 0 !important;
            display: none !important;
        }

        /* Add to your header.php style section */
        .modal-backdrop {
            z-index: 1040 !important;
        }

        .modal {
            z-index: 1050 !important;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .profile-modal-unique .modal-dialog {
            position: fixed;
            top: 70px;
            right: 20px;
            margin: 0;
            transform: none !important;
        }

        .profile-modal-unique .modal-content-of-address {
            border: 2px solid #2a7f62 !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        /* Remove backdrop for specific modals */
        .profile-modal-unique,
        .mobile-address-model {
            background-color: transparent !important;
            pointer-events: none;
            /* Allow clicks to pass through to elements behind */
        }

        /* Target the modal dialog directly */
        .profile-modal-unique .modal-dialog,
        .mobile-address-model .modal-dialog {
            pointer-events: auto;
            /* Re-enable clicks for the modal content */
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        /* Hide backdrop globally for these modals */
        .profile-modal-unique~.modal-backdrop,
        .mobile-address-model~.modal-backdrop {
            display: none !important;
            opacity: 0 !important;
        }

        /* Ensure modal stays on top */
        .modal {
            z-index: 1060 !important;
        }

        /* Profile Modal Enhancements */
        .profile-modal-unique .modal-dialog {
            max-width: 300px;
            margin: 10px;
            position: fixed;
            top: 70px;
            right: 20px;
        }

        .profile-modal-unique .modal-content-of-address {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(42, 127, 98, 0.2) !important;
        }

        /* Address Modal Enhancements */
        .mobile-address-model .modal-dialog {
            max-width: 320px;
            margin: 20px auto;
        }

        .mobile-address-model .modal-content-of-address {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(42, 127, 98, 0.2) !important;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .profile-modal-unique .modal-dialog {
                top: 60px;
                right: 10px;
                max-width: 280px;
            }

            .mobile-address-model .modal-dialog {
                max-width: 90%;
                margin: 10px auto;
            }
        }

        /* Form input focus styles */
        .form-control-sm:focus {
            border-color: #2a7f62;
            box-shadow: 0 0 0 0.2rem rgba(42, 127, 98, 0.25);
        }

        /* Button hover effects */
        .btn-outline-secondary:hover {
            background-color: #e9f7ef;
            border-color: #2a7f62;
            color: #2a7f62;
        }

        .dropdown-menu {
            pointer-events: auto !important;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Custom dropdown behavior */
        .blog-dropdown-toggle,
        .language-dropdown-toggle {
            cursor: pointer;
        }

        .blog-dropdown-menu,
        .language-dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            border-radius: 8px;
            padding: 0.5rem 0;
            min-width: 200px;
        }

        .blog-dropdown-menu.show,
        .language-dropdown-menu.show {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile dropdown styles */
        @media (max-width: 991.98px) {

            .blog-dropdown-menu,
            .language-dropdown-menu {
                position: static;
                box-shadow: none;
                border: none;
                animation: none;
            }

            .blog-dropdown-menu.show,
            .language-dropdown-menu.show {
                display: block;
            }
        }

        /* Remove Bootstrap's hover behavior */
        .dropdown:hover .dropdown-menu {
            display: none;
        }

    </style>


</head>

<!-- Keep absolute asset paths stable -->
<base href="<?= base_url(); ?>">

<?php if (isset($_GET['_t']) && $_GET['_t'] !== ''): ?>
<script>
  (function(){
    try {
      var token = '<?= htmlspecialchars($_GET["_t"], ENT_QUOTES, "UTF-8"); ?>';
      var encryptedUrl = '<?= site_url("redirect"); ?>/' + token;
      if (window.history && window.history.replaceState) {
        // Make the address bar show /redirect/{token}
        window.history.replaceState(null, '', encryptedUrl);
      }
    } catch(e) {}
  })();
</script>
<?php endif; ?>


<body data-base-url="<?php echo base_url(); ?>">
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>

    <!-- ✅ WhatsApp -->
<div style="position: fixed; right: 2px; bottom: 27%; z-index: 1000;">
  <a href="https://wa.me/918000057233" 
     style="padding: 10px;
        background: #fff;
        border-radius: 10px 0px 0px 10px;
        color: inherit;
        font-size: 12px;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 0 12px 0 #0003;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        overflow: hidden;
        width: 50px;"
     target="_blank">
     
      <i class="fab fa-whatsapp" style="font-size: 28px; margin-right: 8px; flex-shrink: 0; border-radius: 10px; padding: 5px; background: #25D366; color: white;"></i>
      <span style="white-space: nowrap; font-size: 13px; opacity: 0; transition: opacity 0.3s;">Chat with us</span>
  </a>
</div>

<!-- ✅ Free Diagnosis Test -->
<div style="position: fixed; right: 2px; bottom: 18%; z-index: 1000;">
  <a href="/free-diagnosis" 
     style="padding: 10px;
        background: linear-gradient(to right, #ec4899, #ef4444, #f97316);
        border-radius: 10px 0px 0px 10px;
        color: inherit;
        font-size: 12px;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 0 12px 0 #0003;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        overflow: hidden;
        width: 50px;"
     target="_blank">
     
      <img src="https://p7.hiclipart.com/preview/14/65/239/ico-avatar-scalable-vector-graphics-icon-doctor-with-stethoscope.jpg" style=" width: 40px; height: 40px; font-size: 28px; margin-right: 8px; flex-shrink: 0; border-radius: 45px"></img>
      <span style="white-space: nowrap; font-size: 13px; opacity: 0; color: white; transition: opacity 0.3s;">Free Diagnosis Test</span>
  </a>
</div>



    <?php
    $isLoggedIn = $this->session->userdata('user_id');
    $fname = $this->session->userdata('fname');
    $lname = $this->session->userdata('lname');
    $email = $this->session->userdata('email'); ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid main main-header-nav">
            <a class="navbar-brand" href="<?php echo base_url('/') ?>">
                <img src="<?php echo base_url('/assets/images/new_logo11.webp'); ?>" alt="logo" class="img-fluid" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav main-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="<?php echo base_url('/') ?>">
                            <i class="fas fa-home me-2"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('redirect/' . encrypt_url('about_us')); ?>">
                            <i class="fas fa-info-circle"></i>
                            <span style="margin-left: 3px">About Us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('redirect/' . encrypt_url('our_products')); ?>">
                            <i class="fas fa-box"></i>
                            <span style="margin-left: 3px">Our Products</span>
                        </a>
                    </li>
                    <!-- Update the Blog dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle blog-dropdown-toggle" href="#" id="blogDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-blog"></i>
                            <span style="margin-left: 3px">Blogs</span>
                        </a>
                        <ul class="dropdown-menu blog-dropdown-menu" aria-labelledby="blogDropdown">
                            <li><a class="dropdown-item" href="<?= site_url('redirect/' . encrypt_url('blog')); ?>">All Blogs</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('blog/category/diabetes-care/') ?>">Diabetes Care</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('blog/category/ayurveda-herbs/') ?>">Ayurved & Herbs</a></li>
                        </ul>
                    </li>

                    <!-- Update the Language dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle lang-toggle-unique" href="#" id="langDropdownUnique" role="button" data-bs-toggle="dropdown" aria-expanded="false" translate="no">
                            <i class="fas fa-globe"></i>
                            <span style="margin-left: 20px;" translate="no">Language</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            <li><button class="dropdown-item" onclick="translatePage('ms')" translate="no">Malay</button></li>
                            <li><button class="dropdown-item" onclick="translatePage('en')" translate="no">English</button></li>
                            <li><button class="dropdown-item" onclick="translatePage('ar')" translate="no">Arabic</button></li>
                            <li><button class="dropdown-item" onclick="translatePage('hi')" translate="no">Hindi</button></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('app/Ambrosia_Ayurved.apk') ?>">
                            <i class="fa-solid fa-arrow-down"></i>
                            <span style="margin-left:2px">Get App</span>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav utility-nav">
                    <button style="font-size: 20px; margin-right: 8px; border: none; background: none; display:flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#aaCartDrawer">
                        <i class="fas fa-shopping-cart"></i>
                        <span id="cartCount" style="background: rgb(65, 178, 30); color: white; border-radius: 50%; font-size: 12px; font-margin-right: 0px; margin-top: 8px; margin-left: 5px;  display: flex !important;">0</span>
                    </button>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('redirect/' . encrypt_url('contact_us')); ?>?>">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </li>
                    <?php if ($isLoggedIn) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('loginpage'); ?>">
                                <i class="fa-solid fa-user"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- In the mobile menu section (around line 1100 in your code) -->
    <div class="offcanvas offcanvas-end mobile-cart" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel" style="border:2px solid green;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasMenuLabel"><i class="fas fa-bars me-2"></i> Menu</h5>
            <button type="button" style="background-color:white" class="btn-close text-reset menu-close-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body z-index: 0 !important">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/') ?>"> <i style=" margin:0px !important; margin-left:0px !important ;margin-right:30px !important;" class="fas fa-home"></i> Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('about_us') ?>"> <i style=" margin:0px !important; margin-left:0px !important ;margin-right:30px !important;" class="fas fa-info-circle"></i> About Us </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('our_products') ?>"> <i style=" margin:0px !important; margin-left:0px !important ;margin-right:30px !important;" class="fas fa-shopping-basket"></i> Our Products </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> <i style=" margin:0px !important; margin-left:0px !important ;margin-right:30px !important;" class="fas fa-blog"></i> Blogs </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('blog') ?>">All Blogs</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('blog/category/diabetes-care/') ?>">Diabetes Care</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('blog/category/ayurveda-herbs/') ?>">Ayurved & Herbs</a></li>
                    </ul>
                </li>
                <div id="google_translate_element" style="display: none;"></div>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle lang-toggle-unique" href="#" id="langDropdownUnique" role="button" data-bs-toggle="dropdown" aria-expanded="false" translate="no">
                        <i class="fas fa-globe"></i>
                        <span style="margin-left: 20px;" translate="no">Language</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><button class="dropdown-item" onclick="translatePage('ms')" translate="no">Malay</button></li>
                        <li><button class="dropdown-item" onclick="translatePage('en')" translate="no">English</button></li>
                        <li><button class="dropdown-item" onclick="translatePage('ar')" translate="no">Arabic</button></li>
                        <li><button class="dropdown-item" onclick="translatePage('hi')" translate="no">Hindi</button></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('app/Ambrosia_Ayurved.apk') ?>"> <i style=" margin:0px !important; margin-left:0px    !important ;margin-right:30px !important;" class="fas fa-mobile-alt"></i> Get App </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#aaCartDrawer">
                        <i style=" margin:0px !important; margin-left:0px !important ;margin-right:30px !important;" class="fas fa-shopping-cart"></i> My Cart
                        <span id="mobileCartCount" class="cart-count">0</span>
                    </a>
                </li>
                <?php if ($isLoggedIn) : ?>
                    <li class="nav-item">
                        <a class="nav-link profile-modal-trigger" href="#" data-bs-dismiss="offcanvas" onclick="openProfileModal()"> <i style=" margin:0px !important; margin-left:0px    !important ;margin-right:30px !important;" class="fas fa-user"></i> My Account </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('order') ?>"> <i style=" margin:0px !important; margin-left:0px    !important ;margin-right:30px !important;" class="fas fa-history"></i> Orders </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('loginpage') ?>"> <i style=" margin:0px !important; margin-left:0px    !important ;margin-right:30px !important;" class="fas fa-user"></i> Login </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('contact_us') ?>"> <i style=" margin:0px !important; margin-left:0px    !important ;margin-right:30px !important;" class="fas fa-envelope"></i> Contact Us </a>
                </li>
            </ul>
        </div>
    </div>

    <?php if ($isLoggedIn) : ?>
        <!-- Profile Modal -->
        <div class="modal fade profile-modal-unique" id="profileModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content-of-address" style="border-radius: 12px; border: none;">
                    <div class="modal-header p-3" style="border-bottom: 1px solid #e9ecef; background: #f8f9fa;">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-circle me-2" style="color: #2a7f62; font-size: 1.2rem;"></i>
                            <h6 class="modal-title mb-0" style="font-size: 0.95rem; font-weight: 600;">My Account</h6>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 0.7rem;"></button>
                    </div>
                    <div class="modal-body-of-address p-3">
                        <div class="text-center mb-3">
                            <div class="mx-auto mb-2" style="width: 50px; height: 50px; background-color: #e9f7ef; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user" style="color: #2a7f62; font-size: 1.5rem;"></i>
                            </div>
                            <h6 style="font-size: 0.9rem; font-weight: 600; margin-bottom: 0.2rem;">
                                <?= !empty($fname) ? htmlspecialchars($fname)  : 'Guest' ?>
                            </h6>
                            <p style="font-size: 0.75rem; color: #6c757d; margin-bottom: 0;">
                                <?= !empty($email) ? htmlspecialchars($email) : 'Email N/A' ?>
                            </p>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="<?= base_url('order'); ?>" class="btn btn-sm btn-outline-secondary d-flex align-items-center justify-content-between py-2 px-3" style="border-radius: 8px; font-size: 0.8rem;">
                                <span><i class="fas fa-history me-2" style="width: 18px; text-align: center;"></i>Order History</span>
                                <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
                            </a>
                            <!-- <a href="<?= base_url('track-order'); ?>" class="btn btn-sm btn-outline-secondary d-flex align-items-center justify-content-between py-2 px-3" style="border-radius: 8px; font-size: 0.8rem;">
                                <span><i class="fas fa-truck me-2" style="width: 18px; text-align: center;"></i>Track Order</span>
                                <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
                            </a> -->
                            <button
                                class="btn btn-sm btn-outline-secondary d-flex align-items-center justify-content-between py-2 px-3"
                                style="border-radius: 8px; font-size: 0.8rem;"
                                data-bs-toggle="modal"
                                data-bs-target="#addAddressModal"
                                data-bs-dismiss="modal">
                                <span><i class="fa-solid fa-location-dot me-2" style="width: 18px; text-align: center;"></i>Add Address</span>
                                <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
                            </button>
                        </div>

                        <div class="mt-3 pt-2 border-top text-center">
                            <a href="<?= base_url('logout'); ?>" class="btn btn-sm btn-danger w-100 py-2" style="border-radius: 8px; font-size: 0.8rem;"> <i class="fas fa-sign-out-alt me-1"></i> Log Out </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="toastContainer" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>
        <!-- Address Modal -->
        <div class="modal fade mobile-address-model" id="addAddressModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content-of-address" style="border-radius: 12px; border: none;">
                    <div class="modal-header p-3" style="border-bottom: 1px solid #e9ecef; background: #f8f9fa; ">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-location-dot me-2" style="color: #2a7f62; font-size: 1.2rem;"></i>
                            <h6 class="modal-title mb-0" style="font-size: 0.95rem; font-weight: 600;">Add New Address</h6>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 0.7rem;"></button>
                    </div>

                    <!-- me Form -->
                    <div class="modal-body-of-address p-3">
                        <form onsubmit="validationform(event)" id="addressForm-of-header">
                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <input type="text" name="first_name" class="form-control form-control-sm" placeholder="First Name*" required pattern="[A-Za-z\s]+" title="Only letters allowed" style="font-size: 0.8rem; border-radius: 6px;" />
                                </div>
                                <div class="col-6">
                                    <input type="text" name="last_name" class="form-control form-control-sm" placeholder="Last Name*" required pattern="[A-Za-z\s]+" title="Only letters allowed" style="font-size: 0.8rem; border-radius: 6px;" />
                                </div>
                            </div>

                            <div class="mb-2">
                                <input type="tel" name="phone" class="form-control form-control-sm" placeholder="Phone*" required pattern="[0-9]{10}" title="Enter 10-digit phone number" maxlength="10" style="font-size: 0.8rem; border-radius: 6px;" />
                            </div>

                            <div class="mb-2">
                                <input type="text" name="pincode" id="pincodeInput" class="form-control form-control-sm" placeholder="PIN Code*" required pattern="[1-9][0-9]{5}" title="Enter a 6-digit valid PIN code" maxlength="6" style="font-size: 0.8rem; border-radius: 6px;" />
                            </div>

                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <input type="text" name="country" id="countryInput" class="form-control form-control-sm" placeholder="Country*" required pattern="[A-Za-z\s]+" title="Only letters allowed" style="font-size: 0.8rem; border-radius: 6px;" />
                                </div>
                                <div class="col-6">
                                    <input type="text" name="state" id="stateInput" class="form-control form-control-sm" placeholder="State*" required pattern="[A-Za-z\s]+" title="Only letters allowed" style="font-size: 0.8rem; border-radius: 6px;" />
                                </div>
                            </div>

                            <div class="row g-2 mb-2">
                                <div class="col-6">
                                    <input type="text" name="district" id="districtInput" class="form-control form-control-sm" placeholder="District*" required pattern="[A-Za-z\s]+" title="Only letters allowed" style="font-size: 0.8rem; border-radius: 6px;" />
                                </div>
                                <div class="col-6">
                                    <input type="text" name="city" id="cityInput" class="form-control form-control-sm" placeholder="City*" required pattern="[A-Za-z\s]+" title="Only letters allowed" style="font-size: 0.8rem; border-radius: 6px;" />
                                </div>
                            </div>

                            <div class="mb-2">
                                <textarea name="address" class="form-control form-control-sm" rows="2" placeholder="Address (Area, colony, House No.)*" required style="font-size: 0.8rem; border-radius: 6px;"></textarea>
                            </div>

                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="addressType" id="homeType" value="home" checked style="width: 14px; height: 14px;" />
                                    <label class="form-check-label" for="homeType" style="font-size: 0.8rem;">Home</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="addressType" id="workType" value="work" style="width: 14px; height: 14px;" />
                                    <label class="form-check-label" for="workType" style="font-size: 0.8rem;">Work</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm w-100 py-2" style="border-radius: 8px; font-size: 0.8rem;">
                                <i class="fas fa-save me-1"></i> Save Address
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    <?php endif; ?>


    <!-- 🛒 Cart Drawer -->

    <div class="aa-offcanvas aa-offcanvas-end" tabindex="-1" id="aaCartDrawer" aria-labelledby="aaCartDrawerLabel" style="z-index: 9999 !important;">
  <div class="aa-offcanvas-header aa-border-bottom">
    <h5 class="aa-offcanvas-title" id="aaCartDrawerLabel">
      <i class="fas fa-shopping-cart me-2"></i> Your Cart
    </h5>
    <button type="button" class="aa-btn-close aa-text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="aa-offcanvas-body aa-p-0 aa-d-flex aa-flex-column" style="height: 100%; display: flex; flex-direction: column;">
    <!-- Cart Items Section -->
    <div id="aaCartItemsContainer" style="flex-grow: 1; overflow-y: auto; padding: 1rem;">
      <!-- Your cart items will be injected here -->
    </div>

    <!-- Subtotal and Checkout Section -->
    <div class="aa-subtotal-section" style="border-top: 1px solid #dee2e6; background-color: #f8f9fa; padding: 1rem;">
      <div class="aa-offer-banner" style="background-color: #fff3cd; color: #856404; padding: 0.75rem 1rem; text-align: center; font-size: 14px; margin-bottom: 10px;">
        <i class="fas fa-gift"></i> Hurry! Enjoy the best products
      </div>
      <div class="aa-subtotal-row" style="display: flex; justify-content: space-between; font-weight: bold; margin-bottom: 1rem;">
        <span>Estimated total</span>
        <span id="aaCartTotal">₹0</span>
      </div>
      <a href="<?= site_url('redirect/' . encrypt_url('order-summery')); ?>" class="btn btn-success aa-checkout-btn w-100">Checkout</a>
    </div>
  </div>
</div>
    <!-- language translate -->
    <!-- Load Google Translate API -->
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script>
        // Initialize Google Translate widget (called once)
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                autoDisplay: false
            }, 'google_translate_element');

            removeGoogleBanner();
        }

        // Trigger language translation
        function translatePage(lang) {
            const selectField = document.querySelector('.goog-te-combo');
            if (selectField) {
                selectField.value = lang;
                selectField.dispatchEvent(new Event('change'));
            } else {
                console.warn('Translation engine not ready yet.');
            }

            removeGoogleBanner();
        }

        // Remove Google Translate banner and iframe
        function removeGoogleBanner() {
            setTimeout(() => {
                document.querySelectorAll('.goog-te-banner-frame').forEach(el => el.remove());
                document.querySelectorAll('iframe').forEach(el => {
                    if (el.src.includes('translate.google')) el.remove();
                });
                document.body.style.top = '0px';
            }, 500);
        }
    </script>


    <!-- language translate end -->

    <script>
        function openProfileModal() {
            const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById("offcanvasMenu"));
            if (offcanvas) {
                offcanvas.hide();
            }

            setTimeout(() => {
                const profileModal = new bootstrap.Modal(document.getElementById("profileModal"));
                profileModal.show();
            }, 300);
        }

        // Initialize all modals when page loads
        document.addEventListener("DOMContentLoaded", function() {
            // Only initialize once
            if (!window.headerInitialized) {
                DropdownHandler.init();
                TabHandler.init();
                ModalHandler.init();

                if (window.USER_LOGGED_IN === true) {
                    AddressHandler.init();
                }

                window.headerInitialized = true;
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <!-- Set BASE_URL in JS from PHP -->
    <script>
        const BASE_URL = "<?= base_url() ?>";
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("aaCartItemsContainer");
            const totalEl = document.getElementById("aaCartTotal");
            const subtotalSection = document.querySelector(".aa-subtotal-section");
            const checkoutBtn = document.querySelector(".aa-checkout-btn");

            function renderCartDrawer() {
                let cart = Cookies.get("cart");
                cart = cart ? JSON.parse(cart) : {};

                container.innerHTML = "";
                let total = 0;
                const keys = Object.keys(cart);

                if (keys.length === 0) {
                    container.innerHTML = `
                    <div class="text-center p-4">
                        <h5>Your cart is empty 🛒</h5>
                        <p>Start shopping now and explore our Ayurvedic range.</p>
                        <a href="${BASE_URL}our_products" class="btn btn-primary mt-2">Shop Now</a>
                    </div>
                `;
                    totalEl.textContent = "₹0";
                    subtotalSection.style.display = "none";
                    return;
                }

                subtotalSection.style.display = "block";

                keys.forEach((key) => {
                    const item = cart[key];
                    const itemSubtotal = item.quantity * item.price;
                    total += itemSubtotal;

                    const imgSrc = item.image ? BASE_URL + item.image : "";

                    container.innerHTML += `
                    <div class="aa-cart-item" data-key="${key}">
                        <div class="d-flex align-items-center w-100">
                            <img src="${imgSrc}" alt="${item.name}" class="aa-cart-item-img">
                            <div class="aa-cart-item-details flex-grow-1">
                                <div class="aa-cart-item-name">${item.name}</div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="aa-quantity-controls">
                                        <button class="aa-quantity-btn decrement">-</button>
                                        <input type="text" class="aa-quantity-input" value="${item.quantity}" readonly>
                                        <button class="aa-quantity-btn increment">+</button>
                                    </div>
                                    <div class="aa-cart-item-price">₹${item.price}</div>
                                </div>
                            </div>
                            <button class="aa-remove-item-btn" data-key="${key}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                        <div class="w-100 mt-2">
                            <div class="d-flex justify-content-between">
                                <span>Subtotal:</span>
                                <strong>₹${itemSubtotal}</strong>
                            </div>
                        </div>
                    </div>
                `;
                });

                totalEl.textContent = `₹${total}`;

                // Remove item
                document.querySelectorAll(".aa-remove-item-btn").forEach((btn) => {
                    btn.addEventListener("click", function() {
                        const key = this.dataset.key;
                        delete cart[key];
                        Cookies.set("cart", JSON.stringify(cart), {
                            expires: 1,
                        });
                        renderCartDrawer();
                    });
                });

                // Increment / Decrement
                document.querySelectorAll(".aa-cart-item").forEach((itemEl) => {
                    const key = itemEl.dataset.key;
                    const decrementBtn = itemEl.querySelector(".decrement");
                    const incrementBtn = itemEl.querySelector(".increment");

                    decrementBtn.addEventListener("click", () => {
                        if (cart[key].quantity > 1) {
                            cart[key].quantity--;
                            Cookies.set("cart", JSON.stringify(cart), {
                                expires: 1,
                            });
                            renderCartDrawer();
                        }
                    });

                    incrementBtn.addEventListener("click", () => {
                        cart[key].quantity++;
                        Cookies.set("cart", JSON.stringify(cart), {
                            expires: 1,
                        });
                        renderCartDrawer();
                    });
                });
            }

            // Render drawer when opened
            document.getElementById("aaCartDrawer").addEventListener("show.bs.offcanvas", function() {
                renderCartDrawer();
            });

            // ✅ Remove buy_now cookie on checkout to ensure only cart is processed
            if (checkoutBtn) {
                checkoutBtn.addEventListener("click", function() {
                    Cookies.remove("buy_now");
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Blog Dropdown Elements
            const blogToggle = document.querySelector('.blog-dropdown-toggle');
            const blogMenu = document.querySelector('.blog-dropdown-menu');

            // Language Dropdown Elements
            const langToggle = document.querySelector('.lang-toggle-unique');
            const langMenu = document.querySelector('.lang-menu-unique');

            // Safe Toggle Helper
            function toggleMenu(toggleBtn, menu, otherMenu) {
                if (toggleBtn && menu) {
                    toggleBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        menu.classList.toggle('show');
                        if (otherMenu) otherMenu.classList.remove('show');
                    });
                }
            }

            // Safe Close on Click Outside
            document.addEventListener('click', function(e) {
                if (blogToggle && blogMenu && !blogToggle.contains(e.target)) {
                    blogMenu.classList.remove('show');
                }
                if (langToggle && langMenu && !langToggle.contains(e.target)) {
                    langMenu.classList.remove('show');
                }
            });

            // Toggle setup
            toggleMenu(blogToggle, blogMenu, langMenu);
            toggleMenu(langToggle, langMenu, blogMenu);

            // Close both dropdowns when any item inside them is clicked
            document.querySelectorAll('.blog-dropdown-menu .dropdown-item, .lang-menu-unique .dropdown-item').forEach(item => {
                item.addEventListener('click', function() {
                    if (blogMenu) blogMenu.classList.remove('show');
                    if (langMenu) langMenu.classList.remove('show');
                });
            });

            // Mobile: enable default Bootstrap dropdowns
            if (window.innerWidth <= 991.98) {
                const mobileBlogToggle = document.querySelector('.mobile-blog-dropdown-toggle');
                const mobileLangToggle = document.querySelector('.mobile-lang-dropdown-toggle');

                if (mobileBlogToggle) {
                    mobileBlogToggle.setAttribute('data-bs-toggle', 'dropdown');
                }
                if (mobileLangToggle) {
                    mobileLangToggle.setAttribute('data-bs-toggle', 'dropdown');
                }
            }
        });

  // WhatsApp hover effect
  const waLink = document.querySelector('a[href*="wa.me"]');
  const waText = waLink.querySelector('span');

  waLink.addEventListener('mouseover', () => {
    waLink.style.width = '160px';
    waText.style.opacity = '1';
  });

  waLink.addEventListener('mouseout', () => {
    waLink.style.width = '50px';
    waText.style.opacity = '0';
  });

  // ✅ Free Diagnosis hover effect
  const diagLink = document.querySelector('a[href*="/free-diagnosis"]');
  const diagText = diagLink.querySelector('span');

  diagLink.addEventListener('mouseover', () => {
    diagLink.style.width = '200px';
    diagText.style.opacity = '1';
  });

  diagLink.addEventListener('mouseout', () => {
    diagLink.style.width = '50px';
    diagText.style.opacity = '0';
  });
    </script>