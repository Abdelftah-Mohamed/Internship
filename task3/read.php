<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Users List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <table class="table table-bordered table-hover">
    <caption>List of users</caption>
    <thead class="table-success">
      <tr>
        <th>id</th>
        <th>First</th>
        <th>Last</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<th scope='row'>" . $row["id"] . "</th>";
              echo "<td>" . $row["fname"] . "</td>";
              echo "<td>" . $row["lname"] . "</td>";
              echo "<td>
                      <a href='edit.php?id=" . $row["id"] . "' class='btn btn-success btn-sm me-2'>Edit</a>
                      <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm me-2'>Delete</a>
                      <a href='insert.php' class='btn btn-primary btn-sm'>Insert</a>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='4'>No users found</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
