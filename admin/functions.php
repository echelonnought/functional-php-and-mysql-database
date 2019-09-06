<?php 

function insertCategories(){
    
    
     if(isset($_POST['submit']))
     {
         global $connection;
        $cat_title = $_POST['cat_title'];
        $cat_title = mysqli_real_escape_string($connection,$cat_title);

        if($cat_title == "" || empty($cat_title)){
            echo "This field can not be empty";
        }
       else{
           $query="INSERT INTO category(cat_title) VALUE ('{$cat_title}') ";
           $admin_category_query= mysqli_query($connection, $query);
           if(!$admin_category_query){
               die("QUERY FAILED" . mysqli_error($connection));
           }
       }   
                        }
    
    
    
    
    
    
    
    
}



function displayCategories(){
    
                global $connection;    
                $query= "SELECT * FROM category";
                $category_admin_query= mysqli_query($connection,$query);
                if(!$category_admin_query){
                    die("QUERY FAILED" . mysqli_error($connection));
                }

                while($row = mysqli_fetch_assoc($category_admin_query)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<tr>";
                echo "<td>{$cat_id}</td>";    
                echo "<td>{$cat_title}</td>"; 
                echo "<td><a href='categories.php?edit=$cat_id'>Edit</a></td>";     
                echo "<td><a href='categories.php?delete=$cat_id'>Delete</a></td>"; 
                echo "</tr>";
                }


    
}




function deleteCategories(){
    
                global $connection;
                if(isset($_GET['delete'])){

                $get_cat_id = $_GET['delete'];
                //DELETE QUERY REQUESTS HERE
                $query="DELETE FROM category WHERE cat_id = $get_cat_id ";
                $delete_query = mysqli_query($connection, $query);
                if(!$delete_query){
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                header("Location: categories.php ");
                }


    
    
}











?>