<!-- PHP -->
<?php
///Code...
if (isset($_POST['checkTheBox'])) {

    foreach ($_POST['checkTheBox'] as $checked_id) {
        $select_bulk_option = $_POST['selects-bulk-option'];

        switch ($select_bulk_option) {
            case "admin":
                $admin_query = "UPDATE `users` SET `users_type` = '{$select_bulk_option}' WHERE `users_id` = {$checked_id}";
                $admin_result = mysqli_query($connection, $admin_query);
                //checking the query..
                check_up_query($admin_result, $connection, "GET ERR! when try to query into select bulk on users admin table view ");
                break;

            case "subscriber":
                $sub_query = "UPDATE `users` SET `users_type` = '{$select_bulk_option}' WHERE `users_id` = {$checked_id}";
                $sub_result = mysqli_query($connection, $sub_query);
                //checing query errors..
                check_up_query($sub_result, $connection, "GET ERR! when try to make query on users admin table subscriber action ");
                break;

            case "delete":
                $del_query = "DELETE FROM `users` WHERE `users_id` = {$checked_id}";
                $del_result = mysqli_query($connection, $del_query);
                //checking the query errors if get then shows msg..
                check_up_query($del_result, $connection, "GET ERR! when try to make query on users admin delete multiple selection ");
                break;
        }
    }
}


///CheckUP Function..
function check_up_query($query_ready, $connection, $query_message)
{
    if (!$query_ready) {
        die($query_message . mysqli_error($connection));
    }
}
?>

<!-- HTML -->
<!-- Page For Posts -->
<h1 class="page-header">
    Users
    <small>Control Center</small>
    <a href="users.php?source=create_user" class="btn btn-info">Create One!</a>
</h1>

<!-- Add Categories HTML -->
<section id="category">
    <!-- Bulk-Options & Operations With Multiple Values -->
    <div class="row" style="margin-bottom: 1rem;">
        <!-- Bulk For Select Option and mark for specific action can take -->
        <form method="POST">
            <div id="bulkOptionContainer" class="col-xs-4">
                <select class="form-control" name="selects-bulk-option">
                    <option value="">Select Options</option>
                    <option value="admin">Admin</option>
                    <option value="subscriber">Subscriber</option>
                    <option value="delete">Delete</option>
                </select>
            </div>

            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
            </div>
    </div>

    <!-- The Table of Row -->
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
            <table class="table table-bordered table-hover">
                <!----- Table Heading ------>
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAllBoxes"></th>
                        <!-- <th>Id</th> -->
                        <th>Username</th>
                        <th>Profile</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th colspan="4" class="text-center">Actions</th>
                    </tr>
                </thead>

                <!------ Table Body ------>
                <tbody>
                    <!------- Makes View All Posts from database fetching ------->
                    <?php
                    $query = "SELECT * FROM `users`";
                    $view_all_users = mysqli_query($connection, $query);

                    //Checking the Query...
                    if (!$view_all_users) {
                        die("ERR! when try to make query from posts view all");
                    }

                    ///Fetching the data from database here...
                    while ($fetch_all_users = mysqli_fetch_assoc($view_all_users)) {
                        $users_id = $fetch_all_users['users_id'];
                        $users_name = $fetch_all_users['users_name'];
                        $users_image = $fetch_all_users['users_image'];
                        $users_firstname = $fetch_all_users['users_firstname'];
                        $users_lastname = $fetch_all_users['users_lastname'];
                        $users_email = $fetch_all_users['users_email'];
                        $users_age = $fetch_all_users['users_age'];
                        $users_gender = $fetch_all_users['users_gender'];
                        $users_type = $fetch_all_users['users_type'];
                        $users_date = $fetch_all_users['users_date'];
                    ?>
                        <tr>
                            <td><input type="checkbox" class="checkboxes" name="checkTheBox[]" value="<?php echo $users_id; ?>"></td>

                            <!-- Id -->
                            <!-- <td><?php// echo $users_id; ?></td> -->

                            <!-- Username -->
                            <td><?php echo $users_name; ?></td>

                            <!-- Image -->
                            <td>
                                <?php
                                //If there is any profile-img (From Users Database)...
                                if ($users_image !== '') {
                                    echo "<img src='../images/profile_img/$users_image' alt='No-Profile-Avatar' class='img img-thumbnail' style='width: 50px; height: 50px; border-radius: 100%'>";
                                }

                                //If there is no any profile-img..
                                if ($users_image == '') {
                                    //Male profile..
                                    if ($users_gender == 'Male') {
                                        echo "<img src='../images/profile_img/default/male.png' alt='No-Profile-Avatar' class='img img-thumbnail' style='width: 50px; height: 50px; border-radius: 100%'>";
                                    }
                                    //Female profile..
                                    if ($users_gender == 'Female') {
                                        echo "<img src='../images/profile_img/default/female.jpeg' alt='No-Profile-Avatar' class='img img-thumbnail' style='width: 50px; height: 50px; border-radius: 100%'>";
                                    }
                                    //Other profile..
                                    if ($users_gender == 'Other') {
                                        echo "<img src='../images/profile_img/default/other.png' alt='No-Profile-Avatar' class='img img-thumbnail' style='width: 50px; height: 50px; border-radius: 100%'>";
                                    }
                                }
                                ?>
                            </td>

                            <!-- FirstName -->
                            <td>
                                <?php echo $users_firstname; ?>
                            </td>

                            <!-- LastName -->
                            <td><?php echo $users_lastname; ?></td>

                            <!-- Email -->
                            <td><?php echo $users_email; ?></td>

                            <!-- Age -->
                            <td><?php echo $users_age; ?></td>

                            <!-- Gender -->
                            <td><?php echo $users_gender; ?></td>

                            <!-- Type -->
                            <td><?php echo $users_type; ?></td>

                            <!-- Date -->
                            <td>
                                <?php echo $users_date; ?>
                            </td>

                            <!-- Actions -->
                            <!---- PHP for Edit Admin/Subscriber ---->
                            <?php include "edit_user_type.php"; ?>

                            <!-- Make Admin -->
                            <td>
                                <a href="users.php?edit_admin_type&admin_id=<?php echo $users_id; ?>" class="btn btn-success btn-xs">Admin</a>
                            </td>

                            <!-- Make Subscriber/Member -->
                            <td>
                                <a href="users.php?edit_subscriber_type&subscriber_id=<?php echo $users_id; ?>" class="btn btn-warning btn-xs">Subscriber</a>
                            </td>

                            <!-- EDIT Action -->
                            <td>
                                <!-- Users Update their informations here -->
                                <a href="users.php?source=edit_user&editUserId=<?php echo $users_id; ?>" class="btn btn-primary btn-xs">EDIT</a>
                            </td>

                            <!-- DELETE Action -->
                            <td>
                                <!-- Make Users DELETE from here -->
                                <a href="users.php?deleteUserId=<?php echo $users_id; ?>" onclick="javascript: return confirm('Are you sure wants to delete?');" class="btn btn-xs btn-danger">DELETE</a>
                                <!-- Delete PHP Code.. -->
                                <?php include "delete_user.php"; ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    </form>
</section>