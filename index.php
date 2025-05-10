<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Disaster Management Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #eef2f7;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .dashboard-container {
      max-width: 800px;
      margin: 60px auto;
    }
    .card {
      transition: transform 0.2s ease-in-out;
    }
    .card:hover {
      transform: scale(1.02);
    }
    .card i {
      font-size: 2rem;
      color: #0d6efd;
    }
    .card-title {
      margin-top: 10px;
      font-size: 1.2rem;
      font-weight: 500;
    }
  </style>
</head>
<body>

<div class="container dashboard-container">
  <h2 class="text-center mb-5">🌍 <strong>Disaster Management System</strong></h2>
  <div class="row row-cols-1 row-cols-md-2 g-4">

    <!-- Add Disaster -->
    <div class="col">
      <a href="add_disaster.php" class="text-decoration-none">
        <div class="card text-center shadow-sm p-3">
          <i class="bi bi-exclamation-triangle-fill"></i>
          <div class="card-title">Add Disaster</div>
        </div>
      </a>
    </div>

    <!-- View Disasters -->
    <div class="col">
      <a href="view_disasters.php" class="text-decoration-none">
        <div class="card text-center shadow-sm p-3">
          <i class="bi bi-card-list"></i>
          <div class="card-title">View Disasters</div>
        </div>
      </a>
    </div>

    <!-- Add Team -->
    <div class="col">
      <a href="add_team.php" class="text-decoration-none">
        <div class="card text-center shadow-sm p-3">
          <i class="bi bi-person-plus-fill"></i>
          <div class="card-title">Add Rescue Team</div>
        </div>
      </a>
    </div>

    <!-- View Teams -->
    <div class="col">
      <a href="view_teams.php" class="text-decoration-none">
        <div class="card text-center shadow-sm p-3">
          <i class="bi bi-people-fill"></i>
          <div class="card-title">View Rescue Teams</div>
        </div>
      </a>
    </div>

    <!-- Add Victim -->
    <div class="col">
      <a href="add_victim.php" class="text-decoration-none">
        <div class="card text-center shadow-sm p-3">
          <i class="bi bi-person-fill-add"></i>
          <div class="card-title">Add Victim</div>
        </div>
      </a>
    </div>

    <!-- View Victims -->
    <div class="col">
      <a href="view_victims.php" class="text-decoration-none">
        <div class="card text-center shadow-sm p-3">
          <i class="bi bi-person-lines-fill"></i>
          <div class="card-title">View Victims</div>
        </div>
      </a>
    </div>

    <!-- Add Resource -->
    <div class="col">
      <a href="add_resource.php" class="text-decoration-none">
        <div class="card text-center shadow-sm p-3">
          <i class="bi bi-box-seam"></i>
          <div class="card-title">Add Resource</div>
        </div>
      </a>
    </div>

    <!-- View Resources -->
    <div class="col">
      <a href="view_resources.php" class="text-decoration-none">
        <div class="card text-center shadow-sm p-3">
          <i class="bi bi-boxes"></i>
          <div class="card-title">View Resources</div>
        </div>
      </a>
    </div>

  </div>
</div>

</body>
</html>
