<?php
if (isset($_POST['save'])) { //check variable POST from FORM
  include "../connection_230017.php"; //call connection php mysql

  // SQL query UPDATE SET WHERE
  $query = "UPDATE users_230017 SET
            username_230017 = '$_POST[username_230017]',
            password_230017 = '$_POST[password_230017]',
            usertype_230017 = '$_POST[usertype_230017]',
            fullname_230017 = '$_POST[fullname_230017]'
            WHERE userid_230017 = '$_POST[userid_230017]'; 
            ";

  $update = mysqli_query($db_connection, $query);

  if ($update) { //check if query True/success
    // echo "<p>User update successfully!</p>"; //success message html version
    echo "<script>alert('User updated successfully!');</script>"; //success message js version
  } else { 
    // echo "<p>User update failed!</p>"; //Fail message html version
    echo "<script>alert('User update failed!');</script>"; //fail message js version
  }
}
?>

<!-- <p><a href="read_user_230017.php">Back To User List</a></p> -->

<script>window.location.replace("read_user_230017.php");</script>