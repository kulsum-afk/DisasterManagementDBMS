<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rescue Teams</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-people-fill"></i> Rescue Teams</h4>
            <a href="index.php" class="btn btn-light btn-sm">
                <i class="bi bi-house-door-fill"></i> Dashboard
            </a>
        </div>
        <div class="card-body">
            <a href="add_team.php" class="btn btn-success mb-3">
                <i class="bi bi-plus-circle"></i> Add New Team
            </a>

            <?php
            if (isset($_GET['delete'])) {
                $id = intval($_GET['delete']);
                $conn->query("DELETE FROM rescue_teams WHERE id=$id");
                echo "<div class='alert alert-danger'>Team deleted.</div>";
            }
            ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Members</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query("SELECT * FROM rescue_teams");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = htmlspecialchars($row['id']);
                                $name = htmlspecialchars($row['team_name']);
                                $members = htmlspecialchars($row['members_count']);
                                $contact = htmlspecialchars($row['contact']);

                                echo "<tr>
                                    <td>$id</td>
                                    <td>$name</td>
                                    <td>$members</td>
                                    <td>$contact</td>
                                    <td>
                                        <a class='btn btn-warning btn-sm' href='add_team.php?edit=$id'><i class='bi bi-pencil'></i></a>
                                        <a class='btn btn-danger btn-sm' href='view_teams.php?delete=$id' onclick=\"return confirm('Are you sure you want to delete this team?')\">
                                            <i class='bi bi-trash'></i>
                                        </a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No teams found.</td></tr>";
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
