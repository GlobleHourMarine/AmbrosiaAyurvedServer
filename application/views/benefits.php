<style>
    .benefits-hero-container {
      width:100%;
      position:relative;
      height:500px;
      padding:0px;
    }
    .benefits-hero-image {
        width:100%;
        height:500px;
        object-fit: cover; 
        border:2px solid red;
    } 
    .benefits-hero-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); 
        text-align: center;
        color: white;
        font-weight: bolder;
        z-index: 2;
    }
    .benefits-hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }
    
    .benefits-intro-section {
        width:100%;
        height:auto;
        margin:100px 0;
    }
    
    .benefits-intro-heading {
        text-align:center;
    }
    
    .benefits-intro-description {
        text-align:center;  
        width:60%;
        margin:auto;
    }
    
    .benefits-cards-background {
        padding:5px;
        width:100%;
        height:1005px;
        position:relative;
        margin-top:60px;
        background: url('<?php echo base_url('/assets/images/back3.jpg'); ?>') no-repeat center center;
        background-size: cover;
    }
    
    .benefits-cards-overlay {
        position: absolute;
        margin-top:60px;
        top: 35%;
        left: 0;
        width: 100%;
        height:1002px;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 1;
    }

    .benefits-cards-row1 {
        padding:5px;
        width:80%;
        height:auto;
        display:flex;
        justify-content:space-between;
        position:absolute;
        z-index:2;
        left:10%;   
        top:37%;
    }
    
    .benefits-cards-row2 {
        padding:5px;
        width:80%;
        height:auto;
        display:flex;
        justify-content:space-between;
        position:absolute;
        z-index:2;
        left:10%;   
        top:58%;
    }

    .benefits-single-card {
        position: relative;
        padding-top: 90px; 
        margin-top:120px;
        height:370px;
        width:256px;
        width:27%;
    }

    .benefits-card-body {
        text-align: center;
        padding-top: 10px;
    }

    .benefits-card-icon-container {
        width: 180px;
        height: 180px;
        border: 2px solid  rgba(105, 115, 255, 0.8);
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        z-index: 1;
        bottom: 75%;
        left: 18%;
        box-shadow: 0 0 25px 10px rgba(105, 115, 255, 0.8);
    }

    .benefits-card-icon-container:hover {
        box-shadow: 0 0 55px 20px rgba(105, 115, 255, 0.8);
    }
    
    .benefits-card-heading {
        margin-top:15px;
    }
    
    .benefits-card-divider {
        width:70%;
        margin:auto; 
        height:3px;
        background-color:blue; 
        margin-bottom:10px;
    }
    
    .benefits-card-text {
        font-size:17px;
    }

    @media(max-width: 576px){
        .benefits-hero-container,
        .benefits-hero-image,
        .benefits-hero-overlay {
            height:300px;
            width:100%;
        }
        
        .benefits-hero-text h1 {
            font-size:21px!important;
        }
        
        .benefits-intro-section {
            margin-top:30px !important;
            margin-bottom:-30px !important;
        }
        
        .benefits-intro-description {
            width:90% !important;
            text-align:center;
            font-size:25px!important;
        }
        
        .benefits-cards-background {
            height:3000px;
            position:relative;
            width:100%;
            background: url('<?php echo base_url('/assets/images/back3.jpg');?>');
            background-size: cover;
            background-repeat: repeat !important;
        }
        
        .benefits-cards-overlay {
            position:absolute;
            z-index:1;
            height:3000px !important;
            top:12%;
            bottom:0;
            background-color: rgba(0, 0, 0, 0.6);
            width:100%;
        }
        
        .benefits-cards-row2 {
            z-index:3;
            position:absolute;
            height:1470px !important;
            top:45%;
            bottom:0;
            flex-direction:column !important;
            overflow-x:hidden;
        }
        
        .benefits-single-card {
            width:100% !important;
        }
        
        .benefits-cards-row1 {
            z-index:3;
            position:absolute;
            height:1470px !important;
            top:13%;
            bottom:0;
            flex-direction:column !important;
            width:80%;
            overflow-x:hidden;
        }
        
        .benefits-single-card {
            width:100% !important;
        }
        
        .benefits-hero-text {
            width:90%;
        }
    }
</style>

<div class="benefits-main-wrapper">
    <div class="benefits-hero-container">
        <img class="benefits-hero-image" src="<?php echo base_url('/assets/images/imagee1.png ') ?>" class="d-block w-100" alt="...">
        <div class="benefits-hero-overlay"></div>
        <div class="benefits-hero-text">
            <h1 class="benefits-hero-heading">Your Trusted Destination for Quality and Convenience</h1>
        </div>
    </div>  
    
    <div class="benefits-intro-section">
        <h2 class="benefits-intro-heading">Why Choose us ?</h2>
        <h5 class="benefits-intro-description">A5 by Ambrosia Ayurved is a 100% natural Ayurvedic solution that eliminates sugar completely by addressing its root cause. Made from pure herbs and free from chemicals, it ensures a safe, side-effect-free healing process. Beyond blood sugar control, A5 supports digestion, metabolism, heart health, and overall well-being. Scientifically formulated and trusted by experts, it blends traditional Ayurvedic wisdom with modern research, offering a natural, long-term alternative for diabetes management and a healthier, medicine-free life.</h5>
    </div>
    
    <div class="benefits-cards-background"></div>
    <div class="benefits-cards-overlay"></div>
    
    <div class="benefits-cards-row1">
        <div class="benefits-single-card">
            <div class="benefits-card-icon-container">
                <img src="<?php echo base_url('/assets/images/our-services1.jpg') ?>" class="card-img-top" alt="...">
            </div>
            <div class="benefits-card-body">
                <h4 class="benefits-card-heading">High-Quality Products</h4>
                <div class="benefits-card-divider"></div>
                <p class="benefits-card-text">Quality checks to ensure it meets the highest standards. When you shop with us, you can be confident you're getting premium products that deliver on their promises.</p>
            </div>
        </div>
        
        <div class="benefits-single-card">
            <div class="benefits-card-icon-container">
                 <img src="<?php echo base_url('/assets/images/our-services12.jpg') ?>" class="card-img-top" alt="..." style="height:100%;"> 
            </div>
            <div class="benefits-card-body">
                <h4 class="benefits-card-heading">Fast and Reliable Delivery</h4>
                <div class="benefits-card-divider"></div>
                <p class="benefits-card-text">We know that receiving your order promptly is important, which is why we've streamlined our shipping process t</p>
            </div>
        </div>
        
        <div class="benefits-single-card">
            <div class="benefits-card-icon-container">
                <img src="<?php echo base_url('/assets/images/our-services10.jpg') ?>" class="card-img-top" alt="...">
            </div>
            <div class="benefits-card-body">
                <h4 class="benefits-card-heading">Affordable Pricing</h4>
                <div class="benefits-card-divider"></div>
                <p class="benefits-card-text">We believe that everyone deserves access to high-quality products at prices that won't break the bank.</p>
            </div>
        </div>
    </div>
    
    <div class="benefits-cards-row2">
        <div class="benefits-single-card">
            <div class="benefits-card-icon-container">
                <img src="<?php echo base_url('/assets/images/our-services3.jpg') ?>" class="card-img-top" alt="...">
            </div>
            <div class="benefits-card-body">
                <h4 class="benefits-card-heading">Affordable Pricing</h4>
                <div class="benefits-card-divider"></div>
                <p class="benefits-card-text">uality checks to ensure it meets the highest standards. When you shop with us, you can be confident you're getting premium products that deliver on their promises.</p>
            </div>
        </div>
        
        <div class="benefits-single-card">
            <div class="benefits-card-icon-container">
                 <img src="<?php echo base_url('/assets/images/our-services14.jpg') ?>" class="card-img-top" alt="..." style="height:100%;"> 
            </div>
            <div class="benefits-card-body">
                <h4 class="benefits-card-heading">Health & Wellness Focus</h4>
                <div class="benefits-card-divider"></div>
                <p class="benefits-card-text">We use natural ingredients known for their gentle and effective care, ensuring each item, from A5 Medic</p>
            </div>
        </div>
        
        <div class="benefits-single-card">
            <div class="benefits-card-icon-container">
                <img src="<?php echo base_url('/assets/images/watch.jpg') ?>" class="card-img-top" alt="..." style="width:100%; height:100%;">
            </div>
            <div class="benefits-card-body">
                <h5 class="benefits-card-heading">Saves Time and Reduce Hassle</h5>
                <div class="benefits-card-divider"></div>
                <p class="benefits-card-text">We know that receiving your order promptly is important, which is why we've streamlined our shipping process to</p>
            </div>
        </div>
    </div>
</div>