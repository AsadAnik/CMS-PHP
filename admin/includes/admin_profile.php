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
                            case "profile_update":
                                include "admin_operation/profile_ops/update_profile.php";
                            break;
                        }

                    }else{
                        // $_GET['source'] = '';
                        include "admin_operation/profile_ops/view_profile.php";
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