<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements Slider</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        body {  font-family: 'Open Sans', sans-serif; text-align: center; }
        .swiper { width: 100%; margin: auto;background:rgb(235, 252, 230);margin-top:5px; }
        .swiper-slide {  padding: 20px; border-radius: 10px; }
        .swiper-slide .img {
    width: 150px;
    height: auto;
    border-radius: 50%;
    border: 2px solid transparent;
    background: linear-gradient(white, white) padding-box, 
                linear-gradient(to bottom, #87CEEB, #1E90FF, #104E8B) border-box;
    box-shadow: 0px 4px 10px rgba(16, 78, 139, 0.6); /* Default shadow */
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.swiper-slide .img:hover {
    box-shadow: 0px 8px 20px rgba(16, 78, 139, 0.9); /* Stronger shadow on hover */
    transform: scale(1.05); /* Slightly enlarges the image */
}

        .underline{
            width:20%;
            height:2px;
            background-color:blue;
            margin:auto;
        }
        .paragraph{
            color:black;
            font-size:18px;
        }
    .second-container{
    width:100%;
    /* display:flex; */
    height:auto;
    /* border:2px solid red; */
    padding-top:20px;
    margin-top:10px;
padding-bottom:20px;
    background-color:hsl(252, 23.80%, 95.90%);
}
.card{
    display:flex;
    justify-content:space-between;
    border:2px solid red;
    flex-direction:row;
    width:80%;
    margin:auto;
    /* gap:40px; */
    border:none;
    margin-top:10px;
    background:none;
    
}
.circle-container{
    width:30%;
   
    /* border:2px solid black; */
}
.card-text{
    text-align:left;
}
.card-body{
    /* border:2px solid red; */
    width:70%;
    justify-content:flex-end;
}
.card-img-top {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 4px solid transparent; /* Makes room for the gradient border */
    background: linear-gradient(white, white) padding-box, 
                linear-gradient(to bottom, #87CEEB, #1E90FF, #104E8B) border-box;
    box-shadow: 0px 4px 10px rgba(16, 78, 139, 0.6); /* Normal shadow */
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out; /* Smooth transition */
}

.card-img-top:hover {
    box-shadow: 0px 8px 20px rgba(16, 78, 139, 0.9); /* Stronger shadow on hover */
    transform: scale(1.05); /* Slightly enlarges the image on hover */
}


.h4 {
    text-align: left;
    color: darkred;
    font-size: 24px;
    font-weight: bold;
    background: linear-gradient(to bottom, #ff4d4d 0%, darkred 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
}
.glossy-heading {
    text-align: center;
    font-size: 32px;
    font-weight: bold;
    color: orangered;
    background: linear-gradient(to bottom, #87CEEB 0%, #1E90FF 50%, #104E8B 100%);

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}
.card {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.card.show {
    opacity: 1;
    transform: translateY(0);
}
/* For Tablets and Smaller Devices */
@media (max-width: 992px) {
    .swiper-slide {
        text-align: center;
    }

    .swiper-slide img {
        width: 80%;
        height: auto;
    }

    .paragraph {
        font-size: 16px;
        margin-top: 10px;
    }

    .card {
        flex-direction: column;
        text-align: center;
        align-items: center;
        width: 100%;
        margin-bottom: 20px;
    }

    .card-body {
        margin-left: 0 !important;
        text-align: center;
    }

    .circle-container img {
        width: 80%;
        height: auto;
        border-radius: 10px;
    }
    .card-img-top {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: 4px solid transparent; /* Makes room for the gradient border */
    background: linear-gradient(white, white) padding-box, 
                linear-gradient(to bottom, #87CEEB, #1E90FF, #104E8B) border-box;
    box-shadow: 0px 4px 10px rgba(16, 78, 139, 0.6); /* Normal shadow */
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out; /* Smooth transition */
}
}

/* For Mobile Devices */
@media (max-width: 768px) {
    .swiper {
        width: 100%;
        padding: 10px;
    }

    .swiper-slide {
        width: 100% !important;
    }

    .swiper-slide img {
        width: 100%;
        height: auto;
    }

    .paragraph {
        font-size: 14px;
    }

    .card {
        flex-direction: column;
        width: 100%;
    }

    .card-body {
        padding: 10px;
    }

    .circle-container img {
        width: 90%;
    }

    .glossy-heading {
        font-size: 24px;
    }
}

/* For Extra Small Screens */
@media (max-width: 576px) {
    .swiper-slide img {
        width: 100%;
        height: auto;
    }

    .paragraph {
        font-size: 12px;
    }

    .card {
        width: 100%;
        margin-bottom: 15px;
    }

    .card-body h4 {
        font-size: 16px;
    }

    .card-text {
        font-size: 14px;
    }

    .circle-container img {
        width: 100%;
    }
}
/* General Styles */
.swiper {
    width: 100%;
    padding: 20px;
}

.swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.swiper-slide img {
    width: 100%;
    max-width: 350px;  /* Ensure images don't stretch too much */
    height: auto;
    margin-bottom: 15px;
}

.paragraph {
    font-size: 18px;
    text-align: center;
    color: #333;
    font-weight: 600;
}

/* For Tablets (Portrait and Smaller Devices) */
@media (max-width: 992px) {
    .swiper-slide {
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .swiper-slide img {
        width: 80%;  /* Smaller images for tablets */
        max-width: 300px;
    }

    .paragraph {
        font-size: 16px;
        margin-top: 10px;
    }
    .card-img-top {
    width: 100%;
    height: 150px;
    border-radius: 50%;
    border: 4px solid transparent; /* Makes room for the gradient border */
    background: linear-gradient(white, white) padding-box, 
                linear-gradient(to bottom, #87CEEB, #1E90FF, #104E8B) border-box;
    box-shadow: 0px 4px 10px rgba(16, 78, 139, 0.6); /* Normal shadow */
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out; /* Smooth transition */
}
}

/* For Mobile Devices */
@media (max-width: 768px) {
    .swiper {
        padding: 10px;
    }

    .swiper-slide {
        padding: 10px;
    }

    .swiper-slide img {
        width: 100%;  /* Full-width images on mobile */
        max-width: 100%;
    }

    .paragraph {
        font-size: 14px;
    }

    .swiper-slide img {
        height: auto;
    }
}

/* For Extra Small Screens */
@media (max-width: 576px) {
    .swiper {
        padding: 5px;
    }

    .swiper-slide img {
        max-width: 100%;
        height: auto;
    }

    .paragraph {
        font-size: 12px;
        margin-top: 8px;
    }
    .card-img-top {
    width: 500px;
    height: 200px;
    border-radius: 50%;
    border: 4px solid transparent; /* Makes room for the gradient border */
    background: linear-gradient(white, white) padding-box, 
                linear-gradient(to bottom, #87CEEB, #1E90FF, #104E8B) border-box;
    box-shadow: 0px 4px 10px rgba(16, 78, 139, 0.6); /* Normal shadow */
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out; /* Smooth transition */
}
}
/* For Tablets (max-width: 768px) */
@media (max-width: 768px) {
    .circle-container {
        width: 120px; /* Smaller size for tablets */
        height: 120px;
    }
    .circle-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Prevent stretching */
        border-radius: 50%;
    }
}

/* For Mobile Devices (max-width: 576px) */
@media (max-width: 576px) {
    .circle-container {
        width: 100px; /* Even smaller for mobile */
        height: 100px;
    }
    .circle-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }
}
/* Default Swiper Styles */
.swiper {
    width: 100%;
    overflow: hidden;
}

.swiper-slide {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* For Tablets and Smaller Screens */
@media (max-width: 992px) {
    .swiper-slide img {
        width: 80%;
        height: auto;
    }
}

/* For Mobile Devices */
@media (max-width: 768px) {
    .swiper {
        width: 100%;
        padding: 10px;
    }
    .h4 {
        font-size: 15px;
    }
    .swiper-wrapper {
        display: flex;
        transition-timing-function: linear !important; /* Ensures smooth continuous scrolling */
        animation: scrollSwiper 10s linear infinite; /* Adjust speed if needed */
    }

    .swiper-slide {
        flex: 0 0 33.33%; /* Ensures 3 images visible at a time */
        max-width: 33.33%;
        text-align: center;
    }

    .swiper-slide img {
        width: 100%;
        max-width: **300px**; /* Increased size for better visibility */
        height: auto;
        border-radius: 10px;
    }
   
}


/* Keyframes for Continuous Scrolling */
@keyframes scrollSwiper {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-100%);
    }
}
@media (max-width: 768px) {
    .circle-container {
        position: relative; /* Ensures correct positioning */
        width: 200px; /* Set absolute width */
        height: 200px; /* Set absolute height */
    }

    .circle-container img {
        position: absolute;
        width: 150px; /* Absolute width */
        height: 150px; /* Absolute height */
        border-radius: 50%; /* Keeps circular shape */
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%); /* Centers the image */
    }
}




    </style>
</head>
<body>
    
    <div class="swiper">
    <h2 style="color:#666;font-weight:700;font-family: Plantin, serif; text-align:center;" class="h4">Our Achievements Over The Years</h2>
    <div class="underline" style=" background: linear-gradient(to bottom, #ff4d4d 0%, darkred 100%);"></div>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="<?php echo base_url('/assets/images/earth.jpg') ?>" alt="WHO GMP Certification" class="img">
                <p class="paragraph">The whole world</p>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo base_url('/assets/images/malaysia.png') ?>" alt="Exports" class="img">
                <p class="paragraph">imported from malaysia</p>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo base_url('/assets/images/gurantee.png') ?>" alt="Nagarjuna Award" class="img">
                <p class="paragraph">100% suger free</p>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo base_url('/assets/images/our-services1010.png') ?>" alt="Chyawanprash" class="img">
                <p class="paragraph">Affordable Price</p>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo base_url('/assets/images/our-services1.jpg') ?>" alt="Accreditations" class="img">
                <p class="paragraph">Our Services</p>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo base_url('/assets/images/gurantee.png') ?>" alt="Nagarjuna Award" class="img">
                <p class="paragraph">100% suger free</p>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo base_url('/assets/images/our-services3.jpg') ?>" alt="Chyawanprash" class="img">
                <p class="paragraph">knowledge</p>
            </div>
            <!-- <div class="swiper-slide">
                <img src="<?php echo base_url('/assets/images/our-services1.jpg') ?>" alt="Accreditations" class="img">
                <p class="paragraph">our services</p>
            </div> -->
            <div class="swiper-slide">
                <img src="<?php echo base_url('/assets/images/ayurved1.jpg') ?>" alt="Accreditations" class="img">
                <p class="paragraph">Pure Natural</p>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="second-container">
    <h2 class="glossy-heading">Why Choose Us?</h2>
  
                <div style="width:8%;-align:left; height:2px;background: linear-gradient(to bottom, #87CEEB 0%, #1E90FF 50%, #104E8B 100%);; margin:auto"></div>

        <!-- <div style="color:yellow;"class="underline"></div> -->
        <div class="card" >
            <div class="circle-container">
                <img src="<?php echo base_url('/assets/images/b1.png') ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h4 class="h4"style="margin-top:15px; ">High-Quality Products</h4>
                <!-- <div style="width:20%;-align:left; height:3px;background-color:blue; margin-bottom:10px;"></div> -->
                <p class="card-text" style="font-size:17px;">Only the best, nothing less. Every product is carefully crafted to deliver real results you can trust.</p>
            </div>
        </div>
        <div class="card" >
            <div style="margin-left:50px;"class="card-body">
                <h4 class="h4" style="margin-top:15px;">Fast and Reliable Delivery</h4>
                <!-- <div style="width:20%;-align:left; height:3px;background-color:blue; margin-bottom:10px;"></div> -->
                <p class="card-text" style="font-size:17px;">No waiting games. Get your orders delivered quickly, safely, and right to your doorstep — every time.</p>
            </div>
            <div class="circle-container">
                 <img src="<?php echo base_url('/assets/images/our-services12.jpg') ?>" class="card-img-top" alt="..."> 
            </div>
        </div>
        <div class="card">
            <div class="circle-container">
                <img src="<?php echo base_url('/assets/images/our-services10.jpg') ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h4 class="h4" style="margin-top:15px;">Affordable Pricing</h4>
                <!-- <div style="width:20%;-align:left; height:3px;background-color:blue; margin-bottom:10px;"></div> -->
                <p class="card-text" style="font-size:17px;">Wellness shouldn’t cost a fortune. We keep our prices fair so you can focus on your health, not your wallet. </p>
            </div>
        </div>
        
           
        <div class="card">
            <div class="card-body">
                <h4 class="h4" style="margin-top:15px;">Health & Wellness Focus</h4>
                <!-- <div style="width:20%;-align:left; height:3px;background-color:blue; margin-bottom:10px;"></div> -->
                <p class="card-text" style="font-size:17px;">We’re all about better living. Every product supports your journey toward a healthier, balanced lifestyle.</p>
            </div>
            <div class="circle-container">
                <img src="<?php echo base_url('/assets/images/our-services14.jpg') ?>" class="card-img-top" alt="...">
            </div>
    </div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        slidesPerView: 5,
        spaceBetween: 20,
        speed: 3000, // Adjust speed for smooth continuous motion
        autoplay: {
            delay: 0, // No delay between transitions
            disableOnInteraction: false,
        },
        freeMode: true, // Enable continuous, non-snapping scroll
        freeModeMomentum: false, // Prevent stop after drag
        grabCursor: true,
    });
</script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card");

    function checkCards() {
        const triggerBottom = window.innerHeight * 0.9;

        cards.forEach((card) => {
            const cardTop = card.getBoundingClientRect().top;

            if (cardTop < triggerBottom) {
                card.classList.add("show");
            }
        });
    }

    window.addEventListener("scroll", checkCards);
    checkCards(); // Run on page load in case some elements are already in view
});
</script>

</body>
</html>
