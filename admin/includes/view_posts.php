<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="../style1.css" rel="stylesheet" type="text/css" />
        <title></title>
    </head>
    <body>
        <div class="view-posts">
            <table>
            <th class="view-posts-title" colspan="7"> <h2>POGLEDAJTE SVE OBJAVE</h2></th>
            <tr>
            <th>ID OBJAVE</th>
            <th>NAZIV</th>
            <th>AUTOR</th>
            <th>SLIKA</th>
            <th>KOMENTARI</th>
            <th>IZMENI</th>
            <th>IZBRISI</th>
        </tr>

        <?php
            include('database.php');

            $run_posts = mysqli_query($con,"SELECT * FROM posts");

            $i = 1;

            while($row_posts = mysqli_fetch_array($run_posts)) {

                $post_id = $row_posts['post_id'];
                $post_title = $row_posts['post_title'];
                $post_author = $row_posts['post_author'];
                $post_image = $row_posts['post_image'];




         ?>
        <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $post_title ?></td>
        <td><?php echo $post_author ?></td>
        <td><?php echo "<img src='news_images/$post_image' />" ?></td>
        <td>
            <?php
             $run_comments = mysqli_query($con, "SELECT * FROM comments where post_id='$post_id'");

             $count_comments = mysqli_num_rows($run_comments);

             echo $count_comments;
             ?>
        </td>
        <td><a href="index.php?edit_post=<?php echo $post_id; ?>">Izmeni</a></td>
        <td><a href="includes/delete_post.php?delete_post=<?php echo $post_id; ?>">Izbrisi</a></td>

        </tr>

        <?php
    }
         ?>
        </table>
        </div>

    </body>
</html>
