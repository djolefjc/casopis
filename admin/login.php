<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style1.css" />
    <title></title>
  </head>
  <body>
    <div class="container-login">

    <div class="login">
      <span class="login-text">Login</span>
      <form method="post" action="index.php">
        <input type="text" name="u" placeholder="Username" required="required" />
        <br />
        <input type="password" name="p" placeholder="Password" required="required" />
        <br />
        <button type="submit" class="login-button" name="login">Login</button>
      </form>
    </div> <!-- END login -->

  </div> <!-- END container-login -->
  </body>
</html>

<?php
  include('includes/database.php');

  if(isset($_POST['login'])) {

    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $select_user = "SELECT * FROM users WHERE user_name='$user_name' AND user_password='$user_password'";
    $run_user = mysqli_query($con, $select_user);


    if($user_name =='' or $user_pass)

    if(mysqli_num_rows($run_user)>0) {

      echo "<script>window.open('index.php?logged_in=Uspesno ste se ulogovali!','_self')</script>";

    }

    else {

      echo "alert('Izgleda da niste lepo uneli podatke')";

    }


  }

 ?>
