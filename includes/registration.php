<!-- PHP -->
<?php
///Code..
//Defining some Variables..
$form_message = "";
$message_color = "";
$password_message = "";
$form_login_msg = "";

if (isset($_POST['submit'])) {
    ///Defined All Forms Data Names Value...
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $retype_password = $_POST['retypepass'];

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $profile_photo = $_FILES['avatar']['name'];
    $profile_photo_tmp = $_FILES['avatar']['tmp_name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    //Checking the Empty Fields Here...
    if (!empty($username) && !empty($email) && !empty($password) && !empty($firstname)) {
        //Real Escaped Values...
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        $retype_password = mysqli_real_escape_string($connection, $retype_password);

        //Working with profile photo..
        move_uploaded_file($profile_photo_tmp, "images/profile_img/$profile_photo");

        //Password Matching Check..
        if ($password === $retype_password) {
            ///Selecting salt...
            $salt_query = "SELECT 'randSalt' FROM `users`";
            $salt_query_result = mysqli_query($connection, $salt_query);

            //checking query from here..
            if (!$salt_query_result) {
                die("Get Err! When Try to Register On FrontEnd for randSalt " . mysqli_error($connection));
            }

            //Fetching the randsalt from database...
            $fetch_randSalt = mysqli_fetch_array($salt_query_result);
            $randSalt = $fetch_randSalt['randSalt'];

            //Making Password Crypt..
            $password = crypt($password, $randSalt);

            
            ///lets Inseting the Data to database from resigtration frontEnd...
            $query = "INSERT INTO `users` (`users_name`, `users_firstname`, `users_lastname`, `users_email`, `users_password`, `users_image`, `users_age`, `users_gender`, `users_date`, `users_type`) ";
            $query .= "VALUES ('{$username}', '{$firstname}', '{$lastname}', '{$email}', '{$password}', '{$profile_photo}', '{$age}', '{$gender}', now(), 'subscriber')";
            $query_result = mysqli_query($connection, $query);

            //checking query..
            if (!$query_result) {
                die("GET ERR! when try to INSERT data from frontEnd Registration to database " . mysqli_error($connection));
            }

            //After Success to submit form to server..
            $form_message = "Registered User Account!";
            $form_login_msg = "Login Now.";
            $message_color = "success";
        } else {
            $form_message = "";
            $message_color = "";
            $password_message = "Password Not Matched!";
        }
    } else {
        $form_message = "Fields Can't Be Empty!";
        $message_color = "danger";
    }
}
?>

<!-- Page Content -->
<!-- The Registration Page Here -->
<div class="container">
    <section id="registration">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 well">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <!-- Conditions Message -->
                            <h5 class="text-center text-<?php echo $message_color; ?>">
                                <?php echo $form_message; ?>
                                <a href="login.php"><?php echo $form_login_msg; ?></a>
                            </h5>

                            <!-- First&LastName -->
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="firstname">1st Name</label>
                                        <input type="text" class="form-control" name="fname" placeholder="Firstname..">
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="lastname">2nd Name</label>
                                        <input type="text" class="form-control" name="lname" placeholder="Lastname..">
                                    </div>
                                </div>
                            </div>

                            <!-- Profile Image -->
                            <div class="form-group">
                                <label for="Profile">Profile Photo</label>
                                <input type="file" class="form-control" name="avatar">
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>

                            <!-- Password & RePassword Options -->
                            <div class="row">
                                <!-- Password match message -->
                                <h5 class="text-danger text-center">
                                    <?php echo $password_message; ?>
                                </h5>

                                <!-- Password -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                    </div>

                                </div>

                                <!-- RePassword -->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="repassword">Retype Password</label>
                                        <input type="password" name="retypepass" class="form-control" placeholder="Retype Password..">
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
                                            <option value="">Select Your Gender</option>
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
                                        <input type="number" name="age" placeholder="Age" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Form -->
                            <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <hr>