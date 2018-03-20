<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet" type="text/css" />
        <title>insert+</title>
    </head>
    <body>

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
                <a href="index.php?insert_cat">
                    UBACI NOVU KATEGORIJU
                </a>
            </div>

            <div class="menu">
                <a href="index.php?view_cats">
                    POGLEDAJ SVE KATEGORIJE
                </a>
            </div>

            <div class="menu">
                <a href="index.php?view_comments">
                    POGLEDAJ SVE KOMENTARE
                </a>
            </div>

            <div class="index.php?logout">
                <a href="#">
                    ODJAVI SE
                </a>
            </div>
        </div><!-- END side -->
        <div id="main">

            <?php

            if(isset($_GET['insert_post'])) {


            include("includes/insert_post.php");




            }

            ?>
        </div><!-- END main -->
    </body>
</html>
