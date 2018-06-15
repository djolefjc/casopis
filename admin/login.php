<?php

    session_start();

  if(isset($_POST['login'])) {

     include('includes/database.php');

    $user_name = mysqli_real_escape_string($con,$_POST['user_name']);
    $user_password = mysqli_real_escape_string($con,$_POST['user_password']);

    $encrypt = md5($user_password);

    $select_user = "SELECT * FROM users WHERE user_name='$user_name' AND user_password='$user_password'";

    $run_user = mysqli_query($con, $select_user) or die(mysqli_error($con));

    $num_user = mysqli_num_rows($run_user);

    if($num_user>0) {

        $_SESSION['user_name'] = $user_name;

      echo "<script>window.open('index.php?logged=Uspesno ste se ulogovali!','_self')</script>";

    }

    else {

      echo "<script>alert('Izgleda da niste lepo uneli podatke')</script>";

    }

  }

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style1.css" />
    <title></title>
  </head>
  <body>
    <div class="container-login">

    <div class="login-form">
      <h2>Login</h2>
      <form method="post" action="">
        <input type="text" name="user_name" placeholder="Korisnicki nalog" required="required" />
        <br />
        <input type="password" name="user_password" placeholder="Korisnicka sifra" required="required" />
        <br />
        <input type="submit" class="login-button" name="login" value="Prijavite se"> </input>
      </form>
    </div> <!-- END login -->
    <div class="back-home">
      <a href="../index.php">
        Nazad na pocetnu
        </a>

    </div>
  </div> <!-- END container-login -->
  </body>
</html>
<?php
var_dump($_POST);
?>
