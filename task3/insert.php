<?php
include 'db.php';

if (isset($_POST['insert'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $sql = "INSERT INTO users (fname, lname) VALUES ('$fname', '$lname')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Add New User</h2>
  <form method="post">
    <div class="mb-3">
      <label for="fname" class="form-label">First Name</label>
      <input type="text" class="form-control" id="fname" name="fname" required>
    </div>
    <div class="mb-3">
      <label for="lname" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lname" name="lname" required>
    </div>
    <button type="submit" name="insert" class="btn btn-primary">Add User</button>
    <a href="read.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>