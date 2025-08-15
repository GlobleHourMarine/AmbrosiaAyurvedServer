<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .main_container {
            background: url(<?php echo base_url('assets/images/FP2.webp') ?>) no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 5%;
            position: relative;
        }

        .head {
            color: rgb(39, 94, 83);
            margin-top: 15px;
            text-align: center;
        }

        .form_container {
            width: 100%;
            max-width: 350px;
            background-color: #f8f8f8;
            border: 1px solid #fff;
            border-radius: 10px;
            padding: 30px 20px 20px;
            height: 300px;
            position: relative;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-right: 150px;
            top: 12%;
        }

        .user_image {
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 100px;
            background-color: white;
            border-radius: 50%;
            padding: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user_image img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .login-btn {
            width: 100%;
            padding: 5px;
            margin-top: 15px;
            border: none;
            background-color: rgb(112, 214, 195);
            color: white;
            border-radius: 5px;
            transition: 0.3s ease;
            font-weight: bold;
        }

        .login-btn:hover {
            background-color: rgb(83, 187, 168);
        }

        .otp-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            font-weight: bold;
            color: black;
        }

        .otp-input {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 24px;
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .otp-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }


        @media (max-width: 768px) {
            .main_container {
                justify-content: center;
                padding: 20px;
                /* overflow:hidden; */
            }

            .form_container {
                width: 100%;
                /* max-width: 90%; */
                margin: auto;
                /* border:2px solid red; */
                margin-top: 100px;
                /* left:20%; */

            }
        }

        @media (max-width: 576px) {
            .main_container {
                justify-content: center;
                padding: 20px;
                background-attachment: scroll;
                background: none;
                background-color: white;
            }

            .form_container {
                width: 100%;
                max-width: 100%;
                margin: auto;
                margin-top: 150px;
                margin-right: 0;
                /* border:2px solid red; */
                margin-left: 0px;
                padding: 100px 30px;
                height: 500px;
                background-color: rgba(255, 255, 255, 0.85);

            }
        }
    </style>
</head>

<body>

    <div class="container-fluid main_container">
        <div class="form_container">
            <div class="user_image">
                <img src="<?php echo base_url('assets/images/user2.png') ?>" alt="User" />
            </div>

            <h2 class="head">Verify Your OTP</h2>
            <div style=" width:30%;height:2px;background-color:rgb(39, 94, 83);margin:auto;"></div>

            <h6 class="text-success text-center"><?php echo $this->session->flashdata('success'); ?></h6>

            <form action="<?php echo base_url('verifyotp') ?>" method="post">
                <!-- OTP input boxes (6 digits) -->
                <div class="otp-container">
                    <input type="text" class="otp-input" name="otp1" maxlength="1" required>
                    <input type="text" class="otp-input" name="otp2" maxlength="1" required>
                    <input type="text" class="otp-input" name="otp3" maxlength="1" required>
                    <input type="text" class="otp-input" name="otp4" maxlength="1" required>
                    <input type="text" class="otp-input" name="otp5" maxlength="1" required>
                    <input type="text" class="otp-input" name="otp6" maxlength="1" required>
                </div>

                <!-- Hidden full OTP -->
                <input type="hidden" name="otp" id="full-otp" value="">
                <!-- Hidden user ID -->
                <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                <!-- Hidden session_id -->
                <input type="hidden" name="session_id" value="<?php echo $this->session->userdata('otp_session_id'); ?>">

                <button type="submit" class="login-btn">Verify OTP</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('.otp-input');
            const fullOtpInput = document.getElementById('full-otp');
            const form = document.querySelector('form');

            // Focus first input
            otpInputs[0].focus();

            // Handle input and auto-tab
            otpInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (this.value.length === 1 && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                    updateFullOtp();
                });

                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Backspace' && this.value.length === 0 && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                });
            });

            // Update hidden field on submit
            form.addEventListener('submit', function() {
                updateFullOtp();
            });

            function updateFullOtp() {
                let otp = '';
                otpInputs.forEach(input => otp += input.value);
                fullOtpInput.value = otp;
            }
        });
    </script>

</body>

</html>