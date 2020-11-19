<?php 
///Code With PHP...
    if(isset($_POST['publish-post'])){
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['category-id'];
        $post_status = $_POST['status'];
        
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        // $post_date = date('d-m-y');
        $post_tag = $_POST['tags'];
        $post_content = $_POST['content'];
        $post_comment_count = 4;

        //Make Local Image to our  project/Application here...
        ///Way to upload Image/Files...
        move_uploaded_file($post_image_temp, "../images/$post_image");


        ///Another Way to Upload Files With Deept...
        ///Making Operation for Image Uploading...
        //Creating File Uploading System with PHP..
        // $file = $_FILES['image'];

        // $file_name = $file['name'];
        // $file_temp = $file['tmp_name'];
        // $file_type = $file['type'];
        // $file_size = $file['size'];
        // $file_error = $file['error'];
        
        // // print_r($file);

        // //Do Ops here..
        // $file_extension = explode('.', $file_name);
        // $real_extension = strtolower(end($file_extension));

        // //Allowing Format of File to upload...
        // $allowable = array('jpg', 'png', 'jpeg');

        // ///Decition making now...
        // if(in_array($real_extension, $allowable)){
        //     if($file_error === 0){
        //         if($file_size < 1000000){

        //             $file_name_new = uniqid('', true) . "." . $real_extension;
        //             $file_destination = '../images/'.$file_name_new;

        //             //Move FIle to Local Temporary storage to server...
        //             move_uploaded_file($file_temp, $file_destination);

        //             //make redirect with header..
        //             header("Location: posts.php?source=add_post");

        //         }else{
        //             echo "Your File is too Big!";
        //         }

        //     }else{
        //         echo "There is an ERR! when try to Fetch Files";
        //     }

        // }else{
        //     echo "You can not upload files of this type";
        // }


        ///INSERTING into the DATABASE...
        $query = "INSERT INTO `posts` (post_category_id, post_title, post_author, post_date, post_image, post_tags, post_content, post_status, post_comment_count) ";
        $query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}','{$post_tag}' ,'{$post_content}', '{$post_status}', '{$post_comment_count}')";

        //Make query for all data to submit on database..
        $make_query = mysqli_query($connection, $query);

        ///Checking query...
        if(!$make_query){
            die("GET ERROR! when try to make query to INSERT posts data to database!".mysqli_error($connection));
        }
      
    }
?>

<h1 class="page-header">
    Posts
    <small>Adding</small>
</h1>

<!-- Add Categories HTML -->
<section id="category">
    <div class="row">
        <!-- Add Category Column -->
        <div class="col-xs-12">
           <form action="posts.php?source=add_post" method="POST" enctype="multipart/form-data">
               <!-- Title -->
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" placeholder="Title" name="title">
                </div>

                <!-- Category Id -->
                <div class="form-group">
                    <label for="category-id">Post Category Id</label>
                    <input type="text" class="form-control" placeholder="Category ID" name="category-id">
                </div>

                <!-- Author -->
                <div class="form-group">
                    <label for="author">Post Author</label>
                    <input type="text" class="form-control" placeholder="Author" name="author">
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="status">Post Status</label>
                    <input type="text" class="form-control" placeholder="Status" name="status">
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="image">Post Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <!-- Tags -->
                <div class="form-group">
                    <label for="tags">Post Tags</label>
                    <input type="text" class="form-control" placeholder="Tags" name="tags">
                </div>

                <!-- Content -->
                <div class="form-group">
                    <label for="content">Post Content</label>
                    <textarea name="content" cols="30" rows="10" class="form-control" placeholder="Write post here..."></textarea>
                </div>

                <!-- Submit Form -->
                <div class="form-group">
                    <input type="submit" class="btn btn-success text-capitalize" name="publish-post" value="Publish Post">
                </div>
           </form>
        </div>
    </div>
</section>