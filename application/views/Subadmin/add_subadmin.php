<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Sub-Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1f1c2c, #928dab);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      width: 100%;
      max-width: 500px;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>

  <div class="card p-4">
    <h3 class="text-center mb-4">Add Sub-Admin</h3>
    <form action="add_subadmin.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="username" name="username" required placeholder="Enter username">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="Enter email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Add Sub-Admin</button>
      </div>
    </form>
  </div>

</body>
</html>
