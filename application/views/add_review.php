<style>
    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        /* background: linear-gradient(to right, #f0f4f8, #d9e2ec); */
        background: #ffffff;

        color: #333;
        margin: 0;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .review-wrapper {
        width: 80%;
        padding: 30px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        background: linear-gradient(to right, #f0f4f8,rgb(212, 228, 245));

    }

    .review-wrapper:hover {
        transform: translateY(-5px);
    }

    /* Title Section */
    .review-title {
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .review-subtitle {
        text-align: center;
        font-size: 16px;
        color: #7f8c8d;
        margin-bottom: 30px;
        font-style: italic;
    }

    /* Product Info */
    .product-info {
        display: flex;
        gap: 20px;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 15px;
        align-items: center;
    }

    .product-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #ddd;
        transition: transform 0.3s ease;
    }

    .product-img:hover {
        transform: scale(1.05);
    }

    .product-details {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 100%;
    }

    .product-details h3 {
        font-size: 18px;
        margin: 0;
        color: #34495e;
        font-weight: bold;
    }

    .product-details p {
        font-size: 14px;
        color: #7f8c8d;
        margin: 5px 0;
        line-height: 1.4;
    }

    /* Star Rating */
   
    .rating {
    display: flex;
    justify-content:flex-start;
    flex-direction: row-reverse; /* left to right */
    margin-left:0px;
    width:40%;
    /* border:2px solid red; */
}

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 28px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.3s ease, transform 0.2s ease;
    }

    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
        color: #FFD700;
        transform: scale(1.1);
        text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
    }

    /* Review and Submit Container */
    .review-submit-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 100%;
        margin-top: 10px;
    }

    .review-form {
        display: flex;
        gap: 20px;
        align-items: flex-start;
    }

    /* Smaller Text Area */
    textarea {
        width: 50%; /* Full width of container */
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        resize: none;
        font-size: 14px;
        color: #333;
        height: 200px;
        box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: border-color 0.3s ease;
    }

    textarea:focus {
        border-color: #4CAF50;
        outline: none;
        box-shadow: 0 0 12px rgba(76, 175, 80, 0.2);
    }

    /* Smaller Submit Button */
    .submit-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 128, 0, 0.2);
        transition: background 0.3s ease, box-shadow 0.3s ease;
        /* width: 100%; */
    }

    .submit-btn:hover {
        background-color: #43a047;
        box-shadow: 0 6px 14px rgba(0, 128, 0, 0.3);
    }
</style>

<div class="review-wrapper">
<?php if ($this->session->flashdata('success')): ?>
    <div style="color: green; text-align: center; padding: 10px; background: #e8f5e9; border: 1px solid #4CAF50; border-radius: 6px; margin-bottom: 20px;">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div style="color: red; text-align: center; padding: 10px; background: #ffebee; border: 1px solid #f44336; border-radius: 6px; margin-bottom: 20px;">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
    <div class="review-title">✨ Share Your Experience!</div>
    <div class="review-subtitle">Your feedback helps us grow and improve our service.</div>
    
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <form action="<?php echo base_url('submit_review'); ?>" method="POST" enctype="multipart/form-data" class="review-form">
                <input type="hidden" name="order_id" value="<?php echo $order->order_id; ?>">
                <input type="hidden" name="product_id" value="<?php echo $order->product_id; ?>">

                <!-- Product Info -->
                 <div>
                <div class="product-info" >
                    <img src="<?php echo base_url($order->image); ?>" alt="Product Image" class="product-img">
                    
                    <div class="product-details">
                        <div>
                            <h3><?php echo $order->product_name; ?></h3>
                            <p><?php echo $order->discription; ?></p>
                        </div>

                        <!-- Star Rating -->
                        <div class="rating">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <input type="radio" id="star-<?php echo $i; ?>-<?php echo $order->order_id; ?>" name="rating" value="<?php echo $i; ?>" required>
        <label for="star-<?php echo $i; ?>-<?php echo $order->order_id; ?>">&#9733;</label>
    <?php endfor; ?>
</div>

                        
                    </div>
      
                </div>
                <div style="display:flex;justify-content:left;gap:20px;margin-top:10px;">
       
                <input type="file" id="fileInput" class="file-input" name="media_files[]" accept="image/*,video/*" style="display: none;" multiple>
        <button type="button" class="upload file submit-btn" onclick="document.getElementById('fileInput').click();">
            Upload File
        </button>
        <button type="submit" class="submit-btn">Submit</button>
    </div>
                            </div>
                <!-- Review Text Area and Submit Button -->
                <div class="review-submit-container">
         <div style="display:flex;justify-content:left;gap:20px;align-items:flex-start;">
        <textarea name="message" placeholder="Write your review..." required></textarea>
        
        <!-- Slideshow Container -->
        <div id="uploaded" style="position: relative; width: 250px; height: 200px;">
    <div id="slides" style="width: 100%; height: 100%; position: relative; overflow: hidden;"></div>
    <button id="prevBtn" style="display: none;">❮</button>
    <button id="nextBtn" style="display: none;">❯</button>
</div>
</div>

            </form>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="text-align: center; color: red;">No products available for review.</p>
    <?php endif; ?>
</div>

<!-- <script>
document.getElementById('fileInput').addEventListener('change', function () {
    const files = this.files;
    console.log('Selected files:', files); // See how many selected
    if (files.length > 0) {
        alert(files.length + " files selected");
    }
});
</script> -->


<script>
    const fileInput = document.getElementById('fileInput');
    const slidesContainer = document.getElementById('slides');
    const uploadedDiv = document.getElementById('uploaded');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const modal = document.createElement('div');
    const modalContent = document.createElement('div');
    const closeModal = document.createElement('span');

    let currentSlide = 0;
    let previews = [];
    let allUploadedFiles = [];

    // Modal setup
    modal.style.display = 'none';
    modal.style.position = 'fixed';
    modal.style.zIndex = '1000';
    modal.style.left = '0';
    modal.style.top = '0';
    modal.style.width = '100%';
    modal.style.height = '100%';
    modal.style.backgroundColor = 'rgba(0,0,0,0.9)';
    modal.style.justifyContent = 'center';
    modal.style.alignItems = 'center';
    modal.style.flexDirection = 'column';

    modalContent.style.maxWidth = '90%';
    modalContent.style.maxHeight = '90%';
    modalContent.style.position = 'relative';

    closeModal.innerHTML = '&times;';
    closeModal.style.position = 'absolute';
    closeModal.style.top = '20px';
    closeModal.style.right = '0px';
    closeModal.style.color = 'white';
    closeModal.style.fontSize = '35px';
    closeModal.style.fontWeight = 'bold';
    closeModal.style.cursor = 'pointer';
    closeModal.style.transition = 'color 0.3s';

    closeModal.addEventListener('mouseover', () => closeModal.style.color = '#f44336');
    closeModal.addEventListener('mouseout', () => closeModal.style.color = 'white');

    modal.appendChild(closeModal);
    modal.appendChild(modalContent);
    document.body.appendChild(modal);

    // Style navigation buttons
    // Update the navigation button styles (replace the existing styles)
// Update the navigation button styles for left and right positioning
prevBtn.style.cssText = `
    display: none;
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    background: rgba(255,255,255,0.7);
    border: none;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    font-size: 16px;
    cursor: pointer;
    z-index: 100;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
`;

nextBtn.style.cssText = `
    display: none;
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    background: rgba(255,255,255,0.7);
    border: none;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    font-size: 16px;
    cursor: pointer;
    z-index: 100;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
`;

// Update the hover effects to match the new positions
[prevBtn, nextBtn].forEach(btn => {
    btn.addEventListener('mouseover', () => {
        btn.style.background = 'rgba(255,255,255,0.9)';
        btn.style.transform = btn === prevBtn 
            ? 'translateY(-50%) scale(1.1)' 
            : 'translateY(-50%) scale(1.1)';
    });
    btn.addEventListener('mouseout', () => {
        btn.style.background = 'rgba(255,255,255,0.7)';
        btn.style.transform = 'translateY(-50%)';
    });
});


    // Load saved files from localStorage
    function loadSavedFiles() {
        const savedFiles = localStorage.getItem('uploadedFiles');
        if (savedFiles) {
            const files = JSON.parse(savedFiles);
            files.forEach(file => {
                createPreviewElement(file);
                allUploadedFiles.push(file);
            });
            if (previews.length > 0) {
                showSlide(0);
                toggleNavButtons();
            }
        }
    }

    function createPreviewElement(file) {
        const previewContainer = document.createElement('div');
        previewContainer.style.cssText = `
            position: relative;
            display: inline-block;
            margin: 10px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        `;

        previewContainer.addEventListener('mouseover', () => previewContainer.style.transform = 'scale(1.03)');
        previewContainer.addEventListener('mouseout', () => previewContainer.style.transform = 'scale(1)');

        let preview;
        if (file.type.startsWith('image/')) {
            preview = document.createElement('img');
            preview.src = file.url;
        } else if (file.type.startsWith('video/')) {
            preview = document.createElement('video');
            preview.src = file.url;
            preview.controls = true;
        }

        preview.style.cssText = `
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            cursor: pointer;
        `;

        preview.addEventListener('click', function () {
            modalContent.innerHTML = '';
            const mediaElement = file.type.startsWith('image/') ? document.createElement('img') : document.createElement('video');
            mediaElement.src = file.url;
            if (file.type.startsWith('video/')) {
                mediaElement.controls = true;
                mediaElement.autoplay = true;
            }
            mediaElement.style.maxWidth = '100%';
            mediaElement.style.maxHeight = '100%';
            mediaElement.style.objectFit = 'cover';
            modalContent.appendChild(mediaElement);
            modal.style.display = 'flex';
        });

        // Delete button
        const deleteBtn = document.createElement('span');
        deleteBtn.innerHTML = '&times;';
        deleteBtn.style.cssText = `
            position: absolute;
            top: 0px;
            right: 0px;
            background-color: rgba(255,255,255,0.9);
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-weight: bold;
            color: #333;
            transition: all 0.3s;
            border: 1px solid #eee;
            z-index: 999;
        `;

        deleteBtn.addEventListener('mouseover', () => {
            deleteBtn.style.backgroundColor = '#f44336';
            deleteBtn.style.color = 'white';
        });

        deleteBtn.addEventListener('mouseout', () => {
            deleteBtn.style.backgroundColor = 'rgba(255,255,255,0.9)';
            deleteBtn.style.color = '#333';
        });

        deleteBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            const index = previews.indexOf(previewContainer);
            if (index > -1) {
                previews.splice(index, 1);
                allUploadedFiles.splice(index, 1);
                slidesContainer.removeChild(previewContainer);
                updateLocalStorage();
                previews.length ? showSlide(Math.min(currentSlide, previews.length - 1)) : toggleNavButtons();
            }
        });

        previewContainer.appendChild(preview);
        previewContainer.appendChild(deleteBtn);
        slidesContainer.appendChild(previewContainer);
        previews.push(previewContainer);
    }

    function updateLocalStorage() {
        const filesToSave = allUploadedFiles.map(file => ({
            url: file.url,
            type: file.type,
            fileObject: file.fileObject || null
        }));
        localStorage.setItem('uploadedFiles', JSON.stringify(filesToSave));
    }

    fileInput.addEventListener('change', function () {
        const files = Array.from(fileInput.files);
        files.forEach(file => {
            const fileData = {
                url: URL.createObjectURL(file),
                type: file.type,
                fileObject: file
            };
            allUploadedFiles.push(fileData);
            createPreviewElement(fileData);
        });
        toggleNavButtons();
        if (files.length > 0) {
            showSlide(previews.length - 1);
        }
        updateLocalStorage();
        fileInput.value = '';
    });

    function toggleNavButtons() {
        const showNav = previews.length > 1;
        prevBtn.style.display = showNav ? 'block' : 'none';
        nextBtn.style.display = showNav ? 'block' : 'none';
    }

    function showSlide(index) {
        if (previews.length === 0) return;
        previews.forEach((el, i) => el.style.display = i === index ? 'block' : 'none');
        currentSlide = index;
    }

    prevBtn.addEventListener('click', () => showSlide((currentSlide - 1 + previews.length) % previews.length));
    nextBtn.addEventListener('click', () => showSlide((currentSlide + 1) % previews.length));
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
        modalContent.querySelectorAll('video').forEach(video => video.pause());
    });

    function clearAllPreviews() {
        slidesContainer.innerHTML = '';
        previews = [];
        allUploadedFiles = [];
        currentSlide = 0;
        toggleNavButtons();
        localStorage.removeItem('uploadedFiles');
        fileInput.value = '';
    }

    document.querySelectorAll('.review-form').forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        formData.delete('media_files[]');
        allUploadedFiles.forEach(file => {
            if (file.fileObject) {
                formData.append('media_files[]', file.fileObject);
            }
        });

        // Show thank-you message and hide review section
        const reviewWrapper = this.closest('.review-wrapper');
        reviewWrapper.innerHTML = `
         
        `;

        // Scroll to the thank you message
        reviewWrapper.scrollIntoView({ behavior: 'smooth' });

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                // If there's an error, reload to show error message
                window.location.reload();
            }
        })
        .catch(error => {
            console.error('Submission error:', error);
            window.location.reload();
        });
    });
});
// On load, restore saved previews or hide upload section if none exist
window.addEventListener('DOMContentLoaded', () => {
    const savedFiles = localStorage.getItem('uploadedFiles');
    if (savedFiles) {
        const files = JSON.parse(savedFiles);
        if (files.length > 0) {
            document.getElementById('upload-section').style.display = 'block';
            files.forEach(file => {
                createPreviewElement(file);
                allUploadedFiles.push(file);
            });
            if (previews.length > 0) {
                showSlide(0);
                toggleNavButtons();
            }
        } else {
            document.getElementById('upload-section').style.display = 'none';
        }
    } else {
        document.getElementById('upload-section').style.display = 'none';
    }
});

</script>
<script>
    // ... (keep all your existing variable declarations and setup code)

    // Update button event listeners
    prevBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        showSlide((currentSlide - 1 + previews.length) % previews.length);
    });

    nextBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        showSlide((currentSlide + 1) % previews.length);
    });


    // ... (keep all your other existing code)
    // Add this at the beginning of your script (with other variable declarations)
let formDataState = {
    message: '',
    rating: null
};

// Modify your loadSavedFiles function to also load form data
function loadSavedFiles() {
    const savedFiles = localStorage.getItem('uploadedFiles');
    const savedFormData = localStorage.getItem('formData');
    
    if (savedFiles) {
        const files = JSON.parse(savedFiles);
        files.forEach(file => {
            createPreviewElement(file);
            allUploadedFiles.push(file);
        });
        if (previews.length > 0) {
            showSlide(0);
            toggleNavButtons();
        }
    }
    
    if (savedFormData) {
        formDataState = JSON.parse(savedFormData);
        // Restore form fields
        document.querySelector('textarea[name="message"]').value = formDataState.message || '';
        if (formDataState.rating) {
            document.querySelector(`input[name="rating"][value="${formDataState.rating}"]`).checked = true;
        }
    }
}

// Add this function to save form data
function saveFormData() {
    const form = document.querySelector('.review-form');
    if (form) {
        formDataState = {
            message: form.querySelector('textarea[name="message"]').value,
            rating: form.querySelector('input[name="rating"]:checked')?.value || null
        };
        localStorage.setItem('formData', JSON.stringify(formDataState));
    }
}

// Update your form submission handler
document.querySelectorAll('.review-form').forEach(form => {
    // Add input event listeners to save form data as user types
    form.querySelector('textarea[name="message"]').addEventListener('input', saveFormData);
    form.querySelectorAll('input[name="rating"]').forEach(radio => {
        radio.addEventListener('change', saveFormData);
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        formData.delete('media_files[]');
        
        allUploadedFiles.forEach(file => {
            if (file.fileObject) {
                formData.append('media_files[]', file.fileObject);
            }
        });

        // Clear saved data on successful submission
        const clearOnSuccess = () => {
            localStorage.removeItem('uploadedFiles');
            localStorage.removeItem('formData');
            clearAllPreviews();
            document.querySelector('textarea[name="message"]').value = '';
            document.querySelectorAll('input[name="rating"]').forEach(radio => {
                radio.checked = false;
            });
        };

        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                clearOnSuccess();
                // Show success message
                const reviewWrapper = this.closest('.review-wrapper');
                reviewWrapper.innerHTML = `
                    <div style="text-align: center; padding: 20px;">
                        <h2>Thank you for your review!</h2>
                        <p>Your feedback has been submitted successfully.</p>
                    </div>
                `;
                reviewWrapper.scrollIntoView({ behavior: 'smooth' });
            } else {
                // Keep the data if submission fails
                console.error('Submission error:', data.message);
            }
        })
        .catch(error => {
            console.error('Submission error:', error);
            // Keep the data if submission fails
        });
    });
});

// Update your clearAllPreviews function
function clearAllPreviews() {
    slidesContainer.innerHTML = '';
    previews = [];
    allUploadedFiles = [];
    currentSlide = 0;
    toggleNavButtons();
    fileInput.value = '';
}

// Call loadSavedFiles on DOMContentLoaded
window.addEventListener('DOMContentLoaded', loadSavedFiles);

// Save form data periodically or on blur
setInterval(saveFormData, 5000); // Save every 5 seconds
document.querySelector('textarea[name="message"]').addEventListener('blur', saveFormData);
</script>