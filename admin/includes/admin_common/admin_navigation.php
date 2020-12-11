<!-- User Check Online -->
 <?php include "includes/online_user/online.check.user.php"; ?>


<!-- Navigation HTML -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">CMS - Admin Panel</a>
    </div>

    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <!-- Online Users Count -->
        <li class="text-capitalize">
            <a href="#">
                <span><?php echo $online_users_count; ?></span>
                <span> :</span>
                <span>Users are online</span>
            </a>
        </li>

        <!-- Goto Home site (Frontend Section) -->
        <li>
            <a href="../index.php" class="text-uppercase">Home site</a>
        </li>

        <!-- Admin User Section -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu alert-dropdown">
                <li>
                    <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                </li>
                <li>
                    <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">View All</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <!-- Profile Name and Profile Image Avatar -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- Profile Avatar -->
                <?php
                $profile_avatar = $_SESSION['profile-img'];
                $users_gender = $_SESSION['gender'];

                //If there is any profile-img (From Users Database)...
                if (!empty($profile_avatar)) {
                    echo "<img src='../images/profile_img/{$profile_avatar}' alt='No-Profile-Avatar' class='img' width='25' height='25' style='border-radius: 100%; margin-left: 10px; margin-right: 5px;'>";
                }

                //If there is no any profile-img..
                if (empty($profile_avatar)) {
                    //Male profile..
                    if ($users_gender == 'Male') {
                        echo "<img src='../images/profile_img/default/male.png' alt='No-Profile-Avatar' class='img' width='25' height='25' style='border-radius: 100%; margin-left: 10px; margin-right: 5px;'>";
                    }
                    //Female profile..
                    if ($users_gender == 'Female') {
                        echo "<img src='../images/profile_img/default/female.jpeg' alt='No-Profile-Avatar' class='img' width='25' height='25' style='border-radius: 100%; margin-left: 10px; margin-right: 5px;'>";
                    }
                    //Other profile..
                    if ($users_gender == 'Other') {
                        echo "<img src='../images/profile_img/default/other.png' alt='No-Profile-Avatar' class='img' width='25' height='25' style='border-radius: 100%; margin-left: 10px; margin-right: 5px;'>";
                    }
                }
                ?>

                <!-- Profile Name -->
                <span><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></span>
                <b class="caret"></b>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>

                <li>
                    <a href="users.php?source=edit_user&editUserId=<?php echo $_SESSION['user-id']; ?>"><i class="fa fa-fw fa-gear"></i> Customise</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="posts.php">All Posts</a>
                    </li>
                    <li>
                        <a href="posts.php?source=add_post">Add Posts</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="category.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
            </li>

            <li class="active">
                <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-users" aria-hidden="true"></i>
                    Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo3" class="collapse">
                    <li>
                        <a href="users.php">View All Users</a>
                    </li>
                    <li>
                        <a href="users.php?source=create_user">Create User Account!</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>