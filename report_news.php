<?php
session_start();
if($_SESSION['email']==true){

}else
  header('location:login');

$page="news";

include('include/reporter_header.php');

?>
<div style="margin-left: 25%; margin-top: 5%; width: 50%;">
   <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="reporter_home.php">Home</a></li>
      <li class="breadcrumb-item active">News</li>
    </ul>
  </div>
  <div class="text-right">
    <a href="addnews.php"><button class="btn btn-primary">Add News</button></a>
  </div>
   <table class="table table-bordered" style="margin-top: 10px;">
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Description</th>
      <th>Date</th>
      <th>Category</th>
      <th>Thumbnail</th>
      <th>Edit</th>
      
    </tr>
      <?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $name=$_SESSION['name'];
    $query=mysqli_query($conn,"SELECT * FROM news Where admin='$name'");
    while($row=mysqli_fetch_array($query)){
    ?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['title'];?></td>
      <td><?php echo substr($row['description'],0,100);?></td>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['category'];?></td>
      <td><img src="image/<?php echo $row['thumbnail'];?>" class="img img-thumbnail"></td>
      <td><a href="news_edit.php? edit=<?php echo $row['id'];?>"class="btn btn-info">Edit</a></td>
      


    </tr>
<?php } ?>
  
   </table>
 </div>