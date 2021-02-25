<?php
session_start();
error_reporting(0);
if($_SESSION['email']==true){

}else
  header('location:login');

$page="news";

include('include/reporter_header.php');

?>
<?php

$conn =mysqli_connect("localhost","root", "","news");
$id=$_GET['edit'];

$query=mysqli_query($conn,"SELECT * FROM news WHERE id='$id' ");

while($row=mysqli_fetch_array($query)){

     $category_name=$row['category'];
     $des=$row['description'];
     $title=$row['title'];
     $date=$row['date'];
     $file=$row['thumbnail'];
}
?>

<div style="margin-left: 25%; margin-top:5%; width: 50%;">
  <div>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active"><a href="reporter_home.php">Home</a></li>
      <li class="breadcrumb-item active"><a href="report_news.php">News</a></li>
      <li class="breadcrumb-item active">Update News</li>
    </ul>
  </div>

<h3>Update News</h3>
<hr>
<div class="frm-addnews">
  <form action="news_edit.php" name="news_edit_form" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" placeholder="Title"name="title" id="title" value="<?php echo $title;?>">
  </div>
  <div class="form-group">
  <label for="comment">Description</label>
  <textarea class="form-control" rows="5" id="comment" name="des" ?><?php echo $des;?></textarea>
  </div>
    <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" placeholder="Date"name="date" id="date" value="<?php echo $date;?>">
  </div>
    <div class="form-group">
    <label for="file">File</label>
    <input type="file" class="form-control img-thumbnail" placeholder="File"name="file" id="file">
  <img src="image/<?php echo $file;?>"class="img img-thumbnail">
  </div>
  <input type="hidden" name="id" value="<?php echo $id?>">
    <div class="form-group">
    <label for="category">Category</label>
    
      <select name="category" class="form-control">
         <?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $query=mysqli_query($conn,"SELECT * FROM reporter");
    while($row=mysqli_fetch_array($query)){
    ?>
    

      <option><?php echo $row['category'];?></option>

<?php } ?>
      </select>
  </div>

  
  <button type="submit" class="btn btn-primary" name="submit">Update News</button>
  
</form>
</div>
<script>

   function validateForm() {
  var x = document.forms["newsform"]["title"].value;
  var x = document.forms["newsform"]["des"].value;
  var x = document.forms["newsform"]["date"].value;

  if (x == "") {
    alert("All section must be filled out!");
    return false;
  }
}

</script>


</div>


<?php
$conn =mysqli_connect("localhost","root", "","news");
if(isset($_POST['submit'])){

     $category_name=$_POST["category"];
     $Description=$_POST["des"];
     $title=$_POST["title"];
     $date=$_POST["date"];
     $file=$_FILES["file"]['name'];
     $uploadOk=1;
     $id=$_POST['id'];

     if(file_exists("image/$file")){
      $uploadOk=0;
     }else{
move_uploaded_file($_FILES["file"]["tmp_name"],"image/$file" );}




 $query1= mysqli_query($conn,"UPDATE news Set title='$title' , description='$Description', date='$date', thumbnail='$file', category='$category_name' where id='$id' ");

 if($query1){
  echo "<script> alert('Successful!') </script>";
  echo "<script>window.location='http://localhost/newsportal/report_news.php'</script>";
 }else{
   echo "<script> alert('Unsuccessful!') </script>";
}


}

?>

