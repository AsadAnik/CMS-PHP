<?php
///Code With PHP...
if (isset($_POST['publish-post'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $user_image = $_FILES['profile-img']['name'];
    $user_image_temp = $_FILES['profile-img']['tmp_name'];

    // $post_date = date('d-m-y');
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];
    $age = $_POST['age'];
    $type = $_POST['type'];
    $gender = $_POST['gender'];

    ///Checking the Blanks to Send User Data to Database..
    if ($username !== '' && $firstname !== '' && $email !== '' && $password !== '' && $gender !== '' && $age !== '') {
        if ($password !== $re_password) {
            echo "<h4 class='text-cente text-danger'>Must Need Fill All Forms!</h4>";
        }
        
        //Make Local Image to our  project/Application here...
        ///Way to upload Image/Files...
        move_uploaded_file($user_image_temp, "../images/profile_img/$user_image");

        ///Another Way to Upload Files With Deept...
        ///Making Operation for Image Uploading...
        //Creating File Uploading System with PHP..
        // $file = $_FILES['profile-img'];

        // $file_name = $file['name'];
        // $file_temp = $file['tmp_name'];
        // $file_type = $file['type'];
        // $file_size = $file['size'];
        // $file_error = $file['error'];

        // // print_r($file);

        // //Do Ops here..
        // $file_extension = explode('.', $file_name);
        // $real_extension = strtolower(end($file_extension));

        // //Allowing Format of File to upload...
        // $allowable = array('jpg', 'png', 'jpeg');

        // ///Decition making now...
        // if (in_array($real_extension, $allowable)) {
        //     if ($file_error === 0) {
        //         if ($file_size < 1000000) {

        //             $file_name_new = uniqid('', true) . "." . $real_extension;
        //             $file_destination = '../images/profile_img/' . $file_name_new;

        //             //Move FIle to Local Temporary storage to server...
        //             move_uploaded_file($file_temp, $file_destination);

        //             //make redirect with header..
        //             header("Location: posts.php?source=add_post");
        //         } else {
        //             echo "Your File is too Big!";
        //         }
        //     } else {
        //         echo "There is an ERR! when try to Fetch Files";
        //     }
        // } else {
        //     echo "You can not upload files of this type";
        // }


        ///INSERTING into the DATABASE...
        $query = "INSERT INTO `users` (`users_name`, `users_firstname`, `users_lastname`, `users_email`, `users_password`, `users_image`, `users_age`, `users_gender`, `users_date`, `users_type`) ";

        $query .= "VALUES ('{$username}', '{$firstname}', '{$lastname}', '{$email}', '{$password}', '{$user_image}', '{$age}', '{$gender}', now(), '{$type}')";

        //Make query for all data to submit on database..
        $make_query = mysqli_query($connection, $query);

        ///Checking query...
        if (!$make_query) {
            die("GET ERROR! when try to make query to INSERT posts data to database!" . mysqli_error($connection));
        }

    } else {
        echo "<h3 class='text-cente text-danger'>Must Need Fill All Forms!</h3>";
    }
}
?>

<!-- Create Users Account's Template -->
<h1 class="page-header">
    Users
    <small>Account Create</small>
    <a href="users.php" class="btn btn-warning">Users Control Center</a>
</h1>

<!-- Add Categories HTML -->
<section id="category">
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
            <form action="users.php?source=create_user" method="POST" enctype="multipart/form-data">

                <!-- FirstName & LastName -->
                <div class="row">
                    <!-- FirstName -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" placeholder="1st Name.." name="firstname">
                        </div>
                    </div>

                    <!-- LastName -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" placeholder="2nd Name.." name="lastname">
                        </div>
                    </div>
                </div>

                <!-- Profile Image -->
                <div class="form-group">
                    <label for="profile-img">Profile Picture</label>
                    <input type="file" class="form-control" name="profile-img">
                </div>

                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" placeholder="Username.." name="username">
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email ID</label>
                    <input type="email" class="form-control" placeholder="Email ID.." name="email">
                </div>

                <!-- Password & ReType Password -->
                <div class="row">
                    <!-- Password -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="password">Password</label>
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
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="NULL">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- Age -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" placeholder="Age.." name="age">
                        </div>
                    </div>
                </div>

                <!-- Type Of User -->
                <div class="form-group">
                    <label for="type">Type Of User</label>
                    <select name="type" class="form-control">
                        <option value="NULL">Select User Type</option>
                        <option value="admin">Admin</option>
                        <option value="subscriber">Subscriber</option>
                    </select>
                </div>

                <!-- Submit Form -->
                <div class="form-group">
                    <input type="submit" class="btn btn-info text-capitalize" name="publish-post" value="Create User!">
                </div>
            </form>
        </div>
    </div>
</section>