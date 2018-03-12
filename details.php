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
                          if(isset($_GET['post'])) {

                            $post_id = $_GET['post'];

                        $run_posts = mysqli_query($con,  "SELECT * FROM posts WHERE post_id = '$post_id'");




                          while($row_posts = mysqli_fetch_array($run_posts))
                          {


                                  $post_title = $row_posts['post_title'];
                                  $post_date = $row_posts['post_date'];
                                  $post_author = $row_posts['post_author'];
                                  $post_image = $row_posts['post_image'];
                                  $post_content = $row_posts['post_content'];




                                  echo "

                                      <div class='one-post cf'>

                                          <h2 class='one-title' style='font-size:32px; text-align:center;'>
                                           $post_title
                                          </h2>

                                          <div class='one-image'>
                                          <img src='admin/news_images/$post_image'/>

                                          </div>



                                          <div class='one-content'>
                                              $post_content

                                          </div>

                                          <span class='one-date'>
                                           $post_date
                                          </span>
                                          <span class='one-author'>
                                          $post_author
                                          </span>

                                      </div> <br />

                                  ";
                          }
                        }

           ?>

      </div> <!-- end post -->

      <div id="side" >

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

        <div id="social">
          <a href="#"><i class="fab fa-facebook-square fa-3x"></i></a>
            <a href="#"><i class="fab fa-google-plus-square fa-3x"></i></a>
            <a href="#"><i class="fab fa-twitter-square fa-3x"></i></a>
        </div>



    </div><!-- end container -->
  </body>
</html>
