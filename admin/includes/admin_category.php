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
                <?php
                ///Add Categories Title PHP...
                if (isset($_POST['add_cate'])) {
                    $cate_title = $_POST['cate'];

                    //Checking is empty on Addming categories..
                    if ($cate_title === '' || empty($cate_title)) {
                        echo "<h4 class='text-danger'>Add category title is empty!</h4>";
                    } else {
                        //Creating some queries..
                        $query = "INSERT INTO `categories` (cat_title) ";
                        $query .= "VALUE ('{$cate_title}')";

                        //make My_SQLi Query..
                        $cate_title_insert_query = mysqli_query($connection, $query);

                        ///Checking the query from here..
                        if (!$cate_title_insert_query) {
                            die("ERROR! when query in categories adding" . mysqli_errno($cate_title_insert_query));
                        }
                    }
                }
                ?>

                <!-- Add Categories HTML -->
                <section id="category">
                    <div class="row">
                        <!-- Add Category Column -->
                        <div class="col-xs-6">
                            <form method="post">
                                <div class="form-group">
                                    <label for="cate">Add Category</label>
                                    <input type="text" name="cate" class="form-control" placeholder="Category Title..">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" name="add_cate" value="Add">
                                </div>
                                <hr>
                            </form>


                            <!------ Update/Edit Items from here ------>
                            <?php 
                                ///Make Update with query...
                                if(isset($_GET['edit'])){
                                    $cate_update_id = $_GET['edit'];
                                    include "category_update.php";
                                }
                            ?>
                        </div>

                        <!--------- Category Table Column -------->
                        <?php
                        ///Select all from database..
                        //Categories Table PHP...
                        $query = "SELECT * FROM `categories`";
                        $all_cate = mysqli_query($connection, $query);

                        //Checking the Query..
                        if (!$all_cate) {
                            die("ERROR! when try to query for admin_category " . mysqli_errno($all_cate));
                        }
                        ?>
                        <!-- Categories Table HTML -->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Categories Title</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>

                                <?php
                                ///Making the delete with php...
                                if (isset($_GET['deleteId'])) {
                                    $delete_id = $_GET['deleteId'];

                                    //Make query for deleting categories title with click on button....
                                    $query = "DELETE FROM `categories` WHERE `cat_id` = {$delete_id}";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: category.php");

                                    ///checking the query...
                                    if (!$delete_query) {
                                        die("ERROE! when try to Delete categories title " . mysqli_errno($delete_query));
                                    }
                                }
                                ?>
                                <tbody>
                                    <?php
                                    while ($fetch_cate = mysqli_fetch_assoc($all_cate)) {
                                        $cate_id = $fetch_cate['cat_id'];
                                        $cate_title = $fetch_cate['cat_title'];
                                    ?>
                                        <tr>
                                            <td><?php echo $cate_id; ?></td>
                                            <td><?php echo $cate_title; ?></td>
                                            <td>
                                                <a href="category.php?deleteId=<?php echo $cate_id; ?>" class="btn btn-xs btn-danger">DELETE</a>

                                                <a href="category.php?edit=<?php echo $cate_id; ?>" class="btn btn-xs btn-primary">EDIT</a>
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


                <!-------- OL Li for contents last Bottom Panel -------->
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