<?php 
session_start();
 session_destroy();  ?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="icon" href="img/favicon.png">
  <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

 
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

      
</head>
<body>


<nav class="navbar navbar-inverse" style="margin-bottom: 0px; background-color:black; border: 0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="img/logo1.png" style="margin-top: 25px; border-radius: 5px;">
    </div>
    <ul class="nav navbar-nav navbar-right ">
      <li><a href="#"><h3>Next Gen Learning Platforms</h3></a></li>
    </ul>
  </div>
</nav>


  
  <div class="container">
 <center><h2>Admin Panel of <span style="color: teal;">Learning</span>|<span style="color: tan;">Hub</span></h2></center> 
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-5" for="email">Email:</label>
      <div class="col-sm-3">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-5" for="pwd">Password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
      </div>
    </div>
  </form>
  <?php
if (isset($_POST['submit'])) {
  include('include/connection.php');
  $email = $_POST['email'];
  $email=stripcslashes($email);
  $email=addslashes($email);
  $password=$_POST['password'];
  $password=stripslashes($password);
  $password=addslashes($password);
  $pass=md5($password);
$query = mysql_query("SELECT * FROM admin WHERE email_id='$email' AND password='$pass' AND confirmation='confirm'") or die(mysql_error());
$count = mysql_num_rows($query);
$row = mysql_fetch_array($query);
if ($count > 0) {
session_start();
session_regenerate_id();
$_SESSION['id'] = $row['admin_id'];
$user_name=$row['user_name'];
echo "<script>window.parent.location.replace('create_course.php')</script>";
session_write_close();
} else {
session_write_close();
?>
<script type="text/javascript">
alert("Invalid Username or Password"); 
</script>
<?php }
     }
       ?>
</div>

  <footer>
      <?php include('footer.php'); ?>
    </footer>
</body>
</html>