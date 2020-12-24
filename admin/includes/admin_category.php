<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Category
                    <small>Adding</small>
                </h1>

                <!-- Add Categories HTML -->
                <section id="category">
                    <div class="row">
                        <!-- Add Category Column -->
                        <div class="col-xs-6">

                            <!---------- Create/Add Categories from here --------->
                            <?php include "admin_operation/category_ops/cate_create.php"; ?>

                            <!----------- Update/Edit Items from here ------------>
                            <?php
                            ///Make Update with query...
                            if (isset($_GET['edit'])) {
                                $cate_update_id = $_GET['edit'];
                                include "admin_operation/category_ops/cate_update.php";
                            }
                            ?>
                        </div>

                        <!--------- Category Table Column -------->
                        <div class="col-xs-6">

                            <!----- Read Categories for table  ----->
                            <?php include "admin_operation/category_ops/cate_read.php";?>

                            <!------ Delete Categories title ------->
                            <?php include "admin_operation/category_ops/cate_delete.php";?>    
                           
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