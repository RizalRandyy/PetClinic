<?php
session_start();

if (isset($_POST['upload'])) { // Check variable POST from FORM
  include '../connection_230017.php'; // Call connection

  $folder = '../uploads/users/'; //Target folder for upload
  if (move_uploaded_file($_FILES['new_photo_230017']['tmp_name'], $folder . $_FILES['new_photo_230017']['name'])) {
    // Success upload, get the photo name
    $photo = $_FILES['new_photo_230017']['name'];

    // Make query for update photo
    $query = "UPDATE users_230017 SET photo_230017='$photo' WHERE userid_230017='$_POST[userid_230017]'";

    // Run the query
    $upload = mysqli_query($db_connection, $query);

    if ($upload) { // Check query result TRUE/success
      if ($_POST['photo_230017'] !== 'default.png') {
        unlink($folder . $_POST['photo_230017']); // Delete old photo

        // Success message
        echo "<script>
                alert('Change photo succeeded!');
                window.location.replace('" . ($_SESSION['usertype'] !== 'Manager' ? '../index.php' : 'read_user_230017.php') . "');
              </script>";
      } else {
        // Failed message
        echo "<script>
                alert('Change photo failed!');
                window.location.replace('change_photo_230017.php?id=$_POST[userid_230017]');
              </script>";
      }
    }
  }
}
