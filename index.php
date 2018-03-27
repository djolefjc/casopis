<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <title>Casopos+</title>
  </head>
  <body>
    <div class="container" class="cf">

      <div id="head" class="cf">
      <a href="index.php"> <img src="images/logo1.png" id="logo" /></a>
    <div class="lock"> <a href="admin/login.php"><i class="fas fa-unlock-alt"></i></a> </div>

      </div> <!-- end head -->
      <div id="navbar" class="cf">


        <ul id="menu">

            <?php

                include('includes/navbar.php');

             ?>

        </ul>


      </div> <!-- end navbar -->
      <div id="main" >

          <?php

            include('includes/main_posts.php');
           ?>

      </div> <!-- end main -->

      <div id="side" >

            <div class="social-side">
              <p>
            Zapratite Nas
          </p>
              <div class="social">
                <a href="#"><i class="fab fa-facebook-square fa-3x"></i></a>
                  <a href="#"><i class="fab fa-google-plus-square fa-3x"></i></a>
                  <a href="#"><i class="fab fa-twitter-square fa-3x"></i></a>
              </div>
            </div>



            <div class="side-title">
               <p>
             Najnovije
           </p>
            </div>

        <?php

              include('includes/side_posts.php');

         ?>

      </div><!-- end side -->
      <div id="footer">

        <div class="social">
          <a href="#"><i class="fab fa-facebook-square fa-3x"></i></a>
            <a href="#"><i class="fab fa-google-plus-square fa-3x"></i></a>
            <a href="#"><i class="fab fa-twitter-square fa-3x"></i></a>
        </div>



    </div><!-- end container -->
  </body>
</html>
