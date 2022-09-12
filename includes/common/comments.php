 <!-- PHP to Create Comment To Database -->
 <?php
    //Code To Create Comments from Here..
    if (isset($_POST['submit'])) {
        $post_id = $_GET['postId'];
        $author = $_POST['comments_user'];
        $email = $_POST['comments_email'];
        $comment = $_POST['comments_content'];

        //Checking the values of commenting...
        if (!empty($author) && !empty($email) && !empty($comment)) {
            $query = "INSERT INTO `comments` (`comments_post_id` ,`comments_user`, `comments_date`, `comments_email`, `comments_content`, `comments_status`) VALUES ({$post_id} ,'{$author}', now(), '{$email}', '{$comment}', 'unapproved')";
            // $query .= "VALUES ({$post_id} ,'{$author}', now(), '{$email}', '{$comment}', 'unapproved')";
            $comments_query = mysqli_query($connection, $query);

            //checking query..
            if (!$comments_query) {
                die("Get ERR! when try to create comment of post. " . mysqli_error($connection));
            }

            //Counting Comments When Make Sent Comments...
            ///Make comments_counting...
            $counts_query = "UPDATE `posts` SET post_comment_count = post_comment_count + 1 ";
            $counts_query .= "WHERE `post_id` = {$post_id}";
            $posts_update = mysqli_query($connection, $counts_query);
        }
    }
?>

 <!-- Comments Form -->
 <div class="well">
     <h4>Leave a Comment:</h4>
     <form role="form" method="post">
         <!-- Author -->
         <div class="form-group">
             <label for="author">Author</label>
             <input type="text" name="comments_user" class="form-control" placeholder="User Name..">
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
         <button type="submit" class="btn btn-primary" name="submit">Submit</button>
     </form>
 </div>

 <hr>

 <!-- Posted Comments -->
 <!-- Code To Read Comments From Here -->
 <?php
    $query = "SELECT * FROM `comments` WHERE `comments_post_id` = {$post_id} ";
    $query .= "AND `comments_status` = 'approved'";
    $view_comments = mysqli_query($connection, $query);

    ///Checking Query From Here...
    if (!$view_comments) {
        die("GET ERR! when try to make query into comments all view section " . mysqli_error($connection));
    }

    //Fetching All Comments..
    while ($fetch_comment = mysqli_fetch_assoc($view_comments)) {
        $author = $fetch_comment['comments_user'];
        $date = $fetch_comment['comments_date'];
        $email = $fetch_comment['comments_email'];
        $content = $fetch_comment['comments_content'];
        $status = $fetch_comment['comments_status'];

        // Have to request for Author's profile Picture in User's DB..
        //..
        $query_author_avatar = "SELECT `users_image` FROM `users` WHERE `users_email` = {$email}";
        $result_author_avatar = mysqli_query($connection, $query_author_avatar);

        if ($result_author_avatar){
            echo $result_author_avatar;
        }
    ?>
     <!-- Comment -->
     <div class="media">
         <a class="pull-left" href="#">
             <img class="media-object" src="../../images/profile_img/<?php echo $result_author_avatar; ?>" alt="">
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
         <img class="media-object" src="../../images/profile_img/alpiakhi_4.jpg" alt="">
     </a>
     <div class="media-body">
         <h4 class="media-heading">Start Bootstrap
             <small>August 25, 2014 at 9:30 PM</small>
         </h4>
         Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
     </div>
 </div> -->