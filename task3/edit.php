<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

     $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $sql = "UPDATE users SET fname='$fname', lname='$lname' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Edit User</h2>
  <form method="post">
    <div class="mb-3">
      <label for="fname" class="form-label">First Name</label>
      <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user['fname']; ?>">
    </div>
    <div class="mb-3">
      <label for="lname" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $user['lname']; ?>">
    </div>
    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="read.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
