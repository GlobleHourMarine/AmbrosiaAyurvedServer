<div class="admin-container">

  <!-- Add Banner -->
  <div class="card">
    <div class="card-header" style=" background-color:	#dcd0ff !important;color:black;">Add New Banner</div>
    <div class="card-body">
      <?php if (!empty($error)) echo $error; ?>
      <form action="<?= base_url('add_banners') ?>" method="POST" enctype="multipart/form-data" id="bannerForm">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="title" class="form-label">Banner Title *</label>
              <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label><br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="active" checked>
                <label class="form-check-label">Active</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="inactive">
                <label class="form-check-label">Inactive</label>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label">Banner Image *</label>
              <input type="file" name="bannerImage" id="bannerImage" class="d-none" accept="image/*" required>
              <div class="banner-preview-container"  id="uploadContainer">
                <i class="fas fa-cloud-upload-alt fs-1 text-primary"></i>
                <p>Click to upload banner image</p>
                <p class="text-muted small">Recommended: 1200x400px (JPG, PNG)</p>
                <img id="imagePreview" class="banner-preview">
              </div>
            </div>
          </div>
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary" style=" background-color:	#dcd0ff !important;color:black;">
            <i class="fas fa-upload me-2"></i>Upload Banner
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Existing Banners -->
  <div class="card">
    <div class="card-header"style=" background-color:	#dcd0ff !important;color:black;">Current Banners</div>
    <div class="card-body">
      <div class="banners-grid">
        <?php if (!empty($banners)) : ?>
          <?php foreach ($banners as $banner): ?>
            <div class="banner-card">
              <img src="<?= base_url('uploads/banners/' . $banner->image) ?>" class="banner-img" alt="Banner Image">
              <div class="banner-body">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h6><?= htmlspecialchars($banner->title) ?></h6>
                    <span class="banner-status <?= $banner->status === 'active' ? 'status-active' : 'status-inactive' ?>">
                      <?= ucfirst($banner->status) ?>
                    </span>
                  </div>
                  <form action="<?= base_url('delete_banner/' . $banner->id) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </div>
                  <div class="mt-2">
                    <a href="<?= base_url('a5_the_diabetes_killer') ?>" target="_blank" class="text-decoration-none">Visit Link</a>
                  </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-center">No banners available.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

</div>

<style>
  /* Scoped styles for the banner section only */
  .admin-container {
    --banner-primary: #4361ee;
    --banner-secondary: #3f37c9;
    --banner-success: #4cc9f0;
    --banner-danger:rgb(247, 37, 37);
  }

  .admin-container .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    background-color: white;
    /* border:2px solid red; */
    width:95%;
    margin-top:15px !important;
    margin:auto;
  }

  .admin-container .card-header {
    background-color: var(--banner-primary);
    color: white;
    font-weight: 600;
    padding: 1rem 1.25rem;
    border-radius: 10px 10px 0 0 !important;
  }

  .admin-container .form-control:focus, 
  .admin-container .form-select:focus {
    border-color: var(--banner-primary);
    box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
  }

  .admin-container .btn-primary {
    background-color: var(--banner-primary);
    border-color: var(--banner-primary);
  }

  .admin-container .btn-primary:hover {
    background-color: var(--banner-secondary);
    border-color: var(--banner-secondary);
  }

  .admin-container .banner-preview-container {
    border: 2px dashed #ddd;
    padding: 1rem;
    border-radius: 8px;
    text-align: center;
    background: #f8f9fa;
    cursor: pointer;
  }

  .admin-container .banner-preview {
    max-width: 100%;
    max-height: 200px;
    margin-top: 1rem;
    display: none;
  }

  .admin-container .banners-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1.25rem;
  }

  .admin-container .banner-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    overflow: hidden;
    transition: all 0.3s ease;
  }

  .admin-container .banner-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  }

  .admin-container .banner-img {
    width: 100%;
    height: 150px;
    object-fit: cover;
  }

  .admin-container .banner-body {
    padding: 1rem;
  }

  .admin-container .banner-status {
    font-size: 0.8rem;
    padding: 0.25rem 0.5rem;
    border-radius: 12px;
    display: inline-block;
  }

  .admin-container .status-active {
    background-color: rgba(76, 201, 240, 0.1);
    color: var(--banner-success);
  }

  .admin-container .status-inactive {
    background-color: rgba(247, 37, 133, 0.1);
    color: var(--banner-danger);
  }

  .admin-container .btn-danger {
    background-color: var(--banner-danger);
    border-color: var(--banner-danger);
  }
</style>

<script>
  document.getElementById('uploadContainer').addEventListener('click', () => {
    document.getElementById('bannerImage').click();
  });

  document.getElementById('bannerImage').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file && file.type.match('image.*') && file.size <= 2 * 1024 * 1024) {
      const reader = new FileReader();
      reader.onload = e => {
        const img = document.getElementById('imagePreview');
        img.src = e.target.result;
        img.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
      alert('Invalid image file. JPG/PNG only, Max 2MB.');
    }
  });
</script>