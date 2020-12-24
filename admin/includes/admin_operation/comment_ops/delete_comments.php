<?php
///Delete Comments PHP...
if (isset($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];

    // Keeping for Header Location to Page Buffering...
    header("Location: comments.php");

    ///Makes Query here..
    $query = "DELETE FROM `comments` WHERE `comments_id` = {$deleteId}";
    $comments_delete_query = mysqli_query($connection, $query);

    // Checking the query..
    if (!$comments_delete_query) {
        die("GET ERR! when try to make query for delete comments " . mysqli_error($connection));
    }
}
