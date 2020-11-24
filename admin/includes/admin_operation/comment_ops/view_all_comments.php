<h1 class="page-header">
    All Comments
    <small>Viewing</small>
</h1>

<!-- Add Categories HTML -->
<section id="category">
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
            <table class="table table-bordered table-hover">
                <!-- Heading of the Table -->
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Response In</th>
                        <th>Date</th>
                        <th>Approve</th>
                        <th>Unapprove</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <!------- Makes View All Posts from database fetching ------->
                    <?php
                    $query = "SELECT * FROM `comments`";
                    $view_all_comments = mysqli_query($connection, $query);

                    //Checking the Query...
                    if (!$view_all_comments) {
                        die("ERR! when try to make query from posts view all");
                    }

                    ///Fetching the data from database here...
                    while ($fetch_all_comment = mysqli_fetch_assoc($view_all_comments)) {
                        $comments_id = $fetch_all_comment['comments_id'];
                        $comments_post_id = $fetch_all_comment['comments_post_id'];
                        $comments_author = $fetch_all_comment['comments_author'];
                        $comments_date = $fetch_all_comment['comments_date'];
                        $comments_email = $fetch_all_comment['comments_email'];
                        $comments_content = $fetch_all_comment['comments_content'];
                        $comments_status = $fetch_all_comment['comments_status'];

                    ?>
                        <tr>
                            <!-- Comments ID -->
                            <td><?php echo $comments_id; ?></td>

                            <!-- Author Comments -->
                            <td><?php echo $comments_author; ?></td>

                            <!-- Content Comments -->
                            <td><?php echo $comments_content; ?></td>

                            <!-- Comments Email -->
                            <td>
                                <?php
                                ///Read Post with Category Fetching All Categories to Add Categories...
                                // $query_category = "SELECT * FROM `categories` WHERE cat_id = {$post_category_id}";
                                // $category_query_make = mysqli_query($connection, $query_category);

                                //Fetching All Categories to get loop throw..
                                // while($fetch_category = mysqli_fetch_assoc($category_query_make)){
                                //     $category = $fetch_category['cat_title'];
                                // }
                                // echo $category;

                                echo $comments_email;
                                ?>
                            </td>

                            <!-- Comments Status -->
                            <td><?php echo $comments_status; ?></td>

                            <!-- Response Area -->
                            <td>
                                <?php 
                                    $query_to_post = "SELECT * FROM `posts` WHERE `post_id` = {$comments_post_id}";
                                    $make_query_post = mysqli_query($connection, $query_to_post);

                                    //Checking the query here..
                                    if(!$make_query_post){
                                        die("Get ERR! when try to query on posts to get on comments view all ".mysqli_error($connection));
                                    }

                                    //Fetching the Data..
                                    while($fetch_post = mysqli_fetch_assoc($make_query_post)){
                                        $post_id = $fetch_post['post_id'];
                                        $post_title = $fetch_post['post_title'];
                                    }
                                ?>
                                <a href="../post.php?postId=<?php echo $post_id;?>">
                                    <?php echo $post_title;?>
                                </a>
                            </td>

                            <!-- Comments Date -->
                            <td><?php echo $comments_date; ?></td>

                            <!-- Approve Comments -->
                            <td>
                                <!-- Make Comment DELETE from here -->
                                <a href="" name="com-approve-btn" class="btn btn-xs btn-success">Approve</a>
                            </td>

                            <!-- Unapprove Comments -->
                            <td>
                                <!-- Make Comment DELETE from here -->
                                <a href="" name="com-unapprove-btn" class="btn btn-xs btn-warning">Unapprove</a>
                            </td>

                            <!-- Delete Comments -->
                            <td>
                                <!-- Make Comment DELETE from here -->
                                <a href="comments.php?deleteId=<?php echo $comments_id;?>" name="com-delete-btn" class="btn btn-xs btn-danger">DELETE</a>

                                <!-- Refer to PHP file to delete comments -->
                                <?php include "delete_comments.php";?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</section>