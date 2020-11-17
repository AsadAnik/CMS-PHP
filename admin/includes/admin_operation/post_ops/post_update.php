
<h1 class="page-header">
    Post
    <small>Editing</small>
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
                    <input type="submit" class="btn btn-primary text-capitalize" name="publish-post" value="Update Post">
                </div>
           </form>
        </div>
    </div>
</section>