<?php
include('db/connection.php');
$conn =mysqli_connect("localhost","root", "","news");
$id=$_GET['delete'];
$query=mysqli_query($conn,"delete from user where id='$id'");

if($query){
	 echo "<script> alert('User Deleted!') </script>";
	echo "<script>window.location='http://localhost/newsportal/user_list.php'</script>";
}else{
	echo "Please Try Again!";
}
?>
