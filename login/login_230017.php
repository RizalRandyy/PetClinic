<?php
session_start(); // Start the session
if (isset($_POST['login'])) { // Check POST variable from FORM
  include '../connection_230017.php'; // Call connection

  // Make the query based on username
  $query = "SELECT * FROM users_230017 WHERE username_230017='$_POST[username_230017]'";

  // Run the query
  $login = mysqli_query($db_connection, $query);

  if (mysqli_num_rows($login) > 0) { // Check if the username found or not
    $user = mysqli_fetch_assoc($login); // If user found, extract the data
    if (password_verify($_POST['password_230017'], $user['password_230017'])) { // Verify the password

      // If password match, then make session variable
      $_SESSION['login'] = TRUE;
      $_SESSION['userid'] = $user['userid_230017'];
      $_SESSION['username'] = $user['username_230017'];
      $_SESSION['password'] = $user['password_230017'];
      $_SESSION['usertype'] = $user['usertype_230017'];
      $_SESSION['fullname'] = $user['fullname_230017'];
      $_SESSION['photo'] = $user['photo_230017'];

      // Success login message
      echo "<script>
              alert('Login success!');
              window.location.replace('../index.php');
            </script>";
    } else { // Password did not match
      // Wrong password message then redirect to login form
      echo "<script>
              alert('Login failed, wrong password!');
              window.location.replace('form_login_230017.php');
            </script>";
    }
  } else { // User not found
    // Login failed massage then redirect to login form
    echo "<script>
            alert('Login failed, user not found!');
            window.location.replace('form_login_230017.php');
          </script>";
  }
}
