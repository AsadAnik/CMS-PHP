<?php
   if(isset($_GET['deleteId'])){
       //Delete Button Takes from post_read.php..
       $delete_id = $_GET['deleteId'];

       //lets Make Query..
       $query = "DELETE FROM `posts` WHERE `post_id` = {$delete_id}";
       $make_delete_query = mysqli_query($connection, $query);
       header("Location: posts.php");

       ///Checking the Query...
       if(!$make_delete_query){
           die("ERR! when try to make query item delete on posts admin".mysqli_error($connection));
       }
   }
