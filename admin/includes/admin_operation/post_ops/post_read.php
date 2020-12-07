<!-- PHP -->
<?php
///Code..
///Checking for specific checking items from table..
if (isset($_POST['checkBoxValues'])) {
    ///Loop-throw inner of checks array of table...
    //then update or delete staff...
    foreach ($_POST['checkBoxValues'] as $check_out_id) {
        $select_bulk_option = $_POST['selects-bulk-option'];

        switch ($select_bulk_option) {
            case "published":
                $publish_query = "UPDATE `posts` SET `post_status` = '{$select_bulk_option}' WHERE `post_id` = {$check_out_id} ";
                $result_published_query = mysqli_query($connection, $publish_query);
                //checkup errors in query..
                check_up_query($result_published_query, $connection, "GET ERR! when try to make query in select options Posts Admin Panel ReadPosts Section ");
            break;

            case "draft":
                $draft_query = "UPDATE `posts` SET `post_status` = '{$select_bulk_option}' WHERE `post_id` = {$check_out_id}";
                $result_draft_query = mysqli_query($connection, $draft_query);
                //Checking Errors when make query..
                check_up_query($result_draft_query, $connection, "GET ERR! when try to make query in select options Posts Admin Panel ReadPosts Section ");
            break;

            case "delete":
                $delete_query = "DELETE FROM `posts` WHERE `post_id` = {$check_out_id}";
                $result_delete_query = mysqli_query($connection, $delete_query);
                //checking anykinds of error on query..
                check_up_query($result_delete_query, $connection, "GET ERR! when try to make query in select options Posts Admin Panel ReadPosts Section ");
            break;
        }
    }
}

///CheckUP Function..
function check_up_query($query_ready, $connection, $query_message){
    if (!$query_ready) {
        die($query_message . mysqli_error($connection));
    }
}
?>

<!-- HTML -->
<!-- Page For Posts -->
<h1 class="page-header">
    Posts
    <small>Viewing</small>
</h1>

<!-- Add Categories HTML -->
<section id="category">

    <!-- Bulk-Options & Operations With Multiple Values -->
    <div class="row" style="margin-bottom: 1rem;">
        <!-- Bulk For Select Option and mark for specific action can take -->
        <form method="POST">
            <div id="bulkOptionContainer" class="col-xs-4">
                <select class="form-control" name="selects-bulk-option">
                    <option value="">Select Options</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                    <option value="delete">Delete</option>
                </select>
            </div>

            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
            </div>
    </div>

    <!-- Table Of Viewing All of the data here -->
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
            <!-- Table Of Posts All Data Viewing/Reading -->
            <table class="table table-bordered table-hover">
                <!----- Table Heading ------>
                <thead>
                    <tr>
                        <th><input id="selectAllBoxes" type="checkbox" name="selectAllBoxes"></th>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th colspan="2">Operation</th>
                    </tr>
                </thead>

                <!------ Table Body ------>
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
                            <!-- Checkbox Input to Select Posts -->
                            <td><input class="checkboxes" type="checkbox" name="checkBoxValues[]" value="<?php echo $post_id; ?>"></td>

                            <!-- Id -->
                            <td><?php echo $post_id; ?></td>

                            <!-- Author -->
                            <td><?php echo $post_author; ?></td>

                            <!-- Title -->
                            <td>
                                <a href="../post.php?postId=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                            </td>

                            <!-- Category -->
                            <td>
                                <?php
                                ///Read Post with Category Fetching All Categories to Add Categories...
                                $query_category = "SELECT * FROM `categories` WHERE cat_id = {$post_category_id}";
                                $category_query_make = mysqli_query($connection, $query_category);

                                //Fetching All Categories to get loop throw..
                                while ($fetch_category = mysqli_fetch_assoc($category_query_make)) {
                                    $category = $fetch_category['cat_title'];
                                }
                                echo $category;
                                ?>
                            </td>

                            <!-- Status -->
                            <td><?php echo $post_status; ?></td>

                            <!-- Image -->
                            <td>
                                <img src="../images/<?php echo $post_image; ?>" alt="Image" class="img-thumbnail" width="100" height="100">
                            </td>

                            <!-- Tags -->
                            <td><?php echo $post_tags; ?></td>

                            <!-- Comments Count -->
                            <td><?php echo $post_comment_count; ?></td>

                            <!-- Date -->
                            <td><?php echo $post_date; ?></td>

                            <!-- Edit Operation -->
                            <td>
                                <!-- Make Post EDIT from here -->
                                <a href="posts.php?source=update_post&editId=<?php echo $post_id; ?>" class="btn btn-xs btn-primary">EDIT</a>
                            </td>

                            <!-- Delete Operation -->
                            <td>
                                <!-- Make Post DELETE from here -->
                                <?php include "post_delete.php"; ?>
                                <a href="posts.php?deleteId=<?php echo $post_id; ?>" onclick="javascript: return confirm('Are you sure wants to delete this post?');" name="post-delete-btn" class="btn btn-xs btn-danger">DELETE</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    </form>
</section>