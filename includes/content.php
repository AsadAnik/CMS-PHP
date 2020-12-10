<?php

//Assigning per page items number..
$per_page = 2;

///Posts Counts here All posts..
$count_query = "SELECT * FROM `posts` WHERE `post_status` = 'published'";
$count_query_result = mysqli_query($connection, $count_query);
$count_posts = mysqli_num_rows($count_query_result);
$per_posts = ceil($count_posts / $per_page);
// echo "Posts are : ".$count_posts;

///Checking Page No. To Pagination checkup..
//Controlling Page of Pagination on Home of each Page..
if(isset($_GET['page'])){
    $page = $_GET['page'];

}else{
    $page = "";
}

if($page == "" || $page == 1){
    $page_1 = 0;

}else{
    $page_1 = ($page * $per_page) - $per_page;
}

// echo "Selected Page [".$page."]";


///Select All From Database here..
$query = "SELECT * FROM `posts` LIMIT {$page_1}, 2";
$select_all_posts = mysqli_query($connection, $query);

//Checking the Query in Content...
if (!$select_all_posts) {
    die("ERROR When get query in Content " . mysqli_error($connection));
}

?>

<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Home 
                <small>All Published <?php echo $count_posts;?> Posts</small>
            </h1>

            <!-- First Blog Post -->
            <!-- Now Posts are dynamically Cammings from Database -->
            <?php
            ///PHP for Getting Contents Data from Database..
            while ($posts = mysqli_fetch_assoc($select_all_posts)) {
                $post_id = $posts['post_id'];
                $post_title = $posts['post_title'];
                $post_author = $posts['post_author'];
                $post_date = $posts['post_date'];
                $post_image = $posts['post_image'];
                $post_content = substr($posts['post_content'], 0, 200);
                $post_status = $posts['post_status'];
                $post_view_counts = $posts['post_views_count'];

                ///Checking The Status And Then Viewing The Post...
                if ($post_status == 'published') {
            ?>
                    <!-- Title Of Post -->
                    <h2>
                        <a href="post.php?postId=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>

                    <!-- AuthorName Of Post -->
                    <p class="lead">
                        by <a href="author_post.php?postId=<?php echo $post_id; ?>&author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                    </p>

                    <!-- Date Of Post -->
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>

                    <!-- Image Of Post -->
                    <a href="post.php?postId=<?php echo $post_id; ?>">
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    </a>
                    <hr>

                    <!-- Post Content -->
                    <p><?php echo $post_content; ?></p>

                    <!-- Read More Button of Post -->
                    <a class="btn btn-primary" href="post.php?postId=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <hr>
            <?php
                } else if (!$post_id) {
                    echo "<h1 class='text-center text-danger'>No Posts Area Available!</h1>";
                }
            } ?>

            <!-- Pager -->
            <ul class="pager">
                <!-- Paginating Page Links -->
                <?php 
                ///code..
                    for($i = 1; $i <= $per_posts; $i++){
                        if($i == $page){
                ?>  
                            <li><a class="active-page" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                        <?php }else{ ?>

                            <li><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php
                     } }
                ?>
            </ul>

        </div>