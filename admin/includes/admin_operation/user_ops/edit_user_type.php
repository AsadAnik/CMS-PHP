<?php
///Code..
    if(isset($_GET['edit_admin_type'])){
        //Admin..
        if(isset($_GET['admin_id'])){
            $admin_id = $_GET['admin_id'];

            ///Reloading Buffer...
            header("Location: users.php");

            $admin_query = "UPDATE `users` SET `users_type` = 'admin' WHERE `users_id` = {$admin_id}";
            $result_admin = mysqli_query($connection, $admin_query);

            //Checking the query here..
            if(!$result_admin){
                die("GET ERR! when try to make query into edit admin to users admin panel ".mysqli_error($connection));
            }
        }
    }

    if(isset($_GET['edit_subscriber_type'])){
        //Subscriber..
        if(isset($_GET['subscriber_id'])){
            $subscriber_id = $_GET['subscriber_id'];

            ///Loading Buffer..
            header("Location: users.php");

            $subscriber_query = "UPDATE `users` SET `users_type` = 'subscriber' WHERE `users_id` = {$subscriber_id}";
            $result_subscriber = mysqli_query($connection, $subscriber_query);

            //Checking the query here..
            if(!$result_subscriber){
                die("GET ERR! when try to make query into edit subscriber to users admin panel ".mysqli_error($connection));
            }
        }
    }

?>