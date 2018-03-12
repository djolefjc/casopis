<?php
$run_posts = mysqli_query($con,  "SELECT * FROM posts ORDER BY rand() LIMIT 0,5");

while($row_posts = mysqli_fetch_array($run_posts))
{

        $post_id = $row_posts['post_id'];
        $post_title = $row_posts['post_title'];
        $post_image = $row_posts['post_image'];



        echo "

            <div class='one-side cf'>

                <h2 class='one-side-title'>
                <a href='details.php?post=$post_id'> $post_title </a>
                </h2>
                    <a href='details.php?post=$post_id'>

                <img src='admin/news_images/$post_image'/>
                </a>





            </div> <br />

        ";
};
