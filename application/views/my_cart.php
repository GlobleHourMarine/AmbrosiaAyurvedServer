<style>
    *{
        margin:0px;
        padding:0px;
    }
    .heading{
        text-align:center;
        margin-top:30px;
    }
    .cart-products{
        border:3px solid green;
        height:auto;
        width:65%;
        /* margin:auto; */
        border-radius:15px;
        padding: 7px 20px;
        /* max-width: 68%; */
        height:auto;
        
    }
    table{
        /* border:1px solid red; */
        height:auto;
        width:100%;
        margin:auto;
        padding:0px;

    }
    th{
        font-size:20px;
        border-bottom:2px solid green;
        padding:15px 0px;
        text-align:center;
    }
    .img{
        /* border:1px solid red; */
        width:50%;
        height:200px;
        margin:10px;
        object-fit:cover;
        border-radius:5px;
    }
    .cart{
        border: 2px solid black;
        height:auto;
        padding:30px;
        display:flex;
        justify-content:space-between;
    }
    .cart-discription{
        border:2px solid green;
        border-radius:10px;
        height:auto;
        width:33%;
        /* background:url('<?php echo "/assets/images/back-gradient.jpg "?>'); */
        background: url("<?php echo base_url('/assets/images/bg3.jpg'); ?>");
        background-repeat:no-repeat;
        background-size: cover;
        /* background-color:black; */
        position:relative;

    }
    .img {
    /* border: 1px solid red; */
    width: 95%;
    height: 200px;
    /* margin: 10px; */
    border-radius: 5px;
    overflow: hidden; /* Ensures content doesn't overflow the container */
    /* display: flex; */
    justify-content: center;
    align-items: center;
}
.smallscreen{
    display:none;
}

.img img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Adjust this to 'contain' if you want the entire image visible */
    border-radius: 5px; /* Match the container's border-radius */
}
.text{
    /* border:1px solid yellow; */
    padding:20px;
    width:70%;

}
.underline{
    width:25%;
    /* margin:auto; */
    border:1px solid green;
    margin-bottom:10px;
}
.amt{
    display:flex;
    /* margin:auto; */
    /* border:1px solid black; */
    width:20%;
    font-size:20px;
    height:auto;
}
.quantity-container {
    display: flex;
    align-items: center;
    gap: 5px;
    /* border:1px solid red; */
    padding:0px;
}

.quantity-btn {
    background-color: green;
    color: white;
    border: none;
    border-radius: 5px;
    width: 30px;
    height: 25px;
    font-size: 18px;
    cursor: pointer;
}

.quantity-btn:hover {
    background-color: darkgreen;
}

.quantity-input {
    width: 35px;
    text-align: center;
    /* border: 1px solid #ccc; */
    border-radius: 5px;
    height: 25px;
    border:none;
    background-color:green;
    color:white;
}
.remove-btn {
    background-color: red;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 3px 10px;
    font-size: 14px;
    cursor: pointer;
    margin-left: 10px; /* Add some spacing between the quantity buttons and the remove button */
}

.remove-btn:hover {
    background-color: darkred;
}
.quantity-no{
    background-color: green;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    font-size: 17x;
    cursor: pointer;
    margin-left: 10px; 

}
.quantity-no:hover {
    background-color: darkgreen;
}
.order-btn {
    background-color: green;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 7px 14px;
    font-size: 17px;
    cursor: pointer;
    margin-left: 10px; /* Add some spacing between the quantity buttons and the remove button */
    margin-top:10px;
    margin-bottom:10px;
   
   a{
    text-decoration:none;
    color:white;
    font-weight:bolder;
   }
}

.order-btn:hover {
    background-color: darkgreen;
}
.cover{
    position:absolute;
    height:100%;
    width: 100%;
    background-color:rgba(0, 0, 0, 0.7);
    /* border:1px solid red; */
    top:0;
    /* color:white; */
    z-index:1;

}
.textt {
    position: relative;
    z-index: 2; /* Text above the overlay */
    color: white; /* Ensure text is visible */
    padding: 20px; /* Add spacing inside the text container */
    margin: 0; /* Avoid any unnecessary margin */
    text-align: center; /* Center-align text if needed */
    font-size: 18px; /* Adjust text size */
}
.price-detail{
    /* border:1px solid white; */
    display:flex;
    justify-content:space-between;
}
.add-input{
    width: 100%;
    border:none;
    background-color:none;
}
.edited-address {
    width: 100%;
    border: none;
    background: transparent; /* Makes background transparent */
    outline: none; /* Removes the focus outline */
    color: white; /* Ensures text is visible on dark backgrounds */
    font-size: 16px;
    /* border-bottom:1px solid white; */
    width:100%;
    width: 100%;
    border: none;
    background: transparent; /* Makes background transparent */
    outline: none; /* Removes the focus outline */
    color: white; /* Ensures text is visible on dark backgrounds */
    font-size: 18px;
    border-top:2px solid white;
    /* border-top:none; */
    border-bottom:2px solid white;
    padding:10px;
    /* border:1px solid white; */
    margin-bottom:0px !important;
}
.cover {
    pointer-events: none; /* Allows clicking through */
}
.manage-address{
    /* border:1px solid white; */
    margin-top:0px !important;
}
textarea{
    width:100%;
    width: 100%;
    border: none;
    background: transparent; /* Makes background transparent */
    outline: none; /* Removes the focus outline */
    color: white; /* Ensures text is visible on dark backgrounds */
    font-size: 18px;
    border-top:2px solid white;
    /* border-top:none; */
    border-bottom:2px solid white;
    padding:10px;
    /* margin-bottom:0px; */
}
.submit-btn {
    background-color: orange;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 2px 6px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    width: 25%;
    display: block;
    text-align: center;
    /* border:1px solid white; */
    margin:auto;
    margin-top:20px;
    color:black;
}

.submit-btn:hover {
    background-color: darkorange;
    transform: scale(1.05);
    color:black;
}

/* .submit-btn:active {
    background-color: #004d00;
    transform: scale(0.98);
} */
 .alert{
    border:1px  solid white;
    padding:0px !important;
    /* background:none; */
    text-align:center;
 }


@media(max-width:576px){
    .cart{
        flex-direction:column;
        width:100%;
        height:auto;
        /* overflow-x: hidden; */
        /* border:2px  solid red; */
    }
    .cart-discription,.cart-products{
        width:100%;
    }
    .cart-productt{
        flex-direction:column;!important
        /* border:1px solid red!important; */
        width:100%;
        height:auto;
        display:flex;
    }
    .cart-image,.text{
        width:100% !important;
        /* border:2px solid yellow; */
    }
    .text{
        /* border:2px solid red !important; */
        text-align:center;
        margin:auto;
        width:100%;
        /* height:200px; */
        height:auto;
        padding:2px!important;

        p{
            width:100% !important;
        /* border:2px solid red !important; */

        }
    }
    .underline{
        margin:auto;

    }
    h6{
        margin-left:-120px !important;
        
    }

    .cart-discription{
        margin-top:30px;
        /* border:5px solid red !important; */
        height:auto;
        width:100%;
        border-radius:15px;

    }
    .quantity-container{
        /* border:1px solid blue; */
        flex-direction:column;
        text-align:center;
        width:100%;
        /* gap:0px; */
        h6{
            margin-left:0px !important;
        }
    }
    .header-row{
        display:none;
    }
    .bottom-line{
        border:1px solid green;
        width:30%;
    }
    .smallscreen{
        display:block;
    }

    .empty-cart{
    /* border:5px solid red; */
    width:100%;
    /* margin:auto; */
    height:670px !important;
    background-color:whitesmoke;
}

}


.empty-cart{
    /* border:2px solid red; */
    width:100%;
    /* margin:auto; */
    height:510px ;
    background-color:whitesmoke;
}


@keyframes glow {
    from {
        box-shadow: 0 0 10px rgba(144, 238, 144, 0.7);
    }
    to {
        box-shadow: 0 0 20px rgba(144, 238, 144, 1);
    }
}

</style>

    <!-- <h2 class="heading">My Cart</h2>
    <div class="underline" style="width:10%; margin:auto;"></div> -->
    <!-- <hr> -->
    <!-- <hr> -->
    <!--  -->





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
  
<?php if (!empty($cart_data)): ?>
<div class="container-fluid cart " >
    <div class="cart-products">
        <table>
            <tr class="header-row">
                <th>Product Image</th>
                <th>Description</th>
            </tr>
            <?php foreach ($cart_data as $cart): ?>  
                <tr class="cart-productt">
                    <td style="width:30%;" class="cart-image">
                        <h5 style="font-weight:bold;font-size:22px;text-align:center;margin-top:25px;" class="smallscreen">Product Image</h5>
                        <div class="underline smallscreen" style="width:50%;margin-bottom:0px;margin-top:10px;border-color:darkred;"></div>
                        <div class="img">
                            <img src="<?php echo base_url($cart->image) ?>" class="d-block w-100" alt="Product Image">
                        </div>
                    </td>
                    <td class="text">
                        <h4><?php echo $cart->product_name; ?></h4>
                        <div class="underline"></div>
                        <div class="amt">
                            Price: <i style="margin-top:4px; margin-left:10px;" class="fa-solid fa-indian-rupee-sign"></i>
                            <span><?php echo $cart->price; ?></span>
                        </div>
                        <p><?php echo $cart->discription; ?></p>
                        <div class="quantity-container">
                            <h6 class="quantity-no">Quantity: <?php echo $cart->quantity; ?></h6>
                            <form action="<?php echo base_url('delete_product_from_cart')?>" method="POST">
                                <input type="hidden" name="cartid" value="<?php echo $cart->cart_id; ?>">
                                <button class="remove-btn">Remove</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Billing Section -->
    <div class="cart-discription" style="height:auto;">
        <div class="cover"></div>
        <div class="textt">
            <h3>Bill Details</h3>
            <div class="underline" style="margin:auto;border-color:darkorange;"></div>

            <?php 
                $subtotal = 0; 
                $delivery_charges = 100;

                foreach ($cart_data as $cart):
                    $item_total = $cart->price * $cart->quantity;
                    $subtotal += $item_total;
            ?>
            <div class="price-detail">
                <div><?php echo $cart->product_name; ?></div>
                <div><?php echo $item_total; ?> Rs</div>
            </div>
            <?php endforeach; ?>

            <!-- <div class="price-detail">
                <div>Delivery Charges</div>
                <div><?php echo $delivery_charges; ?> Rs</div>
            </div> -->
            <hr>
            <div class="price-detail">
                <div>Grand Total</div>
                <div><?php echo $subtotal ; ?> Rs</div>
                <?php $this->session->set_userdata('subtotal', $subtotal);?>

            </div>
            <hr>

            <!-- Address Form -->
            <?php if ($this->session->flashdata('success')): ?>
    <div style="
        color: green;
        font-weight: bold;
        margin-bottom: 10px;
        background-color: #f0fff0;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(144, 238, 144, 0.7); /* Light green glow */
        animation: glow 1s ease-in-out infinite alternate;
    ">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php elseif ($this->session->flashdata('error')): ?>
    <div style="
        color: red;
        font-weight: bold;
        margin-bottom: 10px;
        background-color: #ffe6e6;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(255, 99, 71, 0.7); /* Red glow */
        animation: glow 1s ease-in-out infinite alternate;
    ">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

            <form action="<?php echo base_url('update_address') ?>" method="POST">
                <legend style="color:orange;font-size:20px;font-weight:bolder;">Enter Address :</legend>
                <textarea name="address" class="edited-address"><?php echo $cart->address; ?></textarea>
                <input type="submit" value="Submit" class="submit-btn">
            </form>

            <button class="order-btn">
                <a href="<?php echo base_url('payment'); ?>">Order Now</a>
            </button>
            <div class="order-history">
                <a href="order" style="text-decoration:none;color:whitesmoke;margin-top:30px;">Let's see order history...</a>
            </div>
        </div>
    </div>
</div>

<?php else: ?>




    
<!-- 🛒 EMPTY CART MESSAGE -->
<div style="text-align:center; " class="empty-cart">
    <img src="<?php echo base_url('/assets/images/cart_empty_1.png'); ?>" alt="Empty Cart" style="width:150px; height:auto;margin-top:80px;">
    <h2 style="color:#555; font-size:24px; margin-top:20px;">Your Cart is Empty</h2>
    <p style="color:#888; font-size:16px;">Looks like you haven't added anything to your cart yet.</p>
    <a href="<?php echo base_url('all_products'); ?>" style="
        background-color: green;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        display: inline-block;
        margin-top: 10px;
    ">🛒 Start Shopping</a>
</div>




<?php endif; ?>






<script>
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

     
