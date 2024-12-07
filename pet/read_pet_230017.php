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
  <h3>Pets List</h3>
  <p><a href="add_pet_230017.php">Add New Pet</a></p>
  <table border="1">
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Type</th>
      <th>Gender</th>
      <th>Age (Month)</th>
      <th>Photo</th>
      <th>Owner</th>
      <th>Address</th>
      <th>Phone</th>
      <th colspan="2">Action</th>
    </tr>
    <?php
    include "../connection_230017.php"; //call connection
    $query = "SELECT * FROM pets_230017"; //make a sql query
    $pets = mysqli_query($db_connection,  $query); //run query 
    $i = 1; //Initial counter for numbering
    foreach ($pets as $data) : //loop to extract data from database
    ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><a href="../medical/medicals_pet_230017.php?pet_id=<?php echo $data['pet_id_230017'] ?>"><?php echo $data["pet_name_230017"]; ?></a></td>
        <td><?php echo $data["pet_type_230017"]; ?></td>
        <td><?php echo $data["pet_gender_230017"]; ?></td>
        <td><?php echo $data["pet_age_230017"]; ?></td>
        <td>
          <div style="display: flex; flex-direction: column; align-items: center">
            <img src="../uploads/pets/<?= $data['pet_photo_230017'] ?>" width="50" height="50">
            <a href="pet_photo_230017.php?id=<?= $data['pet_id_230017']; ?>">Change Photo</a>
          </div>
        </td>
        <td><?= $data["pet_owner_230017"]; ?></td>
        <td><?= $data["pet_address_230017"]; ?></td>
        <td><?= $data["pet_phone_230017"]; ?></td>
        <td><a href="edit_pet_230017.php?id=<?= $data['pet_id_230017']; ?>">Edit Pet</a></td>
        <td><a href="delete_pet_230017.php?id=<?= $data['pet_id_230017']; ?>" onclick="return confirm('Are you sure?')">Delete Pet</a></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <p><a href="../index.php">Back to HOME</a></p>
</body>

</html>