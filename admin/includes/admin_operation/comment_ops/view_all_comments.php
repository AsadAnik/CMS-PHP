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
                                <?php echo $comments_email; ?>
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
                                <!-- Make Comment Update from here -->
                                <a href="comments.php?approveId=<?php echo $comments_id;?>" name="com-approve-btn" class="btn btn-xs btn-success">Approve</a>

                                <!-- PHP to make Approve from Admin -->
                                <?php include "approval_update_comments.php";?>
                            </td>

                            <!-- Unapprove Comments -->
                            <td>
                                <!-- Make Comment Update from here -->
                                <a href="comments.php?unapproveId=<?php echo $comments_id;?>" name="com-unapprove-btn" class="btn btn-xs btn-warning">Unapprove</a>

                                <!-- PHP to make Unapprove from Admin -->
                                <?php include "approval_update_comments.php";?>
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