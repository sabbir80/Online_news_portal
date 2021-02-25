<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="reporter_profile";

include('include/reporter_header.php');

?>
<?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $email=$_SESSION['email'];
    $query=mysqli_query($conn,"SELECT * FROM reporter where email='$email'");
    while($row=mysqli_fetch_array($query)){

      $reporter=$row['name'];
      $category=$row['category'];

    }
    ?>

<div style="margin-left: 30%; margin-top: 10%; width: 50%;">
   <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="reporter_home.php">Home</a></li>
      <li class="breadcrumb-item active">Repoter Profile</li>
    </ul>
  </div>

<h3>Reporter Profile</h3>
<hr>
	<form action="Reporter_profile.php" name="profileform" method="post">
    <div class="form-group">
  <img src="image/admin.png"class="img img-thumbnail" height="100" width="100" >
  </div>
  <div class="form-group">
    <label for="Category">Repoter Name:</label>
    <input type="text" class="form-control" placeholder="Category"name="category" id="Category" value="<?php echo $reporter;?>">
  </div>
   <div class="form-group">
    <label for="Category">Reporter Email:</label>
    <input type="text" class="form-control" placeholder="Category"name="category" id="Category" value="<?php echo $_SESSION['email'];?>"style=" ">
  </div>
   <div class="form-group">
    <label for="Category">Reporter Category:</label>
    <input type="text" class="form-control" placeholder="Category"name="category" id="Category" value="<?php echo $category;?>"style=" ">
  </div>
  
  <a href="http://localhost/newsportal/reporter_change_password.php"> <button type="button" class="btn btn-primary" name="chngpass">Change Password</button></a>
  
</form>



