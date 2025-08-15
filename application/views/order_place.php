<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        :root {
            --primary-color: #007bff;
            --primary-hover: #0056b3;
            --success-color: #28a745;
            --border-color: #ddd;
            --text-color: #333;
            --light-bg: #f8f9f8;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color:rgb(234, 244, 234);
            padding: 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .thank-you {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .thank-you h1 {
            color: var(--success-color);
            font-size: clamp(28px, 4vw, 36px);
            margin-bottom: 10px;
        }
        
        .thank-you p {
            font-size: clamp(16px, 2vw, 18px);
            margin-bottom: 20px;
        }
        
        .thank-you img {
            width: clamp(70px, 15vw, 100px);
            height: auto;
            display: block;
            margin: 0 auto;
        }
        
        .order-details, .customer-info {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 25px;
        }
        
        h2 {
            color: var(--primary-color);
            font-size: clamp(20px, 3vw, 24px);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .order-info {
            list-style: none;
        }
        
        .order-info li {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            font-size: clamp(14px, 2vw, 16px);
        }
        
        .order-info li:last-child {
            border-bottom: none;
        }
        
        .order-info strong {
            font-weight: 600;
        }
        
        .customer-info {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        
        .customer-info > div {
            flex: 1;
            min-width: 250px;
        }
        
        .customer-info p {
            margin-bottom: 10px;
            font-size: clamp(14px, 2vw, 16px);
        }
        
        .print-wrapper {
            display: flex;
            justify-content: center;
            margin: 30px 0;
        }
        
        .print {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-size: clamp(14px, 2vw, 16px);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            min-width: 180px;
        }
        
        .print:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
    
        .print-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px;
}

.print {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

/* Optional: Style the anchor inside the second button */
.print a {
  text-decoration: none;
  color: inherit;
}

        
        @media print {
            body * {
                visibility: hidden;
            }
            #printSection, #printSection * {
                visibility: visible;
            }
            #printSection {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
           
        }
        
        @media (max-width: 768px) {
            .customer-info {
                flex-direction: column;
                gap: 20px;
            }
            
            .order-info li {
                flex-direction: column;
                gap: 5px;
            }
            
            .order-info li span {
                text-align: left;
            }
            .print-wrapper {
                display: flex;
                flex-direction:row;
                gap:20px;
            }
            .right-btn{
                display:block;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- This is the section that will be converted to PDF -->
        
            <div class="thank-you">
                <h1>Thank you</h1>
                <p>Your order has been received</p>
                <img src="<?php echo base_url('assets/images/check-mark.png') ?>" alt="Order Confirmed" width="100" height="100">
            </div>
            <div id="printSection">
            <div class="order-details">
                <h2>Order details</h2>
                <ul class="order-info">
                    <li><strong>Order number:</strong> <span>86</span></li>
                    <li><strong>Date:</strong> <span>May 6, 2017</span></li>
                    <li><strong>Payment method:</strong> <span>Credit card</span></li>
                    <li><strong>Quantity:</strong> <span>86</span></li>
                </ul>

                <ul class="order-info">
                    <li><strong>Subtotal:</strong> <span>$69.00</span></li>
                    <li><strong>Taxes:</strong> <span>$16.00</span></li>
                    <li><strong>Total:</strong> <span>$87.00</span></li>
                </ul>
            </div>

            <div class="customer-info">
                <div>
                    <h2>Customer</h2>
                    <p><strong>Name:</strong> ABC</p>

                    <p><strong>Email:</strong> Abc007@gmail.com</p>
                    <p><strong>Phone:</strong> 0724268676</p>
                    <p><strong>Credit card:</strong> Visa ×0987</p>
                </div>
                <div>
                    <h2>Billing address</h2>
                    <p>Andrei Dorin</p>
                    <p>Dorin si Asociatii SRLD</p>
                    <p>Str Furtunel, 28, Bucharest sector 6</p>
                    <p>0623415, Romania</p>
                </div>
            </div>
        </div>

        <div class="print-wrapper">
  <button class="print" onclick="downloadPDF()">Download as PDF</button>
  <button class="print right-btn"><a href="/">Back to home</a></button>
</div>

    </div>

    <script>
function downloadPDF() {
    // First clone the content to avoid affecting the original display
    const element = document.createElement('div');
    const originalContent = document.getElementById('printSection');
    element.innerHTML = originalContent.innerHTML;

    // Set PDF options
    const options = {
        margin: [0.5, 0.5, 0.5, 0.5], // top, right, bottom, left
        filename: 'Order-Summary-'+new Date().getTime()+'.pdf',
        image: { 
            type: 'jpeg', 
            quality: 0.98 
        },
        html2canvas: { 
            scale: 2,
            logging: true,
            useCORS: true,
            allowTaint: true,
            scrollX: 0,
            scrollY: 0,
            // windowWidth: document.documentElement.scrollWidth,
            // windowHeight: document.documentElement.scrollHeight
        },
        jsPDF: { 
            unit: 'mm', 
            format: 'a4', 
            orientation: 'portrait',
            compress: true
        },
        pagebreak: {
            mode: ['avoid-all', 'css', 'legacy']
        }
    };

    // Generate PDF
    html2pdf().set(options).from(element).save().then(() => {
        // Clean up cloned element
        element.remove();
    });
}
</script>
</body>
</html>