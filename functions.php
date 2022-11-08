<?php

require_once('db.php');
echo '<script src="jquery-3.6.0.min.js"></script>';

//klientai=============================
if (isset($_POST['naujas_klientas'])) {
  $vardas = htmlspecialchars($_POST['vardas']);
  $pavarde = htmlspecialchars($_POST['pavarde']);
  $el_pastas = htmlspecialchars($_POST['el_pastas']);
  $tel_nr = htmlspecialchars($_POST['tel_nr']);
  $miestas = htmlspecialchars($_POST['miestas']);
  $gatve = htmlspecialchars($_POST['gatve']);

  if ( !empty($vardas) && !empty($pavarde) && !empty($el_pastas) && !empty($tel_nr) && !empty($miestas) && !empty($gatve)) {
		$sql = "INSERT INTO klientai (vardas, pavarde, el_pastas, tel_nr, miestas, gatve) VALUES ('$vardas', '$pavarde', '$el_pastas', $tel_nr, '$miestas', '$gatve')";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
			header("Location: klientai.php");
			exit();
		}
	}
}

if (isset($_POST['redaguoti_klienta'])) {
  $kliento_id = htmlspecialchars($_POST['kliento_id']);
  $vardas = htmlspecialchars($_POST['vardas']);
  $pavarde = htmlspecialchars($_POST['pavarde']);
  $el_pastas = htmlspecialchars($_POST['el_pastas']);
  $tel_nr = htmlspecialchars($_POST['tel_nr']);
  $miestas = htmlspecialchars($_POST['miestas']);
  $gatve = htmlspecialchars($_POST['gatve']);

  if ( !empty($vardas) && !empty($pavarde) && !empty($el_pastas) && !empty($tel_nr) && !empty($miestas) && !empty($gatve)) {
		$sql = "UPDATE klientai SET  vardas='$vardas', pavarde='$pavarde', el_pastas='$el_pastas', tel_nr=$tel_nr, miestas='$miestas', gatve='$gatve' WHERE kliento_id=$kliento_id ";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
			header("Location: klientai.php");
			exit();
		}
	}
}

if (isset($_GET['istrinti_klienta']) && is_numeric($_GET['istrinti_klienta'])) {
  $sql = "DELETE FROM  klientai WHERE kliento_id={$_GET['istrinti_klienta']}";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo mysqli_error($conn);
    exit();
  }else {
    header("Location: klientai.php");
    exit();
  }
}
//=====================
//Automobiliai========
if (isset($_POST['naujas_automobilis'])) {
  $marke = htmlspecialchars($_POST['marke']);
  $modelis = htmlspecialchars($_POST['modelis']);
  $pagaminimo_metai = htmlspecialchars($_POST['pagaminimo_metai']);
  $rida = htmlspecialchars($_POST['rida']);
  $tipas = htmlspecialchars($_POST['tipas']);
  $ar_parduodama = htmlspecialchars($_POST['ar_parduodama']);
  $ar_nuomojama = htmlspecialchars($_POST['ar_nuomojama']);
  $pardavimo_kaina = htmlspecialchars($_POST['pardavimo_kaina']);
  $nuomos_kaina = htmlspecialchars($_POST['nuomos_kaina']);
  $fileName = basename($_FILES["image"]["name"]);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
  $allowTypes = array('jpg','png','jpeg','gif');
  if(in_array($fileType, $allowTypes)){
      $image = $_FILES['image']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
    }

  if ( !empty($marke) && !empty($modelis) && !empty($pagaminimo_metai) && !empty($rida) && !empty($tipas) && !empty($image)) {
    if(!isset($ar_parduodama) || trim($ar_parduodama) == '' || !isset($pardavimo_kaina) || trim($pardavimo_kaina) == ''){
      $sql = "INSERT INTO automobiliai (marke, modelis, pagaminimo_metai, rida, tipas, ar_parduodama, ar_nuomojama, pardavimo_kaina, nuomos_kaina, nuotrauka) VALUES ('$marke', '$modelis', $pagaminimo_metai, $rida, '$tipas', 0, $ar_nuomojama, 0, $nuomos_kaina, '$imgContent')";
    }
    elseif (!isset($ar_nuomojama) || trim($ar_nuomojama) == '' || !isset($nuomos_kaina) || trim($nuomos_kaina) == '') {
      $sql = "INSERT INTO automobiliai (marke, modelis, pagaminimo_metai, rida, tipas, ar_parduodama, ar_nuomojama, pardavimo_kaina, nuomos_kaina, nuotrauka) VALUES ('$marke', '$modelis', $pagaminimo_metai, $rida, '$tipas', $ar_parduodama, 0, $pardavimo_kaina, 0, '$imgContent')";
    }
    else{
    $sql = "INSERT INTO automobiliai (marke, modelis, pagaminimo_metai, rida, tipas, ar_parduodama, ar_nuomojama, pardavimo_kaina, nuomos_kaina, nuotrauka) VALUES ('$marke', '$modelis', $pagaminimo_metai, $rida, '$tipas', $ar_parduodama, $ar_nuomojama, $pardavimo_kaina, $nuomos_kaina, '$imgContent')";
  }
    $result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
			header("Location: index.php");
			exit();
		}
	}
}

if (isset($_POST['redaguoti_automobili'])) {
  $auto_id = htmlspecialchars($_POST['auto_id']);
  $marke = htmlspecialchars($_POST['marke']);
  $modelis = htmlspecialchars($_POST['modelis']);
  $pagaminimo_metai = htmlspecialchars($_POST['pagaminimo_metai']);
  $rida = htmlspecialchars($_POST['rida']);
  $tipas = htmlspecialchars($_POST['tipas']);
  $ar_parduodama = htmlspecialchars($_POST['ar_parduodama']);
  $ar_nuomojama = htmlspecialchars($_POST['ar_nuomojama']);
  $pardavimo_kaina = htmlspecialchars($_POST['pardavimo_kaina']);
  $nuomos_kaina = htmlspecialchars($_POST['nuomos_kaina']);
  $fileName = basename($_FILES["image"]["name"]);
  $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
  $allowTypes = array('jpg','png','jpeg','gif');
  if(in_array($fileType, $allowTypes)){
      $image = $_FILES['image']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
    }

  if ( !empty($marke) && !empty($modelis) && !empty($pagaminimo_metai) && !empty($rida) && !empty($tipas)) {
     if ( isset( $_FILES["image"] ) && !empty( $_FILES["image"]["name"] ) ) {
      $sql = "UPDATE automobiliai SET  marke='$marke', modelis='$modelis', pagaminimo_metai='$pagaminimo_metai', rida=$rida, tipas='$tipas', ar_parduodama=$ar_parduodama, ar_nuomojama=$ar_nuomojama, pardavimo_kaina=$pardavimo_kaina, nuomos_kaina=$nuomos_kaina, nuotrauka='$imgContent'  WHERE auto_id=$auto_id ";
    }
    else{
		$sql = "UPDATE automobiliai SET  marke='$marke', modelis='$modelis', pagaminimo_metai='$pagaminimo_metai', rida=$rida, tipas='$tipas', ar_parduodama=$ar_parduodama, ar_nuomojama=$ar_nuomojama, pardavimo_kaina=$pardavimo_kaina, nuomos_kaina=$nuomos_kaina  WHERE auto_id=$auto_id ";
    }
    $result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
			header("Location: index.php");
			exit();
		}
}
}

if (isset($_GET['istrinti_auto']) && is_numeric($_GET['istrinti_auto'])) {
  $sql = "DELETE FROM  automobiliai WHERE auto_id={$_GET['istrinti_auto']}";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo mysqli_error($conn);
    exit();
  }else {
    header("Location: index.php");
    exit();
  }
}

//===============
//Pardavimai=================
if (isset($_POST['naujas_pardavimas'])) {
  $automobiliai_id = htmlspecialchars($_POST['automobiliai_id']);
  $klientai_id = htmlspecialchars($_POST['klientai_id']);
  $pardavimo_data = htmlspecialchars($_POST['pardavimo_data']);
  $gauta_suma = htmlspecialchars($_POST['gauta_suma']);
  $statusas = htmlspecialchars($_POST['statusas']);

  if ( !empty($automobiliai_id) && !empty($klientai_id) && !empty($pardavimo_data) && !empty($gauta_suma) && !empty($statusas)) {
		$sql = "INSERT INTO parduoti_auto (auto_id, kliento_id, pardavimo_data, gauta_suma, statusas) VALUES ($automobiliai_id, $klientai_id, '$pardavimo_data', $gauta_suma, '$statusas')";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
			header("Location: parduoti_auto.php");
			exit();
		}
	}
}

if (isset($_POST['patvirtinti_p'])) {

  $automobilio_id = htmlspecialchars($_POST['auto_id']);
  $kliento_id = htmlspecialchars($_POST['kliento_id']);
  $pardavimo_data = date('Y-m-d');
  $gauta_suma = htmlspecialchars($_POST['gauta_suma']);

  if ( !empty($automobilio_id) && !empty($kliento_id) && !empty($gauta_suma)) {
    $sql = "UPDATE automobiliai SET ar_parduodama = 0 WHERE auto_id=$automobilio_id";
    $result = mysqli_query($conn, $sql);
		$sql = "INSERT INTO parduoti_auto (auto_id, kliento_id, pardavimo_data, gauta_suma, statusas) VALUES ($automobilio_id, $kliento_id, '$pardavimo_data', $gauta_suma, 'Vykdomas')";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
      sleep(5);
			header("Location: livepage.php");
			exit();
		}
	}
}

if (isset($_POST['redaguoti_pardavima'])) {
  $pardavimo_id = htmlspecialchars($_POST['pardavimo_id']);
  $kliento_id = htmlspecialchars($_POST['klientai_id']);
  $auto_id = htmlspecialchars($_POST['automobiliai_id']);
  $pardavimo_data = htmlspecialchars($_POST['pardavimo_data']);
  $gauta_suma = htmlspecialchars($_POST['gauta_suma']);
  $statusas = htmlspecialchars($_POST['statusas']);

  if ( !empty($pardavimo_data) && !empty($gauta_suma) && !empty($statusas) && !empty($kliento_id) && !empty($auto_id)) {
		$sql = "UPDATE parduoti_auto SET  pardavimo_data='$pardavimo_data', gauta_suma=$gauta_suma, statusas='$statusas', kliento_id=$kliento_id, auto_id=$auto_id WHERE pardavimo_id=$pardavimo_id ";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
			header("Location: parduoti_auto.php");
			exit();
		}
	}
}

if (isset($_GET['istrinti_pardavima']) && is_numeric($_GET['istrinti_pardavima'])) {
  $sql = "DELETE FROM  parduoti_auto WHERE pardavimo_id={$_GET['istrinti_pardavima']}";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo mysqli_error($conn);
    exit();
  }else {
    header("Location: parduoti_auto.php");
    exit();
  }
}

//Nuoma==============
if (isset($_POST['nauja_nuoma'])) {
  $automobiliai_id = htmlspecialchars($_POST['automobiliai_id']);
  $klientai_id = htmlspecialchars($_POST['klientai_id']);
  $nuoma_nuo = htmlspecialchars($_POST['nuoma_nuo']);
  $nuoma_iki = htmlspecialchars($_POST['nuoma_iki']);
  $mokama_suma = htmlspecialchars($_POST['mokama_suma']);
  $statusas = htmlspecialchars($_POST['statusas']);

  if ( !empty($automobiliai_id) && !empty($klientai_id) && !empty($nuoma_nuo) && !empty($nuoma_iki) && !empty($mokama_suma) && !empty($statusas)) {
		$sql = "INSERT INTO nuomojami_auto (auto_id, kliento_id, nuoma_nuo, nuoma_iki, mokama_suma, statusas) VALUES ($automobiliai_id, $klientai_id, '$nuoma_nuo', '$nuoma_iki', $mokama_suma, '$statusas')";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
			header("Location: nuomojami_auto.php");
			exit();
		}
	}
}

if (isset($_POST['patvirtinti_n'])) {

  $automobilio_id = htmlspecialchars($_POST['auto_id']);
  $kliento_id = htmlspecialchars($_POST['kliento_id']);
  $nuoma_nuo = htmlspecialchars($_POST['nuoma_nuo']);
  $nuoma_iki = htmlspecialchars($_POST['nuoma_iki']);
  $dienai= htmlspecialchars($_POST['nuomos_kaina']);

  if ( !empty($automobilio_id) && !empty($kliento_id) && !empty($nuoma_nuo) && !empty($nuoma_iki)) {
    $sql = "UPDATE automobiliai SET ar_nuomojama=0 WHERE auto_id=$automobilio_id";
    $result = mysqli_query($conn, $sql);
		$sql = "INSERT INTO nuomojami_auto (auto_id, kliento_id, nuoma_nuo, nuoma_iki, mokama_suma, statusas) VALUES ($automobilio_id, $kliento_id, '$nuoma_nuo', '$nuoma_iki', $dienai, 'Vykdomas')";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
      sleep(5);
			header("Location: livepage.php");
			exit();
		}
	}
}

if (isset($_POST['redaguoti_nuoma'])) {
  $nuomos_id = htmlspecialchars($_POST['nuomos_id']);
  $automobiliai_id = htmlspecialchars($_POST['automobiliai_id']);
  $klientai_id = htmlspecialchars($_POST['klientai_id']);
  $nuoma_nuo = htmlspecialchars($_POST['nuoma_nuo']);
  $nuoma_iki = htmlspecialchars($_POST['nuoma_iki']);
  $mokama_suma = htmlspecialchars($_POST['mokama_suma']);
  $statusas = htmlspecialchars($_POST['statusas']);

  if ( !empty($automobiliai_id) && !empty($klientai_id) && !empty($nuoma_nuo) && !empty($nuoma_iki) && !empty($mokama_suma) && !empty($statusas)) {
		$sql = "UPDATE nuomojami_auto SET  nuoma_nuo='$nuoma_nuo', nuoma_iki='$nuoma_iki', statusas='$statusas', kliento_id=$klientai_id, auto_id=$automobiliai_id, mokama_suma=$mokama_suma WHERE nuomos_id=$nuomos_id ";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			echo mysqli_error($conn);
			exit();
		} else {
			header("Location: nuomojami_auto.php");
			exit();
		}
	}
}

if (isset($_GET['istrinti_nuoma']) && is_numeric($_GET['istrinti_nuoma'])) {
  $sql = "DELETE FROM  nuomojami_auto WHERE nuomos_id={$_GET['istrinti_nuoma']}";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo mysqli_error($conn);
    exit();
  }else {
    header("Location: nuomojami_auto.php");
    exit();
  }
}




 ?>
