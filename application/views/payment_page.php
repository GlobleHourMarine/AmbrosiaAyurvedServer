<style>
  
        .payment-container{
        /* border:2px solid yellow;  */
        width:100%;
        height:140vh;
        position:relative;
        background:url('<?php echo "assets/images/back8.jpg"?> ');
        /* background: url('<?php echo base_url("assets/images/background-payment.png"); ?>');   */
        background: linear-gradient(to bottom, #d3a0ff, #b3f0d0);
        background: linear-gradient(to bottom, #d0aaff, #ffffff);
        background: url('<?php echo base_url("assets/images/payy5.jpg"); ?>');
        /* background: linear-gradient(to bottom, #e0b3ff, #a1c4fd); */
        background-size:cover;
        /* border:2px solid red; */
        background-repeat:no-repeat;
        background-position:top;
        /* border:2px solid red; */
        /* margin-top:-135px; */
        /* margin-top:15px;<!------------------------------------------------------------------------- */
        overflow:hidden;
    }

    .medium-container{
        position:absolute;
        height:480px;
        top:5%;
        /* top:15%; */
        width:90%;
        left:4%;
        z-index:2 ;
        display:flex;
        justify-content:space-between;
        border-radius:5px;
        /* border:2px solid red; */
    }
    .medium1{
        width:60%;
        padding:15px 20px;
    }
    .medium2{
        width:33%;
        padding:0px;
        border-left:1px solid #f5f5dc;

        color:white;
    }
    .text-container{
        height:auto;
        padding:12px;
        
    }
    .heading {
    color: darkred;
    text-align: center;
    font-weight: bolder;
    font-size: 32px; /* Adjust size if needed */
    background: linear-gradient(to bottom, rgb(255, 204, 77), rgb(209, 124, 12), rgb(241, 234, 234)); /* Light yellow → Orange → Soft White */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 2px 2px 4px rgba(250, 245, 245, 0.2); /* Soft shadow for depth */
}


    .underlinee{
        color:green;
        border:1px solid darkgreen;
        width:20%;
        margin:auto;
        margin-bottom:15px;
    }
    .pay-btn:hover {
    background-color: darkgreen;
}input{
    background:none;
    /* border-bottom:2px solid white; */
}
.information {
    background: none;
    border: none;
    border-bottom: 2px solid black; /* Adjust the color and thickness as needed */
    padding: 8px;
    outline: none; /* Optional: Removes the default outline when the input is focused */
}
.underline{
    border:1px solid darkgreen;
    width:35%;
    margin-left:30px;
    margin-bottom:20px;
}
.head{
    width:100%;
    font-size:17px;
    margin-top:10px;
    font-weight:bold;
}
.info{
    background:none;
    border:none;
    border-bottom:2px solid white;
    width:100%;
    margin:auto;
    display:block;
}
.expiry-data{
    width:30%;
    /* border:1px solid black; */
    height:auto;
    /* display:block; */
}
.payment{
    width:100%;
    margin:auto;
    /* border:1px solid white !important; */
    margin-top:30px;
    display:flex;

   
    justify-content:space-between;
}
.remove-btn {
    background-color:rgb(90, 216, 140);
    color: white;
    border: none;
    border-radius: 5px;
    padding: 3px 30px;
    font-size: 17px;
    cursor: pointer;
    margin-left:20%;
    /* margin-left: 10px; Add some spacing between the quantity buttons and the remove button */
    margin:auto !important;
    margin-bottom:10px !important;
    font-weight:bolder;
    /* width:100%; */
    /* margin-left:20px; */
}

.remove-btn:hover {
    background-color:rgb(75, 185, 119);
   
    /* border:1px solid black; */

}

.copy-btn {
    background-color:green;
    color: black;
    border: none;
    border-radius: 5px;
    padding: 3px 13px;
    font-size: 17px;
    cursor: pointer;
    /* margin-left: 10px; Add some spacing between the quantity buttons and the remove button */
    margin:auto !important;
    margin-bottom:10px !important;
    margin-left:25px !important;
    font-weight:600;
    color:#F5F5Dc;

    /* width:100%; */
}

.copy-btn:hover {
    background-color: darkgreen;
    /* background-color: ; */
    color:#F5F5Dc;
}
.expiry-information{
        width:100%;
        /* border:1px solid black; */
        display:flex;
        justify-content:space-between;
        margin-top:20px;
        height:auto;
        /* texxt-align:centerr; */
    }
    .phara{
        color:white;
        text-align:center;
        font-size:16px;
    }
    .image-containerr{
        /* border:1px solid yellow !important; */
        height:200px;
        margin:auto;
        width:68%;
        margin-top:-21px;
        margin-left:165px;
        img{
            width:100%;
            height:100%;
        }
    }
    i{
        color:darkorange;
    }
    .icon-container {
        display: flex;
        align-items: center;
        justify-content:space-between;
        /* margin-bottom: 15px; */
        /* border:1px solid white !important; */
        border:3px solid green !important;
        margin: 13px auto;
        width:50%;
        
    }

    .checkmark-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: darkgreen  !important;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;

    }

    .checkmark-circle i {
        color: white;
        font-size:35px;
    }

.upi-id{

    height:100px;
    /* display:flex; */
    padding:5px 13px 0px;
    width:60%;
    margin:auto;
    border:2px solid black;
}


.upload-screenshot{
    /* border:1px solid white !important; */

}
.choose-file{
    border:1px solid white !important;
    color:black !important;
    padding:5px  7px!important;
    font-size:17px !important;
    width:250px;
    background-color:rgb(90, 216, 140) !important; 

}


    @media(max-width:576px){
        .payment-container{
            height:1000px !important;
            width:100% !important;
            /* flex-direction:column;
            display:flex; */
            /* border:5px solid yellow;   */
            border:3px solid red !important;
            padding:0!important;
        }
        .medium-container{
            width:100%;
            height:auto;
            flex-direction:column;
            display:flex;
            border:3px solid blue !important;
            top:5%;
            padding:0!important;


        }
        .medium1,.medium2{
            width:100%;
            margin:auto;
            /* border:1px solid white; */
        margin-left:0px;
        }
        .medium2{
            width:90% !important;
            /* padding:10px !important; */
            margin:auto !important;
            overflow-x:hidden;
        }
        .expiry-data{
            width:100% !important;
        }
        .expiry-information{
            /* border:2px solid white!important; */
            flex-direction:column;
        }
        .cover{
            top:0;
            /* border:5px solid white;   */
            height:1700px !important;

        }
        .inn{
            margin-top:25px !important;
        /* border:1px  solid red; */
        }
        .image-containerr{
            width:100% !important;
            /* border:1px solid white; */
            margin:auto;
            height:auto;
            margin-left:10px;
            overflow-x:hidden;
            /* font-size:18px; */
        }
        .payment-method{
            color:white !important; 
            font-size:22px;
            margin-bottom:15px;
        }
        .payment-method2{
            color:white; font-size:15px;margin-bottom:15px;
        }
        .choose-file{
            /* border:3px solid white !important; */
            font-size:15px !important;
        }
        .medium1{
            /* border:1px solid white; */
            margin-top:-35px;

        }
        .payment{
            /* border:1px solid white !important; */
            width:100%;
        }
        .phara2{
            /* border:1px solid white; */
            margin-left:20px;
        }
        #paymentModal{
             width:100%;
            .modal-content{
                /* border:4px solid red !important; */
                width:80% !important;
                margin:auto  !important;
                top:25%;
                right:50%;
                margin-left:-95px !important;

            }

        }
         
        

    }


    /* Modal Background */
.modal {
    display: none; /* Hidden by default */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    /* border:1px solid red !important; */

   
}

/* Modal Content */
.modal-content {
    background-color:rgba(0, 0, 0, 0.2); ;
    /* background-color:rgba(255,255,255,0.3); */
    width: 30%;
    padding: 20px;
    position: fixed;
    left:35%;
    margin: 15% auto;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
     background: linear-gradient(to bottom, #d0aaff, #ffffff);
    
}

/* Close Button */
.close {
    color: red;
    float: right;
    font-size: 25px;
    font-weight: bold;
    cursor: pointer;
}

/* Hover effect */
.close:hover {
    color: darkred;
}
.order-history {
    width: 80%;
    /* border:1px solid red !important; */
    margin:auto !important;
    position:fixed;
    left:10%;
    height:500px;
    top:10%;
}
            /* <div class="scanner-container"> */
.scanner-container{
    /* border:1px  solid red; */
    height:130px;
    width:35%;
    margin:auto;

    img{
        width:100%;
        height:100%;
    }

}
.payment-heading{
    /* border:1px solid white; */
    text-align:center;

}
.upi_id{
    margin-left:5px;
}
#file-name{
        /* border:1px solid white !important;    */
        /* width:30%; */
        color:orange;
    }


.custom-file-upload {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 5px;
    }
    .paymnet-method{
        color:white;
         font-size:16px;
         margin-bottom:15px;
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload label {
        background-color: #f5f5dc;
        color: white;
        padding: 10px 15px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s ease-in-out;
    }

    .custom-file-upload label:hover {
        background-color: orangered;
    }

    #file-name {
        color: white;
        font-size: 16px;
    }


    .custom-file-upload {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 5px;
        padding: 8px 0px;
        border-radius: 10px;
        /* background-color: rgba(255, 255, 255, 0.1); */
        backdrop-filter: blur(5px);
        transition: 0.3s ease-in-out;
        
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload label {
        /* background-color: darkorange; */
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        font-size: 14px;
        transition: 0.3s ease-in-out;
        border: 2px solid transparent;
        /* border:2px solid red !important; */
        /* width:60%; */
    }

    .custom-file-upload label:hover {
        background-color: orangered;
        /* border:1px solid white; */
    }

    #file-name {
        color: white;
        font-size: 14px;
        border: 1px dashed rgba(255, 255, 255, 0.5);
        padding: 5px 10px;
        border-radius: 6px;
        min-width: 150px;
        text-align: center;
    }

    /* Border effect when file is chosen */
    .file-selected #file-name {
        border-color: darkorange;
    }


    .modall {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.modall-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    width: 30%;
    margin: 15% auto;
    text-align: center;
    box-shadow: 0px 0px 10px gray;
    /* display: none !important; */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}
.transaction-leble{
    font-size: 18px;
    font-weight:bolder;
}
.transaction-input{
    width: 100%;
    border:none;
    /* outline:1px solid blue; */
    margin-top:15px;
}
.transaction-input {
    width: 90%;
    padding: 7px;
    font-size: 16px;
    border: 2px solid #4CAF50; /* Green border */
    border-radius: 8px;
    outline: none;
    transition: 0.3s;
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
    display: block;
    margin: 10px auto;
    margin-bottom:0px !important;
}

.transaction-input:focus {
    border-color: #ff9800; /* Change border color on focus */
    box-shadow: 0px 4px 8px rgba(255, 152, 0, 0.5);
}

.transaction-input::placeholder {
    color: #aaa;
    font-style: italic;
}
#transaction-button{
    margin-top:0px !important;
    /* border:1px solid black; */
}
.pay-now-model{
    /* border:1px solid red; */
    width:35%;
    left:33%;
}
.input-amount{
    width:100%!important;
    /* border: 2px solid #4CAF50; */
    color:white;
    /* border-color: #ff9800; Change border color on focus */
    /* box-shadow: 0px 4px 8px rgba(255, 152, 0, 0.5); */
    /* border-radius:5px; */
    /* text-align:center !important; */
}
#screenshotMessage{

    color:darkred !important;
    font-size:14px !important;
    background-color:white;
    border-radius:5px;
    padding:0px !important;
    text-align:center;
    width:85%;
    /* margin:auto; */
    font-weight:bolder;

}
.payment-method{
    color:white !important;
    font-size:20px;
    margin-bottom:1px;
}
.medium-container {
    /* display: flex; */
    /* justify-content: space-between; */
    align-items: center;
    flex-wrap: wrap;
    overflow: hidden;
    /* border:2px solid green; */
}

.medium1, .medium2 {
    opacity: 0; /* Initially hidden */
    transform: translateX(-100px); /* Move left */
    transition: all 1s ease-in-out;
}

/* Medium1 slides in from the left */
.medium1 {
    animation: slideInLeft 1s ease-in-out forwards;
}

/* Medium2 slides in from the right */
.medium2 {
    transform: translateX(100px); /* Move right */
    animation: slideInRight 1s ease-in-out forwards;
    animation-delay: 0.3s; /* Slight delay for a staggered effect */
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}


.heading-payment{
    /* border:1px solid red; */
    color:black;
    text-align:center;

}


.payment-container{
        /* border:2px solid yellow;  */
        width:100%;
        height:550px;
        position:relative;
        background:url('<?php echo "assets/images/back8.jpg"?> ');
        background: url('<?php echo base_url("assets/images/background-payment.png"); ?>');  
        background: linear-gradient(to bottom, #d3a0ff, #b3f0d0);
        background: linear-gradient(to bottom, #d0aaff, #ffffff);
        background: url('<?php echo base_url("assets/images/Pay_now.webp"); ?>');
        /* background: linear-gradient(to bottom, #e0b3ff,rgb(55, 86, 138)); */
        background-size:cover;
        /* border:2px solid red; */
        background-repeat:no-repeat;
    }

    .payment-method{
        color:black !important;
    } 

    .pay{
        color:darkgreen !important;
    }
    .heading-scanner{
        color:darkblue !important;
        text-align:center;
    }
    .payment-option{
        color:darkblue;
        text-align:center;
        font-size:22px;
        font-weight:bold;

    }


</style>
<body>
    <div class="container-fluid payment-container">
         
     </div>
     <div class="cover container-fluid">
     
    </div>
    <form action="<?php echo base_url('payment_process')?>" method="POST" enctype="multipart/form-data">
        <div class="medium-container">
        <div class="medium2">
                <h5  class="heading-scanner " style="font-weight:bolder; color:darkblue;">Payment Details</h5>
                <div class="underline" style="margin:auto; margin-bottom:10px;border-color:darkgreen;"></div>
                <h6 style="text-align:center;color:rgb(29, 90, 54);">Scan Here</h6>
                <div class="scanner-container">
                    <img src="<?php echo base_url('assets/images/scanner.png') ?>" alt="">
                </div>
                <!-- <div class=""  style="border:3px solid green !important;width:100%;" > -->
                <div class="checkmark-circle" style="border:3px solid white !important; margin:auto;margin-top:12px;">
                            <i class="fas fa-check"></i>
                        </div>
                        <input type="hidden"name="amount" value=<?php echo $this->session->userdata('subtotal'); ?>>
                    <!-- <div class="icon-container " style="width:60%;border:2px solid green;">
                       
                        <div style="width:60%;">
                            <h6  class="heading-scanner" style="font-weight:bold;width:0% color:darkgreen;border:3px solid white !important; font-size:17px;">Payable Amount:</h6>
                        </div>  
                        <div class="amountt" style=" width:40%;border:3px solid white !important;padding:0px;">  
                            <div style="font-size:23px;font-weight:bold;color:orange;margin-bottom:4px; display:flex;width:auto;">
                            <div style="width:20%;"><i class="fa-solid fa-indian-rupee-sign"></i> </div> 
                                <div><input type="text"class="input-amount" style="border:none;" name="amount"value=<?php echo $this->session->userdata('subtotal'); ?>></div>
                            </div>
                        </div>  
                    </div> -->
                <!-- </div> -->
                <!-- <div class="upi-id"> -->
                    <div><p style="font-weight:bold;font-size:16px; color:black; text-align:center;margin-top:5px;margin-bottom:0px;">Proceed with UPI Id:</p></div>
                    <div><h6 id="upiText" style="color:darkblue;font-size:16px;text-align:center;margin-top:2px;">upiID@hdfcbank.in</h6></div>
                <!-- </div> -->
                <div style="width:40%;margin:auto;margin-top:10px;"> 
                     <button type="button" class="copy-btn" onclick="copyUPI()">Copy UPI</button>
                </div>
            </div>
            <div class="medium1" >
                    <div class="text-container">
                        <h4 class="heading-payment"style="color:black;">Go Furthur with cards</h4>
                        <div class="underlinee" style="color:black;"></div>
                        <p class="phara " style="widtdh:90%; color:black;">Complete your purchase securely by entering your Transaction Id details for using GPay,phone pay etc..</p>
                        <!-- <p class="phara phara2" style="width:90%;font-size:15px;color:black;">Our payment process is fast, easy, and encrypted to ensure your information remains safe. Your convenience and security are our top priorities.</p> -->
                        <p class="payment-option" >How Would You Like To Pay ?</p>
                    </div>
                    <div class="image-containerr">

                    <input type="radio" id="cod" name="payment_method" value="COD" onchange="showCashOnDeliveryModal()">
                    <label for="cod" class="payment-method" style="color:black; !important;"> Cash on Delivery (COD)</label><br>

                        <input type="radio" id="upi" name="payment_method" value="UPI">
                        <label for="upi" class="payment-method payment-method2" style="color:black;!important;">Pay with UPI (Google Pay, PhonePe, Paytm)</label><br>

                        <label for="screenshot"  class="heading" style="color:white; font-size:20px; color:darkorange; margin-top:15px; font-weight:bolder; padding:0px;"><i  style="margin-right:7px;" class="fa-solid fa-file-circle-plus"></i>Upload Screenshot :</label><br>
                        <p id="screenshotMessage" style=" display: none; margin-top:0px; margin-bottom:0px;background-color:none;">->You must upload a screenshot of your payment</p>

                        <div class="custom-file-upload upload-screenshot">
    <input type="file" id="screenshot" name="screenshot" style="border:1px solid darkorange;" accept="image/*">
    <label class="choose-file" for="screenshot">📷 Choose File</label>
    <span id="file-name" style="color:black;border-color:black;">No file chosen</span>
    
    <p id="screenshotMessage" style="color: darkorange; display: none;">You must upload a screenshot of your payment</p> 
    <div style="width:50%;margin-top:3px; margin-left:0px;">
        <!-- Your button here -->
    </div>
</div>


                        <!-- <button type="button" id="payNowButton" class="remove-btn">Pay Now</button> -->
                        <button type="button" id="payNowButton" onclick="goToThankYou()" style="color:black;font-weight:bold;margin-top:30px;"class="remove-btn">Pay Now</button>
                    </div>
                
            </div>
            
            

        </div>
    </form>  
    <div id="paymentModal" class="modal">
    <div class="modal-content pay-now-model">
        <span class="close" onclick="closeUPIModal()">&times;</span>
        <h2>Payment Confirmation</h2>
        <p>Are you sure you want to proceed with the online payment?</p>
        <label for="transaction_id" class="transaction-leble">Enter Transaction ID:</label>
        <input type="text" id="transaction_id" class="transaction-input" placeholder="Enter your Transaction ID" required>
        <br>
        <button id="confirmPayment" class="remove-btn">Confirm</button>
        <button id="cancelPayment" class="remove-btn" onclick="closeUPIModal()">Cancel</button>
    </div>
    </div>
    </div>
    <div id="cash_on_delivery_modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Payment Confirmation</h2>
            <p>Are you sure you want to pay the amount after delivery?</p>
            <button id="confirmPayment" class="remove-btn" onclick="confirmPayment()">Sure</button>
        </div>
</div>
<div id="copy_upiModal" class="modall">
    <div class="modal-content">
        <h4>Upi id copied successfully!</h4>
        <p style="font-size:18px;" id="copiedUPI"></p>
        <button id="cancel_copy_model" class="remove-btn">Ok</button>
    </div>
</div>

    <div id="orderHistoryModal" class="modal">
        <div class="modal-content order-history">
            <span class="close close-history">&times;</span>
            <h2>Your Order History</h2>
            <iframe id="orderHistoryFrame" src="" width="100%" height="400px" style="border:none;"></iframe>
        </div>
    </div>






<script> 

// ----------------------------------------------------------------------------------------------------

document.getElementById("payNowButton").addEventListener("click", function (event) {
    event.preventDefault(); // Prevents the form from submitting immediately

    let selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');

    if (!selectedPaymentMethod) {
        alert("Please select a payment method.");
        return;
    }

    if (selectedPaymentMethod.value === "UPI") {
        let screenshotUploaded = document.getElementById("screenshot").files.length > 0;
        if (!screenshotUploaded) {
            document.getElementById("screenshotMessage").style.display = "block";
            return;
        } else {
            document.getElementById("screenshotMessage").style.display = "none";
        }

        // Show UPI payment confirmation modal
        document.getElementById("paymentModal").style.display = "block";
    } else if (selectedPaymentMethod.value === "COD") {
        // Show cash on delivery confirmation modal
        document.getElementById("cash_on_delivery_modal").style.display = "block";
    }
});

// Handle UPI Payment Confirmation
document.getElementById("confirmPayment").addEventListener("click", function () {
    let transactionId = document.getElementById("transaction_id").value.trim();

    if (!transactionId) {
        alert("Please enter the Transaction ID.");
        return;
    }

    // Add transaction ID to form and submit
    let form = document.querySelector("form");
    let transactionField = document.createElement("input");
    transactionField.setAttribute("type", "hidden");
    transactionField.setAttribute("name", "transaction_id");
    transactionField.setAttribute("value", transactionId);
    form.appendChild(transactionField);

    form.submit(); // Now submit after confirmation
});

document.getElementById("payNowButton").addEventListener("click", function () {
    let formData = new FormData(document.querySelector("form"));

    let selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
    
    fetch("<?= base_url('payment_process') ?>", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) // Expect JSON response
    .then(data => {
        if (data.status === "success") {
            // Only show Order History for Cash on Delivery (COD)
            if (selectedPaymentMethod === "COD") {
                document.getElementById("orderHistoryModal").style.display = "block";
                document.getElementById("orderHistoryFrame").src = "<?= base_url('order_popup') ?>";
            } else {
                alert("Payment successful!"); // For UPI, just show success message
            }
        } else {
            alert("Payment failed! Try again.");
        }
    })
    .catch(error => console.error("Error:", error));
});
// -------------------------------------------------------------------------------------------

function copyUPI() {
    const upiText = document.getElementById("upiText").innerText;
    navigator.clipboard.writeText(upiText).then(() => {
        document.getElementById("copiedUPI").innerText = upiText;
        document.getElementById("copy_upiModal").style.display = "block";
    }).catch(err => {
        console.error("Failed to copy: ", err);
    });
}

// Ensure the button click event is assigned correctly
document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".copy-btn").addEventListener("click", copyUPI);
});

// Close modal when clicking "OK" button
document.getElementById("cancel_copy_model").addEventListener("click", function () {
    document.getElementById("copy_upiModal").style.display = "none";
});

// Ensure window click also closes the modal
window.onclick = function(event) {
    const modal = document.getElementById("copy_upiModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
};


    
  

    var payNowButton = document.getElementById("payNowButton");
    var confirmButton = document.getElementById("confirmPayment");
    var screenshotInput = document.getElementById("screenshot");
    var screenshotMessage = document.getElementById("screenshotMessage");
    var transactionInput = document.getElementById("transaction_id"); // Get the transaction ID input field

    payNowButton.addEventListener("click", function () {
        var screenshotUploaded = screenshotInput.files.length > 0;

        if (!screenshotUploaded) {
            screenshotMessage.style.display = "block";
        } else {
            screenshotMessage.style.display = "none";
            document.getElementById("paymentModal").style.display = "block";
        }
    });

    confirmButton.addEventListener("click", function () {
        var screenshotUploaded = screenshotInput.files.length > 0;
        var transactionId = transactionInput.value.trim(); // Get the entered transaction ID

        if (!transactionId) {
            alert("Please enter the Transaction ID.");
            return;
        }

    if (screenshotUploaded) {
        document.querySelector('input[name="payment_method"][value="UPI"]').checked = true;

        var form = document.querySelector("form");
        var transactionField = document.createElement("input");
        transactionField.setAttribute("type", "hidden");
        transactionField.setAttribute("name", "transaction_id");
        transactionField.setAttribute("value", transactionId);
        form.appendChild(transactionField);

        // Submit the form
        form.submit();
    } else {
        screenshotMessage.style.display = "block";
    }
    });





    function closeUPIModal() {
        document.getElementById("paymentModal").style.display = "none";
    }

    var closePayment = document.querySelector("#paymentModal .close");

    var closeHistory = document.querySelector(".close-history");

    var orderHistoryFrame = document.getElementById("orderHistoryFrame");

    payButton.onclick = function () {
        paymentModal.style.display = "block";
    };

    closePayment.onclick = function () {
        paymentModal.style.display = "none";
    };

    cancelButton.onclick = function () {
        paymentModal.style.display = "none";
    };

 
    closeHistory.onclick = function () {
        orderHistoryModal.style.display = "none";
    };

    // Function to disable scrolling
    function disableScroll() {
        document.body.style.overflow = 'hidden';
    }

    // Function to enable scrolling
    function enableScroll() {
        document.body.style.overflow = 'auto';
    }

    // Show payment confirmation modal
    payButton.onclick = function () {
        paymentModal.style.display = "block";
        disableScroll(); // Disable scrolling
    };

    // Close payment modal
    closePayment.onclick = function () {
        paymentModal.style.display = "none";
        enableScroll(); // Enable scrolling
    };

    cancelButton.onclick = function () {
        paymentModal.style.display = "none";
        enableScroll(); // Enable scrolling
    };

    confirmButton.onclick = function () {
        paymentModal.style.display = "none"; 
        orderHistoryFrame.src = "<?php echo base_url('order_popup'); ?>"; 
        orderHistoryModal.style.display = "block"; 
        disableScroll(); // Disable scrolling
    };

    closeHistory.onclick = function () {
        orderHistoryModal.style.display = "none";
        enableScroll(); // Enable scrolling
    };

    window.onclick = function (event) {
        if (event.target == paymentModal) {
            paymentModal.style.display = "none";
            enableScroll(); // Enable scrolling
        }
        if (event.target == orderHistoryModal) {
            orderHistoryModal.style.display = "none";
            enableScroll(); // Enable scrolling
        }
    };
    document.getElementById("screenshot").addEventListener("change", function() {
        let fileName = this.files.length > 0 ? this.files[0].name : "No file chosen";
        document.getElementById("file-name").textContent = fileName;

        if (this.files.length > 0) {
            document.querySelector(".custom-file-upload").classList.add("file-selected");
        } else {
            document.querySelector(".custom-file-upload").classList.remove("file-selected");
        }
    });


    document.addEventListener("DOMContentLoaded", function () {
    function copyUPI() {
        const upiText = document.getElementById("upiText").innerText;
        navigator.clipboard.writeText(upiText).then(() => {
            document.getElementById("copiedUPI").innerText = upiText;
            document.getElementById("copy_upiModal").style.display = "block";
        }).catch(err => {
            console.error("Failed to copy: ", err);
        });
    }

    // Close modal when clicking "OK" button
    document.getElementById("cancel_copy_model").addEventListener("click", function () {
        document.getElementById("copy_upiModal").style.display = "none";
    });

    // Attach function to copy button click
    document.querySelector(".copy-btn").addEventListener("click", copyUPI);
    });

    document.getElementById("cancelPayment").addEventListener("click", function() {
        document.getElementById("copy_upiModal").style.display = "none";
    });


    document.getElementById("cancelPayment").addEventListener("click", function() {
        document.getElementById("copy_upiModal").style.display = "none";
    });

    document.querySelector(".close").addEventListener("click", function() {
        document.getElementById("copy_upiModal").style.display = "none";
    });

    window.onclick = function(event) {
        const modal = document.getElementById("copy_upiModal");
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

    function showPaymentModal() {
        var modal = document.getElementById('paymentModal');
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById('paymentModal');
        modal.style.display = "none";
    }

    function showCashOnDeliveryModal() {
        document.getElementById("cash_on_delivery_modal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("cash_on_delivery_modal").style.display = "none";
    }

    function confirmPayment() {
        document.getElementById("cod").checked = true;
        document.querySelector("form").submit();
    }



    document.getElementById("screenshot").addEventListener("change", function() {
        let fileName = this.files.length > 0 ? this.files[0].name : "No file chosen";
        document.getElementById("file-name").textContent = fileName;
    });
    
</script>

<script>
// File name display functionality
document.getElementById("screenshot").addEventListener("change", function() {
    const fileNameSpan = document.getElementById("file-name");
    const uploadSection = document.querySelector(".custom-file-upload");
    
    if (this.files.length > 0) {
        // Display the file name
        fileNameSpan.textContent = this.files[0].name;
        
        // Add selected class for styling
        uploadSection.classList.add("file-selected");
    } else {
        // Reset if no file selected
        fileNameSpan.textContent = 'No file chosen';
        uploadSection.classList.remove("file-selected");
    }
});
</script>
