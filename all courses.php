<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learning|Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="ckeditor_4.8.0_full\ckeditor/ckeditor.js"></script>



<?php
require_once("drop/dbcontroller.php");
include("include/connection.php");
$db_handle = new DBController();
$query ="SELECT * FROM category";
$results = $db_handle->runQuery($query);
?>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getState(val) {
  $.ajax({
  type: "POST",
  url: "drop/get_state.php",
  data:'category_id='+val,
  success: function(data){
    $("#course-list").html(data);
  }
  });
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getdescription(val) {
  $.ajax({
  type: "POST",
  url: "drop/getdescription.php",
  data:'description_id='+val,
  success: function(data){
    $("#description-list").html(data);
  }
  });
}

function selectdescription(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>



</head>
<body>
<?php include('include/connection.php');
      include('include/admin header.php');
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
              <label class="col-sm-12"><center><i><h3><u>All Courses</u></h3></i></center></label>
          <div class="form-group">
            <label  class="col-sm-3 control-label">Category Name:</label> 
            <div class="col-sm-3">
               <select class="form-control" name="category" id="category-list" onChange="getState(this.value);">
                <option>select category</option>
               <?php
                    foreach($results as $category) {
                    ?>
               <option value="<?php echo $category["c_id"]; ?>"><?php echo $category["c_name"]; ?></option>
                <?php
                }
                ?>
              </select>
</div></div>

   <div class="form-group">
            <label  class="col-sm-3 control-label">Course Name:</label> 
            <div class="col-sm-3">
              <select class="form-control" name="course" id="course-list" onChange="getdescription(this.value);">
                <option>select course</option>
               </select>
</div></div>

   <div class="form-group">
            <label  class="col-sm-3 control-label">Description Name:</label> 
            <div class="col-sm-3">
                <select class="form-control" name="description" id="description-list" onChange="getshow(this.value);">
                <option>select description</option>
               </select>

            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
            <input type="submit" name="submit" class="btn btn-default" id="show-list" value="Show" />
            <input type="submit" name="update" class="btn btn-default" id="show-list" value="Update" />
            <input type="submit" name="delete" class="btn btn-default " id="show-list" value="Delete" />
           </div>  
        </form>
        <p>&nbsp;</p>
         <?php
         if (isset($_POST['delete']))
          {
            $des=$_POST['description'];
            $del_id=mysql_query("DELETE from course_description where description_id='$des'") or die(mysql_error());
            if ($del_id)
             {
             echo "<script>alert('deleted');</script>";
            }
            else
            {
              echo "<script>alert('not deleted');</script>";
            }
         
         }
if (isset($_POST['submit'])) {
  
  $description=$_POST['description'];
  $course=$_POST['course'];
  ?>
<div class="form-group">
         <div class="col-sm-4">
              <input type="text" class="form-control" value="Course id : <?php echo $course; ?>" readonly="">
        </div>
       <div class="col-sm-4">
               <input type="text" class="form-control" value="Description id : <?php echo $description; ?>" readonly>
       </div>
 
<?php
$query = mysql_query("select * from course_description where description_id='$description'") or die(mysql_error());
   $row = mysql_fetch_array($query);
  ?>
<div class="col-sm-4">
  <input type="text" value="Course name : <?php echo $row['course_name']; ?>" name="" readonly="" class="form-control">
  </div>
  <br>
  <br>
  <p><center><h3><ul><?php echo $row['topic_title']; ?></ul></h3></center></p>
  <p><?php echo $row['course_content']; ?></p>
  <?php
}
?>
    </div>

             <?php
if (isset($_POST['update'])) {
  
  $description=$_POST['description'];
  $course=$_POST['course'];
  ?>
<div class="form-group">
         <div class="col-sm-4">
            <input type="text" class="form-control" value="Course id : <?php echo $course; ?>" readonly="">
        </div>
       <div class="col-sm-4">
         <input type="text" class="form-control" value="Description id : <?php echo $description;; ?>" readonly>
       </div>
<?php
$query = mysql_query("select * from course_description where description_id='$description'") or die(mysql_error());
   $row = mysql_fetch_array($query);
  ?>

<div class="col-sm-4">
  <input type="text" value="Course name : <?php echo $row['course_name']; ?>" name="" readonly="" class="form-control">
  </div>
  <br>
  <br>
  <form method="post" enctype="multipart/form-data">
  <input type="hidden" name="description" value="<?php echo $description;?>">
  <center><div class="col-sm-4">
  <input type="text" name="t_title" class="form-control" value="<?php echo $row['topic_title']; ?>"></div></center>
   <div class="col-sm-12">
     <div class="jumbotron">
    
        <textarea class="form-control" id="editor1" name="description1" rows="4" ><?php echo $row['course_content']; ?></textarea>
        <input type="submit" name="update2" value="Save Change">
      </form>


     
  </div>
</div>
    <script>
      CKEDITOR.replace( 'editor1' );
    </script>
  <?php
}
?>

  </div>
  
      </div>
    </div>
  </div>

</div>
</div>

</body>
</html>

 <?php
      if (isset($_POST['update2']))
       { 
        $description1=$_POST['description1'];
        $t_title=$_POST['t_title'];
        $description=$_POST['description'];
echo $description;
        $update=mysql_query("UPDATE course_description SET course_content='$description1' ,topic_title='$t_title' where description_id='$description'") or die(mysql_error());
        if ($update) 
        {
          echo "<script>alert('updated');</script>";
        }
        else
        {
          echo "<script>alert('not updated');</script>";
        }
       }
      ?>