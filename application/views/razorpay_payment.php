<button id="rzp-button1" style="display:none;">Pay with Razorpay</button>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
window.onload = function() {
    const yourOrderId = "<?= $order_id ?>"; // Passed from PHP

    fetch("<?= base_url('razorpay/create_order') ?>", {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'your_order_id=' + yourOrderId
    })
    .then(res => res.json())
    .then(data => {
        if (!data.amount || !data.order_id) {
            alert("Payment details are missing.");
            return;
        }

        const options = {
            "key": "rzp_test_J4DBKJFYTiyeCf", // Your Razorpay Key ID
            "amount": data.amount,
            "currency": "INR",
            "name": "Ambrosia Ayurved",
            "description": "Test Transaction",
            "order_id": data.order_id,
            "handler": function (response) {
                // Redirect to save_info with payment details as query parameters (optional)
                window.location.href = "<?= base_url('payment_processing') ?>?payment_id=" + response.razorpay_payment_id +
                                       "&order_id=" + response.razorpay_order_id +
                                       "&signature=" + response.razorpay_signature;
            },
            "theme": {
                "color": "#3399cc"
            },
            "modal": {
                "ondismiss": function () {
                    // Redirect user when they close the payment popup
                    window.location.href = "<?= base_url('user_information') ?>";
                }
            }
        };

        const rzp = new Razorpay(options);
        rzp.open();
    })
    .catch(error => {
        console.error("Error creating order:", error);
        alert("Payment failed to initialize.");
        window.location.href = "<?= base_url('user_information') ?>";
    });
};

</script>
