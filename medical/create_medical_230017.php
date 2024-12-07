<?php

if (isset($_POST['save'])) {
  include '../connection_230017.php';

  $query = "INSERT INTO medicals_230017 SET
            pet_id_230017 = '$_POST[pet_id_230017]',
            doctor_id_230017 = '$_POST[doctor_id_230017]',
            symptom_230017 = '$_POST[symptom_230017]',
            diagnose_230017 = '$_POST[diagnose_230017]',
            treatment_230017 = '$_POST[treatment_230017]',
            cost_230017 = '$_POST[cost_230017]'";

  $create = mysqli_query($db_connection, $query);

  if ($create) {
    echo "<script>alert('Medical addedd successfully');</script>";
  } else {
    echo "<script>alert('Medical add failed)</script>";
  }
}
?>

<script>window.location.replace("medicals_pet_230017.php?pet_id=<?=$_POST['pet_id_230017']?>")</script>
