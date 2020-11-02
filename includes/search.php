<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <!-- Now Posts are dynamically Cammings from Database -->
            <?php
            ///Some PHP here...
            if (isset($_POST['submit'])) {
                $search_item = $_POST['search'];

                ///Make Query for came data with  Search..
                $query = "SELECT * FROM `posts` WHERE `post_tags` LIKE '%$search_item%'";
                $search_query = mysqli_query($connection, $query);

                //Checking the Query...
                if (!$search_query) {
                    die("Query ERROR! From Search Forms " . mysqli_errno($search_query));
                }

                ///then Checking something when make Searh for products..
                $count = mysqli_num_rows($search_query);

                //Checking the search items is founded count or not..
                if ($count == 0) {
                    echo "<h3 class='text-danger text-center mt-5'>NO Results!</h3>";
                    echo "<h5 class='text-primary text-center'>'$search_item'</h5";
                } else {
                    ///PHP for Getting Contents Data from Database..
                    while ($posts = mysqli_fetch_assoc($search_query)) {
                        $post_title = $posts['post_title'];
                        $post_author = $posts['post_author'];
                        $post_date = $posts['post_date'];
                        $post_image = $posts['post_image'];
                        $post_content = $posts['post_content'];
            ?>

                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
            <?php }
                }
            }
            ?>

            <!-------- Pager ------->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>
