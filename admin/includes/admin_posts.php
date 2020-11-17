<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                
                <?php 
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];

                        //To Switching Between Scteens Here...
                        switch($source){
                            case "add_post":
                                include "admin_operation/post_ops/post_create.php";
                            break;

                            case "edit_post":
                                include "admin_operation/post_ops/post_update.php";
                            break;
                        }

                    }else{
                        // $_GET['source'] = '';
                        include "admin_operation/post_ops/post_read.php";
                    }
                ?>


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