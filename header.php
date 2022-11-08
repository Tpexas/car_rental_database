<?php require_once('db.php'); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Auto nuoma ir pardavimas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
	<body>

    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="index.php">Automobiliai</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="klientai.php">Klientai</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="nuomojami_auto.php">Nuomojami</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="parduoti_auto.php">Parduoti</a>
      </li>
    </ul>

		<?php if(isset($_SESSION['error'])):?>
				<div class="alert alert-danger" role="alert"><?=$_SESSION['error']?></div>
			<?php unset($_SESSION['error']); endif ?>
