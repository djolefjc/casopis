<?php

@session_start();

if(!isset($_SESSION['user_name'])) {

    echo "<script>window.open('../login.php?not_authorize=Nemate dozvolu!','_self')</script>";
}
else {



include("database.php");

if(isset($_GET['delete_post'])) {

    $delete_id = $_GET['delete_post'];

    $delete_run = "DELETE FROM posts WHERE post_id = '$delete_id'";

    mysqli_query($con,$delete_run) or die(mysqli_error($con));

    echo "<script> alert('Uspesno ste izbacili objavu!')</script>";
    echo "<script>window.open('../index.php?view_posts','_self')</script>";
}
}
