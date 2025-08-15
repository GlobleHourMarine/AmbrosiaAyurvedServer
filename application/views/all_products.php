<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
  .ambrosia-product-heading {
    font-size: 20px;
  }

  .ambrosia-products-body .ambrosia-products-container {
    background: none !important;
    width: 100%;
    margin: 0px;
    background-color: #FFFFFF !important;
  }

  .ambrosia-products-body .ambrosia-footer-body {
    font-family: 'Poppins', Arial, sans-serif;
    /* background: #f9f9f9; */
    margin: 0;
    padding: 0;
    color: #333;
  }

  .ambrosia-products-body .ambrosia-products-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 15px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 20px;
    /* border:2px solid red; */
  }

  .ambrosia-products-body .ambrosia-product-card {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid rgba(76, 175, 80, 0.1);
    position: relative;

  }

  .ambrosia-products-body .ambrosia-product-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    background-color: #fffaf0;
  }

  .ambrosia-products-body .ambrosia-product-image-container {
    position: relative;
    height: 180px;
    overflow: hidden;
    background: #f9f9f9;
  }

  .ambrosia-products-body .ambrosia-product-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform 0.4s ease;
    padding: 15px;
  }

  .ambrosia-products-body .ambrosia-product-card:hover .ambrosia-product-image {
    transform: scale(1.04);
  }

  .ambrosia-products-body .ambrosia-product-hover-text {
    position: absolute;
    bottom: 12px;
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(12, 131, 58, 0.9);
    color: white;
    padding: 6px 18px;
    border-radius: 25px;
    font-size: 13px;
    font-weight: 600;
    opacity: 0;
    transition: opacity 0.3s ease;
    cursor: pointer;
  }

  .ambrosia-products-body .ambrosia-product-image-container:hover .ambrosia-product-hover-text {
    opacity: 1;
  }

  .ambrosia-products-body .ambrosia-product-details {
    padding: 12px 35px 15px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }

  .ambrosia-products-body .ambrosia-product-heading {
    font-size: 16px;
    margin: 0 0 6px 0;
    color: #0c833a;
    font-weight: 700;
    text-align: left;
    min-height: 40px;
    line-height: 1.3;
  }

  .ambrosia-products-body .product-line {
    height: 1.5px;
    background: linear-gradient(90deg, #0c833a, rgba(76, 175, 80, 0.3));
    margin: 0 0 10px 0;
    width: 35px;
  }

  .ambrosia-products-body .ambrosia-product-description {
    font-size: 13px;
    line-height: 1.4;
    color: #555;
    margin-bottom: 8px;
    flex-grow: 1;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    height: 72px;
    /* 4 lines x 18px line height */
  }

  .ambrosia-products-body .ambrosia-price-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 8px;
  }

  .ambrosia-products-body .ambrosia-price {
    font-size: 15px;
    font-weight: 700;
    color: #0c833a;
  }

  .ambrosia-products-body .ambrosia-reviews-container {
    margin: 8px 0 10px;
  }

  .ambrosia-products-body .ambrosia-stars {
    color: rgb(17, 99, 21);
    font-size: 22px;
    letter-spacing: 2px;
    position: relative;
    display: inline-block;
  }

  .ambrosia-products-body .ambrosia-stars::before {
    content: '★★★★★';
    opacity: 0.3;
  }

  .ambrosia-products-body .ambrosia-stars::after {
    content: '★★★★★';
    position: absolute;
    left: 0;
    top: 0;
    width: var(--rating, 100%);
    overflow: hidden;
  }

  .ambrosia-products-body .ambrosia-see-reviews {
    display: block;
    color: #0c833a;
    text-decoration: none;
    font-size: 18px;
    margin-top: 3px;
    font-weight: 600;
    transition: color 0.2s;
  }

  .ambrosia-products-body .ambrosia-see-reviews:hover {
    color: #0a6e30;
    text-decoration: underline;
  }

  .ambrosia-products-body .ambrosia-order-btn {
    background: linear-gradient(135deg, #0c833a, #4CAF50);
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 8px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    width: 100%;
  }

  .ambrosia-products-body .ambrosia-order-btn:hover {
    background: linear-gradient(135deg, #0a6e30, #45a049);
    box-shadow: 0 2px 8px rgba(12, 131, 58, 0.3);
  }

  .ambrosia-products-body .ambrosia-product-heading.main-title {
    grid-column: 1/-1;
    text-align: center;
    font-size: 24px;
    margin-bottom: 0px;
    color: #127c24;
    position: relative;
    padding-bottom: 12px;
    padding-top: 10px;
  }

  .ambrosia-products-body .ambrosia-product-heading.main-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 2px;
    background: linear-gradient(90deg, #0c833a, rgba(76, 175, 80, 0.3));
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .ambrosia-products-body .ambrosia-products-container {
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 15px;
      padding: 20px 10px;
    }

    .ambrosia-products-body .ambrosia-product-image-container {
      height: 160px;

    }

    .ambrosia-products-body .ambrosia-product-heading.main-title {
      font-size: 22px;
    }

    .ambrosia-products-body .ambrosia-stars {
      font-size: 16px;
    }
  }

  @media (max-width: 480px) {
    .ambrosia-products-body .ambrosia-products-container {
      grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
      gap: 12px;
    }

    .ambrosia-products-body .ambrosia-product-card {
      max-width: 100%;
    }

    .ambrosia-products-body .ambrosia-product-heading {
      font-size: 14px;
      min-height: 36px;
    }

    .ambrosia-products-body .ambrosia-price {
      font-size: 14px;
    }

    .ambrosia-products-body .ambrosia-order-btn {
      padding: 7px 10px;
      font-size: 12px;
    }

    .ambrosia-products-body .ambrosia-product-image-container {
      height: 140px;
    }

    .ambrosia-products-body .ambrosia-stars {
      font-size: 14px;
    }
  }


  .ambrosia-products-body .ambrosia-products-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 15px;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 20px;
    justify-content: center;
    /* Add this to center the grid */
  }

  /* For 1-3 items, make sure they're centered */
  @media (max-width: 768px) {
    .ambrosia-products-body .ambrosia-products-container {
      grid-template-columns: repeat(auto-fit, minmax(220px, 240px));
      /* Changed auto-fill to auto-fit */
      justify-content: center;
      gap: 15px;
    }
  }

  @media (max-width: 480px) {
    .ambrosia-products-body .ambrosia-products-container {
      grid-template-columns: 1fr;
      max-width: 300px;
    }

    .ambrosia-products-body .ambrosia-product-card {
      width: 100%;
      max-width: none;
    }
  }

  .ambrosia-products-body .ambrosia-products-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 15px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    justify-items: center;
  }

  .product-card {
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 128, 0, 0.08);
    transition: all 0.3s ease;
    overflow: hidden;
  }

  .product-card:hover {
    box-shadow: 0 10px 24px rgba(0, 128, 0, 0.15);
  }

  .btn-success {
    background-color: #198754;
    border-color: #198754;
  }

  .btn-success:hover {
    background-color: #146c43;
    border-color: #146c43;
  }

  .ambrosia-products-body .ambrosia-product-card {
    width: 100%;
    max-width: 300px;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    height: 100%;
    border: 1px solid rgba(76, 175, 80, 0.1);
  }


  @media (max-width: 900px) {
    .ambrosia-products-body .ambrosia-products-container {
      grid-template-columns: repeat(2, 1fr);
      gap: 25px;
    }

    .ambrosia-products-body .ambrosia-product-image-container {
      height: 200px;
    }
  }

  @media (max-width: 600px) {
    .ambrosia-products-body .ambrosia-products-container {
      grid-template-columns: 1fr;
      max-width: 350px;
      gap: 20px;
    }

    .ambrosia-products-body .ambrosia-product-card {
      max-width: 100%;
    }
  }

  @media (max-width: 576px) {
    .ambrosia-products-body .ambrosia-product-image-container {
      position: relative;
      height: 180px;
      overflow: hidden;
      background: #f9f9f9;
    }

    .ambrosia-products-body .ambrosia-product-image {
      width: 100% !important;
      height: 100% !important;
      transition: transform 0.4s ease;
      padding: 15px;
    }
  }


  .ambrosia-products-body .ambrosia-product-description {
    color: black !important;
  }

  td {
    color: black !important;

  }
</style>

<body>
  <div class="ambrosia-products-body">
    <div class="ambrosia-products-container ambrosia-footer-body">
      <h3 class="ambrosia-product-heading main-title">Our Products</h3>

      <?php if ($this->session->flashdata('message')): ?>
        <div class="ambrosia-flash-message">
          <?php echo $this->session->flashdata('message'); ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
          <div class="ambrosia-product-card">
            <div class="ambrosia-product-image-container">
              <a href="<?= base_url($product->slug); ?>" class="product-link">
                <?php
                $product_images = is_string($product->image)
                  ? json_decode($product->image, true)
                  : $product->image;
                ?>
                <img src="<?php echo base_url($product_images[0]); ?>" alt="<?php echo $product->product_name; ?>" class="ambrosia-product-image">
                <div class="ambrosia-product-hover-text">Buy Now</div>
              </a>
            </div>

            <div class="ambrosia-product-details">
              <h5 class="ambrosia-product-heading"><?php echo $product->product_name; ?></h5>
              <div class="product-line"></div>

              <div class="ambrosia-product-description">
                <strong class="ambrosia-bold-text">Description:</strong> <?php echo $product->discription; ?>
              </div>

              <div class="ambrosia-reviews-container">
                <div class="ambrosia-stars" style="--rating: <?= rand(70, 100) ?>%"></div>
                <a href="<?php echo base_url('user_reviews?slug=' . $product->slug); ?>" class="ambrosia-see-reviews">
                  <?= rand(15, 45) ?> Reviews
                </a>
              </div>

              <div class="ambrosia-price-container">
                <div class="ambrosia-price">₹<?php echo number_format($product->price); ?></div>
              </div>
              <div class="d-flex align-items-center gap-2 mt-3">
                <!-- Cart Button -->
                <button class="btn btn-outline-success d-flex justify-content-center align-items-center p-2 add-to-cart-btn"
                  data-id="<?= $product->product_id ?>"
                  data-name="<?= $product->product_name ?>"
                  data-baseprice="<?= $product->price ?>"
                  data-image="<?= $product_images[0] ?>"
                  title="Add to Cart"
                  style="width: 42px; height: 42px; border-radius: 8px;">
                  <i class="bi bi-cart3 fs-5"></i>
                </button>

                <!-- Order Now Button -->
                <a href="<?= base_url($product->slug); ?>" class="flex-grow-1 text-decoration-none">
                  <button class="btn btn-success w-100 px-4 py-2" style="border-radius: 8px;">
                    Order Now
                  </button>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align: center; font-size: 16px; color: #777; grid-column: 1/-1;">No products available.</p>
      <?php endif; ?>
    </div>
  </div>
</body>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- js-cookie -->
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>


<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".product-card-card").forEach(product => {
      const decrementBtn = product.querySelector(".decrement");
      const incrementBtn = product.querySelector(".increment");
      const quantityInput = product.querySelector(".quantity-input");

      decrementBtn.addEventListener("click", function() {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue < 1) {
          quantityInput.value = currentValue - 1;
        }
      });

      incrementBtn.addEventListener("click", function() {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue < 1) {
          quantityInput.value = currentValue + 1;
        }

      });
    });
  });
</script>