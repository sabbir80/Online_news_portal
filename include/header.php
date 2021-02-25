
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Admin Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">



    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="style/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?php echo $_SESSION['name'];?></a>

 <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <?php
    include('db/connection.php');
    $conn =mysqli_connect("localhost","root", "","news");
    $email=$_SESSION['email'];
    $query=mysqli_query($conn,"SELECT * FROM admin_login where email='$email'");
    while($row=mysqli_fetch_array($query)){

      $admin=$row['name'];

    }
    ?>
      <a class="nav-link" href="admin_profile.php" class="">Hi, Admin</a></li>
    
  </ul>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php" class="">Sign Out</a></li>
    
  </ul>


  </nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='admin_profile'){echo 'active';}?>" href="admin_profile.php">
              <span data-feather="file"></span>
              Admin Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='news'){echo 'active';}?>" href="news.php">
              <span data-feather="shopping-cart"></span>
              News
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php if($page=='publish'){echo 'active';}?>" href="published_news.php">
              <span data-feather="shopping-cart"></span>
              Published News
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='catagories'){echo 'active';}?>" href="catagories.php">
              <span data-feather="users"></span>
              Catagories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='comment'){echo 'active';}?>" href="comment.php">
              <span data-feather="bar-chart-2"></span>
              Comment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='approved'){echo 'active';}?>" href="approved_comment.php">
              <span data-feather="bar-chart-2"></span>
              Approval Comment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='Reporter'){echo 'active';}?>" href="reporter.php">
              <span data-feather="layers"></span>
              Reporter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($page=='user'){echo 'active';}?>" href="user_list.php">
              <span data-feather="layers"></span>
              User List
            </a>
          </li>
        </ul>

       
       
      </div>
    </nav>


</html>
