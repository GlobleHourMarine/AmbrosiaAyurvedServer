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

    <h2 class="text-center text-primary mb-4">Subadmin List</h2>

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

    <!-- Modal -->
    <div class="modal fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="permissionModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form method="POST" action="<?= base_url('save-permissions') ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Assign Permissions to <span id="subadminName"></span></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span>&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="subadmin_id" id="subadminId">

              <?php foreach ($modules as $mod): ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="module_ids[]" value="<?= $mod->id ?>" id="mod<?= $mod->id ?>">
                  <label class="form-check-label" for="mod<?= $mod->id ?>"><?= $mod->modules_name ?></label>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save Permissions</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-primary">
          <tr>
            <th scope="col">Sr</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <!-- <th scope="col">Password</th> -->
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($result)) {
            $index = 1;
            foreach ($result as $record) { ?>
              <tr>
                <td><?= $index++; ?></td>
                <td><?= $record->name; ?></td>
                <td><?= $record->email; ?></td>
                <!-- <td><?= $record->password; ?></td> -->
                <td>
                  <a href="javascript:void(0);"
                    class="btn btn-success btn-sm give-permission-btn"
                    data-id="<?= $record->id; ?>"
                    data-name="<?= $record->name; ?>">
                    Give Permission
                  </a>
                  <button class="btn btn-danger btn-sm remove-product-btn" data-product-id="<?= $record->id; ?>">
                    Delete
                  </button>

                  <!-- Hidden Form -->
                  <form id="remove-product-form-<?= $record->id; ?>" method="POST" action="<?= base_url('subadmin/DeleteSubamdin/' . $record->id) ?>" style="display: none;">
                  </form>
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

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function openPermissionModal(subadmin_id, subadmin_name) {
      $('#subadminId').val(subadmin_id);
      $('#subadminName').text(subadmin_name);

      $('input[name="module_ids[]"]').prop('checked', false); // reset

      $.getJSON('<?= base_url('Subadmin/get-subadmin-permissions') ?>/' + subadmin_id, function(res) {
        if (res.module_ids) {
          res.module_ids.forEach(id => {
            $('#mod' + id).prop('checked', true);
          });
        }
        $('#permissionModal').modal('show');
      });
    }

    $(".remove-product-btn").click(function() {
      var productId = $(this).data("product-id");
      console.log(productId)
      Swal.fire({
        title: 'Are you sure?',
        text: "You are about to delete this product!",
        icon: 'warning',
        iconColor: '#007bff', // Bootstrap blue
        showCancelButton: true,
        confirmButtonColor: '#ff0000ff',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        background: '#eaf4ff', // Light blue background
        color: '#000', // Text color
      }).then((result) => {
        if (result.isConfirmed) {
          $("#remove-product-form-" + productId).submit();
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.give-permission-btn').on('click', function() {
        var subadminId = $(this).data('id');
        var subadminName = $(this).data('name');

        $('#subadminId').val(subadminId);
        $('#subadminName').text(subadminName);

        // Optionally clear all checkboxes
        $('#permissionModal input[type=checkbox]').prop('checked', false);

        // Fetch previously selected permissions via AJAX and check them
        $.ajax({
          url: '<?= base_url("subadmin/get_permissions") ?>/' + subadminId,
          method: 'GET',
          dataType: 'json',
          success: function(data) {
            $.each(data, function(i, module_id) {
              $('#mod' + module_id).prop('checked', true);
            });
          }
        });

        $('#permissionModal').modal('show');
      });
    });
  </script>

</body>

</html>