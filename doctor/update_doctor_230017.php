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

  $folder = '../uploads/doctors/'; //Target folder for upload

  if (move_uploaded_file($_FILES['new_photo_230017']['tmp_name'], $folder . $_FILES['new_photo_230017']['name'])) {
    // Success upload, get the photo name
    $photo = $_FILES['new_photo_230017']['name'];

    // SQL query UPDATE SET WHERE
    $query = "UPDATE doctors_230017 SET
            doctor_name_230017 = '$_POST[doctor_name_230017]',
            doctor_gender_230017 = '$_POST[doctor_gender_230017]',
            doctor_address_230017 = '$_POST[doctor_address_230017]',
            doctor_phone_230017 = '$_POST[doctor_phone_230017]',
            doctor_photo_230017 = '$photo'
            WHERE doctor_id_230017 = '$_POST[doctor_id_230017]'; 
            ";

    $update = mysqli_query($db_connection, $query);

    if ($update) { //check if query True/success
      if ($_POST['doctor_photo_230017'] !== 'default.png') {
        unlink($folder . $_POST['doctor_photo_230017']); // Delete old photo
      }

      // echo "<p>Pet update successfully!</p>"; //success message html version
      echo "<script>alert('Doctor updated successfully!');</script>"; //success message js version
    } else {
      // echo "<p>Pet update failed!</p>"; //Fail message html version
      echo "<script>alert('Doctor update failed!');</script>"; //fail message js version
    }
  }
}
?>

<!-- <p><a href="read_doctor_230017.php">Back To Doctor List</a></p> -->

<script>
  window.location.replace("read_doctor_230017.php");
</script>