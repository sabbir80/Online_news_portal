<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
	<title>Login</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/admin.css">

</head>
<body>
	<div class="box" style="position: absolute;
	padding: 48px 40px 36px;
	top:50%;
	left:50%;
	transform: translate(-50%,-50%);
    width:448px;
    height: 500px;
    box-shadow:0px 1px 5px #555;
    border-radius: 5px;">
		<form action="login.php" method="post" style="width: 100%; padding-top: 20px">
					    <div class="form-group" style="margin: auto;padding-left: 150px;">
  <img src="image/admin.png"class="img img-thumbnail" height="50" width="50" >
  </div>
		<div style="width: 368px;height: 47.7px;padding-top: 10px; text-align: center;margin-bottom: 50px;"> 
			<h3>Login</h3> 
		</div>

  <div class="form-group">
    <label for="email">Email Address:</label>
    <input type="email" name="email" class="form-control" placeholder="Enter Email" id="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" placeholder="Enter Password" id="pwd" required>
  </div>

  <input type="submit" name="submit" class="btn btn-primary" value="Login" style="float: right;margin-top: 50px;">
</form>
	</div>

</body>
</html>

<?php
include'db/connection.php';

if(isset($_POST['submit']))
 {
   $email=$_POST["email"];
   $password=$_POST["password"];
$conn =mysqli_connect("localhost","root", "","news");
$sql=mysqli_query($conn,"select name from admin_login where email='$email' and password='$password'");
 while($row=mysqli_fetch_array($sql)){
 	$name= $row['name'];
 }
$query= mysqli_query($conn,"SELECT * FROM admin_login WHERE email='$email' AND password='$password' ");
if($query){

	if(mysqli_num_rows($query)>0){
		$_SESSION['email']=$email;
		$_SESSION['name']=$name;
		

		header("location:home.php");
	}else{
   $email=$_POST["email"];
   $password=$_POST["password"];
   $conn =mysqli_connect("localhost","root", "","news");
   $sql=mysqli_query($conn,"select name from reporter where email='$email' and password='$password'");
 while($row=mysqli_fetch_array($sql)){
 	$name= $row['name'];
 }
 $query1= mysqli_query($conn,"SELECT * FROM reporter WHERE email='$email' AND password='$password' ");
if($query1){

	if(mysqli_num_rows($query1)>0){
		$_SESSION['email']=$email;
		$_SESSION['name']=$name;
		

		header("location:reporter_home.php");
	}else{
		echo "<script> alert('Email or Password may be incorrect!') </script>";
	}

	}

}
}
}

?>