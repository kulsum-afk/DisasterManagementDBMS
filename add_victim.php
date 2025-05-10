<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Victim</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f8fc;
    }
    .form-container {
      max-width: 700px;
      margin: 60px auto;
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

<div class="container form-container">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0"><i class="bi bi-person-plus-fill"></i> Add Victim</h4>
    </div>
    <div class="card-body">
      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Victim Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter victim's name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Age</label>
          <input type="number" name="age" class="form-control" placeholder="Enter age" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select name="status" class="form-select" required>
            <option value="Safe">Safe</option>
            <option value="Injured">Injured</option>
            <option value="Missing">Missing</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Disaster ID</label>
          <input type="number" name="disaster_id" class="form-control" placeholder="e.g. 1" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Assigned Team ID</label>
          <input type="number" name="assigned_team_id" class="form-control" placeholder="e.g. 2" required>
        </div>
        <div class="d-flex justify-content-between">
          <button type="submit" name="submit" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Add Victim
          </button>
          <div>
            <a href="view_victims.php" class="btn btn-outline-secondary me-2">
              <i class="bi bi-list"></i> View All Victims
            </a>
            <a href="index.php" class="btn btn-secondary">
              <i class="bi bi-arrow-left-circle"></i> Dashboard
            </a>
          </div>
        </div>
      </form>

      <?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $disaster_id = $_POST['disaster_id'];
    $assigned_team_id = $_POST['assigned_team_id'];

    // Check if disaster ID exists
    $disasterCheck = $conn->prepare("SELECT id FROM disasters WHERE id = ?");
    $disasterCheck->bind_param("i", $disaster_id);
    $disasterCheck->execute();
    $disasterCheck->store_result();

    // Check if team ID exists
    $teamCheck = $conn->prepare("SELECT id FROM rescue_teams WHERE id = ?");
    $teamCheck->bind_param("i", $assigned_team_id);
    $teamCheck->execute();
    $teamCheck->store_result();

    if ($disasterCheck->num_rows === 0) {
        echo "<div class='alert alert-danger mt-4'><i class='bi bi-exclamation-circle-fill'></i> Error: Disaster ID <strong>$disaster_id</strong> does not exist.</div>";
    } elseif ($teamCheck->num_rows === 0) {
        echo "<div class='alert alert-danger mt-4'><i class='bi bi-exclamation-circle-fill'></i> Error: Team ID <strong>$assigned_team_id</strong> does not exist.</div>";
    } else {
        $stmt = $conn->prepare("INSERT INTO victims (name, age, status, disaster_id, assigned_team_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sisii", $name, $age, $status, $disaster_id, $assigned_team_id);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success mt-4'><i class='bi bi-check-circle-fill'></i> Victim added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger mt-4'><i class='bi bi-x-circle-fill'></i> Error: " . $stmt->error . "</div>";
        }
    }
}
?>

    </div>
  </div>
</div>

</body>
</html>
