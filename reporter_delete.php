<?php
include('db/connection.php');
$conn =mysqli_connect("localhost","root", "","news");
$id=$_GET['delete'];
$query=mysqli_query($conn,"delete from reporter where id='$id'");
if($query){
	 echo "<script> alert('News Deleted!') </script>";;
	echo "<script>window.location='http://localhost/newsportal/news.php'</script>";
}else{
	echo "Please Try Again!";
}
?>