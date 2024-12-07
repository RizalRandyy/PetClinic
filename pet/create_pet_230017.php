<?php
// echo $_POST['pet_name_230017'] . "<br>";
// echo $_POST['pet_type_230017'] . "<br>";
// echo $_POST['pet_gender_230017'] . "<br>";
// echo $_POST['pet_age_230017'] . "<br>";
// echo $_POST['pet_owner_230017'] . "<br>";
// echo $_POST['pet_address_230017'] . "<br>";
// echo $_POST['pet_phone_230017'] . "<br>";
if (isset($_POST['save'])) { //check variable POST from FORM
  include "../connection_230017.php"; //call connection php mysql

  // SQL query INSERT INTO VALUES
  $query = "INSERT INTO pets_230017 (pet_name_230017, pet_type_230017, pet_gender_230017, pet_age_230017, pet_owner_230017, pet_address_230017, pet_phone_230017) VALUES ('$_POST[pet_name_230017]', '$_POST[pet_type_230017]', '$_POST[pet_gender_230017]', '$_POST[pet_age_230017]', '$_POST[pet_owner_230017]', '$_POST[pet_address_230017]', '$_POST[pet_phone_230017]')";

  $create = mysqli_query($db_connection, $query);

  if ($create) { //check if query True/success
    // echo "<p>Pet added successfully!</p>"; //success message html version
    echo "<script>alert('Pet added successfully!');</script>"; //success message js version
  } else { 
    // echo "<p>Pet add failed!</p>"; //Fail message html version
    echo "<script>alert('Pet add failed!');</script>"; //fail message js version
  }
}
?>

<!-- <p><a href="read_pet_230017.php">Back To Pets List</a></p> -->

<script>window.location.replace("read_pet_230017.php");</script>