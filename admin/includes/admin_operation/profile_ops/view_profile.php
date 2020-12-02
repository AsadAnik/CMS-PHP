<!-- PHP -->
<?php
///Code..
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    //making query..
    $query = "SELECT * FROM `users` WHERE `users_name` = '{$username}'";
    $select_users_data = mysqli_query($connection, $query);

    //Checking the connection of query..
    if (!$select_users_data) {
        die("GET ERR! when try to query users all data to profile admin " . mysqli_error($connection));
    }

    //fetching all data to use there..
    while ($fetch_all = mysqli_fetch_assoc($select_users_data)) {
        $db_user_id = $fetch_all['users_id'];
        $db_username = $fetch_all['users_name'];
        $db_firstname = $fetch_all['users_firstname'];
        $db_lastname = $fetch_all['users_lastname'];
        $db_email = $fetch_all['users_email'];
        $db_password = $fetch_all['users_password'];
        $db_profile_img = $fetch_all['users_image'];
        $db_age = $fetch_all['users_age'];
        $db_gender = $fetch_all['users_gender'];
        $db_date = $fetch_all['users_date'];
        $db_type = $fetch_all['users_type'];
    }
}
?>

<!-- Lets Creating the template here -->
<h1 class="page-header">
    Profile
    <small><?php echo $db_username; ?></small>
    <!-- <a href="users.php" class="btn btn-warning">Users Control Center</a> -->
</h1>

<div class="row">
    <!-- Profile Pictures Section -->
    <div class="col-xs-3" style="margin-left: 20%;">
        <?php
        //If there is any profile-img (From Users Database)...
        if ($db_profile_img !== '') {
            echo "<img src='../images/profile_img/$db_profile_img;' alt='No-Profile-Avatar' class='img img-thumbnail' style='width: 235px; height: 250px; border-radius: 100%;'>";
        }

        //If there is no any profile-img..
        if ($db_profile_img == '') {
            //Male profile..
            if ($db_gender == 'Male') {
                echo "<img src='../images/profile_img/default/male.png' alt='No-Profile-Avatar' class='img img-thumbnail' style='width: 235px; height: 250px; border-radius: 100%;'>";
            }
            //Female profile..
            if ($db_gender == 'Female') {
                echo "<img src='../images/profile_img/default/female.jpeg' alt='No-Profile-Avatar' class='img img-thumbnail' style='width: 235px; height: 250px; border-radius: 100%;'>";
            }
            //Other profile..
            if ($db_gender == 'Other') {
                echo "<img src='../images/profile_img/default/other.png' alt='No-Profile-Avatar' class='img img-thumbnail' style='width: 235px; height: 250px; border-radius: 100%;'>";
            }
        }
        ?>
        <br> <br>
    </div>

    <!-- Profile Name and Email -->
    <div class="col-xs-6">
        <!-- User FirstName & LastName -->
            <h1 class="display-2" style="font-size: 5rem;">
                <span><?php echo $db_firstname ;?></span>
                <span> </span>
                <span><?php echo $db_lastname ;?></span>
                <small>
                    <?php echo $db_username; ?>
                </small>
            </h1>

            <!-- username -->
            <p class="text-muted" style="font-size: 15px;">(<?php echo $db_gender; ?>)</p>

            <!-- Email -->
            <p style="font-size: 18px;">
                <span>Email</span>
                <span>: </span>
                <span><?php echo $db_email;?></span>
            </p>

            <!-- Age -->
            <p style="font-size: 18px;">
                <span>Age</span>
                <span>: </span>
                <span><?php echo $db_age; ?></span>
            </p>

            <!-- Update Profile Button -->
            <a href="users.php?source=edit_user&editUserId=<?php echo $db_user_id;?>" class="btn btn-success">Edit/Update Profile!</a>
    </div>
</div>