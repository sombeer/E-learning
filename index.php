<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learning|Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="icon" href="img/favicon.png">
    <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>



<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      


</head>
<body>

<nav class="navbar navbar-inverse" style="margin-bottom: 0px; background-color:black; border-radius: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"><img src="img/logo1.png" style="margin-top: 25px; border-radius: 5px;"></a>
    </div>
    <ul class="nav navbar-nav navbar-right ">
      <li><a href="index.php"><h3>Welcome to <i><span style="color:tan">Learning</span>|<span style="color: teal">hub</span></h3></a></li></i>
    </ul>
  </div>
</nav>


<nav class="navbar navbar-inverse navbar-fixed" style="border-radius: 0px;border: 0px;">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <?php
      include('include/connection.php');
       $query=mysql_query("SELECT * from category");
               while ($row=mysql_fetch_assoc($query))
               {
                $c_id=$row['c_id'];
              ?>
      <li class="dropdown">
        <?php echo " <a class='dropdown-toggle' data-toggle='dropdown' a href='#'>{$row['c_name']} <span class='caret'></span></a>"?>     
        <ul class="dropdown-menu">
          <?php 
          $query1=mysql_query("SELECT * from course_details where c_id=$c_id");
          while($row1=mysql_fetch_assoc($query1)) {
            $course_d=$row1['c_id'];
          if($course_d == $c_id) 
          {
          ?>
          <li><?php echo" <a href=\"course_tutorials.php?id={$row1['course_id']}\">{$row1['course_name']}</a>"?></li>
          <?php } } ?>
        </ul>
      </li>
      <?php
      }
      ?>
         
    </ul>
     
    <form class="navbar-form navbar-right" method="POST">
      <div class="input-group ">
        <input type="text" class="form-control" placeholder="Search" name="c" id="country" autocomplete="off" >
        <div class="input-group-btn">
          <button  class="btn btn-default" type="submit" name="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
   
    </form>
      <?php 
 $con=mysqli_connect("localhost","root","") or die ("WEBSITE IS UNDER CONSTRUCTION PLEASE WAIT");
    if ($con) {
      mysqli_select_db($con,"learning_hub");
           
    }
    else
    {
      die("DOWN");
}   

    if (isset($_POST['submit'])) 
    {
   
      $id=mysql_real_escape_string($_POST['c']);
        $q=mysqli_query($con,"select * from course_description where topic_title='$id'");
        $r=mysqli_fetch_assoc($q);
    
           ?>
   <script type="text/javascript">
   window.location.href="../w3/course_tutorials.php?id=<?php echo mysql_real_escape_string($r['description_id']); ?>"
  </script>
<?php     }?>
  </div>
</nav>

<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
        
        <div class="col-xs-12 col-sm-12">
            <br>
            <div class="jumbotron">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
                <center><i><u><h1 style="font-family:courier;"><span style="color: tan">Learning</span>|<span style="color:teal; ">Hub</span></h1></u></i></center>
                <p>Learning|hub is Next Generation learning platforms.It is optimized for learning, testing, and training. It might be simplified to improve reading and basic understanding. Tutorials are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. </p>
            </div>
            <div class="row">
              <?php
              include('include/connection.php');

              $query=mysql_query("SELECT * from category");

              while ($row=mysql_fetch_assoc($query))
               {
              ?>
                <div class="col-6 col-sm-6 col-lg-4">
                    <center><h1><?php  $row['c_name']; ?></h1></center>
                    <center><img src="courses images/<?php echo $row['c_image']; ?>" style="width:300px;height:200px;"></center>
                    <center><h3><?php echo $row['c_title']; ?></h3></center>
                    <center><?php echo"<a href=\"tutorials.php?id={$row['c_id']}\"> <button class='btn btn-default'>{$row['b_title']} </button></a>" ?></center>
                </div>
                <?php
                  }
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

<script>
$(document).ready(function(){
 
 $('#country').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>
