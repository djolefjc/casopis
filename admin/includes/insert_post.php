
    <script src="../js/ckeditor/ckeditor.js"></script>
    <div class="post-insert">

    <form action="insert_post.php" method="post" enctype="multipart/form-data">


          <h2>
             Nova objava
         </h2>

         <p>
            Naziv:
        </p>
         <div class="post-insert-text">
            <input type="text" name="post_title" size="80" />
          </div> <!-- end post-insert text -->

            <p>
            Autor:
        </p>

             <div class="post-insert-text">

           <input type="text" name="post_author" size="80" />

        </div> <!-- END post-insert-author -->
        <p>
        Kljucne reci:
    </p>
         <div class="post-insert-text">
                     <input type="text" name="post_keywords" size="80" />
        </div> <!-- END post-insert-key -->

        <p class="p-img">    Slika: </p>
            <div class="post-insert-img">
            <input type="file" name="post_image" size="80" />
        </div> <!-- END post-insert-picture -->

        <p class="p-con">   Sadrzaj: </p>
            <div class="post-insert-content">


<textarea name="post_content" id="editor"></textarea>

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
            <option value="<?php$cat_id ?>">

            </option>
          <?php


          include("includes/database.php");



          $run_cats = mysqli_query($con,"select * from categories");

          while($cats_row = mysqli_fetch_array($run_cats)) {

            $cat_id = $cats_row['cat_id'];
            $cat_title = $cats_row['cat_title'];

            echo "<option value='$cat_id'>
            $cat_title
            </option>";
          }

           ?>
        </select>
    </div> <!-- END post-insert-cat -->

            <input type="submit" name="submit" value="Objavi" id="post-insert-button" />

    </form id="form-post">
</div> <!-- END insert-post -->


<?php

if(isset($_POST['submit'])) {

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
      echo "<script>window.open('insert_post.php','_self')</script>";

}
else {
  move_uploaded_file($post_image_tmp,"images/$post_image");

  $insert_posts = "INSERT INTO posts(category_id, post_title, post_date,
  post_author, post_keywords, post_image, post_content)
   VALUES ($category_id,'$post_title'
  ,'$post_date','$post_author','$post_keywords','$post_image','$post_content')";

$cc = mysqli_query($con, $insert_posts)
 or die(mysqli_error($con));

 echo "<script>alert('Uspesno ste objavili novi clanak!')</script>";

}
}
 ?>
