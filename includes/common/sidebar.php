<?php
///PHP for all categories inside Blog Categories...
$query = "SELECT * FROM `categories`";
$all_category = mysqli_query($connection, $query);

///checking the connection..
if (!$all_category) {
    die("GET ERROR! when Sidebars Categories Data Query!" . mysqli_error($connection));
}
?>

<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <!-- Search Bar Here Which is Working with Custom Search Engine -->
    <div class="well">
        <h4>Blog Search</h4>

        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Login Section -->
    <div class="well text-center">
        <!-- Login button -->
        <?php
        if (!isset($_SESSION['usertype'])) {
            echo "<a href='login.php' class='btn btn-success form-control'>Login User!</a>";
        } else {
        ?>
            <!-- Profile Shows When is in Logged-In -->
            <h3>
                <!-- Users Profile Avatar -->
                <?php
                $profile_avatar = $_SESSION['profile-img'];
                $users_gender = $_SESSION['gender'];

                //If there is any profile-img (From Users Database)...
                if (!empty($profile_avatar)) {
                    echo "<img src='images/profile_img/{$profile_avatar}' alt='No-Profile-Avatar' width='45' height='45' style='border-radius: 100%;'>";
                }

                //If there is no any profile-img..
                if (empty($profile_avatar)) {
                    //Male profile..
                    if ($users_gender == 'Male') {
                        echo "<img src='images/profile_img/default/male.png' alt='No-Profile-Avatar' width='45' height='45' style='border-radius: 100%;'>";
                    }
                    //Female profile..
                    if ($users_gender == 'Female') {
                        echo "<img src='images/profile_img/default/female.jpeg' alt='No-Profile-Avatar' width='45' height='45' style='border-radius: 100%;'>";
                    }
                    //Other profile..
                    if ($users_gender == 'Other') {
                        echo "<img src='images/profile_img/default/other.png' alt='No-Profile-Avatar' width='45' height='45' style='border-radius: 100%;'>";
                    }
                }
                ?>

                <!-- FirstName & LastName -->
                <span><?php echo $_SESSION['firstname']; ?></span>
                <span> </span>
                <span><?php echo $_SESSION['lastname']; ?></span>

                <!-- Username -->
                <small>(<?php echo $_SESSION['username']; ?>)</small>
            </h3>

            <!-- Logout Link -->
            <a href="includes/logout.php">Logout</a>
        <?php
        }
        ?>

        <hr>

        <!-- Registration from Here -->
        <a href="registration.php" class="btn btn-primary form-control">Register Now</a>
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    //Fetching All Categories...
                    while ($category = mysqli_fetch_assoc($all_category)) {
                        $category_title = $category['cat_title'];
                        $category_id = $category['cat_id'];
                    ?>
                        <li><a href="category.php?categoryId=<?php echo $category_id; ?>"><?php echo $category_title; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>

</div>
<!-- /.row -->

<hr>