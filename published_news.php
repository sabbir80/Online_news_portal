<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="publish";

include('include/header.php');

?>

<div style="margin-left: 25%; margin-top: 5%; width: 50%;">
	 <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
      <li class="breadcrumb-item active">Published News</li>
    </ul>
  </div>

   <table class="table table-bordered" style="margin-top: 10px;">
   	<tr>
   		<th>Id</th>
   		<th>Title</th>
   		<th>Description</th>
   		<th>Date</th>
   		<th>Category</th>
      <th>Admin</th>
   		<th>Thumbnail</th>
   		<th>Delete</th>
   	</tr>
   		<?php
   	include('db/connection.php');
   	$conn =mysqli_connect("localhost","root", "","news");
   	$query=mysqli_query($conn,"SELECT * FROM published");
    while($row=mysqli_fetch_array($query)){
   	?>
   	<tr>
   		<td><?php echo $row['id'];?></td>
   		<td><?php echo $row['title'];?></td>
   		<td><?php echo substr($row['description'],0,200);?></td>
   		<td><?php echo $row['date'];?></td>
      <td><?php echo $row['category'];?></td>
   		<td><?php echo $_SESSION['name'];?></td>
   		<td><img src="image/<?php echo $row['thumbnail'];?>" class="img img-thumbnail"></td>
   		<td><a href="published_delete.php? delete=<?php echo $row['id'];?>"class="btn btn-danger" onclick="confirm_dlt()">Delete</a></td>


    </tr>
<?php } ?>
 	
   </table>


   	




</div>