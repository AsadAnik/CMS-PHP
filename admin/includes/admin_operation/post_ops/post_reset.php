<?php
   if(isset($_GET['resetId'])){
       //Delete Button Takes from post_read.php..
       $reset_id = $_GET['resetId'];

       //lets Make Query..
       $query = "UPDATE `posts` SET `post_views_count` = 0 WHERE `post_id` = {$reset_id}";
       $reset_query_result = mysqli_query($connection, $query);
       header("Location: posts.php");

       ///Checking the Query...
       if(!$reset_query_result){
           die("ERR! when try to make query item Views Reset on posts admin".mysqli_error($connection));
       }
   }
