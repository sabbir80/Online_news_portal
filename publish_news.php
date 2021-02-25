<?php
include('db/connection.php');
$conn =mysqli_connect("localhost","root", "","news");
$id=$_GET['publish'];
$query=mysqli_query($conn,"select * from news where id='$id'");
while($row=mysqli_fetch_array($query)){

	 $category_name=$row['category'];
     $des=$row['description'];
     $title=$row['title'];
     $date=$row['date'];
     $file=$row['thumbnail'];
     $admin=$row['admin'];
}
$query1= mysqli_query($conn,"INSERT INTO published(title,description,date,category,thumbnail,admin) values('$title','$des','$date','$category_name','$file','$admin') ");
if($query1){
	echo "<script> alert('Successful!') </script>";
	echo "<script>window.location='http://localhost/newsportal/news.php'</script>";
}
?>