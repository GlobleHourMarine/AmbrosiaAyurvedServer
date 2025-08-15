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
.thumbnails img{
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
   border-radius: 9999px; /* circle for video */
}


.thumbnails img.active, .thumbnails video.active {
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
.main-display img, .main-display video {
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
.add-cart { background: #ff9800; color: #fff; }
.buy-now { background: #28a745; color: #fff; }

/* Product info */
.product-info {
    flex: 1;
    min-width: 250px;
    padding: 15px;
    margin-right: 17px;
}
.product-info h1 { margin: 0 0 10px; font-size: 24px; }
.rating { color: gold; margin-bottom: 10px; }
.grid-container {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 10px;
    margin-bottom: 10px;
}
@media(min-width: 640px) {
    .grid-container { grid-template-columns: repeat(2, 1fr); }
}
.grid-item {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #f3f4f6;
    padding: 10px;
    border-radius: 8px;
}
.grid-item i { color: #047857; font-size: 1.25rem; }

/* Pack options */
#pack-options {
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    margin-top: 15px;
    scrollbar-width:none;
    justify-content: space-evenly;
}
#pack-options::-webkit-scrollbar { display: none; }
.pack-option {
 position: relative;
    border-radius: 1rem;
    padding: 1rem;
    cursor: pointer;
    text-align: center;
    box-sizing: border-box;
    flex: 0 0 auto; /* So they don't shrink in flex mode */
    transition: box-shadow 0.3s ease;
    border: 1px solid #9ca3af;
  }

.pack-option:hover {
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
  }

.pack-option.selected {
    border: 2px solid #16a34a; /* green-600 */
    background-color: #dcfce7; /* green-50 */
    text-align: left;
  }
  .pack-option:not(.selected) {
    border: 1px solid #9ca3af; /* gray-400 */
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
.pack-option.selected .check-icon { display: block; color: #16a34a; }
.pack-option h3 { margin: 0 0 5px; font-weight: 600; }
.pack-option p { margin: 2px 0; }
.pack-option .price { color: #047857; font-weight: 700; font-size: 1.25rem; }
.pack-option .old-price { text-decoration: line-through; color: #6b7280; font-size: 0.875rem; }
.pack-option .text-red { color: #dc2626; font-weight: 600; }

/* Responsive */
@media(max-width: 768px){
    .des_container { flex-direction: column; align-items: center; }
    .thumbnails { flex-direction: row; justify-content: center; }
    .main-display { max-width: 100%; }
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
      padding: 0.5rem; /* md:p-2 */
    }
    #navbar a h1 {
      font-size: 1rem; /* md:text-base */
    }
  }
    @media (max-width: 768px) {
      section div[style*="grid-template-columns"] {
        grid-template-columns: 1fr !important;
      }
    }
   @media (max-width: 1024px) {
      section > div {
      grid-template-columns: repeat(2, 1fr) !important;
      }
   }
   @media (max-width: 640px) {
      section > div {
      grid-template-columns: repeat(1, 1fr) !important;
   }
   }
  @media screen and (max-width: 1024px) {
    .review-grid { grid-template-columns: repeat(2, 1fr) !important; }
  }
  @media screen and (max-width: 640px) {
    .review-grid { grid-template-columns: 1fr !important; }
  }
  @media (min-width: 1024px) {
    .pack-option {
        width: 28% !important;
    }
}
</style>
</head>
<body>

<div id="videos"
    class="
      des_container
    "
  
  >
    <!-- Thumbnails -->
    <div
      class="
        thumbnails
      "
    
      >
        <img src="https://it.ambrosiaayurved.in/assets/images/PB01.webp"
          class="
            active
          "
        onclick="changeMain(this)">
        <img src="https://it.ambrosiaayurved.in/assets/images/PB02.webp" onclick="changeMain(this)">
        <video src="https://www.zeroharm.in/cdn/shop/videos/c/vp/f074a4bce399496cae66797137d95f5c/f074a4bce399496cae66797137d95f5c.HD-1080p-3.3Mbps-41820093.mp4?v=0" onclick="changeMain(this)" autoplay muted loop playsinline></video>
        <img src="https://it.ambrosiaayurved.in/assets/images/PB03.webp" onclick="changeMain(this)">

    </div>

    <!-- Main display + buttons -->
    <div
      class="
        main-display
      "
     id="mainDisplay">
    
    <!-- Main media (image or video) container -->
    <div id="mediaContainer">
        <img id="mainImage"
             src="https://ambrosiaayurved.in/uploads/979f1f1eefc87a93c457a144830606f8.png"
             alt="Main Product"
             style="width: 70%; margin-left: 60px;">
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

    <!-- Buttons -->
    <div
      class="
        buttons
      "
    >
        <button
          class="
            add-cart
          "
        >
            <i
              class="
                fas fa-shopping-cart
              "
            ></i> Add to Cart
        </button>
        <button
          class="
            buy-now
          "
        >
            <i
              class="
                fas fa-bolt
              "
            ></i> Buy Now
        </button>
    </div>
</div>

    <!-- Product info -->
    <div
      class="
        product-info
      "
    
    >
        <h1>Holistic Ashwagandha Tablets</h1>
        <div
          class="
            rating
          "
        
        >★★★★☆ (4.6/5)</div>
        <div
          class="
            grid-container
          "
        
        >
            <div
              class="
                grid-item
              "
            
            ><i
              class="
                fas fa-spa
              "
            
            ></i><span>Relieves Stress & Anxiety</span></div>
            <div
              class="
                grid-item
              "
            
            ><i
              class="
                fas fa-venus-mars
              "
            
            ></i><span>Boosts Reproductive Health</span></div>
            <div
              class="
                grid-item
              "
            
            ><i
              class="
                fas fa-balance-scale
              "
            
            ></i><span>Enhances Body Balance</span></div>
            <div
              class="
                grid-item
              "
            
            ><i
              class="
                fas fa-bed
              "
            
            ></i><span>Alleviates Insomnia</span></div>
        </div>
        <p>Holistic Ashwagandha Tablet combines natural Ashwagandha root extracts and Pectin for holistic health.</p>

        <div id="pack-options">
            <div

              class="
                pack-option selected
              "
            
             onclick="selectPack(this)">
                <div
                  class="
                    check-icon
                  "
                
                ><i
                  class="
                    fas fa-check-circle
                  "
                
                ></i></div>
                <h4>3 bottles</h4>
                <p>180 Tablets<br>3 months</p>
                <p
                  class="
                    text-red
                  "
                
                >-16.0% off</p>
                <p
                  class="
                    price
                  "
                
                >₹1,449</p>
                <p
                  class="
                    old-price
                  "
                
                >₹1,725.00</p>
                <p
                  class="
                    text-red
                  "
                
                >Save ₹276/-</p>
            </div>
            <div
              class="
                pack-option
              "
            
             onclick="selectPack(this)">
                <div
                  class="
                    check-icon
                  "
                
                ><i
                  class="
                    fas fa-check-circle
                  "
                
                ></i></div>
                <h4>6 bottles</h4>
                <p>360 Tablets<br>6 months</p>
                <p
                  class="
                    text-red
                  "
                
                >-20.0% off</p>
                <p
                  class="
                    price
                  "
                
                >₹2,499</p>
                <p
                  class="
                    old-price
                  "
                
                >₹3,125.00</p>
                <p
                  class="
                    text-red
                  "
                
                >Save ₹626/-</p>
            </div>
            <div
              class="
                pack-option
              "
            
             onclick="selectPack(this)">
                <div
                  class="
                    check-icon
                  "
                
                ><i
                  class="
                    fas fa-check-circle
                  "
                
                ></i></div>
                <h4>1 bottle</h4>
                <p>60 Tablets<br>1 month</p>
                <p
                  class="
                    text-red
                  "
                
                >-10.0% off</p>
                <p
                  class="
                    price
                  "
                
                >₹549</p>
                <p
                  class="
                    old-price
                  "
                
                >₹610.00</p>
                <p
                  class="
                    text-red
                  "
                
                >Save ₹61/-</p>
            </div>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------- -->
<div id="navbar"
  style="
    display: flex;
    overflow-x: auto;
    flex-wrap: nowrap;
    align-items: center;
    z-index: 9999 !important;
    margin-x: 10px;
    gap: 1.5rem;
    padding: 0.5rem 0.5rem 0 0.5rem; /* px-2 pt-2 pb-0 */
    background: linear-gradient(to right, #9333ea, #ec4899); /* from-purple-600 to-pink-600 */
    position: sticky;
    top: 0;
    color: white;
    text-align: center;
    scroll-behavior: smooth;
    margin-left: 30px;
    margin-right: 30px;
    transition: all 0.3s ease-in-out;
    border-radius: 15px 50px;
  "
>
  <!-- Videos -->
  <a
    id="nav-videos"
    href="#videos"
    onclick="scrollToSection(event, 'videos')"
    style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 60px;
      margin: 0 1rem;
      cursor: pointer;
      color: white;
    "
  >
    <i
      id="icon-videos"
        class="
          fa-solid fa-video
        "
      
      
      style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "
    ></i>
    <h1 id="text-videos" style="font-size: 1rem;color:white">Videos</h1>
  </a>

  <!-- Benefits -->
  <a
    id="nav-benefits"
    href="#benefits"
    onclick="scrollToSection(event, 'benefits')"
    style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 60px;
      margin: 0 2.5rem;
      cursor: pointer;
      color: white;
    "
  >
    <i
      id="icon-benefits"
        class="
          fa-solid fa-briefcase-medical
        "
      
      
      style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "
    ></i>
    <h1 id="text-benefits" style="font-size: 1rem; color: white;">Benefits</h1>
  </a>

  <!-- Reviews -->
  <a
    id="nav-reviews"
    href="#reviews"
    onclick="scrollToSection(event, 'reviews')"
    style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 80px;
      margin: 0 2.5rem;
      color: white;
    "
  >
    <i
      id="icon-reviews"
        class="
          fa-solid fa-thumbs-up
        "
      
      
      style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "
    ></i>
    <h1 id="text-reviews" style="font-size: 1rem; color: white;">Reviews</h1>
  </a>

  <!-- FAQs -->
  <a
    id="nav-faqs"
    href="#faqs"
    onclick="scrollToSection(event, 'faqs')"
    style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 80px;
      margin: 0 2.5rem;
      color: white;
    "
  >
    <i
      id="icon-faqs"
        class="
          fa-solid fa-question-circle
        "
      
      
      style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "
    ></i>
    <h1 id="text-faqs" style="font-size: 1rem; color: white;">FAQs</h1>
  </a>

  <!-- Ingredients -->
  <a
    id="nav-ingredients"
    href="#ingredients"
    onclick="scrollToSection(event, 'ingredients')"
    style="
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 0.5rem;
      min-width: 80px;
      margin: 0 2.5rem;
      color: white;
    "
  >
    <i
      id="icon-ingredients"
        class="
          fa-solid fa-flask
        "
      
      
      style="
        border: 2px solid white;
        padding: 0.5rem;
        border-radius: 9999px;
        color: white;
      "
    ></i>
    <h1 id="text-ingredients" style="font-size: 1rem; color: white;">Ingredients</h1>
  </a>
</div>
<!-- ----------------------------------------------------------------------------------------------------------------- -->
<section style="background-color: #f3f4f6; padding: 3rem 1rem;">
  <div style="max-width: 1280px; margin: 0 auto;">

    <!-- Tabs -->
    <div id="tabs" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 2rem; border-bottom: 1px solid #d1d5db; padding-bottom: 0.5rem; font-size: 1rem;">
<button
    class="
      tab-button
    "
  
   data-tab="purity" style="color: #065f46; font-weight: 600; border-bottom: 2px solid #065f46; border-top: none; border-left: none; border-right: none; padding: 0.5rem 1rem; cursor: pointer;">Science Meets Purity </button>      
<button
    class="
      tab-button
    "
  
   data-tab="certifications" style="color: #9ca3af; font-weight: 600; border-bottom: none; padding: 0.5rem 1rem; border-top: none; border-left: none; border-right: none; cursor: pointer; bottom-top: none; bottom-right: none; bottom-left: none; transition: color 0.3s;">Certifications</button>
      <button
        class="
          tab-button
        "
      
       data-tab="patents" style="color: #9ca3af; font-weight: 600; border-bottom: none; padding: 0.5rem 1rem; border-top: none; border-left: none; border-right: none; cursor: pointer; bottom-top: none; bottom-right: none; bottom-left: none; transition: color 0.3s;">Patents</button>
      <button
        class="
          tab-button
        "
      
       data-tab="collab" style="color: #9ca3af; font-weight: 600; border-bottom: none; padding: 0.5rem 1rem; border-top: none; border-left: none; border-right: none; cursor: pointer; bottom-top: none; bottom-right: none; bottom-left: none; transition: color 0.3s;">Collaborating with the Best</button>
    </div>

    <!-- Title -->
    <div style="text-align: center; margin: 2.5rem 0;">
      <h2 style="font-size: 2rem; font-weight: 600; color: #065f46; margin: 0;">NATURE'S PURITY, SCIENCE'S PRECISION</h2>
    </div>

    <!-- Tab Contents -->
    <div id="purity"
      class="
        tab-content
      "
    
     style="display: block;">
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

    <div id="certifications"
      class="
        tab-content
      "
    
     style="display: none; text-align: center; color: #374151;">
      <p style="font-size: 1.125rem; margin: 0;">Certified Organic, FDA Approved, ISO Compliant.</p>
    </div>

    <div id="patents"
      class="
        tab-content
      "
    
     style="display: none; text-align: center; color: #374151;">
      <p style="font-size: 1.125rem; margin: 0;">Our patented extraction and nano-tech innovations.</p>
    </div>

    <div id="collab"
      class="
        tab-content
      "
    
     style="display: none; text-align: center; color: #374151;">
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

      <!-- Card 1 -->
      <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <img src="https://ambrosiaayurved.in/uploads/benefits/Key_Benfits_1.webp" alt="Blood Sugar" style="width: 80px; height: 80px; margin-bottom: 1rem;">
        <h3 style="font-size: 1.125rem; font-weight: 500; color: #1f2937; margin-bottom: 0.5rem;">Monitors Blood Sugar Levels</h3>
        <a href="#" style="font-size: 0.875rem; font-weight: 500; color: #1f2937; text-decoration: none;" 
           onmouseover="this.style.color='#065f46'" onmouseout="this.style.color='#1f2937'">Scientific report →</a>
      </div>

      <!-- Card 2 -->
      <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <img src="https://ambrosiaayurved.in/uploads/benefits/Key_Benfits_21.webp" alt="Reproductive Health" style="width: 80px; height: 80px; margin-bottom: 1rem;">
        <h3 style="font-size: 1.125rem; font-weight: 500; color: #1f2937; margin-bottom: 0.5rem;">Boosts Reproductive Health</h3>
        <a href="#" style="font-size: 0.875rem; font-weight: 500; color: #1f2937; text-decoration: none;" 
           onmouseover="this.style.color='#065f46'" onmouseout="this.style.color='#1f2937'">Scientific report →</a>
      </div>

      <!-- Card 3 -->
      <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTotW4eqhktXGJ-fWhYhx5kJmuLqnvkmStyhw&s" alt="Stress & Anxiety" style="width: 80px; height: 80px; margin-bottom: 1rem;">
        <h3 style="font-size: 1.125rem; font-weight: 500; color: #1f2937; margin-bottom: 0.5rem;">Alleviates Stress & Anxiety</h3>
        <a href="#" style="font-size: 0.875rem; font-weight: 500; color: #1f2937; text-decoration: none;" 
           onmouseover="this.style.color='#065f46'" onmouseout="this.style.color='#1f2937'">Scientific report →</a>
      </div>

      <!-- Card 4 -->
      <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <img src="https://www.verywellhealth.com/thmb/nbgL95xGUwrOMEgkDZr0Jn5sTeE=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/anti-inflammatory-diet-88752-final-67806c6955af4d80a317fec6d499102e.png" alt="Anti-inflammatory" style="width: 80px; height: 80px; margin-bottom: 1rem;">
        <h3 style="font-size: 1.125rem; font-weight: 500; color: #1f2937; margin-bottom: 0.5rem;">Anti-inflammatory Benefits</h3>
        <a href="#" style="font-size: 0.875rem; font-weight: 500; color: #1f2937; text-decoration: none;" 
           onmouseover="this.style.color='#065f46'" onmouseout="this.style.color='#1f2937'">Scientific report →</a>
      </div>

      <!-- Card 5 -->
      <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyRxZXxEjQl4NJIBCjoLPJGfDyqqNLbCPN3A&s" alt="Immunity" style="width: 80px; height: 80px; margin-bottom: 1rem;">
        <h3 style="font-size: 1.125rem; font-weight: 500; color: #1f2937; margin-bottom: 0.5rem;">Supports Immunity</h3>
        <a href="#" style="font-size: 0.875rem; font-weight: 500; color: #1f2937; text-decoration: none;" 
           onmouseover="this.style.color='#065f46'" onmouseout="this.style.color='#1f2937'">Scientific report →</a>
      </div>

      <!-- Card 6 -->
      <div style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <img src="https://media.istockphoto.com/id/1183325543/vector/heart-isometric-health-care-concept-red-shape-and-heartbeat.jpg?s=612x612&w=0&k=20&c=mBkVFXUpbkpoSrP1lEbcWRQP94wzjyBkYGLTkI0i7RA=" alt="Heart Health" style="width: 80px; height: 80px; margin-bottom: 1rem;">
        <h3 style="font-size: 1.125rem; font-weight: 500; color: #1f2937; margin-bottom: 0.5rem;">Improves Heart Health</h3>
        <a href="#" style="font-size: 0.875rem; font-weight: 500; color: #1f2937; text-decoration: none;" 
           onmouseover="this.style.color='#065f46'" onmouseout="this.style.color='#1f2937'">Scientific report →</a>
      </div>
    </div>
  </div>
</section>
<!-- ----------------------------------------------------------------------------------------------------------------- -->
<div id="ingredients" style="background-color: white;">

  <!-- Top Heading -->
  <div style="background-color: black; color: white; text-align: center; font-size: 1.125rem; font-weight: 600; padding: 1rem 1.25rem;">
    Sourced from Nature, Purified for Potency
  </div>

  <!-- Cards Container -->
  <div style="display: flex; gap: 1.5rem; padding: 1.5rem; justify-content: center; align-items: stretch;">

    <!-- Card 1 -->
    <div style="background-color: #f3f4f6; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 1.5rem; flex: 1; max-width: 28rem; text-align: center; transition: box-shadow 0.3s ease;" 
         onmouseover="this.style.boxShadow='0 8px 16px rgba(0,0,0,0.15)'" 
         onmouseout="this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'">
      <img src="https://www.zeroharm.in/cdn/shop/files/pectin_600x.png?v=1691819801" alt="Pectin" style="width: 8rem; height: 8rem; margin: 0 auto 1rem auto; object-fit: contain;">
      <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem; color: #065f46;">Pectin</h3>
      <p style="color: #374151; font-size: 0.875rem; line-height: 1.4;">
        Pectin is a type of dietary fiber found in fruits and vegetables. It may aid in digestive health by promoting regular bowel movements and supporting overall gut function.
      </p>
      <a href="#" style="display: inline-block; margin-top: 10px; padding: 0.5rem 1rem; border-radius: 0.375rem; background: linear-gradient(to right, #16a34a, #059669); color: white; text-decoration: none; transition: background 0.3s ease;"
         onmouseover="this.style.background='linear-gradient(to right, #15803d, #047857)'" 
         onmouseout="this.style.background='linear-gradient(to right, #16a34a, #059669)'">
        Learn More
      </a>
    </div>

    <!-- Card 2 -->
    <div style="background-color: #f3f4f6; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1); padding: 1.5rem; flex: 1; max-width: 28rem; text-align: center; transition: box-shadow 0.3s ease;" 
         onmouseover="this.style.boxShadow='0 8px 16px rgba(0,0,0,0.15)'" 
         onmouseout="this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'">
      <img src="https://www.zeroharm.in/cdn/shop/files/pectin_600x.png?v=1691819801" alt="Pectin" style="width: 8rem; height: 8rem; margin: 0 auto 1rem auto; object-fit: contain;">
      <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem; color: #065f46;">Pectin</h3>
      <p style="color: #374151; font-size: 0.875rem; line-height: 1.4;">
        Pectin is a type of dietary fiber found in fruits and vegetables. It may aid in digestive health by promoting regular bowel movements and supporting overall gut function.
      </p>
      <a href="#" style="display: inline-block; margin-top: 10px; padding: 0.5rem 1rem; border-radius: 0.375rem; background: linear-gradient(to right, #16a34a, #059669); color: white; text-decoration: none; transition: background 0.3s ease;"
         onmouseover="this.style.background='linear-gradient(to right, #15803d, #047857)'" 
         onmouseout="this.style.background='linear-gradient(to right, #16a34a, #059669)'">
        Learn More
      </a>
    </div>
  </div>
</div>
<!-- ----------------------------------------------------------------------------------------------------------------- -->
<section style="padding: 40px 16px;">
  <h2 style="font-size: 24px; font-weight: 600; text-align: center; margin-bottom: 32px; color: #1f2937;">
    Consumer Studies
  </h2>

  <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; max-width: 1280px; margin: 0 auto;">
    <!-- Card 1 -->
    <div
      style="background-color: #f9fafb; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; text-align: center; transition: all 0.3s ease;"
      onmouseover="this.style.backgroundColor='#16a34a'; this.querySelector('span').style.color='#fff'; this.querySelector('p').style.color='#fff';"
      onmouseout="this.style.backgroundColor='#f9fafb'; this.querySelector('span').style.color='#14532d'; this.querySelector('p').style.color='#4b5563';"
    >
      <span style="font-size: 30px; font-weight: bold; color: #14532d;">85%</span>
      <p style="color: #4b5563; margin-top: 16px;">
        Users felt more energetic with our holistic supplement.
      </p>
    </div>

    <!-- Card 2 -->
    <div
      style="background-color: #f9fafb; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; text-align: center; transition: all 0.3s ease;"
      onmouseover="this.style.backgroundColor='#16a34a'; this.querySelector('span').style.color='#fff'; this.querySelector('p').style.color='#fff';"
      onmouseout="this.style.backgroundColor='#f9fafb'; this.querySelector('span').style.color='#14532d'; this.querySelector('p').style.color='#4b5563';"
    >
      <span style="font-size: 30px; font-weight: bold; color: #14532d;">91%</span>
      <p style="color: #4b5563; margin-top: 16px;">
        Our holistic supplement aids in enhancing stamina and strength.
      </p>
    </div>

    <!-- Card 3 -->
    <div
      style="background-color: #f9fafb; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; text-align: center; transition: all 0.3s ease;"
      onmouseover="this.style.backgroundColor='#16a34a'; this.querySelector('span').style.color='#fff'; this.querySelector('p').style.color='#fff';"
      onmouseout="this.style.backgroundColor='#f9fafb'; this.querySelector('span').style.color='#14532d'; this.querySelector('p').style.color='#4b5563';"
    >
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
                display:flex; flex-direction:column; justify-content:space-between; position:relative;"
         onmouseover="this.querySelector('button').style.opacity='1'"
         onmouseout="this.querySelector('button').style.opacity='0'">
      
      <div>
        <div style="position:relative;">
          <span style="position:absolute; top:8px; left:8px; background:#065f46; color:white; font-size:12px; padding:2px 8px; border-radius:9999px;">
            -32%
          </span>
          <img src="https://www.ambrosiaorganicfarm.com/wp-content/uploads/2023/06/Blueberry-Peanut-Butter-Mockup.webp"
               alt="Product"
               style="border-radius:8px; width:100%; object-fit:cover;">
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
                display:flex; flex-direction:column; justify-content:space-between; position:relative;"
         onmouseover="this.querySelector('button').style.opacity='1'"
         onmouseout="this.querySelector('button').style.opacity='0'">
      
      <div>
        <div style="position:relative;">
          <span style="position:absolute; top:8px; left:8px; background:#065f46; color:white; font-size:12px; padding:2px 8px; border-radius:9999px;">
            -32%
          </span>
          <img src="https://www.ambrosiaorganicfarm.com/wp-content/uploads/2023/06/Blueberry-Peanut-Butter-Mockup.webp"
               alt="Product"
               style="border-radius:8px; width:100%; object-fit:cover;">
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
                display:flex; flex-direction:column; justify-content:space-between; position:relative;"
         onmouseover="this.querySelector('button').style.opacity='1'"
         onmouseout="this.querySelector('button').style.opacity='0'">
      
      <div>
        <div style="position:relative;">
          <span style="position:absolute; top:8px; left:8px; background:#065f46; color:white; font-size:12px; padding:2px 8px; border-radius:9999px;">
            -32%
          </span>
          <img src="https://www.ambrosiaorganicfarm.com/wp-content/uploads/2023/06/Blueberry-Peanut-Butter-Mockup.webp"
               alt="Product"
               style="border-radius:8px; width:100%; object-fit:cover;">
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
                display:flex; flex-direction:column; justify-content:space-between; position:relative;"
         onmouseover="this.querySelector('button').style.opacity='1'"
         onmouseout="this.querySelector('button').style.opacity='0'">
      
      <div>
        <div style="position:relative;">
          <span style="position:absolute; top:8px; left:8px; background:#065f46; color:white; font-size:12px; padding:2px 8px; border-radius:9999px;">
            -32%
          </span>
          <img src="https://www.ambrosiaorganicfarm.com/wp-content/uploads/2023/06/Blueberry-Peanut-Butter-Mockup.webp"
               alt="Product"
               style="border-radius:8px; width:100%; object-fit:cover;">
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
        <div style="color: #facc15; font-size: 1.25rem;">★★★★★</div>
        <span style="font-size: 1.25rem; font-weight: 600;">4.58 out of 5</span>
        <span style="color: #4b5563;">Based on 1621 reviews</span>
      </div>
      <div style="display: flex; gap: 16px;">
        <button onclick="toggleFormCustom('reviewFormCustom')" style="background-color: #facc15; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Write a review</button>
        <button onclick="toggleFormCustom('questionFormCustom')" style="border: 1px solid #facc15; color: #ca8a04; padding: 8px 16px; border-radius: 6px; background: white; cursor: pointer;">Ask a question</button>
      </div>
    </div>
  </div>

  <!-- Review Form -->
  <div id="reviewFormCustom" style="max-width: 640px; margin: 24px auto; padding: 16px; border: 1px solid #d1d5db; border-radius: 8px; background-color: #f9fafb; display: none; position: relative; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
    <button onclick="closeFormCustom('reviewFormCustom')" style="position: absolute; top: 8px; right: 8px; font-size: 1.25rem; color: #6b7280; background: none; border: none; cursor: pointer;">✖</button>
    <h2 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 8px;">Write a Review</h2>
    <textarea placeholder="Write your review here..." style="width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 6px;"></textarea>
    <button style="margin-top: 8px; background-color: #22c55e; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Submit Review</button>
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
      <button style="font-weight: 600; color: #ca8a04; border-bottom: 2px solid #ca8a04; background: none; border: none; cursor: pointer;">Reviews (1621)</button>
      <button style="color: #ca8a04; background: none; border: none; cursor: pointer;">Questions (2)</button>
    </div>

    <!-- Reviews Grid -->
    <div
      class="
        review-grid
      "
     style="margin-top: 24px; display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
  
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
      Holistic Ashwagandha Tablets contain nano-formulated Ashwagandha and
      all its active ingredients, providing holistic health benefits. These
      benefits include fighting stress and anxiety, regulating blood
      pressure, cholesterol, and blood sugar levels, and enhancing memory,
      body balance, and brain function.
    </div>
  </div>

  <!-- FAQ Item 2 -->
  <div style="border:1px solid #ccc; border-radius:8px; margin-bottom:16px;">
    <button onclick="toggleFAQ(2)" style="width:100%; text-align:left; padding:12px 16px; display:flex; justify-content:space-between; align-items:center; background:none; border:none; font-size:16px; cursor:pointer; font-weight:600;">
      <span>What are the key ingredients in Holistic Ashwagandha Tablets?</span>
      <span id="icon2" style="font-size:18px;">▼</span>
    </button>
    <div id="faq2" style="padding:0 16px 16px 16px; color:#4a4a4a; display:none;">
      The key ingredient is nano-formulated Ashwagandha, supported by
      natural excipients to improve bioavailability.
    </div>
  </div>

  <!-- FAQ Item 3 -->
  <div style="border:1px solid #ccc; border-radius:8px; margin-bottom:16px;">
    <button onclick="toggleFAQ(3)" style="width:100%; text-align:left; padding:12px 16px; display:flex; justify-content:space-between; align-items:center; background:none; border:none; font-size:16px; cursor:pointer; font-weight:600;">
      <span>What is the nutritional content of these tablets?</span>
      <span id="icon3" style="font-size:18px;">▼</span>
    </button>
    <div id="faq3" style="padding:0 16px 16px 16px; color:#4a4a4a; display:none;">
      Each tablet contains a standardized amount of Ashwagandha extract
      along with essential nutrients to support daily wellness.
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
<script>
   function toggleFormCustom(formId) {
    document.getElementById('reviewFormCustom').style.display = 'none';
    document.getElementById('questionFormCustom').style.display = 'none';
    document.getElementById(formId).style.display = 'block';
  }
  function closeFormCustom(formId) {
    document.getElementById(formId).style.display = 'none';
  }

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
      if(content) content.style.display = "block";
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
  document.getElementById(id).scrollIntoView({ behavior: "smooth" });
}

</script>

</body>
</html>
