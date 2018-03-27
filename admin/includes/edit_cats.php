<?php@session_start();

if(!isset($_SESSION['user_name'])) {

    echo "<script>window.open('../login.php?not_authorize=Nemate dozvolu!','_self')</script>";
}
else {
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<?php
include('database.php');
  if(isset($_GET['edit_cats'])) {

    $edit_id = $_GET['edit_cats'];

    $run_cat_new = mysqli_query($con, "SELECT * FROM categories WHERE cat_id='$edit_id'") or die(mysqli_error($con));

    while($row_cat = mysqli_fetch_array($run_cat_new)) {

      $cat_id = $row_cat['cat_id'];
      $cat_title = $row_cat['cat_title'];
    }
  }

?>

<div class="insert-cat"> <!-- START insert-cat -->
<form action="" method="post">
<div class="insert-cat-text" >
     <span> PROMENI IME KATEGORIJE </span> <br />
     <div class="insert-cat-input">
    <input type="text" name="new_cat" value="<?php echo $cat_title;?>" />
    <input type="submit" name="update_cat" value="PROMENI"  />
</div>
</form>
</div> <!-- END insert-cat -->

<?php


if(isset($_POST['update_cat'])) {

$cat_title_new = $_POST['new_cat'];


if($cat_title_new=='') {
    echo "<script>alert('Izgleda da niste nista napisali.')</script>";
    echo "<script>window.open('index.php?view_cats','_self')</script>";
}
else {
$update_cat = "UPDATE categories SET cat_title='$cat_title_new' WHERE cat_id='$cat_id'";

$run_update = mysqli_query($con, $update_cat) or die(mysqli_connect_error($con));

echo "<script>alert('Uspesno ste promenili kategoriju!')</script>";
echo "<script>window.open('index.php?view_cats','_self')</script>";

}
}

?>
</body>
</html>
<?php
}
 ?>
