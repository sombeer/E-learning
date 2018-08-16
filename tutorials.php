<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learning|Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

</head>
<body>
      <?php 
         include('include/connection.php');
          include('include/header.php'); 
          $query=mysql_query("SELECT * from category");
       ?>
<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
       
          <div class="col-xs-12 col-sm-9">
            
            <div class="row">
              <?php
                  include('include/connection.php');
                    if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                   $query = mysql_query("SELECT * from course_details where c_id=$id");
                   while ($row=mysql_fetch_array($query)) {
              ?>
                <div class="col-6 col-sm-6 col-lg-4">
                    <center><h1> <?php echo $row['course_name']; ?> </h1></center>
                    <center><h3> <?php echo $row['c_title']; ?></h3></center>
                    <center><button class="btn btn-default"> <?php echo "<a href=\"course_tutorials.php?id={$row['course_id']}\">{$row['b_title']}</a>";?> </button></center>
                </div>
                  <?php
                }}
                  ?>
             </div>
           </div>
     </div>
  					
</div>

<hr>
    <footer>
      <?php include('footer.php'); ?>
    </footer>

</div>
</body>

</html>

