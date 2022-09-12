 <!-- PHP to Create Comment To Database -->
 <?php
    //Code To Create Comments from Here..
    if (isset($_POST['sent-comment'])) {
        $post_id = $_GET['postId'];
        $author = $_POST['comments_user'];
        $email = $_POST['comments_email'];
        $comment = $_POST['comments_content'];

        //Checking the values of commenting...
        if (!empty($author) && !empty($email) && !empty($comment)) {
            $query = "INSERT INTO `comments` (comments_post_id ,comments_author, comments_date, comments_email, comments_content, comments_status) ";
            $query .= "VALUES ({$post_id} ,'{$author}', now(), '{$email}', '{$comment}', 'unapproved')";
            $comments_query = mysqli_query($connection, $query);

            //checking query..
            if (!$comments_query) {
                die("Get ERR! when try to create comment of post. " . mysqli_error($connection));
            }

            //Counting Comments When Make Sent Comments...
            ///Make comments_counting...
            // $counts_query = "UPDATE `posts` SET post_comment_count = post_comment_count + 1 ";
            // $counts_query .= "WHERE `post_id` = {$post_id}";
            // $posts_update = mysqli_query($connection, $counts_query);
        }
    }
?>

 <!-- Comments Form -->
 <div class="well">
     <h4>Leave a Comment:</h4>
     <form role="form" method="POST">
         <!-- Author -->
         <div class="form-group">
             <label for="author">Author</label>
             <input type="text" name="comments_author" class="form-control" placeholder="User Name..">
         </div>
         <!-- Email -->
         <div class="form-group">
             <label for="author">Email</label>
             <input type="text" name="comments_email" class="form-control" placeholder="Email..">
         </div>
         <!-- Comment -->
         <div class="form-group">
             <label for="comment">Comment</label>
             <textarea class="form-control" name="comments_content" rows="3" placeholder="Write Comment..."></textarea>
         </div>
         <!-- Comment Post Button -->
         <button type="submit" class="btn btn-primary" name="sent-comment">Submit</button>
     </form>
 </div>

 <hr>

 <!-- Posted Comments -->
 <!-- Code To Read Comments From Here -->
 <?php
    $query = "SELECT * FROM `comments` WHERE `comments_post_id` = {$post_id} ";
    $query .= "AND `comments_status` = 'approved'";
    $make_query_view = mysqli_query($connection, $query);

    ///Checking Query From Here...
    if (!$make_query_view) {
        die("GET ERR! when try to make query into comments all view section " . mysqli_error($connection));
    }

    //Fetching All Comments..
    while ($fetch_comment = mysqli_fetch_assoc($make_query_view)) {
        $author = $fetch_comment['comments_author'];
        $date = $fetch_comment['comments_date'];
        $email = $fetch_comment['comments_email'];
        $content = $fetch_comment['comments_content'];
        $status = $fetch_comment['comments_status'];
    ?>
     <!-- Comment -->
     <div class="media">
         <a class="pull-left" href="#">
             <img class="media-object" src="http://placehold.it/64x64" alt="">
         </a>
         <div class="media-body">
             <h4 class="media-heading"><?php echo $author; ?>
                 <small><?php echo $date; ?></small>
             </h4>
             <?php echo $content; ?>
         </div>
     </div>
<?php
    }
?>

 <!-- Comment -->
 <!-- Design of Comments View Without PHP Demo -->
 <!-- <div class="media">
     <a class="pull-left" href="#">
         <img class="media-object" src="http://placehold.it/64x64" alt="">
     </a>
     <div class="media-body">
         <h4 class="media-heading">Start Bootstrap
             <small>August 25, 2014 at 9:30 PM</small>
         </h4>
         Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
     </div>
 </div> -->