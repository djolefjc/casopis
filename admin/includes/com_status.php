<?php

include('database.php');
include('view_com.php');

if(isset($_GET['unapprove'])) {

  $unapprove_id = $_GET['unapprove'];

  $run_approve_comment = mysqli_query($con, "UPDATE comments SET status='unapprove' WHERE com_id='$com_id'") or die(mysqli_error($con)) ;

  echo "<script>alert('Komentar uklonjen')</script>";


}
if(isset($_GET['approve'])) {

  $approve_id = $_GET['approve'];

  $run_unapprove_comment = mysqli_query($con, "UPDATE comments SET status='approve' WHERE com_id='$com_id'") or die(mysqli_error($con));

  echo "<script>alert('Komentar izbacen')</script>";


}
 ?>
