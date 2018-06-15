<?php
session_start();

if(!isset($_SESSION['user_name'])) {

    echo "<script>window.open('login.php?not_authorize=Nemate dozvolu!','_self')</script>";
}
else {

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="style1.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <title>insert+</title>
    </head>
    <body>
        <div id="container">

        <div id="head">
          <a href="index.php"><h1>VAŠA KONTROLNA STRANICA</h1></a>
        <a href="index.php"><span><i class="fas fa-home"></i></span></a>
        </div> <!-- END head -->


        <div id="side">
            <div class="menu l">
                <a href="index.php?insert_post">
                    IZBACI NOVU OBJAVU
                </a>
            </div>

            <div class="menu r objave">
                <a href="index.php?view_posts">
                    POGLEDAJ SVE OBJAVE
                </a>
            </div>

            <div class="menu l">
                <a href="index.php?view_cats">
                    POGLEDAJ SVE KATEGORIJE
                </a>
            </div>

            <div class="menu r">
                <a href="index.php?view_com">
                    POGLEDAJ SVE KOMENTARE
                </a>
            </div>

            <div class="menu l odjavise">

                <a href="logout.php">
                    ODJAVI SE
                </a>
            </div>
        </div><!-- END side -->
        <div class="notifications">
        <span class='com-notification'>
                Komentari
                <?php

                include('includes/database.php');



                $run_comments = mysqli_query($con, "SELECT * FROM comments WHERE status = 'unapprove'");

                $count_comments = mysqli_num_rows($run_comments);

                echo "(<a href='index.php?view_com'>" . $count_comments . "</a>)  |";

                 ?>

          </span>
          <span class="vis-notifications">
              <?php
              include('../counter.php');
               ?>

          </span>
        </div> <!-- END notifications -->

        <div id="main">

            <?php


            if(isset($_GET['insert_post'])) {

            include("includes/insert_post.php");

            }
            if(isset($_GET['view_posts'])) {
                include('includes/view_posts.php');
            }

            if(isset($_GET['edit_post'])) {
                include('includes/edit_post.php');
            }

            if(isset($_GET['view_cats'])) {
                include('includes/view_cats.php');
            }

            if(isset($_GET['edit_cats'])) {
                include('includes/edit_cats.php');
            }
            if(isset($_GET['view_com'])) {
              include('includes/view_com.php');

            }
                          if(isset($_GET['approve'])) {
                            include('includes/com_status.php');
                          }
                          if(isset($_GET['unapprove'])) {
                            include('includes/com_status.php');
                          }


            ?>
        </div><!-- END main -->

    </div> <!-- ENC container -->
    </body>
</html>
<?php
}
 ?>
