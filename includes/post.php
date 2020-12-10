<!-- PHP to Grabe All of the information to specific POST title with -->
<?php
///Code...
if (isset($_GET['postId'])) {
    $post_id = $_GET['postId'];

    //Updating the database to increasing the views section here...
    //increase the views of post..
    $views_query = "UPDATE `posts` SET `post_views_count` = post_views_count + 1 WHERE `post_id` = {$post_id}";
    $post_views_result = mysqli_query($connection, $views_query);
    //checking the query..
    if(!$post_views_result){
        die("GET ERR! when try to query into view posts counts on post.php frontEnd ".mysqli_error($connection));
    }

    ///Querieing Data...
    $query = "SELECT * FROM `posts` WHERE post_id = {$post_id}";
    $result_query = mysqli_query($connection, $query);

    //Checking the Query here..
    if (!$result_query) {
        die("GET ERR! When try to make query to fetch all post items for Specific 1. POST view" . mysqli_error($connection));
    }

    //Fetching Loop throw the data...
    while ($fetch_post_item = mysqli_fetch_assoc($result_query)) {
        $post_title = $fetch_post_item['post_title'];
        $post_author = $fetch_post_item['post_author'];
        $post_date = $fetch_post_item['post_date'];
        $post_image = $fetch_post_item['post_image'];
        $post_content = $fetch_post_item['post_content'];
    }

}else{
    header("Location: index.php");
}
?>

<!------- HTML Template ------->
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
            <!-- Blog Post -->
            <!---- Title ----->
            <h1>
                <?php echo $post_title; ?>
            </h1>

            <!----- Author ---->
            <p class="lead">
                by <a href="#"><?php echo $post_author; ?></a>
            </p>

            <hr>

            <!---- Date/Time ----->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

            <hr>

            <!----- Preview Image ---->
            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="Post Image">

            <hr>

            <!----- Post Content ----->
            <p class="lead">
                <?php echo $post_content; ?>
            </p>

            <hr>

            <!------ Blog Comments ------>
            <?php include "common/comments.php"; ?>

        </div>