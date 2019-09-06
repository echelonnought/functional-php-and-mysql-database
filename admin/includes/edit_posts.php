<?php
   if(isset($_GET['p_id'])){
         $the_post_id = $_GET['p_id'];
       
   }           


            $query="SELECT * FROM posts";         
            $edit_posts_query= mysqli_query($connection, $query);         
            while($row=mysqli_fetch_assoc($edit_posts_query)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comments = $row['post_comments'];
                    $post_category_id = $row['post_category_id'];
                    $post_date = $row['post_date'];
                    $post_status = $row['post_status'];
                    $post_content = $row['post_content'];
                       
               }



     ?>
      
<?php        
          
if(isset($_POST['edit_post'])){
    
    
    
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_date = date('d-m-y');
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_comment_count = 4;
    
    move_uploaded_file($post_image_temp, "../images/$post_image ");
    
    if(empty($post_image)){
        $query="SELECT * FROM posts WHERE post_id=$the_post_id ";
        $get_image_query= mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($get_image_query) ){
            $post_image = $row['post_image'];
            
        }
        
        
    }
    
    
    
    
$query = "UPDATE posts SET "; 
$query .= " post_title = '$post_title', "; 
$query .= " post_category_id ='$post_category_id', "; 
$query .= " post_author = '$post_author', "; 
$query .= " post_status = '$post_status', "; 
$query .= " post_image = '$post_image', "; 
$query .= " post_date = now(), "; 
$query .= " post_tags = '$post_tags', "; 
$query .= " post_content = '$post_content', "; 
$query .= " post_comment_count = '$post_comment_count' "; 
$query .= " WHERE post_id=$the_post_id "; 
    $edit_post_query= mysqli_query($connection, $query);
    if(!$edit_post_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
}    





?>          
       
       <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
             <label for="title">Post Title</label>
             <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">   
        </div> 
          
        <div class="form-group">
            <select name="post_category" id="">
                
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
             <input value="<?php echo  $post_author; ?>" type="text" name="post_author" class="form-control">  
        </div>  

        <div class="form-group">
            <label for="post_status">Post Status</label>
             <input value="<?php echo $post_status; ?>" type="text" name="post_status" class="form-control">   
        </div>    
                
        <div class="form-group">
            <img src="../images/<?php echo $post_image; ?>" width="100" alt="">
            <input type="file" name="post_image">
        </div>    
                
                 
         <div class="form-group">
              <label for="post_tags">Post Tags</label>
             <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">   
        </div>
        
                
        <div class="form-group">
           <label for="post_content">Post Content</label>
            <textarea type="text" name="post_content" cols="30" rows="10" class="form-control" ><?php echo $post_content; ?> 
            </textarea> 
        </div>
                
       <div>
       <input type="submit" name="edit_post" class="btn btn-primary" value="UPDATE POST">
       </div>

</form>