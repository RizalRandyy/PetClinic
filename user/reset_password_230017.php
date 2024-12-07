<?php

include "../connection_230017.php";

$password = password_hash($_GET['type'], PASSWORD_DEFAULT);

$query = "UPDATE users_230017 SET password_230017='$password' WHERE userid_230017='$_GET[id]'";

$update = mysqli_query($db_connection, $query);

if ($update) {
  echo "<script>alert('Reset password succeeded!')</script>";
} else {
  echo "<script>alert('Reset password failed!')</script>";
}
?>

<script>
  window.location.replace('read_user_230017.php');
</script>