<?php
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

                        echo "<li><a href='#'>$title_link</a></li>";
                    }
                ?>
                <li><a href="admin/index.php" class="text-capitalize">admin panel</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>