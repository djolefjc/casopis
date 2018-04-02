<?php
@session_start();

if(!isset($_SESSION['user_name'])) {

    echo "<script>window.open('../login.php?not_authorize=Nemate dozvolu!','_self')</script>";
}
else {



 ?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="../style1.css" rel="stylesheet" type="text/css" />
        <title></title>
    </head>
    <body>
        <div class="view-posts">
            <table class="cat-tab">
            <th class="view-posts-title" colspan="7"> <h2>POGLEDAJTE SVE OBJAVE</h2></th>
            <tr>
            <th>ID KATEOGRIJE</th>
            <th> IME KATEGORIJE    </th>
            <th>IZMENI</th>
            <th> IZBRISI  </th>
        </tr>

        <?php
            include('database.php');

            $run_cats = mysqli_query($con,"SELECT * FROM categories");

            $i = 1;

            while($row_cats = mysqli_fetch_array($run_cats)) {

                $cat_id = $row_cats['cat_id'];
                $cat_title = $row_cats['cat_title'];




         ?>
        <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $cat_title ?></td>



        <td><a href="index.php?edit_cats=<?php echo $cat_id; ?>">Izmeni</a></td>
        <td><a href="includes/delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Izbrisi</a></td>

        </tr>

        <?php
    }
         ?>
        </table>
    </div> <!--end VIEW CATS -->

<?php
        include('insert_cat.php');
 ?>


    </body>
</html>

<?php
}
 ?>
