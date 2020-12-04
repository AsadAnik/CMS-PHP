<?php 
///Code..
    //Database..
    include "../database/db.php";

    //Need to turn on the session..
    //To collect all of the user data to local sessions storage on browser..
    session_start();

    //Checing Form Of Login Is Submitted Or Not..
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Make Real Escape String to Special Symbols to manage Database..
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        ///Lests working with database and query..
        $query_user = "SELECT * FROM `users` WHERE `users_name` = '{$username}'";
        $grave_query = mysqli_query($connection, $query_user);

        //Checking ERR! of query..
        if(!$grave_query){
            die("GET ERR! when try to make query onto Users Login HOME SITE ".mysqli_error($connection));
        }

        //Fetching all data from database..
        while($fetch_all = mysqli_fetch_assoc($grave_query)){
            $db_userid = $fetch_all['users_id'];
            $db_username = $fetch_all['users_name'];
            $db_firstname = $fetch_all['users_firstname'];
            $db_lastname = $fetch_all['users_lastname'];
            $db_password = $fetch_all['users_password'];
            $db_profile_img = $fetch_all['users_image'];
            $db_type = $fetch_all['users_type'];
        }

        ///Validating User Now...
        if($username === $db_username && $password === $db_password){
            //storing into session here..
            $_SESSION['user-id'] = $db_userid;
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_firstname;
            $_SESSION['lastname'] = $db_lastname;
            $_SESSION['profile-img'] = $db_profile_img;
            $_SESSION['usertype'] = $db_type;

            //Redirecting to Admin Page..
            header("Location: ../admin");
        }else{
            //Redirecting to Home Page..
            header("Location: ../index.php");
        }
    }
?>