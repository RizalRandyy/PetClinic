<?php
if (isset($_POST['save'])) { //check variable POST from FORM
  include "../connection_230017.php"; //call connection php mysql

  // create default password
  $password = password_hash($_POST['usertype_230017'], PASSWORD_DEFAULT);

  // SQL query INSERT INTO VALUES
  $query = "INSERT INTO users_230017 (username_230017, password_230017, usertype_230017, fullname_230017) VALUES ('$_POST[username_230017]', '$password', '$_POST[usertype_230017]', '$_POST[fullname_230017]')";

  $create = mysqli_query($db_connection, $query);

  if ($create) { //check if query True/success
    // echo "<p>User added successfully!</p>"; //success message html version
    echo "<script>alert('User added successfully!');</script>"; //success message js version
  } else {
    // echo "<p>User add failed!</p>"; //Fail message html version
    echo "<script>alert('User add failed!');</script>"; //fail message js version
  }
}
?>

<!-- <p><a href="read_user_230017.php">Back To Pets List</a></p> -->

<script>
  window.location.replace("read_user_230017.php");
</script>