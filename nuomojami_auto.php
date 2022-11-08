<?php require('header.php') ?>

<?php

$sql = "SELECT * FROM nuomojami_auto";
$result = mysqli_query($conn, $sql);
?>

<h1>Nuomojami automobiliai</h1>

<a href="nuoma.php" class="btn btn-light m-3">Pridėti naują užsakymą</a>

<table class="table">
<thead>
<tr>
  <th>Nuomos ID</th>
  <th>Automobilio ID</th>
  <th>Kliento ID</th>
  <th>Nuoma nuo</th>
  <th>Nuoma iki</th>
  <th>Mokama suma į dieną</th>
  <th>Statusas</th>
  <th>Veiksmai</th>
</tr>
</thead>
<tbody>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
<tr>
  <td><?=$row ['nuomos_id']?></td>
  <td><?=$row ['auto_id']?></td>
  <td><?=$row ['kliento_id']?></td>
  <td><?=$row ['nuoma_nuo']?></td>
  <td><?=$row ['nuoma_iki']?></td>
  <td><?=$row ['mokama_suma']?></td>
  <td><?=$row ['statusas']?></td>
  <td>
    <a class="btn btn-secondary btn-sm" href="nuoma.php?nuomos_id=<?=$row['nuomos_id']?>">Redaguoti</a>
  <a class="btn btn-danger btn-sm" href="functions.php?istrinti_nuoma=<?=$row['nuomos_id']?>" onclick="return confirm('Ar tikrai istrinti?')">Ištrinti</a>
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
