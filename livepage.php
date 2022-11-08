<?php require_once('db.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>PAVADINIMAS</title>
		<script src="jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

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

.top {
  position: absolute;
  left: 50%;
	top: 32px;
  transform: translate(-50%, -50%);
	background-color: rgba(191, 191, 191, 0.3);
}

.centered{
	background-color: rgba(191, 191, 191, 0.3);
}

div.card{
  margin-left: 70px !important;
  margin-bottom: 30px;
  display: inline-block;
  vertical-align: text-top;
}
</style>
<link rel="stylesheet" href="style.css"/>
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
				<h3>Paieška</h1>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="row">
    <div class="col">
      <input type="text" name="marke" class="form-control" placeholder="Markė" required>
    </div>
    <div class="col">
      <input type="text" name="tipas" class="form-control" placeholder="Tipas" required>
    </div>
		<div class="col">
      <input type="text" name="metai" class="form-control" placeholder="Metai" required>
    </div>
		<div class="col">
		<button type="submit" name="paieska" class="btn btn-secondary" >Ieškoti</button>
  </div>
</div>
</form>
			</div>
			<div class="top">
				<h1>Automobilių nuoma ir pardavimas</h1>
			</div>

			<div class="top-right">
				<a id="loginas" href="login.php" style="font-size: 30px; color:white; background:gray;">Prisijungti</a>
			</div>
    </div>

		<?php if(isset($_SESSION['error'])):?>
				<div class="alert alert-danger" role="alert"><?=$_SESSION['error']?></div>
			<?php unset($_SESSION['error']); endif ?>
<?php
$final_results = null;
if(isset($_POST["paieska"])){

    $marke=$_POST['marke'];
    $marke=htmlspecialchars($marke);
    $marke=mysqli_real_escape_string($conn,$marke);
		$tipas=$_POST['tipas'];
    $tipas=htmlspecialchars($tipas);
    $tipas=mysqli_real_escape_string($conn,$tipas);
		$metai=$_POST['metai'];
    $metai=htmlspecialchars($metai);
    $metai=mysqli_real_escape_string($conn,$metai);
    $raw_results="select * from automobiliai where (marke like '%" .$marke."%') and (tipas like '%".$tipas."%') and (pagaminimo_metai >= $metai)";
    $final_results=mysqli_query($conn,$raw_results);
}

 ?>

<?php
$i = 0;
if(!is_null($final_results) && mysqli_num_rows($final_results)>0){
        while($results=mysqli_fetch_array($final_results)){
					if($results['ar_nuomojama'] == '1' || $results['ar_parduodama'] == '1'): ?>
			 <div class="card" <?php if ( $i % 5 == 0 ) echo ' class="break"' ?> style="width: 18rem;">
				 <img class="card-img-top" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($results['nuotrauka']); ?>" alt="Card image cap">
				 <div class="card-body">
					 <h5 class="card-title"><?=$results['marke']?> <?=$results['modelis']?></h5>
					 <p class="card-text"><?=$results['tipas']?></p>
				 </div>
				 <ul class="list-group list-group-flush">
					 <li class="list-group-item">Pagaminimo metai <?=$results['pagaminimo_metai']?>m.</li>
					 <li class="list-group-item">Rida <?=$results['rida']?> km</li>

					 <?php
					 if($results['ar_nuomojama'] == '1' && $results['ar_parduodama'] == '1'){
					 echo ' <li class="list-group-item">Kaina: ';echo $results['pardavimo_kaina']; echo'€, nuoma nuo: '; echo $results['nuomos_kaina']; echo'€</li>';
					 echo '</ul>';
					 echo '<div class="card-body">';
					 if(empty($_SESSION['kliento_uname'])) {
		 			echo '<p>Prieš atlikdami užsakymą prisijunkite</p>';
		 		}
		 		else{
					 echo '<a class="btn" href="patvirtinti_pirkima.php?auto_id=';echo $results['auto_id'];echo'" class="card-link">Pirkti</a>'; echo '<a class="btn" href="patvirtinti_nuoma.php?auto_id=';echo $results['auto_id'];echo'" class="card-link">Nuomotis</a>';
				 }
					 echo '</div>';
					 }
					 else if ($results['ar_parduodama'] == '1') {
						 echo ' <li class="list-group-item">Kaina: '; echo $results['pardavimo_kaina']; echo'€</li>';
						 echo '</ul>';
						 echo '<div class="card-body">';
						 if(empty($_SESSION['kliento_uname'])) {
			 			echo '<p>Prieš atlikdami užsakymą prisijunkite</p>';
			 		}
			 		else{
						 echo '<a class="btn" href="patvirtinti_pirkima.php?auto_id=';echo $results['auto_id'];echo'" class="card-link">Pirkti</a>';
					 }
						 echo '</div>';
					 }
					 else if($results['ar_nuomojama'] == '1'){
				 echo ' <li class="list-group-item">Nuoma nuo: '; echo $results['nuomos_kaina']; echo'€</li>';
				 echo '</ul>';
				 echo '<div class="card-body">';
				 if(empty($_SESSION['kliento_uname'])) {
	 			echo '<p>Prieš atlikdami užsakymą prisijunkite</p>';
	 		}
	 		else{
				 echo '<a class="btn" href="patvirtinti_nuoma.php?auto_id=';echo $results['auto_id'];echo'" class="card-link">Nuomotis</a>';
			 }
				 echo '</div>';
			 }
			 echo '</div>';
			  endif;
				$i++;
            }
    }
		else if(!is_null($final_results)){
		        echo '<b style="color:red;">Deja tokio automobilio neturime</b>';
		    }
$sql = "SELECT * FROM automobiliai";
$result = mysqli_query($conn, $sql);
?>
<?php
if(is_null($final_results)):
$i = 0;
 while ($row = mysqli_fetch_assoc($result)):
   if($row['ar_nuomojama'] == '1' || $row['ar_parduodama'] == '1'): ?>
<div class="card" <?php if ( $i % 5 == 0 ) echo ' class="break"' ?> style="width: 18rem;">
  <img class="card-img-top" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['nuotrauka']); ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?=$row['marke']?> <?=$row['modelis']?></h5>
    <p class="card-text"><?=$row['tipas']?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Pagaminimo metai <?=$row['pagaminimo_metai']?>m.</li>
    <li class="list-group-item">Rida <?=$row['rida']?> km</li>

    <?php
    if($row['ar_nuomojama'] == '1' && $row['ar_parduodama'] == '1'){
    echo ' <li class="list-group-item">Kaina: ';echo $row['pardavimo_kaina']; echo'€, nuoma nuo: '; echo $row['nuomos_kaina']; echo'€</li>';
    echo '</ul>';
    echo '<div class="card-body">';
		if(empty($_SESSION['kliento_uname'])) {
		echo '<p>Prieš atlikdami užsakymą prisijunkite</p>';
	}
	else{
    echo '<a class="btn btn-outline-success" href="patvirtinti_pirkima.php?auto_id=';echo $row['auto_id'];echo'" class="card-link">Pirkti</a>'; echo '<a class="btn btn-outline-success" href="patvirtinti_nuoma.php?auto_id=';echo $row['auto_id'];echo'" class="card-link">Nuomotis</a>';
	}
		echo '</div>';
    }
    else if ($row['ar_parduodama'] == '1') {
      echo ' <li class="list-group-item">Kaina: '; echo $row['pardavimo_kaina']; echo'€</li>';
      echo '</ul>';
      echo '<div class="card-body">';
			if(empty($_SESSION['kliento_uname'])) {
			echo '<p>Prieš atlikdami užsakymą prisijunkite</p>';
		}
		else{
      echo '<a class="btn btn-outline-success" href="patvirtinti_pirkima.php?auto_id=';echo $row['auto_id'];echo'" class="card-link">Pirkti</a>';
					}
			echo '</div>';
    }
    else if($row['ar_nuomojama'] == '1'){
  echo ' <li class="list-group-item">Nuoma nuo: '; echo $row['nuomos_kaina']; echo'€</li>';
  echo '</ul>';
  echo '<div class="card-body">';
	if(empty($_SESSION['kliento_uname'])) {
	echo '<p>Prieš atlikdami užsakymą prisijunkite</p>';
}
else{
  echo '<a class="btn btn-outline-success" href="patvirtinti_nuoma.php?auto_id=';echo $row['auto_id'];echo'" class="card-link">Nuomotis</a>';
}
	echo '</div>';
}
    ?>
</div>
<?php endif; $i++;
endwhile;
endif; ?>

<div  id="myAlert" class="alert alert-danger collapse position-sticky bottom-0 end-0">
    <a id="linkClose" href="#" class="close">&times;</a>
    <strong>Klaida</strong> Pirmiausia prisijunkite prieš atlikdami užsakymą
</div>

<?php
 require('footer.php') ?>
