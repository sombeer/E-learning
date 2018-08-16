<?php
include('connection.php');
include('admin session.php');

$query=mysql_query("SELECT * from admin where admin_id=$ses_id");
$row=mysql_fetch_array($query);
session_destroy();
	?>
<script language="Javascript" type="text/javascript">
	alert("You are logged out."); 
	window.location="../admin.php";
	</script>";
	<?php
?>