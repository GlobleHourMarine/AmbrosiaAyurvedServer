<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login / Register | Ambrosia Ayurved Account </title>
  <meta name="description" content="Log in to your Ambrosia Ayurved account or register for new access. Manage your profile, orders, and enjoy a personalized shopping experience.">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
  body,
  html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    font-family: 'Open Sans', sans-serif;
  }

  /* Hide top header/navbar */
  header,
  .navbar,
  .site-header {
    display: none !important;
  }

  .error-message {
    color: red;
    font-size: 13px;
    margin-top: 3px;
  }

  .form-control.error {
    border: 1px solid red !important;
  }

  /* Remove top margin so form is at the top */
  body,
  .main-container {
    margin-top: 0 !important;
    padding-top: 0 !important;
  }


  .main-container {
    min-height: 80%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 20px;
    background: url(<?php echo base_url('/assets/images/loginn_now.webp') ?>) no-repeat center center;
    background-size: cover;
    height: 100%;
    overflow: hidden;
  }

  .form-container {
    border-radius: 15px;
    padding: 10px;
    width: 30% !important;
    position: absolute;
    top: 13%;
    right: 18%;
    opacity: 0;
    animation: fadeSlideUp 0.8s ease-out forwards;
    background-color: transparent;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-top: 10px;
  }

  #loginPage .hide-on-login {
    display: none !important;
  }

  .website-link a {
    position: absolute;
    bottom: 8%;
    left: 40%;
    z-index: 9999;
    text-decoration: none;
    font-weight: 600;
    font-size: 18px;
    color: rgb(100, 200, 180);

  }

  .website-link a:hover {
    color: #0D6EFD;
    font-weight: 600;
  }

  @keyframes fadeSlideUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .button-div {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
    gap: 45px;
  }

  .custom-btn {
    background: none;
    border: none;
    font-weight: bold;
    font-size: 23px;
    color: #666;
    position: relative;
    padding: 5px 10px;
    cursor: pointer;
    text-decoration: none !important;
  }

  .custom-btn a {
    text-decoration: none;
  }

  .custom-btn a:hover {
    color: darkblue;
  }

  .custom-btn.active {
    color: #000;
  }

  .custom-btn.active::after {
    content: '';
    position: absolute;
    left: 10px;
    bottom: 0;
    width: calc(100% - 20px);
    height: 3px;
    background-color: rgb(112, 214, 195);
    text-decoration: none;
  }

  .form_div {
    margin-bottom: 10px;
    position: relative;
  }

  .form_div label {
    display: block;
    margin-bottom: 2px;
    font-weight: bold;
    color: #333;
  }

  .input-group {
    position: relative;
  }

  .container {
    position: relative;
  }

  .block-overlap {
    position: absolute;
    top: -50px;
    /* jitna upar lana ho */
    left: 0;
    /* ya center/right as needed */
    z-index: 2;
  }

  .block-behind {
    position: relative;
    z-index: 1;
  }

  #loginPage .offcanvas-backdrop {
    pointer-events: none !important;
    opacity: 0 !important
  }

  .form_div input {
    width: 100%;
    padding: 5px 20px 5px 7px !important;
    border: 1px solid #ddd;
    /* border-radius: 10px; */
    font-size: 14px;
    transition: all 0.3s;
    background-color: rgba(255, 255, 255, 0.8);
  }

  .form_div input:focus {
    outline: none;
    border-color: rgb(112, 214, 195);
    box-shadow: 0 0 0 2px rgba(112, 214, 195, 0.2);
  }

  .input-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    cursor: pointer;
  }

  .register-btn {
    width: 60%;
    padding: 5px;
    background-color: rgb(112, 214, 195);
    color: black;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    font-size: 16px;
    margin-top: 7px;
    transition: all 0.3s;
    margin-left: 60px !important;
  }

  .register-btn:hover {
    background-color: #81d9c9;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .login-link {
    text-align: center;
    margin-top: 5px;
    color: #666;
  }

  .login-link a {
    color: rgb(112, 214, 195);
    font-weight: bold;
    text-decoration: none;
  }

  .login-link a:hover {
    text-decoration: underline;
  }

  .text-danger {
    color: #dc3545 !important;
    font-size: 14px;
    margin-top: 1px;
    margin-bottom: -5px !important;
    display: block;
  }

  /* Mobile Responsive Styles */
  @media (max-width: 768px) {
    .form-container {
      width: 90% !important;
      position: static;
      margin: 20px auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.85);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .button-div {
      gap: 30px;
      margin-bottom: 20px;
    }

    .custom-btn {
      font-size: 18px;
    }

    .form_div input {
      padding: 10px 40px 10px 15px !important;
      font-size: 16px;
    }

    .input-icon {
      right: 15px;
    }

    .register-btn {
      width: 100%;
      margin-left: 0 !important;
      padding: 10px;
      font-size: 16px;
    }

    .login-link {
      font-size: 14px;
    }
  }

  @media (max-width: 576px) {
    .form-container {
      width: 95% !important;
      padding: 15px;
    }

    .button-div {
      gap: 20px;
    }

    .custom-btn {
      font-size: 16px;
    }

    .form_div label {
      font-size: 14px;
    }

    .form_div input {
      padding: 8px 35px 8px 12px !important;
      font-size: 14px;
    }

    .register-btn {
      font-size: 15px;
      padding: 8px;
    }

    .form-container {
      background-color: rgba(255, 255, 255, 0.4);
      /* padding-top:55px !important; */
      /* border:2px solid red; */
      background-color: white;
      height: auto !important;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);

      /* border:2px solid red; */

    }

    .website-link a {
      /* border:1px  solid red; */
      bottom: 0px !important;
      left: 0%;
    }

    .main-container {
      height: 760px !important;
      background-color: white !important;
      /* border:2px solid red; */

    }
  }


  /* Logo Container Styles */
  .logo-container {
    position: absolute;
    top: 40px;
    left: 20px;
    /* z-index: 10000 !important; */
    width: 80px;
    height: 60px;
    transition: all 0.3s ease;
    /* border:2px solid red !important; */
  }

  .logo-container:hover {
    transform: scale(1.05);
  }

  .logo-img {
    width: 100%;
    height: 100%;
    /* max-width: 100%; */
    border-radius: 8px;
  }

  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .logo-container {
      width: 60px;
      top: 15px;
      right: 15px;
    }

    .form-container {
      background-color: rgba(255, 255, 255, 0.4);
      /* padding-top:55px !important; */
      /* border:2px solid red; */
      background-color: white;
      height: auto !important;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .website-link a {
      /* border:1px  solid red; */
      bottom: 3% !important;
      left: 10%;
    }

    .main-container {
      height: 760px !important;
      background-color: white !important;
      /* border:2px solid red; */

    }

    .main-container {
      /* border:2px  solid red; */
      background: none;
      background-color: white !important;
    }
  }

  @media (max-width: 576px) {
    .logo-container {
      width: 100px;
      top: 40px;
      right: 40px;
    }
  }

  .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
  }

  .col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
    padding-right: 15px;
    padding-left: 15px;
    position: relative;
    width: 100%;
  }

  @media (max-width: 768px) {
    .col-md-6 {
      flex: 0 0 100%;
      max-width: 100%;
    }

    .main-container {
      height: 760px !important;
      background-color: white !important;

    }

  }

  .alert,
  .alert-warning {
    padding: 10px 15px;
    margin-bottom: 20px;
    /* background-color: #f8d7da; */
    color: #842029;
    /* border: 1px solid #f5c2c7; */
    border-radius: 5px;
    text-align: center;
    font-size: 16px;
    animation: fadeIn 0.5s ease-in-out;
    font-weight: bold;
  }

  .link-home {
    /* border:2px solid red; */
    color: white !important;
    background-color: green;
    padding: 5px 8px;
    border-radius: 5px;
    background-color: rgb(13, 143, 117);

  }

  .link-home:hover {
    color: white !important;
    padding: 6px 9px;
    background-color: rgb(21, 121, 101);

  }

  body {
    background-color: #e6edf1;
    height: 100%;
    margin: 0;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
  }

  .form-box {
    width: 100%;
    max-width: 800px;
    min-width: 350px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    display: flex;
    overflow: hidden;
    border: 1px solid #ddd;
  }


  .form-left {
    width: 40%;
    background: url('https://www.shutterstock.com/image-illustration/redhaired-happy-cute-romantic-writer-600nw-1964816383.jpg') center center no-repeat;
    background-size: cover;
    position: relative;
  }

  .form-left::after {
    content: "#Collection 2018";
    position: absolute;
    bottom: 10px;
    left: 10px;
    color: white;
    font-weight: 600;
    font-size: 14px;
    text-shadow: 1px 1px 3px black;
  }

  .form-right {
    padding: 25px 20px;
    width: 391px;
    margin-left: 432px;
    background-color: white;
    box-shadow: 2px 10px 20px gray
  }

  .form-title {
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 20px;
    color: blue;
  }

  .form-control {
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0;
    padding-left: 0;
    margin-bottom: 15px;
    font-size: 14px;
    box-shadow: none !important;
  }

  .form-control:focus {
    border-bottom: 1px solid #000;
    box-shadow: none;
  }

  .btn-dark {
    padding: 8px 20px;
    border-radius: 4px;
    font-size: 14px;
  }

  .btn-light {
    padding: 8px 20px;
    border-radius: 4px;
    font-size: 14px;
    background-color: #28a745;
    /* Bootstrap green */
    color: #fff;
    /* Make text white for contrast */
    border: none;
    /* Optional: remove border */
  }

  @media (max-width: 768px) {
    .form-box {
      flex-direction: column;
      max-width: 90%;
    }

    .form-left {
      width: 100%;
      height: 200px;
    }

    .form-right {
      width: 100%;
      margin-top: -161 px;
      margin-left: -3px;
      overflow-y: hidden;
    }
  }
</style>
<style>
  @media (max-width: 575.98px) {

    /* Small devices (phones) */
    .ml-sm-custom {
      margin-left: 25px;
    }
  }

  @media (min-width: 576px) and (max-width: 767.98px) {

    /* Medium devices (tablets) */
    .ml-md-custom {
      margin-left: 30px;
    }
  }

  @media (min-width: 768px) and (max-width: 991.98px) {

    /* Large tablets/small laptops */
    .ml-lg-custom {
      margin-left: 80px;
    }
  }

  @media (min-width: 992px) {

    /* Desktops (lg and above) */
    .ml-xl-custom {
      margin-left: 200px;
    }
  }

  @media (min-width: 992px) {

    /* Large devices and up */
    .mt-lg-40 {
      margin-top: 40px;
    }
  }
</style>
</head>

<body id="loginPage">
  <div class="main-container">
    <div class="form-right">
      <div class="form-title" style="text-align: center; text-decoration:underline; color:green;">REGISTRATION FORM</div>
      <form action="<?= base_url('register') ?>" method="post" id="registerForm">
        <!-- Full Name -->
        <input type="text" class="form-control mt-2" name="full_name" placeholder="Full Name" required />

        <!-- Mobile + OTP -->
        <div id="mobileInputError" class="error-message"></div>
        <div class="row" id="formSection" style="display:flex; align-items:center; margin-left: -7px">
          <div class="col-6 ps-2">
            <input type="text" class="form-control" name="mobile" id="mobileInput" maxlength="10" placeholder="Enter Mobile Number" required />
          </div>
          <div class="col-6 pe-2" id="otpCol" style="display: none;">
            <input type="text" class="form-control" id="otpInput" maxlength="6" placeholder="Enter OTP" />
            <div id="otpInputError" class="error-message"></div>
          </div>
        </div>

        <!-- Verify OTP Button -->
        <button type="button" class="btn btn-success w-100 mt-2" id="verifyOtpBtn" style="display: none;">Verify OTP</button>

        <input type="hidden" id="otpSessionId" name="otp_session_id" />

        <button type="submit" class="btn btn-dark w-100 mt-2" id="registerBtn">Register →</button>

        <div class="text-center mt-3">
          <h6>Already Have an Account?
            <a href="<?= base_url('loginpage') ?>" class="fw-bold text-success text-decoration-none btn btn-link">Login Now</a>
          </h6>
        </div>
      </form>

      <div style="text-align: center;">
        <div onclick="window.location.href='/'"
          onmouseover="this.style.backgroundColor='#059669'"
          onmouseout="this.style.backgroundColor='#34D399'"
          style="display: inline-block; text-align:center; margin-top: 12px; padding: 4px 10px; background-color: #34D399; color: white; border-radius: 6px; cursor: pointer; font-weight: 600; font-size: 14px;">
          Back to Home
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    let otpSessionId = "";
    let otpAlreadySent = false;

    const mobileInput = document.getElementById('mobileInput');
    const otpCol = document.getElementById('otpCol');
    const verifyOtpBtn = document.getElementById('verifyOtpBtn');
    const otpInput = document.getElementById('otpInput');
    const otpSessionField = document.getElementById('otpSessionId');


    const showError = (id, message) => {
      const el = document.getElementById(id);
      el.classList.add("error");
      document.getElementById(id + "Error").innerText = message;
    };

    const clearError = (id) => {
      const el = document.getElementById(id);
      el.classList.remove("error");
      document.getElementById(id + "Error").innerText = "";
    };

    mobileInput.addEventListener('input', () => {
      const mobileValue = mobileInput.value.trim();

      if (/^[6-9]\d{9}$/.test(mobileValue)) {
        clearError("mobileInput");
        otpCol.style.display = 'block';
        verifyOtpBtn.style.display = 'block';

        if (!otpAlreadySent) {
          otpAlreadySent = true;

          // Auto-send OTP
          $.post("<?= base_url('user/send_otp') ?>", {
            phone: mobileValue
          }, function(res) {
            if (res.status === "success") {
              otpSessionId = res.session_id;
              otpSessionField.value = otpSessionId;
              alert(res.message);
            } else {
              alert(res.message);
            }
          }, "json");
        }
      } else {
        showError("mobileInput", "Please enter a valid 10-digit mobile number.");
        otpCol.style.display = 'none';
        verifyOtpBtn.style.display = 'none';
        otpAlreadySent = false;
      }
    });

    // OTP Verify Button
    $("#verifyOtpBtn").click(function() {
      const otp = otpInput.value.trim();
      const session_id = otpSessionField.value;

      clearError("otpInput");

      if (!otp) {
        showError("otpInput", "Please enter the OTP.");
        return;
      }

      $(this).text("Verifying...").prop("disabled", true);

      $.post("<?= base_url('user/verify_otp') ?>", {
        otp,
        session_id
      }, function(res) {
        if (res.status === "success") {
          alert("✅ OTP Verified!");
          $("#mobileInput").prop("readonly", true).addClass("verified");
          $("#verifyOtpBtn").hide();
          $("#otpInput").hide();
          clearError("otpInput");
        } else {
          showError("otpInput", res.message);
        }

        $("#verifyOtpBtn").text("Verify OTP").prop("disabled", false);
      }, "json");
    });
  </script>
</body>

</html>