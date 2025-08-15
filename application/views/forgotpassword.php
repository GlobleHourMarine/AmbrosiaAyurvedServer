<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
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

        /* Optional overlay if text needs better contrast */
        .main_container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            z-index: 0;
        }

        .head {
            color: rgb(39, 94, 83);
            margin-top: 15px;
        }

        label {
            font-size: 18px;
            font-weight: bold;
            color: black;
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
            z-index: 1;
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

        @media (max-width: 768px) {
            .main_container {
                justify-content: center;
                padding: 20px;
                background-attachment: scroll;
            }

            .form_container {
                width: 100%;
                max-width: 90%;
                margin: auto;
                margin-top: 100px;
                margin-right: 0;
                background-color: rgba(255, 255, 255, 0.9);

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
                /* border:2px  solid red; */

            }
        }
    </style>
</head>

<body>

    <div class="main_container">
        <div class="form_container">
            <div class="user_image">
                <img src="<?php echo base_url('assets/images/user2.png') ?>" alt="User">
            </div>

            <h2 class="text-center head">Forgot Password</h2>
            <div style="width:30%;height:2px;background-color:rgb(39, 94, 83);margin:auto;"></div>
            <h6 class="text-success text-center"><?php if ($this->session->flashdata('success')): ?>
                    <h6 class="text-success text-center"><?php echo $this->session->flashdata('success'); ?></h6>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <h6 class="text-danger text-center"><?php echo $this->session->flashdata('error'); ?></h6>
                <?php endif; ?>
            </h6>

            <form action="<?php echo base_url('forgotPassword') ?>" method="post">
                <div class="mb-3">
                    <label for="phone" class="form-label">Mobile Number:</label>
                    <input type="text" class="form-control" name="phone" id="phone"
                        placeholder="Enter Your Mobile number" required>
                    <small class="text-danger"><?php echo form_error('phone'); ?></small>
                </div>
                <button type="submit" class="login-btn">Send OTP</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>