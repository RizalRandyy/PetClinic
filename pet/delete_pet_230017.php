<?php
// echo $_POST['pet_name_230017'] . "<br>";
// echo $_POST['pet_type_230017'] . "<br>";
// echo $_POST['pet_gender_230017'] . "<br>";
// echo $_POST['pet_age_230017'] . "<br>";
// echo $_POST['pet_owner_230017'] . "<br>";
// echo $_POST['pet_address_230017'] . "<br>";
// echo $_POST['pet_phone_230017'] . "<br>";
if (isset($_GET['id'])) { //check variable POST from FORM
  include "../connection_230017.php"; //call connection php mysql

  // SQL query DELETE FROM WHERE
  $query = "DELETE FROM pets_230017 WHERE pet_id_230017 = '$_GET[id]'";

  $delete = mysqli_query($db_connection, $query);

  if ($delete) { //check if query True/success
    // echo "<p>Pet added successfully!</p>"; //success message html version
    echo "<script>alert('Pet deleted successfully!');</script>"; //success message js version
  } else { 
    // echo "<p>Pet add failed!</p>"; //Fail message html version
    echo "<script>alert('Pet deleted failed!');</script>"; //fail message js version
  }
}
?>

<!-- <p><a href="read_pet_230017.php">Back To Pets List</a></p> -->

<script>window.location.replace("read_pet_230017.php");</script>