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
      <li><a href="#"><h3>Web development courses  </h3></a></li>
    </ul>
  </div>
</nav>


  
  <div class="container">
  <h2>Admin Panel of <span style="color: teal;">Learning</span>|<span style="color: tan;">Hub</span></h2>
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="Username">Confirm Code:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="text" placeholder="Enter confirm code" name="code">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
      </div>
    </div>
  </form>
  <?php

if (isset($_POST['submit']))
 {
    include("include/connection.php");
    $code=($_POST['code']);
    $oldcode=mysql_query("SELECT * from admin WHERE code='$code'");
    if(mysql_fetch_row($oldcode))
     {
      $update=mysql_query("UPDATE admin SET confirmation='confirm' WHERE $code=code");
      ?>
      <script type="text/javascript"> window.parent.location='admin.php'</script>;
      <?php
      }
      else
      {
        ?>
        <script type="text/javascript">window.alert("code doesn't match")</script>;
          <?php
      }


}
  ?>

</div>

 <footer>
        <p>Learning|hub©2017</p>
    </footer>
</body>
</html>