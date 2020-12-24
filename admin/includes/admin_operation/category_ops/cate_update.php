<!-- PHP for Update/Edit Items Make Query Here -->
<?php
    ///Code..
    if(isset($_POST['update_cate_btn'])){
        $update_title = $_POST['update_cate'];
        $query = "UPDATE `categories` SET cat_title = '{$update_title}' WHERE cat_id = {$cate_update_id}";
        $update_result = mysqli_query($connection, $query);

        ///Checking the Query Here..
        if(!$update_result){
            die("ERR! When got to make query in Update Categories Item ".mysqli_errno($update_result));
        }
    }
?>

<!-- Form  -->
<form method="post">
    <!-- Update/Edit Caegories -->
    <div class="form-group">
        <label for="cate">Update Category</label>

        <?php
        ///Category Editing...
        if (isset($_GET['edit'])) {
            $match_edit_id = $_GET['edit'];

            //making query
            $query = "SELECT * FROM `categories` WHERE cat_id = {$match_edit_id}";
            $cate_edit_query = mysqli_query($connection, $query);

            ///Checking Query from here...
            if (!$cate_edit_query) {
                die("ERROR! when tried to make Edit_Id from Admin_Category" . mysqli_errno($cate_edit_query));
            }

            while ($all_edit = mysqli_fetch_assoc($cate_edit_query)) {
                $cate_edit_id = $all_edit['cat_id'];
                $cate_edit_title = $all_edit['cat_title'];
        ?>
                <!-- Update Categories Input Section -->
                <input type="text" name="update_cate" class="form-control" placeholder="Category Title.." value="<?php if(isset($cate_edit_title)) { echo $cate_edit_title;} ?>">

        <?php }} ?>
    </div>


    <!-- Update Categories Button -->
    <div class="form-group">
        <input type="submit" class="form-control btn btn-primary" name="update_cate_btn" value="Update">
    </div>
</form>