
<?php
ob_start();
session_start();
 
 if(!isset($_SESSION['id']))
 {
 	header("location:create_course.php");
 }

 $ses_id=$_SESSION['id'];

?>