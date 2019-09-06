<?php
if(isset($_POST['create_post'])){
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_date = date('d-m-y');
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_comment_count = 4;
    echo "<h1>POST SUBMITTED</h1>";
    move_uploaded_file($post_image_temp, "../images/$post_image ");
    
$query = "INSERT INTO posts (post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_category_id) ";
    
$query .= " VALUES ('$post_title', '$post_author', now(), '$post_image', ' $post_content', ' $post_tags', '$post_status', ' $post_category_id') ";    
$create_post_query = mysqli_query($connection, $query);
    
}      




     ?>  
       
       <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
             <label for="title">Post Title</label>
             <input type="text" name="post_title" class="form-control">   
        </div> 
          
        <div class="form-group">
            <select name="post_category_id" id="">
                
                <?php
                $query= "SELECT * FROM category";
                    $edit_category_query= mysqli_query($connection,$query);
                    if(!$edit_category_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    while($row = mysqli_fetch_assoc($edit_category_query)){
                           $cat_id = $row['cat_id'];
                           $cat_title = $row['cat_title'];
                          
                     echo "<option value=''> {$cat_title} </option>";
                    }
                    
                
                
                
                
                ?>
                
            </select> 
        </div>

        <div class="form-group">
             <label for="post_author">Post Author</label>
             <input type="text" name="post_author" class="form-control">  
        </div>  

        <div class="form-group">
            <label for="post_status">Post Status</label>
             <input type="text" name="post_status" class="form-control">   
        </div>    
                
        <div class="form-group">
            <label for="post_image">Post Image</label>
             <input type="file" name="post_image" >  
        </div>    
                
                 
         <div class="form-group">
              <label for="post_tags">Post Tags</label>
             <input type="text" name="post_tags" class="form-control">   
        </div>
        
                
        <div class="form-group">
           <label for="post_content">Post Content</label>
            <textarea type="text" name="post_content" cols="30" rows="10" class="form-control" > 
            </textarea> 
        </div>
                
       <div>
       <input type="submit" name="create_post" class="btn btn-primary" value="Publish">
       </div>
</form>