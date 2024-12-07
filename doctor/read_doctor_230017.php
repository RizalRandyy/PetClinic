<?php

session_start();
if (!isset($_SESSION['login'])) {
  echo "<script>
          alert('Please login first!');
          window.location.replace('../login/form_login_230017.php');
        </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zal's Pet Clinic</title>
</head>

<body>
  <h1>Zal's Pet Clinic</h1>
  <hr>
  <h3>Doctors List</h3>
  <p><a href="add_doctor_230017.php">Add New Doctor</a></p>
  <table border="1">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Address</th>
      <th>Phone</th>
      <th>Photo</th>
      <th colspan="2">Action</th>
    </tr>
    <?php
    include "../connection_230017.php"; //call connection
    $query = "SELECT * FROM doctors_230017"; //make a sql query
    $doctors = mysqli_query($db_connection,  $query); //run query 
    $i = 1; //Initial counter for numbering
    foreach ($doctors as $data) : //loop to extract data from database
    ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $data["doctor_name_230017"]; ?></td>
        <td><?php echo $data["doctor_gender_230017"]; ?></td>
        <td><?= $data["doctor_address_230017"]; ?></td>
        <td><?= $data["doctor_phone_230017"]; ?></td>
        <td>
          <div style="display: flex; flex-direction: column; align-items: center">
            <img src="../uploads/doctors/<?= $data['doctor_photo_230017'] ?>" width="50" height="50">
          </div>
        </td>
        <td><a href="edit_doctor_230017.php?id=<?php echo $data['doctor_id_230017'] ?>">Edit Doctor</a></td>
        <td><a href="delete_doctor_230017.php?id=<?php echo $data['doctor_id_230017'] ?>">Delete Doctor</a></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <p><a href="../index.php">Back to HOME</a></p>
</body>

</html>