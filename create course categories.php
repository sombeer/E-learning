<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learning|Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('include/admin header.php'); ?>


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
   <div class="jumbotron">
     <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <label class="col-sm-12"><center><i><h3><u>Create Courses Category</u></h3></i></center></label>
            <div class="form-group">
              <label class="col-sm-3 control-label">Category Name:</label> 
              <div class="col-sm-3">
                <input class="form-control" type="text" name="cname" placeholder="eg.web development,software development">  
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Category Image:</label> 
              <div class="col-sm-3">
                <input class="form-control" type="file" name="cimage">  
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Category Title:</label> 
              <div class="col-sm-3">
                <input class="form-control" type="text" name="ctitle" placeholder="eg.Language for web development,Language for software development">  
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">button title:</label> 
              <div class="col-sm-3">
                <input class="form-control" type="text" name="buttontitle" placeholder="eg.Learn web development,Learn software development">  
            </div>
            </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" class="btn btn-default" name="submit">Submit</button>
                </div>
              </div>
      </form>
        <?php
        if(isset($_POST['submit']))
        {
         include('include/connection.php');
         
           $cname=$_POST['cname'];
            $cimage=$_FILES['cimage']['name'];
            $temp_image=$_FILES['cimage']['tmp_name'];
             move_uploaded_file($temp_image,"courses images/".$cimage);
             $ctitle=$_POST['ctitle'];
              $buttontitle=$_POST['buttontitle'];
               $c_id=mysql_query("SELECT c_id from category where c_id=(SELECT MAX(c_id) from category)");
               $sql=mysql_fetch_assoc($c_id);
               $aid=$sql['c_id'];
               $auto_increment=$aid+100000;
               $query=mysql_query("SELECT * from category where c_name='$cname' ");

           if(mysql_num_rows($query)>0) 
           {
              ?>
              <script type="text/javascript">alert("course already added");</script>
              <?php
           }
           else
           {
           mysql_query("INSERT INTO category values('$auto_increment','$cname','$cimage','$ctitle','$buttontitle')") or die(mysql_error());
           ?>
           <script type="text/javascript">
            window.alert("category added");
            window.location.href="create course categories.php"
         </script>
           <?php
        }
      }
        ?>
    </div>


</div>
</div>
</div>


</body>

</html>

