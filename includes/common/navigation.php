<?php
    //Lets Starting the session here..
    session_start();

    //Make Query with data..
    $query = "SELECT * FROM `categories`";
    $catagories_all_data = mysqli_query($connection, $query);

    //Checking Query..
    if (!$catagories_all_data) {
        die("Query Failed!" . mysqli_errno($catagories_all_data));
    }
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CMS - Community</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php 
                    ///Linking Categories from Database...
                    while($catagory = mysqli_fetch_assoc($catagories_all_data)){
                        $title_link = $catagory['cat_title'];
                        $id_link = $catagory['cat_id'];

                        echo "<li><a href='category.php?categoryId=$id_link'>$title_link</a></li>";
                    }
                ?>
                
                <!-- Admin Panel Linking -->
<<<<<<< HEAD
                <?php
                    //Lets Starting the session here..
                    session_start();

                    // Let's see the user session..
                    if (isset($_SESSION['usertype'])){
=======
                <?php 
                ///Code...
                    if(isset($_SESSION['usertype'])){
>>>>>>> 0be682a0a464568d8b8fe162e7dc220574c5e66a
                        echo "<li><a href='admin/index.php' class='text-capitalize'>admin panel</a></li>";
                    }
                ?>

                <!-- Contact Us Page Linking -->
                <li><a href="contact_us.php" class="text-capitalize">contact us</a></li>

                <?php 
<<<<<<< HEAD
=======
                ///PHP Code...
>>>>>>> 0be682a0a464568d8b8fe162e7dc220574c5e66a
                    //Lets checking the usestype from session login user then make operation...
                    if(isset($_SESSION['usertype'])){
                        if(isset($_GET['postId'])){
                            $postId = $_GET['postId'];
                            echo "<li><a href='admin/posts.php?source=update_post&editId={$postId}'>EDIT POST</a></li>";
                        }
                    }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>