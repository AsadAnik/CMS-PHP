<?php
///Code..
//Checing Form Of Login Is Submitted Or Not..
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Make Real Escape String to Special Symbols to manage Database..
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    ///Lests working with database and query..
    $query_user = "SELECT * FROM `users` WHERE `users_name` = '{$username}'";
    $grave_query = mysqli_query($connection, $query_user);

    //Checking ERR! of query..
    if (!$grave_query) {
        die("GET ERR! when try to make query onto Users Login HOME SITE " . mysqli_error($connection));
    }

    //Fetching all data from database..
    while ($fetch_all = mysqli_fetch_assoc($grave_query)) {
        $db_userid = $fetch_all['users_id'];
        $db_username = $fetch_all['users_name'];
        $db_firstname = $fetch_all['users_firstname'];
        $db_lastname = $fetch_all['users_lastname'];
        $db_password = $fetch_all['users_password'];
        $db_profile_img = $fetch_all['users_image'];
        $db_gender = $fetch_all['users_gender'];
        $db_type = $fetch_all['users_type'];
    }

    ///Selecting salt...
    //Querying Salt from Database and Encrypting Password..
    // $salt_query = "SELECT 'randSalt' FROM `users`";
    // $salt_query_result = mysqli_query($connection, $salt_query);

    //checking query from here..
    // if (!$salt_query_result) {
    //     die("Get Err! When Try to Register On FrontEnd for randSalt " . mysqli_error($connection));
    // }

    //Fetching the randsalt from database...
    // $fetch_randSalt = mysqli_fetch_array($salt_query_result);
    // $randSalt = $fetch_randSalt['randSalt'];
    //Making Password Crypt..
    // $password = crypt($password, $randSalt);


    ///Validating User Now...
    if ($username === $db_username && password_verify($password, $db_password)) {
        //storing into session here..
        $_SESSION['user-id'] = $db_userid;
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['profile-img'] = $db_profile_img;
        $_SESSION['gender'] = $db_gender;
        $_SESSION['usertype'] = $db_type;

        //Redirecting to Admin Page..
        header("Location: index.php");
    } else {
        //Redirecting to Home Page..
        header("Location: index.php");
    }
}
?>

<!-- Login Template HTML -->
<!-- Page Content -->
<!-- The Registration Page Here -->
<div class="container">
    <section id="login">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3 well">
                <div class="form-wrap">
                    <h1>Login</h1>
                    <form role="form" method="post" id="login-form" autocomplete="off">
                        <!-- Username -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" placeholder="Username.." class="form-control" name="username">
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password.." name="password">
                        </div>

                        <!-- Submit Form Login -->
                        <input type="submit" class="btn btn-success btn-lg btn-block" name="login" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <hr>