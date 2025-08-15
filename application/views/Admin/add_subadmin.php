<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            padding: 30px 15px;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: 0 auto;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }

        .form-label {
            font-weight: 600;
            color: #212529;
        }

        .existing-image-card {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .existing-image-card img {
            width: 100%;
            height: 130px;
            object-fit: cover;
            border-radius: 8px;
        }

        .existing-image-card:hover {
            transform: scale(1.03);
        }

        .remove-image {
            position: absolute;
            top: 6px;
            right: 6px;
            background-color: rgba(220, 53, 69, 0.9);
            border: none;
            border-radius: 50%;
            font-size: 14px;
            color: #fff;
            padding: 4px 8px;
            display: none;
        }

        .existing-image-card:hover .remove-image {
            display: block;
        }

        .text-success {
            color: #198754 !important;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Add Subadmin</h2>
        <?php if($this->session->flashdata('seccess')):?>
        <h6 class="text-success"><?php echo $this->session->flashdata('seccess'); ?></h6>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')):?>
        <h6 class="text-danger"><?php echo $this->session->flashdata('error'); ?></h6>
        <?php endif; ?>
        <form action="<?php echo base_url('add-subadmin') ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="username" name="username" required placeholder="Enter username">
                <small id="username_error" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email">
                <small id="email_error" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Add Sub-Admin</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap & jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#username, #email').on('keyup', function () {
        var username = $('#username').val();
        var email = $('#email').val();

        $.ajax({
            url: '<?= base_url("Subadmin/check_username") ?>',
            method: 'POST',
            dataType: 'json',
            data: {
            username: username,
            email: email
            },
            success: function (res) {
            $('#username_error').text(res.username_error);
            $('#email_error').text(res.email_error);
            }
        });
        });
    </script>
</body>

</html>