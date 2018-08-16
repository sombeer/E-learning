<?php
		 
         $conn=mysql_connect("localhost","root","") or die ("connection error");
		if ($conn) {
			mysql_select_db("learning_hub",$conn);
           
		}
		else
		{
			die("db not connected");
		}	


          
?>