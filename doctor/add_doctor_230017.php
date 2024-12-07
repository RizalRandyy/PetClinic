<?php

session_start();
if (!isset($_SESSION['login'])) {
  echo "<script>
          alert('Please login first!');
          window.location.replace('../login/form_login_230017.php');
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
  <h3>Form Add Doctor</h3>
  <form action="../doctor/create_doctor_230017.php" method="post">
    <table>
      <tr>
        <td>Name</td>
        <td>
          <input type="text" name="doctor_name_230017" required>
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>
          <input type="radio" name="doctor_gender_230017" value="Male" required> Male
          <input type="radio" name="doctor_gender_230017" value="Female" required> Female
        </td>
      </tr>
      <tr>
        <td>Address</td>
        <td>
          <textarea name="doctor_address_230017" required></textarea>
        </td>
      </tr>
      <tr>
        <td>Phone</td>
        <td>
          <input type="text" name="doctor_phone_230017" required>
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
  <p><a href="read_doctor_230017.php">CANCEL</a></p>
</body>

</html>