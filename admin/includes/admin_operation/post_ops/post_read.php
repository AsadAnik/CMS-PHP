<h1 class="page-header">
    Posts
    <small>Viewing</small>
</h1>

<!-- Add Categories HTML -->
<section id="category">
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>Operation</th>
                    </tr>
                </thead>

                <tbody>
                    <!------- Makes View All Posts from database fetching ------->
                    <?php
                    $query = "SELECT * FROM `posts`";
                    $view_all_posts = mysqli_query($connection, $query);

                    //Checking the Query...
                    if (!$view_all_posts) {
                        die("ERR! when try to make query from posts view all");
                    }

                    ///Fetching the data from database here...
                    while ($fetch_all_post = mysqli_fetch_assoc($view_all_posts)) {
                        $post_id = $fetch_all_post['post_id'];
                        $post_title = $fetch_all_post['post_title'];
                        $post_author = $fetch_all_post['post_author'];
                        $post_date = $fetch_all_post['post_date'];
                        $post_image = $fetch_all_post['post_image'];
                        $post_category_id = $fetch_all_post['post_category_id'];
                        $post_tags = $fetch_all_post['post_tags'];
                        $post_status = $fetch_all_post['post_status'];
                        $post_comment_count = $fetch_all_post['post_comment_count'];

                    ?>
                        <tr>
                            <td><?php echo $post_id; ?></td>
                            <td><?php echo $post_author; ?></td>
                            <td><?php echo $post_title; ?></td>
                            <td>
                                <?php
                                ///Read Post with Category Fetching All Categories to Add Categories...
                                    $query_category = "SELECT * FROM `categories` WHERE cat_id = {$post_category_id}";
                                    $category_query_make = mysqli_query($connection, $query_category);

                                    //Fetching All Categories to get loop throw..
                                    while($fetch_category = mysqli_fetch_assoc($category_query_make)){
                                        $category = $fetch_category['cat_title'];
                                    }
                                    echo $category;
                                ?>
                            </td>
                            <td><?php echo $post_status; ?></td>
                            <td>
                                <img src="../images/<?php echo $post_image; ?>" alt="Image" class="img-thumbnail" width="100" height="100">
                            </td>
                            <td><?php echo $post_tags; ?></td>
                            <td><?php echo $post_comment_count;?></td>
                            <td><?php echo $post_date; ?></td>
                            <td>
                                <!-- Make Post EDIT from here -->
                                <a href="posts.php?source=update_post&editId=<?php echo $post_id;?>" class="btn btn-xs btn-primary">EDIT</a>

                                <!-- Make Post DELETE from here -->
                                <?php include "post_delete.php";?>
                                <a href="posts.php?deleteId=<?php echo $post_id;?>" name="post-delete-btn" class="btn btn-xs btn-danger">DELETE</a>
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