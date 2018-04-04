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
            <table>
            <th class="view-posts-title" colspan="7"> <h2>SVI KOMENTARE</h2></th>
            <tr>
            <th>ID KOMENTARA</th>

            <th> ID OBJAVE</th>

            <th> KOMENAR    </th>
            <th>IME</th>
            <th> EMAIL  </th>
            <th> STATUS    </th>
            <th> IZBRISI  </th>

        </tr>

        <?php
            include('database.php');

            $run_comments = mysqli_query($con,"SELECT * FROM comments");

            $i = 1;

            while($row_comments = mysqli_fetch_array($run_comments)) {

                $com_id = $row_comments['com_id'];
                $com_email = $row_comments['com_email'];
                $com_name = $row_comments['com_name'];
                $com_text = $row_comments['com_text'];
                $com_date = $row_comments['com_date'];
                $status = $row_comments['status'];
                $post_id = $row_comments['post_id'];


                $post_img_com= mysqli_query($con, "SELECT post_image FROM posts WHERE post_id='$post_id'");
                $row_image = mysqli_fetch_array($post_img_com);

                $post_img = $row_image['post_image'];






         ?>
        <tr>
        <td><?php echo $i++ ?></td>

        <td> <?php echo "<img src='news_images/$post_img'/>" ?> </td>

        <td><?php echo $com_text ?></td>
        <td><?php echo $com_name ?></td>
        <td><?php echo $com_email ?></td>

        <td><?php

        if($status=="approve") {

          echo "<a href='index.php?unapprove=$com_id'>Unapprove</a>";
        }
        elseif($status="unapprove") {
          echo "<a href='index.php?approve=$com_id'>Approve</a>";
        }


        ?></td>


        <td><a href="includes/delete_com.php?delete_com=<?php echo $com_id; ?>">Izbrisi</a></td>

        </tr>

        <?php



    }
         ?>
        </table>
</div> <!--end VIEW CATS -->




  </body>
  </html>

  <?php

}
   ?>

