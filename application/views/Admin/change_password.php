<style>
    /* Change Password Specific Styles */
    .change-password-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
        min-height: calc(100vh - 100px);
    }

    .change-password-card {
        background-color: #ffffff;
        background: linear-gradient(to bottom, rgb(212, 226, 238), #ffffff); 
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin: 20px 0;
    }

    .change-password-card h2 {
        margin-bottom: 10px;
        font-size: 24px;
        font-weight: 600;
        color: #2d3436;
    }

    .change-password-card p {
        margin-bottom: 20px;
        font-size: 14px;
        color: #555;
    }

    .change-password-card label {
        display: block;
        margin-bottom: 6px;
        font-size: 14px;
        color: #333;
        font-weight: 500;
    }

    .change-password-card .input-wrapper {
        position: relative;
        margin-bottom: 16px;
    }

    .change-password-card .input-wrapper input {
        width: 100%;
        padding: 10px 35px 10px 10px;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 14px;
    }

    .change-password-card .toggle-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 16px;
        color: #888;
    }

    .change-password-card .btn-primary {
        background-color: #6c5ce7;
        color: #fff;
        border: none;
        padding: 12px;
        width: 100%;
        border-radius: 10px;
        font-size: 15px;
        cursor: pointer;
        margin-top: 10px;
        transition: all 0.3s ease;
    }

    .change-password-card .btn-primary:hover {
        background-color: #5649c0;
    }

    /* Success/Error Messages */
    .change-password-card .text-success {
        color: #28a745;
        font-weight: bold;
        font-size: 16px;
        text-align: center;
        margin-bottom: 15px;
    }

    .change-password-card .text-danger {
        color: #dc3545;
        font-weight: bold;
        font-size: 16px;
        text-align: center;
        margin-bottom: 15px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .change-password-card {
            width: 90%;
            padding: 20px;
        }
        
        .change-password-wrapper {
            padding: 15px;
            min-height: calc(100vh - 80px);
        }
    }

    @media (max-width: 480px) {
        .change-password-card {
            width: 95%;
            padding: 15px;
        }
        
        .change-password-card h2 {
            font-size: 20px;
        }
        
        .change-password-card .btn-primary {
            padding: 10px;
            font-size: 14px;
        }
    }
</style>

<div class="container-fluid">
    <div class="change-password-wrapper">
        <div class="change-password-card">
            <h2>Change Password</h2>
            
            <?php if ($this->session->flashdata('success')): ?>
                <div class="text-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="text-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>
            
            <p>Please enter your new password below.</p>
            
            <form action="<?php echo base_url('change_password_action')?>" method="post">
                <label for="newpassword">New Password</label>
                <div class="input-wrapper">
                    <input type="password" id="newpassword" placeholder="Enter new password" name="newpassword" required>
                    <span class="toggle-icon">👁️</span>
                </div>

                <label for="confirmpassword">Confirm Password</label>
                <div class="input-wrapper">
                    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Re-enter password" required>
                    <span class="toggle-icon">👁️</span>
                </div>

                <button type="submit" class="btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    document.querySelectorAll('.toggle-icon').forEach(icon => {
        icon.addEventListener('click', () => {
            const input = icon.parentElement.querySelector('input');
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    });
</script>