<?php
    include('db.php');
    //login================
      $username = $_POST['user'];
      $password = $_POST['pass'];
      $_SESSION['kliento_uname']=$username;

          //to prevent from mysqli injection
          $username = stripcslashes($username);
          $password = stripcslashes($password);
          $username = mysqli_real_escape_string($conn, $username);
          $password = mysqli_real_escape_string($conn, $password);
    
          $sql = "select *from klientai where username = '$username' and password = '$password'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $count = mysqli_num_rows($result);

          if($count == 1){
              header("Location: livepage.php");
          }
          else{
              echo "<h1> Login failed. Invalid username or password.</h1>";
          }
?>
