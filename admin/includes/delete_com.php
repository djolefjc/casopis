<?php
@session_start();

if(!isset($_SESSION['user_name'])) {

    echo "<script>window.open('../login.php?not_authorize=Nemate dozvolu!','_self')</script>";
}
else {



include('database.php');

if(isset($_GET['delete_com'])) {

    $delete_id = $_GET['delete_com'];

    $run_delete = mysqli_query($con, "DELETE FROM comments WHERE com_id = '$delete_id'" );

    echo "<script>alert('Komentar izbrisan!')</script>";
    echo "<script>window.open('../index.php?view_com', '_self')</script>";
}
}
?>
