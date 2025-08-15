
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* body {
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        } */
        
        .control-panel {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 500px;
            padding: 30px;
            text-align: center;

            /* border:2px  solid red; */
            margin:auto;
            margin-top:100px;
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 24px;
        }
        
        .status-toggle {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .toggle-option {
            position: relative;
            width: 120px;
        }
        
        .toggle-option input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .toggle-label {
            display: block;
            padding: 12px 20px;
            background-color: #e9ecef;
            color: #495057;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            font-weight: 500;
        }
        
        .toggle-option:first-child .toggle-label {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        
        .toggle-option:last-child .toggle-label {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        
        input:checked + .toggle-label {
            background-color: #4361ee;
            color: white;
        }
        
        .save-btn {
            background-color:darkgreen;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            max-width: 200px;
        }
        
        .save-btn:hover {
            background-color:rgb(212, 68, 58);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }
        
        .current-status {
            margin-top: 30px;
            padding: 15px;
            border-radius: 6px;
            font-weight: 500;
        }
        
        .status-active {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-maintenance {
            background-color: #fff3cd;
            color: #856404;
        }
        
        @media (max-width: 480px) {
            .control-panel {
                padding: 20px;
            }
            
            h1 {
                font-size: 20px;
            }
            
            .toggle-label {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="control-panel" >
        <h1>Website Maintenance Control</h1>
        <?php
            if ($this->session->flashdata('success')) {
                ?>
                <small class="alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </small>
                <?php
            }
            else{
                 ?>
                <small class="alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </small>
                <?php
            }
        ?>

       <form id="statusForm" action="<?php echo base_url('website_maintenance');?>" method="post">
    <div class="status-toggle">
        <div class="toggle-option">
            <input type="radio" id="statusActive" name="websiteStatus" value="active" 
                <?php if (isset($status) && strtolower($status) == 'active') echo 'checked'; ?> >
            <label for="statusActive" class="toggle-label">Active</label>
        </div>
        <div class="toggle-option">
            <input type="radio" id="statusInactive" name="websiteStatus" value="inactive" 
                <?php if (isset($status) && strtolower($status) == 'inactive') echo 'checked'; ?> >
            <label for="statusInactive" class="toggle-label">Inactive</label>
        </div>
    </div>
    
    <button type="submit" class="save-btn">Change Status</button>
</form>

        
        <div id="currentStatusDisplay" class="current-status status-active">
            Current Status: <?php echo $status;?>
        </div>
    </div>

    <!-- <script>
        document.getElementById('statusForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const selectedStatus = document.querySelector('input[name="websiteStatus"]:checked').value;
            const statusDisplay = document.getElementById('currentStatusDisplay');
            
            // In a real implementation, you would send this to your backend
            // fetch('/api/update-status', { method: 'POST', body: JSON.stringify({ status: selectedStatus }) })
            // .then(response => response.json())
            // .then(data => {
            //     updateStatusDisplay(data.status);
            // });
            
            // For demo purposes, we'll just update the UI
            updateStatusDisplay(selectedStatus);
            
            // Show confirmation (in real app, use the API response)
            // alert('Status updated successfully!');
        });
        
        function updateStatusDisplay(status) {
            const statusDisplay = document.getElementById('currentStatusDisplay');
            
            if (status === 'active') {
                statusDisplay.textContent = 'Current Status: Active';
                statusDisplay.className = 'current-status status-active';
            } else {
                statusDisplay.textContent = 'Current Status: Inactive';
                statusDisplay.className = 'current-status status-inactive';
            }
        }
        
        // In a real app, you would fetch the current status on page load
        // fetch('/api/current-status')
        // .then(response => response.json())
        // .then(data => {
        //     document.querySelector(`input[value="${data.status}"]`).checked = true;
        //     updateStatusDisplay(data.status);
        // });
    </script> -->
</body>
</html>