<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Delete Your Ambrosia Ayurveda Account</title>
  <style>
    body{
        background-color:rgb(238, 238, 238);
    }
  
    h1 {
      color: #2a7f62;
      font-size: 24px;
      margin-bottom: 10px;
    }
    .div {
      /* background-color: #fff; */
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 10px;
     
      /* box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); */
    }
    p {
      margin: 10px 0;
    }
    ul {
      padding-left: 20px;
    }
    ul li {
      margin-bottom: 8px;
    }
    b {
      font-weight: bold;
    }
    .section {
      max-width: 400px;
      margin: auto;
      background-color: #f8f8f8;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    form {
      display: flex;
      flex-direction: column;
    }
    label {
      margin-bottom: 5px;
      font-weight: bold;
    }
    input[type="email"],
    input[type="password"] {
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #2a7f62;
      border-radius: 5px;
      font-size: 16px;
    }
    button {
      padding: 12px;
      background-color: #2a7f62;
      color: white;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #256e56;
    }
    @media (max-width: 600px) {
      body {
        padding: 10px;
      }
      h1 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
<div style="width:50%;margin:auto;">
  <div class="div">
    <h1>Delete Your Ambrosia Ayurveda Account</h1>
    <p>
      If you no longer wish to use your Ambrosia Ayurveda account, you can easily delete it here.<br>
      We believe in giving our users full control overtheir data. Just follow the steps below.
    </p>
  </div>

  <div class="div">
    <h1>How to Delete Your Account</h1>
    <ul>
      <li>Enter your registered email ID and password in the form below.</li>
      <li>Click on the <b>"Delete My Account"</b> button.</li>
      <li>If your credentials are correct, your deletion request will be submitted.</li>
    </ul>
    <p><b>That’s it — no calls, no long forms. Quick and easy.</b></p>
  </div>

  <div class="div">
    <h1>🕒 What Happens After That?</h1>
    <ul>
      <li><b>Once we receive your request:</b></li>
      <li>Your account and all personal data will be permanently deleted within 24 hours.</li>
      <li>You can no longer access any saved data, and the action cannot be undone.</li>
    </ul>
  </div>

  <div class="div">
    <h1>🗑️ What We Delete</h1>
    <ul>
      <li>Your name, email, and phone number</li>
      <li>Delivery addresses</li>
      <li>Order history</li>
      <li>Any health or consultation records (if applicable)</li>
    </ul>
  </div>

  <div class="div">
    <h1>❓Need Help?</h1>
    <p>Email us at <b>yogesh4java44@gmail.com</b><br>
    We’re here to assist you anytime.</p>
  </div>

  <div class="div">
    <h1>🛡️ Your Privacy Matters</h1>
    <p>
      Deleting your account is permanent. You won’t be able to recover any data once deleted, so ensure you’re ready before confirming.
    </p>
  </div>
  <div class="section">
  <h3 style="color: #256e56;text-align:center;margin-bottom:8px;">Delete Your Account</h3>
  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

  <form id='deleteuseraccount' action="<?php echo base_url('DeleteUserAccount')?>" method="POST">
    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" required />

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required />

    <button type="submit">Delete My Account</button>
  </form>
  <!-- <script>
    $('#deleteuseraccount').on('submit', function(e){
      e.preventDefault();
      var email = $('#email').val();
      var password = $('#password').val();
      
      $.ajax({
        url: '<?= base_url('account/delete_account')?>',
        type: 'POST',
        data: { email: email, password: password },
        success: function(response) {
          if(response == 'Success'){
            alert('Your account has been deleted successfully.');
            window.location.href = '<?= base_url('account/logout')?>';
          } else {
            alert('Invalid email or password.');
          }
        }
      });
      
      return false; // to prevent form from submitting normally and reloading the page
    })
  </script> -->
</div>
  </div>
</div>
</body>
</html>
