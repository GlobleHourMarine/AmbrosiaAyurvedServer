<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Ambrosia Ayurved Account</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      margin: 0;
      font-family: 'Open Sans', sans-serif;
      background-color: #f9f9f9;
    }

    /* Curved background */
    .background {
      background: linear-gradient(10deg, green, yellow);
      height: 65vh;
      border-bottom-left-radius: 50% 20%;
      border-bottom-right-radius: 50% 20%;
      margin-top: -80px;
      animation: slideDown 0.8s ease-out;
    }

    /* Login box */
    .login-box {
      background: #fff;
      max-width: 400px;
      margin: -200px auto 0;
      padding: 30px;
      border-radius: 8px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      margin-bottom: 10px !important;
      position: relative;
      z-index: 2;
      animation: fadeSlideUp 0.7s ease-out;
    }

    .login-box h5 {
      color: darkgreen;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .login-box p {
      color: #555;
      font-size: 14px;
      margin-bottom: 20px;
    }

    /* Input with icon */
    .input-group-custom {
      display: flex;
      align-items: center;
      border: 1px solid #c5c5c5;
      border-radius: 5px;
      margin-bottom: 15px;
      padding: 10px;
      animation: fadeSlideUp 0.6s ease-out;
      animation-fill-mode: both;
    }

    .input-group-custom img {
      width: 20px;
      margin-right: 10px;
    }

    .input-group-custom input {
      border: none;
      outline: none;
      flex: 1;
      font-size: 14px;
      background: transparent;
    }

      .circle-btn {
  color: #fff;
  border: none;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  font-size: 18px;
  cursor: pointer;
  transition: 0.3s;
  display: inline-flex;
  align-items: center;
  justify-content: center;

}

.circle-btn:hover {
  animation: pulse 0.4s ease-in-out;
}
@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.1); }
  100% { transform: scale(1); }
}

.circle-btn:disabled {
  background: #cccccc;
  cursor: not-allowed;
}
.circle-btn i {
  animation: bounceIcon 1.5s infinite;
}

@keyframes bounceIcon {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-5px);
  }
  60% {
    transform: translateY(-3px);
  }
}



    #otpSection,
    #namesection {
      display: none;
    }

    .alert {
      font-size: 14px;
      padding: 8px;
      margin-bottom: 10px;
    }

    .btn-container {
      margin-top: 20px;
    }

    .status-message {
      font-size: 14px;
      margin-top: 10px;
      min-height: 20px;
    }

    .success-message {
      color: #28a745;
    }

    .error-message {
      color: #dc3545;
    }

    /* Offcanvas adjustments */
    .aa-offcanvas {
      transform: translateX(100%);
      transition: transform 0.6s ease-in-out;
      position: fixed;
      top: 0;
      right: 0;
      width: 300px;
      height: 100%;
      background-color: white;
      z-index: 1050;
    }

    .aa-offcanvas.aa-offcanvas-end {
      transform: translateX(0%) !important;
    }

    body {
      overflow: auto !important;
    }

    .modal-backdrop.show {
      opacity: 0 !important;
      z-index: -99999 !important;
    }

    .offcanvas-backdrop.show {
      opacity: 0;
      z-index: -9999 !important;
    }

    @media(max-width:768px) {
      .background {
        height: 35vh !important;
      }
    }

    /* Animations */
    @keyframes fadeSlideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }

      50% {
        transform: scale(1.05);
      }

      100% {
        transform: scale(1);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    @keyframes slideDown {
      from {
        transform: translateY(-100px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>

<body>

  <div class="background"></div>

  <div class="login-box">
    <h5>Welcome to Ambrosia Ayurved!</h5>
    <p>Enter your mobile number and we will send you an OTP for verification.</p>

    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message')): ?>
      <div class="alert alert-danger"><?php echo $this->session->flashdata('message'); ?></div>
    <?php endif; ?>

    <form id="otpLoginForm" method="post">
      <div class="input-group-custom">
        <img src="https://cdn-icons-png.flaticon.com/512/597/597177.png" alt="Phone">
        <input type="tel" name="mobile" id="loginMobile" placeholder="Enter 10-digit mobile number" maxlength="10" required />
      </div>

      <div id="otpSection">
        <div class="input-group-custom">
          <img src="https://cdn-icons-png.flaticon.com/512/2910/2910768.png" alt="OTP">
          <input type="tel" name="otp" id="otpInput" placeholder="Enter 6-digit OTP" maxlength="6" required />
        </div>
      </div>

      <div id="namesection">
        <div class="input-group-custom">
          <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Name">
          <input type="text" name="name" id="name" placeholder="Enter your full name" required />
        </div>
      </div>

      <div class="btn-container">
        <button type="button" class="circle-btn" id="sendOtpBtn">
          <i class="fas fa-arrow-right"></i>
        </button>
        <button type="button" class="circle-btn" id="verifyOtpBtn" style="display:none;">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>

      <div id="otpMessage" class="status-message"></div>
    </form>

    <div style="margin-top:5px;">
      <a href="/" style="color:#8bb64d;font-weight:bold;text-decoration:none;">Back to Home</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    let sessionId = null;
    let isProcessing = false;

    function showMessage(message, isError = false) {
      const messageEl = document.getElementById('otpMessage');
      messageEl.textContent = message;
      messageEl.className = isError ? 'status-message error-message' : 'status-message success-message';
    }

    function toggleButtons(sending = false) {
      const sendBtn = document.getElementById('sendOtpBtn');
      const verifyBtn = document.getElementById('verifyOtpBtn');

      if (sending) {
        sendBtn.disabled = true;
        sendBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
      } else {
        sendBtn.disabled = false;
        sendBtn.innerHTML = '<i class="fas fa-arrow-right"></i>';
      }
    }

    document.getElementById('sendOtpBtn').addEventListener('click', function () {
      if (isProcessing) return;

      const mobile = document.getElementById('loginMobile').value.trim();
      if (!/^[6-9]\d{9}$/.test(mobile)) {
        showMessage('❌Please enter a valid 10-digit number.', true);
        return;
      }

      isProcessing = true;
      toggleButtons(true);
      showMessage('Sending OTP...');

      fetch("<?= base_url('user/send_temp_loginotp') ?>", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
          "X-Requested-With": "XMLHttpRequest"
        },
        body: "phone=" + mobile
      })
        .then(res => res.json())
        .then(data => {
          if (data.status === "success") {
            sessionId = data.session_id;
            showMessage(data.message || "✅ OTP sent successfully!");

            const otpSection = document.getElementById('otpSection');
            otpSection.style.display = "block";
            otpSection.style.animation = "fadeIn 0.5s ease-in-out";

            document.getElementById('verifyOtpBtn').style.display = "inline-block";
            document.getElementById('sendOtpBtn').style.display = "none";

            if (data.is_new) {
              const nameSection = document.getElementById('namesection');
              nameSection.style.display = "block";
              nameSection.style.animation = "fadeIn 0.5s ease-in-out";
            }
          } else {
            showMessage(data.message || "❌ Failed to send OTP", true);
          }
        })
        .catch(() => {
          showMessage("❌ An error occurred. Please try again.", true);
        })
        .finally(() => {
          isProcessing = false;
          toggleButtons(false);
        });
    });

    document.getElementById('verifyOtpBtn').addEventListener('click', function () {
      if (isProcessing) return;

      const otp = document.getElementById('otpInput').value.trim();
      const mobile = document.getElementById('loginMobile').value.trim();
      const name = document.getElementById('name').value.trim();

      if (!/^\d{6}$/.test(otp)) {
        showMessage("❌ Please enter a valid 6-digit OTP", true);
        return;
      }

      isProcessing = true;
      document.getElementById('verifyOtpBtn').innerHTML = '<i class="fas fa-check"></i>';
      showMessage('Verifying OTP...');

      let formData = "otp=" + otp + "&session_id=" + sessionId + "&phone=" + mobile;

      if (document.getElementById('namesection').style.display === "block") {
        formData += "&name=" + encodeURIComponent(name);
      }

      fetch("<?= base_url('user/verify_temp_loginotp') ?>", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
          "X-Requested-With": "XMLHttpRequest"
        },
        body: formData
      })
        .then(res => res.json())
        .then(data => {
          if (data.status === "success") {
            showMessage(data.message || "✅ Login successful! Redirecting...");
            window.location.href = "<?= base_url() ?>";
          } else {
            showMessage(data.message || "❌ OTP verification failed", true);
          }
        })
        .catch(() => {
          showMessage("❌ An error occurred. Please try again.", true);
        })
        .finally(() => {
          isProcessing = false;
          document.getElementById('verifyOtpBtn').innerHTML = '<i class="fas fa-arrow-right"></i>';
        });
    });

    document.getElementById('loginMobile').addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('sendOtpBtn').click();
      }
    });

    document.getElementById('otpInput').addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('verifyOtpBtn').click();
      }
    });
    const btn = document.querySelector(".circle-btn");

// Colors to rotate
const colors = [
  "#8BC34A",
  "#FFC107",
  "#FF5722", 
  "#E91E63",
  "#3F51B5" 
];

let index = 0;

// Initial color
btn.style.backgroundColor = colors[index];

setInterval(() => {
  index = (index + 1) % colors.length;
  btn.style.backgroundColor = colors[index];
}, 5000);
  </script>

</body>
</html>
