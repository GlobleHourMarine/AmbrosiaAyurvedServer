<style>
    /* Add Product Specific Styles */
    :root {
        --form-bg: #ffffff;
        --primary-accent: #4e54c8;
        --secondary-accent: #8f94fb;
        --success-color: #28a745;
        --shadow-color: rgba(0, 0, 0, 0.1);
    }

    .form-container {
        background: var(--form-bg);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px var(--shadow-color);
        margin: 20px 0;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .form-container h4 {
        margin-bottom: 25px;
        text-align: center;
        color: darkblue;
        font-weight: 600;
    }

    .form-label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 8px;
    }

    .form-control {
        border-radius: 6px;
        padding: 12px 15px;
        border: 1px solid #ced4da;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: var(--secondary-accent);
        box-shadow: 0 0 0 0.2rem rgba(143, 144, 180, 0.25);
    }

    .text-success {
        color: var(--success-color) !important;
        font-weight: 500;
        font-size: 16px;
        text-align: center;
        padding: 10px;
        margin-bottom: 20px;
        background-color: rgba(40, 167, 69, 0.1);
        border-radius: 6px;
        border-left: 3px solid var(--success-color);
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .btn-add-product {
        background: linear-gradient(135deg, var(--primary-accent), var(--secondary-accent));
        border: none;
        font-weight: 500;
        letter-spacing: 0.5px;
        border-radius: 6px;
        padding: 12px;
        transition: all 0.3s;
        box-shadow: 0 4px 6px var(--shadow-color);
        color: white;
    }

    .btn-add-product:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(78, 84, 200, 0.25);
        color: white;
    }

    .file-upload-container {
        margin-bottom: 20px;
    }

    .file-upload-wrapper {
        position: relative;
        margin-bottom: 10px;
    }

    .file-upload-input {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .file-upload-label {
        display: block;
        padding: 12px 15px;
        background-color: #f8f9fa;
        border: 2px dashed #ced4da;
        border-radius: 6px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .file-upload-label:hover {
        background-color: #e9ecef;
        border-color: var(--secondary-accent);
    }

    .file-upload-label i {
        margin-right: 8px;
    }

    .file-preview {
        margin-top: 15px;
        text-align: center;
        display: none;
    }

    .file-preview img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 6px;
        border: 1px solid #eee;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .file-info {
        font-size: 14px;
        color: #6c757d;
        margin-top: 10px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-container {
            padding: 25px 15px;
        }
    }
</style>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-container">
                <h4 style="color:darkblue;text-align:center;">Add Product</h4>
                <form action="<?php echo base_url('add_product'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pname" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="pname" id="pname" placeholder="Enter product name" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tittle" class="form-label">Product Title</label>
                            <input type="text" class="form-control" name="tittle" id="tittle" placeholder="Enter product title" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="discription" class="form-label">Product Description</label>
                        <textarea class="form-control" name="discription" id="discription" rows="4" placeholder="Enter detailed product description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Product Images</label>
                        <div class="border rounded p-3 file-upload-label text-center" style="cursor:pointer;" onclick="document.getElementById('productimage').click();">
                            <i class="fas fa-cloud-upload-alt mr-2"></i> Click to upload images
                        </div>
                        <input type="file" name="productimage[]" id="productimage" class="d-none" accept="image/*" multiple required>
                        <div id="preview-images" class="mt-3 d-flex flex-wrap"></div>
                        <small class="text-muted">Allowed formats: JPEG, PNG, GIF. Max size: 5MB</small>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="form-label">Basic Price (Rs.)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rs.</span>
                                </div>
                                <input type="number" class="form-control" name="price" id="price" placeholder="0.00" step="0.01" required>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" min="1" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="gst" class="form-label">GST (%)</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="gst" id="gst" placeholder="0.00" step="0.01" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-plus-circle mr-2"></i>Add Product
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('productimage').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-images');
        preview.innerHTML = '';
        Array.from(event.target.files).forEach(file => {
            if (file.type.match('image.*')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.height = '80px';
                    img.style.marginRight = '10px';
                    img.style.borderRadius = '4px';
                    img.style.border = '1px solid #ccc';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>