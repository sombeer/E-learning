
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="icon" href="img/favicon.png">
    <script src="bootstrap/jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jquery-3.2.1"></script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>



<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      


</head>
<body>

<nav class="navbar navbar-inverse" style="margin-bottom: 0px; background-color:black; border: 0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php"><img src="img/logo1.png" style="margin-top: 25px; border-radius: 5px;"></a>
    </div>
    <ul class="nav navbar-nav navbar-right ">
      <li><a href="#"><h3>Next Gen Learning Platforms</h3></a></li>
    </ul>
  </div>
</nav>


<nav class="navbar navbar-inverse navbar-fixed" style="border-radius: 0px;border: 0px;">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
      <?php  
      include('connection.php');
       $query=mysql_query("SELECT * from category");

              while ($row=mysql_fetch_assoc($query))
               {
              ?>

    <li><?php echo"<a href=\"tutorials.php?id={$row['c_id']}\">{$row['b_title']}</a>"?></li>
    <?php
  }
    ?>
    </ul>
      </li>
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
   window.location.href="course_tutorials.php?id=<?php echo mysql_real_escape_string($r['description_id']); ?>"
  </script>
<?php     }?>

</div>
</nav>
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
