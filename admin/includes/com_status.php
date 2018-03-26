<?php

include('database.php');


if(isset($_GET['unapprove'])) {

  $unapprove_id = $_GET['unapprove'];

  $run_approve_comment = mysqli_query($con, "UPDATE comments SET status='unapprove' WHERE com_id = '$unapprove_id'") or die(mysqli_error($con));

  echo "<script>alert('Komentar uklonjen')</script>";
  echo "<script>window.open('index.php?view_com','_self')</script>";


}
if(isset($_GET['approve'])) {

  $approve_id = $_GET['approve'];

  $run_unapprove_comment = mysqli_query($con, "UPDATE comments SET status='approve' WHERE com_id ='$approve_id'") or die(mysqli_error($con));

  echo "<script>alert('Komentar izbacen')</script>";
  echo "<script>window.open('index.php?view_com','_self')</script>";

}
 ?>
