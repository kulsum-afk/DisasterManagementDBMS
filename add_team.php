<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo isset($_GET['edit']) ? 'Update' : 'Add'; ?> Rescue Team</title>
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
    <h3 class="mb-4 text-primary">
      <i class="bi bi-people-fill"></i>
      <?php echo isset($_GET['edit']) ? 'Update' : 'Add'; ?> Rescue Team
    </h3>

    <?php
    $team = ['team_name' => '', 'members_count' => '', 'contact' => ''];
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $res = $conn->query("SELECT * FROM rescue_teams WHERE id=$id");
        $team = $res->fetch_assoc();
    }

    if (isset($_POST['submit'])) {
        $stmt = $conn->prepare("INSERT INTO rescue_teams (team_name, members_count, contact) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $_POST['team_name'], $_POST['members_count'], $_POST['contact']);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'><i class='bi bi-check-circle-fill'></i> Team added successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'><i class='bi bi-x-circle-fill'></i> Error: " . $stmt->error . "</div>";
        }
    }

    if (isset($_POST['update'])) {
        $stmt = $conn->prepare("UPDATE rescue_teams SET team_name=?, members_count=?, contact=? WHERE id=?");
        $stmt->bind_param("sisi", $_POST['team_name'], $_POST['members_count'], $_POST['contact'], $_POST['id']);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success'><i class='bi bi-check-circle-fill'></i> Team updated successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'><i class='bi bi-x-circle-fill'></i> Error: " . $stmt->error . "</div>";
        }
    }
    ?>

    <form method="POST">
      <input type="hidden" name="id" value="<?= $_GET['edit'] ?? '' ?>">
      <div class="mb-3">
        <label class="form-label">Team Name</label>
        <input class="form-control" type="text" name="team_name" value="<?= $team['team_name'] ?>" placeholder="e.g. Alpha Team" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Members Count</label>
        <input class="form-control" type="number" name="members_count" value="<?= $team['members_count'] ?>" placeholder="e.g. 10" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Contact</label>
        <input class="form-control" type="text" name="contact" value="<?= $team['contact'] ?>" placeholder="e.g. 9876543210" required>
      </div>
      <div class="d-flex justify-content-between">
        <button class="btn btn-success" type="submit" name="<?= isset($_GET['edit']) ? 'update' : 'submit' ?>">
          <i class="bi bi-check2-circle"></i> <?= isset($_GET['edit']) ? 'Update' : 'Add' ?> Team
        </button>
        <div>
          <a href="view_teams.php" class="btn btn-outline-secondary me-2">
            <i class="bi bi-list-ul"></i> Back to List
          </a>
          <a href="index.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Dashboard
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

</body>
</html>
