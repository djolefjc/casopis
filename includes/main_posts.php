<?php

/* BIG MAIN POST START */
                    if(!isset($_GET['cat'])) {

                        $run_main_post = mysqli_query($con,"SELECT * FROM posts ORDER BY post_id DESC LIMIT 1");

                        $row_main_post = mysqli_fetch_array($run_main_post);

                        $main_id = $row_main_post['post_id'];
                        $main_title = $row_main_post['post_title'];
                        $main_date = $row_main_post['post_date'];

                        $main_image = $row_main_post['post_image'];

                        echo "
                            <div class='main-post'>

                            <img src='admin/news_images/$main_image'align='center' />
                            </div>

                            <div class='main-text'>
                            <h2><a href='details.php?post=$main_id'> $main_title </a></h2>
                            </div>
                        ";



/* BIG MAIN POST END */

                $run_posts = mysqli_query($con,  "SELECT * FROM posts ORDER BY rand() LIMIT 0,4");

                while($row_posts = mysqli_fetch_array($run_posts))
                {

                        $post_id = $row_posts['post_id'];
                        $post_title = $row_posts['post_title'];
                        $post_date = $row_posts['post_date'];
                        $post_author = $row_posts['post_author'];
                        $post_image = $row_posts['post_image'];
                        $post_content = $row_posts['post_content'];


                        $post_content = substr($post_content,0,800);

                        echo "
                            <div class='one-post cf'>

                                <h2 class='one-title'>
                                <a href='details.php?post=$post_id'> $post_title </a>
                                </h2>
                                    <a href='details.php?post=$post_id'>
                                <div class='one-image'>
                                <img src='admin/news_images/$post_image'/>
                                </a>
                                </div>



                                <div class='one-content'>
                                    $post_content
                                    <a href='details.php?post=$post_id'> [Procitaj Sve] </a>
                                </div>

                                <div class='date-author'>
                                <span class='one-date'>
                                 $post_date
                                </span>
                                <span class='one-author'>
                                $post_author
                                </span>
                                </div>

                            </div> <br /> 

                        ";
                }
              }

            if(isset($_GET['cat'])) {



                                    $cat_id = $_GET['cat'];

                                  $run_posts = mysqli_query($con,  "SELECT * FROM posts WHERE category_id = $cat_id");

                                  while($row_posts = mysqli_fetch_array($run_posts))
                                  {

                                          $post_id = $row_posts['post_id'];
                                          $post_title = $row_posts['post_title'];
                                          $post_date = $row_posts['post_date'];
                                          $post_author = $row_posts['post_author'];
                                          $post_image = $row_posts['post_image'];
                                          $post_content = $row_posts['post_content'];


                                          $post_content = substr($post_content,0,800);

                                          echo "

                                              <div class='one-post cf'>

                                                  <h2 class='one-title'>
                                                  <a href='details.php?post=$post_id'> $post_title </a>
                                                  </h2>
                                                      <a href='details.php?post=$post_id'>
                                                  <div class='one-image'>
                                                  <img src='admin/news_images/$post_image'/>
                                                  </a>
                                                  </div>



                                                  <div class='one-content'>
                                                      $post_content
                                                      <a href='details.php?post=$post_id'> [Procitaj Sve] </a>
                                                  </div>
                                                  <div class='date-author'>
                                                  <span class='one-date'>
                                                   $post_date
                                                  </span>
                                                  <span class='one-author'>
                                                  $post_author
                                                  </span>
                                                  </div>
                                              </div> <br />

                                          ";
                                  }
                                    }
