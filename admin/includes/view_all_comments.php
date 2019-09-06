  
                  <table class="table table-bordered table-hover">
                      <thead>
                <?php         
                $query="SELECT * FROM comments";         
                $select_comments= mysqli_query($connection, $query);         
                    
                     ?>    
                         
                          <tr>
                              <th>Id</th>
                              <th>Author</th>
                              <th>Comment</th>
                              <th>Status</th>
                              <th>Email</th>
                              <th>In Response To</th>
                              <th>Date</th>
                              <th>Approve</th>
                              <th>Unapprove</th>
                              <th>Delete</th>
                         </tr>
                      </thead>
                      <tbody>
                         
                       <?php  
                    while($row=mysqli_fetch_assoc($select_comments)){
                    
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_email= $row['comment_email'];
                    $comment_content = $row['comment_content'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];
                    
                       
                    echo "<tr>";
                    echo "<td>$comment_id </td>";
                    echo "<td>$comment_author</td>";
                    echo "<td>$comment_content</td>";
                    echo "<td>$comment_status</td>";    
                    echo "<td>$comment_email</td>";    
//                    
////                    $query= "SELECT * FROM category WHERE cat_id={$comment_post_id} ";
////                    $relate_comment_category_query= mysqli_query($connection,$query);
////                    if(!$relate_comment_category_query){
////                        die("QUERY FAILED" . mysqli_error($connection));
////                    }
////                    while($row = mysqli_fetch_assoc($relate_comment_category_query)){
////                           $cat_id = $row['cat_id'];
////                           $cat_title = $row['cat_title'];
////                                
////                    }
//                    echo "<td>{$cat_title}</td>"; 
                        
                        $query="SELECT * FROM posts WHERE post_id=$comment_post_id ";
                        $comment_post_relations=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_assoc($comment_post_relations)){
                            $post_id=$row['post_id'];
                            $post_title=$row['post_title'];
                            
                        }
                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
       
                    
                    echo "<td>$comment_date</td>";
                   
                    echo "<td><a href='posts.php?source=edit_posts&p_id='>Approve</a></td>"; 
                    echo "<td><a href='posts.php?delete='>Unapprove</a></td>";
                    echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";            
                    echo "</tr>";
                    
                            }
                         
                         
                
                         
                         ?>
                         
                      </tbody>
                      
                      <?php
                      if(isset($_GET['delete'])){
                          
                         $the_comment_id = $_GET['delete'];
                        $query="DELETE FROM comments WHERE comment_id = $the_comment_id ";
                        $delete_comment_query = mysqli_query($connection, $query);
                        if(!$delete_comment_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                }
                header("Location: comments.php");
                }

                          
                      
                      
                      
                      
                      
                      
                      
                      ?>
                  </table>
                       