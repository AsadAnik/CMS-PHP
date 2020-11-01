 <!-- Blog Sidebar Widgets Column -->
 <div class="col-md-4">

     <!-- Blog Search Well -->
     <!-- Search Bar Here Which is Working with Custom Search Engine -->
     <div class="well">
         <h4>Blog Search</h4>

         <form action="search.php" method="post">
             <div class="input-group">
                 <input type="text" class="form-control" name="search" placeholder="Search...">
                 <span class="input-group-btn">
                     <button class="btn btn-default" type="submit" name="submit">
                         <span class="glyphicon glyphicon-search"></span>
                     </button>
                 </span>
             </div>
         </form>
         <!-- /.input-group -->
     </div>

     <!-- Blog Categories Well -->
     <?php 
     ///PHP for all categories inside Blog Categories...
        $query = "SELECT * FROM `categories`";
        $all_category = mysqli_query($connection, $query);

        ///checking the connection..
        if(!$all_category){
            die("GET ERROR! when Sidebars Categories Data Query!".mysqli_errno($all_category));
        }
     ?>
     <div class="well">
         <h4>Blog Categories</h4>
         <div class="row">
             <div class="col-lg-12">
                 <ul class="list-unstyled">
                    <?php 
                        while($category = mysqli_fetch_assoc($all_category)){
                            $category_title = $category['cat_title'];
                    ?>
                            <li><a href="#"><?php echo $category_title;?></a></li>
                    <?php        
                        }
                    ?>
                   
                 </ul>
             </div>
             <!-- /.col-lg-6 -->
         </div>
         <!-- /.row -->
     </div>

     <!-- Side Widget Well -->
     <div class="well">
         <h4>Side Widget Well</h4>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
     </div>

 </div>

 </div>
 <!-- /.row -->

 <hr>