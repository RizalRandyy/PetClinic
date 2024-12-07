<?php

if (isset($_POST['upload'])) { // Check variable POST from FORM
  include '../connection_230017.php'; // Call connection

  $folder = '../uploads/pets/'; //Target folder for upload
  if (move_uploaded_file($_FILES['new_photo_230017']['tmp_name'], $folder . $_FILES['new_photo_230017']['name'])) {
    // Success upload, get the photo name
    $photo = $_FILES['new_photo_230017']['name'];

    // Make query for update photo
    $query = "UPDATE pets_230017 SET pet_photo_230017='$photo' WHERE pet_id_230017='$_POST[pet_id_230017]'";

    // Run the query
    $upload = mysqli_query($db_connection, $query);

    if ($upload) { // Check query result TRUE/success
      if ($_POST['pet_photo_230017'] !== 'default.png') {
        unlink($folder . $_POST['pet_photo_230017']); // Delete old photo

        // Success message
        echo "<script>
                alert('Change photo succeeded!');
                window.location.replace('read_pet_230017.php');
              </script>";
      } else {
        // Failed message
        echo "<script>
                alert('Change photo failed!');
                window.location.replace('pet_photo_230017.php?id=$_POST[pet_id_230017]');
              </script>";
      }
      // Failed upload
    } else {
      echo "<script>
                alert('Change photo failed!');
                window.location.replace('pet_photo_230017.php?id=$_POST[pet_id_230017]');
              </script>";
    }
  }
}
