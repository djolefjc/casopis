<?php
@session_start();

if(!isset($_SESSION['user_name'])) {

    echo "<script>window.open('../login.php?not_authorize=Nemate dozvolu!','_self')</script>";
}
else {



 ?>


<div class="insert-cat"> <!-- START insert-cat -->
<form action="index.php?view_cats" method="post">
<div class="insert-cat-text" >
     <span> UBACI NOVU KATEGORIJU</span> <br />
     <div class="insert-cat-input">
    <input type="text" name="new_cat" />
    <input type="submit" name="insert_new_cat" value="Ubaci" />
</div>
</form>
</div> <!-- END insert-cat -->

<?php
include('database.php');

if(isset($_POST['insert_new_cat'])) {

$cat_title = $_POST['new_cat'];

if($cat_title=='') {
    echo "<script>alert('Molim Vas unesite ime kategorije!')</script>";
}
else {
$insert_cat = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";

$run_cat = mysqli_query($con, $insert_cat) or die(mysqli_error($con));

echo "<script>alert('Uspesno ste ubacili novu kategoriju!')</script>";
echo "<script>window.open('index.php?view_cats','_self')</script>";
}
}
}
?>
