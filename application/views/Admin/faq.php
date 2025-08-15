<body style="background-color: #f4f6fa; font-family: 'Segoe UI', sans-serif;">
    <div class="d-flex" id="wrapper">
        <div class="container-fluid">
            <div class="content-container navbar-body">
                <div class="container py-4">

                    <!-- Heading + Add Button -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0" style="color: #5e66d2;">📦 FAQ Listing</h2>
                        <button type="button" class="btn btn-success shadow-sm" data-toggle="modal" data-target="#addPackageModal">
                            <i class="fa fa-plus-circle"></i> Add FAQ
                        </button>
                    </div>

                    <!-- Flash Message -->
                    <?php if ($this->session->flashdata('message')): ?>
                        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                            <?= $this->session->flashdata('message') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span>&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <!-- Table Card -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead style="background-color: #d6e7f6;">
                                        <tr class="text-dark">
                                            <th>#</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($product_data)) { ?>
                                            <?php foreach ($product_data as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><?= $value->question ?></td>
                                                    <td><?= $value->answer ?></td>
                                                    <td><?= date('d M Y', strtotime($value->created_at)) ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editPackageModal<?= $value->id ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger delete-package-btn"
                                                            data-id="<?= $value->id; ?>"
                                                            data-product-id="<?= $product_id; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- Hidden Delete Form -->
                                                <form id="delete-package-form" action="<?= base_url('delete_faq'); ?>" method="post" style="display:none;">
                                                    <input type="hidden" name="id" id="delete-package-id">
                                                    <input type="hidden" name="product_id" id="delete-product-id">
                                                </form>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editPackageModal<?= $value->id ?>" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="<?= base_url('update_faq'); ?>" method="post" enctype="multipart/form-data">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary text-white">
                                                                    <h5 class="modal-title">Edit FAQ</h5>
                                                                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="id" value="<?= $value->id; ?>">
                                                                    <input type="hidden" name="product_id" value="<?= $product_id; ?>">

                                                                    <div class="form-group">
                                                                        <label>Question <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="question" value="<?= $value->question; ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Answer <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="answer" value="<?= $value->answer; ?>" required>
                                                                    </div>
                                                                    <!-- <div class="form-group">
                                                                        <label>Selling Price <span class="text-danger">*</span></label>
                                                                        <input type="number" class="form-control" name="price" value="<//?= $value->price; ?>" step="0.01" required>
                                                                    </div> -->
                                                                    <!-- <div class="form-group">
                                                                        <label>Discount (%) <span class="text-danger">*</span></label>
                                                                        <input type="number" class="form-control" name="disscount" value="<//?= $value->disscount; ?>" step="0.01" required>
                                                                    </div> -->
                                                                    <!-- <div class="form-group">
                                                                        <label>Description <span class="text-danger">*</span></label>
                                                                        <textarea class="form-control" name="description" rows="3" required><?= $value->description; ?></textarea>
                                                                    </div> -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="8" class="text-center text-muted py-4">No FAQ added yet.</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Add Package Modal -->
                    <div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="<?= base_url('insert_faq'); ?>" method="post">
                                <div class="modal-content">
                                    <div class="modal-header bg-dark text-white">
                                        <h5 class="modal-title">Add New FAQ</h5>
                                        <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="product_id" value="<?= $product_id; ?>">
                                        <div class="form-group">
                                            <label>Question <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="question">
                                        </div>
                                        <div class="form-group">
                                            <label>Answer <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="answer">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Selling Price <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="price" step="0.01" required>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label>Discount (%) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="disscount" step="0.01" required>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="description" rows="3"></textarea>
                                        </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap & SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.delete-package-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const productId = this.getAttribute('data-product-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to delete this package?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#5e66d2',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    customClass: {
                        popup: 'border-radius-lg'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-package-id').value = id;
                        document.getElementById('delete-product-id').value = productId;
                        document.getElementById('delete-package-form').submit();
                    }
                });
            });
        });
    </script>
</body>
