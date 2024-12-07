<?php
session_start(); // Start the session
if (isset($_POST['change'])) { // Check variable POST from FORM
  include "../connection_230017.php"; // Call connection

  // Encrypt the new password
  $password = password_hash($_POST['new_password_230017'], PASSWORD_DEFAULT);

  // Make query for update password
  $query = "UPDATE users_230017 SET password_230017='$password' WHERE userid_230017='$_SESSION[userid]'";

  // Run the query
  $update = mysqli_query($db_connection, $query);

  if ($update) { // Check query result TRUE/success
    $_SESSION['password'] = $password; // Update data session if success
    // Success message
    echo "<script>
          alert('Change password succeed!');
          window.location.replace('../index.php');
          </script>";
  } else {
    // Failed message
    echo "<script>
            alert('Change password failed!');
            window.location.replace('change_password_230017.php');
          </script>";
  }
}
