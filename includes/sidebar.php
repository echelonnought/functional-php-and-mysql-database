<div class="col-md-4">
         

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                <form action="search.php" method="post">    
                 <div class="input-group">
                    <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                         <input type="submit" class="btn btn-primary" name="submit">  
                                <span class="glyphicon glyphicon-search"></span>
                        </span>
                  </div>
                </form><!-- search form -->    
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                 <h4>Blog Categories</h4>
                      <?php 
                    
                    
                    $query= "SELECT * FROM category LIMIT 4";
                    $category_sidebar_query= mysqli_query($connection,$query);
                    if(!$category_sidebar_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    while($row = mysqli_fetch_assoc($category_sidebar_query)){
                           $cat_id = $row['cat_id'];
                           $cat_title = $row['cat_title'];
                          
                        echo "<li><a href='category.php?category= $cat_id'>{$cat_title}</a></li>";
                    }
                    
                    
                    
                    ?>
                    
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php
                   
                    while($row = mysqli_fetch_assoc($category_sidebar_query)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<li><a href='#'>{$cat_title}</a></li>";
                    }

                    ?>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>