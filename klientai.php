<?php require('header.php') ?>

<?php

$sql = "SELECT * FROM klientai";
$result = mysqli_query($conn, $sql);
?>

<h1>Klientai</h1>

<a href="klientas.php" class="btn btn-light m-3">Pridėti klientą</a>

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Vardas</th>
  <th>Pavardė</th>
  <th>El. paštas</th>
  <th>Tel. nr.</th>
  <th>Miestas</th>
  <th>Gatvė</th>
  <th>Login</th>
  <th>Uname</th>
  <th>Veiksmai</th>
</tr>
</thead>
<tbody>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
<tr>
  <td><?=$row ['kliento_id']?></td>
  <td><?=$row ['vardas']?></td>
  <td><?=$row ['pavarde']?></td>
  <td><?=$row ['tel_nr']?></td>
  <td><?=$row ['el_pastas']?></td>
  <td><?=$row ['miestas']?></td>
  <td><?=$row ['gatve']?></td>
  <td><?=$row ['username']?></td>
  <td><?=$row ['password']?></td>
  <td>
    <a class="btn btn-secondary btn-sm" href="klientas.php?kliento_id=<?=$row['kliento_id']?>">Redaguoti</a>
  <a class="btn btn-danger btn-sm" href="functions.php?istrinti_klienta=<?=$row['kliento_id']?>" onclick="return confirm('Ar tikrai istrinti?')">Ištrinti</a>
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
