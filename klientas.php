<?php require('header.php') ?>

<?php
$edit=false;
if (isset($_GET['kliento_id']) && is_numeric($_GET['kliento_id'])) {/////////

  $edit=true;
  $kliento_id = htmlspecialchars($_GET['kliento_id']);
  $sql = "SELECT * FROM klientai WHERE kliento_id=$kliento_id";
  $result = mysqli_query($conn, $sql);
  $klientas = mysqli_fetch_assoc($result);
}
?>

<h1>Klientas</h1>

<form class="" action="functions.php" method="post">

  <input type="hidden" name="kliento_id" value="<?=$klientas['kliento_id']??''?>">

<div class="mb-3">
  <label>Vardas</label>
<input class="form-control" type="text" name="vardas" value="<?=$klientas['vardas']??''?>" required>
</div>

<div class="mb-3">
  <label>Pavardė</label>
<input class="form-control" type="text" name="pavarde" value="<?=$klientas['pavarde']??''?>" required>
</div>

<div class="mb-3">
  <label>El. Paštas</label>
<input class="form-control" type="text" name="el_pastas" value="<?=$klientas['el_pastas']??''?>" required>
</div>

<div class="mb-3">
  <label>Tel. nr.</label>
<input class="form-control" type="text" name="tel_nr" value="<?=$klientas['tel_nr']??''?>" required>
</div>

<div class="mb-3">
  <label>Miestas</label>
<input class="form-control" type="text" name="miestas" value="<?=$klientas['miestas']??''?>" required>
</div>

<div class="mb-3">
  <label>Gatvė</label>
<input class="form-control" type="text" name="gatve" value="<?=$klientas['gatve']??''?>" required>
</div>

<div class="mb-3">
<input class="form-control btn btn btn-primary" type="submit" name="<?=($edit)?'redaguoti_klienta':'naujas_klientas'?>" value="Išsaugoti">
</div>

</form>

<?php require('footer.php') ?>
