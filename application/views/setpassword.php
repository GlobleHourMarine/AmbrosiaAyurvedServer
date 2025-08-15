<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        
        .main-container {
            background: url(<?php echo base_url('/assets/images/FP2.webp')?>) no-repeat center center fixed;
            background-size: cover;
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: relative;
        }
        
        /* Optional overlay for better readability */
        .main-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            z-index: 0;
        }

        .form-container {
            position: relative;
            background: #f8f8f8;
            height: auto;
            width: 35%;
            padding: 20px;
            border-radius: 8px;
            margin-right: 80px;
            z-index: 1;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-buttons {
            position: absolute;
            width: 50%;
            top: 300px; 
            left: 70px; 
            padding: 20px; 
        }
        
        .form-buttons button {
            width: 50%;
            padding: 6px;
            margin: 8px 0px;
            border: none;
            background-color: rgb(89, 29, 141);
            border-radius: 15px;
            text-align: center;
            cursor: default;
        }
        
        .form-buttons button:hover {
            background-color: rgb(92, 3, 170);
        }
        
        .form-buttons button a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: 700;
        }
        
        .form_div {
            width: 80%;
            margin: auto;
        }
        
        .form_div input {
            border-radius: 15px;
            background-color: transparent;
            border: 1px solid #ccc;
            color: black;
        }
        
        .form_div input::placeholder {
            color: #666;
        }
        
        .form_div input:focus {
            background-color: transparent;
            outline: none;
            color: black;
        }
        
        .login-btn {
            background-color: rgb(112, 214, 195);
            color: white;
            font-size: 18px;
            width: 40%;
            border: none;
            padding: 5px;
            border-radius: 15px;
            margin: 0px 60px;
            font-weight: bold;
        }
        
        .login-btn:hover {
            background-color: rgb(83, 187, 168);
        }
        
        h2 {
            text-align: center;
            color: rgb(39, 94, 83);
        }
        
        .form_div label {
            font-size: 18px;
            font-weight: bold;
            color: black;
        }
        
        .remember {
            color: white;
        }
        
        /* Password toggle eye icon */
        .toggle-password {
            position: absolute;
            top: 70%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: black;
            z-index: 100;
        }

        @media (max-width: 768px) {
            .main-container {
                justify-content: center;
                background-attachment: scroll;
                background:none;
            }
            
            .form-container {
                width: 90% !important;
                margin: 20px auto !important;
                /* border:2px  solid red; */
                top:-55px !important;
            }
            
            .login-btn {
                width: 50%;
                margin-left: 32px;
            }
            
            .form-buttons {
                margin: 400px 0px !important;
                width: 100% !important;
            }
        }

           @media (max-width: 576px) {
            .main_container {
                justify-content: center;
                padding: 20px;
                background-attachment: scroll;
                background: none !important;
                 background-color: white !important;
                 border:2px solid red !important;
            }

            .form_container {
                width: 100%;
                max-width: 100%;
                margin: auto;
                margin-top: 150px;
                margin-right: 0;
                border:2px solid red;
                margin-left:0px;
                padding:100px 10px ;
                height:600px;
      background-color: rgba(255, 255, 255, 0.85) !important; 
                
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <h2>Update your Password</h2>
            <div style="width:30%;height:2px;background-color:rgb(39, 94, 83);margin:auto;margin-bottom:10px;"></div>
            
            <h6 class="text-success text-center"><?php echo $this->session->flashdata('success') ?></h6>
            
            <form action="<?php echo base_url('setnewpassword')?>" method="post">
                <!-- New Password Field -->
                <div class="mb-3 form_div" style="position: relative;">
                    <label for="password" class="form-label">New Password:</label>
                    <input type="password" class="form-control" name="password" id="password"
                           placeholder="Enter New Password" required style="padding-right: 40px;">
                    <span class="toggle-password" data-target="password">
                        <i class="fa fa-eye"></i>
                    </span>
                    <small class="text-danger"><?php echo form_error('password'); ?></small>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3 form_div" style="position: relative;">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                           placeholder="Enter Password Again" required style="padding-right: 40px;">
                    <span class="toggle-password" data-target="confirm_password">
                        <i class="fa fa-eye"></i>
                    </span>
                    <small class="text-danger"><?php echo form_error('ConfirmPassword'); ?></small>
                </div>
                
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="login-btn">Update Password</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggles = document.querySelectorAll('.toggle-password');

            toggles.forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });
        });
    </script>
</body>
</html>