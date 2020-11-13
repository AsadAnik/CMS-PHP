<?php
///Select all from database..
//Categories Table PHP...
$query = "SELECT * FROM `categories`";
$all_cate = mysqli_query($connection, $query);

//Checking the Query..
if (!$all_cate) {
    die("ERROR! when try to query for admin_category " . mysqli_errno($all_cate));
}
?>

<!-- Categories Table HTML -->
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categories Title</th>
            <th>Operation</th>
        </tr>
    </thead>

    <tbody>
        <?php
        while ($fetch_cate = mysqli_fetch_assoc($all_cate)) {
            $cate_id = $fetch_cate['cat_id'];
            $cate_title = $fetch_cate['cat_title'];
        ?>
            <tr>
                <td><?php echo $cate_id; ?></td>
                <td><?php echo $cate_title; ?></td>
                <td>
                    <a href="category.php?deleteId=<?php echo $cate_id; ?>" class="btn btn-xs btn-danger">DELETE</a>

                    <a href="category.php?edit=<?php echo $cate_id; ?>" class="btn btn-xs btn-primary">EDIT</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>