<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Description Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
      color: #333;
    }

    .des_container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      max-width: 1200px;
      margin: 30px auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
    }

    /* Thumbnails */
    .thumbnails {
      display: flex;
      flex-direction: column;
      gap: 10px;
      flex: 0 0 80px;
    }

    .thumbnails img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      cursor: pointer;
      border: 2px solid transparent;
    }

    .thumbnails video {
      width: 80px;
      height: 80px;
      object-fit: cover;
      cursor: pointer;
      border: 2px solid transparent;
      border-radius: 9999px;
      /* circle for video */
    }


    .thumbnails img.active,
    .thumbnails video.active {
      border-color: #28a745;
    }

    /* Main display */
    .main-display {
      flex: 1;
      max-width: 379px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .main-display img,
    .main-display video {
      width: 100%;
      border-radius: 10px;
    }

    /* Buttons */
    .buttons {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .buttons button {
      flex: 1;
      padding: 12px;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    .add-cart {
      background: #ff9800;
      color: #fff;
    }

    .buy-now {
      background: #28a745;
      color: #fff;
    }

    /* Product info */
    .product-info {
      flex: 1;
      min-width: 250px;
      padding: 15px;
      margin-right: 17px;
    }

    .product-info h1 {
      margin: 0 0 10px;
      font-size: 24px;
    }

    .rating {
      color: gold;
      margin-bottom: 10px;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
      gap: 10px;
      margin-bottom: 10px;
    }

    @media(min-width: 640px) {
      .grid-container {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    .grid-item {
      display: flex;
      align-items: center;
      gap: 10px;
      background: #f3f4f6;
      padding: 10px;
      border-radius: 8px;
    }

    .grid-item i {
      color: #047857;
      font-size: 1.25rem;
    }

    /* Pack options */
    #pack-options {
      display: flex;
      gap: 1rem;
      overflow-x: auto;
      margin-top: 15px;
      scrollbar-width: none;
      justify-content: space-evenly;
    }

    #pack-options::-webkit-scrollbar {
      display: none;
    }

    .pack-option {
      position: relative;
      border-radius: 1rem;
      padding: 1rem;
      cursor: pointer;
      text-align: center;
      box-sizing: border-box;
      flex: 0 0 auto;
      /* So they don't shrink in flex mode */
      transition: box-shadow 0.3s ease;
      border: 1px solid #9ca3af;
    }

    .pack-option:hover {
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .pack-option.selected {
      border: 2px solid #16a34a;
      /* green-600 */
      background-color: #dcfce7;
      /* green-50 */
      text-align: left;
    }

    .pack-option:not(.selected) {
      border: 1px solid #9ca3af;
      /* gray-400 */
      background-color: white;
      text-align: left;
    }

    .check-icon {
      position: absolute;
      top: 8px;
      right: 8px;
      font-size: 1.25rem;
      display: none;
    }

    .pack-option.selected .check-icon {
      display: block;
      color: #16a34a;
    }

    .pack-option h3 {
      margin: 0 0 5px;
      font-weight: 600;
    }

    .pack-option p {
      margin: 2px 0;
    }

    .pack-option .price {
      color: #047857;
      font-weight: 700;
      font-size: 1.25rem;
    }

    .pack-option .old-price {
      text-decoration: line-through;
      color: #6b7280;
      font-size: 0.875rem;
    }

    .pack-option .text-red {
      color: #dc2626;
      font-weight: 600;
    }

    /* Responsive */
    @media(max-width: 768px) {
      .des_container {
        flex-direction: column;
        align-items: center;
      }

      .thumbnails {
        flex-direction: row;
        justify-content: center;
      }

      .main-display {
        max-width: 100%;
      }
    }

    /* Media queries for md: breakpoint (min-width: 768px) */
    @media (min-width: 768px) {
      #navbar {
        overflow-x: visible;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      #navbar a {
        min-width: auto;
        margin-left: 2.5rem;
        margin-right: 2.5rem;
      }

      #navbar a i {
        padding: 0.5rem;
        /* md:p-2 */
      }

      #navbar a h1 {
        font-size: 1rem;
        /* md:text-base */
      }
    }

    @media (max-width: 768px) {
      section div[style*="grid-template-columns"] {
        grid-template-columns: 1fr !important;
      }
    }

    @media (max-width: 1024px) {
      section>div {
        grid-template-columns: repeat(2, 1fr) !important;
      }
    }

    @media (max-width: 640px) {
      section>div {
        grid-template-columns: repeat(1, 1fr) !important;
      }
    }

    @media screen and (max-width: 1024px) {
      .review-grid {
        grid-template-columns: repeat(2, 1fr) !important;
      }
    }

    @media screen and (max-width: 640px) {
      .review-grid {
        grid-template-columns: 1fr !important;
      }
    }

    @media (min-width: 1024px) {
      .pack-option {
        width: 28% !important;
      }
    }
    @keyframes fadeIn {
  from {opacity:0; transform:translateY(10px);}
  to {opacity:1; transform:translateY(0);}
}

/* Pack options container */
#pack-options {
  display: flex;
  flex-wrap: wrap; /* Allows wrapping instead of scroll */
  gap: 1rem;
  margin-top: 15px;
  justify-content: center;
}

/* Each pack card */
.pack-option {
  position: relative;
  border-radius: 1rem;
  padding: 1rem;
  cursor: pointer;
  text-align: left;
  box-sizing: border-box;
  transition: box-shadow 0.3s ease;
  border: 1px solid #9ca3af;
  width: 31%; /* 3 cards per row on large screens */
  background-color: white;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.pack-option:hover {
  box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.pack-option.selected {
  border: 2px solid #16a34a; /* green-600 */
  background-color: #dcfce7; /* green-50 */
}

/* Check icon only visible when selected */
.check-icon {
  position: absolute;
  top: 8px;
  right: 8px;
  font-size: 1.25rem;
  display: none;
}

.pack-option.selected .check-icon {
  display: block;
  color: #16a34a;
}

/* Text styles */
.pack-option h4 {
  margin: 0 0 5px;
  font-weight: 600;
}

.pack-option p {
  margin: 2px 0;
}

.pack-option .price {
  color: #047857; /* green-700 */
  font-weight: 700;
  font-size: 1.25rem;
}

.pack-option .old-price {
  text-decoration: line-through;
  color: #6b7280; /* gray-500 */
  font-size: 0.875rem;
}

.pack-option .text-red {
  color: #dc2626; /* red-600 */
  font-weight: 600;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
  #pack-options .pack-option {
    width: 45%; /* 2 per row on tablets */
  }
}

@media (max-width: 480px) {
  #pack-options .pack-option {
    width: 100%; /* Single column on mobile */
  }
}
  .qty-wrap{
    --green: #16a34a;         /* green-600 */
    --green-soft:#dcfce7;     /* green-50 */
    --green-dark:#047857;     /* green-700 */
    --gray:#9ca3af;           /* gray-400 */
    --text:#111827;           /* gray-900 */
    --bg:#fff;
    display:grid;
    margin-top: 10px;
    max-width: 360px;
    border:1px solid var(--gray);
    border-radius: 1rem;
    padding: 1rem;
    background: var(--bg);
    box-shadow: 0 6px 14px rgba(0,0,0,.06);
  }
  .qty-label{
    font-size:.9rem;
    font-weight:600;
    color: var(--text);
  }
  .qty-box{
    display:flex;
    align-items:center;
    justify-content: center;
    gap:.5rem;
    background: #f9fafb;
    border:1px solid #e5e7eb;
    border-radius: .75rem;
    padding:.4rem;
  }
  .qty-btn{
    width:44px; height:44px;
    border:1px solid var(--gray);
    background:#fff;
    border-radius:.75rem;
    font-size:1.4rem;
    line-height:1;
    cursor:pointer;
    transition: transform .12s ease, box-shadow .2s ease, border-color .2s ease;
    box-shadow: 0 3px 8px rgba(0,0,0,.06);
    user-select: none;
  }
  .qty-btn:hover{ transform: translateY(-1px); }
  .qty-btn:active{ transform: translateY(0); box-shadow:none; }
  .qty-btn:focus{ outline:2px solid var(--green-soft); outline-offset:2px; }
  .qty-btn:disabled{
    opacity:.5; cursor:not-allowed; transform:none; box-shadow:none;
  }
  .qty-btn.plus{ border-color: var(--green); color: var(--green-dark); }
  .qty-btn.minus{ border-color: #d1d5db; }

  .qty-input{
    width:92px; height:44px;
    text-align:center;
    border:1px dashed #d1d5db;
    background:#fff;
    border-radius:.75rem;
    font-size:1.1rem;
    font-weight:600;
    color:var(--text);
    -moz-appearance: textfield;
  }
  .qty-input:focus{ outline:2px solid var(--green-soft); }
  /* hide spinners for Chrome */
  .qty-input::-webkit-outer-spin-button,
  .qty-input::-webkit-inner-spin-button{ -webkit-appearance: none; margin:0; }

  .qty-meta{
    display:flex;
    align-items:center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap:.5rem;
    font-size:.92rem;
  }
  .stock-note{
    padding:.25rem .5rem;
    border-radius:.5rem;
    background: var(--green-soft);
    color: var(--green-dark);
  }
  .price-line{
    display:flex; align-items:center; gap:.45rem;
    color:#374151;
  }
  .price-line .sep{ opacity:.5; }
  .price-line strong{ color: var(--green-dark); }

  #Videos,
#benefits,
#reviews,
#faqs,
#ingredients,
#howtouse {
  scroll-margin-top: 80px; 
}

    
    .herbal-container {
        /* border: 2px solid #a5d6a7; */
        border-radius: 20px;
        padding: 20px;
        /* background-color: #ffffff; */
        /* box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1); */
        width: 90%;
        max-width: 1200px;
        text-align: center;
        justify-self: anchor-center;
    }

    .herbal-title {
      text-align: center;
        font-size: clamp(1.5em, 5vw, 2.5em);
        font-weight: 600;
        color: #388e3c;
        margin-bottom: 20px;
        text-transform: uppercase;
        /* margin-top: 40px; */
        letter-spacing: 2px;
    }

    .herbal-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr); /* 5 items per row */
        gap: 20px;
        justify-items: center;
        align-items: start;
    }

    .herbal-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        font-size: 1em;
        color: #555;
    }

    .herbal-item img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        margin-bottom: 5px;
        border-radius: 10px;
    }

    .herbal-name {
        font-weight: bold;
        white-space: nowrap;
    }

    .herbal-description {
        font-size: 0.8em;
        color: #777;
        margin-top: 5px;
        max-width: 120px;
        white-space: normal;
    }

    @media (max-width: 1100px) {
        .herbal-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    @media (max-width: 900px) {
        .herbal-grid {
            grid-template-columns: repeat(3, 1fr);
        }
        .herbal-item img {
            width: 90px;
            height: 90px;
        }
    }

    @media (max-width: 600px) {
        .herbal-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 400px) {
        .herbal-grid {
            grid-template-columns: 1fr;
        }
    }
    /* ====== RESET + TOKENS ====== */
      *,*::before,*::after{box-sizing:border-box;}
      body{margin:0;font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial,"Noto Sans","Apple Color Emoji","Segoe UI Emoji";color:#24302b;background:#f0f2ee;}
      img{max-width:100%;display:block;}

      :root{
        --herbal-rail:#45683f;
        --herbal-rail-dot:#b9d6ab;
        --herbal-stage-bg:#fff;
        --herbal-ink:#24302b;
        --herbal-muted:#6e786f;
        --herbal-line:#d8e6d5;
        --herbal-accent:#b9d6ab;
        --herbal-card:#eaece6;
        --herbal-card-top:#cfe0c9;
        --herbal-gap:36px;
        --herbal-stage-max:1100px;
      }

      /* ====== PAGE FRAME ====== */
      .herbal-frame{min-height:100svh;display:grid;grid-template-columns:200px minmax(0,1fr) 200px;}

      .herbal-rail{
        position:relative;
        background:radial-gradient(rgba(255,255,255,0.18) 1px,transparent 1.5px)0 0/18px 18px,
                  radial-gradient(rgba(0,0,0,0.15) 0.9px,transparent 1.2px)10px 8px/22px 22px,
                  var(--herbal-rail);
        display:flex;align-items:center;justify-content:center;color:#e9f2e5;padding:24px;overflow:hidden;
      }

      .herbal-rail::after{
        content:"";position:absolute;left:100%;top:50%;transform:translateY(-50%);width:26px;height:2px;background:var(--herbal-rail-dot);
      }
      .herbal-rail.right::after{left:auto;right:100%;}

      .herbal-rail .herbal-pill{
        position:absolute;top:50%;left:calc(100% - 13px);transform:translate(-50%,-50%);width:14px;height:14px;border-radius:999px;background:#d6ebc9;box-shadow:0 0 0 6px rgba(214,235,201,0.25);border:2px solid #a4c79a;
      }
      .herbal-rail.right .herbal-pill{left:auto;right:calc(100% - 13px);}

      .herbal-rail .herbal-vtext{writing-mode:vertical-rl;transform:rotate(180deg);letter-spacing:0.04em;font-size:14px;line-height:1.3;opacity:0.95;max-height:80vh;text-align:center;}

      /* ====== STAGE ====== */
      .herbal-stage{background:var(--herbal-stage-bg);border-radius:8px;margin:24px;position:relative;overflow:hidden;display:flex;align-items:center;justify-content:center;}
      .herbal-stage-inner{width:100%;max-width:var(--herbal-stage-max);padding:64px 20px 72px;margin-inline:auto;position:relative;}

      /* decorative sketches */
      .herbal-deco{position:absolute;pointer-events:none;opacity:0.25;filter:grayscale(1);}
      .herbal-deco.left{left:4%;top:10%;width:180px;opacity:0.18;}
      .herbal-deco.right{right:6%;top:18%;width:220px;opacity:0.22;}

      /* timeline */
      .herbal-timeline{position:relative;display:grid;grid-template-columns:1fr 100px 1fr;gap:var(--herbal-gap);}
      .herbal-timeline::before{content:"";position:absolute;left:50%;top:0;bottom:0;transform:translateX(-50%);width:2px;background:var(--herbal-line);}

      .herbal-step{display:contents;}
      .herbal-step .herbal-L{grid-column:1;}
      .herbal-step .herbal-C{grid-column:2;position:relative;}
      .herbal-step .herbal-R{grid-column:3;}

      .herbal-tick{position:absolute;top:27%;transform:translateY(-50%);width:46px;height:1.8px;background:var(--herbal-accent);}
      .herbal-tick.left{right:0;}
      .herbal-tick.right{left:0;}

      .herbal-num{font-family:"Playfair Display",serif;font-style:italic;font-weight:600;font-size:42px;line-height:1;margin-bottom:10px;color:var(--herbal-ink);letter-spacing:0.02em;}
      .herbal-copy{max-width:360px;color:var(--herbal-muted);font-size:14.5px;line-height:1.6;}

      .herbal-btn{display:inline-flex;align-items:center;gap:8px;padding:9px 14px;border:1px solid #cfd9cc;border-radius:6px;background:#fff;color:#2b3a33;font-size:13px;cursor:pointer;transition:0.2s ease;user-select:none;}
      .herbal-btn:hover{background:#f5f7f2;}

      .herbal-photo{background:var(--herbal-card);border-radius:6px;position:relative;overflow:hidden;box-shadow:0 2px 0 rgba(0,0,0,0.02) inset;}
      .herbal-photo::before{content:"";position:absolute;left:0;right:0;height:1.5px;background:var(--herbal-card-top);}
      .herbal-photo .herbal-cam{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);opacity:0.35;}

      .herbal-row{display:contents;}
      .herbal-row + .herbal-row .herbal-L,
      .herbal-row + .herbal-row .herbal-R,
      .herbal-row + .herbal-row .herbal-C{margin-top:46px;}

      .herbal-reveal{opacity:0;translate:0 8px;transition:opacity 0.45s ease, translate 0.45s ease;}
      .herbal-reveal.show{opacity:1;translate:0 0;}

      @media(max-width:980px){
        .herbal-rail{display:none;}
        .herbal-stage{margin:0;border-radius:0;}
        .herbal-deco.left,.herbal-deco.right{display:none;}
      }

      @media(max-width:760px){
        .herbal-timeline{display:block;}
        .herbal-timeline::before{display:none;}
        .herbal-step{display:block;margin-bottom:40px;}
        .herbal-step .herbal-L,.herbal-step .herbal-R,.herbal-step .herbal-C{grid-column:auto;margin:0;width:100%;}
        .herbal-tick{display:none;}
        .herbal-photo{width:100%;max-width:100%;margin-bottom:12px;}
        .herbal-num{font-size:36px;margin-bottom:6px;}
        .herbal-copy{font-size:15px;}
        .herbal-btn{width:100%;justify-content:center;}
      }
  </style>
</head>

<body>
  <div id="videos" class="
      des_container
    ">
    <!-- Thumbnails -->
    <div class="
        thumbnails
      ">
      <img src="https://it.ambrosiaayurved.in/assets/images/PB01.webp" class="
            active
          " onclick="changeMain(this)">
      <img src="https://it.ambrosiaayurved.in/assets/images/PB02.webp" onclick="changeMain(this)">
      <video src="https://www.zeroharm.in/cdn/shop/videos/c/vp/f074a4bce399496cae66797137d95f5c/f074a4bce399496cae66797137d95f5c.HD-1080p-3.3Mbps-41820093.mp4?v=0" onclick="changeMain(this)" autoplay muted loop playsinline></video>
      <img src="https://it.ambrosiaayurved.in/assets/images/PB03.webp" onclick="changeMain(this)">

    </div>

    <!-- Main display + buttons -->
    <div class="
        main-display
      " id="mainDisplay">

      <!-- Main media (image or video) container -->
      <div id="mediaContainer">
        <img id="mainImage" src="https://ambrosiaayurved.in/uploads/979f1f1eefc87a93c457a144830606f8.png" alt="Main Product" style="width: 70%; margin-left: 60px;">
      </div>

      <!-- Magnifier -->
      <div id="magnifier" style="
        display:none;
        position:absolute;
        pointer-events:none;
        overflow:hidden;
        border:2px solid #ccc;
        border-radius:50%;
        width:150px;
        height:150px;
        z-index:999;">
        <img src="" alt="">
      </div>
      <?php
      $product_images = json_decode($product_data->image ?? '[]');
      $first_image = !empty($product_images[0]) ? $product_images[0] : '';
      $image_url = !empty($first_image) ? base_url($first_image) : '';
      ?>
      <!-- Buttons -->
    <div>
      <!-- Quantity Selector -->
<div class="qty-wrap" data-price="549" data-max="12">
  <label class="qty-label" for="qty"></label>

  <div class="qty-box">
    <button class="qty-btn minus decrement" aria-label="Decrease quantity" type="button">−</button>
    <input id="qty" class="qty-input quantity-input" type="number" inputmode="numeric" min="1" value="1" aria-live="polite" />
    <button class="qty-btn plus increment" aria-label="Increase quantity" type="button">+</button>
  </div>

  <div class="qty-meta">
    <span class="price-line">
      <span class="unit">Unit: ₹<span class="unit-price">549</span></span>
      <strong style="margin-left: 139px">Total: ₹<span class="total-price">549</span></strong>
    </span>
  </div>
</div>
      <div class="
        buttons
      ">
        <button class="
            add-cart add-to-cart-btn
          ">
          <i class="
                fas fa-shopping-cart"
                  data-id="<?= $product_data->product_id ?>"
                  data-name="<?= $product_data->product_name ?>"
                  data-baseprice="<?= $product_data->price ?>"
                  data-image="<?= $first_image ?>">
            </i> Add to Cart
        </button>
        <button class="
            buy-now buy-now-btn
          ">
          <i class="
                fas fa-bolt"
                  data-id="<?= $product_data->product_id ?>"
                  data-name="<?= $product_data->product_name ?>"
                  data-baseprice="<?= $product_data->price ?>"
                  data-image="<?= $first_image ?>">
            </i> Buy Now
        </button>
      </div>
      </div>
    </div>

    <!-- Product info -->
    <div class="
        product-info
      ">
      <h1><?= $product_data->product_name; ?>
          <h6><i><?= $product_data->tittle; ?></i></h6>
      </h1>
      <div class="rating">
        <?php
          $reviews = $reviews;
          $totalRating = 0;
          $totalReviews = count($reviews);

          if ($totalReviews > 0) {
              foreach ($reviews as $review) {
                  $totalRating += $review['rating'];
              }

              $averageRating = $totalRating / $totalReviews;
              $averageRating = round($averageRating, 1);

              $fullStars = floor($averageRating);  
              $halfStar  = ($averageRating - $fullStars >= 0.5) ? 1 : 0; 
              $emptyStars = 5 - ($fullStars + $halfStar); 

              for ($i = 0; $i < $fullStars; $i++) {
                  echo "★";
              }
              if ($halfStar) {
                  echo "⯪";
              }
              for ($i = 0; $i < $emptyStars; $i++) {
                  echo "☆";
              }
              echo " $averageRating / 5";
          }
        ?>
          <!-- ★★★★☆ (<?//= $averageRating . " / 5"?>) -->
        </div>
        <p><?= $product_data->discription; ?></p>
      <!-- <div class="
            grid-container
          ">
        <div class="
                grid-item
              "><i class="
                fas fa-spa
              "></i><span>Relieves Stress & Anxiety</span></div>
        <div class="
                grid-item
              "><i class="
                fas fa-venus-mars
              "></i><span>Boosts Reproductive Health</span></div>
        <div class="
                grid-item
              "><i class="
                fas fa-balance-scale
              "></i><span>Enhances Body Balance</span></div>
        <div class="
                grid-item
              "><i class="
                fas fa-bed
              "></i><span>Alleviates Insomnia</span></div>
      </div> -->
             <?php if ($product_data->slug == "a5-herbal-supplement") { ?>
         <h6><i>Made for those who want results, naturally. </i></h6>
         <p>
            ✅ Visible Results Within 3 
            <br>
            ✅ 25+ Rare Ayurvedic Herbs (India + Malaysia)
            <br>
            ✅ 100% Natural | No Chemicals | No Side Effects
            <br>
            ✅ Expert-Crafted, Clinically-Inspired Formula
            <br>
            ✅ 60 Individually Packed Daily Sachets per Box
            Manage diabetes naturally with the power of Ayurveda.
            <br>
            👉 <b>Try the A5 Herbal Supplement today and feel the Ayurvedic difference.</b>
         </p>
       <?php } ?>
      <div class="price">
        Rs. <?= $product_data->price; ?>
        <span style="font-size:14px;color:black;padding-left:5px;">MRP (Inclusive all Taxes)</span><br>
        <span style="text-decoration:line-through;color:black;padding-left:10px;font-size:17px;">
            <?= $product_data->price * 2; ?>
        </span>
        <span style="color:orangered;padding-left:10px;font-size:18px;">50% off</span>
      </div>
<?php if ($alternate_orderflow_status == 0 && !empty($pack)) { ?>
  <div id="pack-options">
    <?php foreach ($pack as $key => $value) { ?>
      <div class="pack-option <?= $key === 0 ? 'selected' : '' ?>" 
           onclick="selectPack(this)"
           data-qty="1"
           data-id="<?= $value['id'] ?>"
           data-price="<?= $value['price'] ?>">
           
        <div class="check-icon"><i class="fas fa-check-circle"></i></div>
        <h4><?= $value['pack_name'] ?></h4>
        <p style="font-size: 13px"><?= $value['description'] ?></p>
        <p class="text-red">-<?= $value['disscount'] ?>% off</p>
        <p class="price">₹<?= $value['price'] ?></p>
        <p class="old-price">₹<?= $value['base_price'] ?></p>
        <p class="text-red">Save ₹<?= $value['base_price'] - $value['price'] ?>/-</p>
      </div>
    <?php } ?>
  </div>
<?php } ?>

      <!-- <div id="pack-options">
        <div class="
                pack-option selected
              " onclick="selectPack(this)">
          <div class="
                    check-icon
                  "><i class="
                    fas fa-check-circle
                  "></i></div>
          <h4>3 bottles</h4>
          <p>180 Tablets
            <br>3 months
          </p>
          <p class="
                    text-red
                  ">-16.0% off</p>
          <p class="
                    price
                  ">₹1,449</p>
          <p class="
                    old-price
                  ">₹1,725.00</p>
          <p class="
                    text-red
                  ">Save ₹276/-</p>
        </div>
        <div class="
                pack-option
              " onclick="selectPack(this)">
          <div class="
                    check-icon
                  "><i class="
                    fas fa-check-circle
                  "></i></div>
          <h4>6 bottles</h4>
          <p>360 Tablets
            <br>6 months
          </p>
          <p class="
                    text-red
                  ">-20.0% off</p>
          <p class="
                    price
                  ">₹2,499</p>
          <p class="
                    old-price
                  ">₹3,125.00</p>
          <p class="
                    text-red
                  ">Save ₹626/-</p>
        </div>
        <div class="
                pack-option
              " onclick="selectPack(this)">
          <div class="
                    check-icon
                  "><i class="
                    fas fa-check-circle
                  "></i></div>
          <h4>1 bottle</h4>
          <p>60 Tablets
            <br>1 month
          </p>
          <p class="
                    text-red
                  ">-10.0% off</p>
          <p class="
                    price
                  ">₹549</p>
          <p class="
                    old-price
                  ">₹610.00</p>
          <p class="
                    text-red
                  ">Save ₹61/-</p>
        </div>
      </div> -->
    </div>
  </div>
  <!-- ------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <div id="navbar" style="
    display: flex;
    overflow-x: auto;
    flex-wrap: nowrap;
    align-items: center;
    z-index: 1000 !important;
    margin-x: 10px;
    gap: 1.5rem;
    padding: 0.5rem 0.5rem 0 0.5rem; /* px-2 pt-2 pb-0 */
    background: linear-gradient(to right, #9333ea, #ec4899); /* from-purple-600 to-pink-600 */
    position: sticky;
    top: 0;
    color: white;
    text-align: center;
    scroll-behavior: smooth;
    margin-left: 10px;
    margin-right: 10px;
    transition: all 0.3s ease-in-out;
    border-radius: 15px 50px;
  ">
    <!-- Videos -->
    <a id="nav-videos" href="#videos" onclick="scrollToSection(event, 'videos')" style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 60px;
      margin: 0 1rem;
      cursor: pointer;
      color: white;
    ">
      <i id="icon-videos" class="
          fa-solid fa-video
        " style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "></i>
      <h1 id="text-videos" style="font-size: 1rem;color:white">Videos</h1>
    </a>

    <!-- Benefits -->
    <a id="nav-benefits" href="#benefits" onclick="scrollToSection(event, 'benefits')" style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 60px;
      margin: 0 2.5rem;
      cursor: pointer;
      color: white;
    ">
      <i id="icon-benefits" class="
          fa-solid fa-briefcase-medical
        " style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "></i>
      <h1 id="text-benefits" style="font-size: 1rem; color: white;">Benefits</h1>
    </a>

    <!-- Reviews -->
    <a id="nav-reviews" href="#reviews" onclick="scrollToSection(event, 'reviews')" style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 80px;
      margin: 0 2.5rem;
      color: white;
    ">
      <i id="icon-reviews" class="
          fa-solid fa-thumbs-up
        " style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "></i>
      <h1 id="text-reviews" style="font-size: 1rem; color: white;">Reviews</h1>
    </a>

    <!-- FAQs -->
    <a id="nav-faqs" href="#faqs" onclick="scrollToSection(event, 'faqs')" style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 80px;
      margin: 0 2.5rem;
      color: white;
    ">
      <i id="icon-faqs" class="
          fa-solid fa-question-circle
        " style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "></i>
      <h1 id="text-faqs" style="font-size: 1rem; color: white;">FAQs</h1>
    </a>

    <!-- Ingredients -->
    <a id="nav-ingredients" href="#ingredients" onclick="scrollToSection(event, 'ingredients')" style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 80px;
      margin: 0 2.5rem;
      color: white;
    ">
      <i id="icon-ingredients" class="
          fa-solid fa-flask
        " style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "></i>
      <h1 id="text-ingredients" style="font-size: 1rem; color: white;">Ingredients</h1>
    </a>
    <!-- How to Use -->
    <!-- How to Use -->
<a id="nav-howtouse" href="#howtouse" onclick="scrollToSection(event, 'howtouse')" style="
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
  min-width: 80px;
  margin: 0 2.5rem;
  color: white;
">
  <i id="icon-howtouse" class="fa-solid fa-book-medical" style="
    border: 2px solid white;
    padding: 0.5rem;
    border-radius: 9999px;
    color: white;
  "></i>
  <h1 id="text-howtouse" style="font-size: 1rem; color: white;">How to Use</h1>
</a>
  </div>
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
  <section style="background-color: #f3f4f6; padding: 3rem 1rem;">
    <div style="max-width: 1280px; margin: 0 auto;">

      <!-- Tabs -->
      <div id="tabs" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 2rem; border-bottom: 1px solid #d1d5db; padding-bottom: 0.5rem; font-size: 1rem;">
        <button class="
      tab-button
    " data-tab="purity" style="color: #065f46; font-weight: 600; border-bottom: 2px solid #065f46; border-top: none; border-left: none; border-right: none; padding: 0.5rem 1rem; cursor: pointer;">Science Meets Purity </button>
        <button class="
      tab-button
    " data-tab="certifications" style="color: #9ca3af; font-weight: 600; border-bottom: none; padding: 0.5rem 1rem; border-top: none; border-left: none; border-right: none; cursor: pointer; bottom-top: none; bottom-right: none; bottom-left: none; transition: color 0.3s;">Certifications</button>
        <button class="
          tab-button
        " data-tab="patents" style="color: #9ca3af; font-weight: 600; border-bottom: none; padding: 0.5rem 1rem; border-top: none; border-left: none; border-right: none; cursor: pointer; bottom-top: none; bottom-right: none; bottom-left: none; transition: color 0.3s;">Patents</button>
        <button class="
          tab-button
        " data-tab="collab" style="color: #9ca3af; font-weight: 600; border-bottom: none; padding: 0.5rem 1rem; border-top: none; border-left: none; border-right: none; cursor: pointer; bottom-top: none; bottom-right: none; bottom-left: none; transition: color 0.3s;">Collaborating with the Best</button>
      </div>

      <!-- Title -->
      <div style="text-align: center; margin: 2.5rem 0;">
        <h2 style="font-size: 2rem; font-weight: 600; color: #065f46; margin: 0;">NATURE'S PURITY, SCIENCE'S PRECISION</h2>
      </div>

      <!-- Tab Contents -->
      <div id="purity" class="
        tab-content
      " style="display: block;">
        <div style="display: flex; text-align: center; border-left: 1px solid #d1d5db; border-right: 1px solid #d1d5db;">
          <div style="flex: 1; padding: 1rem; border-right: 1px solid #d1d5db;">
            <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin-bottom: 0.5rem;">Nature-Sourced</h3>
            <p style="color: #4b5563; font-size: 0.875rem; margin: 0;">Pristine, Wild Grown Ingredients</p>
          </div>
          <div style="flex: 1; padding: 1rem; border-right: 1px solid #d1d5db;">
            <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin-bottom: 0.5rem;">Aqueous Extraction</h3>
            <p style="color: #4b5563; font-size: 0.875rem; margin: 0;">Chemical-free herbal extract process</p>
          </div>
          <div style="flex: 1; padding: 1rem; border-right: 1px solid #d1d5db;">
            <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin-bottom: 0.5rem;">Nano-Potent Boost</h3>
            <p style="color: #4b5563; font-size: 0.875rem; margin: 0;">Enhanced ingredient solubility & absorption</p>
          </div>
          <div style="flex: 1; padding: 1rem;">
            <h3 style="font-size: 1.125rem; font-weight: 600; color: #1f2937; margin-bottom: 0.5rem;">Protected Packaging</h3>
            <p style="color: #4b5563; font-size: 0.875rem; margin: 0;">Glass bottles for preserved potency</p>
          </div>
        </div>
      </div>

      <div id="certifications" class="
        tab-content
      " style="display: none; text-align: center; color: #374151;">
        <p style="font-size: 1.125rem; margin: 0;">Certified Organic, FDA Approved, ISO Compliant.</p>
      </div>

      <div id="patents" class="
        tab-content
      " style="display: none; text-align: center; color: #374151;">
        <p style="font-size: 1.125rem; margin: 0;">Our patented extraction and nano-tech innovations.</p>
      </div>

      <div id="collab" class="
        tab-content
      " style="display: none; text-align: center; color: #374151;">
        <p style="font-size: 1.125rem; margin: 0;">Partnering with top global researchers and labs.</p>
      </div>

    </div>
  </section>
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
  <section id="benefits" style="background-color: #ffffff; padding: 3rem 1rem;">
    <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
      <h2 style="font-size: 1.875rem; line-height: 2.25rem; font-weight: 600; color: #1f2937; margin-bottom: 2.5rem;">
        Proven Effectiveness Backed by Science
      </h2>

      <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2.5rem;">
        <?php
          foreach($product_benefits as $key => $value){ ?>
              <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
              <img src="<?php echo base_url($value->image); ?>" alt="<?php echo $value->title; ?>" style="width: 80px; height: 80px; margin-bottom: 1rem;">
              <h3 style="font-size: 1.125rem; font-weight: 500; color: #1f2937; margin-bottom: 0.5rem;"><?php echo $value->title; ?></h3>
              <p><?php echo $value->description; ?></p>
        </div>
            <?php
          }
        ?>
      </div>
    </div>
  </section>
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
  <div id="ingredients">
    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: white;
                margin: 0;padding: 20px;
                /* display: flex; */
                /* justify-content: center; */
                 align-items: center;
                 /* min-height: 100vh; */
                 "                 >
    <div class="herbal-title">Ingredients</div>
      <div class="herbal-container">
    <div class="herbal-grid" id="herbal-container"></div>
</div>
</div>
  </div>
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <header id="howtouse" style="text-align:center; margin: 40px 0;">
      <h2 style="font-family: 'Playfair Display', serif; font-size: 32px; color: #24302b; margin:0;">
      How to Use A5 Herbal Pouches
      </h2>
    </header>
    <div class="herbal-frame">
      <aside class="herbal-rail left">
        <span class="herbal-vtext">The white background is broken up by illustrations of natural ingredients.</span>
        <i class="herbal-pill" aria-hidden="true"></i>
      </aside>

      <main class="herbal-stage">
        <svg class="herbal-deco left" viewBox="0 0 220 220" aria-hidden="true">
          <g fill="none" stroke="#9aa48f" stroke-width="1.2" opacity=".9">
            <ellipse cx="100" cy="100" rx="68" ry="48" />
            <path d="M40 150c22-12 44-14 64-6 20 8 36 7 56-2" />
            <path d="M70 78c-8 10-10 20-6 30 6 14 20 16 30 8 10-8 16-24 8-34-8-10-26-8-32-4z" />
            <path d="M110 42c-10 10-10 22-2 30 8 8 20 8 30-2 8-8 10-18 4-26-7-8-20-10-32-2z" />
          </g>
        </svg>

        <svg class="herbal-deco right" viewBox="0 0 260 260" aria-hidden="true">
          <g fill="none" stroke="#9aa48f" stroke-width="1.3" opacity=".9">
            <path d="M132 20c-16 22-18 38-6 52 12 14 34 14 54-6 18-18 20-38 6-50-14-12-34-6-54 4z" />
            <path d="M44 122c22-12 40-10 54 6 10 12 10 24 0 36-12 16-34 20-54 8-20-12-22-36 0-50z" />
            <path d="M130 170c18-12 36-12 50 2 12 12 12 26 0 38-14 14-34 16-50 4-16-12-16-30 0-44z" />
            <path d="M206 92c12 18 12 34 0 46-12 12-30 12-46 0-16-14-18-32-6-46 10-12 30-14 52 0z" />
          </g>
        </svg>

        <div class="herbal-stage-inner">
          <section class="herbal-timeline">
            <div class="herbal-step herbal-row">
              <div class="herbal-L herbal-reveal">
                <div class="herbal-photo">
                  <img src="https://ambrosiaayurved.in/uploads/HowToUse/HTU0001.webp" alt="Step 1 Image"/>
                </div>
              </div>
              <div class="herbal-C"><span class="herbal-tick left"></span></div>
              <div class="herbal-R herbal-reveal">
                <div class="herbal-num">01</div>
                <p class="herbal-copy">Take one A5 pouch from the box. ✂️ Carefully cut the pouch with scissors or tear it from the top.</p>
              </div>
            </div>

            <div class="herbal-step herbal-row">
              <div class="herbal-L herbal-reveal">
                <div class="herbal-num">02</div>
                <p class="herbal-copy">Take 1 glass (approx. 150 ml) of lukewarm water. Pour the entire pouch contents into the water and stir until it dissolves completely.</p>
              </div>
              <div class="herbal-C"><span class="herbal-tick right"></span></div>
              <div class="herbal-R herbal-reveal">
                <div class="herbal-photo">
                  <img src="https://ambrosiaayurved.in/uploads/HowToUse/HTU2.webp" alt="Step 2 Image"/>
                </div>
              </div>
            </div>

            <div class="herbal-step herbal-row">
              <div class="herbal-L herbal-reveal">
                <div class="herbal-photo">
                  <img src="https://ambrosiaayurved.in/uploads/HowToUse/HTU3.webp" alt="Step 3 Image"/>
                </div>
              </div>
              <div class="herbal-C"><span class="herbal-tick left"></span></div>
              <div class="herbal-R herbal-reveal">
                <div class="herbal-num">03</div>
                <p class="herbal-copy">Morning – Take on an empty stomach before breakfast. Evening – Take before dinner, for best results. Pro Tip: Follow this daily routine consistently for 90 days to experience noticeable changes and better support your health.</p>
              </div>
            </div>
          </section>
        </div>
      </main>

      <aside class="herbal-rail right">
        <span class="herbal-vtext">We use photographs from production</span>
        <i class="herbal-pill" aria-hidden="true"></i>
      </aside>
    </div>

  <!-- ----------------------------------------------------------------------------------------------------------------- -->

  <section style="padding: 40px 16px;">
    <h2 style="font-size: 24px; font-weight: 600; text-align: center; margin-bottom: 32px; color: #1f2937;">
      Consumer Studies
    </h2>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; max-width: 1280px; margin: 0 auto;">
      <!-- Card 1 -->
      <div style="background-color: #f9fafb; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; text-align: center; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#16a34a'; this.querySelector('span').style.color='#fff'; this.querySelector('p').style.color='#fff';"
        onmouseout="this.style.backgroundColor='#f9fafb'; this.querySelector('span').style.color='#14532d'; this.querySelector('p').style.color='#4b5563';">
        <span style="font-size: 30px; font-weight: bold; color: #14532d;">85%</span>
        <p style="color: #4b5563; margin-top: 16px;">
          Users felt more energetic with our holistic supplement.
        </p>
      </div>

      <!-- Card 2 -->
      <div style="background-color: #f9fafb; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; text-align: center; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#16a34a'; this.querySelector('span').style.color='#fff'; this.querySelector('p').style.color='#fff';"
        onmouseout="this.style.backgroundColor='#f9fafb'; this.querySelector('span').style.color='#14532d'; this.querySelector('p').style.color='#4b5563';">
        <span style="font-size: 30px; font-weight: bold; color: #14532d;">91%</span>
        <p style="color: #4b5563; margin-top: 16px;">
          Our holistic supplement aids in enhancing stamina and strength.
        </p>
      </div>

      <!-- Card 3 -->
      <div style="background-color: #f9fafb; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; text-align: center; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#16a34a'; this.querySelector('span').style.color='#fff'; this.querySelector('p').style.color='#fff';"
        onmouseout="this.style.backgroundColor='#f9fafb'; this.querySelector('span').style.color='#14532d'; this.querySelector('p').style.color='#4b5563';">
        <span style="font-size: 30px; font-weight: bold; color: #14532d;">77%</span>
        <p style="color: #4b5563; margin-top: 16px;">
          Users experienced improved sleep quality after incorporating our holistic supplement.
        </p>
      </div>
    </div>
  </section>
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
  <section style="padding: 40px 16px;">
    <h2 style="font-size: 24px; font-weight: 600; text-align: center; margin-bottom: 32px; color: #1f2937;">
      What To Expect
    </h2>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; max-width: 1280px; margin: 0 auto;">

      <!-- Month 1 -->
      <div style="background-color: #f9fafb; border-radius: 12px; padding: 24px; text-align: center; display: flex; flex-direction: column; align-items: center;">
        <img src="https://www.shutterstock.com/image-vector/running-marathon-logo-vector-design-260nw-2137173693.jpg" alt="Energy Icon" style="margin-bottom: 16px; height: 40px;" />
        <p style="color: #374151; font-weight: 500;">Month 1</p>
        <h3 style="font-size: 18px; font-weight: 600; color: #065f46; margin-top: 4px;">Improved Energy</h3>
        <p style="color: #4b5563; margin-top: 8px;">Increased energy and improved stamina from stress management and cognitive enhancement.</p>
      </div>

      <!-- Month 2 -->
      <div style="background-color: #f9fafb; border-radius: 12px; padding: 24px; text-align: center; display: flex; flex-direction: column; align-items: center;">
        <img src="https://img.icons8.com/ios/50/0a4e3d/flex-biceps.png" alt="Strength Icon" style="margin-bottom: 16px; height: 40px;" />
        <p style="color: #374151; font-weight: 500;">Month 2</p>
        <h3 style="font-size: 18px; font-weight: 600; color: #065f46; margin-top: 4px;">Improved stamina and strength</h3>
        <p style="color: #4b5563; margin-top: 8px;">Enhanced stamina and muscle growth, improved sleep quality from cortisol regulation.</p>
      </div>

      <!-- Month 3 -->
      <div style="background-color: #f9fafb; border-radius: 12px; padding: 24px; text-align: center; display: flex; flex-direction: column; align-items: center;">
        <img src="https://img.icons8.com/ios-filled/50/0a4e3d/sleeping-in-bed.png" alt="Sleep Icon" style="margin-bottom: 16px; height: 40px;" />
        <p style="color: #374151; font-weight: 500;">Month 3</p>
        <h3 style="font-size: 18px; font-weight: 600; color: #065f46; margin-top: 4px;">Better sleep quality</h3>
        <p style="color: #4b5563; margin-top: 8px;">Better sleep quality due to cortisol and GABA level regulation.</p>
      </div>

    </div>
  </section>
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
  <section style="padding:40px 16px; background-color:#e5e7eb;">
    <h2 style="font-size:24px; font-weight:bold; text-align:center; color:#1f2937; margin-bottom:40px;">
      Faster results with
    </h2>

    <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:24px; max-width:1280px; margin:0 auto;">

      <!-- CARD -->
      <div style="background:white; border-radius:16px; border:1px solid #e5e7eb; padding:16px; 
                box-shadow:0 1px 3px rgba(0,0,0,0.1); transition:box-shadow 0.3s; 
                display:flex; flex-direction:column; justify-content:space-between; position:relative;" onmouseover="this.querySelector('button').style.opacity='1'" onmouseout="this.querySelector('button').style.opacity='0'">

        <div>
          <div style="position:relative;">
            <span style="position:absolute; top:8px; left:8px; background:#065f46; color:white; font-size:12px; padding:2px 8px; border-radius:9999px;">
              -32%
            </span>
            <img src="https://www.ambrosiaorganicfarm.com/wp-content/uploads/2023/06/Blueberry-Peanut-Butter-Mockup.webp" alt="Product" style="border-radius:8px; width:100%; object-fit:cover;">
          </div>
          <div style="margin-top:16px;">
            <div style="display:flex; align-items:center; gap:4px; font-size:14px; color:#fbbf24;">
              <span>★★★★☆</span><span style="color:#6b7280;">(1407)</span>
            </div>
            <h3 style="font-size:16px; font-weight:600; color:#111827; margin-top:4px;">
              Blueberry Peanut Butter
            </h3>
            <div style="font-size:14px; color:#6b7280; text-decoration:line-through;">₹1,899</div>
            <div style="font-size:16px; font-weight:bold; color:#111827;">
              ₹1,300 <span style="color:#dc2626; font-size:14px; font-weight:500;">| Save ₹599</span>
            </div>
          </div>
        </div>

        <button style="margin-top:16px; width:100%; background:#064e3b; color:white; font-weight:600; padding:8px; 
                     border-radius:9999px; opacity:0; transition:opacity 0.3s; border:none; cursor:pointer;">
          View product
        </button>
      </div>
      <div style="background:white; border-radius:16px; border:1px solid #e5e7eb; padding:16px; 
                box-shadow:0 1px 3px rgba(0,0,0,0.1); transition:box-shadow 0.3s; 
                display:flex; flex-direction:column; justify-content:space-between; position:relative;" onmouseover="this.querySelector('button').style.opacity='1'" onmouseout="this.querySelector('button').style.opacity='0'">

        <div>
          <div style="position:relative;">
            <span style="position:absolute; top:8px; left:8px; background:#065f46; color:white; font-size:12px; padding:2px 8px; border-radius:9999px;">
              -32%
            </span>
            <img src="https://www.ambrosiaorganicfarm.com/wp-content/uploads/2023/06/Blueberry-Peanut-Butter-Mockup.webp" alt="Product" style="border-radius:8px; width:100%; object-fit:cover;">
          </div>
          <div style="margin-top:16px;">
            <div style="display:flex; align-items:center; gap:4px; font-size:14px; color:#fbbf24;">
              <span>★★★★☆</span><span style="color:#6b7280;">(1407)</span>
            </div>
            <h3 style="font-size:16px; font-weight:600; color:#111827; margin-top:4px;">
              Blueberry Peanut Butter
            </h3>
            <div style="font-size:14px; color:#6b7280; text-decoration:line-through;">₹1,899</div>
            <div style="font-size:16px; font-weight:bold; color:#111827;">
              ₹1,300 <span style="color:#dc2626; font-size:14px; font-weight:500;">| Save ₹599</span>
            </div>
          </div>
        </div>

        <button style="margin-top:16px; width:100%; background:#064e3b; color:white; font-weight:600; padding:8px; 
                     border-radius:9999px; opacity:0; transition:opacity 0.3s; border:none; cursor:pointer;">
          View product
        </button>
      </div>
      <div style="background:white; border-radius:16px; border:1px solid #e5e7eb; padding:16px; 
                box-shadow:0 1px 3px rgba(0,0,0,0.1); transition:box-shadow 0.3s; 
                display:flex; flex-direction:column; justify-content:space-between; position:relative;" onmouseover="this.querySelector('button').style.opacity='1'" onmouseout="this.querySelector('button').style.opacity='0'">

        <div>
          <div style="position:relative;">
            <span style="position:absolute; top:8px; left:8px; background:#065f46; color:white; font-size:12px; padding:2px 8px; border-radius:9999px;">
              -32%
            </span>
            <img src="https://www.ambrosiaorganicfarm.com/wp-content/uploads/2023/06/Blueberry-Peanut-Butter-Mockup.webp" alt="Product" style="border-radius:8px; width:100%; object-fit:cover;">
          </div>
          <div style="margin-top:16px;">
            <div style="display:flex; align-items:center; gap:4px; font-size:14px; color:#fbbf24;">
              <span>★★★★☆</span><span style="color:#6b7280;">(1407)</span>
            </div>
            <h3 style="font-size:16px; font-weight:600; color:#111827; margin-top:4px;">
              Blueberry Peanut Butter
            </h3>
            <div style="font-size:14px; color:#6b7280; text-decoration:line-through;">₹1,899</div>
            <div style="font-size:16px; font-weight:bold; color:#111827;">
              ₹1,300 <span style="color:#dc2626; font-size:14px; font-weight:500;">| Save ₹599</span>
            </div>
          </div>
        </div>

        <button style="margin-top:16px; width:100%; background:#064e3b; color:white; font-weight:600; padding:8px; 
                     border-radius:9999px; opacity:0; transition:opacity 0.3s; border:none; cursor:pointer;">
          View product
        </button>
      </div>
      <div style="background:white; border-radius:16px; border:1px solid #e5e7eb; padding:16px; 
                box-shadow:0 1px 3px rgba(0,0,0,0.1); transition:box-shadow 0.3s; 
                display:flex; flex-direction:column; justify-content:space-between; position:relative;" onmouseover="this.querySelector('button').style.opacity='1'" onmouseout="this.querySelector('button').style.opacity='0'">

        <div>
          <div style="position:relative;">
            <span style="position:absolute; top:8px; left:8px; background:#065f46; color:white; font-size:12px; padding:2px 8px; border-radius:9999px;">
              -32%
            </span>
            <img src="https://www.ambrosiaorganicfarm.com/wp-content/uploads/2023/06/Blueberry-Peanut-Butter-Mockup.webp" alt="Product" style="border-radius:8px; width:100%; object-fit:cover;">
          </div>
          <div style="margin-top:16px;">
            <div style="display:flex; align-items:center; gap:4px; font-size:14px; color:#fbbf24;">
              <span>★★★★☆</span><span style="color:#6b7280;">(1407)</span>
            </div>
            <h3 style="font-size:16px; font-weight:600; color:#111827; margin-top:4px;">
              Blueberry Peanut Butter
            </h3>
            <div style="font-size:14px; color:#6b7280; text-decoration:line-through;">₹1,899</div>
            <div style="font-size:16px; font-weight:bold; color:#111827;">
              ₹1,300 <span style="color:#dc2626; font-size:14px; font-weight:500;">| Save ₹599</span>
            </div>
          </div>
        </div>

        <button style="margin-top:16px; width:100%; background:#064e3b; color:white; font-weight:600; padding:8px; 
                     border-radius:9999px; opacity:0; transition:opacity 0.3s; border:none; cursor:pointer;">
          View product
        </button>
      </div>
    </div>
  </section>
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
  <div id="reviews" style="background-color: white; color: #1f2937; font-family: sans-serif;">

    <!-- Rating Summary -->
    <div style="max-width: 1024px; margin: 0 auto; padding: 40px 16px; border-bottom: 1px solid #e5e7eb;">
      <h1 style="font-size: 1.875rem; font-weight: 600; text-align: center;">
        Holistic Ashwagandha Tablets Reviews
      </h1>
      <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-top: 16px;">
        <div style="display: flex; align-items: center; gap: 8px;">
          <div style="color: #facc15; font-size: 1.25rem;"><?php
          $reviews = $reviews;
          $totalRating = 0;
          $totalReviews = count($reviews);
          if ($totalReviews > 0) {
              foreach ($reviews as $review) {
                  $totalRating += $review['rating'];
              }

              $averageRating = $totalRating / $totalReviews;
              $averageRating = round($averageRating, 1);

              $fullStars = floor($averageRating);  
              $halfStar  = ($averageRating - $fullStars >= 0.5) ? 1 : 0; 
              $emptyStars = 5 - ($fullStars + $halfStar); 

              for ($i = 0; $i < $fullStars; $i++) {
                  echo "★";
              }
              if ($halfStar) {
                  echo "⯪";
              }
              for ($i = 0; $i < $emptyStars; $i++) {
                  echo "☆";
              }
          } ?></div>
          <span style="font-size: 1.25rem; font-weight: 600;"><?php echo  "$averageRating / 5"?></span>
          <span style="color: #4b5563;">Based on <?=$totalReviews;?> reviews</span>
        </div>
        <div style="display: flex; gap: 16px;">
          <button onclick="toggleFormCustom('reviewFormCustom')" style="background-color: #facc15; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Write a review</button>
          <button onclick="toggleFormCustom('questionFormCustom')" style="border: 1px solid #facc15; color: #ca8a04; padding: 8px 16px; border-radius: 6px; background: white; cursor: pointer;">Ask a question</button>
        </div>
      </div>
    </div>

<!-- Review Form -->
<div id="reviewFormCustom" style="max-width: 640px; margin: 24px auto; padding: 20px; border: 1px solid #d1d5db; border-radius: 12px; background-color: #ffffff; display: none; position: relative; box-shadow: 0 4px 12px rgba(0,0,0,0.1); animation: fadeIn 0.4s ease;">
  <!-- Close Button -->
  <button onclick="closeFormCustom('reviewFormCustom')" 
    style="position: absolute; top: 10px; right: 10px; font-size: 1.25rem; color: #6b7280; background: none; border: none; cursor: pointer;">✖</button>
  
  <!-- Heading -->
  <h2 style="font-size: 1.4rem; font-weight: bold; margin-bottom: 14px; color: #111827;">✨ Write a Review</h2>

  <!-- Star Rating -->
  <div id="starRating" style="margin-bottom: 12px; font-size: 1.8rem; cursor: pointer; display:flex; gap:5px;">
    ★★★★★
  </div>
  <!-- Rating value text -->
  <div id="ratingValue" style="font-size: 0.95rem; color:#374151; margin-bottom:10px;"></div>

  <!-- Review Text -->
  <textarea id="reviewText" maxlength="500"
    placeholder="Write your review here..." 
    style="width: 100%; border: 1px solid #d1d5db; padding: 10px; border-radius: 8px; min-height: 100px; font-size: 0.95rem;"></textarea>
  <div id="charCount" style="font-size: 0.85rem; color: #6b7280; text-align:right; margin-top: 4px;">0/500</div>

  <!-- Upload Section -->
  <div style="margin-top: 16px;">
    <label style="display: block; margin-bottom: 6px; font-weight: 500;">📸 Upload Photo/Video</label>
    <input type="file" id="reviewFile" accept="image/*,video/*" multiple 
      style="display: block; padding: 6px; border: 1px solid #d1d5db; border-radius: 6px; width: 100%;">
    <div id="previewContainer" style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;"></div>
  </div>

  <!-- Submit Button -->
  <button id="SubmitReview" style="margin-top: 16px; background: linear-gradient(90deg,#22c55e,#16a34a); color: white; padding: 12px 20px; border-radius: 8px; border: none; cursor: pointer; font-weight: 600; transition: all 0.3s;"
    onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
    Submit Review
  </button>

  <!-- Submitted Output -->
  <div id="submittedOutput" style="margin-top:15px; font-size:0.95rem; color:#111827; font-weight:500;"></div>
</div>

    <!-- Question Form -->
    <div id="questionFormCustom" style="max-width: 640px; margin: 24px auto; padding: 16px; border: 1px solid #d1d5db; border-radius: 8px; background-color: #f9fafb; display: none; position: relative; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
      <button onclick="closeFormCustom('questionFormCustom')" style="position: absolute; top: 8px; right: 8px; font-size: 1.25rem; color: #6b7280; background: none; border: none; cursor: pointer;">✖</button>
      <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 8px;">Ask a Question</h2>
      <textarea placeholder="Write your question here..." style="width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 6px;"></textarea>
      <button style="margin-top: 8px; background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Submit Question</button>
    </div>

    <!-- Tabs -->
    <div style="max-width: 1024px; margin: 40px auto 0; padding: 0 16px;">
      <div style="display: flex; gap: 16px; border-bottom: 1px solid #e5e7eb; padding-bottom: 8px;">
        <button style="font-weight: 600; color: #ca8a04; border-bottom: 2px solid #ca8a04; background: none; border: none; cursor: pointer;">Reviews (<?=$totalReviews;?>)</button>
        <button style="color: #ca8a04; background: none; border: none; cursor: pointer;">Questions (2)</button>
      </div>

      <!-- Reviews Grid -->
      <div class="review-grid" style="margin-top: 24px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">

        <div style="border: 1px solid #d1d5db; padding: 16px; border-radius: 6px; background: white; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
          <div style="display: flex; align-items: center; gap: 8px; color: #facc15; font-size: 1.125rem;">★★★★★ <span style="color: #374151; font-weight: bold;">PAUL JAVAID AHMAD</span></div>
          <p style="font-weight: bold; margin-top: 8px;">Best thing to suppress stress.</p>
          <p>The ZH Ashwagandha is very effective in busting stress and enhancing sleep quality...</p>
        </div>

        <div style="border: 1px solid #d1d5db; padding: 16px; border-radius: 6px; background: white; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
          <div style="display: flex; align-items: center; gap: 8px; color: #facc15; font-size: 1.125rem;">★★★★☆ <span style="color: #374151; font-weight: bold;">Alisha</span></div>
          <p style="margin-top: 8px;">I love that ashwagandha is a vegan product and doesn't compromise my beliefs.</p>
        </div>

        <div style="border: 1px solid #d1d5db; padding: 16px; border-radius: 6px; background: white; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
          <div style="display: flex; align-items: center; gap: 8px; color: #facc15; font-size: 1.125rem;">★★★★★ <span style="color: #374151; font-weight: bold;">Kamala</span></div>
          <p style="font-weight: bold; margin-top: 8px;">Impressive</p>
          <p>Mere neend mein pareshani thi, lekin Ashwagandha ke istemal se ab meri neend mein sudhar hua hai...</p>
        </div>

        <div style="border: 1px solid #d1d5db; padding: 16px; border-radius: 6px; background: white; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
          <div style="display: flex; align-items: center; gap: 8px; color: #facc15; font-size: 1.125rem;">★★★★★ <span style="color: #374151; font-weight: bold;">Joshua</span></div>
          <p style="font-weight: bold; margin-top: 8px;">Helpful</p>
          <p>Ashwagandha has helped me feel more focused and productive...</p>
        </div>

        <div style="border: 1px solid #d1d5db; padding: 16px; border-radius: 6px; background: white; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
          <div style="display: flex; align-items: center; gap: 8px; color: #facc15; font-size: 1.125rem;">★★★★★ <span style="color: #374151; font-weight: bold;">Chhavi</span></div>
          <p style="font-weight: bold; margin-top: 8px;">Relaxed</p>
          <p>Since using Ashwagandha, I feel more relaxed and calm...</p>
        </div>

      </div>
    </div>
  </div>
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
  <div id="faqs" style="font-family: Arial, sans-serif; margin:0; padding:0; background:white;">

    <div style="max-width:900px; margin:0 auto; padding:40px 16px;">
      <h2 style="font-size:28px; font-weight:600; text-align:center; margin-bottom:24px;">
        Frequently asked questions (FAQs)
      </h2>

      <!-- FAQ Item 1 -->
      <div style="border:1px solid #ccc; border-radius:8px; margin-bottom:16px;">
        <button onclick="toggleFAQ(1)" style="width:100%; text-align:left; padding:12px 16px; display:flex; justify-content:space-between; align-items:center; background:none; border:none; font-size:16px; cursor:pointer; font-weight:600;">
          <span>What are Holistic Ashwagandha Tablets?</span>
          <span id="icon1" style="font-size:18px;">▲</span>
        </button>
        <div id="faq1" style="padding:0 16px 16px 16px; color:#4a4a4a;">
          Holistic Ashwagandha Tablets contain nano-formulated Ashwagandha and all its active ingredients, providing holistic health benefits. These benefits include fighting stress and anxiety, regulating blood pressure, cholesterol, and blood sugar levels, and
          enhancing memory, body balance, and brain function.
        </div>
      </div>

      <!-- FAQ Item 2 -->
      <div style="border:1px solid #ccc; border-radius:8px; margin-bottom:16px;">
        <button onclick="toggleFAQ(2)" style="width:100%; text-align:left; padding:12px 16px; display:flex; justify-content:space-between; align-items:center; background:none; border:none; font-size:16px; cursor:pointer; font-weight:600;">
          <span>What are the key ingredients in Holistic Ashwagandha Tablets?</span>
          <span id="icon2" style="font-size:18px;">▼</span>
        </button>
        <div id="faq2" style="padding:0 16px 16px 16px; color:#4a4a4a; display:none;">
          The key ingredient is nano-formulated Ashwagandha, supported by natural excipients to improve bioavailability.
        </div>
      </div>

      <!-- FAQ Item 3 -->
      <div style="border:1px solid #ccc; border-radius:8px; margin-bottom:16px;">
        <button onclick="toggleFAQ(3)" style="width:100%; text-align:left; padding:12px 16px; display:flex; justify-content:space-between; align-items:center; background:none; border:none; font-size:16px; cursor:pointer; font-weight:600;">
          <span>What is the nutritional content of these tablets?</span>
          <span id="icon3" style="font-size:18px;">▼</span>
        </button>
        <div id="faq3" style="padding:0 16px 16px 16px; color:#4a4a4a; display:none;">
          Each tablet contains a standardized amount of Ashwagandha extract along with essential nutrients to support daily wellness.
        </div>
      </div>

      <!-- FAQ Item 4 -->
      <div style="border:1px solid #ccc; border-radius:8px; margin-bottom:16px;">
        <button onclick="toggleFAQ(4)" style="width:100%; text-align:left; padding:12px 16px; display:flex; justify-content:space-between; align-items:center; background:none; border:none; font-size:16px; cursor:pointer; font-weight:600;">
          <span>How should I take Holistic Ashwagandha Tablets?</span>
          <span id="icon4" style="font-size:18px;">▼</span>
        </button>
        <div id="faq4" style="padding:0 16px 16px 16px; color:#4a4a4a; display:none;">
          Take 1-2 tablets daily after meals or as directed by your healthcare provider.
        </div>
      </div>

      <!-- FAQ Item 5 -->
      <div style="border:1px solid #ccc; border-radius:8px; margin-bottom:16px;">
        <button onclick="toggleFAQ(5)" style="width:100%; text-align:left; padding:12px 16px; display:flex; justify-content:space-between; align-items:center; background:none; border:none; font-size:16px; cursor:pointer; font-weight:600;">
          <span>Who can benefit from Holistic Ashwagandha Tablets?</span>
          <span id="icon5" style="font-size:18px;">▼</span>
        </button>
        <div id="faq5" style="padding:0 16px 16px 16px; color:#4a4a4a; display:none;">
          Anyone looking to reduce stress, improve sleep, and support overall health and wellness can benefit from these tablets.
        </div>
      </div>
    </div>
  </div>
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
   <!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    function toggleFormCustom(formId) {
      document.getElementById('reviewFormCustom').style.display = 'none';
      document.getElementById('questionFormCustom').style.display = 'none';
      document.getElementById(formId).style.display = 'block';
    }

    function closeFormCustom(formId) {
      document.getElementById(formId).style.display = 'none';
    }

    // $('#SubmitReview').on('click', function(){
    //   const rating = $('#starRating').val().trim();
    //   console.log(rating)
    // })

    // -------------------------------------
  const starContainer = document.getElementById("starRating");
  const ratingValue = document.getElementById("ratingValue");
  const submitBtn = document.getElementById("SubmitReview");
  const submittedOutput = document.getElementById("submittedOutput");

  // 5 stars banaye
  starContainer.innerHTML = "★★★★★".split("").map((s, i) => 
    `<span data-value="${i+1}">☆</span>`
  ).join("");

  let selectedRating = 0;
  const stars = starContainer.querySelectorAll("span");

  stars.forEach(star => {
    star.addEventListener("click", () => {
      selectedRating = parseInt(star.dataset.value); // value store
      updateStars(selectedRating);

      // Rating number display
      ratingValue.textContent = `You rated: ${selectedRating} star${selectedRating > 1 ? "s" : ""}`;
    });
  });

  starContainer.addEventListener("mouseover", (e)=>{
    if(e.target.dataset.value){
      updateStars(e.target.dataset.value);
    }
  });
  starContainer.addEventListener("mouseout", ()=>{
    updateStars(selectedRating);
  });

  function updateStars(rating){
    [...starContainer.children].forEach((star,index)=>{
      star.textContent = index < rating ? "★" : "☆";
      star.style.color = index < rating ? "#facc15" : "#d1d5db";
      star.style.transition = "0.2s";
    });
  }

  // 📝 Character Counter
  const reviewText = document.getElementById("reviewText");
  const charCount = document.getElementById("charCount");
  reviewText.addEventListener("input",()=>{
    charCount.textContent = `${reviewText.value.length}/500`;
  });

  // 📸 File Preview
  const fileInput = document.getElementById("reviewFile");
  const previewContainer = document.getElementById("previewContainer");

  fileInput.addEventListener("change", ()=>{
    previewContainer.innerHTML = "";
    [...fileInput.files].forEach(file=>{
      const url = URL.createObjectURL(file);
      let preview;
      if(file.type.startsWith("image/")){
        preview = document.createElement("img");
        preview.src = url;
        preview.style.width = "80px";
        preview.style.height = "80px";
        preview.style.borderRadius = "8px";
        preview.style.objectFit = "cover";
        preview.style.boxShadow = "0 2px 6px rgba(0,0,0,0.2)";
      } else if(file.type.startsWith("video/")){
        preview = document.createElement("video");
        preview.src = url;
        preview.controls = true;
        preview.style.width = "120px";
        preview.style.borderRadius = "8px";
        preview.style.boxShadow = "0 2px 6px rgba(0,0,0,0.2)";
      }
      preview.dataset.filename = file.name;
      previewContainer.appendChild(preview);
    });
  });

  submitBtn.addEventListener("click", () => {
  const reviewTextValue = reviewText.value.trim();
  const fileNames = [...fileInput.files].map(file => file.name);
  console.log("Rating:", selectedRating);
  console.log("Review Text:", reviewTextValue);
  console.log("File URLs:", fileNames); 

  let formData = new FormData();
  formData.append('Rating', selectedRating);
  formData.append('Review', reviewTextValue);
  formData.append('File', fileNames);

  $.ajax({
    url : "User/submit_review",
    typt : "POST",
    data : formData,
    processData: false,  
    contentType: false,
    success: function (response) {
        console.log(response);
        alert("Review submitted successfully!");
    },
    error: function () {
        alert("Something went wrong!");
    }
  });

});

// ---------------------------------------

    const zoom = 2;
    const magnifier = document.getElementById("magnifier");
    const magnifierImg = magnifier.querySelector("img");

    // Change main display (image or video) and update magnifier if it's image
    function changeMain(element) {
      document.querySelectorAll('.thumbnails img, .thumbnails video')
        .forEach(el => el.classList.remove('active'));
      element.classList.add('active');

      const mediaContainer = document.getElementById('mediaContainer');
      mediaContainer.innerHTML = '';

      if (element.tagName === 'VIDEO') {
        const video = document.createElement('video');
        video.src = element.src;
        video.controls = true;
        video.autoplay = true;
        video.muted = true;
        video.loop = true;
        video.playsInline = true;
        video.style.width = "100%";
        video.style.borderRadius = "10px";
        mediaContainer.appendChild(video);

        magnifier.style.display = "none";
      } else {
        const img = document.createElement('img');
        img.id = "mainImage";
        img.src = element.src;
        img.alt = "Main Product";
        img.style.width = "100%";
        mediaContainer.appendChild(img);

        magnifierImg.src = element.src;
        enableMagnifier(img);
      }
    }


    // Enable magnifier on given image element
    function enableMagnifier(mainImage) {
      mainImage.addEventListener("mouseenter", () => {
        magnifier.style.display = "block";
        magnifierImg.src = mainImage.src;
      });

      mainImage.addEventListener("mouseleave", () => {
        magnifier.style.display = "none";
      });

      mainImage.addEventListener("mousemove", (e) => {
        const rect = mainImage.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        magnifier.style.left = `${e.pageX - magnifier.offsetWidth / 2}px`;
        magnifier.style.top = `${e.pageY - magnifier.offsetHeight / 2}px`;

        magnifierImg.style.width = `${mainImage.offsetWidth * zoom}px`;
        magnifierImg.style.height = `${mainImage.offsetHeight * zoom}px`;

        magnifierImg.style.position = "absolute";
        magnifierImg.style.left = `-${x * zoom - magnifier.offsetWidth / 2}px`;
        magnifierImg.style.top = `-${y * zoom - magnifier.offsetHeight / 2}px`;
      });
    }

    // Initial magnifier setup for first image
    const firstImage = document.getElementById("mainImage");
    magnifierImg.src = firstImage.src;
    enableMagnifier(firstImage);


    function selectPack(selected) {
      document.querySelectorAll('.pack-option').forEach(p => p.classList.remove('selected'));
      selected.classList.add('selected');
    }

    const tabs = document.querySelectorAll(".tab-button");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach(tab => {
      tab.addEventListener("click", () => {
        // Reset all tabs
        tabs.forEach(t => {
          t.style.color = "#9ca3af";
          t.style.borderBottom = "none";
        });
        // Hide all contents
        contents.forEach(c => c.style.display = "none");

        // Activate clicked tab
        tab.style.color = "#065f46";
        tab.style.borderBottom = "2px solid #065f46";
        const content = document.getElementById(tab.getAttribute("data-tab"));
        if (content) content.style.display = "block";
      });
    });

    function toggleFAQ(num) {
      for (let i = 1; i <= 5; i++) {
        let content = document.getElementById("faq" + i);
        let icon = document.getElementById("icon" + i);
        if (i === num) {
          if (content.style.display === "none" || content.style.display === "") {
            content.style.display = "block";
            icon.textContent = "▲";
          } else {
            content.style.display = "none";
            icon.textContent = "▼";
          }
        } else {
          content.style.display = "none";
          icon.textContent = "▼";
        }
      }
    };

    function scrollToSection(e, id) {
      e.preventDefault();
      document.getElementById(id).scrollIntoView({
        behavior: "smooth"
      });
    }

    // -------------------------------------------------------
    document.addEventListener('DOMContentLoaded', () => {
    const herbs = [
        { name: 'Giloy', image: 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTLS-VZTDx8mxaqXSi27ynb2zcEvJ1cEqu5e0WqoEfeJiQN3LXqoOQsSt4FyKqCPgl7Xxqd8DDZmI6zY0CfbSWiN3gSrDJkoZ7iGR5P4iI', description: 'Supports immunity and detoxifies the body.' },
        { name: 'Neem', image: 'https://i0.wp.com/www.ayurvedakendra.in/wp-content/uploads/2023/01/neem-1.jpg?ssl=1', description: 'Known for its blood-purifying properties.' },
        { name: 'Fenugreek', image: 'https://www.barc.gov.in/technologies/images/fenugreek.jpg', description: 'Helps in digestion and maintains blood sugar levels.' },
        { name: 'Gurmar', image: 'https://upload.wikimedia.org/wikipedia/commons/8/8f/Gymnema_sylvestre_R.Br_-_Flickr_-_lalithamba.jpg', description: 'Useful for managing blood sugar.' },
        { name: 'Saptrangi', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3tM1wl9g8pkpqkVFyazmMQ6ndQNxatTWG3TyaBVuL3s07I8I&s', description: 'Supports overall health and wellness.' },
    ];

    const container = document.getElementById('herbal-container');

    herbs.forEach(herb => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('herbal-item');

        const img = document.createElement('img');
        img.src = herb.image;
        img.alt = herb.name;
        itemDiv.appendChild(img);

        const name = document.createElement('div');
        name.classList.add('herbal-name');
        name.textContent = herb.name;
        itemDiv.appendChild(name);

        if (herb.description) {
            const desc = document.createElement('div');
            desc.classList.add('herbal-description');
            desc.textContent = herb.description;
            itemDiv.appendChild(desc);
        }

        container.appendChild(itemDiv);
    });
});
const herbalEls = document.querySelectorAll(".herbal-reveal");
      const herbalIo = new IntersectionObserver(
        (entries) => {
          entries.forEach((e) => {
            if(e.isIntersecting){
              e.target.classList.add("show");
              herbalIo.unobserve(e.target);
            }
          });
        },
        {threshold:0.25}
      );
      herbalEls.forEach(el=>herbalIo.observe(el));
  </script>
</body>
</html>