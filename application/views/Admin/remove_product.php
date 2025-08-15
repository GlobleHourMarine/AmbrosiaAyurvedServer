<style>
    .content-container {
        padding: 20px;
    }

    .product-container {
        max-width: 1000px;
        margin: 0 auto;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .heading {
        color: var(--primary-color);
        text-align: center;
        padding: 8px;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        max-width: 150px;
        border-radius: 8px;
        margin-right: 20px;
        object-fit: cover;
    }

    .product-info {
        flex: 1;
    }

    .product-info h3 {
        margin-top: 0;
        color: var(--dark-color);
    }

    .product-actions button {
        background-color: var(--danger-color);
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .product-actions button:hover {
        background-color: #c9302c;
        transform: scale(1.05);
    }

    .no-products {
        text-align: center;
        padding: 20px;
        color: var(--dark-color);
    }

    @media (max-width: 768px) {
        .product-card {
            flex-direction: column;
            text-align: center;
        }

        .product-card img {
            margin-right: 0;
            margin-bottom: 15px;
            max-width: 100%;
        }

        .product-actions {
            margin-top: 15px;
            text-align: center;
        }
    }
</style>

<div class="content-container">
    <?php if (!empty($product_data)): ?>
        <div class="product-container">
            <h2 class="heading">All Products</h2>
            <?php foreach ($product_data as $product): ?>
                <div class="product-card">
                    <?php
                    $images = json_decode($product->image); // decode JSON to PHP array
                    if (!empty($images)) {
                        echo '<img src="' . base_url($images[0]) . '" alt="' . $product->product_name . '" style="max-width: 150px;" />';
                    }
                    ?>
                    <div class="product-info">
                        <h3><?= $product->product_name; ?></h3>
                        <p><strong>Description:</strong> <?= $product->discription; ?></p>
                        <p><strong>Price:</strong> <?= $product->price; ?> Rs</p>
                        <p><strong>GST:</strong> <?= $product->gst_price; ?>%</p>
                    </div>
                    <div class="product-actions">
                        <form id="remove-product-form-<?php echo $product->product_id; ?>" action="<?php echo base_url('remove_product_action'); ?>" method="POST" style="display: none;">
                            <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                        </form>
                        <button type="button" class="btn btn-danger btn-sm shadow-sm remove-product-btn"
                            data-product-id="<?php echo $product->product_id; ?>">
                            <i class="fas fa-trash-alt"></i> Remove
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="product-container">
            <p class="no-products">No products found.</p>
        </div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.remove-product-btn').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to remove this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#5e66d2',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!',
                customClass: {
                    popup: 'border-radius-lg'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('remove-product-form-' + productId).submit();
                }
            });
        });
    });
</script>