<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zal's Pet Clinic</title>
</head>

<body>
  <h1>Zal's Pet Clinic</h1>
  <h3>Medical Records</h3>

  <?php
  include "../connection_230017.php";
  $querypet = "SELECT * FROM pets_230017 WHERE pet_id_230017='$_GET[pet_id]'";

  $pet = mysqli_query($db_connection, $querypet);

  $data1 = mysqli_fetch_assoc($pet);

  //query one table
  //$querymed = "SELECT * FROM medicals_230017 WHERE pet_id_230017='$_GET[pet_id]'";

  // query two table
  $querymed = "SELECT * FROM medicals_230017 AS m, doctors_230017 AS d WHERE m.pet_id_230017='$_GET[pet_id]' AND m.doctor_id_230017 = d.doctor_id_230017";
  $medicals = mysqli_query($db_connection, $querymed);
  ?>

  <table>
    <tr>
      <td>Pet Id/Name</td>
      <td>: <?php echo $data1['pet_id_230017'] ?> / <?php echo $data1['pet_name_230017'] ?></td>
    </tr>
    <tr>
      <td>Pet Type/Gender/Age</td>
      <td>: <?php echo $data1['pet_type_230017'] ?> / <?php echo $data1['pet_gender_230017'] ?> / <?php echo $data1['pet_age_230017'] ?></td>
    </tr>
    <tr>
      <td>Owner</td>
      <td>: <?php echo $data1['pet_owner_230017'] ?> / <?php echo $data1['pet_address_230017'] ?> / <?php echo $data1['pet_phone_230017'] ?></td>
    </tr>
  </table>
  <p><a href="add_medical_230017.php?pet_id=<?php echo $data1['pet_id_230017'] ?>">Add New Record</a></p>
  <table border="1">
    <tr>
      <th>No</th>
      <th>Date</th>
      <th>Doctor</th>
      <th>Diagnose</th>
      <th>Treatment</th>
      <th>Cost ($)</th>
    </tr>

    <?php
    if (mysqli_num_rows($medicals) > 0) {
      $i = 1;
      foreach ($medicals as $data2) :

    ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo date('l, d M Y H:i:s', strtotime($data2['mr_date_230017'])) ?></td>
          <td><?php echo $data2['doctor_name_230017'] ?></td>
          <td><?php echo $data2['symptom_230017'] ?></td>
          <td><?php echo $data2['diagnose_230017'] ?></td>
          <td><?php echo $data2['treatment_230017'] ?></td>
          <td><?php echo $data2['cost_230017'] ?></td>
        </tr>
      <?php
      endforeach;
    } else {
      ?>
      <tr>
        <td colspan="7" align="center">No record !</td>
      </tr>
    <?php } ?>
  </table>

  <p><a href="../pet/read_pet_230017.php">Back to Pets List</a></p>
</body>

</html>