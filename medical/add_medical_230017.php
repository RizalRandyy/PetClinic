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
  <h3>Form Add Medical</h3>
  <?php
  include "../connection_230017.php";
  $querypet = "SELECT * FROM pets_230017 WHERE pet_id_230017='$_GET[pet_id]'";

  $pet = mysqli_query($db_connection, $querypet);

  $data1 = mysqli_fetch_assoc($pet);

  $querymed = "SELECT * FROM medicals_230017 WHERE pet_id_230017='$_GET[pet_id]'";
  $medicals = mysqli_query($db_connection, $querymed);

  $querydoc = "SELECT * FROM doctors_230017";
  $doctors = mysqli_query($db_connection, $querydoc);

  ?>

  <table>
    <tr>
      <td>Pet Id/Name</td>
      <td>: <?php echo $data1['pet_id_230017'] ?> / <?php echo $data1['pet_name_230017'] ?></td>
    </tr>
    <tr>
      <td>Pet Type/Gender/Age</td>
      <td>: <?php echo $data1['pet_type_230017'] ?> / <?php echo $data1['pet_gender_230017'] ?> / <?php echo $data1['pet_age_230017'] ?></td>
    </tr>
    <tr>
      <td>Owner</td>
      <td>: <?php echo $data1['pet_owner_230017'] ?> / <?php echo $data1['pet_address_230017'] ?> / <?php echo $data1['pet_phone_230017'] ?></td>
    </tr>
  </table>
  <hr>

  <form action="create_medical_230017.php" method="post">
    <table>
      <tr>
        <td>Doctor</td>
        <td>
          <select name="doctor_id_230017" required>
            <option value="">Choose</option>
            <?php foreach($doctors as $data2) : ?>
            <option value="<?=$data2['doctor_id_230017']?>"><?=$data2['doctor_name_230017']?></option>
              <?php endforeach?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Symptom</td>
        <td><textarea name="symptom_230017" required></textarea></td>
      </tr>
      <tr>
        <td>Diagnose</td>
        <td><textarea name="diagnose_230017" required></textarea></td>
      </tr>
      <tr>
        <td>Treatment</td>
        <td><textarea name="treatment_230017" required></textarea></td>
      </tr>
      <tr>
        <td>Cost ($)</td>
        <td><input type="number" name="cost_230017" required></td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="save" value="SAVE">
          <input type="reset" name="reset" value="RESET">
          <input type="hidden" name="pet_id_230017" value="<?php echo $data1['pet_id_230017'] ?>">
        </td>
      </tr>
    </table>
  </form>
  <p><a href="medicals_pet_230017.php?pet_id=<?=$data1['pet_id_230017']?>">CANCEL</a></p>
</body>

</html>