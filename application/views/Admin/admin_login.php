
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/Jh6Rv1L7qV0yZK1RczC2DLmMqJ10bN4j8k1tbLm5kpM5y+zv8E7KjURo/jnrfmC1aWNTl8zjw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(to bottom, #e0f7fa, #ffffff);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .login-container {
    width: 90%;
    max-width: 380px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    padding: 40px 30px;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
}

        .login-container h2 {
            text-align: center;
            color: #000;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .login-container p {
            text-align: center;
            font-size: 14px;
            color: #333;
            margin-bottom: 30px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 40px 12px 40px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.25);
            font-size: 16px;
            color: #333;
            outline: none;
        }

        .input-group input::placeholder {
            color: #777;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #555;
        }

        .forgot-pass {
            text-align: right;
            margin-bottom: 20px;
            font-size: 14px;
            color: #007BFF;
            cursor: pointer;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #111111, #333333);
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .or-divider {
            text-align: center;
            margin: 20px 0;
            color: #aaa;
            position: relative;
        }

        .or-divider::before,
        .or-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: #ccc;
        }

        .or-divider::before {
            left: 0;
        }

        .or-divider::after {
            right: 0;
        }

        .social-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
        }

        .social-btn {
            width: 48px;
            height: 48px;
            background: #fff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .flash-message {
            text-align: center;
            margin-bottom: 20px;
            color: #e53935;
            font-weight: bold;
        }


        .btn {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-weight: 600;
    font-size: 16px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn:hover {
    background: linear-gradient(135deg, #5a67d8, #6b46c1);
    box-shadow: 0 6px 16px rgba(102, 126, 234, 0.4);
    transform: translateY(-2px);
}


.input-group {
    position: relative;
    margin-bottom: 20px;
}

.input-group i {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    font-size: 16px;
    color: #666;
    /* color:black; */
}

.input-group input {
    width: 100%;
    padding: 12px 12px 12px 45px; /* Space for icon */
    border: none;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.25);
    font-size: 16px;
    color: #333;
    outline: none;
}



    /* Responsive styles */
    @media (max-width: 768px) {
        .login-container {
            width: 90%;
            padding: 30px 20px;
        }

        .btn {
            font-size: 15px;
        }

        .input-group input {
            padding: 10px 10px 10px 40px;
        }

        .input-group i {
            font-size: 14px;
            left: 12px;
        }
    }

    @media (max-width: 586px) {
        .login-container h2 {
            font-size: 20px;
        }

        .login-container{
        /* border:2px solid red !important; */
            width:90% !important;
            height:260px !important;

    }

        .login-container p {
            font-size: 13px;
        }
        .login-container{
            /* border:2px solid red !important; */
        }

        .btn {
            font-size: 14px;
            padding: 10px;
        }

        .social-buttons {
            flex-direction: row;
            gap: 10px;
        }

        .social-btn {
            width: 40px;
            height: 40px;
        }

        .input-group input {
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .login-container {
            width: 95%;
            padding: 25px 15px;

        }

        .login-container h2 {
            font-size: 18px;
        }

        .btn {
            font-size: 13px;
        }

        .input-group i {
            font-size: 13px;
            left: 10px;
        }

        .input-group input {
            padding: 10px 10px 10px 38px;
        }
    }


    .login-container{
        /* border:2px solid red !important; */
    }


    .toggle-icon {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 16px;
    color: #555;
    user-select: none;
}

    </style>
    <!-- Font Awesome for icons -->
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->

</head>
<body>
    <div class="login-container">
        <h2>Sign in with email</h2>
        <!-- <p>Make a new doc to bring your words, data,<br>and teams together. For free</p> -->

        <?php if($this->session->flashdata('error')): ?>
            <div class="flash-message">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo base_url('admin_login_action'); ?>" method="POST" target="_blank">
            <div class="input-group">
                <!-- <i class="fas fa-envelope"></i> -->
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

           <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password" id="password-field" required>
                <span class="toggle-icon" onclick="togglePassword()">👁️</span>
            </div>


            <button type="submit" class="btn">sign In</button>

           
        </form>
    </div>
    <script>
    function togglePassword() {
        const passwordField = document.getElementById("password-field");
        const toggleIcon = document.querySelector(".toggle-icon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.textContent = "❌👁️"; 
        } else {
            passwordField.type = "password";
            toggleIcon.textContent = "👁️";
        }
    }
</script>

</body>
</html>
