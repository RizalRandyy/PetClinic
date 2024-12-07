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
  <h3>Form Add Pet</h3>
  <form action="create_pet_230017.php" method="post">
    <table>
      <tr>
        <td>Name</td>
        <td>
          <input type="text" name="pet_name_230017" required>
        </td>
      </tr>
      <tr>
        <td>Type</td>
        <td>
          <select name="pet_type_230017" required>
            <option value="">Choose</option>
            <option value="Cat">Cat</option>
            <option value="Dog">Dog</option>
            <option value="Reptil">Reptil</option>
            <option value="Bird">Bird</option>
            <option value="Rodent">Rodent</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>
          <input type="radio" name="pet_gender_230017" value="Male" required> Male
          <input type="radio" name="pet_gender_230017" value="Female" required> Female
        </td>
      </tr>
      <tr>
        <td>Age</td>
        <td>
          <input type="number" name="pet_age_230017" required>
        </td>
      </tr>
      <tr>
        <td>Owner</td>
        <td>
          <input type="text" name="pet_owner_230017" required>
        </td>
      </tr>
      <tr>
        <td>Address</td>
        <td>
          <textarea name="pet_address_230017" required></textarea>
        </td>
      </tr>
      <tr>
        <td>Phone</td>
        <td>
          <input type="text" name="pet_phone_230017" required>
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
  <p><a href="read_pet_230017.php">CANCEL</a></p>
</body>

</html>