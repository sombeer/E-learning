<?php
require_once("dbcontroller.php");
$db_handle = new dbcontroller();
if(!empty($_POST["category_id"])) {
	$query ="SELECT * from course_details WHERE c_id = '" . $_POST["category_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="<?php echo $Course['course_id']; ?>">Select Course</option>
<?php
	foreach($results as $Course) {
?>
	<option value="<?php echo $Course['course_id']; ?>" name="<?php echo $Course["b_title"]; ?>"><?php echo $Course["b_title"]; ?></option>
	<?php
}



}
?>
