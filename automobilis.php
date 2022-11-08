<?php require('header.php') ?>

<?php
$edit=false;
if (isset($_GET['auto_id']) && is_numeric($_GET['auto_id'])) {/////////

  $edit=true;
  $auto_id = htmlspecialchars($_GET['auto_id']);
  $sql = "SELECT * FROM automobiliai WHERE auto_id=$auto_id";
  $result = mysqli_query($conn, $sql);
  $automobilis = mysqli_fetch_assoc($result);
}
?>

<h1>Automobilis</h1>

<form class="" action="functions.php" method="post" enctype="multipart/form-data">

  <input type="hidden" name="auto_id" value="<?=$automobilis['auto_id']??''?>">

<div class="mb-3">
  <label>Markė</label>
<input class="form-control" type="text" name="marke" value="<?=$automobilis['marke']??''?>" required>
</div>

<div class="mb-3">
  <label>Modelis</label>
<input class="form-control" type="text" name="modelis" value="<?=$automobilis['modelis']??''?>" required>
</div>

<div class="mb-3">
  <label>Pagaminimo metai</label>
<input class="form-control" type="text" name="pagaminimo_metai" value="<?=$automobilis['pagaminimo_metai']??''?>" required>
</div>

<div class="mb-3">
  <label>Rida</label>
<input class="form-control" type="text" name="rida" value="<?=$automobilis['rida']??''?>" required>
</div>

<div class="mb-3">
  <label>Tipas</label>
<input class="form-control" type="text" name="tipas" value="<?=$automobilis['tipas']??''?>" required>
</div>

<div class="mb-3">
  <label>Parduodama T/N</label>
<input class="form-control" type="text" name="ar_parduodama" value="<?=$automobilis['ar_parduodama']??''?>">
</div>

<div class="mb-3">
  <label>Nuomojama T/N</label>
<input class="form-control" type="text" name="ar_nuomojama" value="<?=$automobilis['ar_nuomojama']??''?>">
</div>

<div class="mb-3">
  <label>Pardavimo kaina</label>
<input class="form-control" type="text" name="pardavimo_kaina" value="<?=$automobilis['pardavimo_kaina']??''?>">
</div>

<div class="mb-3">
  <label>Nuomos kaina</label>
<input class="form-control" type="text" name="nuomos_kaina" value="<?=$automobilis['nuomos_kaina']??''?>">
</div>

<div class="mb-3">
    <label>Nuotrauka:</label>
    <input class="form-control" type="file" name="image" value="data:image/jpg;charset=utf8;base64">
</div>

<div class="mb-3">
<input class="form-control btn btn btn-primary" type="submit" name="<?=($edit)?'redaguoti_automobili':'naujas_automobilis'?>" value="Išsaugoti">
</div>

</form>

<?php require('footer.php') ?>
