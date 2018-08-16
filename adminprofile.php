<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php   
include('include/admin header.php');
include('include/connection.php');
 ?>
<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="sidebar-nav">
                <ul class="nav">
                <li class="nav-divider"></li>
                  <li><a href="create course categories.php" style="text-decoration: none; font-size:18px; ">Create course category</a></li>
                  <li><a href="create_course.php" style="text-decoration: none; font-size:18px; ">Create course</a></li>
                     <li><a href="create_description.php" style="text-decoration: none; font-size:18px; ">Create description</a></li>
                    <li class="nav-divider"></li>
                    <li><a href="all courses.php" style="text-decoration: none; font-size:18px;">View all courses</a></li>
                     <li><a href="adminprofile.php" style="text-decoration: none; font-size:18px;">Admin Profile</a></li>
                     <li class="nav-divider"></li>
                </ul>
            </div>
        </div>

 <div class="col-xs-12 col-sm-9">
            <br>
            <div class="jumbotron">
           <form method="post" class="form-horizontal" >
              <label class="col-sm-12"><center><i><h3><u>Admin Profile</u></h3></i></center></label>

    <div class="form-group">
            <label  class="col-sm-3 control-label">Username:</label> 
            <div class="col-sm-3">
               
              <input type="text" name="username"  class="form-control" id="text" value="
              <?php 
               $un=mysql_query("SELECT * from admin where admin_id='$ses_id'") or die(mysql_error()); 
              $row=mysql_fetch_array($un); 
              echo $row['user_name']; 
               ?>
             " required>
 			 </div>
	</div>
         
   <div class="form-group">
            <label  class="col-sm-3 control-label">Current email address:</label> 
            <div class="col-sm-3">
              <input type="email" name="cemail" readonly="" class="form-control" id="email" value=" <?php 
               $un=mysql_query("SELECT * from admin where admin_id='$ses_id'") or die(mysql_error()); 
              $row=mysql_fetch_array($un); 
              echo $row['email_id']; 
               ?>
             " readonly >
 			 </div>
	</div>
	<div class="form-group">
            <label  class="col-sm-3 control-label">New email address:</label> 
            <div class="col-sm-3">
              <input type="email" name="nemail"  class="form-control" id="email" value="" required>
 			 </div>
	</div>
	<div class="form-group">
            <label  class="col-sm-3 control-label">Current password:</label> 
            <div class="col-sm-3">
              <input type="password" name="cpassword"  class="form-control" id="password" required>
 			 </div>
 			</div>
 			 <div class="form-group">
            <label  class="col-sm-3 control-label">New password:</label> 
            <div class="col-sm-3">
              <input type="password" name="npassword"  class="form-control" id="npassword" required>
 			 </div>
 			</div>
 			  <div class="form-group">
            <label  class="col-sm-3 control-label"></label> 
            <div class="col-sm-3">
              <input type="submit" class="btn btn-info" value="Save info" name="submit">
 			 </div>
 			  
	</div>
	</form>
  <?php   


    if (isset($_POST['submit'])) 
    {
    $username=$_POST['username'];
    $cemail=$_POST['cemail'];
    $nemail=$_POST['nemail'];
    $nemail=addslashes($nemail);
    $nemail=stripslashes($nemail);
    $cpassword=md5($_POST['cpassword']);
    $npassword=md5($_POST['npassword']);
    $npassword=addslashes($npassword);
    $npassword=stripslashes($npassword);

    $cpass=mysql_query("SELECT * from admin where admin_id=$ses_id") or die(mysql_error());
    $row1=mysql_fetch_assoc($cpass);
    $cemai=$row1['email_id'];
    $cpassw=$row1['password'];

    $query=mysql_query("UPDATE admin set email_id='$nemail',password='$npassword',user_name='$username' where admin_id='$ses_id' ");
   
    if ($cemail==$cemai and $cpassword==$cpassw) 
    {
    
    if ($query)
     {
      echo "update";
     }

    else
    {
      echo "not update";
    }
}
else
{
  echo "email and password doesn't match";
}
}
     ?>
</div>
	</div>
        
       



</body>
</html>