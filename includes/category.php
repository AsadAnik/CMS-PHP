<?php
///Checking CategoryId which is came out from category...
if(isset($_GET['categoryId'])){
    $category_id = $_GET['categoryId'];
}


///Select All From Database here..
$query = "SELECT * FROM `posts` WHERE `post_category_id` = {$category_id} ORDER BY `post_id` DESC";
$select_all_posts = mysqli_query($connection, $query);

//Checking the Query in Content...
if (!$select_all_posts) {
    die("ERROR When get query in Content " . mysqli_error($connection));
}


/// Let's make counts of posts..
$query_count = "SELECT * FROM `posts` WHERE `post_category_id` = {$category_id} AND `post_status` = 'published'";
$count_result = mysqli_query($connection, $query_count);
$count_post = mysqli_num_rows($count_result);

if (!$count_result) {
    die("ERROR when get post count query in Category " . mysqli_error($connection));
}


/// Try to find the category from DB..
$query_cat = "SELECT * FROM `categories` WHERE `cat_id` = {$category_id}";
$select_cat = mysqli_query($connection, $query_cat);

if (!$select_cat) {
    die("ERROR when get query in Category " . mysqli_error($connection));
}

// Collecting the current category title for upper of page heading..
while ($cat = mysqli_fetch_assoc($select_cat)) {
    $current_cat_title = $cat['cat_title'];
}
?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?php echo $current_cat_title; ?>
                <small>Published <?php echo $count_post; ?> Posts</small>
            </h1>

            <!-- First Blog Post -->
            <!-- Now Posts are dynamically Cammings from Database -->
            <?php
            ///PHP for Getting Contents Data from Database..
            while ($posts = mysqli_fetch_assoc($select_all_posts)) {
                $post_id = $posts['post_id'];
                $post_title = $posts['post_title'];
                $post_user = $posts['post_user'];
                $post_date = $posts['post_date'];
                $post_image = $posts['post_image'];
                $post_content = $posts['post_content'];
            ?>   
                    
                 <h2>
                    <a href="post.php?postId=<?php echo $post_id;?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_user; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                
            <?php } ?>

        </div>