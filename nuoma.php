<?php require('header.php') ?>

<?php
$edit=false;
$sql = "SELECT * FROM klientai";
$visi_klientai = mysqli_query($conn, $sql);
$sql = "SELECT * FROM automobiliai WHERE auto_id NOT IN(SELECT auto_id FROM nuomojami_auto) AND auto_id NOT IN(SELECT auto_id FROM parduoti_auto) AND ar_nuomojama = '1'";
//SELECT * FROM automobiliai WHERE auto_id NOT IN(SELECT auto_id FROM parduoti_auto) AND ar_parduodama = "1";
$geriauto = mysqli_query($conn, $sql);
if (isset($_GET['nuomos_id']) && is_numeric($_GET['nuomos_id'])) {/////////

  $edit=true;
  $nuomos_id = htmlspecialchars($_GET['nuomos_id']);
  $sql = "SELECT * FROM nuomojami_auto WHERE nuomos_id=$nuomos_id";
  $result = mysqli_query($conn, $sql);
  $nuoma = mysqli_fetch_assoc($result);
}
?>

<h1>Nuoma</h1>

<form class="" action="functions.php" method="post">

  <input type="hidden" name="nuomos_id" value="<?=$nuoma['nuomos_id']??''?>">

<div class="mb-3">
  <label>Kliento ID</label>
  <input type="text" name="klientai_id" list="klientu_list" class="form-control" value="<?=$nuoma['kliento_id']??''?>">
  <datalist id="klientu_list">
    <?php while ($row = mysqli_fetch_assoc($visi_klientai)): ?>
      <optgroup label="Theropods">
      <option value="<?=$row['kliento_id']?>"><?=$row['vardas']?></option>
    </optgroup>
    <?php endwhile ?>
  </datalist>
</div>

<div class="mb-3">
  <label>Automobilio ID</label>
  <input type="text" name="automobiliai_id" list="auto_list" class="form-control" value="<?=$nuoma['auto_id']??''?>">
  <datalist id="auto_list">
    <?php while ($row = mysqli_fetch_assoc($geriauto)): ?>
      <optgroup label="Theropods">
      <option value="<?=$row['auto_id']?>"><?=$row['marke']?> <?=$row['modelis']?></option>
    </optgroup>
    <?php endwhile ?>
  </datalist>
</div>

<div class="mb-3">
  <label>Nuoma nuo</label>
<input class="" type="date" name="nuoma_nuo" value="<?=$nuoma['nuoma_nuo']??''?>" required>
</div>

<div class="mb-3">
  <label>Nuoma iki</label>
<input class="" type="date" name="nuoma_iki" value="<?=$nuoma['nuoma_iki']??''?>" required>
</div>

<div class="mb-3">
  <label>Mokama suma</label>
<input class="form-control" type="text" name="mokama_suma" value="<?=$nuoma['mokama_suma']??''?>" required>
</div>

<div class="mb-3">
  <label>Statusas</label>
<input class="form-control" type="text" name="statusas" value="<?=$nuoma['statusas']??''?>" required>
</div>

<div class="mb-3">
<input class="form-control btn btn btn-primary" type="submit" name="<?=($edit)?'redaguoti_nuoma':'nauja_nuoma'?>" value="Išsaugoti">
</div>

</form>

<?php require('footer.php') ?>
