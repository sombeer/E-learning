<!DOCTYPE html>
<html>
<head>
  <title>TUTORIALS</title>

   <style type="text/css">

  .scrollbar
{
     float: left;
    height: auto;
    width: 300px;
    background: #F5F5F5;
    overflow-y: scroll;
       position: ;
}

.force-overflow
{
    min-height: 450px;
}

#style-1::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

#style-1::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

  </style>
</head>
<body>
<?php
 include('include/header.php'); 
 include('include/connection.php');
?>

<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
            <div class="sidebar-nav">
                <div class="scrollbar" id="style-1">
  <div class="force-overflow">
                <ul class="nav">

                	<?php
                        if (isset($_GET['id'])) {
                         $id = $_GET['id'];
                        $query=mysql_query("SELECT * FROM course_description where course_id=$id");
                    	$row=mysql_num_rows($query);
                      	if ($row>0)
                    	 {
                    		while($allinfo=mysql_fetch_assoc($query))
                    		 {
                  echo "<li><a href=\"course_tutorials.php?id={$allinfo['description_id']}\">{$allinfo['topic_title']}</a></li>";
                         }}
                         else
                         {
                           $query1=mysql_query("SELECT topic_title,description_id from course_description where course_id IN (SELECT course_id from course_description where description_id=$id)");
                            while ($allinfo=mysql_fetch_assoc($query1)) {
                               echo "<li><a href=\"course_tutorials.php?id={$allinfo['description_id']}\">{$allinfo['topic_title']}</a></li>";  
                            }
                         }
                     }
					?>
                </ul>
            </div>
            </div>
            </div>
               </div>
       

        <div class="col-xs-12 col-sm-9">
            <br>
            <div class="jumbotron">
                <a href="#" class="visible-xs" data-toggle="offcanvas"><i class="fa fa-lg fa-reorder"></i></a>
    
                 <?php
                    if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query1 = mysql_query("select * from course_description where description_id=$id");
                  
/* for default page */
                    $query2 = mysql_query("SELECT * from course_description where course_id=$id");
                    $row=mysql_fetch_array($query2);
                    echo $row['course_content'];



                    while ($row1 = mysql_fetch_array($query1)) {
                    ?>
                 <center><h3><span style="color: tan"><?php echo $row1['topic_title']; ?></span></h3></center>            
                <p name="content">
                <?php echo $row1['course_content']; ?>
                </p>
                <?php }} ?>
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