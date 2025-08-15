<!DOCTYPE html>
<html>

<head>
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        input,
        button {
            padding: 8px;
            margin: 8px 0;
            width: 300px;
        }
    </style>
</head>

<body>

    <h2>OTP Verification via 2Factor</h2>

    <!-- Message -->
    <?php if (!empty($message)): ?>
        <p><strong><?= $message ?></strong></p>
    <?php endif; ?>

    <!-- Phone Number Form -->
    <?php if (!$show_otp_form): ?>
        <form method="post" action="<?= base_url('user/send_otp') ?>">
            <label>Phone Number:</label><br>
            <input type="text" name="phone" required value="<?= $phone ?>" placeholder="Enter 10-digit number"><br>
            <button type="submit">Send OTP</button>
        </form>
    <?php endif; ?>

    <!-- OTP Verification Form -->
    <?php if ($show_otp_form): ?>
        <form method="post" action="<?= base_url('user/verify_otp') ?>">
            <label>Enter OTP:</label><br>
            <input type="text" name="otp" required placeholder="Enter OTP"><br>
            <input type="hidden" name="session_id" value="<?= $session_id ?>">
            <input type="hidden" name="phone" value="<?= $phone ?>">
            <button type="submit">Verify OTP</button>
        </form>
    <?php endif; ?>

</body>

</html>