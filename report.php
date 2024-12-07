<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zal's Pet Clinic</title>
</head>

<body>
  <h1>Zal's Pet Clinic</h1>
  <h3>Monthly Report</h3>
  <?php

  $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

  $year = date('Y');

  ?>
  <form>
    <p>Select
      <select name="month" required>
        <option value="">Month</option>
        <?php for ($m = 1; $m <= 12; $m++) { ?>
          <option value="<?= $m ?>"><?= $months[$m - 1] ?></option>
        <?php } ?>
      </select>
      <select name="year">
        <option value="">Year</option>
        <?php for ($y = 0; $y <= 2; $y++) { ?>
          <option value="<?= $year - $y ?>"><?= $year - $y ?></option>
        <?php } ?>
      </select>
      <input type="submit" value="View Report">
    </p>
  </form>
  <?php if (isset($_GET['year'])) {
    include 'connection_230017.php';
    // $query = "SELECT * FROM medicals_230017";
    $query = "SELECT m.mr_date_230017, d.doctor_name_230017, p.pet_name_230017, p.pet_owner_230017, m.cost_230017 FROM medicals_230017 AS m, doctors_230017 AS d, pets_230017 AS p WHERE m.doctor_id_230017=d.doctor_id_230017 AND m.pet_id_230017=p.pet_id_230017 AND MONTH(m.mr_date_230017)='$_GET[month]' AND YEAR(m.mr_date_230017)='$_GET[year]'";
    $report = mysqli_query($db_connection, $query);
  ?>
    <h4>Report Periode <?=$months[$_GET['month']-1]?> - <?=$_GET['year']?></h4>
    <table border="1">
      <tr>
        <th>No</th>
        <th>Date</th>
        <th>Doctor</th>
        <th>Pet</th>
        <th>Owner</th>
        <th>Pay ($)</th>
      </tr>
      <?php 
        if(mysqli_num_rows($report) > 0){
          $i = 0; $total = 0;
          foreach($report as $data) :
            $total = $total + $data['cost_230017'];
      ?>
      <tr>
        <td>&nbsp;</td>
        <td><?=$i++?></td>
        <td><?=$data['mr_date_230017']?></td>
        <td><?=$data['doctor_name_230017']?></td>
        <td><?=$data['pet_name_230017']?></td>
        <td><?=$data['pet_owner_230017']?></td>
        <td align="right"><?=$data['cost_230017']?></td>
      </tr>
      <?php endforeach?>
      <tr>
        <th colspan="7" align="right">Total : $ <?=$total?></th>
      </tr>
      <?php } else {?>
      <tr>
        <td colspan="7" align="center">No record!</td>
        <?php }?>
      </tr>
    </table>
  <?php } ?>
  <p><a href="index.php">Back to HOME</a></p>
</body>

</html>