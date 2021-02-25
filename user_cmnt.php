<?php
#error_reporting(0);
$id=$_GET['page'];
$conn =mysqli_connect("localhost","root", "","news");
if(isset($_POST['submit'])){
	$name=$_POST["name"];
	$email=$_POST["email"];
	$comment=$_POST["comment"];

	$sql=mysqli_query($conn,"SELECT * from user where email like '$email'");
    while($row=mysqli_fetch_array($sql)){
    $useremail=$row['email'];
    }	
  if($useremail==$email){

  	$query=mysqli_query($conn,"INSERT into comment(postid,name,email,comment) values('$id','$name','$email','$comment')");
  	if($query){
  		 echo "<script> alert('Successful! Waiting for approval') </script>";
  		
  	}
  }else{
  	 echo "<script> alert('Unsuccessful! Please Register') </script>";
 echo  "uihaihkalwheohf";
  }
}
?>