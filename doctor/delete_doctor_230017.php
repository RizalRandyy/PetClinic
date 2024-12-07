<?php
if (isset($_GET['id'])) { //check variable POST from FORM
  include "../connection_230017.php"; //call connection php mysql

  // SQL query DELETE FROM WHERE
  $query = "DELETE FROM doctors_230017 WHERE doctor_id_230017 = '$_GET[id]'";

  $delete = mysqli_query($db_connection, $query);

  if ($delete) { //check if query True/success
    // echo "<p>Doctor added successfully!</p>"; //success message html version
    echo "<script>alert('Doctor deleted successfully!');</script>"; //success message js version
  } else { 
    // echo "<p>Doctor add failed!</p>"; //Fail message html version
    echo "<script>alert('Doctor deleted failed!');</script>"; //fail message js version
  }
}
?>

<!-- <p><a href="read_doctor_230017.php">Back To Doctor List</a></p> -->

<script>window.location.replace("read_doctor_230017.php");</script>