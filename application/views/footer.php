
<style>
    .amb-footer-main {
        margin-top: 4px;
        position: relative;
        height: auto;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat;
        padding-top: 0px !important;
        padding-bottom: 80px !important;
        background: url(<?php echo base_url('/assets/images/footer_new.webp') ?>) !important;
    }

    .amb-footer-policy-container {
        display: flex !important;
        justify-content: space-between !important;
        margin-top: -10px !important;
        margin-bottom: 0px !important;
        padding: 10px 0px;
        justify-content: space-between;
    }

    .amb-footer-policy-container a {
        color: white !important;
        text-decoration: none;
        font-size: 15px !important;
    }

    .amb-footer-policy-container a:hover {
        font-weight: 600 !important;
        color: #084298;
    }

    .amb-footer-heading {
        color: white !important;
    }

    .amb-footer-address-box {
        color: white !important;

    }

    .amb-footer-line {
        background-color: none;
    }

    .amb-footer-quick-links li a {
        color: white !important;
        font-weight: 400 !important;
    }

    .amb-footer-quick-links li a:hover {
        color: black !important;
        font-weight: 500 !important;
        margin-left: 0px;
    }

    .amb-footer-contact-link {
        color: white !important;
        font-weight: 460 !important;
    }

    .amb-footer-contact-link:hover {
        color: black !important;
        font-weight: 490 !important;
    }

    /* New styles for logo and social icons */
    .amb-footer-logo {
        max-width: 120px;
        /* Reduced logo size */
        height: auto;
        margin-bottom: 15px;
    }

    .social-links-wrapper {
        margin-top: 20px;
        text-align: center;
    }

    .social-links-list {
        display: flex;
        justify-content: center;
        gap: 15px;
        padding: 0;
        list-style: none;
    }

    .amb-footer-social-icon {
        font-size: 18px;
        /* Smaller social icons */
        color: white;
    }

    .amb-footer-social-icon:hover {
        color: yellow;
        /* background-color:black; */
        /* border-radius:88px; */

    }

    .amb-footer-logo-container {
        display: none;
        /* Hide the duplicate logo */
    }

    .amb-footer-logo {
        max-width: 120px;
        height: auto;
        margin-bottom: 0px;
        margin-left: 50px;
        background-color: white;
        padding: 10px 12px;
        border-radius: 8px;
    }

    @media(max-width:576px) {
        .amb-footer-logo {
            max-width: 80px;
            height: auto;
            margin-bottom: 0px;
            margin-left: 0px;
            background-color: white;
            padding: 7px 10px;
            border-radius: 8px;
        }
    }

    .certification-title {
    font-family: 'Poppins', 'Nunito', 'Quicksand', sans-serif;
    color: #000; /* black */
    font-weight: 600;
    font-size: 2rem; /* adjust as needed */
    letter-spacing: 0.5px;
}

    .amb-footer-main {
        background-size: cover !important;
        background-position: center !important;
    }

    /* Updated social icons styles */
    .social-links-wrapper {
        margin-top: 20px;
        text-align: center;
    }

    .social-links-list {
        display: flex;
        justify-content: center;
        gap: 15px;
        padding: 0;
        list-style: none;
    }

    .amb-footer-social-item a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background-color: white;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .amb-footer-social-icon {
        font-size: 18px;
        transition: all 0.3s ease;
    }

    /* Original colors for each platform */
    .amb-footer-social-item .fa-facebook {
        color: #1877F2;
    }

    .amb-footer-social-item .fa-instagram {
        color: #E4405F;
    }

    .amb-footer-social-item .fa-square-twitter {
        color: #1DA1F2;
    }

    .amb-footer-social-item .fa-envelope {
        color: #EA4335;
    }

    .amb-footer-social-item .fa-linkedin-in {
        color: #0A66C2;
    }

    /* Hover effects */
    .amb-footer-social-item a:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .amb-footer-social-item a:hover .amb-footer-social-icon {
        transform: scale(1.1);
    }

    svg:not(:host).svg-inline--fa,
    svg:not(:root).svg-inline--fa {
        margin: auto !important;
    }
    .amb-certified-section1 {
        background-color: #f3f5ee; 
        padding: 20px 0;
        overflow: hidden;
        position: relative;
        border-top: double;
    }

.certification-title {
    margin-top: 10px;
    margin-bottom: 30px;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    display: inline-block; 
    padding: 10px; 
    color: #4a5f1a;
    border-radius: 10px; 
}
.certification-title-wrapper {
    text-align: center;
}

.marquee-container {
    overflow: hidden;
    position: relative;
}

.marquee-track {
    display: flex;
    animation: scroll-left 25s linear infinite;
}

.marquee-container:hover .marquee-track {
    animation-play-state: paused;
}

.marquee-item {
    flex: 0 0 auto;
    margin: 0 15px;
    display: flex;
    justify-content: center;
}

.arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.5);
    color: white;
    border: none;
    padding: 8px;
    cursor: pointer;
    z-index: 10;
    border-radius: 50%;
    font-size: 20px;
}

.arrow.left { left: 10px; }
.arrow.right { right: 10px; }

@keyframes scroll-left {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}
</style>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Nunito:wght@400;600&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

<div class="amb-certified-section1">
    <div class="certification-title-wrapper">
        <h4 class="certification-title">Our Certifications &amp; Accreditations</h4>
    </div>

    <div class="marquee-container" id="marquee">
        <div class="marquee-track" id="marqueeTrack">
        
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/UKAF.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">UKAF Certified</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/QCC.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">QCC Certified</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/MLCL.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">MLCL Certified</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/EAS.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">EAS Certified</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/IAF.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">IAF Endorsed</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/ITC.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">ITC Labs Tested</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/QAICB.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">QAICB Certified</div></div></div>

            <!-- Duplicate Section -->
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/UKAF.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">UKAF Certified</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/QCC.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">QCC Certified</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/MLCL.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">MLCL Certified</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/EAS.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">EAS Certified</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/IAF.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">IAF Endorsed</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/ITC.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">ITC Labs Tested</div></div></div>
            <div class="marquee-item"><div style="text-align:center;width:150px"><img src="assets/images/QAICB.webp" style="width:80px;margin-bottom:10px"><div style="font-weight:600;font-size:14px;color:#444;">QAICB Certified</div></div></div>
            <!-- END CERTIFICATES -->
        </div>
    </div>
</div>

    <!-- Rest of your footer remains the same -->
    <div class="container-fluid amb-footer-main">
        <div class="container">
            <div class="d-flex amb-footer-content">
                <div class="amb-footer-section mt-5">
                    <a href="/"><img src="<?php echo base_url('/assets/images/new_logo11.webp'); ?>" alt="Ambrosia Logo" class="amb-footer-logo"></a>
                    <div class="amb-footer-address-box px-2 py-3">
                        Ground Floor, Plot no. 1230, ARK Tower, <br>JLPL Industrial Area, , Sector 82 Mohali, <br>S.A.S Nagar, Punjab - 140308
                    </div>
                </div>

                <div class="amb-footer-section mt-5" style="width:44%;">
                    <div class="amb-footer-quick-links-container">
                        <div class="amb-footer-quick-links-col">
                            <ul class="amb-footer-quick-links">
                                <li><a href="<?php echo base_url('/'); ?>"> Home</a></li>
                                <li><a href="<?php echo base_url('about_us'); ?>"> About us</a></li>
                                <li><a href="<?php echo base_url('our_products'); ?>"> Our Products</a></li>
                                <li><a href="<?php echo base_url('a5-herbal-supplement'); ?>"> Product Description</a></li>
                                <li><a href="<?php echo base_url('order'); ?>"> Order History</a></li>
                                <li><a href="<?php echo base_url('contact_us'); ?>">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="amb-footer-quick-links-col">
                            <ul class="amb-footer-quick-links">
                                <li><a href="https://ambrosiaayurved.in/blog/"> Blogs</a></li>
                                <li><a href="<?php echo base_url('privacy_policy'); ?>">Privacy Policy</a></li>
                                <li><a href="<?php echo base_url('terms_conditions'); ?>">Terms and Conditions</a></li>
                                <li><a href="<?php echo base_url('shipping_policy'); ?>">Shipping and Delivery Policy</a></li>
                                <li><a href="<?php echo base_url('cancellation_policy'); ?>">Cancellation, Return and Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="amb-footer-section mt-5">
                    <p style="color:white;">Customer Care No: 80000-57233</p>
                    <p style="color:white;">Email:<a href="mailto:care@ambrosiaayurved.in" class="amb-footer-contact-link"> care@ambrosiaayurved.in</a></p>

                    <!-- Social links moved here -->
                    <div class="social-links-wrapper">
                        <ul class="social-links-list">
                            <li class="amb-footer-social-item"><a href="https://www.facebook.com/people/Ambrosia-Ayurved/61575172705272/?sk=photos"><i class="fa-brands fa-facebook amb-footer-social-icon"></i></a></li>
                            <li class="amb-footer-social-item"><a href="https://www.instagram.com/ambrosia.ayurved/"><i class="fa-brands fa-instagram amb-footer-social-icon"></i></a></li>
                            <li class="amb-footer-social-item  "><a href="https://x.com/AmbrosiaAyurved"><i class="fa-brands fa-square-twitter amb-footer-social-icon "></i></a></li>
                            <li class="amb-footer-social-item"><a href="mailto:care@ambrosiaayurve.in"><i class="fa-solid fa-envelope amb-footer-social-icon"></i></a></li>
                            <li class="amb-footer-social-item"><a href="https://www.linkedin.com/company/ambrosia-ayurved"><i class="fa-brands fa-linkedin-in  amb-footer-social-icon"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- <script src="< base_url('assets/js/header.js') ?>"></script> -->

<!-- Core Libraries (load in this order) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Google Translate (if needed early, keep in <head> with async) -->
<!-- Page-Specific JS -->
<?php if (!empty($custom_js)) {
    foreach ($custom_js as $js) {
        echo '<script src="' . base_url($js) . '"></script>' . "\n";
    }
} ?>

<!-- ......... Add to cart code............ -->
<script>
    function updateGlobalCartCount() {
        let cart = Cookies.get("cart");
        cart = cart ? JSON.parse(cart) : {};
        let total = 0;
        for (let key in cart) {
            total += cart[key].quantity || 0;
        }
        const badge = document.getElementById("cartCount");
        if (badge) {
            badge.textContent = total;
            badge.style.display = total > 0 ? "inline-block" : "none";
        }
    }

    function showToast(message, type) {
        const toast = document.createElement("div");
        toast.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
        toast.style.zIndex = "9999";
        toast.textContent = message;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateGlobalCartCount();

        const quantityInput = document.querySelector(".quantity-input");
        const addToCartBtn = document.querySelector(".add-to-cart-btn");
        const buyNowBtn = document.querySelector(".buy-now-btn");

        const productId = addToCartBtn?.dataset.id;
        const productName = addToCartBtn?.dataset.name;
        const basePrice = parseFloat(addToCartBtn?.dataset.baseprice);
        const productImage = addToCartBtn?.dataset.image;

        // Quantity controls
        document.querySelector(".decrement")?.addEventListener("click", () => {
            let val = parseInt(quantityInput?.value || 1);
            if (val > 1) quantityInput.value = val - 1;
        });

        document.querySelector(".increment")?.addEventListener("click", () => {
            quantityInput.value = parseInt(quantityInput?.value || 1) + 1;
        });

        // Pack selection
        const packOptions = document.querySelectorAll(".pack-option");
        packOptions.forEach(option => {
            option.addEventListener("click", function() {
                packOptions.forEach(o => o.classList.remove("selected"));
                this.classList.add("selected");
            });
        });

        function getSelectedPack() {
            const selected = document.querySelector(".pack-option.selected");
            if (selected) {
                return {
                    packId: selected.getAttribute("data-id"),
                    packPrice: parseFloat(selected.getAttribute("data-price")),
                    packQty: selected.getAttribute("data-qty")
                };
            }
            return {
                packId: null,
                packPrice: basePrice,
                packQty: 1
            };
        }

        function addToCart(productId, productName, unitPrice, quantity, packId = null, packQty = 1) {
            const cartKey = packId ? `pack_${productId}_${packId}` : `product_${productId}`;
            let cart = Cookies.get("cart");
            cart = cart ? JSON.parse(cart) : {};

            if (cart[cartKey]) {
                cart[cartKey].quantity += quantity;
            } else {
                cart[cartKey] = {
                    product_id: productId,
                    name: productName,
                    price: unitPrice,
                    quantity: quantity,
                    pack_id: packId,
                    pack_qty: packQty,
                    image: productImage || ''
                };
            }

            Cookies.set("cart", JSON.stringify(cart), {
                expires: 1
            });
            updateGlobalCartCount();
            console.log("✅ Cart Updated:", cart);
        }

        function setBuyNowItem(productId, productName, unitPrice, quantity, packId = null, packQty = 1) {
            const buyNowItem = {
                product_id: productId,
                name: productName,
                price: unitPrice,
                quantity: quantity,
                pack_id: packId,
                pack_qty: packQty,
                image: productImage || ''
            };
            Cookies.set("buy_now", JSON.stringify(buyNowItem), {
                expires: 1
            });
            console.log("⚡ Buy Now Item Set:", buyNowItem);
        }

        // Add to Cart
        addToCartBtn?.addEventListener("click", () => {
            const quantity = parseInt(quantityInput?.value || 1);
            const {
                packId,
                packPrice,
                packQty
            } = getSelectedPack();
            addToCart(productId, productName, packPrice, quantity, packId, packQty);
            alert("🛒 Product added to cart!");
        });

        // Buy Now
        buyNowBtn?.addEventListener("click", () => {
            const quantity = parseInt(quantityInput?.value || 1);
            const {
                packId,
                packPrice,
                packQty
            } = getSelectedPack();
            setBuyNowItem(productId, productName, packPrice, quantity, packId, packQty);
            window.location.href = "<?= base_url('order-summery') ?>";
        });

        // Show Email Modal for Alternate Flow
        document.querySelector(".buy-product-btn")?.addEventListener("click", function() {
            const productId = this.dataset.id;
            const productName = this.dataset.name;
            const price = parseFloat(this.dataset.baseprice);
            const image = this.dataset.image;
            const qtyInput = document.querySelector(".quantity-input");
            const quantity = parseInt(qtyInput?.value || 1);

            const orderData = {
                product_id: productId,
                name: productName,
                price: price,
                quantity: quantity,
                image: image,
                timestamp: new Date().getTime()
            };

            Cookies.set("alternate_order", JSON.stringify(orderData), {
                expires: 1
            });

            const modal = new bootstrap.Modal(document.getElementById('emailVerificationModal'));
            modal.show();
        });

      

        // Live AJAX email verification
        $('#verifyEmailBtn').on('click', function() {
            var email = $('#userEmail').val().trim();
            var data = {
                email: email
            };

            $.ajax({
                url: '<?= base_url("Alternative_flow/verify_ambrosia_user") ?>',
                type: 'POST',
                data: data,
                success: function(response) {
                    $('#emailSection').hide();
                    $('#otpSection').show();
                    $('#verifyEmailBtn').hide();
                    $('#verifyOTPBtn').show();
                    sessionStorage.setItem('order_email', email);
                    $('#userOTP').focus();
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                }
            });
        });

        // OTP verification logic
        document.getElementById("verifyOTPBtn").addEventListener("click", function() {
            const otp = document.getElementById("userOTP").value;
            const email = sessionStorage.getItem("order_email");

            if (!otp || otp.length !== 6) {
                document.getElementById("userOTP").classList.add("is-invalid");
                return;
            }

            const verifyBtn = this;
            verifyBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verifying...';
            verifyBtn.disabled = true;

            fetch("<?= base_url('Alternative_flow/verify_ambrosia_user_otp') ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    body: JSON.stringify({
                        email: email,
                        otp: otp,
                    }),
                })
                .then((response) => {
                    if (!response.ok) throw new Error("Network error");
                    return response.json();
                })
                .then((data) => {
                    if (data.success) {
                        const otpModal = bootstrap.Modal.getInstance(document.getElementById("emailVerificationModal"));
                        otpModal.hide();

                        const nextModal = new bootstrap.Modal(document.getElementById("nextStepModal"));
                        nextModal.show();
                    } else {
                        alert(data.message || "Invalid OTP. Please try again.");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Verification failed. Please try again.");
                })
                .finally(() => {
                    verifyBtn.innerHTML = "Verify & Continue";
                    verifyBtn.disabled = false;
                });
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    });

  $(document).ready(function(){
    $('.certification-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 6000,
        autoplaySpeed: 1500,
        smartSpeed: 2000,
        responsive: {
            0: { items: 2 },
            600: { items: 3 },
            1000: { items: 5 }
        }
    });
  });

    // Hover Effect for Zoom
    document.querySelectorAll('#certCarousel > div').forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.style.transform = "translateY(-5px)";
            item.style.boxShadow = "0 12px 25px rgba(0,0,0,0.15)";
            item.querySelector('img').style.transform = "scale(1.05)";
        });
        item.addEventListener('mouseleave', () => {
            item.style.transform = "translateY(0)";
            item.style.boxShadow = "0 8px 20px rgba(0,0,0,0.08)";
            item.querySelector('img').style.transform = "scale(1)";
        });
    });

    // Auto Scroll Carousel
    setInterval(() => {
        const carousel = document.getElementById('certCarousel');
        carousel.scrollBy({left: 200, behavior: 'smooth'});
        if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth) {
            carousel.scrollTo({left: 0, behavior: 'smooth'});
        }
    }, 2500);

let marqueeTrack = document.getElementById("marqueeTrack");

function manualScroll(direction) {
    marqueeTrack.style.animation = "none";
    let scrollAmount = direction * 200; // adjust speed per click
    marqueeTrack.style.transform = `translateX(${scrollAmount}px)`;
    setTimeout(() => {
        marqueeTrack.style.animation = "scroll-left 10s linear infinite";
        marqueeTrack.style.transform = "translateX(0)";
    }, 500);
}

</script>
</html>