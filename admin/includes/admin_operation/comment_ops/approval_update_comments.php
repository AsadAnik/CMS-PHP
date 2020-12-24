<?php
///PHP Code...
/// If Admin Make Comments to Approve...
if (isset($_GET['approveId'])) {
    $approveId = $_GET['approveId'];

    // Make Reload Buffering..
    header("Location: comments.php");

    ///Lets Making..
    $query = "UPDATE `comments` SET `comments_status` = 'approved' WHERE `comments_id` = {$approveId}";
    $make_query_approve = mysqli_query($connection, $query);

    //Checking the query..
    if (!$make_query_approve) {
        die("GET ERR! when try to make query to make approve into comments admin " . mysqli_error($connection));
    }
}

/// If Admin Make Comments to Unapprove...
if (isset($_GET['unapproveId'])) {
    $unapproveId = $_GET['unapproveId'];

    // Make Reload Buffering..
    header("Location: comments.php");

    ///Lets Making..
    $query = "UPDATE `comments` SET `comments_status` = 'unapproved' WHERE `comments_id` = {$unapproveId}";
    $make_query_unapprove = mysqli_query($connection, $query);

    //Checking the query..
    if (!$make_query_unapprove) {
        die("GET ERR! when try to make query to make approve into comments admin " . mysqli_error($connection));
    }
}
