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
  <h3>Form Edit Doctor</h3>
  <?php
  // Call connection php mysql
  include "../connection_230017.php";

  // Make query SELECT FROM WHERE
  $query = "SELECT * FROM doctors_230017 WHERE doctor_id_230017='$_GET[id]'";

  // run query
  $doctor = mysqli_query($db_connection, $query);

  // extract query from query result
  $data = mysqli_fetch_assoc($doctor);
  ?>
  <form action="../doctor/update_doctor_230017.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Name</td>
        <td>
          <input type="text" name="doctor_name_230017" value="<?= $data['doctor_name_230017'] ?>" required>
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>
          <input type="radio" name="doctor_gender_230017" value="Male" required <?= ($data['doctor_gender_230017'] == 'Male') ? 'checked' : ''; ?>> Male
          <input type="radio" name="doctor_gender_230017" value="Female" required <?= ($data['doctor_gender_230017'] == 'Female') ? 'checked' : ''; ?>> Female
        </td>
      </tr>
      <tr>
        <td>Address</td>
        <td>
          <textarea name="doctor_address_230017" required><?= $data['doctor_address_230017'] ?></textarea>
        </td>
      </tr>
      <tr>
        <td>Phone</td>
        <td>
          <input type="text" name="doctor_phone_230017" value="<?= $data['doctor_phone_230017'] ?>" required>
        </td>
      </tr>
      <tr>
        <td>Photo</td>
        <td>
          <img src="../uploads/doctors/<?= $data['doctor_photo_230017'] ?>" width="250" height="250">
        </td>
        <tr>
          <td>&nbsp;</td>
          <td><input type="file" name="new_photo_230017" required></td>
        </tr>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="save" value="SAVE">
          <input type="reset" name="reset" value="RESET">
          <input type="hidden" name="doctor_id_230017" value="<?= $data['doctor_id_230017'] ?>">
          <input type="hidden" name="doctor_photo_230017" value="<?=$data['doctor_photo_230017']?>">
        </td>
      </tr>
    </table>
  </form>
  <p><a href="read_doctor_230017.php">CANCEL</a></p>
</body>

</html>