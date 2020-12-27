<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Create Category</h2><br>
        <form action="" method="post">
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="cat_name" class="form-control">
            </div> 
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>  
        </form>
    </div>    
</body>
</html>
<!-- start insert Data -->
<?php
    if(isset($_POST['submit'])){
        $conn = mysqli_connect("localhost","root","","corephp_login");
        $cat_name = $_POST['cat_name'];
        $qry = "INSERT INTO `category`(`cat_name`) VALUES ('$cat_name')";
        $run = mysqli_query($conn, $qry);
        if($run == true){
            ?>
    <script>
    alert('Data Inserted Successfully');
    </script>
    <?php
        }
    }
?>
<!-- end insert Data -->

<!-- start fetch Data -->
<?php
    $conn = mysqli_connect("localhost","root","","corephp_login");
    
    $sql = "select * from category";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)  > 0)
    {
        ?>
         <!-- <form role="form" method="post" action=""> -->
        <?php
        echo '<table class="table">';
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Category Name</th>";
            echo "<th>Action</th>";
            echo "</td></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
                    echo "<td>" .$row["id"] ."</td>";
                    echo "<td>" .$row["cat_name"] ."</td>";
                    ?>
                    <!-- <td colspan="2"><input type="submit" name="update" value="UPDATE" onclick="update.php"> -->
                    <!-- <td><input type="submit" name="delete" value="Delete"></td> -->
                    <td><a href="edit_category.php?id=<?php echo $row["id"]?>">update</a>
                    <td><a href="edit_category.php?id=<?php echo $row["id"]?>">Delete</a>
                <?php  
                 echo "</tr>";
            }
            echo '</tbody>';
            echo '</table>';
            echo "<br><br>";
    }
    else
    {
        echo "no data found";
    }
?>
<!-- </form> -->
<!-- // end fetch data -->




<!-- // end delete row data -->

<?php
	  if(isset($_POST['delete'])){
        $conn = mysqli_connect("localhost","root","","corephp_login");

        
        $id = $_POST['id'];
        $cat_name = $_POST['cat_name'];
        
      $qry = "DELETE FROM category WHERE id ={$id}";
         $run = mysqli_query($conn, $qry);
        if($run == true){
        	header('Location:add_category.php');
         }
 		else{
 			?>
 			 <script>
		    alert('oops ! You can not delete row ');
		    </script>
		    <?php
 		}
    }
?> 