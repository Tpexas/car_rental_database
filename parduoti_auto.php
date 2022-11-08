<?php require('header.php') ?>

<?php

$sql = "SELECT * FROM parduoti_auto";
$result = mysqli_query($conn, $sql);
?>

<h1>Parduoti automobiliai</h1>

<a href="pardavimas.php" class="btn btn-light m-3">Pridėti naują pardavimą</a>

<table class="table">
<thead>
<tr>
  <th>Pardavimo ID</th>
  <th>Automobilio ID</th>
  <th>Kliento ID</th>
  <th>Pardavimo data</th>
  <th>Mokama suma</th>
  <th>Statusas</th>
  <th>Veiksmai</th>
</tr>
</thead>
<tbody>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
<tr>
  <td><?=$row ['pardavimo_id']?></td>
  <td><?=$row ['auto_id']?></td>
  <td><?=$row ['kliento_id']?></td>
  <td><?=$row ['pardavimo_data']?></td>
  <td><?=$row ['gauta_suma']?></td>
  <td><?=$row ['statusas']?></td>
  <td>
    <a class="btn btn-secondary btn-sm" href="pardavimas.php?pardavimo_id=<?=$row['pardavimo_id']?>">Redaguoti</a>
  <a class="btn btn-danger btn-sm" href="functions.php?istrinti_pardavima=<?=$row['pardavimo_id']?>" onclick="return confirm('Ar tikrai istrinti?')">Ištrinti</a>
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
