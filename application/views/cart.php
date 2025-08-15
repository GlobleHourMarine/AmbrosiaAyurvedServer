<!-- <html>

<head>
   <meta name="description" content="Review items in your Ambrosia Ayurved shopping cart. Proceed to checkout or continue shopping for authentic Ayurvedic products.">
</head>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> -->
<style>
   body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      overflow-y: hidden;
   }

   .cart {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      width: 40%;
      position: relative;
      margin-right: 0;
      animation: slideIn 0.8s forwards 0.2s;
      overflow-x: hidden;
      z-index: 9999;
      position: fixed;
      top: 0;
      right: 0;
      height: 100vh;
   }

   .cart_head {
      text-align: left;
      opacity: 0;
      top: 0;
      margin: 0;
      padding: 0;
      margin-top: 0;
      padding-top: 0px;
      padding-left: 5px;
      transform: translateX(100%);
      animation: slideIn 0.8s forwards 0.2s;
      background: #F5F5DC;
   }

   @keyframes slideIn {
      to {
         opacity: 1;
         transform: translateX(0);
      }
   }

   @keyframes slideInFromRight {
      from {
         transform: translateX(100%);
         opacity: 0;
      }

      to {
         transform: translateX(0);
         opacity: 1;
      }
   }

   .cart-products {
      display: flex;
      flex-direction: column;
      background-color: #fff;
      width: 100%;
      height: 60vh;
      top: 0;
      overflow-y: auto;
      overflow-x: hidden;
      animation: slideIn 0.8s forwards 0.2s;
      z-index: 9999;
      border: 7px solid #F5F5DC;
      border-bottom: 7px solid #F5F5DC;
      border-bottom: none;
      transform: translateX(100%);
      animation: slideInFromRight 1s ease-out forwards 0.5s;
   }

   table {
      width: 100%;
      border-collapse: collapse;
      table-layout: fixed;
   }

   td img {
      max-width: 100%;
      height: auto;
      object-fit: cover;
      border-radius: 8px;
   }

   .bill {
      font-size: 18px;
      color: orange;
      width: 100%;
      margin-bottom: 10px;
   }

   .underline {
      width: 45%;
      height: 2px;
      /* Adjust thickness as needed */
      margin: auto;
      padding-top: 0px;
      gap: 0px;
      background-color: #006666;
      /* Ensure visible */
   }

   .offer-section {
      padding: 20px;
      width: 100%;
      height: auto;
      position: sticky;
      bottom: 0;
      box-shadow: 0px -8px 8px rgba(0, 0, 0, 0.2);
      /* Top shadow only */
      animation: slideInFromRight 1s ease-out forwards 0.5s;
      z-index: 9999;
      border-radius: 5px;
      transform: translateX(100%);
      background-color: #fff;
      /* border:2px solid red; */
   }

   .offers {
      display: flex;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
   }

   .subtotal h4 {
      margin: 0;
   }

   .discount {
      display: flex;
      margin-top: 12px;
   }

   .discount input {
      flex: 1;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
   }

   th {
      border-bottom: 2px solid #ddd;
      border-color: #004d4d;
      text-align: left;
   }

   .discount button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 8px 16px;
      margin-left: 8px;
      border-radius: 6px;
      cursor: pointer;
   }

   .checkout-btn {
      width: 100% !important;
      margin-top: 5px;
      background-color: rgb(186, 195, 202);
      color: black !important;
      border: none;
      padding: 10px 175px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s ease, transform 0.3s ease;
      margin-bottom: 6px;
      text-decoration: none;
   }

   .checkout-btn:hover {
      background-color: rgb(141, 173, 197);
      box-shadow: 0 0 20px rgb(186, 195, 202, 0.8);
   }

   .removed-btnn {
      background-color: #ff0000;
      color: white;
      padding: 7px;
      border-radius: 5px;
      border: none;
      width: 100px;
      margin-left: 30px;
   }

   .subtotal-text {
      font-size: 18px;
      font-weight: bold;
      color: #006666;
      text-align: center;
      position: relative;
      text-align: left;
      animation: blink 1.5s infinite, glossyEffect 3s infinite;
   }

   /* Blinking Animation */
   @keyframes blink {
      0% {
         opacity: 1;
      }

      50% {
         opacity: 0.3;
      }

      100% {
         opacity: 1;
      }
   }

   /* Glossy Effect */
   @keyframes glossyEffect {
      0% {
         background: linear-gradient(90deg, rgba(0, 150, 150, 0.4) 0%, rgba(0, 150, 150, 0.4) 50%, rgba(0, 150, 150, 0.4) 100%);
         background-clip: text;
         -webkit-background-clip: text;
         /* color: transparent; */
      }

      50% {
         background: linear-gradient(90deg, rgba(0, 102, 204, 0.6) 0%, rgba(0, 150, 150, 0.4) 0%, rgba(0, 102, 204, 0.6) 100%);
         background-clip: text;
         -webkit-background-clip: text;
         /* color: transparent; */
      }

      100% {
         background: linear-gradient(90deg, rgba(0, 150, 150, 0.4) 0%, rgba(0, 150, 150, 0.4) 50%, rgba(0, 150, 150, 0.4) 100%);
         background-clip: text;
         -webkit-background-clip: text;
         /* color: transparent; */
      }
   }

   legend {
      color: #006666;
      font-size: 15px;
      font-weight: bold;
      margin-bottom: 12px;
   }

   .edited-address {
      width: 100%;
      height: 40px;
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
      border: 1px solid #ccc;
      outline: none;
      resize: none;
      background-color: #f9f9f9;
      transition: border-color 0.3s ease;
   }

   .edited-address:focus {
      border-color: #006666;
      box-shadow: 0 0 8px rgba(0, 102, 102, 0.5);
   }

   .form-container {
      display: flex;
      gap: 15px;
   }

   @keyframes fadeIn {
      from {
         opacity: 0;
         transform: translateY(20px);
      }

      to {
         opacity: 1;
         transform: translateY(0);
      }
   }

   .cart-header {
      font-size: 23px;
      position: sticky;
      top: 0;
      background-color: #fff;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      /* background-color:red !important; */
   }

   #close-btn {
      cursor: pointer;
   }

   .empty-cart {
      text-align: center;
      padding: 40px 10px;
   }

   .empty-cart img {
      width: 200px;
      height: auto;
      margin-top: 40px;
   }

   .empty-cart h2 {
      color: #555;
      font-size: 24px;
      /* margin-top: 20px; */
   }

   .empty-cart p {
      color: #888;
      font-size: 16px;
   }

   .shop-now-btn {
      background-color: green;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 16px;
      display: inline-block;
      margin-top: 10px;
   }

   .shop-now-btn:hover {
      color: white;
   }

   .hello-cart {
      width: 40%;
      font-size: 20px;
      font-weight: bold;
      color: black;
      position: fixed;
      top: 50px;
      z-index: 99999;
      padding: 10px;
      display: flex;
      margin-left: 150px;
      align-items: flex-start;
      justify-content: center;
   }

   .cart-animation-top {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding-top: 20px;
      margin-bottom: 30px;
   }

   .cart-animation-top lottie-player {
      width: 100%;
      max-width: 450px;
      height: auto;
      margin-right: 40%;
   }

   /* Responsive Styles */
   @media (min-width: 768px) {
      .main-container {
         flex-direction: row;
      }

      .content {
         width: 60%;
         padding: 20px;
      }

      .cart {
         width: 40%;
         position: fixed;
         top: 0;
         right: 0;
         height: 100vh;
         overflow-y: auto;
         transform: translateX(100%);
         animation: slideInFromRight 1s ease-out forwards 0.5s;
      }

      .cart-products {
         height: 60vh;
      }

      @keyframes slideInFromRight {
         from {
            transform: translateX(100%);
            opacity: 0;
         }

         to {
            transform: translateX(0);
            opacity: 1;
         }
      }
   }

   @media (max-width: 767px) {
      .cart-item {
         flex-direction: column;
      }

      .product-image-container {
         width: 100%;
         text-align: center;
         margin-bottom: 10px;
         padding-right: 0;
         border: 2px solid red;
      }

      .product-details {
         width: 100%;
         padding-left: 0;
      }

      .checkout-btn {
         width: 100%;
         margin: auto;
         left: 50%;
         /* border:2px solid red; */
      }

      .empty-cart img {
         width: 100%;
         /* overflow:hidden; */
      }
   }

   /* Flash Message Styles */
   .flash-message {
      color: green;
      font-weight: bold;
      margin-bottom: 10px;
      background-color: #f0fff0;
      padding: 10px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(144, 238, 144, 0.7);
      animation: glow 1s ease-in-out infinite alternate;
      text-align: center;
   }

   @keyframes glow {
      from {
         box-shadow: 0 0 10px rgba(144, 238, 144, 0.7);
      }

      to {
         box-shadow: 0 0 20px rgba(144, 238, 144, 0.9);
      }
   }

   @media (max-width: 767px) {
      .cart {
         position: relative;
         width: 100%;
         height: auto;
         animation: none;
         transform: none;
         box-shadow: none;
         top: 0;
         z-index: 0;
      }

      .cart-products {
         height: auto;
         max-height: none;
         overflow-y: visible;
      }

      .offer-section {
         position: relative;
         width: 100%;
         margin-top: 20px;
         bottom: auto;
         box-shadow: none;
         border-top: 1px solid #ddd;
         padding: 15px;
      }

      .checkout-btn {
         width: 100% !important;
         padding: 12px;
      }

      .hello-cart {
         width: 100%;
         margin-left: 0;
         position: relative;
         top: auto;
      }

      .cart-animation-top {
         margin-right: 0;
      }
   }

   @media (max-width: 767px) {
      .cart {
         position: fixed;
         top: 10%;
         left: 0;
         width: 100% !important;
         height: 100vh;
         margin: 0;
         padding: 0;
         overflow-y: auto;
      }

      .cart-products {
         height: auto;
         max-height: 60vh;
         border: none;
         border-bottom: 7px solid #F5F5DC;
      }

      /* Hide the cart animation on mobile */
      .cart-animation-top {
         display: none !important;
      }

      /* Adjust the empty cart image size on mobile */
      .empty-cart img {
         width: 80% !important;
         max-width: 250px;
      }
   }

   @media (min-width: 576px) {
      
   }


    .cart-container {
      width: 100%;
      height: 100%;
      background: #fff;
      position: relative;
   }
   
   .close-cart-btn {
      position: absolute;
      top: 15px;
      right: 15px;
      z-index: 100;
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: #666;
   }
   
   .cart-content {
      padding: 20px;
      height: 100%;
      overflow-y: auto;
   }
   
   /* Keep your existing cart styles but remove conflicting ones */
   .cart-products {
      height: calc(100% - 150px);
      overflow-y: auto;
   }
   
   .offer-section {
      position: sticky;
      bottom: 0;
      background: #fff;
      padding: 15px;
      border-top: 1px solid #eee;
   }
   /* Remove these animation styles */
@keyframes slideIn {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInFromRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Simplify cart styles */
.cart-container {
    width: 100%;
    height: 100%;
    background: #fff;
    position: relative;
}

.cart-content {
    padding: 20px;
    height: 100%;
    overflow-y: auto;
}

.cart-products {
    height: calc(100% - 150px);
    overflow-y: auto;
    /* Remove transform and animation properties */
}

</style>
<!-- </head> -->

<!-- <body> -->
   <?php if ($this->session->flashdata('add_product_msg')): ?>
      <div style="
         color: green;
         font-weight: bold;
         margin-bottom: 10px;
         background-color: #f0fff0;
         padding: 10px;
         border-radius: 8px;
         box-shadow: 0 0 15px rgba(144, 238, 144, 0.7);
         animation: glow 1s ease-in-out infinite alternate;
         text-align:center;
         ">
         <?php echo $this->session->flashdata('add_product_msg'); ?>
      </div>
   <?php endif; ?>
   </div>
   <!-- <div class="cart-container"> -->
   <div class="container-fluid cart   ">
      <?php if (!empty($cart_data)): ?>
         <div class="cart-products">
            <h2 class="cart_head"
               style="font-size:23px;position:sticky;top:0; display:flex;justify-content:space-between; align-items:center;background-color:rgb(186, 195, 202);">
               Cart
               <!-- <span id="close-btn" style="cursor:pointer; padding:10px;">
                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                     fill="#666">
                     <path
                        d="M480-428 292-240q-12 12-28 12t-28-12q-12-12-12-28t12-28l188-188-188-188q-12-12-12-28t12-28q12-12 28-12t28 12l188 188 188-188q12-12 28-12t28 12q12 12 12 28t-12 28L540-480l188 188q12 12 12 28t-12 28q-12 12-28 12t-28-12L480-428Z" />
                  </svg>
               </span> -->
            </h2>
            <table style="width: 100%; border-collapse: collapse;">
               <tr>
                  <th style="background-color:white; color: black;padding:10px;font-size:14px; text-align:center;">
                     Product Image
                  </th>
                  <th style="background-color:white color: black;padding:10px;font-size:14px;">Description</th>
               </tr>
               <?php foreach ($cart_data as $cart): ?>
                  <tr>
                     <td colspan="2">
                        <?php if ($this->session->flashdata('add_product_msg')): ?>
                           <div style="
                        font-weight: bold;
                        font-size:18px;
                        color: #004d4d;
                        width:100%;
                        text-align:center;
                        margin-bottom:5px;
                        text-shadow: 0 0 5px #00b3b3, 0 0 10px #00b3b3, 0 0 15px #00ffff;
                        animation: glow 1.5s ease-in-out infinite alternate;
                        ">
                              <?php echo $this->session->flashdata('add_product_msg'); ?>
                           </div>
                        <?php endif; ?>
                     </td>
                  </tr>
                  <tr>
                     <td style="width:30%; text-align:center;">
                        <?php
                        $product_images = isset($cart->is_pack) && $cart->is_pack
                           ? json_decode($cart->product_data->image)
                           : json_decode($cart->image);
                        ?> <img src="<?php echo base_url($product_images[0]); ?>" alt="Product Image"
                           style="width: 100px;height:150px;  border-radius: 8px;background-size:cover;" />
                        <p style="font-size:14px;color:#666;margin-top:10px;font-weight:bold;">Price: ₹<?php echo $cart->price; ?></p>
                     </td>
                     <td style="width:50%;text-align:center;">
                        <h5 style="color:rgb(11, 128, 128);font-weight:bold;padding-bottom:0px;">
                           <?php
                           echo isset($cart->is_pack) && $cart->is_pack
                              ? $cart->product_data->product_name
                              : $cart->product_name;
                           ?>
                        </h5>
                        <div class="underline"></div>
                        <p style="color: #666;font-size:12px;text-align:justify;margin-right:10px;">
                           <?php
                           echo isset($cart->is_pack) && $cart->is_pack
                              ? $cart->product_data->discription
                              : $cart->discription;
                           ?>
                        </p>
                        <div style="display:flex;justify-content: space-between; margin: 10px 0; ">
                           <p style="color:#666;font-size:14px;font-weight:bold;"> Net Quantity:<?php echo $cart->quantity; ?></p>
                           <form action="<?php echo base_url('delete_product_from_cart') ?>" method="POST">
                              <input type="hidden" name="cart_token" value="<?php echo $cart->cart_token; ?>">
                              <button style="border:none; background:none;color:#666;">
                                 <svg style="color:#666;"
                                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="#1f1f1f">
                                    <path
                                       d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                 </svg>
                              </button>
                           </form>
                        </div>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </table>
         </div>
         <div class="offer-section">
            <div class="offers">
               <span class="bill">Bill Details</span>
            </div>
            <div class="subtotal" style="padding-top:10px; border-top: 8px solid #f0f0f0;">
               <?php
               $subtotal = 0;
               $delivery_charges = 100;

               foreach ($cart_data as $cart):
                  $item_total = $cart->price * $cart->quantity;
                  $subtotal += $item_total;
               ?>
                  <h4 class="subtotal-text">SUBTOTAL:- Rs. <?php echo $cart->price; ?> </h4>
                  <?php
                  $sub_total = [
                     'subtotal' => $subtotal
                  ];
                  $this->session->set_userdata($sub_total);
                  ?>
                  <hr>
                  <div style="display: flex; justify-content: space-between; align-items: center;">
                     <div style="font-size: 18px;">
                        <?php
                        echo isset($cart->is_pack) && $cart->is_pack
                           ? $cart->product_data->product_name
                           : $cart->product_name;
                        ?>
                     </div>
                     <div style="font-size: 15px;">
                        Rs. <?php echo  $cart->price; ?>
                     </div>
                  </div>
                  <hr>
               <?php endforeach; ?>
               <div class="order-history" style="display:flex;justify-content: space-between; margin: 10px 0;">
                  <a href="order" style="text-decoration:none;color:black;smoke;font-size:14px;">order
                     history...</a>
                  <a href="order" style="text-decoration:none;color:black;smoke;margin-bottom:2px;">
                     <svg
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#1f1f1f">
                        <path
                           d="M120-560v-240h80v94q51-64 124.5-99T480-840q150 0 255 105t105 255h-80q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120Zm2 120h82q12 93 76.5 157.5T435-204l48 84q-138 0-242-91.5T122-440Zm412 70-94-94v-216h80v184l56 56-42 70ZM719 0l-12-60q-12-5-22.5-10.5T663-84l-58 18-40-68 46-40q-2-13-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T707-340l12-60h80l12 60q12 5 23 11.5t21 14.5l58-20 40 70-46 40q2 13 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T811-60L799 0h-80Zm40-120q33 0 56.5-23.5T839-200q0-33-23.5-56.5T759-280q-33 0-56.5 23.5T679-200q0 33 23.5 56.5T759-120Z" />
                     </svg>
                  </a>
               </div>
               <a class="checkout-btn " href="<?php echo base_url('order-summery'); ?>" class="checkout-btn" style="width:100%;">Check Out</a>
            </div>
         </div>
      <?php else: ?>
         <!-- 🛒 EMPTY CART MESSAGE -->
         <div class="container-fluid cart" style="width:90%;">
            <div class="cart-products" style="height:600px;width:100%;background-color:#f5f5DC;">
               <h2 style="background-color:rgb(186, 195, 202);!important ;" class="cart_head cart-header">
                  Cart
                  <span id="close-btn">
                     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#666">
                        <path d="M480-428 292-240q-12 12-28 12t-28-12q-12-12-12-28t12-28l188-188-188-188q-12-12-12-28t12-28q12-12 28-12t28 12l188 188 188-188q12-12 28-12t28 12q12 12 12 28t-12 28L540-480l188 188q12 12 12 28t-12 28q-12 12-28 12t-28-12L480-428Z" />
                     </svg>
                  </span>
               </h2>
               <!-- Empty Cart Section -->
               <div class="empty-cart">
                  <img src="/assets/images/cart_empty_1.png" alt="Empty Cart">
                  <h2>Your Cart is Empty</h2>
                  <p>Looks like you haven't added anything to your cart yet.</p>
                  <a href="/our_products" class="shop-now-btn">🛒 Start Shopping</a>
               </div>
            </div>
         </div>
      <?php endif; ?>
   </div>
      <!-- </div> -->
   </div>
   <script>
     document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('close-btn').addEventListener('click', function(e) {
        e.preventDefault();
        // Close the offcanvas cart
        const cartDrawer = bootstrap.Offcanvas.getInstance(document.getElementById('cartDrawer'));
        if (cartDrawer) {
            cartDrawer.hide();
        }
    });
});
      document.addEventListener('DOMContentLoaded', () => {
         const decrementBtns = document.querySelectorAll('.decrement');
         const incrementBtns = document.querySelectorAll('.increment');
         const quantityInputs = document.querySelectorAll('.quantity-input');

         decrementBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
               const input = quantityInputs[index];
               let value = parseInt(input.value, 10);
               if (value > 1) input.value = value - 1;
            });
         });

         incrementBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
               const input = quantityInputs[index];
               let value = parseInt(input.value, 10);
               input.value = value + 1;
            });
         });
      });
   








      
   </script>