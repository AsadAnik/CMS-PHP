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

   <!-- Create Form  -->
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