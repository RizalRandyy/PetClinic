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
  <h3>Form Edit Pet</h3>
  <?php
  // Call connection php mysql
  include "../connection_230017.php";

  // Make query SELECT FROM WHERE
  $query = "SELECT * FROM pets_230017 WHERE pet_id_230017='$_GET[id]'";

  // run query
  $pet = mysqli_query($db_connection, $query);

  // extract query from query result
  $data = mysqli_fetch_assoc($pet);
  ?>
  <form action="../pet/update_pet_230017.php" method="post">
    <table>
      <tr>
        <td>Name</td>
        <td>
          <input type="text" name="pet_name_230017" value="<?= $data['pet_name_230017'] ?>" required>
        </td>
      </tr>
      <tr>
        <td>Type</td>
        <td>
          <select name="pet_type_230017" required>
            <option value="">Choose</option>
            <option value="Cat" <?=($data['pet_type_230017']=='Cat')?'selected':'';?>>Cat</option>
            <option value="Dog" <?=($data['pet_type_230017']=='Dog')?'selected':'';?>>Dog</option>
            <option value="Reptil" <?=($data['pet_type_230017']=='Reptil')?'selected':'';?>>Reptil</option>
            <option value="Bird" <?=($data['pet_type_230017']=='Bird')?'selected':'';?>>Bird</option>
            <option value="Rodent" <?=($data['pet_type_230017']=='Rodent')?'selected':'';?>>Rodent</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>
          <input type="radio" name="pet_gender_230017" value="Male" required <?=($data['pet_gender_230017']=='Male')?'checked':'';?>> Male
          <input type="radio" name="pet_gender_230017" value="Female" required <?=($data['pet_gender_230017']=='Female')?'checked':'';?>> Female
        </td>
      </tr>
      <tr>
        <td>Age</td>
        <td>
          <input type="number" name="pet_age_230017" value="<?= $data['pet_age_230017'] ?>" required>
        </td>
      </tr>
      <tr>
        <td>Owner</td>
        <td>
          <input type="text" name="pet_owner_230017" value="<?= $data['pet_owner_230017'] ?>" required>
        </td>
      </tr>
      <tr>
        <td>Address</td>
        <td>
          <textarea name="pet_address_230017" required><?= $data['pet_address_230017'] ?></textarea>
        </td>
      </tr>
      <tr>
        <td>Phone</td>
        <td>
          <input type="text" name="pet_phone_230017" value="<?= $data['pet_phone_230017'] ?>" required>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" name="save" value="SAVE">
          <input type="reset" name="reset" value="RESET">
          <input type="hidden" name="pet_id_230017" value="<?=$data['pet_id_230017']?>">
        </td>
      </tr>
    </table>
  </form>
  <p><a href="read_pet_230017.php">CANCEL</a></p>
</body>

</html>