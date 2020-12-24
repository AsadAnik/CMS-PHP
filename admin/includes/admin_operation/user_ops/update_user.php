<?php
///Code...
if (isset($_GET['editUserId'])) {
    $editId = $_GET['editUserId'];
}

//Fetchin all data from database to update field fill with first time...
$query_all = "SELECT * FROM `users` WHERE `users_id` = {$editId}";
$result_of_query = mysqli_query($connection, $query_all);

//Checking the query here..
if (!$result_of_query) {
    die("GET ERR! when try to make fetching all data on users admin Edit Section " . mysqli_error($connection));
}

//Take Data to fetching out..
while ($fetch_users = mysqli_fetch_assoc($result_of_query)) {
    $users_name = $fetch_users['users_name'];
    $users_image = $fetch_users['users_image'];
    $users_firstname = $fetch_users['users_firstname'];
    $users_lastname = $fetch_users['users_lastname'];
    $users_email = $fetch_users['users_email'];
    $users_password = $fetch_users['users_password'];
    $users_age = $fetch_users['users_age'];
    $users_date = $fetch_users['users_date'];
    $users_gender = $fetch_users['users_gender'];
    $users_type = $fetch_users['users_type'];
}

///Lets try to update things...
//when press on update button to update form..
if (isset($_POST['update-user'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $profile_img = $_FILES['profile-img']['name'];
    $profile_img_tmp = $_FILES['profile-img']['tmp_name'];
    move_uploaded_file($profile_img_tmp, "../images/profile_img/$profile_img");

    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $type = $_POST['type'];

    
    ///Encrypting Users Password..
    // $salt_db = "SELECT 'randSalt' FROM `users`";
    // $result_salt = mysqli_query($connection, $salt_db);

    // if(!$result_salt){
    //     die("ERR! when try to query for randSalt of users DB ".mysqli_error($connection));
    // }

    //Fetching Salt from DB & Crypt Password..
    // $fetch_salt = mysqli_fetch_array($result_salt);
    // $randSalt = $fetch_salt['randSalt'];
    // $hash_password = crypt($password, $randSalt);


    ///making hash password update way and more secure..
    $hash_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    

    ///lets doing some query here...
    $query = "UPDATE `users` SET ";
    $query .= "`users_name` = '{$username}', ";
    $query .= "`users_firstname` = '{$firstname}', ";
    $query .= "`users_lastname` = '{$lastname}', ";
    $query .= "`users_image` = '{$profile_img}', ";
    $query .= "`users_email` = '{$email}', ";
    $query .= "`users_password` = '{$hash_password}', ";
    $query .= "`users_email` = '{$email}', ";
    $query .= "`users_age` = '{$age}', ";
    $query .= "`users_gender` = '{$gender}', ";
    $query .= "`users_type` = '{$type}' ";
    $query .= "WHERE `users_id` = {$editId} ";

    $result_query = mysqli_query($connection, $query);

    ///checking the query here..
    if (!$result_of_query) {
        die("Get ERR! when try to query on Update Users on edit_user section " . mysqli_error($connection));
    }

    ///Send Message when updated user..
?>
    <div class="bg-success text-center" style="padding: 10px; border-radius: 5px;">
        <span>Update User Successfull</span>
        <span> | </span>
        <a href="users.php">View All Users!</a>
    </div>
<?php
}
?>

<!-- Lets Creating the template here -->
<h1 class="page-header">
    Users
    <small>Account Edit/Update</small>
</h1>

<!-- Add Categories HTML -->
<!-- Go Ahead and Change Everythings and do what ever you wants -->
<section id="category">
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
            <form action="" method="POST" enctype="multipart/form-data">

                <!-- Names & Profile -->
                <div class="row">
                    <!-- Names Section -->
                    <div class="col-xs-6">
                        <!-- FirstName -->
                        <div class="form-group">
                            <label for="firstname">Change First Name</label>
                            <input type="text" class="form-control" placeholder="1st Name.." name="firstname" value="<?php echo $users_firstname; ?>">
                        </div>

                        <!-- LastName -->
                        <div class="form-group">
                            <label for="lastname">Change Last Name</label>
                            <input type="text" class="form-control" placeholder="2nd Name.." name="lastname" value="<?php echo $users_lastname; ?>">
                        </div>

                        <!-- Username -->
                        <div class="form-group">
                            <label for="username">Change Username</label>
                            <input type="text" class="form-control" placeholder="Username.." name="username" value="<?php echo $users_name; ?>">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Change Email ID</label>
                            <input type="email" class="form-control" placeholder="Email ID.." name="email" value="<?php echo $users_email; ?>">
                        </div>
                    </div>

                    <!-- Profile Pictures Section -->
                    <div class="col-xs-6">
                        <!-- Profile Image -->
                        <div class="form-group">
                            <label for="profile-img">Change Profile Picture</label>
                            <br>
                            <img src="../images/profile_img/<?php echo $users_image; ?>" alt="No-Profile-Avatar" class="img img-thumbnail" style="width: 190px; height: 200px; border-radius: 100%;"> <br><br>
                            <input type="file" class="form-control" name="profile-img">
                        </div>
                        <hr>
                    </div>
                </div>

                <!-- Password & ReType Password -->
                <div class="row">
                    <!-- Password -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="password">Change Password</label>
                            <input type="password" class="form-control" name="password" placeholder="###">
                        </div>
                    </div>

                    <!-- Retype Password -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="password">Retype Password</label>
                            <input type="password" class="form-control" name="re-password" placeholder="###">
                        </div>
                    </div>
                </div>

                <!-- Age & Gender -->
                <div class="row">
                    <!-- Gender -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="gender">Choose Gender</label>
                            <select name="gender" class="form-control">
                                <option value="<?php echo $users_gender; ?>"><?php echo $users_gender; ?></option>
                                <?php
                                if ($users_gender === 'Male') {
                                    echo "<option value='Female'>Female</option>";
                                    echo "<option value='Other'>Other</option>";
                                }
                                if ($users_gender === 'Female') {
                                    echo "<option value='Male'>Male</option>";
                                    echo "<option value='Other'>Other</option>";
                                }
                                if ($users_gender === 'Other') {
                                    echo "<option value='Male'>Male</option>";
                                    echo "<option value='Female'>Female</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Age -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" placeholder="Age.." name="age" value="<?php echo $users_age; ?>">
                        </div>
                    </div>
                </div>

                <!-- Type Of User -->
                <div class="form-group">
                    <label for="type">Type Of User</label>
                    <select name="type" class="form-control">
                        <option value="<?php echo $users_type; ?>"><?php echo $users_type; ?></option>
                        <?php
                        if ($users_type === 'admin') {
                            echo "<option value='subscriber'>Subscriber</>";
                        }
                        if ($users_type === 'subscriber') {
                            echo "<option value='admin'>Admin</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Submit Form -->
                <div class="form-group">
                    <input type="submit" class="btn btn-primary text-capitalize" name="update-user" value="Update User!">
                </div>
            </form>
        </div>
    </div>
</section>