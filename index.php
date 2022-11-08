<?php require('header.php') ?>

<?php

$sql = "SELECT * FROM automobiliai";
$result = mysqli_query($conn, $sql);
?>

<h1>Automobiliai</h1>

<a href="automobilis.php" class="btn btn-primary m-3">Pridėti automobilį</a>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Markė</th>
      <th>Modelis</th>
      <th>Pagaminimo metai</th>
      <th>Rida</th>
      <th>Tipas</th>
      <th>Parduodama T/N</th>
      <th>Nuomojama T/N</th>
      <th>Pardavimo kaina</th>
      <th>Nuomos kaina</th>
      <th>Nuotrauka</th>
      <th>Veiksmai</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?=$row['auto_id']?></td>
        <td><?=$row['marke']?></td>
        <td><?=$row['modelis']?></td>
        <td><?=$row['pagaminimo_metai']?></td>
        <td><?=$row['rida']?></td>
        <td><?=$row['tipas']?></td>
        <td><?=$row['ar_parduodama']?></td>
        <td><?=$row['ar_nuomojama']?></td>
        <td><?=$row['pardavimo_kaina']?></td>
        <td><?=$row['nuomos_kaina']?></td>
        <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['nuotrauka']); ?>"height="100" width="150" /> </td>
        <td>
          <a class="btn btn-secondary btn-sm" href="automobilis.php?auto_id=<?=$row['auto_id']?>">Redaguoti</a>
        <a class="btn btn-danger btn-sm" href="functions.php?istrinti_auto=<?=$row['auto_id']?>" onclick="return confirm('Ar tikrai istrinti?')">Ištrinti</a>
      </td>
      </tr>
    <?php endwhile ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="10"></td>
    </tr>
  </tfoot>
  </table>



<?php require('footer.php') ?>
