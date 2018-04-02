<?php
@session_start();

if(!isset($_SESSION['user_name'])) {

    echo "<script>window.open('../login.php?not_authorize=Nemate dozvolu!','_self')</script>";
}
else {


include('database.php');
include('view_cats.php');

if(isset($_GET['delete_cat'])) {

    $delete_id = $_GET['delete_cat'];

    $run_delete = mysqli_query($con, "DELETE FROM categories WHERE cat_id = '$delete_id'" );

    echo "<script>alert('Kategorija izbrisana!')</script>";
    echo "<script>window.open('../index.php?view_cats','_self')</script>";
}

}
?>
