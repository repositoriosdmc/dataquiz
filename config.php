<?php
session_start();
?>
<head>
<title>Login using Facebook in PHP</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<style>
 .box
 {
  width:100%;
  max-width:400px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
</style>
<body>     
<?php if($_SESSION['fb_id']) {?>
<div class="container">  
    <div class="table-responsive">  
     <div class="box">
   <center><?php echo $_SESSION['fb_pic']?></center>
  <div class="card-body">
    <h4 class="card-title"><?php echo $_SESSION['fb_name']; ?></h4>
    <p class="card-text"><?php echo  $_SESSION['fb_id']; ?></p>
	    <p class="card-text"><?php echo $_SESSION['fb_email']; ?></p>
    <a href="https://certificaciones.dmc.pe/logout.php" class="btn btn-primary">Logout</a>
  </div>
</div>
</div>
</div>
<?php } ?>
</body>
</html>