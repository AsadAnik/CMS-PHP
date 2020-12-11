<?php
///Code..
//User Checking Online..
$session = session_id();
$time = time();
$time_out_in_seconds = 60;
$time_out = ($time - $time_out_in_seconds);

//Count User Online...
$query_online_session = "SELECT * FROM `users_online` WHERE `session` = '{$session}'";
$online_session_result = mysqli_query($connection, $query_online_session);
$count_users = mysqli_num_rows($online_session_result);

//check count of users then try one then another..
if($count_users == NULL){
    mysqli_query($connection, "INSERT INTO `users_online` (`session`, `time`) VALUES ('{$session}', '{$time}')");

}else{
    mysqli_query($connection, "UPDATE `users_online` SET `time` = '{$time}' WHERE `session` = '{$session}'");
}

//default condition here & count User..
$online_users_query = mysqli_query($connection, "SELECT * FROM `users_online` WHERE `time` > '{$time_out}'");
$online_users_count = mysqli_num_rows($online_users_query);
///Set Online Users To SESSION..
// $_SESSION['users_online'] = $online_users_count;
