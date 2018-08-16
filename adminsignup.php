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
  <center> <h2>Admin Panel of <span style="color: teal;">Learning</span>|<span style="color: tan;">Hub</span></h2></center> 
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-5" for="Username">User Name:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="text" placeholder="Enter Username" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-5" >Choose image:</label>
      <div class="col-sm-3">
        <input type="file" class="form-control"  name="avatar">
      </div>
    </div>
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
      <label class="control-label col-sm-5" for="pwd">Confirm Password:</label>
      <div class="col-sm-3">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter confirm password" name="confirm">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
      </div>
    </div>
  </form>
  <?php

if (isset($_POST['submit']))
 {
    include("include/connection.php");
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['confirm']);
    if($pass != $cpass)
     {
        ?>
        <script type="text/javascript">
            window.alert("password doesn't match");
            window.parent.location="adminsignup.php";
        </script>
        <?php
    }
        else
        {
            $checkQuery=mysql_query("SELECT * FROM admin WHERE email_id='$email'");
            if (mysql_num_rows($checkQuery)>0) {
                ?>
                <script type="text/javascript">
                    window.alert("email already exist ! please sign in your account");
                    window.parent.location="admin.php"
                </script>
                <?php
            }
            else{

            $username=$_POST['username'];
            $email=$_POST['email'];
            $pass=md5($_POST['password']);
            $avatar_path=$_FILES['avatar']['name'];
            $avatar_temppath=$_FILES['avatar']['tmp_name'];
            $code=rand(11111,99999);        
            move_uploaded_file($avatar_temppath,"image/".$avatar_path);
            mysql_query("INSERT INTO admin VALUES('','$username','$avatar_path','$email','$pass','$code','pending')") or die(mysql_error());
            $to=$_POST['email'];
            $subject='confirmation code';
            $message="your code is '$code'";
                    // Always set content-type when sending HTML email
                   # $headers = "MIME-Version: 1.0" . "\r\n";
                   # $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // More headers
                    #$headers .= 'From: @example.com>' . "\r\n";
                    #$headers .= 'Cc: myboss@example.com' . "\r\n";
                    mail($to,$subject,$message,"from:yourlocalhostmail@gmail.com");
            ?>
            <script type="text/javascript">
                window.alert("your confirmation code is sent to your mail,please confirm us");
                window.parent.location="mail confirm.php";
            </script>
            <?php
            }

        }
    }
?>

</div>

  <footer>
      <?php include('footer.php'); ?>
    </footer>
</body>
</html>