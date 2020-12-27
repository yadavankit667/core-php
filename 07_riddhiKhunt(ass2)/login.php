<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<div class="container">
    <form method="post" action="">
        <div class="wrapper">   
            <h1>Login</h1>
            <p>login to start session</p>
            <div class="form-group">
                <input type="text"  id="txt_uname" class="form-control" name="txt_uname" placeholder="Username" />
            </div>
            <div class="form-group">
                <input type="password"  id="txt_uname"class="form-control" name="txt_pwd" placeholder="Password"/>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary" name="but_submit" id="but_submit" />
            </div>
            <p>you dont`t have an account? <a href="login.php">registers here</a>.</p>
        </div>
    </form>
</div>


<?php
include "config.php";

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($conn,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($conn,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as users from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['users'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            // echo $_SESSION['uname'];
            // die();
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}

