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
  <h3>Form Add User</h3>
  <form action="../user/create_user_230017.php" method="post">
    <table>
      <tr>
        <td>Username</td>
        <td>
          <input type="text" name="username_230017" required>
        </td>
      </tr>
      <tr>
        <td>Type</td>
        <td>
          <input type="radio" name="usertype_230017" value="Staff" required> Staff
          <input type="radio" name="usertype_230017" value="Manager" required> Manager
        </td>
      </tr>
      <tr>
        <td>Full Name</td>
        <td>
          <textarea name="fullname_230017" required></textarea>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="save" value="SAVE">
          <input type="reset" name="reset" value="RESET">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>