<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zal's Pet Clinic</title>
</head>

<body>
  <h1>Zal's Pet Clinic</h1>
  <h3>Change Pet Photo</h3>
  <?php
  // Call connection php mysql
  include '../connection_230017.php';

  // Make query SELECT FROM WHERE
  $query = "SELECT * FROM pets_230017 WHERE pet_id_230017='$_GET[id]'";

  // Run query
  $pet = mysqli_query($db_connection, $query);

  // Extract data from query result
  $data = mysqli_fetch_assoc($pet);
  ?>

  <form action="pet_upload_230017.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td></td>
        <td>
          <img src="../uploads/pets/<?=$data['pet_photo_230017']?>" width="100" height="100">
        </td>
      </tr>
      <tr>
        <td>New Photo</td>
        <td>: <input type="file" name="new_photo_230017" required></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;
          <input type="submit" name="upload" value="UPLOAD">
          <input type="hidden" name="pet_photo_230017" value="<?=$data['pet_photo_230017']?>">
          <input type="hidden" name="pet_id_230017" value="<?=$data['pet_id_230017']?>">
        </td>
      </tr>
    </table>
  </form>
  <p><a href="../pet/read_pet_230017.php">CANCEL</a></p>
</body>

</html>