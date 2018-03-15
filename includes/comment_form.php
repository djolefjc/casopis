<div class="comment">
<span class="comment-title">
Postavi komentar:
</span>

 <form methoc="post" action="details.php?post=<?php echo $post_id; ?>">

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
     <span id="com-input2"
     ><textarea name="comment" cols="60" rows="20" />  </textarea>
   </span>
   </div>
   <div class="com-button">
     <input type="submit" name="submit" value="Objavi" />
   </div>
 </form>

<?php

if(isset($_POST['comment'])) {

  $comment_name = $_POST['coment_name'];
  $comment_email = $POST['comment_email'];
  $comment = $_POST['comment'];
  $status = "deny";

  if($comment_email=='' or $comment == '') {
    echo "<script>alert('Please fill in all the blanks')</script>";
    echo"<scripit>window.open('details.php?post=$post_id')</scripit>";
    exit();
  }

}


?>

</div>
