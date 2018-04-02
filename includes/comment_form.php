<?php

  include('includes/database.php');

                        if(isset($_GET['post'])) {

                          $post_id = $_GET['post'];


                          $run_posts = mysqli_query($con,  "SELECT * FROM posts WHERE post_id = '$post_id'");

                          $row = mysqli_fetch_array($run_posts);

                          $post_new_id = $row['post_id'];
                        }

                        $get_comments = "SELECT * FROM comments WHERE post_id= '$post_new_id' AND status='approve'";

                        $run_comments = mysqli_query($con,$get_comments) or die(mysqli_error($con));

                        while($row_comments = mysqli_fetch_array($run_comments)) {

                          $comments_name = $row_comments['com_name'];
                          $comments_text = $row_comments['com_text'];
                          $comments_date = $row_comments['com_date'];

                          echo "

                          <div class='comments'>

                            <div class='comments-name'><p>$comments_name kaze:</h3></div>
                            <span class='comments-date'><p>$comments_date</p></span>
                            <div class='comments-text'><p>$comments_text</p></div>

                          </div>



                          ";

                        }
 ?>






<div class="comment">

<span class="comment-title">
Postavi komentar:
</span>

 <form method="post" action="details.php?post=<?php echo $post_new_id; ?>">

   <div class ="comment-email">
     <span class="com-email">Email:</span>
     <span class="com-email2">
       <input type="text" name="comment_email" />
     </span>
   </div>
   <div class="comment-name">
     <span class="com-name">Ime:</span>
     <span class="com-name2">
       <input type="text" name="comment_name" />
     </span>
   </div>
   <div class="comment-text">
     <span id="com-input2">
     <textarea name="comment_text" cols="60" rows="10" />  </textarea>
   </span>
   </div>
   <div class="com-button">
     <input type="submit" name="submit" value="Objavi" />
   </div>
 </form>

<?php


if(isset($_POST['comment_text'])) {

  $post_com_id = $post_new_id;
  $comment_name = $_POST['comment_name'];
  $comment_email = $_POST['comment_email'];
  $comment_text = $_POST['comment_text'];
  $status = "unapprove";
  $comment_date = date('d-m-Y');

  if($comment_email=='' or $comment_text == '') {
    echo "<script>alert('Molimo Vas popunite sva polja')</script>";
    echo"<scripit>window.open('details.php?post=$post_id')</scripit>";
    exit();
  }

  else {
    $query_comment = "INSERT INTO comments(post_id, com_email, com_name,
    com_text, com_date, status) VALUES ('$post_com_id','$comment_email','$comment_name',
    '$comment_text','$comment_date','$status')";
}

    if(mysqli_query($con, $query_comment)) {
      echo "<script>alert('Vas komentar ce biti izbacen posle odobrenja.')</script>";
      
    }


  }

?>

</div>
