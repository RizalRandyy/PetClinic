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
  <h3>Form Edit User</h3>
  <?php

  include '../connection_230017.php';

  $query = "SELECT * FROM users_230017 WHERE userid_230017='$_GET[id]'";

  $user = mysqli_query($db_connection, $query);

  $data = mysqli_fetch_assoc($user);

  ?>
  <form action="update_user_230017.php" method="post">
    <table>
      <tr>
        <td>Username</td>
        <td>
          <input type="text" name="username_230017" value="<?php echo $data['username_230017'] ?>" required>
        </td>
      </tr>
      <tr>
        <td>Type</td>
        <td>
          <input type="radio" name="usertype_230017" value="Staff" required <?php echo ($data['usertype_230017'] == 'Staff') ? 'checked' : ''; ?>> Staff
          <input type="radio" name="usertype_230017" value="Manager" required <?php echo ($data['usertype_230017'] == 'Manager') ? 'checked' : ''; ?>> Manager
        </td>
      </tr>
      <tr>
        <td>Full Name</td>
        <td>
          <textarea name="fullname_230017" required><?php echo $data['fullname_230017'] ?></textarea>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="save" value="SAVE">
          <input type="reset" name="reset" value="RESET">
          <input type="hidden" name="userid_230017" value="<?= $data['userid_230017'] ?>">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>