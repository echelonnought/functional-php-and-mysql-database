<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include "includes/admin_navigation.php"; ?> 
        
        
        
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome To Admin Page 
                             <small>Ngole Lawson</small>
                            </h1>
                    </div>
                            
                    
                    <div class="col-xs-6">
                     <?php insertCategories();?>
                        
                    
                      <form action="" method="post">
                        <label for="cat_title">Add Categories</label>
                        <div class="form-group">  
                        <input type="text" class="form-control" name="cat_title">
                        </div>
                        <div class="form-group"> 
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Categories">   </div> 

                      </form>
                        
                   <?php
                        
                     if(isset($_GET['edit'])){
                         
                         $cat_id=$_GET['edit'];
                         
                        include "includes/update_categories.php";
                     }
                        
                        
                        
                    ?>
                    </div>
                    
                    
                    <div class="col-xs-6">
                    <?php deleteCategories(); ?> 
                      
                       
                        <table class="table table-bordered table-hover">
                           <thead>
                                <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                                </tr>
                            
                           </thead>
                           <tbody>
                               <!--DISPLAY ALL CATEGORIES IN ADMIN AREA QUERY RIGHT HERE-->       
                  <?php displayCategories(); ?>
                     
                               
                               
                               
                               
                               
                    
                           </tbody>
                        
                       </table> 
                       
                    </div>
                    
                    
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

     
        
        
        
   <?php include "includes/admin_footer.php"; ?>     
        