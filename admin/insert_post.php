<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="style1.css" />
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

    <title>+insert</title>
  </head>
  <body>
    <form action="insert_post.php" method="post" enctype="multipart/form-data">

      <table id="table">
        <thead>
          <tr>
          <th colspan="2" id="thead">
             Nova objava
          </th>
          </tr>
        </thead>
        <tbody id="tbody">


        <tr>
          <td class="tekst">
            Naziv:
          <td>
            <input type="text" name="post_title" size="80" />
          </td>
        </tr>
        <tr>
          <td class="tekst">
            Kategorija:
          <td>
            <select name="category_id" id="cat">
                <option value="cat_id">

                </option>
              <?php


              include("includes/database1.php");



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
          </td>
        </tr>
        <tr>
          <td class="tekst">
            Autor:
          <td>
            <input type="text" name="post_author" size="80" />
          </td>
        </tr>
        <tr>
          <td class="tekst">
            Kljucne reci:
          <td>
            <input type="text" name="post_keywords" size="80" />
          </td>
        </tr>
        <tr>
          <td class="tekst">
            Slika:
          <td>
            <input type="file" name="post_image" size="80" />
          </td>
        </tr>
        <tr>
          <td class="tekst">
            Sadrzaj:
          <td>
            <textarea name="post_content" rows="15" cols="80"></textarea>
          </td>
        </tr>
        <tr>
              <td colspan="2">
            <input type="submit" name="submit" value="Objavi" id="button" />
          </td>
        </tr>
        </tbody>
      </table>

    </form>
  </body>

</html>

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
