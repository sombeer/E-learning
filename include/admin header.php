<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learning|Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" href="img/favicon.png">
</head>
<body>

<nav class="navbar navbar-inverse" style="margin-bottom: 0px; background-color:black; border-radius: 0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="img/logo1.png"></a>
    </div>
    <ul class="nav navbar-nav navbar-right ">
      <li><a href="#"><h3>Next Gen Learning Platforms</h3></a></li>
    </ul>
  </div>
</nav>


<nav class="navbar navbar-inverse navbar-fixed" style="border-radius: 0px;border: 0px;">
  <div class="container-fluid">
    <?php include('include/connection.php') ?>
    <ul class="nav navbar-nav navbar-right">
    <li><h4 style="color: white;"><i>
      <?php 
          include('include/admin session.php');
          $query = mysql_query("SELECT * from admin where admin_id='$ses_id'") or die(mysql_error());
           $row = mysql_fetch_array($query);
           $adminid = $row['admin_id']; ?>welcome <?php echo $row['user_name'];?>! </i></h4></li>
&nbsp;&nbsp;
        <li><h4 style="color: white;">&nbsp;&nbsp;&nbsp;<a href="include/logout.php"> logout</a></h4></li>

    </ul>

    
  </div>
</nav>

</body></html>