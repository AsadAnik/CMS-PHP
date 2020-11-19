<?php
///Code...
///Updating/Editing POST...
if(isset($_GET['editId'])){
    $post_id = $_GET['editId'];
    
    if (isset($_POST['update-post'])) {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['category-id'];
        $post_status = $_POST['status'];
    
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
    
        $post_tag = $_POST['tags'];
        $post_content = $_POST['content'];
        $post_comment_count = 4;
    
        //Make Local Image to our  project/Application here...
        ///Way to upload Image/Files...
        move_uploaded_file($post_image_temp, "../images/$post_image");
    
        //Making Query here...
        $query = "UPDATE `posts` SET ";
        $query .= "`post_title` = '{$post_title}', ";
        $query .= "`post_author` = '{$post_author}', ";
        $query .= "`post_category_id` = {$post_category_id}, ";
        $query .= "`post_status` = '{$post_status}', ";
        $query .= "`post_image` = '{$post_image}', ";
        $query .= "`post_tags` = '{$post_tags}', ";
        $query .= "`post_content` = '{$post_content}' ";
        $query .= "WHERE `post_id` = {$post_id}";
    
        //Make Query Result..
        $update_post_now = mysqli_query($connection, $query);
    
        //Checking the Query...
        if (!$update_post_now) {
            die("GET ERR! when try to make query for specific post to update in Admin " . mysqli_error($connection));
        }
    }
}
?>

<!-- HTML for Update/Edit Items here... -->
<h1 class="page-header">
    Post
    <small>Editing</small>
</h1>

<!-- Add Categories HTML -->
<section id="category">
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
            <form action="posts.php?source=update_post" method="POST" enctype="multipart/form-data">

                <?php
                //To Showing value inner forms, fetched all items...
                if (isset($_GET['editId'])) {
                    $edit_id = $_GET['editId'];

                    $query = "SELECT * FROM `posts` WHERE `post_id` = {$edit_id}";
                    $get_specific_post = mysqli_query($connection, $query);

                    //Checking the Query when get check..
                    if (!$get_specific_post) {
                        die("GET ERR! when try to make query for specific post to Show on value attribute in Admin " . mysqli_error($connection));
                    }

                while ($fetch_specific_post = mysqli_fetch_assoc($get_specific_post)) {
                    $post_title = $fetch_specific_post['post_title'];
                    $post_author = $fetch_specific_post['post_author'];
                    $post_date = $fetch_specific_post['post_date'];
                    $post_image = $fetch_specific_post['post_image'];
                    $post_category_id = $fetch_specific_post['post_category_id'];
                    $post_tags = $fetch_specific_post['post_tags'];
                    $post_status = $fetch_specific_post['post_status'];
                    $post_comment_count = $fetch_specific_post['post_comment_count'];
                    $post_content = $fetch_specific_post['post_content'];
                ?>
                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input value="<?php echo $post_title; ?>" type="text" class="form-control" placeholder="Title" name="title">
                    </div>

                    <!-- Category Id -->
                    <div class="form-group">
                        <label for="category-id">Post Category Id</label>
                        <input value="<?php echo $post_category_id; ?>" type="text" class="form-control" placeholder="Category ID" name="category-id">
                    </div>

                    <!-- Author -->
                    <div class="form-group">
                        <label for="author">Post Author</label>
                        <input value="<?php echo $post_author; ?>" type="text" class="form-control" placeholder="Author" name="author">
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Post Status</label>
                        <input value="<?php echo $post_status; ?>" type="text" class="form-control" placeholder="Status" name="status">
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image">Post Image</label>
                        <input value="<?php echo $post_image; ?>" type="file" class="form-control" name="image">
                    </div>

                    <!-- Tags -->
                    <div class="form-group">
                        <label for="tags">Post Tags</label>
                        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" placeholder="Tags" name="tags">
                    </div>

                    <!-- Content -->
                    <div class="form-group">
                        <label for="content">Post Content</label>
                        <textarea name="content" cols="30" rows="10" class="form-control" placeholder="Write post here...">
                            <?php echo $post_content; ?>
                        </textarea>
                    </div>

                <?php
                }}
                ?>

                <!-- Submit Form -->
                <div class="form-group">
                    <input type="submit" class="btn btn-warning text-capitalize" name="update-post" value="Update Post">
                </div>
            </form>
        </div>
    </div>
</section>