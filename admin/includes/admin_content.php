<!-- PHP to count all of the staff which need for dashboards User Admin -->
<?php
///Code...
///For All Posts...
$query_post = "SELECT * FROM `posts`";
$result_post = mysqli_query($connection, $query_post);
check_error($result_post, "Get ERR! when try to make query on dashboard of admin ", $connection);
//lets counting the posts how many..
$post_counts = mysqli_num_rows($result_post);

//To Draft Post..
$query_post_d = "SELECT * FROM `posts` WHERE `post_status` =  'draft'";
$result_post_d = mysqli_query($connection, $query_post_d);
check_error($result_post_d, "Get ERR! when try to make query on dashboard of admin ", $connection);
//lets counting the posts how many..
$post_counts_draft = mysqli_num_rows($result_post_d);

///All Commnents..
$query_comments = "SELECT * FROM `comments`";
$result_comment = mysqli_query($connection, $query_comments);
check_error($result_comment, "GET ERR! when comments fetching on dashboard of Admin ", $connection);
//lets count the comments how many..
$comment_counts = mysqli_num_rows($result_comment);

//To Uapproved Comments..
$query_comments_u = "SELECT * FROM `comments` WHERE `comments_status` = 'unapproved'";
$result_comment_u = mysqli_query($connection, $query_comments_u);
check_error($result_comment_u, "GET ERR! when comments fetching on dashboard of Admin ", $connection);
//lets count the comments how many..
$comment_counts_upapproved = mysqli_num_rows($result_comment_u);

///All Users...
$query_users = "SELECT * FROM `users`";
$result_user = mysqli_query($connection, $query_users);
check_error($result_user, "GET ERR! when users fetching on dashboard of Admin ", $connection);
//lets count the users how many..
$user_counts = mysqli_num_rows($result_user);

//To Subscribers..
$query_users_t = "SELECT * FROM `users` WHERE `users_type` = 'subscriber'";
$result_user_t = mysqli_query($connection, $query_users_t);
check_error($result_user_t, "GET ERR! when users fetching on dashboard of Admin ", $connection);
//lets count the users how many..
$user_counts_type = mysqli_num_rows($result_user_t);

///All Categories...
$query_categories = "SELECT * FROM `categories`";
$result_category = mysqli_query($connection, $query_categories);
check_error($result_category, "GET ERR! when users fetching on dashboard of Admin ", $connection);
//lets count the users how many..
$category_counts = mysqli_num_rows($result_category);


//Checking the result here (Functional)...
function check_error($statement, $msg, $connection)
{
    if (!$statement) {
        die($msg . mysqli_error($connection));
    }
}
?>


<!------ Doc HTML Template here -------->
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome To Admin
                    <small><?php echo $_SESSION['username']; ?></small>
                </h1>

                <!-- Dashboard Cards -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $post_counts; ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $comment_counts; ?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $user_counts; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $category_counts; ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="category.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!----- Script For Google Charts On there ----->
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart', 'bar']
                    });
                    google.charts.setOnLoadCallback(drawStuff);

                    function drawStuff() {
                        var button = document.getElementById('change-chart');
                        var chartDiv = document.getElementById('chart_div');

                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],
                            <?php
                            ///To All Things showing inside of google chart...
                            $element_header = ['Posts', 'Draft Posts', 'Comments', 'Upapproved Comments', 'Users', 'Subscribers', 'Categoris'];
                            $element_count = [$post_counts, $post_counts_draft, $comment_counts, $comment_counts_upapproved, $user_counts, $user_counts_type, $category_counts];
                            $element_amount = count($element_header);

                            //Loop throw inside for array make sattle..
                            for ($i = 0; $i < $element_amount; $i++) {
                                echo "['{$element_header[$i]}'" . "," . "{$element_count[$i]}],";
                            }
                            ?>
                        ]);

                        var materialOptions = {
                            width: 'auto',
                            // chart: {
                            //     title: 'Nearby galaxies',
                            //     subtitle: 'distance on the left, brightness on the right'
                            // },
                            series: {
                                0: {
                                    axis: 'distance'
                                }, // Bind series 0 to an axis named 'distance'.
                                1: {
                                    axis: 'brightness'
                                } // Bind series 1 to an axis named 'brightness'.
                            },
                            axes: {
                                y: {
                                    distance: {
                                        label: 'parsecs'
                                    }, // Left y-axis.
                                    brightness: {
                                        side: 'right',
                                        label: 'apparent magnitude'
                                    } // Right y-axis.
                                }
                            }
                        };

                        function drawMaterialChart() {
                            var materialChart = new google.charts.Bar(chartDiv);
                            materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
                            button.innerText = 'Change to Classic';
                            button.onclick = drawClassicChart;
                        }

                        drawMaterialChart();
                    };
                </script>

                <!-- Another Row -->
                <!------ Row Of the Charts Here ------>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div id="chart_div" style="width: 'auto'; height: 500px;"></div>
                    </div>
                </div>


                <!------ Last footer of dashboard here ------>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->