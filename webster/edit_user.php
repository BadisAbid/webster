<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit_User</title>
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
  <h2>Edit_User</h2>

  <?php
    $conn=mysqli_connect("localhost","root","","webster");
    if(isset($_GET['edit'])){
        $edit_id=$_GET['edit'];
        $select ="SELECT * FROM user WHERE user_id='$edit_id'";
      $run = mysqli_query($conn,$select);
      $row_user=mysqli_fetch_array($run);
      $user_name=$row_user['user_name'];
      $user_email=$row_user['user_email'];
      $user_password=$row_user['user_password'];
    }
  ?>



  <form action="" method="post">
    <div class="form-group">
    <label>Name:</label>
      <input type="text" class="form-control" value="<?php echo $user_name;?>" placeholder="Enter Name" name="user_name" required>

      <label for="email">Email:</label>
      <input type="email" class="form-control" value="<?php echo $user_email;?>" placeholder="Enter email" name="user_email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" value="<?php echo $user_password;?>" placeholder="Enter password" name="user_password"required>
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


?>
<br>

<a class ="btn btn-primary" href="view_user.php">View User</a>

</div>

</body>
</html>
