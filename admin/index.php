<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="style1.css" rel="stylesheet" type="text/css" />
        <title>insert+</title>
    </head>
    <body>
        <div id="container">

        <div id="head">
            <h1>VASA KONTROLNA STRANICA</h1>
        </div> <!-- END head -->


        <div id="side">
            <div class="menu">
                <a href="index.php?insert_post">
                    IZBACI NOVU VEST
                </a>
            </div>

            <div class="menu">
                <a href="index.php?view_posts">
                    POGLEDAJ SVE OBJAVE
                </a>
            </div>

            <div class="menu">
                <a href="index.php?view_cats">
                    POGLEDAJ SVE KATEGORIJE
                </a>
            </div>

            <div class="menu">
                <a href="index.php?view_com">
                    POGLEDAJ SVE KOMENTARE
                </a>
            </div>

            <div class="menu">
                <a href="index.php?logout">
                    ODJAVI SE
                </a>
            </div>
        </div><!-- END side -->
        <div id="main">
            <div class="notifications">
            <span class='com-notification'>
                    Komentari
                    <?php

                    include('includes/database.php');



                    $run_comments = mysqli_query($con, "SELECT * FROM comments WHERE status = 'unapprove'");

                    $count_comments = mysqli_num_rows($run_comments);

                    echo "( <a href='index.php?view_com'>" . $count_comments . "</a>)";

                     ?>

              </span>
            </div> <!-- END notifications -->
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
