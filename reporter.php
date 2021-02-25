<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="Reporter";

include('include/header.php');

?>

<div style="margin-left: 25%; margin-top: 5%; width: 50%;">
	 <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active">Reporter</li>

    </ul>
  </div>
	<div class="text-right">
		<button class="btn"><a href="addreporter.php">Add Reporter</a></button>
	</div>
   <table class="table table-bordered">
   	<tr>
   		<th>Id</th>
   		<th>Reporter Name</th>
   		<th>Reporter Email</th>
      <th>Report Categories</th>
   		<th>Delete</th>
   	</tr>
   	<?php

   	$conn =mysqli_connect("localhost","root", "","news");
   	$query=mysqli_query($conn,"SELECT * FROM reporter");
    while($row=mysqli_fetch_array($query)){
   	?>
   	<tr>
     <td><?php echo $row['id'];?></td>
     <td><?php echo $row['name'];?></td>
     <td><?php echo $row['email'];?></td>
     <td><?php echo $row['category'];?></td>
     <td><a href="reporter_delete.php? delete=<?php echo $row['id'];?>"class="btn btn-danger">Delete</a></td>
    </tr>
<?php } ?>
   </table>


</div>


