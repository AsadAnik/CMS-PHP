<!-- Page For Posts -->
<h1 class="page-header">
    Users
    <small>Control Center</small>
    <a href="users.php?source=create_user" class="btn btn-info">Create One!</a>
</h1>

<!-- Add Categories HTML -->
<section id="category">
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
            <table class="table table-bordered table-hover">
                <!----- Table Heading ------>
                <thead>
                    <tr>
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
                        <th colspan="2">Actions</th>
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
                            <!-- Id -->
                            <!-- <td><?php echo $users_id; ?></td> -->

                            <!-- Username -->
                            <td><?php echo $users_name; ?></td>

                            <!-- Image -->
                            <td>
                                <img src="../images/profile_img/<?php echo $users_image ;?>" alt="No-Profile-Avatar" class="img img-thumbnail" style="width: 50px; height: 50px; border-radius: 100%">
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
                            <!-- EDIT Action -->
                            <td>
                                <a href="" class="btn btn-primary btn-xs">EDIT</a>
                            </td>

                            <!-- DELETE Action -->
                            <td>
                                <!-- Make Post DELETE from here -->
                                <a href="users.php?deleteUserId=<?php echo $users_id; ?>" class="btn btn-xs btn-danger">DELETE</a>

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
</section>