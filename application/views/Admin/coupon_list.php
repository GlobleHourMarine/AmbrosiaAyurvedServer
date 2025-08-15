<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coupon Table</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-4">

  <div class="container">

    <h2 class="text-center text-primary mb-4">Coupon Table</h2>

    <!-- Flash messages -->
    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-primary">
          <tr>
            <th scope="col">Sr</th>
            <th scope="col">Coupon Code</th>
            <th scope="col">Expiry Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($result)) {
            $index = 1;
            foreach ($result as $record) { ?>
              <tr>
                <td><?= $index++; ?></td>
                <td><?= $record->coupon_code; ?></td>
                <td><?= $record->expiry_date; ?></td>
                <td>
                  <span class="badge bg-<?= $record->status === 'active' ? 'success' : 'secondary'; ?>">
                    <?= ucfirst($record->status); ?>
                  </span>
                </td>
                <td>
                  <a href="delete_coupon?id=<?= $record->id; ?>" class="btn btn-danger btn-sm"
                     onclick="return confirm('Are you sure you want to delete this coupon?');">
                    Delete
                  </a>
                </td>
              </tr>
          <?php }
          } else { ?>
            <tr>
              <td colspan="5" class="text-center">No coupons found.</td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS (for alert dismissal) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
