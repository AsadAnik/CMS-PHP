<!-- PHP -->
<?php
///Code..
//Check Checked any items of table..
if (isset($_POST['checkboxValues'])) {
    //Loop throw inner of the checks array...
    foreach ($_POST['checkboxValues'] as $checked_id) {
        $select_check_option = $_POST['selects-bulk-option'];

        switch ($select_check_option) {
            case "approve":
                $query_approve = "UPDATE `comments` SET `comments_status` = '{$select_check_option}' WHERE `comments_id` = {$checked_id}";
                $approve_result = mysqli_query($connection, $query_approve);
                //checkup errors in query...
                check_error($approve_result, $connection, "ERR! when try to query with query ");
            break;

            case "unapprove":
                $query_unapprove = "UPDATE `comments` SET `comments_status` = '{$select_check_option}' WHERE `comments_id` = {$checked_id}";
                $approve_result = mysqli_query($connection, $query_unapprove);
                //checkup errors in query...
                check_error($approve_result, $connection, "ERR! when try to query with query ");
            break;

            case "delete":
                $query_delete = "DELETE FROM `comments` WHERE `comments_id` = {$checked_id}";
                $delete_result = mysqli_query($connection, $query_delete);
                //checkup errors in query of delete..
                check_error($delete_result, $connection, "Delete Comments Multiple checkup has ERR! ");
            break;
        }
    }
}

///Function for checking query error..
function check_error($result, $connection, $msg)
{
    if (!$result) {
        die($msg . mysqli_error($connection));
    }
}
?>

<!-- HTML here -->
<h1 class="page-header">
    All Comments
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
                    <option value="approve">Approve</option>
                    <option value="unapprove">Unapprove</option>
                    <option value="delete">Delete</option>
                </select>
            </div>

            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
            </div>
    </div>

    <!-- Table Row -->
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
            <table class="table table-bordered table-hover">
                <!-- Heading of the Table -->
                <thead>
                    <tr>
                        <th><input id="selectAllBoxes" type="checkbox" name="selectAllBoxes"></th>
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
                            <!-- Checkbox for Select Option -->
                            <td><input type="checkbox" class="checkboxes" name="checkboxValues[]" value="<?php echo $comments_id; ?>"></td>

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
                                if (!$make_query_post) {
                                    die("Get ERR! when try to query on posts to get on comments view all " . mysqli_error($connection));
                                }

                                //Fetching the Data..
                                while ($fetch_post = mysqli_fetch_assoc($make_query_post)) {
                                    $post_id = $fetch_post['post_id'];
                                    $post_title = $fetch_post['post_title'];
                                }
                                ?>
                                <a href="../post.php?postId=<?php echo $post_id; ?>">
                                    <?php echo $post_title; ?>
                                </a>
                            </td>

                            <!-- Comments Date -->
                            <td><?php echo $comments_date; ?></td>

                            <!-- Approve Comments -->
                            <td>
                                <!-- Make Comment Update from here -->
                                <a href="comments.php?approveId=<?php echo $comments_id; ?>" name="com-approve-btn" class="btn btn-xs btn-success">Approve</a>

                                <!-- PHP to make Approve from Admin -->
                                <?php include "approval_update_comments.php"; ?>
                            </td>

                            <!-- Unapprove Comments -->
                            <td>
                                <!-- Make Comment Update from here -->
                                <a href="comments.php?unapproveId=<?php echo $comments_id; ?>" name="com-unapprove-btn" class="btn btn-xs btn-warning">Unapprove</a>

                                <!-- PHP to make Unapprove from Admin -->
                                <?php include "approval_update_comments.php"; ?>
                            </td>

                            <!-- Delete Comments -->
                            <td>
                                <!-- Make Comment DELETE from here -->
                                <a href="comments.php?deleteId=<?php echo $comments_id; ?>" onclick="javascript: return confirm('Are you sure wants to delete this comment?');" name="com-delete-btn" class="btn btn-xs btn-danger">DELETE</a>

                                <!-- Refer to PHP file to delete comments -->
                                <?php include "delete_comments.php"; ?>
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