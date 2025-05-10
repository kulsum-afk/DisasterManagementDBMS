<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Disaster</title>
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
    <h3 class="mb-4 text-primary"><i class="bi bi-plus-circle"></i> Add New Disaster</h3>

    <?php
    if (isset($_POST['submit'])) {
        $stmt = $conn->prepare("INSERT INTO disasters (name, type, location, date, severity) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $_POST['name'], $_POST['type'], $_POST['location'], $_POST['date'], $_POST['severity']);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'><i class='bi bi-check-circle-fill'></i> Disaster added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'><i class='bi bi-x-circle-fill'></i> Error: " . $stmt->error . "</div>";
        }
    }
    ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Disaster Name</label>
        <input type="text" name="name" class="form-control" placeholder="e.g. Cyclone Amphan" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" name="type" class="form-control" placeholder="e.g. Flood, Earthquake" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control" placeholder="e.g. West Bengal" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" required>
      </div>
      <div class="mb-4">
        <label class="form-label">Severity</label>
        <select name="severity" class="form-select" required>
          <option selected disabled>Select severity</option>
          <option value="Low">Low</option>
          <option value="Medium">Medium</option>
          <option value="High">High</option>
        </select>
      </div>
      <div class="d-flex justify-content-between">
        <button type="submit" name="submit" class="btn btn-success">
          <i class="bi bi-check2-circle"></i> Add Disaster
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
