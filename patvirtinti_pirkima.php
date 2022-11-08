<?php require_once('db.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<script src="jquery-3.6.0.min.js"></script>
		<meta charset="utf-8">
		<title>PAVADINIMAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
		<style>
.no-gutters {
  position: relative;
  text-align: center;
  color: white;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
  </head>
	<body>
		<script type="text/javascript">
		    $(document).ready(function () {

		        $('#btnSubmit').click(function () {
		            $('#myAlert').show('fade');
		        });

		        $('#linkClose').click(function () {
		            $('#myAlert').hide('fade');
		        });

		    });
		</script>
    <div class="no-gutters">
      <img src="/images/header1.jpg" alt="Snow" style="width:100%;">
      <div class="centered">
        <h1>Dėkojame, kad renkatės mus</h1>
			</div>
    </div>

		<?php if(isset($_SESSION['error'])):?>
				<div class="alert alert-danger" role="alert"><?=$_SESSION['error']?></div>
			<?php unset($_SESSION['error']); endif ?>

<?php
$sql = "SELECT * FROM klientai";
$visi_klientai = mysqli_query($conn, $sql);
//SELECT * FROM automobiliai WHERE auto_id NOT IN(SELECT auto_id FROM parduoti_auto) AND ar_parduodama = "1";
$geriauto = mysqli_query($conn, $sql);
if (isset($_GET['auto_id']) && is_numeric($_GET['auto_id'])) {/////////

  $auto_id = htmlspecialchars($_GET['auto_id']);
  $sql = "SELECT * FROM automobiliai WHERE auto_id=$auto_id";
  $result = mysqli_query($conn, $sql);
  $pardavimas = mysqli_fetch_assoc($result);
  $uname = $_SESSION['kliento_uname'];
  $sql = "SELECT kliento_id FROM klientai WHERE username='$uname'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $sql = "SELECT pardavimo_kaina FROM automobiliai WHERE auto_id='$auto_id'";
  $result = mysqli_query($conn, $sql);
  $kaina = mysqli_fetch_array($result);
}
?>

<h1>Patvirtinkite užsakymą</h1>

<form class="" action="functions.php" method="post">

<div class="mb-3">
  <input class="form-control" type="hidden" name="kliento_id" value="<?=$row['kliento_id']?>">
</div>

<div class="mb-3">
  <input type="hidden" name="auto_id"  class="form-control" value="<?=$auto_id?>">
</div>

<div class="mb-3">
  <label>Mokėjimo suma:</label>
<input  type="disabled" name="gauta_suma" value="<?=$kaina['pardavimo_kaina']?>"  readonly>
</div>


<div class="mb-3">
<input class=" btn btn btn-primary" type="submit" id="btnSubmit" name="patvirtinti_p" value="Užsakyti">
</div>

</form>
<div  id="myAlert" class="alert alert-success collapse position-sticky bottom-0 end-0">
    <a id="linkClose" href="#" class="close">&times;</a>
    <strong>Užsakymas sėkmingas.</strong> Išsiuntėme tolimesnes instrukcijas į jūsų el. paštą ir telefoną
</div>
<?php require('footer.php') ?>
