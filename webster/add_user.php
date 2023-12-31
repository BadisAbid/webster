<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add_User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <br><br>
  <h2>Add New User</h2>
  <form action="" method="post">
    <div class="form-group">
    <label>Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" name="user_name" required>

      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="user_email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="user_password"required>
    </div>
    
    <input type="submit" name="insert-btn" class="btn btn-primary"/>
  </form>

<?php
$conn=mysqli_connect("localhost","root","","webster");
// if(mysqli_connect_errno()){
//     echo "Connection failed";
// }
// else{
//     echo "Connection Work";}

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


?>
<br>

<a class ="btn btn-primary" href="view_user.php">View User</a>

</div>

</body>
</html>
