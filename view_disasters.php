<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Disaster Records</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f8fc;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }
    .btn i {
      margin-right: 5px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0"><i class="bi bi-exclamation-triangle-fill"></i> Disaster Records</h4>
      <a href="index.php" class="btn btn-light btn-sm">
        <i class="bi bi-house-door-fill"></i> Dashboard
      </a>
    </div>
    <div class="card-body">
      <a href="add_disaster.php" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Add New Disaster
      </a>

      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Type</th>
              <th>Location</th>
              <th>Date</th>
              <th>Severity</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = $conn->query("SELECT * FROM disasters");
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['type']}</td>
                  <td>{$row['location']}</td>
                  <td>{$row['date']}</td>
                  <td>{$row['severity']}</td>
                </tr>";
              }
            } else {
              echo "<tr><td colspan='6' class='text-center'>No records found.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</body>
</html>
