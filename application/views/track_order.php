<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order Tracking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #74ebd5, #acb6e5);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .tracking-container {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.2);
      max-width: 800px;
      width: 100%;
    }
    .order-header h4 {
      font-weight: 700;
      margin-bottom: 15px;
      color: #4e54c8;
    }
    .badge-custom {
      font-size: 14px;
      padding: 5px 10px;
      border-radius: 20px;
    }
    .progress-container {
      position: relative;
      margin-top: 40px;
    }
    .progress-bar-line {
      position: absolute;
      top: 28px;
      left: 50px;
      right: 50px;
      height: 6px;
      background: #e0e0e0;
      z-index: 1;
      border-radius: 5px;
      overflow: hidden;
    }
    .progress-bar-line .fill {
      height: 6px;
      background: linear-gradient(90deg, #4e54c8, #8f94fb);
      width: 0%;
      transition: width 1s ease;
    }
    .step {
      position: relative;
      z-index: 2;
      text-align: center;
      width: 25%;
      float: left;
    }
    .circle {
      width: 55px;
      height: 55px;
      background: #e0e0e0;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      transition: all 0.4s ease;
    }
    .step.completed .circle {
      background: #4e54c8;
      color: white;
      box-shadow: 0 0 15px rgba(78,84,200,0.6);
    }
    .label {
      margin-top: 12px;
      font-size: 14px;
      color: #333;
    }
    @media(max-width: 600px){
      .progress-bar-line { top: 50px; left: 25px; right: 25px; }
      .step { width: 25%; }
      .circle { width: 45px; height: 45px; font-size: 18px; }
    }
  </style>
</head>
<body>

<div class="tracking-container">
  <div class="order-header text-center">
    <h4>Ambrosia Ayurved</h4>
    <div>Order ID: <strong style="color:#4e54c8;">#ZMJ82D9</strong></div>
    <div class="mt-2">
      <span class="badge bg-primary badge-custom">Expected Arrival: 01/05/2024</span>
      <span class="badge bg-danger badge-custom">Tracking ID: 23458839</span>
    </div>
  </div>

  <div class="progress-container clearfix mt-5">
    <div class="progress-bar-line">
      <div class="fill"></div>
    </div>

    <div class="step" data-step="1">
      <div class="circle"><i class="fas fa-check"></i></div>
      <div class="label">Order Confirmed</div>
    </div>
    <div class="step" data-step="2">
      <div class="circle"><i class="fas fa-box"></i></div>
      <div class="label">Order Shipped</div>
    </div>
    <div class="step" data-step="3">
      <div class="circle"><i class="fas fa-truck"></i></div>
      <div class="label">Out for Delivery</div>
    </div>
    <div class="step" data-step="4">
      <div class="circle"><i class="fas fa-home"></i></div>
      <div class="label">Order Delivered</div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let steps = {
  "Order Confirmed": 1,
  "Order Shipped": 2,
  "Out for Delivery": 3,
  "Order Delivered": 4
};

function updateTrackingStatus(currentStatus){
  let completedStep = steps[currentStatus] || 1;
  document.querySelectorAll(".step").forEach(step => {
    let stepNum = parseInt(step.getAttribute("data-step"));
    step.classList.toggle("completed", stepNum <= completedStep);
  });
  let fillPercent = ((completedStep-1) / 3) * 100;
  document.querySelector(".fill").style.width = fillPercent + "%";
}

// initial load from PHP
let currentStatus = "<?= $data->current_status ?>";
updateTrackingStatus(currentStatus);
</script>

</body>
</html>
