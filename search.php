<?php include "includes/header.php";?>
<?php include "db.php"; ?>

    <!-- Navigation -->
   <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                 <?php
             if(isset($_POST['submit'])){
                 
             //search query here can be used down in the while loop because we don't want to repeat same lines of query codes
                 $search = $_POST['search'];
                 $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                 $search_query= mysqli_query($connection,$query);
                 if(!$search_query){
                     die("QUERY FAILED" . mysqli_error($connection));
                 }
                 
                 $count_rows=mysqli_num_rows($search_query);
                 if($count_rows == "" || empty($count_rows)){
                     
                     echo "<h1>NO RESULTS</h1>";
                     
                 }
                 else{     
                
               
                while($row = mysqli_fetch_assoc($search_query)){
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=substr($row['post_content'], 0,150);
                    

                    ?>
                
                 <!-- First Blog Post -->
                 <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

               
                <h2>
                 <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?> " alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <?php    } 
                
                
                     
                 }
            
                 
                 
             }
    
         
                
           ?>     
                
         
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

      <?php include "includes/footer.php"; ?>