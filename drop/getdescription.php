<?php
require_once("dbcontroller.php");
$db_handle = new dbcontroller();
if(!empty($_POST["description_id"])) {
	$query ="SELECT * from course_description WHERE course_id = '" . $_POST["description_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="<?php echo $description['course_id']; ?>">Select description</option>
	<form method="post">
<?php
	foreach($results as $description) {
?>

	<option value="<?php echo $description['description_id']; ?>" ><?php echo $description["topic_title"]; ?></option>


	<?php
}

?>

</form>
<?php


}
?>
