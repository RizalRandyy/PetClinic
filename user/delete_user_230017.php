<?php
if (isset($_GET['id'])) { //check variable POST from FORM
  include "../connection_230017.php"; //call connection php mysql

  // SQL query DELETE FROM WHERE
  $query = "DELETE FROM users_230017 WHERE userid_230017 = '$_GET[id]'";

  $delete = mysqli_query($db_connection, $query);

  if ($delete) { //check if query True/success
    // echo "<p>User added successfully!</p>"; //success message html version
    echo "<script>alert('User deleted successfully!');</script>"; //success message js version
  } else { 
    // echo "<p>User add failed!</p>"; //Fail message html version
    echo "<script>alert('User deleted failed!');</script>"; //fail message js version
  }
}
?>

<!-- <p><a href="read_user_230017.php">Back To Doctor List</a></p> -->

<script>window.location.replace("read_user_230017.php");</script>