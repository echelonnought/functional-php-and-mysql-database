  
                  <table class="table table-bordered table-hover">
                      <thead>
                <?php         
                $query="SELECT * FROM posts";         
                $view_all_posts_query= mysqli_query($connection, $query);         
                    
                     ?>    
                         
                          <tr>
                              <th>Id</th>
                              <th>Title</th>
                              <th>Author</th>
                              <th>Image</th>
                              <th>Tags</th>
                              <th>Comments</th>
                              <th>Category</th>
                              <th>Date</th>
                              <th>Status</th>
                              <th>Edit</th>
                              <th>Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                         
                       <?php  
                    while($row=mysqli_fetch_assoc($view_all_posts_query)){
                    
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comments = $row['post_comments'];
                    $post_category_id = $row['post_category_id'];
                    $post_date = $row['post_date'];
                    $post_status = $row['post_status'];
                       
                    echo "<tr>";
                    echo "<td>$post_id</td>";
                    echo "<td>$post_title</td>";
                    echo "<td>$post_author</td>";
                    echo "<td><img class='img-responsive' width='100' src='../images/$post_image' alt='images'></td>";
                    echo "<td>$post_tags</td>";
                        
                    
                        
                    echo "<td>$post_comments</td>";
                        
                        
                    $query= "SELECT * FROM category WHERE cat_id={$post_category_id} ";
                    $relate_category_query= mysqli_query($connection,$query);
                    if(!$relate_category_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    while($row = mysqli_fetch_assoc($relate_category_query)){
                           $cat_id = $row['cat_id'];
                           $cat_title = $row['cat_title'];
                       echo "<td>{$cat_title}</td>";         
                    }
                                
                    echo "<td>$post_date</td>";
                    echo "<td>$post_status</td>";
                    echo "<td><a href='posts.php?source=edit_posts&p_id=$post_id'>Edit</a></td>";     echo "<td><a href='posts.php?delete=$post_id'>Delete</a></td>";            
                    echo "</tr>";
                    
                            }
                         
                         
                         
                         
                         ?>
                         
                      </tbody>
                      
                      <?php
                      if(isset($_GET['delete'])){
                          
                         $the_post_id = $_GET['delete'];
                        $query="DELETE FROM posts WHERE post_id = $the_post_id ";
                        $delete_post_query = mysqli_query($connection, $query);
                        if(!$delete_post_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                }
                header("Location: posts.php");
                }

                          
                      
                      
                      
                      
                      
                      
                      
                      ?>
                  </table>
                       