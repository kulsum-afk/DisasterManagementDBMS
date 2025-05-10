<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Resource</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #eef2f7;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .form-container {
      max-width: 700px;
      margin: 60px auto;
    }
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0,0,0,0.05);
    }
    .btn i {
      margin-right: 5px;
    }
  </style>
</head>
<body>

<div class="container form-container">
  <div class="card p-4 bg-white">
    <h3 class="mb-4 text-primary"><i class="bi bi-box-seam"></i> Add Resource</h3>

    <?php
    if (isset($_POST['submit'])) {
        $stmt = $conn->prepare("INSERT INTO resources (resource_type, quantity, location) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $_POST['resource_type'], $_POST['quantity'], $_POST['location']);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'><i class='bi bi-check-circle-fill'></i> Resource added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'><i class='bi bi-x-circle-fill'></i> Error: " . $stmt->error . "</div>";
        }
    }
    ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Resource Type</label>
        <input type="text" name="resource_type" class="form-control" placeholder="e.g. Water, Food, Medicine" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control" placeholder="e.g. 500" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control" placeholder="e.g. Warehouse A" required>
      </div>
      <div class="d-flex justify-content-between">
        <button type="submit" name="submit" class="btn btn-success">
          <i class="bi bi-check2-circle"></i> Add Resource
        </button>
        <a href="index.php" class="btn btn-secondary">
          <i class="bi bi-arrow-left-circle"></i> Back to Dashboard
        </a>
      </div>
    </form>
  </div>
</div>

</body>
</html>
