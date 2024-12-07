<?php

session_start();
if (!isset($_SESSION['login'])) {
  echo "<script>
          alert('Please login first!');
          window.location.replace('../login/form_login_230017.php');
        </script>";
}

if ($_SESSION['usertype'] != 'Manager') {
  echo "<script>
          alert('Access forbidden!');
          window.location.replace('../index.php');
        </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zal's Pet Clinic</title>
</head>

<body>
  <h1>Zal's Pet Clinic</h1>
  <hr>
  <h3>Users List</h3>
  <p><a href="add_user_230017.php">Add New User</a></p>
  <table border="1">
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Type</th>
      <th>Full Name</th>
      <th>Photo</th>
      <th colspan="3">Action</th>
    </tr>
    <?php
    include "../connection_230017.php"; //call connection
    $query = "SELECT * FROM users_230017"; //make a sql query
    $users = mysqli_query($db_connection,  $query); //run query 
    $i = 1; //Initial counter for numbering
    foreach ($users as $data) : //loop to extract data from database
    ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $data["username_230017"]; ?></td>
        <td><?= $data["usertype_230017"]; ?></td>
        <td><?= $data["fullname_230017"]; ?></td>
        <td>
          <div style="display: flex; flex-direction: column; align-items: center">
            <img src="../uploads/users/<?= $data['photo_230017'] ?>" width="50" height="50">
          </div>
        </td>
        <td><a href="edit_user_230017.php?id=<?php echo $data['userid_230017'] ?>">Edit User</a></td>
        <td><a href="delete_user_230017.php?id=<?php echo $data['userid_230017'] ?>">Delete User</a></td>
        <td><a href="reset_password_230017.php?id=<?= $data['userid_230017']; ?>&type=<?= $data['usertype_230017']; ?>" onclick="return confirm('Are you sure reset the password?')">Reset Password</a></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <p><a href="../index.php">Back to HOME</a></p>
</body>

</html>