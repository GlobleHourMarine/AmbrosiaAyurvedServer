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
      background-color: #4a5f1a;
      height: 65vh;
      border-bottom-left-radius: 50% 20%;
      border-bottom-right-radius: 50% 20%;
      margin-top: -80px;
    }

    /* Login box */
    .login-box {
      background: #fff;
      max-width: 500px;
      margin: -230px auto 0;
      padding: 30px;
      border-radius: 8px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      margin-bottom: 10px !important;
      position: relative;
      z-index: 2;
      margin-bottom:10px !important;
    }

    .login-box h4 {
      color: #4a5f1a;
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

    /* Green circular button */
    .circle-btn {
      background: #8bb64d;
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
      background: #7aa33f;
    }

    .circle-btn:disabled {
      background: #cccccc;
      cursor: not-allowed;
    }

    #otpSection, #namesection {
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
     header,
    .navbar,
    .site-header {
      /* display: none !important; */
    }
    .offcanvas-backdrop.show {
    opacity: 0 !important;
    z-index:-99999 !important;
}
.aa-offcanvas.aa-offcanvas-end {
        transform: translateX(0%) !important;
}

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

   /* When shown */
   .aa-offcanvas.aa-offcanvas-end {
   transform: translateX(0%);
   }

   body{
      overflow:auto !important;
   }
  </style>
</head>

<body>

  <div class="background"></div>

  <div class="login-box">
    <h4>Welcome to Ambrosia Ayurved!</h4>
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
          <i class="fas fa-check"></i>
        </button>
      </div>

      <div id="otpMessage" class="status-message"></div>
    </form>

    <div style="margin-top:15px;">
      <a href="/" style="color:#8bb64d;font-weight:bold;text-decoration:none;">Back to Home</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    let sessionId = null;
    let isProcessing = false;

    // Helper function to show messages
    function showMessage(message, isError = false) {
      const messageEl = document.getElementById('otpMessage');
      messageEl.textContent = message;
      messageEl.className = isError ? 'status-message error-message' : 'status-message success-message';
    }

    // Helper function to toggle button state
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

    document.getElementById('sendOtpBtn').addEventListener('click', function() {
      if (isProcessing) return;
      
      const mobile = document.getElementById('loginMobile').value.trim();
      if (!/^[6-9]\d{9}$/.test(mobile)) {
        showMessage('❌Please enter a valid 10-digit number.', true);
        return;
      }

      isProcessing = true;
      toggleButtons(true);
      showMessage('Sending OTP...');

      fetch("<?= base_url('user/send_loginotp') ?>", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            "X-Requested-With": "XMLHttpRequest"
          },
          body: "phone=" + mobile
        })
        .then(res => {
          if (!res.ok) {
            throw new Error('Network response was not ok');
          }
          return res.json();
        })
        .then(data => {
          if (data.status === "success") {
            sessionId = data.session_id;
            showMessage(data.message || "✅ OTP sent successfully!");
            document.getElementById('otpSection').style.display = "block";
            document.getElementById('verifyOtpBtn').style.display = "inline-block";
            document.getElementById('sendOtpBtn').style.display = "none";
            
            if (data.is_new) {
              document.getElementById('namesection').style.display = "block";
            }
          } else {
            showMessage(data.message || "❌ Failed to send OTP", true);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          showMessage("❌ An error occurred. Please try again.", true);
        })
        .finally(() => {
          isProcessing = false;
          toggleButtons(false);
        });
    });

    document.getElementById('verifyOtpBtn').addEventListener('click', function() {
      if (isProcessing) return;
      
      const otp = document.getElementById('otpInput').value.trim();
      const mobile = document.getElementById('loginMobile').value.trim();
      const name = document.getElementById('name').value.trim();

      if (!/^\d{6}$/.test(otp)) {
        showMessage("❌ Please enter a valid 6-digit OTP", true);
        return;
      }

      isProcessing = true;
      document.getElementById('verifyOtpBtn').innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
      showMessage('Verifying OTP...');
      
      let formData = "otp=" + otp + "&session_id=" + sessionId + "&phone=" + mobile;
      
      // Only include name if name field is visible (new user)
      if (document.getElementById('namesection').style.display === "block") {
        formData += "&name=" + encodeURIComponent(name);
      }

      fetch("<?= base_url('user/verify_loginotp') ?>", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
            "X-Requested-With": "XMLHttpRequest"
          },
          body: formData
        })
        .then(res => {
          if (!res.ok) {
            throw new Error('Network response was not ok');
          }
          return res.json();
        })
        .then(data => {
          if (data.status === "success") {
            showMessage(data.message || "✅ Login successful! Redirecting...");
            window.location.href = "<?= base_url() ?>";
          } else {
            showMessage(data.message || "❌ OTP verification failed", true);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          showMessage("❌ An error occurred. Please try again.", true);
        })
        .finally(() => {
          isProcessing = false;
          document.getElementById('verifyOtpBtn').innerHTML = '<i class="fas fa-check"></i>';
        });
    });

    // Allow form submission on Enter key
    document.getElementById('loginMobile').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('sendOtpBtn').click();
      }
    });

    document.getElementById('otpInput').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('verifyOtpBtn').click();
      }
    });

    // Auto-focus OTP field when shown
    document.getElementById('otpSection').addEventListener('DOMNodeInserted', function() {
      document.getElementById('otpInput').focus();
    });
  </script>

</body>
</html>