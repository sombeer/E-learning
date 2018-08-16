<?php

require_once("dbcontroller.php");
$db_handle = new dbcontroller();

if(!empty($_POST["description_id"])){


	$query ="SELECT * from course_description WHERE course_id = '" . $_POST['description'] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="<?php echo $description['description_id']; ?>">Select description</option>
	<?php
	foreach($results as $description) {
?>

	<option value="<?php echo $description['description_id']; ?>" ><?php echo $description["course_content"]; ?></option>
<?php
}

}
?>