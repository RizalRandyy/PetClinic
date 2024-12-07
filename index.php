<?php

session_start();
if (!isset($_SESSION['login'])) {
  echo "<script>
          alert('Please login first!');
          window.location.replace('login/form_login_230017.php');
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
  <h3>Welcome to the clinic</h3>
  <ul>
    <li>
      <a href="pet/read_pet_230017.php">Pets List</a>
    </li>
    <li>
      <a href="doctor/read_doctor_230017.php">Doctors List</a>
    </li>
    <?php if ($_SESSION['usertype'] == 'Manager') {?>
    <li>
      <a href="user/read_user_230017.php">Users List</a>
    </li>
    <li>
      <a href="report.php">Monthly Report</a>
    </li>
    <?php } ?>
    <hr>
    <p>Welcome <?=$_SESSION['fullname']?>, you are login as <?=$_SESSION['usertype']?></p>
    <img src="uploads/users/<?=$_SESSION['photo']?>" width="200" height="200">
    <li>
      <a href="user/change_photo_230017.php?id=<?=$_SESSION['userid']?>">Change Photo</a>
    </li>
    <li>
      <a href="user/change_password_230017.php">Change Password</a>
    </li>
    <li>
      <a href="login/logout_230017.php">Logout</a>
    </li>
  </ul>
</body>

</html>