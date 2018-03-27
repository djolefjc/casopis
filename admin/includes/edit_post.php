<?php
@session_start();

if(!isset($_SESSION['user_name'])) {

    echo "<script>window.open('../login.php?not_authorize=Nemate dozvolu!','_self')</script>";
}
else {


 ?>
    <script src="../js/ckeditor/ckeditor.js"></script>
    <div class="post-insert">
    <link href="../style1.css" rel="stylesheet" type="text/css" />

    <?php
    include('database.php');
        if(isset($_GET['edit_post'])) {

            $edit_id = $_GET['edit_post'];

            $select_post = "SELECT * FROM posts WHERE post_id = '$edit_id'";

            $run_query = mysqli_query($con, $select_post);

            while ($row_post=mysqli_fetch_array($run_query)) {

                $post_id = $row_post['post_id'];
                $post_title = $row_post['post_title'];
                $post_cat = $row_post['category_id'];
                $post_author = $row_post['post_author'];
                $post_keywords = $row_post['post_keywords'];
                $post_image = $row_post['post_image'];
                $post_content = $row_post['post_content'];

            }
        }

     ?>

    <form action="" method="post" enctype="multipart/form-data">


          <h2>
             IZMENI OBJAVU
         </h2>

         <img src="../images/<?php echo $post_image; ?>"/>
         <p>
            Naziv:
        </p>
         <div class="post-insert-text">
            <input type="text" name="post_title" size="80" value="<?php echo $post_title; ?>" />
          </div> <!-- end post-insert text -->

            <p>
            Autor:
        </p>

             <div class="post-insert-text">

           <input type="text" name="post_author" size="80" value="<?php echo $post_author; ?>"/>

        </div> <!-- END post-insert-author -->
        <p>
        Kljucne reci:
    </p>
         <div class="post-insert-text">
                     <input type="text" name="post_keywords" size="80" value="<?php echo $post_keywords; ?>"/>
        </div> <!-- END post-insert-key -->

        <p class="p-img">    Slika: </p>
            <div class="post-insert-img">
           <input type="file" name="post_image" size="80" />
        </div> <!-- END post-insert-picture -->

        <p class="p-con">   Sadrzaj: </p>
            <div class="post-insert-content">


<textarea name="post_content" id="editor"><?php echo $post_content; ?></textarea>

<script>

CKEDITOR.replace( 'editor' );
CKEDITOR.config.width = 600;

</script>

        </div> <!-- END post-insert-content -->

        <div class="post-insert-cat">
      <p class="post-insert-text">
        Kategorija:
    </p>
        <select name="category_id" id="cat">

          <?php






          $run_cats = mysqli_query($con,"SELECT * FROM categories WHERE cat_id = '$post_cat'");

          while($cats_row = mysqli_fetch_array($run_cats)) {

            $cat_id = $cats_row['cat_id'];
            $cat_title = $cats_row['cat_title'];

            echo "<option value='$cat_id'>
            $cat_title
            </option>";

            $get_more_cats = "SELECT * FROM categories";
            $run_more_cats = mysqli_query($con, $get_more_cats);

            while($row_more_cats = mysqli_fetch_array($run_more_cats)) {

                $cat_id = $row_more_cats['cat_id'];
                $cat_title = $row_more_cats['cat_title'];

                echo "<option value='$cat_id'>
                $cat_title
                </option>";
            }
          }

           ?>
        </select>
    </div> <!-- END post-insert-cat -->

            <input type="submit" name="update" value="Izmeni" id="post-insert-button" />

    </form id="form-post">
</div> <!-- END insert-post -->


<?php

if(isset($_POST['update'])) {
$update_id = $post_id;
 $post_title = $_POST['post_title'];
 $post_date = date('d-m-y');
 $category_id = $_POST['category_id'];
 $post_author = $_POST['post_author'];
 $post_keywords = $_POST['post_keywords'];
 $post_image = $_FILES['post_image']['name'];
 $post_image_tmp = $_FILES['post_image']['tmp_name'];
 $post_content = $_POST['post_content'];

    if($post_title == '' or $category_id=='null' or $post_author==''
     or $post_keywords=='' or $post_image=='' or $post_content=='') {


      echo "<script>alert('Molimo vas popunite sva polja.')</script>";
      echo "<script>window.open('index.php?view_posts','_self')</script>";

}
else {
  move_uploaded_file($post_image_tmp,"news_images/$post_image");

  $update_posts = "UPDATE posts SET category_id='$category_id', post_title='$post_title', post_date='$post_date'
  ,post_author='$post_author',post_keywords='$post_keywords',post_image='$post_image',post_content='$post_content'
  WHERE post_id ='$update_id'";

mysqli_query($con, $update_posts)
 or die(mysqli_error($con));

 echo "<script>alert('Uspesno ste azurirali clanak!')</script>";
 echo "<script>window_open('index.php?view_posts','_self')</script>";

}
}
}
 ?>
