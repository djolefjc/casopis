<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

  </head>
  <body>


      <div id="head" class="cf">
      <a href="index.php"> <img src="images/logo1.png" id="logo" /></a>
    <div class="lock"> <a href="admin/login.php"><i class="fas fa-unlock-alt"></i></a> </div>

      </div> <!-- end head -->
      <div id="navbar" class="cf">


        <ul>

            <?php

                include('includes/navbar.php');

             ?>

        </ul>


      </div> <!-- end navbar -->
    <div class="container" class="cf">


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




    </div><!-- end container -->

    <div id="footer">

      <div class="social">
        <a href="#"><i class="fab fa-facebook-square fa-3x"></i></a>
          <a href="#"><i class="fab fa-google-plus-square fa-3x"></i></a>
          <a href="#"><i class="fab fa-twitter-square fa-3x"></i></a>
      </div>


    <script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

  </body>
</html>
