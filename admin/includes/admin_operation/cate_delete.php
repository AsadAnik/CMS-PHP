<?php
///Making the delete with php...
if (isset($_GET['deleteId'])) {
    $delete_id = $_GET['deleteId'];

    //Make query for deleting categories title with click on button....
    $query = "DELETE FROM `categories` WHERE `cat_id` = {$delete_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: category.php");

    ///checking the query...
    if (!$delete_query) {
        die("ERROE! when try to Delete categories title " . mysqli_error($connection));
    }
}
?>