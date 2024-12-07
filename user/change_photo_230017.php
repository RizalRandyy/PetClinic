<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zal's Pet Clinic</title>
</head>

<body>
  <h1>Zal's Pet Clinic</h1>
  <h3>Change User Photo</h3>
  <?php
  // Call connection php mysql
  include '../connection_230017.php';

  // Make query SELECT FROM WHERE
  $query = "SELECT * FROM users_230017 WHERE userid_230017='$_GET[id]'";

  // Run query
  $user = mysqli_query($db_connection, $query);

  // Extract data from query result
  $data = mysqli_fetch_assoc($user);
  ?>

  <form action="user_upload_230017.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td></td>
        <td>
          <img src="../uploads/users/<?=$data['photo_230017']?>" width="150" height="150">
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
          <input type="hidden" name="photo_230017" value="<?=$data['photo_230017']?>">
          <input type="hidden" name="userid_230017" value="<?=$data['userid_230017']?>">
        </td>
      </tr>
    </table>
  </form>
  <p><a href="../index.php">CANCEL</a></p>
</body>

</html>