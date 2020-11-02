<?php
///Select all from database..
$query = "SELECT * FROM `categories`";
$all_cate = mysqli_query($connection, $query);

//Checking the Query..
if (!$all_cate) {
    die("ERROR! when try to query for admin_category " . mysqli_errno($all_cate));
}
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Category
                    <small>Adding</small>
                </h1>

                <!-- Section of Category -->
                <section id="category">
                    <div class="row">
                        <!-- Add Category Column -->
                        <div class="col-xs-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="cate">Add Category</label>
                                    <input type="text" name="cate" class="form-control" placeholder="Category Title..">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" name="add_cate" value="Add">
                                </div>
                            </form>
                        </div>

                        <!-- Category Table Column -->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Categories Title</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    while ($fetch_cate = mysqli_fetch_assoc($all_cate)) {
                                        $cate_id = $fetch_cate['cat_id'];
                                        $cate_title = $fetch_cate['cat_title'];
                                    ?>
                                        <tr>
                                            <td><?php echo $cate_id;?></td>
                                            <td><?php echo $cate_title;?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>



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