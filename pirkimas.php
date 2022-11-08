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



<input type="text" name="firstname" value="<?php echo $_SESSION["newsession"];?>" />


<?php require('footer.php') ?>
