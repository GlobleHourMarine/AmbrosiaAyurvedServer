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
        <h2>Update Product</h2>

        <h6 class="text-success"><?php echo $this->session->flashdata('message'); ?></h6>

        <form action="<?= base_url('update_product_action'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?= $product->product_id; ?>">

            <div class="mb-3">
                <label class="form-label">Product Name:</label>
                <input type="text" class="form-control" name="pname" value="<?= $product->product_name; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description:</label>
                <textarea class="form-control" name="discription" rows="3" required><?= $product->discription; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Existing Images:</label>
                <div class="row g-3">
                    <?php
                    $images = json_decode($product->image ?? '[]', true);
                    if (!empty($images)):
                        foreach ($images as $index => $img): ?>
                            <div class="col-6 col-md-4">
                                <div class="existing-image-card">
                                    <img src="<?= base_url($img); ?>" alt="Image <?= $index + 1 ?>">
                                    <button type="button" class="remove-image" data-index="<?= $index ?>" data-id="<?= $product->product_id ?>">&times;</button>
                                </div>
                            </div>
                        <?php endforeach;
                    else: ?>
                        <div class="col-12 text-muted">No images available.</div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Row: Add New Images + Price -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Add New Images:</label>
                    <input type="file" class="form-control" name="product_images[]" multiple>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Price:</label>
                    <input type="number" class="form-control" name="price" value="<?= $product->price; ?>" required>
                </div>
            </div>

            <!-- Row: GST + Quantity -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">GST:</label>
                    <input type="number" class="form-control" name="gst" value="<?= $product->gst_price; ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Quantity:</label>
                    <input type="number" class="form-control" name="quantity" value="<?= $product->quantity; ?>" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold">Update Product</button>
        </form>
    </div>

    <!-- Bootstrap & jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(".remove-image").click(function() {
            const index = $(this).data("index");
            const productId = $(this).data("id");

            if (confirm("Are you sure you want to remove this image?")) {
                $.ajax({
                    url: "<?= base_url('remove_product_image'); ?>",
                    type: "POST",
                    data: {
                        index: index,
                        product_id: productId
                    },
                    success: function(res) {
                        const response = JSON.parse(res);
                        if (response.status === "success") {
                            location.reload();
                        } else {
                            alert("Failed to remove image.");
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>