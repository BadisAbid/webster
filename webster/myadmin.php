<?php
session_start();
if(!isset($_SESSION['email'])){
  echo "<script>window.open('login.php','_self')</script>";
}

$conn=mysqli_connect("localhost","root","","webster");

function connectDB($servername,$username,$password,$dbname){
  return mysqli_connect($servername,$username,$password,$dbname);
     
}

function delete($conn,$id){
  if(isset($_GET['del'])){
    $del_id=$_GET['del'];
    $delete="DELETE FROM user WHERE user_id='$del_id'";
    $run_delete=mysqli_query($conn,$delete);
    if($run_delete===true){
        echo "Record has been deleted";
    }
    else{
        echo "Failed, Try again";
    }
}
}

function update($conn,$edit_id,$euser_name,$euser_email,$euser_password){
  if(isset($_POST['insert-btn'])){

    $euser_name=$_POST['user_name'];
    $euser_email=$_POST['user_email'];
    $euser_password=$_POST['user_password'];
   
    $update="UPDATE user SET user_name='$euser_name',user_email='$euser_email',user_password='$euser_password' WHERE user_id='$edit_id'";
    $run_update = mysqli_query($conn,$update);
   if($run_update===true){
       echo "Data Updated";
   }
   else{
       echo "Failed try again";
   
   }
   }
}

function insert($conn,$user_name,$user_email,$user_password){
  if(isset($_POST['insert-btn'])){

    $user_name=$_POST['user_name'];
     $user_email=$_POST['user_email'];
     $user_password=$_POST['user_password'];
    
     $insert="INSERT INTO user(user_name,user_email,user_password) VALUES('$user_name','$user_email','$user_password')";
    $run_insert=mysqli_query($conn,$insert);
    if($run_insert===true){
        echo "Data inserted";
    }
    else{
        echo "Failed try again";
    
    }
    }
}

function display($conn){
    $select ="SELECT * FROM user";
    $run = mysqli_query($conn,$select);
    while($row_user=mysqli_fetch_array($run)){
    $user_id=$row_user['user_id'];
    $user_name=$row_user['user_name'];
    $user_email=$row_user['user_email'];
    $user_password=$row_user['user_password'];
    ?>
    
    <tbody>
          <tr>
            <td> <?php echo $user_id;?> </td>
            <td> <?php echo $user_name?> </td>
            <td> <?php echo $user_email;?> </td>
            <td> <?php echo $user_password;?> </td>
            <td> <a class="btn btn-danger" href="view_user.php?del=<?php echo $user_id;?>">Delete</a></td>
            <td> <a class="btn btn-success" href="edit_user.php?edit=<?php echo $user_id;?>">Edit</a></td>
          </tr> 

    </tbody>
          <?php } 
          }

          $conn=mysqli_connect("localhost","root","","webster");
          if(!$conn){
              die("Connection failed".mysqli_connect_error());
          }
        if(isset($_GET['action']) && $_GET['action']==='delete'){
            delete($conn,$_GET['id']);
            header("location: admin_util.php");
            exit;
        }
         
        if(isset($_GET['action']) && $_GET['action']==='update'){
            update($conn,$_GET['id'],$_POST['user_name'],$_POST['user_email'],$_POST['user_password']);
            header("location: admin_util.php");
            exit;
        }
         

        if(isset($_GET['action']) && $_GET['action']==='insert'){
            insert($conn,$_POST['user_name'],$_POST['user_email'],$_POST['user_password']);
            header("location: admin_util.php");
            exit;
         }
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name ="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name ="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <input type="submit" name ="login-btn" class="btn btn-primary btn-block" value ="Login"/>
        </div>      
    </form>
    <?php
$conn=mysqli_connect("localhost","root","","webster");
if(isset($_POST['login-btn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $select="SELECT * FROM user WHERE user_email='$email'";
    $run = mysqli_query($conn,$select);
    $row_user= mysqli_fetch_array($run);
    $db_email = $row_user['user_email'];
    $db_password = $row_user['user_password'];

    if($email == $db_email && $password == $db_password){
        echo "<script>window.open('view_user.php','_self')</script>";
        $_SESSION['email']=$db_email;
    }
   
    else{
        echo "Invalid email or password";
    }
}



?>
         
        

 

  






        