<?php
session_start();
$conn=mysqli_connect("localhost","root","","webster");
if(!isset($_SESSION['email'])){
  echo "<script>window.open('login.php','_self')</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>View_User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<br><br>
<div class="container">
    <a href="add_user.php" class="btn btn-primary">+</a>
    <br><br>
  <h2>View Users</h2>
  <?php
    $conn=mysqli_connect("localhost","root","","webster");
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
  ?>
            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
<?php
$conn=mysqli_connect("localhost","root","","webster");
$select ="SELECT * FROM user";
$run = mysqli_query($conn,$select);
while($row_user=mysqli_fetch_array($run)){
$user_id=$row_user['user_id'];
$user_name=$row_user['user_name'];
$user_email=$row_user['user_email'];
$user_password=$row_user['user_password'];
?>


      <tr>
        <td> <?php echo $user_id;?> </td>
        <td> <?php echo $user_name?> </td>
        <td> <?php echo $user_email;?> </td>
        <td> <?php echo $user_password;?> </td>
        <td> <a class="btn btn-danger" href="view_user.php?del=<?php echo $user_id;?>">Delete</a></td>
        <td> <a class="btn btn-success" href="edit_user.php?edit=<?php echo $user_id;?>">Edit</a></td>
      </tr> 

      <?php } ?>
     
    </tbody>
  </table>
</div>

</body>
</html>