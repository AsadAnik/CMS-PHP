<?php 
///Code...
    if(isset($_GET['deleteUserId'])){
        $deleteUserId = $_GET['deleteUserId'];

        //Make routing buffering page when click on delete item..
        header("Location: users.php");

        $query = "DELETE FROM `users` WHERE `users_id` = {$deleteUserId}";
        $delete_query = mysqli_query($connection, $query);

        ///Checking query for delete users query...
        if(!$delete_query){
            die("Get ERR! when try to make query Delete Users from View All Users ".mysqli_error($connection));
        }
    }
