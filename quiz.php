<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learning|Hub|Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="ckeditor5-build-classic/ckeditor.js"></script>
</head>
<body>
<?php include('include/connection.php');

 include('include/header.php');  
 ?>




<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="sidebar-nav">
                <ul class="nav">
                <?php
                $query=mysql_query("SELECT * from category");


                while($row=mysql_fetch_assoc($query))
                {
                  $cid1=$row['c_id'];
                ?>
                  <details><summary><?php echo $row['c_name']; ?></summary>
            <?php
          

            $query1=mysql_query("SELECT * from course_details where c_id='$cid1' ");
             while($row1=mysql_fetch_assoc($query1))
            {
              $cid=$row['c_id'];
              if($cid==$cid1)
              {?>
                  
               <a href="quiz.php?name=<?php echo $row1['course_name'];?>"><?php echo $row1['course_name'];?></a>
               <br>
                
                <?php
              }
            }
echo " </details>";
            }
              ?>

                  </ul>
                  
            </div>
        </div>
      
  
</div>
</div>
</body>
</html>
