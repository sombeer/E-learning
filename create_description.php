<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learning|Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!--<script src="ckeditor5-build-classic/ckeditor.js"></script>-->
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
              <label class="col-sm-12"><center><i><h3><u>Create Courses Description</u></h3></i></center></label>

              <div class="form-group">
            <label  class="col-sm-3 control-label">Course Category:</label> 
            <div class="col-sm-3">
              <select class="form-control" name="category" id="category-list" onChange="getState(this.value);">
                 <option>Select Category</option>
                <?php
                    foreach($results as $category) {
                    ?>
               <option value="<?php echo $category["c_id"]; ?>"><?php echo $category["c_name"]; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-3 control-label">Course Name:</label> 
            <div class="col-sm-3">
                <select class="form-control" name="course" id="course-list" onChange="getdescription(this.value);">
                 <option>Select Course</option>
                </select>
            </div>
          </div>
             
         <div class="form-group">
              <label class="col-sm-3 control-label">Topic Title:</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="title" placeholder="eg.home,function,variable">
              </div>
          </div> 
              
          <div class="form-group">
            <label class="col-sm-3 control-label">Topic Description:</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="description" id="editor1"></textarea>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </div> 
           </div>  
        </form>
         
    </div>
    </div>

  
        <?php
        if(isset($_POST['submit']))
          {
          
            $c_id=$_POST['category'];
           $courseid=$_POST['course'];
           $title=$_POST['title'];
           $description=$_POST['description'];

          
           $query=mysql_query("SELECT * FROM course_details where course_id='$courseid'");
           $row=mysql_fetch_array($query);
           $fk=$row['course_id'];
           $coursename=$row['course_name'];

            $query1=mysql_query("SELECT * FROM category where c_id='$c_id'");
           $row1=mysql_fetch_array($query1);
           $fk1=$row1['c_id'];

           if (mysql_num_rows($query)>0)
            {
               $adddescription=mysql_query("INSERT INTO course_description values('','$fk','$fk1','$coursename','$title','$description')") or die(mysql_error());
               ?>
               <script type="text/javascript">alert("course title&description added")</script>
               <?php
           }
           else
           {?>
            <script type="text/javascript">
            window.alert("course doesn't match");
            </script>
            <?php
           }          
        }
        ?>
      </div>
    </div>
  </div>

<script>
      CKEDITOR.replace( 'editor1' );
    </script>
</div>
</div>

</body>
</html>

