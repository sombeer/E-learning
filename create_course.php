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
        <label class="col-sm-12"><center><i><h3><u>Create Course</u></h3></i></center></label>
         <div class="form-group">
            <label  class="col-sm-3 control-label">Course Category:</label> 
            <div class="col-sm-3">
               <select class="form-control" name="coursecategory">
                <?php $query=mysql_query("SELECT c_name from category ");
                  while ($row=mysql_fetch_assoc($query)) {
                 ?>
                <option><?php echo $row['c_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Course Name:</label> 
              <div class="col-sm-3">
                <input class="form-control" type="text" name="coursename" placeholder="eg.html,c,css,java">  
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Course Title:</label> 
              <div class="col-sm-3">
                <input class="form-control" type="text" name="ctitle" placeholder="eg.language for web pages">  
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">button title:</label> 
              <div class="col-sm-3">
                <input class="form-control" type="text" name="buttontitle" placeholder="eg.Learn html">  
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
         
          $category=$_POST['coursecategory'];
           $coursename=$_POST['coursename'];
           $categorytitle=$_POST['ctitle'];
           $buttontitle=$_POST['buttontitle'];

           $fk=mysql_query("SELECT c_id from category where c_name='$category'");
           $ffk=mysql_fetch_array($fk);
           $fkk= $ffk['c_id'];

           $query=mysql_query("SELECT * from course_details where course_name='$coursename' ");
          $query1=mysql_query("SELECT * from course_details where c_id=$fkk");
           $row=mysql_fetch_array($query1);
           
          if(mysql_num_rows($query)>0) 
           {
              
              echo "<script>alert('course already added');</script>";
              
           }
           else
           {
             if ($row['course_id']<$fkk)
                {
                  $auto_increment1=$fkk+1;
                   $addcourse=mysql_query("INSERT INTO course_details values('$auto_increment1','$fkk','$coursename','$categorytitle','$buttontitle')") or die(mysql_error());

               }
               else
                {
                  $course_id=mysql_query("SELECT course_id from course_details where course_id=(SELECT MAX(course_id) from course_details where c_id=$fkk)");
                  $sql=mysql_fetch_assoc($course_id);
                  $courseid=$sql['course_id'];
                  $auto_increment=$courseid+1;
                  $addcourse=mysql_query("INSERT INTO course_details values('$auto_increment','$fkk','$coursename','$categorytitle','$buttontitle')") or die(mysql_error());
               }

          
           ?>
           <script type="text/javascript">
            window.alert("course added");
            window.location.href="create_description.php"
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