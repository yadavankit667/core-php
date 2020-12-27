<html lang="en">

<head>
<meta charset="UTF-8">
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }
        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <!-- start edit Data Form-->
    <?php
    $conn = mysqli_connect("localhost","root","","corephp_login");
    $id= $_GET['id'];                                                       // url id
    $sql = "select * from category where id={$id}";

    $result = mysqli_query($conn,$sql) or die("Query unsuccessful");
    if(mysqli_num_rows($result)  > 0){
             while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <div class="wrapper">
        <h3>Edit Category</h3><br>
        <form role="form" method="post" action="">
            <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="cat_name" class="form-control"
                        value="<?php echo $row['cat_name']; ?>">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            </div>
            <div class="form-group">
                <input type="submit" name="update" value="Update">
                <input type="submit" name="delete" value="Delete">
            </div>
        </form>
    </div>
    <?php
    }
    }
    else
    {
        echo "no data found";
    }
?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>

<!-- # update  row action  -->
<?php
	 if(isset($_POST['update'])){
        $conn = mysqli_connect("localhost","root","","corephp_login");
        $id = $_POST['id'];
        $cat_name = $_POST['cat_name'];
        $qry = "UPDATE category SET cat_name='{$cat_name}' WHERE id={$id}";
        $run = mysqli_query($conn, $qry);
        if($run == true){
        	header('Location:add_category.php');
         }
 		else{
 			?>
<script>
    alert('oops ! Data updated error ');
</script>
<?php
 		}
    }
?>
<!-- end update row -->

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




